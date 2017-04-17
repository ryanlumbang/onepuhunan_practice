<?php
    $data['title'] = 'OnePuhunan Service Portal | Registration Successful';
?>
<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view("templates/head", $data); ?>
    <body>
        <?php $this->load->view("templates/header"); ?>
        <div class="page-wrap">
            <div id="tm-container" class="uk-container uk-width-5-10 uk-container-center">
                <?=form_open("", array("class" => "uk-form uk-form-horizontal"));?>
                    <legend class="uk-text-muted uk-text-bold uk-text-success tm-form-legend">
                        <a href="" class="uk-icon-check-circle uk-text-success"></a> REGISTRATION SUCCESSFUL!
                    </legend>
                    <div class="uk-form-row tm-label tm-form-success">
                        <label class="uk-text-small">
                            Congratulations! Your registration request has been received and will be reviewed and processed 
                            by the System Administrator. Your <b>"Employee ID"</b> is shown below. You will
                            need this, along with the password you chose, every time you enter <b>OnePuhunan Service Portal</b>. 
                            An email will be sent to the email address you specified confirming your registration.
                        </label>
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label uk-text-small">Employee ID</label>
                        <div class="uk-form-controls">
                            <label class="uk-form-label uk-text-small uk-text-bold"><?= $this->session->emp_id ?></label>
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label uk-text-small">Full Name</label>
                        <div class="uk-form-controls">
                            <label class="uk-form-label uk-text-small"><?= $this->session->name ?></label>
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label uk-text-small">Email Address</label>
                        <div class="uk-form-controls">
                            <label class="uk-form-label uk-text-small"><?= $this->session->email ?></label>
                        </div>
                    </div>
                    <div class="uk-form-row uk-text-center uk-margin-large-top">
                        <a class="uk-button uk-button-primary uk-button-small uk-width-3-10" href="<?php echo site_url("index.php"); ?>">GO TO LOGIN PAGE</a>
                    </div>
                <?=form_close();?>
            </div>
        </div>
        <?php $this->load->view("templates/footer"); ?>
        <?php
            $this->session->unset_userdata('emp_id');
            $this->session->unset_userdata('name');
            $this->session->unset_userdata('email');
        ?>
    </body>
</html>
