<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require_once '../../controller/class/classDBcon.php'; 

$data = array();
parse_str($_POST['appointment_data'], $data);

$id = $data['edit_appointment_id'];
$status = $data['edit_appointment_status'];

$obj = new Crud();
$table = 'booked_appointment';
$where_condition = array('id' => $id );

$fetch_data = $obj->read_with_condition($table,$where_condition);

$booking_data =  mysqli_fetch_assoc($fetch_data);







$data_edit = array(
    'status'     => $status,
    
);

$update_sql = $obj->update($table, $data_edit, $where_condition);

if($update_sql){

//mail to user

try {
    $mail = new PHPMailer(true);
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
                        .$booking_data['psychiatrist_phone'].'<br>You Booked For : '.$booking_data['booking_for'].'<br>Appointment Date & Time  : '. $booking_data['booked_appointment_date']. ','.$booking_data['booked_appointment_time'] ;
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
                        .$booking_data['booking_user_phone'].'<br> Booked For : '.$booking_data['booking_for'].'<br>Appointment Date & Time  : '. $booking_data['booked_appointment_date']. ','.$booking_data['booked_appointment_time'] ;
    $mail2->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail2->send();




} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

        $response = array(
        'status'=> 1,
        'message' => 'Appointment hasbeen approved successfully'
    ); 

}
else{
    $response = array(
        'status'=> 0,
        'message' => 'Something went wrong'
    ); 
}
echo json_encode($response);
exit;






?>