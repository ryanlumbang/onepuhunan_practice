<?php
    $data['title'] = 'OnePuhunan Service Portal | Update Personal Information';
?>
<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view("templates/head", $data); ?>
    <body>
        <?php $this->load->view("templates/header"); ?>
        <div class="page-wrap">
            <?php $this->load->view("templates/subheader"); ?>
            <div id="tm-container" class="uk-container uk-width-5-10 uk-container-center">
                <?php echo validation_errors(); ?>
                <?php 
                    if ( isset($sp_ua_upd_user_acct) ) {
                        switch($sp_ua_upd_user_acct) {
                            case 1:
                                echo "<div class='uk-alert uk-alert-warning uk-text-small' data-uk-alert> "
                                . "      <a href='' class='uk-alert-close uk-close'></a>"
                                . "      <span>Sorry, a user account with that employee id already exists.</span>"
                                . "   </div>";
                                break;
                            case 2:
                                echo "<div class='uk-alert uk-alert-warning uk-text-small' data-uk-alert> "
                                . "      <a href='' class='uk-alert-close uk-close'></a>"
                                . "      <span>Sorry, a user account with that e-mail address already exists.</span>"
                                . "   </div>";
                                break;
                            default:
                                echo "<div class='uk-alert uk-alert-success uk-text-small' data-uk-alert> "
                                . "       <a href='' class='uk-alert-close uk-close'></a>"
                                . "       <span>Your profile has been successfully updated.</span>"
                                . "   </div>";
                                break;
                        }
                    }
                 ?>
                <?=form_open("", array("class" => "uk-form uk-form-horizontal"));?>
                    <legend class="uk-text-muted uk-text-bold tm-form-legend">MY PROFILE</legend>
                    <div class="uk-form-row tm-label">
                        <label class="uk-text-small">
                            Please complete the form below, all field name's followed by a <span class="tm-required-label">*</span> indicate that an input is required. <br>
                            Once completed, please select the <b>"Submit"</b> button.
                        </label>
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label uk-text-small uk-text-bold">Employee ID</label>
                        <div class="uk-form-controls">
                            <?php 
                                $emp_id =  array(
                                    "id" => "emp_id", 
                                    "name" => "emp_id",
                                    "value" => set_value("emp_id", $result["emp_id"]), 
                                    "class" => "uk-width-large uk-form-small",
                                    "disabled" => "disabled"
                                ); 
                                echo form_input($emp_id); 
                             ?>
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label uk-text-small uk-text-bold">Last Name <span class="tm-required-label">*</span></label>
                        <div class="uk-form-controls">
                            <?php 
                                $lname =  array(
                                    "id" => "lname", 
                                    "name" => "lname",
                                    "value" => set_value("lname", $result["lname"]), 
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
                                    "value" => set_value("fname", $result["fname"]),
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
                                    "value" => set_value("mname", $result["mname"]),
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
                                    "value" => set_value("email", $result["email"]),
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
                                    "value" => set_value("job_title", $result["job_title"]),
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
                                echo form_dropdown("dept", $options, set_value("dept", $result["dept"]), $dept);
                            ?>
                        </div>
                    </div>
                    <hr class='uk-article-divider' style="margin-top: 15px;margin-bottom: 20px;">
                    <div class="uk-form-row">
                        <label class="uk-form-label uk-text-small uk-text-bold">Date Registered</label>
                        <div class="uk-form-controls">
                            <?php
                                $date_reg = array(
                                    "id" => "date_reg",
                                    "name" => "date_reg",
                                    "value" => set_value("date_reg", $result["date_reg"]),
                                    "class" => "uk-width-large uk-form-small",
                                    "disabled" => "disabled"
                                );
                                echo form_input($date_reg);
                             ?>
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label uk-text-small uk-text-bold">Application Role</label>
                        <div class="uk-form-controls">
                            <?php 
                                $role_id = array(
                                    "id"       => "role_id",
                                    "name"     => "role_id",
                                    "value"    => set_value("role_id", $result["role_id"]),
                                    "class"    => "uk-width-large uk-form-small",
                                    "disabled" => "disabled"
                                );
                                echo form_input($role_id);
                             ?>
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label uk-text-small uk-text-bold">Date Approved</label>
                        <div class="uk-form-controls">
                            <?php
                                $date_apr = array(
                                    "id"       => "date_apr",
                                    "name"     => "date_apr",
                                    "value"    => set_value("date_apr", $result["date_apr"]),
                                    "class"    => "uk-width-large uk-form-small",
                                    "disabled" => "disabled"
                                );
                                echo form_input($date_apr);
                             ?>
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label uk-text-small uk-text-bold">Approved By</label>
                        <div class="uk-form-controls">
                            <?php
                                $approver = array(
                                    "id"       => "approver",
                                    "name"     => "approver",
                                    "value"    => set_value("approver", $result["approver"]),
                                    "class"    => "uk-width-large uk-form-small",
                                    "disabled" => "disabled"
                                );
                                echo form_input($approver);
                             ?>
                        </div>
                    </div>
                    <div class="uk-form-row uk-text-center uk-margin-large-bottom">
                        <button type="submit" class="uk-button uk-button-primary uk-button-small uk-width-2-10">Submit</button>
                        <a class="uk-button uk-button-small uk-width-2-10" href="<?php echo site_url("index.php"); ?>">Back</a>
                    </div>
                <?=form_close();?>
            </div>
        </div>
        <?php $this->load->view("templates/footer"); ?>
    </body>
</html>