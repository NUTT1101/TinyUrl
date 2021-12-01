<?php
    require_once "./DatabaseConnect.php";

    class TinyUrl {
        private $database_connect;
        private $tinyurl;

        /**
         * 
         * @param PDO $database_connect
         * @param string $url_code
         * 
         * @return string 
         */
        function __construct($database_connect = null, $url_code = null) {
            $this->database_connect = $database_connect;
            
        }

        public function get_tinyurl() {
            return $this->tinyurl;
        }
    }
?>