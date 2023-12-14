<?php 
 

require_once '../../controller/class/classDBcon.php'; 

$obj = new Crud();

$booking_data = array();

parse_str($_POST['booking_data'],$booking_data);

$table_appointment = 'booked_appointment';

$date  = date('Y-m-d H:i:s');

$data = array(
    'psychiatrist_id'               => $booking_data['therapist_id'],
    'psychiatrist_name'             => $booking_data['psychiatrist_name'],
    'psychiatrist_email'            => $booking_data['psychiatrist_email'],
    'psychiatrist_phone'            => $booking_data['psychiatrist_phone'],
    'booked_appointment_date'	    =>  $booking_data['bookling_user_date'],
    'booked_appointment_time'       =>  $booking_data['booking_scheduled_time'],

    'booking_user_name'             => $booking_data['booking_user_name'],
    'booking_user_phone'            => $booking_data['booking_user_phone'],
    'booking_user_email'	        =>  $booking_data['booking_user_email'],
    'booking_for'                   =>  $booking_data['booking_for'],
    'date'                          => $date
);


$insert_sql = $obj->insert($table_appointment, $data);
if($insert_sql){
    $response = array(
        'status'=> 1,
        'message' => 'Thank you for Making an Appointment with us. We will send you a confirmation email soon.'
    );

}else{
    $response = array(
        'status'=>0,
        'message'=>'Something went wrong!'
    );
}
echo json_encode($response);
exit;
   

?>