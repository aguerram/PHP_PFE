<?php
    header('Content-type: application/json');
    if(isset($_GET['id']) && isset($_GET['action']))
    {
        require_once "../dao/ContactDAO.php";
        $cont = new ContactDAO();

        $id = $_GET['id'];

        $action = strtolower($_GET['action']);
        $data = null;
        switch ($action)
        {
            case 'delete':$data= $cont->delete($id) ;break;
        }
        $pl = "lc";
        header('Location: '.$env['link']."?route=tdb&t=".$pl);
    }
    else{
        header("Location: ".$env['link']);
    }