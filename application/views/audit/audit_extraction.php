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
                <form class="uk-form"  id="tbl_form" name="tbl_form" method="post" action="../audit/csv">
                    <legend class="uk-text-muted uk-margin-large-top"><b>BRANCH</b> ETRACTION OF DATA</legend>
                    <div class="uk-form-row uk-margin-top-remove div">
                        <input type="text" id="branch_code" name="branch_code" class="uk-width-largeuk-width-largeuk-width-large uk-form-small branch-text" placeholder="Branch Code">

                            <select class="loan" id="loan" name="type_loan" onchange="typeLoan()">
                                <option value="" disabled selected hidden>Type of Loan </option>
                                <option value="0">Group Loan</option>
                                <option value="1">Individual Loan</option>
                            </select>
                        <br/>
                             <select class="month" id="months" name="month_name" onchange="myFunction()">
                                <option value="" disabled selected hidden>Month</option>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option valgue="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>

                            <select id="year" class="year" name="year_name" onchange="myFunction()">
                                <option value="" disabled selected hidden>Year</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                            </select>

                            <input type="text" class="input-text" name="hidden_date" id="text" placeholder="" value="">
                            <input type="text" class="input-loan" name="type_loan" id="loan_text" placeholder="" value="">

                        <div style="text-align: center; margin-top: 10px;">
                            <input type="submit" class="uk-button uk-button-primary uk-width-2-10  extract-button" value="Extract CSV" form="tbl_form" id="test1"/>
<!--                            <button type="submit" class="uk-button uk-button-primary uk-width-2-10  extract-button" form="tbl_form" id="test1">Extract CSV</button>-->
                        </div>
                    </div>
                    <hr class='uk-article-divider' style="margin-top: 15px; margin-bottom: 15px;">
                </form>

                <div class="preload">
                    <img src="http://localhost/onepuhunan_practice/img/loader.gif" class="sixe"/>
                </div>


            </div>
        </div>

        <style>.preload{display: none;} .sixe{    width: 20%;
                                           position: fixed;
                                           top: 31%;
                                           left: 40%;}</style>

        <script>



            $(document).ready(function() {
                $(".preload").hide();

                $("#test1").click(function() {
                    $(".preload").show();
                    $("#test1").hide();

                    setTimeout(function() {
                        $(".preload").hide();
                    }, 8000);
                });
            });
        </script>
        <?php $this->load->view("templates/footer"); ?>




    </body>
</html>