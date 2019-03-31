<?php
    header('Content-type: application/json');
    require_once ("../models/Article.php");
    require_once ("../models/Comment.php");
    require_once ("../dao/CommentDAO.php");

    if($_POST)
    {
        $comment = htmlspecialchars($_POST['comment']);

        $cm = new Comment($_POST['arid'],Decrypt($_COOKIE['_qt']),$comment);
        $dao = new CommentDAO();
        $success = $dao->save($cm);

        echo json_encode(["success"=>$success]);
    }
    else{
        http_response_code(401);
        echo json_encode(["success"=>false]);
    }