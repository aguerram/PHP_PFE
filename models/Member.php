<?php
    if(isset($route))
        require_once("./config/Connection.php");
    else
        require_once("../config/Connection.php");
    class Member extends Connection{
        public $id_member;
        public $nom_membre;
        public $prenom_membre;
        public $login_membre;
        public $pwd_membre;
        public $datene_membre;
        public $level;
        public function __construct()
        {
            parent::__construct();
        }
        public function login($email,$pwd)
        {
            $res = mysqli_query($this->conn,"select ID_MEMBRE as id,LEVEL from membre WHERE LOGIN_MEMBRE='$email' and PWD_MEMBRE=md5('$pwd');");
            if($row = mysqli_fetch_assoc($res))
                return $row["id"]."/".$row['LEVEL'];
            return null;
        }
        public function getById()
        {
            $res = mysqli_query($this->conn,"select * from membre WHERE ID_MEMBRE=$this->id_member;");
            if($row = mysqli_fetch_assoc($res))
            {
                $this->id_member = $row['ID_MEMBRE'];
                $this->nom_membre = $row['NOM_MEMBRE'];
                $this->prenom_membre = $row['PRENOM_MEMBRE'];
                $this->login_membre = $row['LOGIN_MEMBRE'];
                $this->pwd_membre = $row['PWD_MEMBRE'];
                $this->level = $row['LEVEL'];
                $this->datene_membre = $row["DATEN_MEMBRE"];
                return $row;
            }
            return false;
        }
        public function getMemberName($id)
        {
            $res = mysqli_query($this->conn,"select NOM_MEMBRE,PRENOM_MEMBRE from membre WHERE ID_MEMBRE=$id;");
            if($row = mysqli_fetch_assoc($res))
            {
                return strtoupper($row['NOM_MEMBRE']).' '.ucfirst($row['PRENOM_MEMBRE']);
            }
            return "";
        }

        public function getByEmail($email)
        {
            $res = mysqli_query($this->conn,"select * from membre WHERE LOGIN_MEMBRE='$email';");
            if($row = mysqli_fetch_assoc($res))
            {
                return true;
            }
            return false;
        }
        public function save()
        {
            $sql = "insert into membre(NOM_MEMBRE, PRENOM_MEMBRE, LOGIN_MEMBRE, PWD_MEMBRE, DATEN_MEMBRE) VALUES ('$this->nom_membre','$this->prenom_membre','$this->login_membre ','$this->pwd_membre','$this->datene_membre')";
            return mysqli_query($this->conn,$sql);
        }
        public function update()
        {
            $sql = "update membre set NOM_MEMBRE = '$this->nom_membre', PRENOM_MEMBRE = '$this->prenom_membre',LOGIN_MEMBRE = '$this->login_membre ', PWD_MEMBRE = '$this->pwd_membre', DATEN_MEMBRE = '$this->datene_membre' where ID_MEMBRE = $this->id_member";
            return mysqli_query($this->conn,$sql);
        }
        public function getAll()
        {
            $res = mysqli_query($this->conn,"select * from membre");
            $data = array();
            while($row = mysqli_fetch_assoc($res))
            {
                array_push($data,$row);
            }
            return $data;
        }
        public function block()
        {
            return mysqli_query($this->conn,"update membre set LEVEL = 0 where ID_MEMBRE = $this->id_member");
        }
        public function unblock()
        {
            return mysqli_query($this->conn,"update membre set LEVEL = 1 where ID_MEMBRE = $this->id_member");
        }
    }