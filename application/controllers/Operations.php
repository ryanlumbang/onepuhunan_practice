<?php

    //Author : Ronald San Pedro, Jr.
    //Date   : October 21, 2016

    class Operations extends CI_Controller {
        public function _construct() {
            parent::__construct();
        }
        
        public function index() {
            $this->load->model("Operations_model");          
            $data["query"] = $this->Operations_model->client_catalog();
            $data["number_of_rows"] = count($data["query"]);
            $this->load->view("operations/client_catalog", $data);
        }
        
        public function client_info($input) {
            $this->load->model("Operations_model");
            
            $data["client_info"]  = $this->Operations_model->client_info(str_pad(hexdec($input), 10, '0', STR_PAD_LEFT));
            $data["acct_history"] = $this->Operations_model->client_acct_history(str_pad(hexdec($input), 10, '0', STR_PAD_LEFT));
                    
            $data["result"] = array(
                "OurBranchID"       => $data["client_info"]["OurBranchID"],
                "BranchName"        => $data["client_info"]["BranchName"],
                "ClientID"          => $data["client_info"]["ClientID"],
                "Name"              => $data["client_info"]["Name"],
                "DateOfBirth"       => $data["client_info"]["DateOfBirth"],
                "ClientSince"       => $data["client_info"]["ClientSince"],
                "NoOfLoanAvailed"   => $data["client_info"]["NoOfLoanAvailed"],
                "MarStatDesc"       => $data["client_info"]["MarStatDesc"],
                "LitLvlDesc"        => $data["client_info"]["LitLvlDesc"],
                "Mobile"            => $data["client_info"]["Mobile"],
                "Address1"          => $data["client_info"]["Address1"],
                "Address2"          => $data["client_info"]["Address2"],
                "City"              => $data["client_info"]["City"],
                "NumberOfHHMembers" => $data["client_info"]["NumberOfHHMembers"],
                "BusName"           => $data["client_info"]["BusName"],
                "BusinessAdd"       => $data["client_info"]["BusinessAdd"],
                "YearsInBus"        => $data["client_info"]["YearsInBus"],
                "BuSizeDesc"        => $data["client_info"]["BuSizeDesc"],
                "BTypeDesc"         => $data["client_info"]["BTypeDesc"]
            );
            
            $this->load->view("operations/client_info", $data);
        }
    }