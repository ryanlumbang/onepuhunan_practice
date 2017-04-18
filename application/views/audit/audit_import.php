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
                <form class="uk-form"  id="tbl_form" name="tbl_form" method="post" action="../audit/upload">
                    <legend class="uk-text-muted uk-margin-large-top"><b>UPLOAD FILE</b> AUDIT IMPORT DATA</legend>
                    <div class="uk-form-row uk-margin-top-remove div">




                            <label class="form-label span3" for="file">File</label>
                            <input type="file" name="file" id="file" required />


                            <br><br>
                            <input type="submit" class="uk-button uk-button-primary uk-width-2-10  extract-button" value="Submit" />




                    </div>
                    <hr class='uk-article-divider' style="margin-top: 15px; margin-bottom: 15px;">
                </form>
            </div>
        </div>
        <?php $this->load->view("templates/footer"); ?>




    </body>
</html>