<?php 

error_reporting(0);
session_start();

$id = $_SESSION['therapist_id'];
$where_condition = array('therapist_id' => $id );

$fetch_obj = new Crud();
$path_obj = new Includepath();

$table = 'therapist_scheduled_session';

$fetch_data = $fetch_obj->read($table);

$admin_id = "SH6544bcb0f20a6";


?>

	

<main class="content">
				<div class="container-fluid p-0">
					<div class="row">
						<div class="col-md-3">
							<div class="mb-3">
								<h1 class="h3 d-inline align-middle">Schedule a Session</h1>
							</div>
						</div>
						<div class="col-md-9">
							<button type="button" class="btn btn-primary" id="openModalButton">Add a Session</button>

						</div>
					</div>
					
					
					<div class="row">
						<div class="col-12">
							
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">All Sessions </h5>
									
								</div>
								<div class="card-body">
									<table id="datatables-orders" class="table table-responsive table-striped" style="width:100%">
									<thead>
									<tr>
										<th>Index</th>
										<th >Session Title</th>
										<th>Therapist Name</th>
										<th>Therapist Email</th>
										<th>Therapist Phone</th>
										<th>Specialties</th>
										<th>Schedule  Date</th>
										<th>Schedule  Time</th>
										<th>Actions</th>
										
										
									</tr>
								</thead>
								<tbody>
								
								<?php    while($row = $fetch_data->fetch_assoc()) {?>
									<tr>
									   
										<td><strong><?php echo $row['id'] ; ?></strong></td>
										<td><strong><?php echo $row['session_title'] ; ?></strong></td>
										<td><?php echo $row['therapist_name'] ; ?></td>
										<td><?php echo $row['therapist_email'] ; ?></td>
										<td><?php echo $row['therapist_phone'] ; ?></td>
										<td><?php echo $row['speciality'] ; ?></td>
										<td><?php echo $row['session_date'] ; ?></td>
										<td><?php echo $row['scheduled_time'] ; ?></td>
										<td> <?php if($id == $row['therapist_id']){ ?>
											<a href="#" data-id="<?php echo $row['id']; ?>" 
											
											class="btn btn-primary modal-edit btn-sm" id="edit-session-modal">Edit</a>
											<a href="<?php echo $path_obj->adminpath("schedule"); ?>/action/remove-schedule.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Remove</a>
										<?php }elseif($id == $admin_id){ ?><a href="#" data-id="<?php echo $row['id']; ?>" 
											
											class="btn btn-primary modal-edit btn-sm" id="edit-session-modal">Edit</a>
											<a href="<?php echo $path_obj->adminpath("schedule"); ?>/action/remove-schedule.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Remove</a><?php } ?>
										</td>
									</tr>
									<?php } ?>
									
								
								
									
									
									
									
								</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>


		



<!-- Bootstrap Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Add New Session</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="session-create-form">
                    <div class="form-group">
                        <label for="session_title">Session Title</label>
                        <input type="text" class="form-control" id="session_title" name="session_title" required>
                    </div>
					<div class="form-group">
                        <label for="therapist_name">Therapist Name</label>
                        <input type="text" class="form-control" id="therapist_name" name="therapist_name" required>
                    </div>
                    <div class="form-group">
                        <label for="therapist_email">Therapist Email</label>
                        <input type="email" class="form-control" id="therapist_email" name="therapist_email" required>
                    </div>
					<div class="form-group">
                        <label for="therapist_phone">Therapist Phone </label>
                        <input type="tel" class="form-control" id="therapist_phone" name="therapist_phone" required pattern="[6-9]{1}[0-9]{9}" 
       title="Phone number start with 6-9 and remaing 9 digit with 0-9">
                    </div>
					<div class="form-group">
                        <label for="speciality">Specialties  </label>
                        <input type="text" class="form-control" id="speciality" name="speciality" required>
                    </div>
					<div class="form-group">
						<label for="session_date">Session Date</label>
						<input type="date" class="form-control"  id="session_date" name="session_date" required>
                    </div>
					<div class="form-group">
						<label for="scheduled_time">Scheduled Time</label>
						<input type="time" class="form-control" id="scheduled_time" name="scheduled_time" required>
                    </div>
					

	
                
            </div>
					<div id="result_message" class="text-center"></div>					
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="submit" name="submit" class="btn btn-primary">Save</button>
            </div>
			</form>
        </div>
    </div>
</div>


<?php   foreach($fetch_data as $row) {?>

<!-- Bootstrap Modal -->
<div class="modal" id="myModal-edit-<?php  echo $row['id'];  ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Edit The Session</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="session-edit-<?php  echo $row['id'];  ?>">
                    <div class="form-group">
						<input type="hidden" name="edit_session_id" value="<?php  echo $row['id'];  ?>">
                        <label for="session_title">Session Title</label>
                        <input type="text" class="form-control" id="session_title_edit" name="session_title_edit" value="<?php echo $row['session_title'] ; ?>">
                    </div>
					<div class="form-group">
                        <label for="therapist_name_edit">Therapist Name</label>
                        <input type="text" class="form-control" id="therapist_name_edit" name="therapist_name_edit" value="<?php echo $row['therapist_name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="therapist_email">Therapist Email</label>
                        <input type="email" class="form-control" id="therapist_email_edit" name="therapist_email_edit" value="<?php echo $row['therapist_email']; ?>">
                    </div>
					<div class="form-group">
                        <label for="therapist_phone">Therapist Phone </label>
                        <input type="tel" class="form-control" id="therapist_phone_edit" name="therapist_phone_edit" value="<?php echo $row['therapist_phone']; ?>">
                    </div>
					<div class="form-group">
                        <label for="speciality">Specialties  </label>
                        <input type="text" class="form-control" id="speciality_edit" name="speciality_edit" value="<?php echo $row['speciality']; ?>">
                    </div>
					<div class="form-group">
						<label for="session_date">Session Date</label>
						<input type="date" class="form-control"  id="session_date_edit" name="session_date_edit" value="<?php echo $row['session_date']; ?>">
                    </div>
					<div class="form-group">
						<label for="scheduled_time">Scheduled Time</label>
						<input type="time" class="form-control" id="scheduled_time" name="scheduled_time_edit" value="<?php echo $row['scheduled_time']; ?>">
                    </div>
					

	
                
            </div>
			<div id="result_edit-<?php  echo $row['id'];  ?>" class="text-center"></div>	
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-edit" data-dismiss="modal">Close</button>
                <button type="submit" id="submit" name="submit" class="btn btn-primary">Save</button>
            </div>
			</form>
        </div>
    </div>
</div>
<?php } ?>