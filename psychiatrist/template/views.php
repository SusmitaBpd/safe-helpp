<?php 

 $sql = "SELECT * FROM therapist_profile JOIN therapist_register ON therapist_profile.therapist_id =      therapist_register.therapist_id JOIN therapist_information ON therapist_information.therapist_id = therapist_register.therapist_id";

$fetch_obj = new Crud();
$fetch_data = $fetch_obj->con();

$table_register = 'therapist_register';
$table_info    = 'therapist_information';
$table_profile = 'therapist_profile';

$read_all_data = mysqli_query($fetch_data,$sql);


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
        </div>
    </div>
</section>
<!-- Inner Banner -->

<!-- Doctors Listling -->
<section class="therapists_listing_main">
    <div class="container">
        <div class="top text-center">
            <h6>Therapists</h6>
            <h2>Serving Clients in Washington, DC</h2>
            <p>Nullam eros felis, fringilla vitae facilisis blandit, finibus ac eros. In non ipsum iaculis, aliquet
                sapien pretium, condimentum justo. Phasellus mollis metus et bibendum volutpat.
                Mauris quis nisi ac elit porta congue non nec quam.</p>
        </div>
        <div class="main_list">
             <?php
                    while($result =  mysqli_fetch_assoc($read_all_data)){ 
                    
                    if($result['user_type']!=='admin'){ 
                    
                    
                
               ?>

            <div class="row">
                <div class="col-md-4">
                    <div class="therapists_listing_img">
                        <div class="fig_holder">
       
                        <figure style="background-image: url(<?php echo $path_obj->adminpath("admin/uploads"); ?>/<?php echo $result['profile_picture']; ?>);"></figure>
                        </div>
                        <div class="text">
                            <a href="#">Get Started</a>
                            <a href="single.php?id=<?php echo $result['therapist_id']; ?>">View Profile</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="therapists_listing_text">
                        
                        <h6><?= $result['register_username'] ; ?></h6>
                        <h2>A Licensed <?php echo $result['designation']; ?> offering Counseling at better Help</h2>
                        <p><?= $result['about_therapist'] ; ?></p>
                        <ul>
                            <li>
                                <span>One Of Many Online Therapists Serving</span>
                                <?php echo $result['therapist_address']; ?>
                               
                            </li>
                            <li>
                                <span>Type Of Therapy License(s)</span>
                                <?php echo $result['therapy_license']; ?>
                            </li>
                            <li>
                                <span>Therapy Specialties</span>
                              <?php echo $result['therapist_specialty']; ?>
                            </li>
                            <li>
                                <span>Years of Experience</span>
                                <?php echo $result['y_o_exp']; ?>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <?php } } ?>
            
        </div>
    </div>
</section>
<!-- Doctors Listling -->

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
                    <form action="" id="" name="">
                        <div class="form_wapper">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form_group">
                                        <input type="text" name="" id="" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form_group">
                                        <input type="email" name="" id="" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form_group">
                                        <input type="tel" name="" id="" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form_group">
                                        <select name="" id="">
                                            <option value="">Select Programme 1</option>
                                            <option value="">Select Programme 2</option>
                                            <option value="">Select Programme 3</option>
                                            <option value="">Select Programme 4</option>
                                        </select>
                                        <span class="drop_down_arow"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form_group">
                                        <input type="text" name="" id="" placeholder="Select Date"
                                            onfocus="(this.type='date')">
                                        <span class="date_icon"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form_group">
                                        <select name="" id="">
                                            <option value="">Booking For 1</option>
                                            <option value="">Booking For 2</option>
                                            <option value="">Booking For 3</option>
                                            <option value="">Booking For 4</option>
                                        </select>
                                        <span class="drop_down_arow"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form_group">
                                        <textarea name="" id="" placeholder="Write a Message ..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="button_section">
                                <button class="a_btn">Book Appointment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact with Us -->



