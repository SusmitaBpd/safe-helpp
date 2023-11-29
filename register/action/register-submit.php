<?php


require_once '../../controller/class/classDBcon.php'; 





$the_data = array();
parse_str($_POST['the_data'], $the_data);

$username = $the_data['user_name'];
$email   = $the_data['user_email'];

$phone  = $the_data['user_number'];

$pass  = $the_data['user_pass'];
$date  = date('Y-m-d H:i:s');

$user_id = uniqid("User-");

$insert_obj = new Crud();

$register_data = array(
    'user_id'  => $user_id,
    'user_name' => $username,
    'user_email' => $email,
    'user_phone' => $phone,
    'user_pass'	=> $pass,
    'date'      => $date
);


$table_register = 'user_register';


$where_condition = array(
    'user_email' => $email
);

$check_email = $insert_obj->read_with_condition($table_register,$where_condition);
$email_count = mysqli_num_rows($check_email);

if($email_count > 0) {
    $response = array(
        'status'=> 0,
        'message'=> 'Email ID already exist. Please try again with different Email ID.'
    );

}

else{
    $insrt_sql = $insert_obj->insert($table_register, $register_data);
   

    if($insrt_sql)
    $_SESSION['user_id'] = $user_id;
    {

        $response = array(
            'status'=> 1,
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