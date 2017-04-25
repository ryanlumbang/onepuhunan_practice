<?php
    $data['title'] = 'OnePuhunan Service Portal | Registration Request';
    header("Cache-Control: max-age=0, must-revalidate");
?>
<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view("templates/head", $data); ?>
    <body>
        <?php $this->load->view("templates/header"); ?>
        <div class="page-wrap">
            <?php $this->load->view("templates/subheader"); ?>
            <div class="uk-container uk-width-5-10 uk-container-center">

                <?php if($this->session->flashdata('message')){?>
                    <div align="center" class="alert alert-success">
                        <?php echo $this->session->flashdata('message')?>
                    </div>
                <?php } ?>
                    <form class="uk-form"  id="tbl_form" name="tbl_form"  action="<?php echo base_url(); ?>audit/import" method="post" name="upload_excel" enctype="multipart/form-data">
                        <legend class="uk-text-muted uk-margin-large-top"><b>UPLOAD FILE</b> AUDIT IMPORT DATA</legend>
                        <div class="uk-form-row uk-margin-top-remove div">

                            <input type="file" name="file" id="file" class="input-file" accept=".csv" onchange="ValidateSingleInput(this);">
                            <label for="file" class="btn btn-tertiary js-labelFile">
                                <i class="uk-icon-cloud-upload"></i>
                                <span class="js-fileName">Choose a file</span>
                            </label>

                                    <br>
<!--                                <button type="submit" id="submit" name="import" class="uk-button uk-button-primary uk-width-2-10">Import</button>-->

                            <input type="submit" name="import" id="submit" class="uk-button uk-button-primary uk-width-2-10" value="Import CSV"/>

                        </div>


                        <hr class='uk-article-divider' style="margin-top: 15px; margin-bottom: 15px;">

                    </form>
                </div>
            </div>
        </div>
        <?php $this->load->view("templates/footer"); ?>

    </body>
</html>