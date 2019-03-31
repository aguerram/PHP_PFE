<?php
    header('Content-type: application/json');
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        require_once "../dao/SearchDAO.php";
        $search = new SearchDAO();

        $data = $search->search($_POST['s']);
        echo json_encode([
            "success"=>"true",
            "data"=>$data
        ]);
    }
    else{
        echo json_encode([
            "success"=>"false",
            "data"=>null
        ]);
    }