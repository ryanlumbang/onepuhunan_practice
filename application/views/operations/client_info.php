<?php
    $data['title'] = 'OnePuhunan Service Portal | Client Information';
?>
<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view("templates/head", $data); ?>
    <body>
        <?php $this->load->view("templates/header"); ?>
        <div class="page-wrap">
            <?php $this->load->view("templates/subheader"); ?>
            <div class="uk-container uk-width-6-10 uk-container-center">
                <div id="tm-cc" class="uk-grid uk-margin-remove">
                    <div class="uk-width-3-10">
                        <img class="uk-border-rounded uk-align-center" src="<?=base_url()?>img/system_png/placeholder_200x200.svg" height="120" width="120">
                    </div>
                    <div class="uk-width-7-10">
                        <span class="tm-cc-title"><?=$result["Name"]?></span>
                        <hr>
                        <table class="uk-table uk-table-striped uk-table-condensed">
                            <tbody>
                                <tr>
                                    <td class="uk-width-2-5 uk-text-bold">Branch</td>
                                    <td class="uk-width-3-5 uk-text-uppercase"><?="(" .$result["OurBranchID"] . ") " . $result["BranchName"]?></td>
                                </tr>
                                <tr>
                                    <td class="uk-text-bold">Client ID</td>
                                    <td><?=$result["ClientID"]?></td>
                                </tr>
                                <tr>
                                    <td class="uk-text-bold">Client Since</td>
                                    <td><?=date("F d, Y", strtotime($result["ClientSince"]))?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="uk-width-1-1">
                        <div class="tm-cc-sub-title">PERSONAL INFORMATION</div>
                        <hr>
                        <table class="uk-table uk-table-striped uk-table-condensed">
                            <tbody>
                                <tr>
                                    <td class="uk-width-2-5 uk-text-bold">Date of Birth</td>
                                    <td class="uk-width-3-5"><?=date("F m, Y", strtotime($result["DateOfBirth"]))?></td>
                                </tr>
                                <tr>
                                    <td class="uk-text-bold">Mobile No.</td>
                                    <td><?=$result["Mobile"]?></td>
                                </tr>
                                <tr>
                                    <td class="uk-text-bold">Address 1</td>
                                    <td><?=$result["Address1"]?></td>
                                </tr>
                                <tr>
                                    <td class="uk-text-bold">Address 2</td>
                                    <td><?=$result["Address2"]?></td>
                                </tr>
                                <tr>
                                    <td class="uk-text-bold">City</td>
                                    <td><?=$result["City"]?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="uk-width-1-1">
                        <div class="tm-cc-sub-title">BUSINESS INFORMATION</div>
                        <hr>
                        <table class="uk-table uk-table-striped uk-table-condensed">
                            <tbody>
                                <tr>
                                    <td class="uk-width-2-5 uk-text-bold">No. of Loan Availed</td>
                                    <td class="uk-width-3-5 uk-text-bold"><?=$result["NoOfLoanAvailed"]?></td>
                                </tr>
                                <tr>
                                    <td class="uk-text-bold">Business Name</td>
                                    <td><?=$result["BusName"]?></td>
                                </tr>
                                <tr>
                                    <td class="uk-text-bold">Business Address</td>
                                    <td><?=$result["BusinessAdd"]?></td>
                                </tr>
                                <tr>
                                    <td class="uk-text-bold">Years in Business</td>
                                    <td><?=$result["YearsInBus"]?></td>
                                </tr>
                                <tr>
                                    <td class="uk-text-bold">Business Size</td>
                                    <td><?=$result["BuSizeDesc"]?></td>
                                </tr>
                                <tr>
                                    <td class="uk-text-bold">Business Type</td>
                                    <td><?=$result["BTypeDesc"]?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="uk-width-1-1">
                        <div class="tm-cc-sub-title">ACCOUNT HISTORY</div>
                        <hr>
                       
                        <ul class="uk-tab tm-tab" data-uk-tab="{connect:'#tab-content', animation:'fade'}">
                            <?php 
                                foreach((array) $acct_history as $item) {
                                    if($item["LoanAvailmentSeries"] == isset($result["NoOfLoanAvailed"])) {
                                        $result = "<li class=\"uk-active uk-text-small\"><a href=\"#\">". $item["LoanAvailmentSeries"] . "</a></li>";
                                    } else {
                                        $result = "<li class=\"uk-text-small\"><a href=\"#\">". $item["LoanAvailmentSeries"] . "</a></li>";
                                    }
                                    echo $result;
                                }
                            ?>
                        </ul>
                       
                        <ul id="tab-content" class="uk-switcher uk-margin">
                            <?php
                                foreach((array) $acct_history as $item) {
                                    $table = "<li>"
                                           . "<table class=\"uk-table uk-table-striped uk-table-condensed tm-cc-hist uk-margin-large-bottom\">"
                                           . "<tbody>"
                                           . "<tr>"
                                           . "<td class=\"uk-width-2-5 uk-text-bold\">Account ID</td>"
                                           . "<td class=\"uk-width-3-5\">" . $item["AccountID"] . "</td>"
                                           . "</tr>"
                                           . "<tr>"
                                           . "<td class=\"uk-text-bold\">Product Code</td>"
                                           . "<td>" . $item["ProductName"] . "</td>"
                                           . "</tr>"
                                           . "<tr>"
                                           . "<td class=\"uk-text-bold\">Disbursed Amount</td>"
                                           . "<td>" . str_replace('$', '', $item["DisbursedAmount"])  . "</td>"
                                           . "</tr>"
                                           . "<tr>"
                                           . "<td class=\"uk-text-bold\">Loan Purpose</td>"
                                           . "<td>" . $item["LoanPurpose"] . "</td>"
                                           . "</tr>"
                                           . "<tr>"
                                           . "<td class=\"uk-text-bold\">First Disbursement Date</td>"
                                           . "<td>" . ($item["FirstDisbursementDate"] == "" ? "" : date("F d, Y", strtotime($item["FirstDisbursementDate"]))) . "</td>"
                                           . "</tr>"
                                           . "<tr>"
                                           . "<td class=\"uk-text-bold\">Last Schedule Installment Date</td>"
                                           . "<td>" . ($item["LastSchedInstDate"] == "" ? "" : date("F d, Y", strtotime($item["LastSchedInstDate"]))) . "</td>"
                                           . "</tr>"
                                           . "<tr>"
                                           . "<td class=\"uk-text-bold\">Closed Date</td>"
                                           . "<td>" . ($item["ClosedDate"] == "" ? "" : date("F d, Y", strtotime($item["ClosedDate"]))) . "</td>"
                                           . "</tr>"
                                           . "<tr>"
                                           . "<td class=\"uk-text-bold\">Loan Term Days</td>"
                                           . "<td>" . $item["LoanTermDays"] . " Days</td>"
                                           . "</tr>"
                                           . "<tr>"
                                           . "<td class=\"uk-text-bold\">Relationship Officer</td>"
                                           . "<td>" . ($item["ROCode"] == "" ? "" : "(" . $item["ROCode"] . ") " . $item["ROName"] ) . "</td>"
                                           . "</tr>"
                                           . "<tr>"
                                           . "<td class=\"uk-text-bold\">Sales Officer</td>"
                                           . "<td>" . ($item["SOCode"] == "" ? "" : "(" . $item["SOCode"] . ") " . $item["SOName"] ) . "</td>"
                                           . "</tr>"
                                           . "<tr>"
                                           . "<td class=\"uk-text-bold\">Group</td>"
                                           . "<td>" . ($item["GroupID"] == "" ? "" : "(" . $item["GroupID"] . ") " . $item["GroupName"] ) . "</td>"
                                           . "</tr>"
                                           . "<tr>"
                                           . "<td class=\"uk-text-bold\">Nominee Name</td>"
                                           . "<td>" . $item["NomineeName"] . "</td>"
                                           . "</tr>"
                                           . "<tr>"
                                           . "<td class=\uk-text-bold\">Relationship</td>"
                                           . "<td>" . $item["Relationship"] . "</td>"
                                           . "</tr>"
                                           . "<tr>"
                                           . "<td class=\"uk-text-bold\">No. of Arrear Days</td>"
                                           . "<td>" . $item["NoOfArrearDays"] . "</td>"
                                           . "</tr>"
                                           . "<tr>"
                                           . "<td class=\"uk-text-bold\">Attendance Counts</td>"
                                           . "<td>" . $item["AttendanceCnt"] . "</td>"
                                           . "</tr>"
                                           . "<tr>"
                                           . "<td class=\"uk-text-bold\">Meeting Counts</td>"
                                           . "<td>" . $item["MeetingCnt"] . "</td>"
                                           . "</tr>"
                                           . "<tr>"
                                           . "<td class=\"uk-text-bold\">Delayed Payments</td>"
                                           . "<td>" . $item["DelayedPymnt"] . "</td>"
                                           . "</tr>"
                                           . "</tbody>"
                                           . "</table>"
                                           . "</li>";
                                    echo $table;
                                }
                            ?>
                            
                        </ul>
                        
                    </div>
                </div>
                
            </div>
        </div>
        <?php $this->load->view("templates/footer"); ?>
    </body>
</html>
