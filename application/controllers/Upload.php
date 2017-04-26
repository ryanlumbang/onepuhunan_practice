<?php

/**
 * Created by PhpStorm.
 * User: sapia.cali
 * Date: 4/18/2017
 * Time: 10:53 AM
 */
class Upload extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
        $this->load->view('hr/upload_form', array('error' => ' ' ));
    }

    public function do_upload() {
        $config['upload_path'] ='Z:\HR';
        $data['error'] = '';    //initialize image upload error array to empty
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '1000';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('hr/upload_form', $error);
        }

        else {
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('hr/upload_success', $data);
        }
    }
}