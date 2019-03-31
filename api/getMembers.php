<?php
    header('Content-type: application/json');
    if(isset($_POST))
    {
        require_once "../models/Member.php";
        $member = new Member();
        $data = $member->getAll();
        echo json_encode([
            "success"=>"true",
            "data"=>$data
        ]);
    }
    else{
        echo json_encode([
            "success"=>"false",
            "data"=>""
        ]);
    }