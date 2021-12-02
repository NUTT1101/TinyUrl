<?php
    require_once "./database/DatabaseConnect.php";

    class TinyUrl {
        private $database_connect;
        private $source_link;
        private $url_code;
        private $tinyurl;
        private $tinyurl_exists = null;
        private $error = "";

        /**
         * 
         * @param PDO $database_connect
         * @param string $url_code
         * 
         * @return string 
         */
        function __construct($database_connect = null, $source_link =null, $url_code = null) {
            $this->database_connect = $database_connect;
            $this->source_link = $source_link;
            $this->url_code = $url_code;
            
            try {
                $sql = "INSERT INTO url (source_link, serial_number) VALUES ('$this->source_link', '$this->url_code');";

                $this->database_connect->exec($sql);

                $this->tinyurl_exists = true;
            } catch (PDOException $PDO) {
                $this->error = $PDO->getMessage();
            }
            
        }

        function __destruct() {
            return $this->error != "" ? $this->error : true;
        }

        public function get_tinyurl() {
            return $this->tinyurl;
        }

        public function get_tinyurl_exist() {
            return $this->tinyurl_exists;
        }
    }
