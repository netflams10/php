<?php
    class DBConnect {
        private $host = "localhost";
        private $dbname = "shop";
        private $username = "root";
        private $password = "";
        private $port = '3306';
        protected $conn;

        public function __construct () 
        {
            try{
                $this->conn = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->dbname;", $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (Exception $err) {
                throw new Exception($err->getMessage());
            }
        }
    }