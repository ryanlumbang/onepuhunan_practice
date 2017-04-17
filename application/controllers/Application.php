<?php

    //Author : Ronald San Pedro, Jr.
    //Date   : October 19, 2016

    class Application extends CI_Controller {
        public function _construct() {
            parent:: _construct();
        }

        public function index() {
            $this->load->library("form_validation");
            $this->load->model("Application_model");
            
            if(isset($_SESSION['logged_in'])) {
                redirect(base_url()."dashboard");
            }
            
            $config = array(
                array(
                    "field" => "u_empid",
                    "label" => "Employee ID",
                    "rules" => "trim|required",
                    "errors" => array(
                        "required" => "<big class='uk-text-bold'>Required Field</big><br>The <b>\"%s\"</b> field is required."
                    )
                ),
                array(
                    "field" => "u_pass",
                    "label" => "Password",
                    "rules" => "trim|required",
                    "errors" => array(
                        "required" => "<big class='uk-text-bold'>Required Field</big><br>The <b>\"%s\"</b> field is required."
                    )
                )
            );
            
            $this->form_validation->set_error_delimiters("<div class='uk-alert uk-alert-danger uk-text-small' data-uk-alert>", "</div>");
            $this->form_validation->set_rules($config);
            
            if($this->form_validation->run() == FALSE) {
                $this->load->view("login");
            } else {
                $input = array(
                  "emp_id"      => $this->input->post("u_empid"),
                  "password"    => $this->merge_between($this->input->post("u_empid"), $this->input->post("u_pass"))
                );
                
                $data["sp_ua_login_validation"] = $this->Application_model->get_user_account($input);
                
                /* create user's session */
                if ( $data["sp_ua_login_validation"] == 0 ) {
                    $data["query"] = $this->Application_model->get_user_sess_login(array_values($input)[0]);

                    $session = array(
                        "emp_id"    => $data["query"]["emp_id"],
                        "emp_name"  => $data["query"]["emp_name"],
                        "role_id"   => $data["query"]["role_id"],
                        "logged_in" => 1
                    );
                    
                    $this->session->set_userdata($session);
                } 
                
                $this->load->view("login", $data);   
            }
        }
        
        public function logout() {
            //$user_data = $this->session->all_userdata();
            //$this->session->unset_userdata($user_data);
            $this->session->sess_destroy();
            $session = array(
                        "emp_id"    => "",
                        "emp_name"  => "",
                        "role_id"   => "",
                        "logged_in" => 0
                    );
                    
            $this->session->set_userdata($session);
            redirect(base_url() . "index.php");
        }
        
        public function dashboard() {
            $this->load->view("dashboard");
        }
        
        public function signup() {
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
                    "rules" => "trim|required|min_length[3]|max_length[100]",
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
                ),
                array(
                    "field" => "emp_id",
                    "label" => "Employee ID",
                    "rules" => "trim|required|min_length[8]|max_length[10]",
                    "errors" => array(
                        "required" => "The <b>\"%s\"</b> field is required.",
                        "min_length" => "The <b>\"%s\"</b> field must be at least %s characters in length.",
                        "max_length" => "The <b>\"%s\"</b> field cannot exceed %s characters in length."
                    )
                ),
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
                $this->load->view("signup", $data);
            } else {
                $input = array(
                  "emp_id"      => $this->input->post("emp_id"),
                  "last_name"   => $this->input->post("lname"),
                  "first_name"  => $this->input->post("fname"),
                  "middle_name" => $this->input->post("mname"),
                  "email"       => $this->input->post("email"),
                  "job_title"   => $this->input->post("job_title"),
                  "dept_id"     => $this->input->post("dept"),
                  "password"    => $this->merge_between($this->input->post("emp_id"), $this->input->post("password"))
                );
                
                $data["sp_ua_create_acct"] = $this->Application_model->set_user_account($input);
                
                if ( $data["sp_ua_create_acct"] == 0 ) {
                    $session = array(
                        "emp_id" => $this->input->post("emp_id"),
                        "name"   => $this->input->post("fname"). " " . $this->input->post("lname"),
                        "email"  => $this->input->post("email")
                    );
                    
                    $this->session->set_userdata($session);
                    
                    // send notifications
                    $this->send_mail($session);
                    $this->send_mail_admin($session);
                    
                    $this->load->view("signup", $data); 
                } else {
                    $this->load->view("signup", $data); 
                }
            } 
        }    
        
        public function success() {
            $this->load->view("success");
        }
        
        public function send_mail($session) {
            $this->load->library("email");
            
            $this->email->from("it.administrator@onepuhunan.com.ph", "OnePuhunan Service Portal")
                        ->to($this->input->post("email"))
                        ->subject("OnePuhunan Service Portal Registration");
            
            $mail_body = $this->load->view("emails/registration", $session, TRUE);
            $this->email->message($mail_body); 
            
            $this->email->send();
        }
        
        public function send_mail_admin($session) {
            $this->load->library("email");
            
            $this->load->model("Application_model");
            $query = $this->Application_model->get_admin_list();
            
            foreach((array) $query as $item) {
                $this->email->from("it.administrator@onepuhunan.com.ph", "OnePuhunan Service Portal")
                            ->to($item["email"])
                            ->subject("OnePuhunan Service Portal Account Approval");
                
                $mail_body = $this->load->view("emails/registration_admin", $session, TRUE);
                $this->email->message($mail_body);
                
                $this->email->send();
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