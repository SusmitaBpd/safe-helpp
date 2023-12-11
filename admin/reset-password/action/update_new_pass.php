<?php
require_once '../../controller/class/classDBcon.php'; 

$obj = new Crud();





$data_arr = array();
parse_str($_POST['new_pass_data'], $data_arr);


$pass = $data_arr['new_comfirm_password'];

$token = $data_arr['user_token'];

$tablename = 'therapist_register';

$fields = array(

    'register_pass' => $pass


);


$where_condition = array(
    'user_token' => $token
);

$sql = $obj->update($tablename, $fields, $where_condition);

if($sql){

    $response = array(
        'status' => 1,
        'message' => 'Password hasbeen updated successfully!.'
    );


}else{
    $response = array(
        'status' => 0,
        'message' => 'Some thing went wrong!.'
    );

}
echo json_encode($response);
exit;




?>