<?php
    header('Content-type: application/json');
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        require_once("../models/Article.php");
        require_once("../models/Member.php");
        $article = new Article();
        $membre = new Member();

        $article->id_article = $_POST['id'];

        $data = $article->getById();
        $membre->id_member = $data['ID_MEMBRE'];
        $membre->getById();

        require_once("../dao/CommentDAO.php");
        $comm = new CommentDAO();
        $comments = $comm->getByArticleID($_POST['id']);

        $mbr = new Member();
        $is_editor = false;
        if(isset($_COOKIE['_qt']))
        {
            $mbr->id_member = Decrypt($_COOKIE['_qt']);
            $mbr->getById();
            $is_editor = $mbr->level > 1 ? true:false;
        }

        echo json_encode([
            "success"=>sizeof($data)>0,
            "data"=>$data,
            "by"=>strtoupper($membre->nom_membre)." ".ucfirst($membre->prenom_membre),
            "comments"=>$comments,
            "editor"=>$is_editor
            ]);
    }
    else
        echo json_encode([
            "success"=>"false",
            "data"=>""
            ]); 