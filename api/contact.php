<?php
    header('Content-type: application/json');
    if(isset($_POST))
    {
        require_once "../dao/ContactDAO.php";
        $con = new ContactDAO();

        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $res = $con->contact($name,$email,$message);
        echo json_encode([
            "success"=>$res
        ]);
    }
    else{
        echo json_encode([
            "success"=>false
        ]);
    }