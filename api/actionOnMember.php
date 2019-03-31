<?php
    header('Content-type: application/json');
    if(isset($_GET['id']) && isset($_GET['action']))
    {
        require_once ("../models/Member.php");
        $member = new Member();
        $member->id_member = $_GET['id'];

        $action = strtolower($_GET['action']);
        $data = null;
        switch ($action)
        {
            case 'block':$data=$member->block();break;
            case 'unblock': $data = $member->unblock();break;
            case 'delete': $data = $member->delete();break;
        }
        $pl = "lla";

        header('Location: '.$env['link']."?route=tdb&t=".$pl);
    }
    else{
        header("Location: ".$env['link']);
    }