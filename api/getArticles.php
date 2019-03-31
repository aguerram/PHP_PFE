<?php
    header('Content-type: application/json');
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        require_once("../models/Article.php");

        $article = new Article();
        $data = $article->getIndex();
        if(isset($_POST['member_id']))
        {
            $article->id_member = Decrypt($_COOKIE['_qt']);
            $data = $article->getByMember();
        }


        echo json_encode([
            "success"=>"true",
            "data"=>$data
            ]);
    }
    else
        echo json_encode([
            "success"=>"false",
            "data"=>null
            ]); 