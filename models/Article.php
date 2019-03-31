<?php
    require_once("../config/Connection.php");
    class Article extends Connection{
        public $titre;
        public $contenu;
        public $type;
        public $image;
        public $historique;
        public $cordx;
        public $cordy;
        public $id_member;
        public $id_article;
        public function __construct()
        {
            parent::__construct();
        }
        public function getIndex($id = 0)
        {
            $sql = "select * from article order by ACTIVE, ID_ARTICLE DESC";
            if($id != 0)
            {
                $sql = "select ID_ARTICLE,TITRE_ARTICLE,IMG_ARTICLE,CONTENU_ARTICLE from article where ID_MEMBRE = $id ";
            }
            $res = mysqli_query($this->conn,$sql);
            $data = array();
            while($row = mysqli_fetch_assoc($res))
            {
                array_push($data,$row);
            }
            return $data;
        }
        public function getAll()
        {
            $res = mysqli_query($this->conn,"select * from article");
            $data = array();
            while($row = mysqli_fetch_assoc($res))
            {
                array_push($data,$row);
            }
            return $data;
        }
        public function search($s)
        {
            $res = mysqli_query($this->conn,"select * from article where (TITRE_ARTICLE like '%$s%' or CONTENU_ARTICLE like '%$s%' or HISTORIQUE like '%$s%') and ACTIVE = 1");
            $data = array();
            while($row = mysqli_fetch_assoc($res))
            {
                array_push($data,$row);
            }
            return $data;
        }
        public function getById()
        {
            $res = mysqli_query($this->conn,"select * from article where ID_ARTICLE = ".$this->id_article);
            $data = array();
            if($row = mysqli_fetch_assoc($res))
            {
                return $row;
            }
            return null;
        }
        public function getByMember()
        {
            $res = mysqli_query($this->conn,"select * from article where ID_MEMBRE = ".$this->id_member);
            $data = array();
            while($row = mysqli_fetch_assoc($res))
            {
                array_push($data,$row);
            }
            return $data;
        }
        public function save()
        {
            return mysqli_query($this->conn,"insert into article(ID_MEMBRE,TYPE_ARTICLE,TITRE_ARTICLE,CONTENU_ARTICLE,HISTORIQUE,
            CORDGEOX,CORDGEOY,IMG_ARTICLE) 
            values(
            $this->id_member,
            '".$this->type."',
            '".$this->titre."',
            '".$this->contenu."',
            '".$this->historique."',
            ".$this->cordx.",
            ".$this->cordy.",
            '".$this->image."')");
        }
        public function delete()
        {
            return mysqli_query($this->conn,"delete from article where ID_ARTICLE = $this->id_article");
        }
        public function activate()
        {
            return mysqli_query($this->conn,"update article set ACTIVE = 1 where ID_ARTICLE = $this->id_article");
        }
    }