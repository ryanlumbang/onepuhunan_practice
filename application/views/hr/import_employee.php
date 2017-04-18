<style>
    table {
        width:100%;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding: 5px;
        text-align: left;
    }
    table#t01 tr:nth-child(even) {
        background-color: #eee;
    }
    table#t01 tr:nth-child(odd) {
        background-color:#fff;
    }
    table#t01 th {
        background-color: black;
        color: white;
    }
</style>
<?php if($this->session->flashdata('message')){?>
    <div align="center" class="alert alert-success">
        <?php echo $this->session->flashdata('message')?>
    </div>
<?php } ?>

<br><br>

<div align="center">
    <form action="<?php echo base_url(); ?>hr/import" method="post" name="upload_excel" enctype="multipart/form-data">
        <input type="file" name="file" id="file">
        <button type="submit" id="submit" name="import" class="btn btn-primary button-loading">Import</button>
    </form>
    <br>
    <br>

    <br><br>

    <div style="width:80%; margin:0 auto;" align="center">
        <table id="t01">
            <tr>
                <th>Employee Number</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Date Hired</th>
                <th>Date End Proby</th>
                <th>Date of Resign</th>
            </tr>
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