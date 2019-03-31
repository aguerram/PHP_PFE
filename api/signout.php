<?php
    header('Content-type: application/json');
    require_once "../config/config.php";
    if(isset($_COOKIE['_qt']))
        setcookie("_qt",0,time()-96,"/");
    echo json_encode(["success"=>true,"location"=>route("login")]);