<?php
require_once '../../controller/class/classDBcon.php'; 

$obj = new Crud();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

$data_arr = array();
parse_str($_POST['forget_pass_data'], $data_arr);


$email = $data_arr['email'];

$table_register = 'therapist_register';

$where_condition = array(
    'register_email' => $email
);

$check_email = $obj->read_with_condition($table_register,$where_condition);



try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'bpddev7@gmail.com';                   //SMTP username
    $mail->Password   = 'bnvvhvrhpbecirqz';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    
     $mail->setFrom('bpddev8@gmail.com', 'Safe Helpp');
     $mail->addAddress('bpddev8@gmail.com', 'Safe Helpp');     //Add a recipient
               
     $mail->addReplyTo('bpddev8@gmail.com', 'Information');
    
     if($check_email){

        $result = mysqli_fetch_array($check_email);
        
        $name = $result['register_username'];
        $register_email =  $result['register_email'];
        $register_token =  $result['user_token'];
    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Reset Password';
    $mail->Body    = 'Hello! '. ' '.$name.', To reset your password click the bellow link <br>'
                        .'http://localhost/safe-helpp/admin/reset-password/?token='.$register_token;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

   
    
     if($mail->send()){
        //echo "mail sent";
   

    $response = array(
					'status' => 1,
					'message' => 'We have sent you a email to reset your password. Please check your email.'
				);
     }
    }else{
        $response = array(
            'status' => 0,
            'message' => 'Something went wrong!.'
        );
}

    
	echo json_encode($response);
	
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}








?>