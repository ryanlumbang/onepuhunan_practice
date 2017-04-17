<?php

    class MY_Form_validation extends CI_Form_validation {
        
        /* callback function */
        public function password_check($str, $format) {
            $ret = true;

            list($uppercase, $lowercase, $number, $special) = explode(',', $format);

            $str_uc = $this->count_uppercase($str);
            $str_lc = $this->count_lowercase($str);
            $str_num = $this->count_numbers($str);
            $str_special = $this->count_special_char($str);

            if ($str_uc < $uppercase) {
                $this->set_message("password_check", "<b>\"Password\"</b> field must contain at least " . $uppercase . " uppercase characters.");
                $ret = false;
            }
            elseif ($str_lc < $lowercase) {
                $this->set_message("password_check", "<b>\"Password\"</b> field must contain at least " . $lowercase . " lowercase characters.");
                $ret = false;
            }
            elseif ($str_num < $number) { 
                $this->set_message("password_check", "<b>\"Password\"</b> field must contain at least " . $number . " number characters.");
                $ret = false;
            }
            elseif ($str_special < $special) {
                $this->set_message("password_check", "<b>\"Password\"</b> field must contain at least " . $special . " special characters");
                $ret = false;
            }
            return $ret;
        }

        private function count_occurrences($str, $exp) {
            $match = array();
            preg_match_all($exp, $str, $match);

            return count($match[0]);
        }

        private function count_lowercase($str) {
            return $this->count_occurrences($str, "/[a-z]/");
        }

        private function count_uppercase($str) {
            return $this->count_occurrences($str, "/[A-Z]/");
        }

        private function count_numbers($str) {
            return $this->count_occurrences($str, "/[0-9]/");
        }
        
        private function count_special_char($str) {
            return $this->count_occurrences($str, "/[!@#$%^&*]/");
        }
        
    }

