<?php 
$user_id = $_SESSION['therapist_id'];
$path_obj = new Includepath();

$fetch_obj = new Crud();

//info data

$table = 'therapist_information';

$fetch_data = $fetch_obj->read($table);




//register data

$table_register = 'therapist_register';
$fetch_data_register = $fetch_obj->read($table_register);
$result_register =  mysqli_fetch_assoc($fetch_data_register);
$username = $resuresult_registerlt['register_username'];
$user_type = $result['user_type'];
$therapist_id = $result['therapist_id'];

?>

<main class="content">
				<div class="container-fluid p-0">
		
					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Profiles</h1>
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
										<th>Name</th>
										<th>Email</th>
										<th>Phone</th>
										<th>Date</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php while($result =  mysqli_fetch_assoc($fetch_data)){?>
									<tr>
										<td><strong><?php echo $result['id'] ; ?></strong></td>
										<td><?php echo $result['therapist_name'] ; ?></td>
										<td><?php echo $result['therapist_email'] ; ?></td>
										<td><?php echo $result['therapist_phone'] ; ?></td>
										<td><?php echo $result['date'] ; ?></td>

										

										<td>
											<a href="<?php echo $path_obj->adminpath("therapist/") ;?>single.php?id=<?php echo $result['therapist_id']; ?>" class="btn btn-primary btn-sm">View</a>
											<?php if($user_type== 'admin' || $result['therapist_id'] == $user_id ) {?>
											<a href="delete.php?id=<?php echo $result['therapist_id']; ?>"  data.id ="<?= $result['therapist_id'];  ?>" class=" delete_data btn btn-primary btn-sm">Delete</a>
											
										</td>
									</tr>
									<?php } }?>
									
									
									
									
								</tbody>
							</table>
						</div>
					</div>

				</div>
			</main>

