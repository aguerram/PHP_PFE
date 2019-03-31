<?php
    header('Content-type: application/json');
    if(isset($_POST))
    {
        require_once "../models/Member.php";
        $member = new Member();
        $member->id_member = Decrypt($_COOKIE['_qt']);
        $data = $member->getById();
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