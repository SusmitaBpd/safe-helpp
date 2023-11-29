<?php include '../inc/header.php' ; ?>

<?php include '../inc/nav-sidebar.php' ; ?>

<?php 

if (isset($_GET['id'])) {

	$id = $_GET['id'];
	
	$where_condition = array('therapist_id' => $id );
}

	$fetch_obj = new Crud();
	$table = 'therapist_register';

   
// table register

$fetch_data = $fetch_obj->read_with_condition($table,$where_condition);
$result =  mysqli_fetch_assoc($fetch_data);

$username = $result['register_username'];


$table_profile = 'therapist_profile';
$table_info = 'therapist_information';

// table profile

$profile_data = $fetch_obj->read_with_condition($table_profile,$where_condition);
$result_prof =  mysqli_fetch_assoc($profile_data);

$designation = $result_prof['designation'];

// info table data

$info_data = $fetch_obj->read_with_condition($table_info,$where_condition);
$result_info =  mysqli_fetch_assoc($info_data);

$phone = $result_info['therapist_phone'];
$address = $result_info['therapist_address'];
?>

<main class="content">
				<div class="container-fluid p-0">

					

					<div class="row">
						<div class="col-md-4 col-xl-3">
							<div class="card mb-3">
								<div class="card-header">
									<h5 class="card-title mb-0">Profile Details</h5>
								</div>
								<div class="card-body text-center">
									<img src="<?php echo $path_obj->adminpath("uploads/").$result_prof['profile_picture']; ?>" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="128" height="128" />
									<h5 class="card-title mb-0"><?php echo $username; ?></h5>
									<div class="text-muted mb-2"><?php echo $result_prof['designation'] ; ?></div>

									
								</div>
								
								<hr class="my-0" />
								<div class="card-body">
									<h5 class="h6 card-title">About</h5>
									<div class="text-muted mb-2"><?php echo $result_prof['about_therapist'] ; ?></div>
								</div>
								
							</div>
						</div>

		<div class="col-md-8 col-xl-9">
			
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Profile Info</h1>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="card">
								
								<div class="card-body">
									
									<div class="row">
										<div class=" col-md-4"><label class="form-label"><b>Email address : </b></label></div>

										<div class=" col-md-8"><p class="p-1"><?php echo $result['register_email'] ;?></p></div>
											
									</div>
									<div class="row">
										<div class=" col-md-4"><label class="form-label"><b>Phone Number : </b></label></div>

										<div class=" col-md-8"><p class="p-1"><?php echo $phone ;?></p></div>
											
									</div>
									<div class="row">
										<div class=" col-md-4"><label class="form-label"><b>Designation</b></label></div>

										<div class=" col-md-8"><p class="p-1"><?php echo $result_prof['designation'] ;?></p></div>
											
									</div>
									<div class="row">
										<div class=" col-md-4"><label class="form-label"><b>About</b></label></div>

										<div class=" col-md-8"><p class="p-1"><?php echo $result_prof['about_therapist'] ;?></p></div>
											
									</div>
									
									<div class="row">
										<div class=" col-md-4"><label class="form-label"><b>State</b></label></div>

										<div class=" col-md-8"><p class="p-1"><?php echo $result_prof['state'] ;?></p></div>
											
									</div>
									<div class="row">
										<div class=" col-md-4"><label class="form-label"><b>City</b></label></div>

										<div class=" col-md-8"><p class="p-1"><?php echo $result_prof['city'] ;?></p></div>
											
									</div>
									<div class="row">
										<div class=" col-md-4"><label class="form-label"><b>Therapists Serving Locations</b></label></div>

										<div class=" col-md-8"><p class="p-1"><?php echo $address ;?></p></div>
											
									</div>
									<div class="row">
										<div class=" col-md-4"><label class="form-label"><b>Year Of Experience</b></label></div>

										<div class=" col-md-8"><p class="p-1"><?php echo $result_prof['y_o_exp'] ;?></p></div>
											
									</div>
									<div class="row">
										<div class=" col-md-4"><label class="form-label"><b>Language</b></label></div>

										<div class=" col-md-8"><p class="p-1"><?php echo $result_prof['language'] ;?></p></div>
											
									</div>
									<div class="row">
										<div class=" col-md-4"><label class="form-label"><b>Category Therapy</b></label></div>

										<div class=" col-md-8"><p class="p-1"><?php echo $result_prof['category_therapy'] ;?></p></div>
											
									</div>
									<div class="row">
										<div class=" col-md-4"><label class="form-label"><b>Therapist specialties</b></label></div>

										<div class=" col-md-8"><p class="p-1"><?php echo $result_prof['therapist_specialty'] ;?></p></div>
											
									</div>
									<div class="row">
										<div class=" col-md-4"><label class="form-label"><b>Therapist License(s)</b></label></div>

										<div class=" col-md-8"><p class="p-1"><?php echo $result_prof['therapy_license'] ;?></p></div>
											
									</div>
									<div class="row">
										<div class=" col-md-4"><label class="form-label"><b>Christian Based Therapy</b></label></div>

										<div class=" col-md-8"><p class="p-1"><?php echo $result_prof['christian_based_therapy'] ;?></p></div>
											
									</div>
									<div class="row">
										<div class=" col-md-4"><label class="form-label"><b>Accepted Insurance</b></label></div>

										<div class=" col-md-8"><p class="p-1"><?php echo $result_prof['accepted_insurance'] ;?></p></div>
											
									</div>
									<div class="row">
										<div class=" col-md-4"><label class="form-label"><b>Therapist Fees($)</b></label></div>

										<div class=" col-md-8"><p class="p-1"><?php echo $result_prof['therapist_fees'] ;?></p></div>
											
									</div>	
										
								</div>
							</div>
						</div>
						
						
						
					</div>

				</div>
			
						</div>
					</div>

				</div>
			</main>

			
		</div>
	</div>















<?php include '../inc/footer.php' ; ?>