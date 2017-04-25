<!--<style>-->
<!--    table {-->
<!--        width:100%;-->
<!--    }-->
<!--    table, th, td {-->
<!--        border: 1px solid black;-->
<!--        border-collapse: collapse;-->
<!--    }-->
<!--    th, td {-->
<!--        padding: 5px;-->
<!--        text-align: left;-->
<!--    }-->
<!--    table#t01 tr:nth-child(even) {-->
<!--        background-color: #eee;-->
<!--    }-->
<!--    table#t01 tr:nth-child(odd) {-->
<!--        background-color:#fff;-->
<!--    }-->
<!--    table#t01 th {-->
<!--        background-color: black;-->
<!--        color: white;-->
<!--    }-->
<!--</style>-->
<!---->
<!---->
<?php //if($this->session->flashdata('message')){?>
<!--    <div align="center" class="alert alert-success">-->
<!--        --><?php //echo $this->session->flashdata('message')?>
<!--    </div>-->
<?php //} ?>
<!---->
<!--<br><br>-->
<!---->
<!--<div align="center">-->
<!--    <form action="--><?php //echo base_url(); ?><!--hr/import" method="post" name="upload_excel" enctype="multipart/form-data">-->
<!--        <input type="file" name="file" id="file" onchange="ValidateSingleInput(this);">-->
<!--        <button type="submit" id="submit" name="import" class="btn btn-primary button-loading">Import</button>-->
<!--    </form>-->
<!--    <br>-->
<!--    <br>-->
<!---->
<!--    <br><br>-->
<!---->
<!--    <div style="width:80%; margin:0 auto;" align="center">-->
<!--        <table id="t01">-->
<!--            <tr>-->
<!--                <th>Employee Number</th>-->
<!--                <th>Date of Birth</th>-->
<!--                <th>Gender</th>-->
<!--                <th>Date Hired</th>-->
<!--                <th>Date End Proby</th>-->
<!--                <th>Date of Resign</th>-->
<!--            </tr>-->
<!--            --><?php
//            if(isset($view_data) && is_array($view_data) && count($view_data)): $i=1;
//                foreach ($view_data as $key => $data) {
//                    ?>
<!---->
<!--                    <tr>-->
<!--                        <td>--><?php //echo $data['emp_no'] ?><!--</td>-->
<!--                        <td>--><?php //echo $data['date_of_birth'] ?><!--</td>-->
<!--                        <td>--><?php //echo $data['gender'] ?><!--</td>-->
<!--                        <td>--><?php //echo $data['date_hired'] ?><!--</td>-->
<!--                        <td>--><?php //echo $data['date_end_proby'] ?><!--</td>-->
<!--                        <td>--><?php //echo $data['date_of_resig'] ?><!--</td>-->
<!--                    </tr>-->
<!--                --><?php //} endif; ?>
<!--        </table>-->
<!--    </div>-->
<!---->
<!--</div>-->


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
        <form class="uk-form"  id="tbl_form" name="tbl_form"  action="<?php echo base_url(); ?>hr/import" method="post" name="upload_excel" enctype="multipart/form-data">
            <legend class="uk-text-muted uk-margin-large-top"><b>UPLOAD FILE</b> HR EMPLOYEE RECORDS</legend>
            <div class="uk-form-row uk-margin-top-remove div">

                <input type="file" name="file" id="file" onchange="ValidateSingleInput(this);">
                <br><br>
                <button type="submit" id="submit" name="import" class="uk-button uk-button-primary uk-width-2-10  extract-button">Import</button>

            </div>
            <hr class='uk-article-divider' style="margin-top: 15px; margin-bottom: 15px;">

        </form>

        <?php if($this->session->flashdata('message')){?>
            <div align="center" class="alert alert-success">
                <?php echo $this->session->flashdata('message')?>
            </div>
        <?php } ?>

    </div>

    <div style="width:70%; margin:0 auto;" align="center">
        <table style="text-align: center" id="t01" class="uk-table uk-table-condensed">
            <tr>
                <th>Employee Number</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Date Hired</th>
                <th>Date End Proby</th>
                <th>Date of Resign</th>
            </tr>
        </table>
        <table style="text-align: right!important;client" id="t01" class="uk-table uk-table-hover uk-table-striped uk-table-condensed">
            <?php
            if(isset($view_data) && is_array($view_data) && count($view_data)): $i=1;
                foreach ($view_data as $key => $data) {
                    ?>

                    <tr>
                        <td><?php echo $data['emp_no'] ?></td>
                        <td><?php echo $data['date_of_birth'] ?></td>
                        <td><?php echo $data['gender'] ?></td>
                        <td><?php echo $data['date_hired'] ?></td>
                        <td><?php echo $data['date_end_proby'] ?></td>
                        <td><?php echo $data['date_of_resig'] ?></td>
                    </tr>
                <?php } endif; ?>
        </table>
    </div>

</div>
<?php $this->load->view("templates/footer"); ?>


</body>
</html>