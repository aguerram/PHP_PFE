<?php
    header('Content-type: application/json');
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        require_once "../dao/ContactDAO.php";
        $con = new ContactDAO();
        $data  = $con->getIndex();
        echo json_encode([
            "success"=>"false",
            "data"=>$data
        ]);

    } else {
        echo json_encode([
            "success"=>"false",
            "data"=>null
        ]);
    }