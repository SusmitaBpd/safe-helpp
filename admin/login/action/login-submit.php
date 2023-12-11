<?php 
session_set_cookie_params(300); 
session_start();


require_once '../../controller/class/classDBcon.php'; 
$fetch_obj = new Crud();


    $login_data = array();
    parse_str($_POST['login_data'],$login_data);



    $email   = $login_data['email'];
    $password = $login_data['password'];

    if(isset($login_data['remember-me'])){
        setcookie('email_cookie',$email ,time()+86400);
        setcookie('password_cookie',$password ,time()+86400);
    }

    $table = 'therapist_register';
    $where_condition = array(
        'register_email' => $email
    );

    $check_email = $fetch_obj->read_with_condition($table,$where_condition);
    $email_count = mysqli_num_rows($check_email);
   if($email_count > 0) {

    $result =  mysqli_fetch_assoc($check_email);

    
    
    
    if($email == $result['register_email'] &&  $password == $result['register_pass']){

        

        $_SESSION['therapist_id']  = $result['therapist_id'];

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