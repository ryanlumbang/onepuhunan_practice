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
        $query = $this->HR_model->view_data();
    }

    public function import()
    {
        if(isset($_POST["import"]))
        {
            $filename=$_FILES["file"]["tmp_name"];
            if($_FILES["file"]["size"] > 0)
            {
                $file = fopen($filename, "r");
                while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
                {
                    $data = array(
                        'emp_no' => $importdata[0],
                        'date_of_birth' => $importdata[1],
                        'gender' =>$importdata[2],
                        'date_hired' => $importdata[3],
                        'date_end_proby' => $importdata[4],
                        'date_of_resig' => $importdata[5],


                    );

                    $insert = $this->welcome->insertCSV($data);
                }
                fclose($file);
                $this->session->set_flashdata('message', 'Data are imported successfully..');
                redirect('uploadcsv/index');
            }else{
                $this->session->set_flashdata('message', 'Something went wrong..');
                redirect('uploadcsv/index');
            }
        }
    }

/////////////////////////////////Import subscriber emails ////////////////////////////////

}