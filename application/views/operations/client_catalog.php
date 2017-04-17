<?php
    $data['title'] = 'OnePuhunan Service Portal | Client Catalog';
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
                    <legend class="uk-text-muted uk-margin-large-top"><b>CLIENT CATALOG</b> SEARCH</legend>
                    <div class="uk-form-row tm-label">
                        <label class="uk-form-label uk-text-small">Enter <b>client's name</b> or part of a name, <b>client id</b>, and <b>date of birth</b> (<i>yyyy-MM-dd</i>).</b> </label>
                    </div>
                    <div class="uk-form-row uk-margin-top-remove">
                        <input type="text" id="c_name" name="c_name" class="uk-width-large uk-form-small">
                        <label class="uk-text-small"><input type="checkbox" name="chk-spouse" class="tm-chkbox" value="true" <?php if(filter_input(INPUT_POST, 'chk-spouse')) { echo "checked='checked'"; } ?>> Include borrower's spouse name to search criteria.</label>
                        <div style="text-align: center; margin-top: 10px;">
                            <button type="submit" class="uk-button uk-button-primary uk-button-small uk-width-2-10">Search</button>
                            <button type="reset" class="uk-button uk-button-small uk-width-2-10">Clear</button>
                        </div>
                    </div>
                    <hr class='uk-article-divider' style="margin-top: 15px; margin-bottom: 15px;">
                <?=form_close();?>
            </div>
            <div class="uk-container uk-width-7-10 uk-container-center" style="margin-top: 1px;">
                <?php
                    if(filter_input_array(INPUT_POST)) {
                        if($number_of_rows > 0) {
                            $table = "<table class=\"uk-table uk-table-hover uk-table-striped uk-table-condensed\">"
                                   . "<caption>See below for search results close to your request, or try a new search. <br/><br/> "
                                   . " You searched for <b> \"". filter_input(INPUT_POST, "c_name") . "\" </b><br/> "
                                   . "(" . $number_of_rows . " rows retrieved)</caption>"
                                   . "<thead>"
                                   . "<tr>"
                                   . "<th>#</th>"
                                   . "<th>Branch ID</th>"
                                   . "<th>Branch Name</th>"
                                   . "<th>Client ID</th>"
                                   . "<th>Name</th>"
                                   . "<th>Client Since</th>"
                                   . "<th>Loan Availed</th>"
                                   . "</tr>"
                                   . "</thead>"
                                   . "<tbody>";
                            echo $table;
                            
                            foreach((array) $query as $item) {
                                $result = "<tr>"
                                        . "<td class=\"uk-text-bold uk-width-1-10 uk-table-middle\">" . $item["RowNumber"] . "</td>"
                                        . "<td class=\"uk-width-1-10 uk-table-middle\">" . $item["OurBranchID"] . "</td>"
                                        . "<td class=\"uk-width-2-10 uk-table-middle\">" . $item["BranchName"] . "</td>"
                                        . "<td class=\"uk-width-1-10 uk-table-middle\">" . $item["ClientID"] . "</td>"
                                        . "<td class=\"uk-width-3-10 uk-table-middle\"><a href='./client_info/" . dechex($item["ClientID"]) . "'>" . $item["Name"] . "</a></td>"
                                        . "<td class=\"uk-width-1-10 uk-table-middle\">" . $item["ClientSince"] . "</td>"
                                        . "<td class=\"uk-width-1-10 uk-text-center uk-table-middle\">" . $item["LoanAvailmentSeries"] . "</td>"
                                        . "</tr>";
                                echo $result;
                            }
                            echo "</tbody></table>";
                        } else {
                            $table = "<table class=\"uk-table\">"
                                   . "<caption>No results found. Try searching again.<br/><br/>"
                                   . "You searched for <b> \"". filter_input(INPUT_POST, "c_name") . "\" </b><br/>"
                                   . "(" . $number_of_rows . " rows retrieved)</caption>"
                                   . "</table>";
                            echo $table;
                        } 
                    }     
                ?> 
            </div>  
        </div>
        <?php $this->load->view("templates/footer"); ?>
    </body>
</html>