<?php
    require_once "./Elements.php";

    class SerialNumber {
        private $serial_number;
        private $created_time;
        
        /**
         * @param integer $digit Random serial number of tinyurl.
         */
        function __construct($digit = 7) {
            for ($i = 0; $i < $digit; $i++) {
                $index = rand(0, sizeof(Elements::$letterArray) - 1);
                $this->serial_number .= Elements::$letterArray[$index];
            }

            $this->created_time = date("Y-m-d/H-i-s");
        }

        /**
         * @return string Get random serial number.
         */
        public function get_serial_number() {
            return $this->serial_number;
        }

        /**
         * @return string The create time of random serial number.
         */
        public function get_created_time() {
            return $this->created_time;
        }
    }

    