<?php require_once '../controller/class/classInclude.php'; 
 $path_obj = new Includepath();

if(isset($_SESSION['therapist_id'])){ ?>


<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="#">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>
<?php }?>
	<script src="<?php echo $path_obj->assetspath("js"); ?>/app.js"></script>
	<!-- <script src="<?php echo $path_obj->assetspath("js"); ?>/cdnjs.cloudflare.com_ajax_libs_jquery_3.7.0_jquery.js"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	

<script>

	//register form

$(document).ready(function() {
	var passwordInput = $("#pass");
	passwordInput.on("input", function() {
        var password = $(this).val();
        var minLength = 8;

        if (password.length < minLength) {
         
            $("#passwordError").html("<p>Password must be at least 8 characters.!<p>").css("color","red");
			
        } else {
          
            $("#passwordError").text("");
        }
    });


	$("#confirm-pass").on('keyup', function(){
		var pass = $('#pass').val();
		var confirm_pass = $('#confirm-pass').val();

    if (pass != confirm_pass){
		$('#submit').attr('disabled','disabled');

		$("#CheckPasswordMatch").html("<p id='check_pass_error'>Password does not match !<p>").css("color","red");
		
		
        
	}
    else{
		$('#check_pass_error').hide();
		$("#CheckPasswordMatch").html("<p id='check_pass_success'>Password  match !<p>").css("color","green");
		$('#submit').removeAttr('disabled');

		setTimeout(function () {
			$('#check_pass_success').hide();
                 }, 2000);
	}
   });
   




$('#register-form-data').on('submit', function(event){
	 
       event.preventDefault();
	
	    var formData = new FormData()
	    var formDataO = $('#register-form-data').serialize();
		formData.append('the_data', formDataO)
	
	
		$.ajax({
        url:'<?php echo $path_obj->adminpath("register"); ?>/action/signup-submit.php',
		type:'post',
        data:formData,
        processData:false,
        contentType:false,
        
        success:function(result){
			
			
			var data = $.parseJSON(result)
			if(data.status == 1){
			$('#register-form-data')[0].reset();
			$('#result_show').html("<p id='error'>"+data.message+"<p>").css("color","red");
			
			setTimeout(function () {
			$('#error').hide();
                 }, 2500);

			}

			else{

				$('#register-form-data')[0].reset();
			    $('#result_show').html("<p id='success'>"+data.message+"<p>").css("color","green");
				setTimeout(function () {
			   $('#success').hide();
                 }, 2500);
				 setTimeout(function () {
					window.location = '<?php echo $path_obj->adminpath("dashboard"); ?>'; 
                 }, 3000);
				
				
				
				
			}
        }
    });


  

});
});
</script>

<script>
	
	//login form

$('#login-form').on('submit', function(event){
    event.preventDefault();
	var formData = new FormData()
	var formDataO = $('#login-form').serialize();
	 formData.append('login_data', formDataO)
	
	
		$.ajax({
        url:'<?php echo $path_obj->adminpath("login"); ?>/action/login-submit.php',
		type:'post',
        data:formData,
        processData:false,
        contentType:false,
        
        success:function(result){
			
			var data = $.parseJSON(result)
    			if(data.status == 1){
    			    $('#login-form')[0].reset();
    			    $('#result_show').html("<p id='success'>"+data.message+"<p>").css("color","green")
    				setTimeout(function () {
    			        $('#success').hide()
    			        window.location = '<?php echo $path_obj->adminpath("dashboard"); ?>'
                    }, 1000);
    			}else{
                	$('#login-form')[0].reset()
        			$('#result_show').html("<p id='error'>"+data.message+"<p>").css("color","red")
    			}
			
		}

	});
		

	});

</script>
<script>

var logoutTimer = setTimeout(function() {
   
    window.location.href = '<?php echo $path_obj->adminpath("logout"); ?>'; 
}, 300000); 
</script>
<script>

var logoutTimer = setTimeout(function() {
   
    window.location.href = '<?php echo $path_obj->adminpath("logout"); ?>'; 
}, 300000); 
</script>

<script>
	 
        $(document).ready(function() {
          // List of USA states
          var usaStates = [
            "Alabama", "Alaska", "Arizona", "Arkansas", "California",
            "Colorado", "Connecticut", "Delaware", "Florida", "Georgia",
            "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa",
            "Kansas", "Kentucky", "Louisiana", "Maine", "Maryland",
            "Massachusetts", "Michigan", "Minnesota", "Mississippi", "Missouri",
            "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey",
            "New Mexico", "New York", "North Carolina", "North Dakota", "Ohio",
            "Oklahoma", "Oregon", "Pennsylvania", "Rhode Island", "South Carolina",
            "South Dakota", "Tennessee", "Texas", "Utah", "Vermont",
            "Virginia", "Washington", "West Virginia", "Wisconsin", "Wyoming"
          ];
		  var stateDropdown = $("#stateDropdown");
          $.each(usaStates, function(index, state) {
            stateDropdown.append($("<option>").text(state));
          });
		  var profile_phone = $("#profile_phone");
		  profile_phone.on("input", function() {
				var phone = $(this).val();
				var Length = 10;

				if (phone.length !== Length) {
				
					$("#phone-error").html("<p>Phone number should be 10 digit.!<p>").css("color","red");
					
				} else {
				
					$("#phone-error").text("");
				}
			});

    $('#profile-form').on('submit', function(event){
			event.preventDefault();
			
			var formData = new FormData()
			var formDataO = $('#profile-form').serialize();
			
			formData.append('profile_data', formDataO);
			formData.append('profile_image', $('input[type=file]')[0].files[0]); 
			
			
			
				$.ajax({
				url:'<?php echo $path_obj->adminpath("profile"); ?>/action/profile-submit.php',
				type:'post',
				data:formData,
				processData:false,
				contentType:false,
				
				success:function(result){
					
			
					var data = $.parseJSON(result)
					if(data.status == 1){
					
					$('#result_show').html("<p id='error'>"+data.message+"<p>").css("color","red");
					
					setTimeout(function () {
					$('#error').hide();
					
						}, 1500);

					}

					else{

						
						$('#result_show').html("<p id='success'>"+data.message+"<p>").css("color","green");
						setTimeout(function () {
						window.location = '<?php echo $path_obj->adminpath("profile"); ?>'; 
					   $('#success').hide();
					   
						}, 1500);
						
						
						
						
						
					}


					
				}

				});
		

	});

		});
</script>

<script src="<?php echo $path_obj->assetspath("js"); ?>/datatables.js"></script>

<script>
	document.addEventListener("DOMContentLoaded", function() {
		// Datatables with Multiselect
		var datatablesMulti = $("#datatables-multi").DataTable({
			responsive: true,
			select: {
				style: "multi"
			}
		});
	});
</script>
<script>
document.addEventListener("DOMContentLoaded", function(event) { 
setTimeout(function(){
  if(localStorage.getItem('popState') !== 'shown'){
	window.notyf.open({
	  type: "success",
	  message: "Get access to all 500+ components and 45+ pages with AdminKit PRO. <u><a class=\"text-white\" href=\"https://adminkit.io/pricing\" target=\"_blank\">More info</a></u> 🚀",
	  duration: 10000,
	  ripple: true,
	  dismissible: false,
	  position: {
		x: "left",
		y: "bottom"
	  }
	});

	localStorage.setItem('popState','shown');
  }
}, 15000);
});
</script>


<script>
	// schedule create modal

// Open the modal when the button is clicked
$('#openModalButton').click(function() {
    $('#myModal').modal('show');
});

// Close the modal when the close button or "Close" is clicked
$('#myModal .close, #myModal .modal-footer .btn-secondary').click(function() {
    $('#myModal').modal('hide');
});
</script>

<script>
	//edit schedule modal

	$( document ).ready(function() {

	$('.modal-edit').bind('click', function(e) {
		e.preventDefault();
		var id    = $(this).data("id");
		
		$('#myModal-edit-'+id).modal('show');
		
		$('.close, .modal-footer .btn-secondary').click(function() {
		
		
		$('#myModal-edit-'+id).modal('hide');
	});




	$('#session-edit-'+id).on('submit', function(event){
    event.preventDefault();
	
	var formData = new FormData()
	var formDataO = $('#session-edit-'+id).serialize();
	formData.append('scheduled_edit_data', formDataO)
	
	
	$.ajax({
	url:'<?php echo $path_obj->adminpath("schedule"); ?>/action/schedule-edit.php',
	type:'post',
	data:formData,
	processData:false,
	contentType:false,
	
	success:function(result){
		
		var data = $.parseJSON(result)
		
			if(data.status == 1){
				
			
			$('#result_edit-'+id).html("<p id='error_edit'>"+data.message+"<p>").css("color","red");
			
			
			setTimeout(function () {
			$('#session-edit-'+id)[0].reset();
			$('#error_edit').hide();
                 }, 2500);

			}

			else{
				

				
			    $('#result_edit-'+id).html("<p id='success_edit'>"+data.message+"<p>").css("color","green");
				
				setTimeout(function () {
				$('#session-edit-'+id)[0].reset();
			   $('#success_edit').hide();
			   window.location = '<?php echo $path_obj->adminpath("schedule"); ?>'; 
                 }, 2500);
				 
				
				
				
				
			}
	}
	
	
	
	});
});
	
});
});
</script>

<script>
	$('#session-create-form').on('submit', function(event){
    event.preventDefault();
	var formData = new FormData()
	var formDataO = $('#session-create-form').serialize();

	 formData.append('scheduled_data', formDataO)
	
	
		$.ajax({
        url:'<?php echo $path_obj->adminpath("schedule"); ?>/action/scheduled-submit.php',
		type:'post',
        data:formData,
        processData:false,
        contentType:false,
        
        success:function(result){
			
			var data = $.parseJSON(result)
			if(data.status == 1){
			$('#session-create-form')[0].reset();
			$('#result_message').html("<p id='error'>"+data.message+"<p>").css("color","red");
			
			setTimeout(function () {
			$('#error').hide();
                 }, 2500);

			}

			else{

				$('#session-create-form')[0].reset();
			    $('#result_message').html("<p id='success'>"+data.message+"<p>").css("color","green");
				setTimeout(function () {
			   $('#success').hide();
                 }, 2500);
				 setTimeout(function () {
					window.location = '<?php echo $path_obj->adminpath("schedule"); ?>'; 
                 }, 2000);
				
				
				
				
			}
		}
			
		});

	});
		
	


</script>


</body>


</html>