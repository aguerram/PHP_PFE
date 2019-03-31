<?php
header('Content-type: application/json');
if($_SERVER['REQUEST_METHOD']=="POST")
{
    require_once("../models/Article.php");

    $article = new Article();
    echo json_encode([
        "success"=>"true",
        "data"=>$article->getIndex()
    ]);
}
else
    echo json_encode([
        "success"=>"false",
        "data"=>""
    ]);