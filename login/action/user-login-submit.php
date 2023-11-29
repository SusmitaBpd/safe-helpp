<?php 
session_start();
require_once '../../controller/class/classDBcon.php'; 
$fetch_obj = new Crud();


    $login_data = array();
    parse_str($_POST['login_data'],$login_data);

    $email   = $login_data['user_log_email'];
    $password = $login_data['user_log_password'];

    $table = 'user_register';
    $where_condition = array(
        'user_email' => $email
    );

    $check_email = $fetch_obj->read_with_condition($table,$where_condition);
    $email_count = mysqli_num_rows($check_email);
   if($email_count > 0) {

    $result =  mysqli_fetch_assoc($check_email);

    
    
    
    if($email == $result['user_email'] &&  $password == $result['user_pass']){
        
        $_SESSION['name'] = $result['user_name'];
       
        
        $response = array(
            'status'=> 1,
            'message' => 'You have successfully logged in! .'
        );
    }else{
        $response = array(
            'status'=> 0,
            'message' => 'Something went wrong !.'
        );
    }
   


}else{
    $response = array(
        'status'=> 0,
        'message' => 'Invalid email or password!.'
    );
} echo json_encode($response);

    

    


?>