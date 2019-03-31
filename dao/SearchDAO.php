<?php
    require_once "../config/Connection.php";
    require_once "../models/Article.php";
    require_once "../dao/EventDAO.php";

    class SearchDAO extends Connection{
        public function search($sql)
        {
            $ar = new Article();
            $even = new EventDAO();
            $data = ["article"=>$ar->search($sql),"event"=>$even->search($sql)];
            return $data;
        }
    }