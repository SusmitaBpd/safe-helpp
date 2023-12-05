<?php 
error_reporting(0);
session_start();

	$id = $_SESSION['therapist_id'];
	$where_condition = array('therapist_id' => $id );
	


//create obj

$fetch_obj = new Crud();

	

// table register
$table = 'therapist_register';
$fetch_data = $fetch_obj->read_with_condition($table,$where_condition);
$result =  mysqli_fetch_assoc($fetch_data);

$username = $result['register_username'];

// table profile

$table_profile = 'therapist_profile';
$table_info = 'therapist_information';

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
									<form id="profile-form" enctype="multipart/form-data">
										
										<div class="mb-3">
											<label class="form-label">Email address</label>
											<input type="email" class="form-control" placeholder="Email" name="profile_email" value="<?php echo $result['register_email'] ;?>" required>
										</div>
										<div class="mb-3">
											<label class="form-label">Phone Number</label>
											<input type="tel" class="form-control" placeholder="Phone Number" name="profile_phone"  id="profile_phone"  value="<?php echo $phone ;?>" required>
											<div id="phone-error"></div>
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input type="password" class="form-control" placeholder="Password"  name="profile_pass" value="<?php echo $result['register_pass'] ;?>" required>
										</div>
										
										<div class="mb-3">
											<label class="form-label">Profile Picture</label>
											<input class="form-control" type="file" name="profile_pic" name="profile_pic" value="<?php echo $result_prof['profile_picture'] ; ?>" >
										</div>
										<div class="mb-3">
											<label class="form-label">Designation</label>
											<input class="form-control" type="text" name="profile_designation" value="<?php echo $result_prof['designation'] ; ?>" >
										</div>
										<div class="mb-3">
											<label class="form-label">About</label>
											<textarea class="form-control" name="about_text" placeholder="About Yourself" rows="3"><?php echo $result_prof['about_therapist'] ; ?></textarea>
										</div>
										<div class="mb-3">
											<label class="form-label">Therapists Serving</label>
											<input class="form-control" type="text" name="profile_address" value="<?php echo $address ; ?>">
										</div>
										
										<div class="row">
											<div class="mb-3 col-md-6">
													<label class="form-label" for="stateDropdown">State</label>
													<select id="stateDropdown" class="form-control" name="profile_state">
														<?php if($result_prof['state']){?>
													    <option selected><?php echo $result_prof['state'] ; ?></option>
														<?php  }else{?>
														<option selected>Choose...</option>
														<?php } ?>
														
													</select>
												</div>
											<div class="mb-3 col-md-6">
												<label class="form-label" for="profile_city">City</label>
												<input type="text" class="form-control" id="profile_city" name="profile_city" value ="<?php echo $result_prof['city'] ; ?>">
											</div>
											
											
										</div>
										<div class="row">
											<div class="mb-3 col-md-6">
													<label class="form-label" for="y_o_exp">Year Of Experience</label>
													<input type="text" class="form-control" id="y_o_exp" name="y_o_exp" value ="<?php echo $result_prof['y_o_exp'] ; ?>">
												</div>
											<div class="mb-3 col-md-6">
												<label class="form-label" for="inputCity">Language Known</label>
												<input type="text" class="form-control" id="language" name="language" value ="<?php echo $result_prof['language'] ; ?>">
											</div>
											<div class="mb-3 col-md-6">
												<label class="form-label" for="inputCity">Therapist specialties</label>
												<input type="text" class="form-control" id="therapist_specialties" name="therapist_specialties" value ="<?php echo $result_prof['therapist_specialty'] ; ?>">
											</div>
											<div class="mb-3 col-md-6">
												<label class="form-label" for="therapy_license">Therapist License</label>
												<input type="text" class="form-control" id="therapy_license" name="therapy_license" value ="<?php echo $result_prof['therapy_license'] ; ?>">
											</div>
											<div class="mb-3 col-md-6">
												<label class="form-label" for="category-therapy">Category Therapy</label><br>
												<?php 
													$selected_category = $result_prof['category_therapy'];
												    $category_arr = explode(", ",$selected_category);
													?>
												
												<input type="checkbox" id="individual-therapy" name="category_therapy[]" value="Individual Therapy" <?php if(in_array('Individual Therapy',$category_arr,TRUE)){ echo 'checked' ;} ?> />
												<label for="individual-therapy"> Individual Therapy</label><br>

												<input type="checkbox"  id="couples-therapy"  name="category_therapy[]" value="Couples Therapy" <?php if(in_array('Couples Therapy',$category_arr,TRUE)){ echo 'checked' ;} ?>/>
												<label for="couples-therapy"> Couples Therapy</label><br>

												<input type="checkbox"  id="child-therapy" name="category_therapy[]" value="Child/Teenagers Therapy" <?php if(in_array('Child/Teenagers Therapy',$category_arr,TRUE)){ echo 'checked' ;} ?>/>
												<label for="child-therapy"> Child/Teenagers Therapy</label> <br><br>
												<?php $selectedValues = $result_prof['category_therapy'];
												
												 echo 'Selected category : '.$selectedValues;
												?>
												
											</div>
											<div class="mb-3 col-md-6">
												<label class="form-label" for="inputCity">Christian Based Therapy</label><br>
												<input type="radio" id="christian_based_therapy_yes" name="christian_based_therapy" value="Yes" <?php if($result_prof['christian_based_therapy'] == 'Yes'){echo 'checked';} ?>>
												 <label for="christian_based_therapy_yes">Yes</label><br>
												 <input type="radio" id="christian_based_therapy_no" name="christian_based_therapy" value="No" <?php if($result_prof['christian_based_therapy'] == 'No'){echo 'checked';} ?>>
												 <label for="christian_based_therapy_no">No</label>
												 
											</div>
											<div class="mb-3 col-md-6">
												<label class="form-label" for="inputCity">Select Insurance</label>
												<select id="insurance" name="accepted_insurance[]" class="form-control" multiple>
													<?php 
													$selectedVal = $result_prof['accepted_insurance'];
												    $insurance_arr = explode(", ",$selectedVal);
													?>
												    <option value="Aetna" <?php if(in_array('Aetna',$insurance_arr,TRUE)){ echo 'selected' ;} ?>>Aetna</option>
													<option value="Amwell" <?php if(in_array("Amwell",$insurance_arr,TRUE)){ echo 'selected' ;} ?>>Amwell</option>
													<option value="Blue Cross Blue Shield Association" <?php if(in_array('Blue Cross Blue Shield Association',$insurance_arr)){ echo 'selected' ;} ?>>Blue Cross Blue Shield Association</option>
													<option value="Cigna" <?php if(in_array('Cigna',$insurance_arr)){ echo 'selected' ;} ?>>Cigna</option>
													<option value="FAQs" <?php if(in_array('FAQs',$insurance_arr)){ echo 'selected' ;} ?>>FAQs</option>
													<option value="Final Verdict" <?php if(in_array('Final Verdict',$insurance_arr)){ echo 'selected' ;} ?>>Final Verdict</option>
													<option value="HealthChoice" <?php if(in_array('HealthChoice',$insurance_arr)){ echo 'selected' ;} ?>>HealthChoice</option>
													<option value="Kaiser" <?php if(in_array('Kaiser',$insurance_arr)){ echo 'selected' ;} ?>>Kaiser</option>
													<option value="Oscar Health" <?php if(in_array('Oscar Health',$insurance_arr)){ echo 'selected' ;} ?>>Oscar Health</option>
													<option value="Talkspace" <?php if(in_array('Talkspace',$insurance_arr)){ echo 'selected' ;} ?>>Talkspace</option>
													<option value="UnitedHealthcare" <?php if(in_array('UnitedHealthcare',$insurance_arr,TRUE)){ echo 'selected' ;} ?>>UnitedHealthcare</option>
													
												</select>
												<br>
												<?php
												 echo 'Accepted Insurance : '.$selectedVal;
												
												 
												?>
												
												<!-- <input type="text" class="form-control" id="accepted_insurance" name="accepted_insurance" value ="<?php echo $result_prof['accepted_insurance'] ; ?>"> -->
											</div>
											<div class="mb-3 col-md-6">
												<label class="form-label" for="inputCity">Therapist Fees($)</label>
												<input type="text" class="form-control" id="therapist_fees" name="therapist_fees" placeholder="$" value ="<?php echo $result_prof['therapist_fees'] ; ?>">
											</div>
											
											
										</div>
									<?php	if(!isset($_GET['id'])) { ?>
										<button type="submit" class="btn btn-primary">Update</button>
									    <div id="result_show"></div>
										<?php } ?>
									</form>
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