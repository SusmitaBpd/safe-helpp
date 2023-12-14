<?php 
error_reporting(0);
session_start();

if (isset($_SESSION['therapist_id'])) {

	$id = $_SESSION['therapist_id'];

	$fetch_obj = new Crud();

	$table = 'therapist_register';
	$table_profile = 'therapist_profile';

     $where_condition = array(
    'therapist_id' => $id
);

$fetch_data = $fetch_obj->read_with_condition($table,$where_condition);
$fetch_profile_data = $fetch_obj->read_with_condition($table_profile,$where_condition);

$result =  mysqli_fetch_assoc($fetch_data);

$result_profile =  mysqli_fetch_assoc($fetch_profile_data);

$username = $result['register_username'];
$user_type = $result['user_type'];



}



?>
<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class='sidebar-brand' href='index.html'>
					<span class="sidebar-brand-text align-middle">
						Admin
						
					</span>
					<svg class="sidebar-brand-icon align-middle" width="32px" height="32px" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="1.5"
						stroke-linecap="square" stroke-linejoin="miter" color="#FFFFFF" style="margin-left: -3px">
						<path d="M12 4L20 8.00004L12 12L4 8.00004L12 4Z"></path>
						<path d="M20 12L12 16L4 12"></path>
						<path d="M20 16L12 20L4 16"></path>
					</svg>
				</a>

				<div class="sidebar-user">
					<div class="d-flex justify-content-center">
						<div class="flex-shrink-0">
							<img src="<?php echo $path_obj->adminpath("uploads/").$result_profile['profile_picture']; ?>" class="avatar img-fluid rounded me-1" alt="Charles Hall" />
						</div>
						<div class="flex-grow-1 ps-2">
							<a class="sidebar-user-title dropdown-toggle" href="#" data-bs-toggle="dropdown">
								<?php echo $username; ?>
							</a>
							<div class="dropdown-menu dropdown-menu-start">
								<a class='dropdown-item' href='../profile'><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								
								
								<div class="dropdown-divider"></div>
								<?php if($user_type=="admin"){ ?><a class="dropdown-item" href="../register" target="_blank">Register</a><?php } ?>
								<a class="dropdown-item" href="../logout">Log out</a>
							</div>

							<div class="sidebar-user-subtitle"><?php  echo $result_profile['designation'] ; ?></div>
						</div>
					</div>
				</div>

				<ul class="sidebar-nav">
					
					
					<li class="sidebar-item">
						<a class='sidebar-link' href='../therapist'>
							<i class="align-middle" data-feather="user"></i> <span class="align-middle">Therapist</span>
						</a>
					</li>
					
					<li class="sidebar-item">
						<a class='sidebar-link' href='../profile'>
							<i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
						</a>
					</li>

					 

					<li class="sidebar-item">
						<a class='sidebar-link' href='../schedule'>
							<i class="align-middle" data-feather="list"></i> <span class="align-middle">Schedule</span>
							
						</a>
					</li>
					<li class="sidebar-item">
						<a class='sidebar-link' href='../appointment'>
							<i class="align-middle" data-feather="list"></i> <span class="align-middle">Appointment</span>
							
						</a>
					</li>

					

					<li class="sidebar-item">
						<a href="#auth" data-bs-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="users"></i> <span class="align-middle">Auth</span>
						</a>
						<ul id="auth" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<?php if(!$username) {?>
							<li class="sidebar-item"><a class='sidebar-link' href='../login/'>Sign In</a></li>
							<?php }?>
							
							<li class="sidebar-item"><a class='sidebar-link' href='../register/' target="_blank">Sign Up</a></li>
							
							
						</ul>
					</li>

				
					</li>
				</ul>

				
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
					<i class="hamburger align-self-center"></i>
				</a>

				<form class="d-none d-sm-inline-block">
					<div class="input-group input-group-navbar">
						<input type="text" class="form-control" placeholder="Search…" aria-label="Search">
						<button class="btn" type="button">
							<i class="align-middle" data-feather="search"></i>
						</button>
					</div>
				</form>

				

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						
						
						<li class="nav-item dropdown">
							<a class="nav-flag dropdown-toggle" href="#" id="languageDropdown" data-bs-toggle="dropdown">
								<img src="<?php echo $path_obj->assetspath("img"); ?>/flags/us.png" alt="English" />
							</a>
							<div class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
								<a class="dropdown-item" href="#">
									<img src="<?php echo $path_obj->assetspath("img"); ?>/flags/us.png" alt="English" width="20" class="align-middle me-1" />
									<span class="align-middle">English</span>
								</a>
								<a class="dropdown-item" href="#">
									<img src="<?php echo $path_obj->assetspath("img"); ?>/flags/es.png" alt="Spanish" width="20" class="align-middle me-1" />
									<span class="align-middle">Spanish</span>
								</a>
								<a class="dropdown-item" href="#">
									<img src="<?php echo $path_obj->assetspath("img"); ?>/flags/ru.png" alt="Russian" width="20" class="align-middle me-1" />
									<span class="align-middle">Russian</span>
								</a>
								<a class="dropdown-item" href="#">
									<img src="<?php echo $path_obj->assetspath("img"); ?>/flags/de.png" alt="German" width="20" class="align-middle me-1" />
									<span class="align-middle">German</span>
								</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-icon js-fullscreen d-none d-lg-block" href="#">
								<div class="position-relative">
									<i class="align-middle" data-feather="maximize"></i>
								</div>
							</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon pe-md-0 dropdown-toggle" href="#" data-bs-toggle="dropdown">
								<img src="<?php echo $path_obj->adminpath("uploads/").$result_profile['profile_picture']; ?>" class="avatar img-fluid rounded" alt="Charles Hall" />
							</a>
							<!-- <div class="dropdown-menu dropdown-menu-end">
								<a class='dropdown-item' href='pages-profile.html'><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class='dropdown-item' href='pages-settings.html'><i class="align-middle me-1" data-feather="settings"></i> Settings &
									Privacy</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Log out</a>
							</div> -->
						</li>
					</ul>
				</div>
			</nav>