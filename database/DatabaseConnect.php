<?php
    class DatabaseConnect {
        private $server_name;
        private $user_name;
        private $password;
        private $db_name;

        private $connect;

        private $connect_status = false;

        /**
         * A PDO connect.
         * 
         * @param string $server_name Database connect address. ex: localhost.
         * @param string $user_name Database connect user.
         * @param string $password Database connect password of user.
         * @param string $db_name Database name.
         * 
         * @return PDO A connected database.
         */
        function __construct($server_name = null, $user_name = null, $password = null, $db_name = null) {
            $this->server_name = $server_name;
            $this->user_name = $user_name;
            $this->password = $password;
            $this->db_name = $db_name;
            
            try {
                $this->connect = new PDO("mysql:host=$this->server_name;dbname=$this->db_name", $this->user_name, $this->password);
                $this->connect_status = true;
            } catch (PDOException $e) {
                $this->connect_status = false;
            }
        }

        /**
         * @return PDO A connected database.
         */
        public function get_connected() {
            return $this->connect;
        }

        /**
         * @return boolean Database connected status. 
         */
        public function get_connected_status() {
            return $this->connect_status;
        }

        /**
         * @return boolean Database connected status.
         */
        public function close_connected() {
            $this->connect = null;
            $this->connect_status = false;
            return $this->connect == null;
        }
    }
