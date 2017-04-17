<?php

    //@Author: Ronald San Pedro, Jr.
    //Date   : October 19, 2016

    class Operations_model extends CI_Model {
        
        public function _construct() {
            parent::__construct();
        }
        
        public function client_catalog() {
            $name = $this->input->post("c_name");
            if( trim($name) != "" ) {
                if (filter_input(INPUT_POST, 'chk-spouse')) {
                    $query = $this->db->query("SELECT * FROM sp_cc_sel_client( ?, 'true')", $name);
                } else {
                    $query = $this->db->query("SELECT * FROM sp_cc_sel_client( ?, 'false')", $name);
                }
                return $query->result_array();
            }
        }
        
        public function client_info($input) {
            $query = $this->db->query("SELECT * FROM sp_cc_user_info( ? )", $input);
            return $query->row_array();
        }
        
        public function client_acct_history($input) {
            $query = $this->db->query("SELECT * FROM sp_cc_acct_info( ? )", $input);
            return $query->result_array();
        }
    }