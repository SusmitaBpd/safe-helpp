<?php 
error_reporting(0);

include '../inc/header.php' ; ?>


<?php if($_GET['token']){

$token = $_GET['token']; ?>

<main class="d-flex w-100 h-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Change Password</h1>
							<p class="lead">
								Create your new password.
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
									
									
									
									<form id="update-new-pass-form"  method="post">
									<input type="hidden" name="user_token" value="<?php echo $token; ?>">
                                    <div class="mb-3">
											<label class="form-label">New Password</label>
											<input class="form-control form-control-lg" type="password" id="pass" name="new_password" placeholder="Enter your new password" required />
											<i  id="closed" class="closed fa fa-eye fa-2x"></i>
    										<i id="open" class="open fa fa-eye-slash fa-2x"></i>
											<div id="passwordError"></div>
										</div>
										<div class="mb-3">
											<label class="form-label">Confirm Password</label>
											<input class="form-control form-control-lg" type="password" id="confirm-pass" name="new_comfirm_password" placeholder="Re-enter the password" required />
											<i  id="closed-confirm" class="closed fa fa-eye fa-2x"></i>
    										<i id="open-confirm" class="open fa fa-eye-slash fa-2x"></i>
										</div>
										<div id="CheckPasswordMatch"></div>
										<br>
                                        <div class="d-grid gap-2 mt-3">
											<button type="submit" id="submit" name="submit" class="btn btn-lg btn-primary" >Update</button>
											
											
										</div>
									</form>
                                    <br>
                                    <div class="text-center" id="result_message"></div>
									
								</div>
							</div>
						</div>
						<div class="text-center mb-3">
						<div id="result_show"></div>
							Go back to your account? <a href='../login'>Log In</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	

  	









<?php   
}else{ ?>

<?php include 'templates/views.php' ; }?>

<?php include '../inc/footer.php' ; ?>