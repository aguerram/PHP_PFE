<?php
header('Content-type: application/json');
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    require_once "../dao/CommentDAO.php";

    $com = new CommentDAO();
    $userid = Decrypt($_COOKIE['_qt']);
    $data = $com->getByUserID($userid,0);
    echo json_encode([
        "success" => true,
        "data" => $data
    ]);

} else {
    http_response_code(401);
    echo json_encode([
        "success" => "false",
        "data" => ""
    ]);
}