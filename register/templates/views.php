<!-- Contact with Us -->
<section class="contact_offer_mian">
        
        <div class="contact_bottom_part">
            <div class="container">
                <div class="wapper">
                    <div class="fig_holder">
                        <figure style="background-image: url(<?php echo $path_obj->assetspath("img"); ?>/contact_form_img.jpg);"></figure>
                    </div>
                    
                    <div class="contact_from_main_indedx">
                        <div class="text-center">
                            <h3>Register Here</h3>
                           
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                          
                        <form  id="user_register_form" name="user_register_form">
                            <div class="form_wapper">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form_group">
                                            <input type="text" name="user_name" id="reg_user_name" placeholder="Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form_group">
                                            <input type="email" name="user_email" id="reg_user_email" placeholder="Email Address" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form_group">
                                            <input type="tel" name="user_number" id="reg_user_number" placeholder="Phone Number" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form_group">
                                            <input type="password" name="user_pass" id="reg_user_pass" placeholder="Password" required>
                                        </div>
                                    </div>
                                    
                                    
                                   
                                </div>
                                <div class="button_section">
                                    <button type="submit" name="submit" id="submit" class="a_btn">Register</button>
                                </div>
                            </div>
                           
                        </form>
                        </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <h5 class="text-center">Already have an account please <a href="<?php echo $path_obj->adminpath("login/"); ?>">login </a>here.</h5>
    <div class="text-center mt-4" id="result_show_msg"></div>
    <!-- Contact with Us -->