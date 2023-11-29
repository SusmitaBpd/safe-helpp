<?php
session_start();

$current_url = $_SERVER['REQUEST_URI'];
$path_name = substr($current_url,12);

 if(str_contains($current_url, 'single.php') ||$path_name=='psychiatrist/' || $path_name=='register/' || $path_name=='login/'){
    include_once "../action/vendor/autoload.php";
    require_once '../controller/class/classInclude.php'; 
    require_once '../controller/class/classDbcon.php';
 }

 
 
 if($current_url=='/safe-helpp/'){
    require_once 'controller/class/classInclude.php'; 
    require_once 'controller/class/classDbcon.php';
    include_once "action/vendor/autoload.php";
 }
//  if (str_contains($current_url, 'single.php')) {
//     include_once "../action/vendor/autoload.php";
//     require_once '../controller/class/classInclude.php'; 
//     require_once '../controller/class/classDbcon.php';
// }
 


  $google_client = new Google_Client();

  $clientID = "228908775926-vklmpbmvm32seh8nuj42ttbecvnaa474.apps.googleusercontent.com";
  $secret = "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";


  $google_client->setClientId($clientID); //Define your ClientID

  $google_client->setClientSecret($secret); //Define your Client Secret Key

  $google_client->setRedirectUri('http://localhost/safe-helpp/'); //Define your Redirect Uri

  $google_client->addScope('email');

  $google_client->addScope('profile');

  if(isset($_GET["code"]))
  {
   $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

   if(!isset($token["error"]))
   {
    $google_client->setAccessToken($token['access_token']);

    $_SESSION['access_token']=$token['access_token'];

    $google_service = new Google_Service_Oauth2($google_client);

    $data = $google_service->userinfo->get();

    $current_datetime = date('Y-m-d H:i:s');

   // print_r($data);

$_SESSION['first_name']=$data['given_name'];
$_SESSION['last_name']=$data['family_name'];
$_SESSION['email_address']=$data['email'];
$_SESSION['profile_picture']=$data['picture'];

   
   
   }
  }
 

?>
 

<?php
 

 $path_obj = new Includepath();
 
 ?>

<!doctype html>
<html lang="en">

<head>
    <title>Safe Helpp</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $path_obj->assetspath("img"); ?>/fav-icon.png">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo $path_obj->assetspath("css"); ?>/bootstrap.min.css">
    <!-- font css -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!--  -->
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- fancey box -->
    <link rel="stylesheet" href="<?php echo $path_obj->assetspath("css"); ?>/fancy-box.css">
    <!-- Main Css -->
    <link rel="stylesheet" href="<?php echo $path_obj->assetspath("css"); ?>/style.css">
    <link rel="stylesheet" href="<?php echo $path_obj->assetspath("css"); ?>/responsive.css">

</head>

<body>
    <header class="main_header">
        <div class="top">
            <div class="contact_info">
                <ul>
                    <li>
                        <span><img src="<?php echo $path_obj->assetspath("img"); ?>/icon-email.png" alt=""></span>
                        <a href="mailto: needhelp@safehelpp.com">needhelp@safehelpp.com</a>
                    </li>
                    <li>
                        <span><img src="<?php echo $path_obj->assetspath("img"); ?>/icon-phone.png" alt=""></span>
                        <a href="tel: +92 (8800) - 9850">+92 (8800) - 9850</a>
                    </li>
                    <li>
                        <span><img src="<?php echo $path_obj->assetspath("img"); ?>/icon-location.png" alt=""></span>
                        66 Broklyn Golden Street. USA
                    </li>
                </ul>
            </div>
            <div class="sing_inUp">
                <ul>
                    <?php  if(!empty($_SESSION['access_token'])){ echo 'welcome! ' .$_SESSION["first_name"].' '.$_SESSION['last_name'] ; }else{?>

                    <li class="active"><a href="<?= $google_client->createAuthUrl() ?>" target='_blank'>Sign In</a></li><?php } ?>
                   
                    <li><a href="<?php echo $path_obj->adminpath("register/"); ?>" >Sign Up</a></li>
                    
                </ul>
            </div>
        </div>
        <nav class="main_nav">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="logo">
                            <a href="<?php echo $path_obj->home(); ?>"><img src="<?php echo $path_obj->assetspath("img"); ?>/Logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="nav_wapper">
                            <div class="nav_list">
                                <ul>
                                    <li class="home_tab_menu active"><a href="index.html">Home</a></li>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="advice.html">Advice</a></li>
                                    <li><a href="services.html">Services</a></li>
                                    <li><a href="case.html">Cases</a></li>
                                    <li><a href="why-choose-us.html">Why Choose Us</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                </ul>
                            </div>
                            <div class="search_form">
                                <form id="search_form" name="search_form">
                                    <div class="search-container">
                                        <span class="click_to_open"><img src="<?php echo $path_obj->assetspath("img"); ?>/Icon-Search.png" alt=""></span>
                                        <div class="form_box">
                                            <input type="text" class="search-input" class="hidden"
                                                placeholder="Search...">
                                            <button class="search-button">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
