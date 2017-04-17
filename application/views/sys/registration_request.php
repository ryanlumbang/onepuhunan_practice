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
                <?=form_open("", array("class" => "uk-form"));?>
                    <legend class="uk-text-muted uk-margin-large-top"><b>NEW USER</b> REGISTRATION APPROVAL</legend>
                    <div class="uk-form-row uk-margin-top-remove">
                        <input type="text" id="reg_name" name="reg_name" class="uk-width-large uk-form-small">
                        <div style="text-align: center; margin-top: 10px;">
                            <button type="submit" class="uk-button uk-button-primary uk-button-small uk-width-2-10">Search</button>
                            <button type="submit" class="uk-button uk-button-small uk-width-2-10">Show All</button>
                        </div>
                    </div>
                    <hr class='uk-article-divider' style="margin-top: 15px; margin-bottom: 15px;">
                <?=form_close();?>
            </div>
            <div class="uk-container uk-width-7-10 uk-container-center" style="margin-top: 1px;">
                <?php
                    if($number_of_rows > 0) {
                        $table = "<table class = \"uk-table uk-table-hover uk-table-striped uk-table-condensed\">"
                               . "<caption>" . $number_of_rows . " Pending Registration Approval(s)</caption>" 
                               . "<thead>"
                               . "<tr>"
                               . "<th>Employee ID</th>"
                               . "<th>Employee Name</th>"
                               . "<th>Email Address</th>"
                               . "<th>Job Title</th>"
                               . "<th>Department</th>"
                               . "<th></th>"
                               . "</tr>"
                               . "</thead>"
                               . "<tbody>";
                        echo $table;
                        
                        foreach((array) $query as $item) {
                            $result = "<tr>"
                                    . "<td class=\"uk-text-bold uk-width-1-10 uk-table-middle\">" . $item["emp_id"] . "</td>"
                                    . "<td class=\"uk-width-2-10 uk-table-middle uk-text-uppercase\">" . $item["name"] . "</td>"
                                    . "<td class=\"uk-width-2-10 uk-table-middle\">" . $item["email"] . "</td>"
                                    . "<td class=\"uk-width-2-10 uk-table-middle\">" . $item["job_title"] . "</td>"
                                    . "<td class=\"uk-width-2-10 uk-table-middle\">" . $item["dept_name"] . "</td>"
                                    . "<td class=\"uk-width-1-10 uk-table-middle\">" . "<a class=\"uk-button uk-button-small\" href='../sys/approve_user/" . dechex($item["emp_id"]) . "'>Approve</a>" . "</td>"
                                    . "</tr>";
                            echo $result;
                        }
                        
                        echo "</tbody></table>";
                    } else {
                        $table = "<table class=\"uk-table\">"
                               . "<caption>0 Pending Registration Approval(s)</caption>"
                               . "</table>";
                        echo $table;
                    }
                ?>
                
            </div>
        </div>
        <?php $this->load->view("templates/footer"); ?>
    </body>
</html>