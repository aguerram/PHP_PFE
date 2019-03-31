<?php
    header('Content-type: application/json');
    require_once ("../models/Member.php");
    $member = new Member();

    $email = trim(filter_var ($_POST['email'],FILTER_SANITIZE_EMAIL));
    $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);

    $res = $member->login($email,$password);
    $return = null;
    if($res)
    {
        $list = explode("/",$res);
        $id = $list[0];
        $level = $list[1];
        if($level != 0)
        {
            setcookie("_qt",Encrypt($id),time()+3600*645,"/");
            $return = 1;
        }
        else
            $return = -1;
    }
    echo json_encode(["loggedin"=>$return]);