<?php

    //Author : Ronald San Pedro, Jr.
    //Date   : December 7, 2016

    class Sys extends CI_Controller {
        public function _construct() {
            parent:: _construct();
        }
        
        public function index() {
            $this->load->model("System_model");
            $data["query"] = $this->System_model->registration_request();
            $data["number_of_rows"] = count($data["query"]);
            $this->load->view("sys/registration_request", $data); 
        }
        
        public function approve_user($input) {
            $this->load->model("System_model");
            
            $var = array(
                "_emp_id"   => (string)hexdec($input),
                "_approver" => $this->session->emp_id
            );
           
            $this->System_model->approve_request($var);
            
            $data["query"] = $this->System_model->get_employee_name((string)hexdec($input));

            $session = array(
                "emp_name"  => $data["query"]["emp_name"],
                "emp_email" => $data["query"]["emp_email"]
            );
            
            $this->send_mail($session);
            //$this->index();
            redirect(base_url()."sys/registration_request");
        }
        
        public function send_mail($session) {
            $this->load->library("email");
            
            $this->email->from("it.administrator@onepuhunan.com.ph", "OnePuhunan Service Portal")
                        ->to($session["emp_email"])
                        ->subject("OnePuhunan Service Portal Registration");
            
            $mail_body = $this->load->view("emails/registration_approve", $session, TRUE);
            $this->email->message($mail_body); 
            
            $this->email->send();
        }

        public function audit() {
            $this->load->view("audit/audit_extraction");
        }

    }
