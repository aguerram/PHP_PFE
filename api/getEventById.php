<?php
    header('Content-type: application/json');
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        require_once "../dao/EventDAO.php";
        $event = new EventDAO();
        $data = null;
        $id = $_POST['id'];

        $data = $event->getIndexByID($id);

        echo json_encode([
            "success"=>sizeof($data)>0,
            "data"=>$data
            ]);
    }
    else
        echo json_encode([
            "success"=>"false",
            "data"=>null
            ]); 