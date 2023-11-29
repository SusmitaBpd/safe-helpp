<?php 

session_set_cookie_params(300); 
session_start();
require_once '../../controller/class/classDBcon.php'; 

if(isset($_GET['id'])) {
	$id = $_GET['id'];
	
}

else{
	$id = $_SESSION['therapist_id'];
	
	
}


$id = $_SESSION['therapist_id'];




$the_data = array();
parse_str($_POST['profile_data'], $profile_data);

if(isset($_FILES["profile_image"])){
$profile_image = $_FILES["profile_image"];
$save_file = move_uploaded_file($profile_image["tmp_name"], "../../uploads/" . $profile_image["name"]);}

$profile_email = $profile_data['profile_email'];
$profile_pass = $profile_data['profile_pass'];
$profile_phone = $profile_data['profile_phone'];
$profile_address = $profile_data['profile_address'];
if(isset($profile_data['category_therapy'])){
$category_therapy = $profile_data['category_therapy'];

$category_therapy_new = implode(', ', $category_therapy);}

if(isset($profile_data['accepted_insurance'])){
    $accepted_insurance = $profile_data['accepted_insurance'];
    
    $accepted_insurance_new = implode(', ', $accepted_insurance);}


$date = date('Y-m-d H:i:s');

if(!empty($_FILES['profile_image']['name'])){
    
$profile_data = array(
    
    'profile_picture'          => $_FILES['profile_image']['name'],
    'designation'              => $profile_data['profile_designation'],
    'about_therapist'          => $profile_data['about_text'],
    'state'	                   => $profile_data['profile_state'],
    'city'                     => $profile_data['profile_city'],
    
    'y_o_exp'                  => $profile_data['y_o_exp'],
    'language'                 => $profile_data['language'],
    'category_therapy'         => $category_therapy_new,
    'therapist_specialty'      => $profile_data['therapist_specialties'],
    'therapy_license'          => $profile_data['therapy_license'],
    'christian_based_therapy'  => $profile_data['christian_based_therapy'],
    'accepted_insurance'       => $accepted_insurance_new,
    'therapist_fees'           => $profile_data['therapist_fees'],
     
);
}else{
    $profile_data = array(
    
       // 'profile_picture'        => $profile_image["name"],
        'designation'              => $profile_data['profile_designation'],
        'about_therapist'          => $profile_data['about_text'],
        'state'	                   => $profile_data['profile_state'],
        'city'                     => $profile_data['profile_city'],
        
        'y_o_exp'                  => $profile_data['y_o_exp'],
        'language'                 => $profile_data['language'],
        'category_therapy'         => $category_therapy_new,
        'therapist_specialty'      => $profile_data['therapist_specialties'],
        'therapy_license'          => $profile_data['therapy_license'],
        'christian_based_therapy'  => $profile_data['christian_based_therapy'],
        'accepted_insurance'       => $accepted_insurance_new,
        'therapist_fees'           => $profile_data['therapist_fees'],
         
    );

}
$info_data = array(
    
    'therapist_email'   => $profile_email,
    'therapist_phone'   => $profile_phone,
    'therapist_address' => $profile_address
   
    
);


$register_data = array(
    
    'register_email' => $profile_email,
    'register_pass'	=> $profile_pass
    
);


$where_condition = array(
    'therapist_id' => $id,
);

$update_obj = new Crud();

$table_profile = 'therapist_profile';
$table_register = 'therapist_register';

$table_info = 'therapist_information';

   





$update_table_info_sql = $update_obj->update($table_info, $info_data, $where_condition);

$update_table_register_sql = $update_obj->update($table_register, $register_data, $where_condition);


$update_sql = $update_obj->update($table_profile, $profile_data, $where_condition);
if($update_sql)
{

    $response = array(
        'status'=> 0,
        'message' => 'Your profile has been updated.'
    );
}else{
    $response = array(
        'status'=> 1,
        'message' => 'Something went wrong!.'
    );

}


echo json_encode($response);
exit;


?>