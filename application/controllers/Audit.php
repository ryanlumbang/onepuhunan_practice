<?php

//Author : Ryan-Jay Lumbang
//Date   : February 08, 2017

class Audit extends CI_Controller {
    public function _construct() {
        parent:: _construct();
    }

    public function index() {
        $this->load->model("Audit_model");
        $data["query"] = $this->Audit_model->get_branch_list();
        $this->load->view("audit/audit_extraction", $data);

    }

//    public function import() {
//        $this->load->model("Audit_model");
//        $data["query"] = $this->Audit_model->view_data();
//        $this->load->view("audit/audit_import", $data);
//    }

    public function csv()
    {
//        $this->load->model("Audit_model");
//        $data["query"] = $this->Audit_model->get_branch_list();
//
//
//        //$this->load->view("audit/audit_extraction", $data);
//
//
//        $filename = "TXT_FILE".date("YmdH_i_s").'.csv';
//
//        header('Content-type:text/csv');
//        header('Content-Disposition: attachment;filename='.$filename);
//        header('Cache-Control: no-store, no-cache, must-revalidate');
//        header('Pragma: no-cache');
//        header('Expires:0');
//
//
//
//
//        $handle = fopen('php://output','w');
//
//
//        fputcsv($handle, array(
//
//            'OurBranchID',
//            'ClientID',
//            'Mobile',
//            'Address1',
//            'Address2',
//            'City',
//            'AccountID',
//            'LoanAmount',
//            'LoanPurpose',
//            'SanctionedDate',
//            'FirstDisbursementDate',
//            'MaturityDate',
//            'ClosedDate',
//            'UtilDate',
//
//        ));
//       // $objPHPExcel->getActiveSheet()->getStyle('A2')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
//        //$this->db->select('*');
//        //$this->db->from('query');
//        //$data['query'] = $this->Audit_model->get_branch_list();
//
//        //fputcsv($handle, $data);
//
//        //fputcsv($handle, array(
//            //"OurBranchID" => $data["query"]["OurBranchID"]
//        //));
//
//
//
//
//        foreach ($data['query'] as $key => $row)
//        {
//            fputcsv($handle, $row);
//
//        }
//        //$this->load->view("audit/audit_extraction", $data);
////
////        fclose($handle);
////        exit;
////        echo "<pre>";
////        print_r ($data['query']);
////        echo "</pre>";
//
//        //$this->load->view("audit/audit_extraction", $data);
        ini_set('memory_limit', '-1');
        set_time_limit(0);

        $this->load->model("Audit_model");
        $data["query"] = $this->Audit_model->get_branch_list();

        require (APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
        require (APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties()->setCreator("");
        $objPHPExcel->getProperties()->setLastModifiedBy("");
        $objPHPExcel->getProperties()->setTitle("");
        $objPHPExcel->getProperties()->setSubject("");
        $objPHPExcel->getProperties()->setDescription("");

        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->setCellValue('A1','REGIONCODE');
        $objPHPExcel->getActiveSheet()->setCellValue('B1','REGIONDESC');
        $objPHPExcel->getActiveSheet()->setCellValue('C1','OURBRANCHID');
        $objPHPExcel->getActiveSheet()->setCellValue('D1','BRANCHNAME');
        $objPHPExcel->getActiveSheet()->setCellValue('E1','ROCODE');
        $objPHPExcel->getActiveSheet()->setCellValue('F1','RONAME');
        $objPHPExcel->getActiveSheet()->setCellValue('G1','SOCODE');
        $objPHPExcel->getActiveSheet()->setCellValue('H1','SONAME');
        $objPHPExcel->getActiveSheet()->setCellValue('I1','GROUPID');
        $objPHPExcel->getActiveSheet()->setCellValue('J1','GROUPNAME');
        $objPHPExcel->getActiveSheet()->setCellValue('K1','MEETINGDAY');
        $objPHPExcel->getActiveSheet()->setCellValue('L1','MEETINGTIME');
        $objPHPExcel->getActiveSheet()->setCellValue('M1','DEVCODE');
        $objPHPExcel->getActiveSheet()->setCellValue('N1','CLIENTID');
        $objPHPExcel->getActiveSheet()->setCellValue('O1','NAME');
        $objPHPExcel->getActiveSheet()->setCellValue('P1','GENDER');
        $objPHPExcel->getActiveSheet()->setCellValue('Q1','DATEOFBIRTH');
        $objPHPExcel->getActiveSheet()->setCellValue('R1','AGE');
        $objPHPExcel->getActiveSheet()->setCellValue('S1','MARSTATDESC');
        $objPHPExcel->getActiveSheet()->setCellValue('T1','LITLVLDESC');
        $objPHPExcel->getActiveSheet()->setCellValue('U1','MOBILE');
        $objPHPExcel->getActiveSheet()->setCellValue('V1','ADDRESS1');
        $objPHPExcel->getActiveSheet()->setCellValue('W1','ADDRESS2');
        $objPHPExcel->getActiveSheet()->setCellValue('X1','CITY');
        $objPHPExcel->getActiveSheet()->setCellValue('Y1','IDDESC');
        $objPHPExcel->getActiveSheet()->setCellValue('Z1','NUMBEROFHHMEMBERS');
        $objPHPExcel->getActiveSheet()->setCellValue('AA1','ACCOUNTID');
        $objPHPExcel->getActiveSheet()->setCellValue('AB1','LOANSERIES');
        $objPHPExcel->getActiveSheet()->setCellValue('AC1','LOANAVAILMENT');
        $objPHPExcel->getActiveSheet()->setCellValue('AD1','LOANPRODUCT');
        $objPHPExcel->getActiveSheet()->setCellValue('AE1','LOANPURPOSE');
        $objPHPExcel->getActiveSheet()->setCellValue('AF1','SANCTIONEDDATE');
        $objPHPExcel->getActiveSheet()->setCellValue('AG1','FIRSTDISBURSEMENTDATE');
        $objPHPExcel->getActiveSheet()->setCellValue('AH1','MATURITYDATE');
        $objPHPExcel->getActiveSheet()->setCellValue('AI1','UTILDATE');
        $objPHPExcel->getActiveSheet()->setCellValue('AJ1','LOANAGE');
        $objPHPExcel->getActiveSheet()->setCellValue('AK1','LOANAMOUNT');
        $objPHPExcel->getActiveSheet()->setCellValue('AL1','INTERESTAMOUNT');
        $objPHPExcel->getActiveSheet()->setCellValue('AM1','DISBURSEDAMOUNT');
        $objPHPExcel->getActiveSheet()->setCellValue('AN1','UTILAMOUNT');
        $objPHPExcel->getActiveSheet()->setCellValue('AO1','UTILDESCRIPTION');
        $objPHPExcel->getActiveSheet()->setCellValue('AP1','VERIFIEDBY');
        $objPHPExcel->getActiveSheet()->setCellValue('AQ1','OUTSTANDINGPRINCIPAL');
        $objPHPExcel->getActiveSheet()->setCellValue('AR1','OUTSTANINDINTEREST');
        $objPHPExcel->getActiveSheet()->setCellValue('AS1','PRINPAIDAMOUNT');
        $objPHPExcel->getActiveSheet()->setCellValue('AT1','PRINPREPAIDAMOUNT');
        $objPHPExcel->getActiveSheet()->setCellValue('AU1','PRINDUEAMOUNT');
        $objPHPExcel->getActiveSheet()->setCellValue('AV1','INTPAIDAMOUNT');
        $objPHPExcel->getActiveSheet()->setCellValue('AW1','INTPREPAIDAMOUNT');
        $objPHPExcel->getActiveSheet()->setCellValue('AX1','INTDUEAMOUNT');
        $objPHPExcel->getActiveSheet()->setCellValue('AY1','ADVINSTALLREV');
        $objPHPExcel->getActiveSheet()->setCellValue('AZ1','PRINARREARAMOUNT');
        $objPHPExcel->getActiveSheet()->setCellValue('BA1','LASTINSTDUEDATE');
        $objPHPExcel->getActiveSheet()->setCellValue('BB1','NOOFARREARDAYS');
        $objPHPExcel->getActiveSheet()->setCellValue('BC1','ATTENDACECNT');
        $objPHPExcel->getActiveSheet()->setCellValue('BD1','MEETINGCNT');
        $objPHPExcel->getActiveSheet()->setCellValue('BE1','ATTENDANCERATIO');
        $objPHPExcel->getActiveSheet()->setCellValue('BF1','DELAYEDPAYMENT');
        $objPHPExcel->getActiveSheet()->setCellValue('BG1','CTRORGSO');
        $objPHPExcel->getActiveSheet()->setCellValue('BH1','LOANPARTNER');
        $objPHPExcel->getActiveSheet()->setCellValue('BI1','GROUPCATEGORY');
        $objPHPExcel->getActiveSheet()->setCellValue('BJ1','ROWNDESC');
        $objPHPExcel->getActiveSheet()->setCellValue('BK1','BUSNAME');
        $objPHPExcel->getActiveSheet()->setCellValue('BL1','BUSINESSADD');
        $objPHPExcel->getActiveSheet()->setCellValue('BM1','YRSINBUS');
        $objPHPExcel->getActiveSheet()->setCellValue('BN1','BUSIZEDESC');
        $objPHPExcel->getActiveSheet()->setCellValue('BO1','BTYPEDESC');
        $objPHPExcel->getActiveSheet()->setCellValue('BP1','GROSSFAMILYINCOME');
        $objPHPExcel->getActiveSheet()->setCellValue('BQ1','GROSSSELFINCOME');
        $objPHPExcel->getActiveSheet()->setCellValue('BR1','GROSSFAMILYEXP');
        $objPHPExcel->getActiveSheet()->setCellValue('BS1','BUSEXPENSE');
        $objPHPExcel->getActiveSheet()->setCellValue('BT1','OTHERMONTHLYAMT');
        $objPHPExcel->getActiveSheet()->setCellValue('BU1','COMAKER');
        $objPHPExcel->getActiveSheet()->setCellValue('BV1','NOMINEENAME');
        $objPHPExcel->getActiveSheet()->setCellValue('BW1','NOMINEEDOB');
        $objPHPExcel->getActiveSheet()->setCellValue('BX1','NOMINEEGENDER');
        $objPHPExcel->getActiveSheet()->setCellValue('BY1','RELATIONSHIP');
        $objPHPExcel->getActiveSheet()->setCellValue('BZ1','COLLATERALDESC');
        $objPHPExcel->getActiveSheet()->setCellValue('CA1','TOTALCOLLATERALVALUE');
        $objPHPExcel->getActiveSheet()->setCellValue('CB1','TOTALNETCOLLATERALVALUE');
        $objPHPExcel->getActiveSheet()->setCellValue('CC1','TOTALAPPORTIONEDVALUE');


        $objPHPExcel->getActiveSheet()->getStyle('A1:U1')->getFont()->setBold(true);

        $objPHPExcel->getActiveSheet();$objPHPExcel->getActiveSheet()
        ->getStyle('A1:CC1')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


        $objPHPExcel->getActiveSheet();$objPHPExcel->getActiveSheet()
        ->getStyle('A')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $objPHPExcel->getActiveSheet()->freezePane('A2');
        $objPHPExcel->getActiveSheet()
            ->getStyle('A1:CC1')
            ->getFill()
            ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('FF808080');

        for($col = 'A'; $col !== 'BZ'; $col++)
        {
            $objPHPExcel->getActiveSheet()
                ->getColumnDimension($col)
                ->setAutoSize(true);
        }

        for($col = 'CA'; $col !== 'CD'; $col++)
        {
            $objPHPExcel->getActiveSheet()
                ->getColumnDimension($col)
                ->setWidth(0);
        }

        $row = 2;

//        echo "<pre>";
//       print_r ($data['query']);
//        echo "</pre>";

        foreach ($data["query"] as $item)
       {
           //var_dump($item['OurBranchID']);
           $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $item['RegionCode']);
           $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $item['RegionDesc']);
           $objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $item['OurBranchID']);
           $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $item['BranchName']);
           $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $item['ROCode']);
           $objPHPExcel->getActiveSheet()->setCellValue('F'.$row, $item['ROName']);
           $objPHPExcel->getActiveSheet()->setCellValue('G'.$row, $item['SOCode']);
           $objPHPExcel->getActiveSheet()->setCellValue('H'.$row, $item['SOName']);
           $objPHPExcel->getActiveSheet()->setCellValue('I'.$row, $item['GroupID']);
           $objPHPExcel->getActiveSheet()->setCellValue('J'.$row, $item['GroupName']);
           $objPHPExcel->getActiveSheet()->setCellValue('K'.$row, $item['MeetingDay']);
           $objPHPExcel->getActiveSheet()->setCellValue('L'.$row, $item['MeetingTime']);
           $objPHPExcel->getActiveSheet()->setCellValue('M'.$row, $item['DevCode']);
           $objPHPExcel->getActiveSheet()->setCellValue('N'.$row, $item['ClientID']);
           $objPHPExcel->getActiveSheet()->setCellValue('O'.$row, $item['Name']);
           $objPHPExcel->getActiveSheet()->setCellValue('P'.$row, $item['Gender']);
           $objPHPExcel->getActiveSheet()->setCellValue('Q'.$row, $item['DateOfBirth']);
           $objPHPExcel->getActiveSheet()->setCellValue('R'.$row, $item['Age']);
           $objPHPExcel->getActiveSheet()->setCellValue('S'.$row, $item['MarStatDesc']);
           $objPHPExcel->getActiveSheet()->setCellValue('T'.$row, $item['LitlvlDesc']);
           $objPHPExcel->getActiveSheet()->setCellValue('U'.$row, $item['Mobile']);
           $objPHPExcel->getActiveSheet()->setCellValue('V'.$row, $item['Address1']);
           $objPHPExcel->getActiveSheet()->setCellValue('W'.$row, $item['Address2']);
           $objPHPExcel->getActiveSheet()->setCellValue('X'.$row, $item['City']);
           $objPHPExcel->getActiveSheet()->setCellValue('Y'.$row, $item['IDDesc']);
           $objPHPExcel->getActiveSheet()->setCellValue('Z'.$row, $item['NumberofHHMembers']);
           $objPHPExcel->getActiveSheet()->setCellValue('AA'.$row, $item['AccountID']);
           $objPHPExcel->getActiveSheet()->setCellValue('AB'.$row, $item['LoanSeries']);
           $objPHPExcel->getActiveSheet()->setCellValue('AC'.$row, $item['LoanAvailment']);
           $objPHPExcel->getActiveSheet()->setCellValue('AD'.$row, $item['LoanProduct']);
           $objPHPExcel->getActiveSheet()->setCellValue('AE'.$row, $item['LoanPurpose']);
           $objPHPExcel->getActiveSheet()->setCellValue('AF'.$row, $item['SanctionedDate']);
           $objPHPExcel->getActiveSheet()->setCellValue('AG'.$row, $item['FirstDisbursementDate']);
           $objPHPExcel->getActiveSheet()->setCellValue('AH'.$row, $item['MaturityDate']);
           $objPHPExcel->getActiveSheet()->setCellValue('AI'.$row, $item['UtilDate']);
           $objPHPExcel->getActiveSheet()->setCellValue('AJ'.$row, $item['LoanAge']);
           $objPHPExcel->getActiveSheet()->setCellValue('AK'.$row, $item['LoanAmount']);
           $objPHPExcel->getActiveSheet()->setCellValue('AL'.$row, $item['InterestAmount']);
           $objPHPExcel->getActiveSheet()->setCellValue('AM'.$row, $item['DisbursedAmount']);
           $objPHPExcel->getActiveSheet()->setCellValue('AN'.$row, $item['UtilAmount']);
           $objPHPExcel->getActiveSheet()->setCellValue('AO'.$row, $item['UtilDescription']);
           $objPHPExcel->getActiveSheet()->setCellValue('AP'.$row, $item['VerifiedBy']);
           $objPHPExcel->getActiveSheet()->setCellValue('AQ'.$row, $item['OutstandingPrincipal']);
           $objPHPExcel->getActiveSheet()->setCellValue('AR'.$row, $item['OutstanindInterest']);
           $objPHPExcel->getActiveSheet()->setCellValue('AS'.$row, $item['PrinPaidAmount']);
           $objPHPExcel->getActiveSheet()->setCellValue('AT'.$row, $item['PrinPrepaidAmount']);
           $objPHPExcel->getActiveSheet()->setCellValue('AU'.$row, $item['PrinDueAmount']);
           $objPHPExcel->getActiveSheet()->setCellValue('AV'.$row, $item['IntPaidAmount']);
           $objPHPExcel->getActiveSheet()->setCellValue('AW'.$row, $item['IntPrepaidAmount']);
           $objPHPExcel->getActiveSheet()->setCellValue('AX'.$row, $item['IntDueAmount']);
           $objPHPExcel->getActiveSheet()->setCellValue('AY'.$row, $item['AdvInstallRev']);
           $objPHPExcel->getActiveSheet()->setCellValue('AZ'.$row, $item['PrinArrearAmount']);
           $objPHPExcel->getActiveSheet()->setCellValue('BA'.$row, $item['LastInstDueDate']);
           $objPHPExcel->getActiveSheet()->setCellValue('BB'.$row, $item['NoOfArrearDays']);
           $objPHPExcel->getActiveSheet()->setCellValue('BC'.$row, $item['AttendaceCnt']);
           $objPHPExcel->getActiveSheet()->setCellValue('BD'.$row, $item['MeetingCnt']);
           $objPHPExcel->getActiveSheet()->setCellValue('BE'.$row, $item['AttendanceRatio']);
           $objPHPExcel->getActiveSheet()->setCellValue('BF'.$row, $item['DelayedPayment']);
           $objPHPExcel->getActiveSheet()->setCellValue('BG'.$row, $item['CtrOrgSO']);
           $objPHPExcel->getActiveSheet()->setCellValue('BH'.$row, $item['LoanPartner']);
           $objPHPExcel->getActiveSheet()->setCellValue('BI'.$row, $item['GroupCategory']);
           $objPHPExcel->getActiveSheet()->setCellValue('BJ'.$row, $item['ROwnDesc']);
           $objPHPExcel->getActiveSheet()->setCellValue('BK'.$row, $item['BusName']);
           $objPHPExcel->getActiveSheet()->setCellValue('BL'.$row, $item['BusinessAdd']);
           $objPHPExcel->getActiveSheet()->setCellValue('BM'.$row, $item['YrsInBus']);
           $objPHPExcel->getActiveSheet()->setCellValue('BN'.$row, $item['BuSizeDesc']);
           $objPHPExcel->getActiveSheet()->setCellValue('BO'.$row, $item['BTypeDesc']);
           $objPHPExcel->getActiveSheet()->setCellValue('BP'.$row, $item['GrossFamilyIncome']);
           $objPHPExcel->getActiveSheet()->setCellValue('BQ'.$row, $item['GrossSelfIncome']);
           $objPHPExcel->getActiveSheet()->setCellValue('BR'.$row, $item['GrossFamilyExp']);
           $objPHPExcel->getActiveSheet()->setCellValue('BS'.$row, $item['BusExpense']);
           $objPHPExcel->getActiveSheet()->setCellValue('BT'.$row, $item['OtherMonthlyAmt']);
           $objPHPExcel->getActiveSheet()->setCellValue('BU'.$row, $item['CoMaker']);
           $objPHPExcel->getActiveSheet()->setCellValue('BV'.$row, $item['NomineeName']);
           $objPHPExcel->getActiveSheet()->setCellValue('BW'.$row, $item['NomineeDOB']);
           $objPHPExcel->getActiveSheet()->setCellValue('BX'.$row, $item['NomineeGender']);
           $objPHPExcel->getActiveSheet()->setCellValue('BY'.$row, $item['Relationship']);
           $objPHPExcel->getActiveSheet()->setCellValue('BZ'.$row, $item['CollateralDesc']);
           $objPHPExcel->getActiveSheet()->setCellValue('CA'.$row, $item['TotalCollateralValue']);
           $objPHPExcel->getActiveSheet()->setCellValue('CB'.$row, $item['TotalNetCollateralValue']);
           $objPHPExcel->getActiveSheet()->setCellValue('CC'.$row, $item['TotalApportionedValue']);


           $row++;
      }

        $filename = "AUDIT_XLSX_".date("YmdH_i_s").'.xlsx';
        $objPHPExcel->getActiveSheet()->setTitle("AUDIT_EXTRACTED");
        header('Content-type:application/
                        vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
        ob_end_clean();
        $writer->save('php://output');
        exit;
    }

//    public function import_csv()
//    {
//        $this->load->model("Audit_model");
//
//        if(isset($_POST["import"]))
//        {
//            $filename=$_FILES["file"]["tmp_name"];
//
//            if($_FILES["file"]["size"] > 0)
//            {
//                $file = fopen($filename, "r");
//                fgetcsv($file);
//                while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
//                {
//                    $data = array(
//                        'DateOfSampling' => $importdata[0],
//                        'OurBranchID' => $importdata[1],
//                        'ClientName' =>$importdata[2],
//                        'ClientID' => $importdata[3],
//                        'AccountID' => $importdata[4],
//                        'LoanAvailmentSeries' => $importdata[5],
//                        'ClientVisitStatus' => $importdata[6]
//
//
//                    );
//
//                    //$insert = $this->welcome->insertCSV($data);
//                    $this->Audit_model->insertCSV($data);
//                }
//                fclose($file);
//                $this->session->set_flashdata('message', 'Data are imported successfully..');
//                redirect('audit/audit_import');
//            }else{
//                $this->session->set_flashdata('message', 'Something went wrong..');
//                redirect('audit/audit_import');
//            }
//        }
//    }

    public function importbulkemail(){
        $this->load->model("Audit_model");
        $data["view_data"] = $this->Audit_model->get_audit_sampling();
        $this->load->view("audit/audit_import", $data);
    }

    public function import()
    {
        $this->load->model('Audit_model');
        $count = 0;

        if(isset($_POST["import"]))
        {
            $filename=$_FILES["file"]["tmp_name"];
            if($_FILES["file"]["size"] > 0)
            {
                $file = fopen($filename, "r");
                fgetcsv($file);
                while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
                {
                    $data = array(
                        'AsofDay' => date("Y-m-d"),
                        'DateOfSampling' => date('Y-m-d', strtotime($importdata[0])),
                        'OurBranchID' => $importdata[1],
                        'ClientName' =>$importdata[2],
                        'ClientID' => $importdata[3],
                        'AccountID' => $importdata[4],
                        'LoanAvailmentSeries' => (int)$importdata[5],
                        'ClientVisitStatus' => $importdata[6]


                    );

                    //$insert = $this->welcome->insertCSV($data);
                    $this->Audit_model->set_audit_sampling($data);
                    $count++;
                }
                fclose($file);
                $this->session->set_flashdata('message',
                    ' 
                           <link rel="stylesheet" href="http://localhost/onepuhunan_practice/css/uikit.css">
                           <link rel="stylesheet" href="http://localhost/onepuhunan_practice/css/custom.css">
                           
                <div class="overlay">
                    <div class="modelBox">
                            <div class="modal-header">
                                <h2 class="header">SUCCESS!</h2>
                            </div>
                            <div class="modal-body">
                                <span class ="modal-body-text">                                    
                                      <picture class="uk-icon-check icon"></picture>                                                                    
                                    <p>
                                        <b class="count">'.$count.'</b>               
                                        Records are Successfully uploaded.
                                    </p>
                                </span>
                            </div>
                        <div class="modal-footer">
                            <button class="uk-button uk-button-success footer close">OK</button>
                        </div>
                        </div>
                </div>
                      <script src="http://localhost/onepuhunan_practice/js/custom.js"></script>

                        ');
                redirect('audit/audit_import');
            }else{
                $this->session->set_flashdata('message',
                    '
                           <link rel="stylesheet" href="http://localhost/onepuhunan_practice/css/uikit.css">
                           <link rel="stylesheet" href="http://localhost/onepuhunan_practice/css/custom.css">
                           
                <div class="overlay">
                    <div class="modelBox">
                            <div class="modal-header">
                                <h2 class="header">ERROR!</h2>
                            </div>
                            <div class="modal-body">
                                <span class ="modal-body-text">
                                      <picture class="uk-icon-exclamation-triangle icon-error"></picture>                                  
                                    <p>
                                        No Records Uploaded.
                                    </p>
                                </span>
                            </div>
                        <div class="modal-footer">
                            <button class="uk-button uk-button-danger footer close">OK</button>
                        </div>
                        </div>
                </div>
                      <script src="http://localhost/onepuhunan_practice/js/custom.js"></script>             
                ');
                redirect('audit/audit_import');
            }
        }

        $this->load->view("audit/audit_import");

    }

    public function get_audit_result(){

//        $this->load->model("Audit_model");
//        $data["query"] = $this->Audit_model->get_branch_list();
//        $this->load->view("audit/audit_extraction", $data);

//
//        $data["result"] = array(
//            "OurBranchID"               => $data["get_branch_list"]["OurBranchID"],
//            "ClientID"                  => $data["get_branch_list"]["ClientID"],
//            "Mobile"                    => $data["get_branch_list"]["Mobile"],
//            "Address1"                  => $data["get_branch_list"]["Address1"],
//            "Address2"                  => $data["get_branch_list"]["Address2"],
//            "City"                      => $data["get_branch_list"]["City"],
//            "AccountID"                 => $data["get_branch_list"]["AccountID"],
//            "LoanAmount"                => $data["get_branch_list"]["LoanAmount"],
//            "LoanPurpose"               => $data["get_branch_list"]["LoanPurpose"],
//            "SanctionedDate"            => $data["get_branch_list"]["SanctionedDate"],
//            "FirstDisbursementDate"     => $data["get_branch_list"]["FirstDisbursementDate"],
//			"MaturityDate"              => $data["get_branch_list"]["MaturityDate"],
//			"ClosedDate"                => $data["get_branch_list"]["ClosedDate"],
//			"UtilDate"                  => $data["get_branch_list"]["UtilDate"],
//        );



    }

}
