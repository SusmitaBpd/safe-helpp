<?php 
$user_id = $_SESSION['therapist_id'];
$path_obj = new Includepath();

$fetch_obj = new Crud();

//info data

$table = 'booked_appointment';

$where_condition = array('psychiatrist_id' => $user_id );

$fetch_data = $fetch_obj->read_with_condition($table,$where_condition);




//register data

$table_register = 'therapist_register';
$fetch_data_register = $fetch_obj->read($table_register);
$result_register =  mysqli_fetch_assoc($fetch_data_register);
$username = $resuresult_registerlt['register_username'];
$user_type = $result['user_type'];
$therapist_id = $result['therapist_id'];

?>

<main class="content">
				<div class="container-fluid p-0" style='overflow-x:scroll;overflow-y:hidden;'>
		
					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Booked Appointment</h1>
					</div>

					<div class="card">
						<div class="card-header pb-0">
							<div class="card-actions float-end">
								
							</div>

						</div>
						<div class="card-body">
							<table id="datatables-orders" class="table table-responsive table-striped" width="100%">
								<thead>
									<tr>
										<th>Index</th>
										<!-- <th>Psychiatrist Name</th>
										<th>Psychiatrist Email</th>
										<th>Psychiatrist Phone</th> -->
                                        <th>Patients Name</th>
                                        <th>Patients Email</th>
                                        <th>Patients Phone</th>
										<th>Appointment date</th>
                                        <th>Appointment Time</th>
                                        <th>Booked For</th>
                                        <th>Action</th>
										
									</tr>
								</thead>
								<tbody>
									<?php while($result =  mysqli_fetch_assoc($fetch_data)){

                                        
                                        
                                        
                                        ?>
									<tr>
										<td><strong><?php echo $result['id'] ; ?></strong></td>
										<!-- <td><?php echo $result['psychiatrist_name'] ; ?></td>
										<td><?php echo $result['psychiatrist_email'] ; ?></td>
										<td><?php echo $result['psychiatrist_phone'] ; ?></td> -->
										<td><?php echo $result['booking_user_name'] ; ?></td>
                                        <td><?php echo $result['booking_user_email'] ; ?></td>
                                        <td><?php echo $result['booking_user_phone'] ; ?></td>
                                       
                                        <td><?php echo $result['booked_appointment_date'] ; ?></td>
                                        <td><?php echo $result['booked_appointment_time'] ; ?></td>
                                        <td><?php echo $result['booking_for'] ; ?></td>

										

										<td>
                                        
											<?php if($user_type== 'admin' || $result['psychiatrist_id'] == $user_id ) {?>
                                                <button type="button"  data-id="<?php echo $result['id']; ?>" 
											
											
                                                  id="appointment-approve-modal" <?php  if($result['status']=='approved'){ echo 'disabled' ; ?>  style="color:green; background:white;"  <?php } ?> class="modal-appointment btn btn-primary btn-sm" ><?php  if($result['status']=='approved'){echo 'Approved' ;}else{ echo 'Approve' ; }?></button>
                                                <a href="<?php echo $path_obj->adminpath("appointment"); ?>/action/remove-appointment.php?id=<?php echo $result['id']; ?>" class=" mt-2 remove_session btn btn-primary btn-sm">Remove</a>
                                                
                                                
                                                <?php } ?>
											
										</td>
									</tr>
									<?php } ?>
									
									
									
									
								</tbody>
							</table>
						</div>
					</div>

				</div>
			</main>

<?php   foreach($fetch_data as $result) {?>

<!-- Bootstrap Modal -->
<div class="modal" id="appointment-approve-<?php  echo $result['id'];  ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
               
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="appointment-edit-<?php  echo $result['id'];  ?>">
                <input type="hidden" name="edit_appointment_id" value="<?php  echo $result['id'];  ?>">
                <input type="hidden" name="edit_appointment_status" value="approved">
                <div class="container-fluid p-0">

<div class="mb-3">
    <h1 class="h3 d-inline align-middle">Appointment Details</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            
            <div class="card-body">
              <div class="row">
                    <div class=" col-md-4"><label class="form-label"><b>Psychiatrist Name : </b></label></div>

                    <div class=" col-md-8"><p class="p-1"><?php echo $result['psychiatrist_name'] ;?></p></div>
                        
                </div>
                
                <div class="row">
                    <div class=" col-md-4"><label class="form-label"><b>Psychiatrist Email : </b></label></div>

                    <div class=" col-md-8"><p class="p-1"><?php echo $result['psychiatrist_email'] ;?></p></div>
                        
                </div>
                <div class="row">
                    <div class=" col-md-4"><label class="form-label"><b>Psychiatrist Phone : </b></label></div>

                    <div class=" col-md-8"><p class="p-1"><?php echo $result['psychiatrist_phone'] ;?></p></div>
                        
                </div>
                <div class="row">
                    <div class=" col-md-4"><label class="form-label"><b>Patients Name :</b></label></div>

                    <div class=" col-md-8"><p class="p-1"><?php echo $result['booking_user_name'] ;?></p></div>
                        
                </div>
                <div class="row">
                    <div class=" col-md-4"><label class="form-label"><b>Patients Email :</b></label></div>

                    <div class=" col-md-8"><p class="p-1"><?php echo $result['booking_user_email'] ;?></p></div>
                        
                </div>
                
                <div class="row">
                    <div class=" col-md-4"><label class="form-label"><b>Patients Phone :</b></label></div>

                    <div class=" col-md-8"><p class="p-1"><?php echo $result['booking_user_phone'] ;?></p></div>
                        
                </div>
                <div class="row">
                    <div class=" col-md-4"><label class="form-label"><b>Appointment Date :</b></label></div>

                    <div class=" col-md-8"><p class="p-1"><?php echo $result['booked_appointment_date'] ;?></p></div>
                        
                </div>
                <div class="row">
                    <div class=" col-md-4"><label class="form-label"><b>Appointment Time :</b></label></div>

                    <div class=" col-md-8"><p class="p-1"><?php echo $result['booked_appointment_time'] ;?></p></div>
                        
                </div>
                <div class="row">
                    <div class=" col-md-4"><label class="form-label"><b>Booked For :</b></label></div>

                    <div class=" col-md-8"><p class="p-1"><?php echo $result['booking_for'] ;?></p></div>
                        
                </div>
                	
                    
            </div>
        </div>
    </div>
    
    
    
</div>

</div>
					

	
                
            </div>
			<div id="result_edit-<?php  echo $result['id'];  ?>" class="text-center"></div>	
           
            <!-- Modal Footer -->
            <div class="modal-footer">
                <span class="loader"></span>
                <button type="button" class="btn btn-secondary btn-edit" data-dismiss="modal">Close</button>
                <button type="submit" id="approve" name="submit" class=" btn btn-primary" >Approve </button>
            </div>
			</form>
        </div>
    </div>
</div>
<?php } ?>