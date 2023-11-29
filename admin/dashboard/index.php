<?php 

include '../inc/header.php' ; 
if (isset($_SESSION['therapist_id'])) { 
include '../inc/nav-sidebar.php' ;
include 'templates/views.php' ; 

include '../inc/footer.php' ; }else{


   header("Location: ../login/"); 
    exit();
} 


?>