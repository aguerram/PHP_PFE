<?php
header('Content-type: application/json');
if($_SERVER['REQUEST_METHOD']=="POST")
{
    require_once "../dao/CommentDAO.php";
    $con = new CommentDAO();
    $cnt = $con->countComments(Decrypt($_COOKIE['_qt']));
    echo json_encode([
        "success"=>true,
        "data"=>$cnt
    ]);
}
else{
    http_response_code(401);
    echo json_encode([
        "success"=>false
    ]);
}