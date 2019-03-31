<?php
    header('Content-type: application/json');
    require_once ("../models/Member.php");
    $member = new Member();

    $date = date_create($_POST['datene']);
    $datene =  date_format($date,"Y-m-d");

    $password = $_POST['password'];
    $r_password = $_POST['r_password'];
    $nom = ucfirst(filter_var($_POST['nom'],FILTER_SANITIZE_STRING));
    $prenom = ucfirst(filter_var($_POST['prenom'],FILTER_SANITIZE_STRING));
    $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);

    $res = array();
    $success = true;
    $msg = "";


    if($member->getByEmail($email))
    {
        $msg.="● ".$email." : existe déjà\n";
        $success = false;
    }
    if($password != $r_password)
    {
        $msg.="● Votre mot de passe ne correspond pas\n";
        $success = false;
    }
    if(strlen($password)<8)
    {
        $msg.="● La longueur du mot de passe doit être supérieure à 8\n";
        $success = false;
    }
    if($success)
    {
        $member->pwd_membre = md5($password);
        $member->nom_membre = $nom;
        $member->prenom_membre = $prenom;
        $member->login_membre = $email;
        $member->datene_membre = $datene;
        $success = $member->save();
    }
    echo json_encode(["success"=>$success,"msg"=>$msg]);

