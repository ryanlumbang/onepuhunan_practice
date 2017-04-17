<?php

    //@Author: Ronald San Pedro, Jr.
    //Date   : October 21, 2016

    class Application_model extends CI_Model {
        public function _construct() {
            parent:: _construct();
        }
        
        public function get_dept_list() {
            $this->db->select(" t1.\"dept_id\", t1.\"dept_name\" ")
                     ->order_by(" t1.\"dept_name\" ");
            
            $query = $this->db->get(" \"t_Department\" t1 ");
            return $query->result_array(); 
        }
        
        public function get_user_account($input) {
                $query = $this->db->query("SELECT sp_ua_login_validation( ?, ? )", $input);
                $row = $query->row();
            
            if ( isset($row) ) {
                return $row->sp_ua_login_validation;
            }
        }
        
        public function set_user_account($input) {            
            $query = $this->db->query("SELECT sp_ua_create_acct( ?, ?, ?, ?, ?, ?, ?, ? )", $input);
            $row = $query->row();
            
            if( isset($row) ) {  
                return $row->sp_ua_create_acct;
            }
        }
        
        public function get_user_account_info($input) {
            $query = $this->db->query("SELECT * FROM sp_ua_sel_user_acct( ? )", $input);
            return $query->row_array();
        }
        
        public function set_user_account_info($input) {
            $query = $this->db->query("SELECT sp_ua_upd_user_acct ( ?, ?, ?, ?, ?, ?, ? )", $input);
            $row = $query->row();
            
            if( isset($row) ) {
                return $row->sp_ua_upd_user_acct;
            }
        }
        
        public function set_user_pass($input) {
            $query = $this->db->query("SELECT sp_ua_upd_user_pass ( ?, ? )", $input);
            $row = $query->row();
            
            if( isset($row) ) {
                return $row->sp_ua_upd_user_pass;
            }
        }
        
        public function get_admin_list() {
        $where = "(t1.\"role_id\" = 'sa' OR t1.\"role_id\" = 'super')";
        $this->db->select(" t1.\"email\" ")
            ->where($where)
            ->order_by(" t1.\"last_name\" ");

        $query = $this->db->get(" \"t_UserAccount\" t1 ");
        return $query->result_array();
    }
        
        public function get_user_sess_login($input) {
            $qry = $this->db->query("SELECT emp_id, emp_name, role_id FROM sp_ua_sess_login( ? ) AS (emp_id text, emp_name text, role_id text)", $input);
            return $qry->row_array();
        }

    }

