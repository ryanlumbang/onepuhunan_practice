<?php
    $data['title'] = 'OnePuhunan Service Portal | Login';
?>
<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view("templates/head", $data); ?>
    <body>
        <?php $this->load->view("templates/header"); ?>
        <div class="page-wrap">
            <div class="uk-container uk-container-center">
                <div class="uk-align-right tm-padding">
                    <div style="width: 350px;">
                        <?=form_open("", array("class" => "uk-form uk-margin-left uk-margin-right tm-box-shadow tm-form", "style" => "padding: 30px 25px;"));?>
                            <legend class="uk-margin-small-top uk-text-large uk-text-bold">WELCOME</legend>
                            <div class="uk-form-row">
                                <label class="uk-form-label uk-text-small uk-text-bold">ALREADY HAVE AN ACCOUNT?</label>
                            </div>
                            
                            <?php echo validation_errors(); ?>
                            <?php
                                if ( isset($sp_ua_login_validation) ) {
                                    switch( $sp_ua_login_validation ) {
                                        case 1:
                                            echo "<div class='uk-alert uk-alert-danger uk-text-small uk-text-justify' data-uk-alert>"
                                            . "      <span>"
                                            .           "<big class='uk-text-bold'>Authentication Failed</big><br>"
                                            .           "Sorry, we couldn't find an account with that employee id. "
                                            . "      </span>"
                                            . "   </div>";
                                            break;
                                        case 2:
                                            echo "<div class='uk-alert uk-alert-danger uk-text-small uk-text-justify' data-uk-alert>"
                                            . "      <span>"
                                            .           "<big class='uk-text-bold'>Account Disabled</big><br>"
                                            .           "Your account has been disabled. "
                                            .           "Please contact the administrator if you have any questions or concerns."
                                            . "      </span>"
                                            . "   </div>";
                                            break;
                                        case 3:
                                            echo "<div class='uk-alert uk-alert-danger uk-text-small uk-text-justify' data-uk-alert>"
                                            . "      <span>"
                                            .           "<big class='uk-text-bold'>Account Locked</big><br>"
                                            .           "Unable to log you on because your account has been locked out. "
                                            .           "Please contact the administrator to have your account unlocked."
                                            . "      </span>"
                                            . "   </div>";
                                            break;
                                        case 4:
                                            echo "<div class='uk-alert uk-alert-danger uk-text-small uk-text-justify' data-uk-alert>"
                                            . "      <span>"
                                            .           "<big class='uk-text-bold'>Authentication Failed</big><br>"
                                            .           "Invalid employee id or password provided. "
                                            .           "Please try again."
                                            . "      </span>"
                                            . "   </div>";
                                            break;
                                        case 5:
                                            echo "<div class='uk-alert uk-alert-danger uk-text-small uk-text-justify' data-uk-alert>"
                                            . "      <span>"
                                            .           "<big class='uk-text-bold'>Account Locked</big><br>"
                                            .           "Your account has been locked out because of too many invalid login attempts. "
                                            .           "Please contact the administrator to have your account unlocked."
                                            . "      </span>"
                                            . "   </div>";
                                            break;
                                        default:
                                            redirect(base_url()."dashboard");
                                            break;
                                    }
                                }
                            ?>
                            
                            <div class="uk-form-row uk-form-icon">
                                <i class="uk-icon-user"></i>
                                <?php 
                                    $u_empid =  array(
                                        "id"    => "u_empid", 
                                        "name"  => "u_empid",
                                        "value" => set_value("u_empid"), 
                                        "class" => "uk-width-1-1 uk-form-medium",
                                        "placeholder" => "Employee ID"
                                    ); 
                                    echo form_input($u_empid); 
                                ?>
                            </div>
                            <div class="uk-form-row uk-form-icon">
                                <i class="uk-icon-lock"></i>
                                <?php
                                    $u_pass = array(
                                      "id"    => "u_pass",
                                      "name"  => "u_pass",
                                      "class" => "uk-width-1-1 uk-form-medium",
                                      "type"  => "password",
                                      "placeholder" => "Password"
                                    );
                                    echo form_input($u_pass);
                                ?>
                            </div>
                            <div class="uk-form-row">
                                <button type="submit" class="uk-width-1-1 uk-button uk-button-primary uk-text-bold">LOGIN</button>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label uk-text-small uk-text-bold">NEW TO SERVICE PORTAL?</label>
                                <br/>
                                <label class="uk-form-label uk-text-small">Sign up now to enjoy our services!</label> 
                            </div>
                            <div class="uk-form-row">
                                <a class="uk-width-1-1 uk-button uk-button-primary uk-text-bold" href="<?php echo site_url("signup"); ?>">SIGN UP</a>
                            </div>
                        <?=form_close();?>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view("templates/footer"); ?>
    </body>
</html>