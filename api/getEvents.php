<?php
    header('Content-type: application/json');
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        require_once "../dao/EventDAO.php";
        $event = new EventDAO();
        $data = null;
        if(isset($_POST['member_id']))
        {
            $id = Decrypt($_COOKIE['_qt']);
            $data = $event->getIndex($id);
        }
        else if(isset($_POST['type']))
        {
            $type = $_POST['type'];
            $data = $event->getIndexByType($type);
        }
        else{
            $data = $event->getIndex();
        }


        echo json_encode([
            "success"=>"true",
            "data"=>$data
            ]);
    }
    else
        echo json_encode([
            "success"=>"false",
            "data"=>null
            ]); 