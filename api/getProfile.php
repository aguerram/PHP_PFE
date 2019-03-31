<?php
    header('Content-type: application/json');
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        require_once("../models/Article.php");
        require_once "../models/Member.php";

        $article = new Article();
        $member = new Member();

        $id = trim($_POST['id']);
        $article->id_member = $id;
        $articles = $article->getByMember();

        $member = new Member();
        $member->id_member = $id;
        $user = $member->getById();
        echo json_encode([
            "success"=>"true",
            "articles"=>$articles,
            "member"=>$user
        ]);

    }
    else{
        echo json_encode([
            "success"=>"false",
            "data"=>null
        ]);
    }