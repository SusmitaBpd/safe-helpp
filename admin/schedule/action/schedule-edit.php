<?php 
require_once '../../controller/class/classDBcon.php'; 
$edit_obj = new Crud();

$scheduled_edit_data = array();
parse_str($_POST['scheduled_edit_data'], $scheduled_edit_data);

$id = $scheduled_edit_data['edit_session_id'];

$table = 'therapist_scheduled_session';
$where_condition = array('id' => $id );
if(!empty($scheduled_edit_data['scheduled_time_edit'])){
$session_data_edit = array(
    
    'session_title'     => $scheduled_edit_data['session_title_edit'],
    'therapist_name'    => $scheduled_edit_data['therapist_name_edit'],
    'therapist_email'	=> $scheduled_edit_data['therapist_email_edit'],
    'therapist_phone'	=> $scheduled_edit_data['therapist_phone_edit'],
    'speciality'	    => $scheduled_edit_data['speciality_edit'],
    'session_date'	    => $scheduled_edit_data['session_date_edit'],
    'scheduled_time'	=> $scheduled_edit_data['scheduled_time_edit'],
    
);

}else{
    $session_data_edit = array(
    'session_title'     => $scheduled_edit_data['session_title_edit'],
    'therapist_name'    => $scheduled_edit_data['therapist_name_edit'],
    'therapist_email'	=> $scheduled_edit_data['therapist_email_edit'],
    'therapist_phone'	=> $scheduled_edit_data['therapist_phone_edit'],
    'speciality'	    => $scheduled_edit_data['speciality_edit'],
    'session_date'	    => $scheduled_edit_data['session_date_edit'],
    //'scheduled_time'	=> $scheduled_edit_data['scheduled_time_edit'],
);
}
$update_sql = $edit_obj->update($table, $session_data_edit, $where_condition);

if($update_sql)
    {
        $response = array(
        'status'=> 0,
        'message' => 'Session hasbeen updated successfully'
    ); 

}
else{
    $response = array(
        'status'=> 1,
        'message' => 'Something went wrong'
    ); 
}
echo json_encode($response);
exit;


?>