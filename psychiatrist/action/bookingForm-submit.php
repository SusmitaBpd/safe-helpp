<?php 
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;

 require 'PHPMailer/src/Exception.php';
 require 'PHPMailer/src/PHPMailer.php';
 require 'PHPMailer/src/SMTP.php';
 
$mail = new PHPMailer(true);


require_once '../../controller/class/classDBcon.php'; 
$insert_obj = new Crud();
$booking_data = array();
parse_str($_POST['booking_data'],$booking_data);
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

$table_appointment = 'booked_appointment';

//mail to user

try {
    //Server settings
    $mail = new PHPMailer(true);
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'bpddev7@gmail.com';                   //SMTP username
    $mail->Password   = 'bnvvhvrhpbecirqz';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    
     $mail->setFrom($booking_data['booking_user_email'], 'Safe Helpp');
     $mail->addAddress($booking_data['booking_user_email'], 'Safe Helpp');     //Add a recipient
               
    // $mail->addReplyTo($booking_data['booking_user_email'], 'Information');
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Book An Appointment';
    $mail->Body    = 'Appointment Details: <br>'.'Psychiatrist Name : '.$booking_data['psychiatrist_name'].'<br>Psychiatrist Email: '.
                        $booking_data['psychiatrist_email']. '<br>Psychiatrist Phone No: '
                        .$booking_data['psychiatrist_phone'].'<br>You Booked For : '.$booking_data['booking_for'].'<br>Appointment Date & Time  : '. $booking_data['bookling_user_date']. ','.$booking_data['booking_scheduled_time'] ;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    
    $mail->ClearAllRecipients();

  //mail to Psychiatrist

    //Server settings
    $mail2 = new PHPMailer(true);
    //$mail2->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail2->isSMTP();                                            //Send using SMTP
    $mail2->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail2->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail2->Username   = 'bpddev7@gmail.com';                   //SMTP username
    $mail2->Password   = 'bnvvhvrhpbecirqz';                               //SMTP password
    $mail2->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail2->Port       = 465;     

    $mail2->setFrom($booking_data['psychiatrist_email'], 'Safe Helpp');
    $mail2->addAddress($booking_data['psychiatrist_email'], 'Safe Helpp');     //Add a recipient
            
    //$mail2->addReplyTo($booking_data['psychiatrist_email'], 'Information');
    

    

    //Content
    $mail2->isHTML(true);                                  //Set email format to HTML
    $mail2->Subject = 'Booked Appointment';
    $mail2->Body    = 'Appointment Details: <br>'.'Patients Name : '.$booking_data['booking_user_name'].'<br>Patients Email: '.
                        $booking_data['booking_user_email']. '<br>Patients Phone No: '
                        .$booking_data['booking_user_phone'].'<br> Booked For : '.$booking_data['booking_for'].'<br>Appointment Date & Time  : '. $booking_data['bookling_user_date']. ','.$booking_data['booking_scheduled_time'] ;
    $mail2->AltBody = 'This is the body in plain text for non-HTML mail clients';

    

$insrt_sql = $insert_obj->insert($table_appointment, $data);
if($mail2->send()){
   
    
    $response = array(
        'status'=> 1,
        'message' => 'Thank you for Making an Appointment with us.'
    );
}else{
    $response = array(
        'status'=>0,
        'message'=>'Something went wrong!'
    );

}
echo json_encode($response);


} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}





?>