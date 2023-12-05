<?php
session_set_cookie_params(300); 
session_start();
if(isset($_SESSION['therapist_id'])){
$user_id = $_SESSION['therapist_id'];}
 require_once '../controller/class/classInclude.php'; 
 require_once '../controller/class/classDbcon.php';

 $path_obj = new Includepath();
 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="preconnect" href="https://fonts.gstatic.com/">
	<link rel="shortcut icon" href="<?php echo $path_obj->assetspath("img"); ?>/icons/icon-48x48.png" />

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&amp;display=swap" rel="stylesheet">

	<link class="js-stylesheet" href="<?php echo $path_obj->assetspath("css"); ?>/light.css" rel="stylesheet">
	
	<style>
       
	   .open
	   {
		   color: gray;
		   font-size: 1.5em;
	   }
	   .closed
	   {
		   display: none;
		   color: steelblue;
		   font-size: 1.5em;
	   }
	   i
	   {
		   position: absolute;
		   margin-top: -30px;
		   margin-left: 370px;
	   }
	   
   </style>
	
	<style>
		body {
			opacity: 0;
		}
	</style>
	<!-- END SETTINGS -->
   <!-- <script async src="<?php echo $path_obj->assetspath("img"); ?>/s://www.googletagmanager.com/gtag/js?id=UA-120946860-10"></script> -->

</script>

</head>
<body>
