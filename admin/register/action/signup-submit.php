<?php
session_set_cookie_params(300); 
session_start();

require_once '../../controller/class/classDBcon.php'; 

$uniqueId = uniqid("SH");



$the_data = array();
parse_str($_POST['the_data'], $the_data);

$username = $the_data['username'];
$email = $the_data['email'];



$pass = $the_data['comfirm_password'];
$date = date('Y-m-d H:i:s');

$user_token = bin2hex(random_bytes(15));



//Session data
$_SESSION['therapist_id'] = $uniqueId ; 
$_SESSION['email'] = $email ; 
$_SESSION['pass'] = $pass ;

$insert_obj = new Crud();

$register_data = array(
    'therapist_id' =>  $uniqueId,
    'register_username' => $username,
    'register_email' => $email,
    'register_pass'	=> $pass,
    'user_token'   => $user_token,
    'date'          => $date
);


$profile_data = array(
    'therapist_id' =>  $uniqueId,
    
    'date'          => $date
);

$info_data = array(
    'therapist_id' =>  $uniqueId,
    'therapist_name' => $username,
    'therapist_email' => $email,
   
    'date'          => $date
);

$table_register = 'therapist_register';
$table_profile = 'therapist_profile';
$table_info = 'therapist_information';

$where_condition = array(
    'register_email' => $email
);

$check_email = $insert_obj->read_with_condition($table_register,$where_condition);
$email_count = mysqli_num_rows($check_email);

if($email_count > 0) {
    $response = array(
        'status'=> 1,
        'message'=> 'Email ID already exist. Please try again with different Email ID.'
    );

}

else{
    $insrt_sql = $insert_obj->insert($table_register, $register_data);
    $insrt_profile_sql = $insert_obj->insert($table_profile, $profile_data);
    $insrt_info_sql = $insert_obj->insert($table_info, $info_data);

    if($insrt_sql)
    {

        $response = array(
            'status'=> 0,
            'message' => 'Thank you for Register with us.'
        );
    // }else{
    //     $response = array(
    //         'status'=> 1,
    //         'message' => 'Something went wrong!.'
    //     );

    }

}
echo json_encode($response);
exit;









 ?>