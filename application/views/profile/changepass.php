<?php
    $data['title'] = 'OnePuhunan Service Portal | Change Password';
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
                    if ( isset($sp_ua_upd_user_pass) ) {
                        switch ($sp_ua_upd_user_pass) {
                            case 1:
                                echo "<div class='uk-alert uk-alert-warning uk-text-small' data-uk-alert> "
                                . "      <a href='' class='uk-alert-close uk-close'></a>"
                                . "      <span>Sorry, a user account with that employee id not existing.</span>"
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
                    <legend class="uk-text-muted uk-text-bold tm-form-legend">CHANGE PASSWORD</legend>
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
                        <label class="uk-form-label uk-text-small uk-text-bold">New Password <span class="tm-required-label">*</span></label>
                        <div class="uk-form-controls">
                            <?php
                                $password = array(
                                    "id" => "password",
                                    "name" => "password",
                                    "type" => "password",
                                    "class" => "uk-width-large uk-form-small",
                                    "placeholder" => "Please enter your new password."
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
                                    "class" => "uk-width-large uk-form-small",
                                    "placeholder" => "Please confirm the password you entered above."
                                );
                                echo form_input($passconf);
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