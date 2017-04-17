<?php
    $data['title'] = 'OnePuhunan Service Portal | Sign Up';
?>
<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view("templates/head", $data); ?>
    <body>
        <?php $this->load->view("templates/header"); ?>
        <div class="page-wrap">
            <div id="tm-container" class="uk-container uk-width-5-10 uk-container-center">
                <?php echo validation_errors(); ?>
                <?php
                    if ( isset($sp_ua_create_acct) ) {
                        switch( $sp_ua_create_acct ) {
                            case 1:
                                echo "<div class='uk-alert uk-alert-warning uk-text-small' data-uk-alert> "
                                . "      <a href='' class='uk-alert-close uk-close'></a>"
                                . "      <span>Sorry, a user account with that employee id already exists.</span>"
                                . "   </div>";
                                break;
                            case 2:
                                echo "<div class='uk-alert uk-alert-warning uk-text-small' data-uk-alert> "
                                . "      <a href='' class='uk-alert-close uk-close'></a>"
                                . "      <span>User account is already for approval by system administrator.</span>"
                                . "   </div>";
                                break;
                            case 3:
                                echo "<div class='uk-alert uk-alert-warning uk-text-small' data-uk-alert> "
                                . "      <a href='' class='uk-alert-close uk-close'></a>"
                                . "      <span>Sorry, a user account with that e-mail address already exists.</span>"
                                . "   </div>";
                                break;
                            default:
                                redirect(base_url()."success", "refresh");
                                break;
                        }
                    }
                 ?>
                <?=form_open("", array("class" => "uk-form uk-form-horizontal"));?>
                    <legend class="uk-text-muted uk-text-bold tm-form-legend">REGISTRATION</legend>
                    <div class="uk-form-row tm-label">
                        <label class="uk-text-small">
                            Please complete the form below, all field name's followed by a <span class="tm-required-label">*</span> indicate that an input is required. <br>
                            Once completed, please select the <b>"Submit"</b> button.
                        </label>
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label uk-text-small uk-text-bold">Last Name <span class="tm-required-label">*</span></label>
                        <div class="uk-form-controls">
                            <?php 
                                $lname =  array(
                                    "id" => "lname", 
                                    "name" => "lname",
                                    "value" => set_value("lname"), 
                                    "class" => "uk-width-large uk-form-small",
                                    "placeholder" => "Please enter your last name."
                                ); 
                                echo form_input($lname); 
                             ?>
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label uk-text-small uk-text-bold">First Name <span class="tm-required-label">*</span></label>
                        <div class="uk-form-controls">
                            <?php
                                $fname = array(
                                    "id" => "fname",
                                    "name" => "fname",
                                    "value" => set_value("fname"),
                                    "class" => "uk-width-large uk-form-small",
                                    "placeholder" => "Please enter your first name."
                                );
                                echo form_input($fname);
                             ?>
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label uk-text-small uk-text-bold">Middle Name</label>
                        <div class="uk-form-controls">
                            <?php
                                $mname = array(
                                    "id" => "mname",
                                    "name" => "mname",
                                    "value" => set_value("mname"),
                                    "class" => "uk-width-large uk-form-small",
                                    "placeholder" => "Please enter your middle name."
                                );
                                echo form_input($mname);
                             ?>
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label uk-text-small uk-text-bold">Email Address (OnePuhunan) <span class="tm-required-label">*</span></label>
                        <div class="uk-form-controls">
                            <?php
                                $email = array(
                                    "id" => "email",
                                    "name" => "email",
                                    "value" => set_value("email"),
                                    "class" => "uk-width-large uk-form-small",
                                    "placeholder" => "Please enter your email address."
                                );
                                echo form_input($email);
                             ?>
                            
                        </div>
                    </div>
                    <div class="uk-form-row tm-form-note">
                        <div class="uk-form-controls">
                            <label class="uk-text-small">Please make sure your email address is correct or you will not receive your login information for our member's area(s).</label>
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label uk-text-small uk-text-bold">Job Title <span class="tm-required-label">*</span></label>
                        <div class="uk-form-controls">
                            <?php
                                $job_title = array(
                                    "id" => "job_title",
                                    "name" => "job_title",
                                    "value" => set_value("job_title"),
                                    "class" => "uk-width-large uk-form-small",
                                    "placeholder" => "Please enter your job title."
                                );
                                echo form_input($job_title);
                             ?>
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label uk-text-small uk-text-bold">Department <span class="tm-required-label">*</span></label>
                        <div class="uk-form-controls">
                            <?php
                                $dept = array(
                                    "id" => "dept",
                                    "class" => "uk-width-large uk-form-small"
                                );
                                
                                foreach((array) $query as $item) {
                                    $options[$item["dept_id"]] = $item["dept_name"];
                                }
                                echo form_dropdown("dept", $options, set_value("dept"), $dept);
                             ?>
                        </div>
                    </div>
                    <hr class='uk-article-divider' style="margin-top: 15px;margin-bottom: 20px;">
                    <div class="uk-form-row tm-label">
                        <label class="uk-text-small">
                            <b>Password complexity requirements:</b><br>
                            <ul>
                                <li>Password must be at least 8 characters in length</li>
                                <li>One or more upper case letters</li>
                                <li>One or more lower case letters</li>
                                <li>One or more numbers</li>
                                <li>One or more of these special characters: !@#$%^&*</li>
                            </ul>
                        </label>
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label uk-text-small uk-text-bold">Employee ID <span class="tm-required-label">*</span></label>
                        <div class="uk-form-controls">
                            <?php
                                $emp_id = array(
                                    "id" => "emp_id",
                                    "name" => "emp_id",
                                    "value" => set_value("emp_id"),
                                    "class" => "uk-width-large uk-form-small",
                                    "placeholder" => "Please enter your employee id."
                                );
                                echo form_input($emp_id);
                             ?>
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label uk-text-small uk-text-bold">Desired Password <span class="tm-required-label">*</span></label>
                        <div class="uk-form-controls">
                            <?php
                                $password = array(
                                    "id" => "password",
                                    "name" => "password",
                                    "type" => "password",
                                    "value" => set_value("password"),
                                    "class" => "uk-width-large uk-form-small",
                                    "placeholder" => "Please enter your desired password."
                                );
                                echo form_input($password);
                             ?>              
                        </div>
                    </div>
                    <div class="uk-form-row tm-form-note">
                        <div class="uk-form-controls">
                            <label class="uk-text-small">You will use this when logging in to our member's area(s). Please see password complexity requirements above for your reference in creating your desired password. </label>
                        </div>
                    </div>
                    <div class="uk-form-row" style="margin-bottom: 40px;">
                        <label class="uk-form-label uk-text-small uk-text-bold">Confirm Password <span class="tm-required-label">*</span></label>
                        <div class="uk-form-controls">
                            <?php
                                $passconf = array(
                                    "id" => "passconf",
                                    "name" => "passconf",
                                    "type" => "password",
                                    "value" => set_value("passconf"),
                                    "class" => "uk-width-large uk-form-small",
                                    "placeholder" => "Please confirm the password you entered above."
                                );
                                echo form_input($passconf);
                             ?> 
                        </div>
                    </div>
                    <div class="uk-form-row uk-text-center uk-margin-large-bottom">
                        <button type="submit" class="uk-button uk-button-primary uk-button-small uk-width-2-10">Submit</button>
                        <button type="reset" class="uk-button uk-button-small uk-width-2-10">Clear</button>
                    </div>
                <?=form_close();?>
            </div>
        </div>
        <?php $this->load->view("templates/footer"); ?>
    </body>
</html>