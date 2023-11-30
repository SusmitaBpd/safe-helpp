<?php 

include '../inc/header.php' ; ?>

<?php 

if (isset($_GET['id'])) {

	$id = $_GET['id'];
	
	$where_condition = array('therapist_id' => $id );
}

	$fetch_obj = new Crud();
	$table = 'therapist_register';
    $table_schedule = 'therapist_scheduled_session';

   
// table register

$fetch_data = $fetch_obj->read_with_condition($table,$where_condition);
$result =  mysqli_fetch_assoc($fetch_data);


$username = $result['register_username'];


$table_profile = 'therapist_profile';
$table_info = 'therapist_information';

// table profile

$profile_data = $fetch_obj->read_with_condition($table_profile,$where_condition);
$result_prof =  mysqli_fetch_assoc($profile_data);

$designation = $result_prof['designation'];

// info table data

$info_data = $fetch_obj->read_with_condition($table_info,$where_condition);
$result_info =  mysqli_fetch_assoc($info_data);

$phone = $result_info['therapist_phone'];
$address = $result_info['therapist_address'];


//scheduled data
$fetch_obj = new Crud();
$fetch_data = $fetch_obj->con();

$sql_speciality = "SELECT `speciality` ,scheduled_time FROM `therapist_scheduled_session` WHERE `therapist_id`= '$id';";
$sql_scheduled_time = "SELECT `scheduled_time` FROM `therapist_scheduled_session` WHERE `therapist_id`= '$id';";
$sql_scheduled_date = "SELECT `session_date` FROM `therapist_scheduled_session` WHERE `therapist_id`= '$id';";
$read_speciality = mysqli_query($fetch_data,$sql_speciality);
$read_date = mysqli_query($fetch_data,$sql_scheduled_date);

$read_scheduled_time = mysqli_query($fetch_data,$sql_scheduled_time);


?>
 <!-- Inner Banner -->
 <section class="inner_banner_main" style="background-image: url(<?php echo $path_obj->assetspath("img"); ?>/inner_bg_01.jpg);">
        <div class="container text-center">
            <div class="inner_banner_text">
                <h6>Get Started with SafeHelpp</h6>
                <h2>SafeHelpp should Work for Patients</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur erat nisi, scelerisque eu laoreet
                    sit amet, ornare congue justo. Sed facilisis purus vitae est fringilla tempor. Pellentesque non
                    tempor risus.
                  Vivamus lacus nulla, tincidunt ut lorem nec, imperdiet molestie turpis. Mauris euismod dolor sit
                      amet eros volutpat commodo.</p>
                <a href="#" class="a_btn appointment_icon">Get Started</a>
            </div>
        </div>
    </section>
    <!-- Inner Banner -->

    <!--  -->
    <section class="therapy_typ_inner">
        <div class="container">
            <div class="wapper">
                <div class="row">
                    <div class="col-md-3">
                        <div class="thearphy_profile_wapper">
                            <div class="fig_holder">
                                <figure style="background-image: url(<?php echo $path_obj->adminpath("admin/uploads"); ?>/<?php echo $result_prof['profile_picture']; ?>);"></figure>
                            </div>
                            <div class="text">
                                <a href="#">Get Started</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="thearphy_text_wapper">
                            <h6><?php  echo $username;?></h6>
                            <h4>A Licensed <?php echo $result_prof['designation']; ?> </h4>
                            <p><?php echo $result_prof['about_therapist']; ?></p>
                            <ul>
                                <li>
                                    <strong>One of many Online Psychiatrists Serving</strong>
                                    <?php echo $address; ?>
                                </li>
                                <li>
                                    <strong>Type Of Session License(s)</strong>
                                    <?php echo $result_prof['therapy_license']; ?>
                                </li>
                                <li>
                                    <strong>Session Specialties</strong>
                                    <?php echo $result_prof['therapist_specialty']; ?>
                                </li>
                                <li>
                                    <strong>Years of Experience</strong>
                                    <?php echo $result_prof['y_o_exp']; ?>
                                </li>
                                <li>
                                    <strong>Belongs To</strong>
                                    <?php echo $result_prof['city'] .','.$result_prof['state'] ; ?>  
                                </li>
                                <li>
                                    <strong>Language Known</strong>
                                    <?php echo $result_prof['language']; ?>     
                                </li>
                                <li>
                                    <strong>Insurance Accepted</strong>
                                    <?php echo $result_prof['accepted_insurance']; ?>     
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  -->


    <!-- Input Radio -->
    <section class="fancy_popup_inner" id="gender_select" style="display: none;">
        <div class="container">
            <div class="heading">
                <h2>Gender</h2>
            </div>
            <div class="form_wapper_main">
                <div class="for_right_arrow">
                    <h3>What is your Gender Identity</h3>
                </div>
                <div class="main_form_fancy">
                    <form action="" id="" name="">
                        <div class="main_inner_form_wapper">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form_group">
                                        <input type="radio" name="gender" id="women-01" value="women">
                                        <label for="women-01" class="for_radio">Women</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form_group">
                                        <input type="radio" name="gender" id="non-binary" value="Non Binary">
                                        <label for="non-binary" class="for_radio">Non Binary</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form_group">
                                        <input type="radio" name="gender" id="trans-feminine" value="Trans Feminine">
                                        <label for="trans-feminine" class="for_radio">Trans Feminine</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form_group">
                                        <input type="radio" name="gender" id="trans-masculine" value="Trans Masculine">
                                        <label for="trans-masculine" class="for_radio">Trans Masculine</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form_group">
                                        <input type="radio" name="gender" id="other" value="other">
                                        <label for="other" class="for_radio">Other</label>
                                    </div>
                                    <div class="for_others_input">
                                        <input type="text" name="gender_other" id="gender_other" placeholder="Please describe ..." style="display: none;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="buttom_part">
                            <span>Gender plays an important role in shaping personal identity and experiences. This
                                information will help your
                                therapist create a more personalized approach.</span>
                            <div class="text-center">
                                <a href="#" class="a_btn">Submit</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Input Radio -->

    <!-- Input checkbox -->
    <section class="fancy_popup_inner" id="spiritual_select" style="display: none;">
        <div class="container">
            <div class="heading">
                <h2>Spiritual</h2>
            </div>
            <div class="form_wapper_main">
                <div class="for_right_arrow">
                    <h3>What led you to consider Therapy today</h3>
                </div>
                <div class="main_form_fancy">
                    <form action="" id="" name="">
                        <div class="main_inner_form_wapper">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form_group">
                                        <input type="checkbox" name="feeling" id="feeling" value="I've been feeling Depressed">
                                        <label for="feeling" class="for_checkbox">I've been feeling Depressed</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form_group">
                                        <input type="checkbox" name="anxious" id="anxious" value="I feel Anxious or Overwhelmed">
                                        <label for="anxious" class="for_checkbox">I feel Anxious or Overwhelmed</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form_group">
                                        <input type="checkbox" name="interfering" id="interfering" value="My mood is Interfering with my Job/School Performance">
                                        <label for="interfering" class="for_checkbox">My mood is Interfering with my Job/School Performance</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form_group">
                                        <input type="checkbox" name="building" id="building" value="I Struggle with Building or Maintaining Relationships">
                                        <label for="building" class="for_checkbox">I Struggle with Building or Maintaining Relationships</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form_group">
                                        <input type="checkbox" name="purpose" id="purpose" value="I can't find purpose and meaning in my Life">
                                        <label for="purpose" class="for_checkbox">I can't find purpose and meaning in my Life</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form_group">
                                        <input type="checkbox" name="grieving" id="grieving" value="I am Grieving">
                                        <label for="grieving" class="for_checkbox">I am Grieving</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form_group">
                                        <input type="checkbox" name="checkbox" id="Other-v2" value="Other">
                                        <label for="Other-v2" class="for_checkbox">Other</label>
                                    </div>
                                    <div class="for_others_input">
                                        <input type="text" name="" id="checkbox_other_v2" placeholder="Please describe ..." style="display: none;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="buttom_part">
                            <span>Gender plays an important role in shaping personal identity and experiences. This
                                information will help your
                                therapist create a more personalized approach.</span>
                            <div class="text-center">
                                <a href="#" class="a_btn">Submit</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Input Checkbox -->

    <!-- For Sing Up -->
    <section class="fancy_popup_inner" id="sing_up_fancy" style="display: none;">
        <div class="container">
            <div class="heading">
                <h2>You've Completed the Questionnaire!</h2>
            </div>
            <div class="form_wapper_main">
                <div class="for_right_arrow">
                    <h3>Please mark all that Field for Sign Up</h3>
                </div>
                <div class="main_form_fancy only_input">
                    <form action="" id="" name="">
                        <div class="main_inner_form_wapper">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form_group">
                                        <input type="text" name="" id="" placeholder="Your Name">
                                        <label for="">Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form_group">
                                        <input type="email" name="" id="" placeholder="Email Address">
                                        <label for="">Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form_group">
                                        <input type="tel" name="" id="" placeholder="Enter Phone Number">
                                        <label for="">Phone</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form_group">
                                        <input type="password" name="" id="" placeholder="Enter Password">
                                        <label for="">Password</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form_group">
                                        <input type="password" name="" id="" placeholder="Enter Confirm Password">
                                        <label for="">Confirm Password</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form_group">
                                        <input type="checkbox" name="" id="sing_chek">
                                        <label for="sing_chek" class="for_checkbox">I agree to the <a href="#">Terms and Conditions</a> and  <a href="#">Privacy Policy</a></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="buttom_part">
                            <div class="text-center">
                                <button class="a_btn">Submit</button>
                            </div>
                        </div>
                    </form>
                    <span class="or">OR</span>
                    <div class="social_media_login">
                        <ul>
                            <li>
                                <a href="#sing_otp_fancy" data-fancybox>Facebook</a>
                            </li>
                            <li>
                                <a href="#">Google</a>
                            </li>
                            <li>
                                <a href="#">Twitter</a>
                            </li>
                        </ul>
                        <span>If you have an Account please <a href="#">Sign In</a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- For Sing Up -->

    <!-- For Sing In -->
    <section class="fancy_popup_inner" id="sing_in_fancy" style="display: none;">
        <div class="container">
            <div class="heading">
                <h2>You've Completed the Questionnaire!</h2>
            </div>
            <div class="form_wapper_main">
                <div class="for_right_arrow">
                    <h3>Please mark all that Field for Sign In</h3>
                </div>
                <div class="main_form_fancy only_input">
                    <form action="" id="" name="">
                        <div class="main_inner_form_wapper">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form_group">
                                        <input type="text" name="" id="" placeholder="Enter Email/Phone">
                                        <label for="">Username</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form_group">
                                        <input type="text" name="" id="" placeholder="Enter Password">
                                        <label for="">Password</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form_group">
                                        <a href="#" class="forgot_password">Forgot Password</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="buttom_part">
                            <div class="text-center">
                                <button  class="a_btn">Sign In</button>
                            </div>
                        </div>
                    </form>
                    <div class="social_media_login">
                        <span>If you don’t have an Account please <a href="#">Sign Up</a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- For Sing In -->

    <!-- OTP -->
    <section class="fancy_popup_inner otp_fancy" id="sing_otp_fancy" style="display: none;">
        <div class="container">
            <div class="heading">
                <h2>Verification Code</h2>
            </div>
            <div class="form_wapper_main">
                <div class="for_right_arrow">
                    <h3>Please enter your Verification Code</h3>
                </div>
                <div class="main_form_fancy only_input">
                    <form action="" id="" name="">
                        <div class="main_inner_form_wapper">
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" name="" id="" placeholder="Enter OTP" value="3366">
                                    <!-- <label for="">OTP</label> -->
                                </div>
                            </div>
                        </div>
                        <div class="social_media_login">
                            <span>Don’t Receive the Code <a href="#">Resend </a></span>
                        </div>
                        <div class="buttom_part">
                            <div class="text-center">
                                <a href="#" class="a_btn">Sign In</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- OTP -->

    <!-- Testimonials -->
    <section class="testimonials_main">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="text">
                        <h6>Testimonials</h6>
                        <h2>Honest Reviews from Our Clients</h2>
                        <p>Mauris vel justo accumsan enim imperdiet tincidunt. Nunc dictum risus nec nunc
                            consequat suscipit. Fusce ex odio, porta nec nibh eget, sollicitudin placerat neque.
                            Nunc ac malesuada nulla.</p>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="testi_slider">
                        <div class="elemenst">
                            <div class="testi_slider_wapper">
                                <div class="profile_holder">
                                    <figure style="background-image: url(<?php echo $path_obj->assetspath("img"); ?>/testi_profile.jpg);"></figure>
                                </div>
                                <div class="text">
                                    <h6>Alisha Martin</h6>
                                    <span>Customer</span>
                                    <p>Nulla diam nulla, rutrum nec suscipit vel, aliquam nec sapien. Aliquam efficitur
                                        fringilla eros, non aliquet ligula luctus sit amet. Morbi accumsan risus urna,
                                        in
                                        egestas diam sodales quis. Vestibulum turpis leo, convallis et, ullamcorper vel
                                        quam.
                                        Proin sit amet hendrerit eros, et lobortis purus.</p>
                                </div>
                            </div>
                        </div>
                        <div class="elemenst">
                            <div class="testi_slider_wapper">
                                <div class="profile_holder">
                                    <figure style="background-image: url(<?php echo $path_obj->assetspath("img"); ?>/testi_profile.jpg);"></figure>
                                </div>
                                <div class="text">
                                    <h6>Alisha Martin</h6>
                                    <span>Customer</span>
                                    <p>Nulla diam nulla, rutrum nec suscipit vel, aliquam nec sapien. Aliquam efficitur
                                        fringilla eros, non aliquet ligula luctus sit amet. Morbi accumsan risus urna,
                                        in
                                        egestas diam sodales quis. Vestibulum turpis leo, convallis et, ullamcorper vel
                                        quam.
                                        Proin sit amet hendrerit eros, et lobortis purus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials -->

    <!-- Contact with Us -->
    <section class="contact_offer_mian">
        <div class="contact_top">
            <div class="container">
                <div class="top">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="text">
                                <h6>Contact with Us</h6>
                                <h2>Let’s Book Your Appointment</h2>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="text">
                                <p>Quisque convallis, elit sit amet rutrum sollicitudin, sem ipsum egestas augue, vel
                                    convallis nisi leo at
                                    nisl. Integer a felis a dui mattis fringilla sit amet a elit. Curabitur arcu nibh,
                                    eleifend vel tortor mollis,
                                    aliquam sodales risus. Praesent vehicula massa quis nulla maximus, id iaculis augue
                                    scelerisque.
                                    Curabitur sodales urna vitae leo euismod condimentum.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->
        <div class="contact_bottom_part">
            <div class="container">
                <div class="wapper">
                    <div class="fig_holder">
                        <figure style="background-image: url(<?php echo $path_obj->assetspath("img"); ?>/contact_form_img.jpg);"></figure>
                    </div>
                    <div class="contact_from_main_indedx">
                        <div class="text-center">
                            <h3>Make an Appointment</h3>
                            <p>Aliquam sodales velit a enim volutpat tempus. Aliquam in mi ac augue sollicitudin
                                malesuada a vel est. Phasellus porta risus tortor, id imperdiet nisl pulvinar et. Duis
                                non auctor massa.</p>
                        </div>
                        <form  id="booking_user_form" name="booking_user_form">
                            <input type="hidden" name="therapist_id" value="<?php echo $id ; ?>">
                            <input type="hidden" name="psychiatrist_name" id="psychiatrist_name" value="<?php echo $username; ?>">
                            <input type="hidden" name="psychiatrist_email" id="psychiatrist_email" value="<?php echo $result['register_email']; ?>">
                            <input type="hidden" name="psychiatrist_phone" id="psychiatrist_phone" value="<?php echo $phone; ?>">

                            <div class="form_wapper">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form_group">
                                            <input type="text" name="booking_user_name" id="booking_user_name" placeholder="Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form_group">
                                            <input type="email" name="booking_user_email" id="booking_user_email" placeholder="Email Address" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form_group">
                                            <input type="tel" name="booking_user_phone" id="booking_user_phone" placeholder="Phone Number" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form_group">
                                        <select name="bookling_user_date" id="bookling_user_date" required>
                                            <option value="">Scheduled Date</option>
                                            <?php 
                                          while($result =  mysqli_fetch_assoc($read_date)){  ?>
                                             <option value="<?php echo $result['session_date']; ?>"><?php echo $result['session_date']; ?></option>
                                          <?php } ?>
                                        </select>
                                        
                                            <!-- <input type="text" name="" id="" placeholder="Select Date"
                                                onfocus="(this.type='date')"> -->
                                            <span class="date_icon"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form_group">
                                        <select name="booking_scheduled_time" id="booking_scheduled_time" required>
                                                <option value="">Scheduled Time</option>
                                                <?php 
                                          while($result =  mysqli_fetch_assoc($read_scheduled_time)){  ?>
                                                <option value="<?php echo $result['scheduled_time']; ?>"><?php echo $result['scheduled_time']; ?></option>
                                               
                                          <?php  }
                                            
                                             
                                          ?>

                                                
                                            </select>
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form_group">
                                            <select name="booking_for" id="booking_for" required>
                                                <option value="">Booking for</option>
                                                
                                         <?php 
                                          while($result =  mysqli_fetch_assoc($read_speciality)){  ?>
                                                <option value="<?php echo $result['speciality']; ?>"><?php echo $result['speciality']; ?></option>
                                               
                                          <?php  }
                                            
                                             
                                          ?>

                                                
                                            </select>
                                            <span class="drop_down_arow"></span>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="button_section">
                                    <button class="a_btn" type="submit" name="submit" id="submit">Book Appointment</button>
                                </div>
                                <div  class =" text-center" id="result_booking"></div>
                                
                            </div>
                        </form>

                    </div>

                </div>
                
            </div>
           
        </div>
       
    </section>
    <!-- Contact with Us -->

   

<?php include '../inc/footer.php' ; ?>