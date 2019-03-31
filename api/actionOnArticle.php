<?php
    header('Content-type: application/json');
    if(isset($_GET['id']) && isset($_GET['action']))
    {
        require_once ("../models/Article.php");
        $article = new Article();
        $article->id_article = $_GET['id'];

        $action = strtolower($_GET['action']);
        $data = null;
        switch ($action)
        {
            case 'delete':$data=$article->delete();break;
            case 'activate': $data = $article->activate();break;
        }
        echo $data;
        $pl = "lu";
        if($_GET['from'] == 'admin')
        {
            $pl = "la";
        }
        header('Location: '.$env['link']."?route=tdb&t=".$pl);
    }
    else{
        header("Location: ".$env['link']);
    }