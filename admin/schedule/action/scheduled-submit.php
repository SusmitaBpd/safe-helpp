<?php

session_set_cookie_params(300); 
session_start();
$id = $_SESSION['therapist_id'];
$date = date('Y-m-d H:i:s');

require_once '../../controller/class/classDBcon.php'; 

$scheduled_data = array();
parse_str($_POST['scheduled_data'], $scheduled_data);

$therapist_name = $scheduled_data['therapist_name'];
$therapist_email = $scheduled_data['therapist_email'];

$insert_obj = new Crud();
$table = 'therapist_scheduled_session';
$session_data = array(
    'therapist_id'      =>  $id,
    'session_title'     => $scheduled_data['session_title'],
    'therapist_name'    => $scheduled_data['therapist_name'],
    'therapist_email'	=> $scheduled_data['therapist_email'],
    'therapist_phone'	=> $scheduled_data['therapist_phone'],
    'speciality'	    => $scheduled_data['speciality'],
    'session_date'	    => $scheduled_data['session_date'],
    'scheduled_time'	=> $scheduled_data['scheduled_time'],
    'date'              => $date
);

$insrt_sql = $insert_obj->insert($table, $session_data);
if($insrt_sql)
    {
        $response = array(
        'status'=> 0,
        'message' => 'Session hasbeen successfully created'
    ); 

}
echo json_encode($response);
exit;