<?php
    require_once("config.php");
    class Connection{
        protected $conn;
        public $MSG_ADDED = "Vos informations ont été enregistrées avec succès";
        public $MSG_FAILED = "Une erreur inattendue s'est produite";
        public function __construct()
        {
            global $env;
            $this->conn = new mysqli($env['db_host'], $env['db_user'], $env['db_password'], $env['db_name']);
            if(mysqli_error($this->conn))
            {
                die(mysqli_error($this->conn));
            }
            else{
                mysqli_set_charset($this->conn,"utf8");
            }
        }
        public function connection()
        {
            return $this->conn;
        }
    }