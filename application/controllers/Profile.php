<?php

    //Author : Ronald San Pedro, Jr.
    //Date   : November 04, 2016

    class Profile extends CI_Controller {
        public function _construct() {
            parent:: _construct();
        }
        
        public function index() {
            $this->load->library("form_validation");
            $this->load->model("Application_model");
            
            $data["query"] = $this->Application_model->get_dept_list();
            
            $config = array(
                array(
                    "field" => "lname",
                    "label" => "Last Name",
                    "rules" => "trim|required|min_length[3]|max_length[25]",
                    "errors" => array(
                        "required" => "The <b>\"%s\"</b> field is required.",
                        "min_length" => "The <b>\"%s\"</b> field must be at least %s characters in length.",
                        "max_length" => "The <b>\"%s\"</b> field cannot exceed %s characters in length."
                    )
                ),
                array (
                    "field" => "fname",
                    "label" => "First Name",
                    "rules" => "trim|required|min_length[3]|max_length[25]",
                    "errors" => array(
                        "required" => "The <b>\"%s\"</b> field is required.",
                        "min_length" => "The <b>\"%s\"</b> field must be at least %s characters in length.",
                        "max_length" => "The <b>\"%s\"</b> field cannot exceed %s characters in length."
                    )
                ),
                array (
                    "field" => "mname",
                    "label" => "Middle Name",
                    "rules" => "trim|min_length[3]|max_length[25]",
                    "errors" => array(
                        "min_length" => "The <b>\"%s\"</b> field must be at least %s characters in length.",
                        "max_length" => "The <b>\"%s\"</b> field cannot exceed %s characters in length."
                    )
                ),
                array(
                    "field" => "email",
                    "label" => "Email Address",
                    "rules" => "trim|required|valid_email",
                    "errors" => array(
                        "required" => "The <b>\"%s\"</b> field is required.",
                        "valid_email" => "The <b>\"%s\"</b> field must contain a valid email address."
                    )
                ),
                array(
                    "field" => "job_title",
                    "label" => "Job Title",
                    "rules" => "trim|required|min_length[3]|max_length[25]",
                    "errors" => array(
                        "required" => "The <b>\"%s\"</b> field is required.",
                        "min_length" => "The <b>\"%s\"</b> field must be at least %s characters in length.",
                        "max_length" => "The <b>\"%s\"</b> field cannot exceed %s characters in length."
                    )
                ),
                array(
                    "field" => "dept",
                    "label" => "Department",
                    "rules" => "required",
                    "errors" => array(
                        "required" => "The <b>\"%s\"</b> field is required."
                    )
                )
            );
            
            $this->form_validation->set_error_delimiters("<div class='uk-alert uk-alert-danger uk-text-small' data-uk-alert><a href='' class='uk-alert-close uk-close'></a>", "</div>");
            $this->form_validation->set_rules($config);
            
            if($this->form_validation->run() == FALSE) {
                populate_fields:
                $data["qry"] = $this->Application_model->get_user_account_info($this->session->emp_id);
                
                $data["result"] = array(
                    "emp_id"    => $data["qry"]["emp_id"],
                    "lname"     => $data["qry"]["last_name"],
                    "fname"     => $data["qry"]["first_name"],
                    "mname"     => $data["qry"]["middle_name"],
                    "email"     => $data["qry"]["email"],
                    "job_title" => $data["qry"]["job_title"],
                    "dept"      => $data["qry"]["dept_id"],
                    "date_reg"  => $data["qry"]["date_added"],
                    "role_id"   => $data["qry"]["role_name"],
                    "date_apr"  => $data["qry"]["date_approve"],
                    "approver"  => $data["qry"]["approved_by"]
                );
            } else {
                $input = array(
                  "emp_id"      => $this->session->emp_id,
                  "last_name"   => $this->input->post("lname"),
                  "first_name"  => $this->input->post("fname"),
                  "middle_name" => $this->input->post("mname"),
                  "email"       => $this->input->post("email"),
                  "job_title"   => $this->input->post("job_title"),
                  "dept_id"     => $this->input->post("dept")
                );
                
                $data["sp_ua_upd_user_acct"] = $this->Application_model->set_user_account_info($input);
                
                goto populate_fields;
            }
            
            $this->load->view("profile/userinfo", $data); 
        }
        
        public function changepass() {
            $this->load->library("form_validation");
            $this->load->model("Application_model");
            
            $config = array(
               array(
                    "field" => "password",
                    "label" => "Password",
                    "rules" => "trim|required|min_length[8]|password_check[1,1,1,1]",
                    "errors" => array(
                        "required" => "The <b>\"%s\"</b> field is required.",
                        "min_length" => "The <b>\"%s\"</b> field must be at least %s characters in length."
                    )
                ),
                array(
                    "field" => "passconf",
                    "label" => "Confirm Password",
                    "rules" => "trim|required|matches[password]",
                    "errors" => array(
                        "required" => "The <b>\"%s\"</b> field is required.",
                        "matches" => "The <b>\"%s\"</b> field does not match the <b>\"Password\"</b> field."
                    )
                )
            );
            
            $this->form_validation->set_error_delimiters("<div class='uk-alert uk-alert-danger uk-text-small' data-uk-alert><a href='' class='uk-alert-close uk-close'></a>", "</div>");
            $this->form_validation->set_rules($config);
            
            if($this->form_validation->run() == FALSE) {
                $this->load->view("profile/changepass");
            } else {
                $input = array(
                    "emp_id"   => $this->session->emp_id,
                    "password" => md5($this->merge_between($this->session->emp_id, $this->input->post("password")))
                );
                
                $data["sp_ua_upd_user_pass"] = $this->Application_model->set_user_pass($input);
                $this->load->view("profile/changepass", $data);
            }
            
            
        }
        
        function merge_between($varstr1, $varstr2){
            //reference: http://www.jonasjohn.de/snippets/php/merge-two-strings.htm
           
            $str1 = str_split($varstr1, 1);
            $str2 = str_split($varstr2, 1);
            
            if (count($str1) >= count($str2)) {
                list($str1, $str2) = array($str2, $str1);
            }
                
            for($x=0; $x < count($str1); $x++) {
                $str2[$x] .= $str1[$x];
            }
            
            return implode('', $str2);
        }
        
    }

