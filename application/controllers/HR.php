<?php

/**
 * Created by PhpStorm.
 * User: sapia.cali
 * Date: 4/10/2017
 * Time: 11:43 AM
 */
class HR extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('HR_model','welcome');
    }


    public function importbulkemail(){
        $this->data['view_data']= $this->welcome->view_data();
        $this->load->view('hr/import_employee', $this->data, FALSE);


        $this->load->model("HR_model");
    }

    public function import()
    {
        $this->load->model('HR_model');
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
                        'emp_no' => $importdata[0],
                        'date_of_birth' => $importdata[1],
                        'gender' =>$importdata[2],
                        'date_hired' => $importdata[3],
                        'date_end_proby' => $importdata[4],
                        'date_of_resig' => $importdata[5]


                    );

                    //$insert = $this->welcome->insertCSV($data);
                    $this->HR_model->insertCSV($data);
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
                redirect('hr/import_employee');
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
                redirect('hr/import_employee');
            }
        }
    }

/////////////////////////////////Import subscriber emails ////////////////////////////////

}
