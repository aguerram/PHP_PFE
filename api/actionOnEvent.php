<?php
    header('Content-type: application/json');
    if(isset($_GET['id']) && isset($_GET['action']))
    {
        require_once "../dao/EventDAO.php";
        $event = new EventDAO();

        $id = $_GET['id'];

        $action = strtolower($_GET['action']);
        $data = null;
        switch ($action)
        {
            case 'delete':$data= $event->delete($id) ;break;
            case 'activate': $data = $event->active($id);break;
        }
        echo $data;
        $pl = "lue";
        if($_GET['from'] == 'admin')
        {
            $pl = "lau";
        }
        header('Location: '.$env['link']."?route=tdb&t=".$pl);
    }
    else{
        header("Location: ".$env['link']);
    }