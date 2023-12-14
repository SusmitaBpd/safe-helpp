<?php 
require_once '../../controller/class/classDbcon.php';

$delete_obj = new Crud();

if (isset($_GET['id'])) {

	$id = $_GET['id'];
	$where_condition = array('id' => $id );
}
$table = 'booked_appointment';


$delete_register = $delete_obj->delete($table,$where_condition);

if($delete_register){
header("Location: ../"); 
   
}else{
    'failed!';
}
?> 