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
		   position: absolute;
		   margin-top: -30px;
		   margin-left: 371px;
	   }
	   .closed
	   {
		   display: none;
		   color: steelblue;
		   font-size: 1.5em;
		   position: absolute;
		   margin-top: -30px;
		   margin-left: 371px;
	   }
	   /* i
	   {
		   position: absolute;
		   margin-top: -30px;
		   margin-left: 370px;
	   } */

	.loader {
	display:none;	
    color: #000000d9;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    position: relative;
    animation: rotate 1s linear infinite;
    border: 5px solid;
    border-top-color: #495057;
	position: absolute;
	left: 21px;
}
    .loader::before {
      content: "";
      box-sizing: border-box;
      position: absolute;
      inset: 0px;
      border-radius: 50%;
      border: 5px solid #FFF;
      animation: prixClipFix 2s linear infinite ;
    }
	.modal-footer{
		position: relative;
	}

    @keyframes rotate {
      100%   {transform: rotate(360deg)}
    }

    @keyframes prixClipFix {
        0%   {clip-path:polygon(50% 50%,0 0,0 0,0 0,0 0,0 0)}
        25%  {clip-path:polygon(50% 50%,0 0,100% 0,100% 0,100% 0,100% 0)}
        50%  {clip-path:polygon(50% 50%,0 0,100% 0,100% 100%,100% 100%,100% 100%)}
        75%  {clip-path:polygon(50% 50%,0 0,100% 0,100% 100%,0 100%,0 100%)}
        100% {clip-path:polygon(50% 50%,0 0,100% 0,100% 100%,0 100%,0 0)}
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
