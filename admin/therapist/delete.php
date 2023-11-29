<?php 
require_once '../controller/class/classDbcon.php';

$delete_obj = new Crud();
if (isset($_GET['id'])) {

	$id = $_GET['id'];
	$where_condition = array('therapist_id' => $id );
}
$table_register = 'therapist_register';
$table_profile = 'therapist_profile';
$table_info = 'therapist_information';

$delete_register = $delete_obj->delete($table_register,$where_condition);
$delete_profile = $delete_obj->delete($table_profile,$where_condition);
$delete_info = $delete_obj->delete($table_info,$where_condition);

if($delete_register){
header("Location: ../therapist/"); 
   
}else{
    'failed!';
}
?> 