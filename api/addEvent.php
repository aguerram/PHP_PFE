<?php
    header('Content-type: application/json');
    require_once "../dao/EventDAO.php";
    require_once "../models/Event.php";
    $event = new Event();
    $eventDAO = new EventDAO();

    $ok = true;
    $msg = "";
    $titre = str_replace("'","`",$_POST['titre']);

    $desc = str_replace("'","`",$_POST['desc']);
    $type = $_POST['type'];
    $cordx = $_POST['cordx'];
    $cordy = $_POST['cordy'];

    $__datedepart = date_create($_POST['datedepart']);
    $datedepart =  date_format($__datedepart,"Y-m-d");

    $__datefin = date_create($_POST['datefin']);
    $datefin =  date_format($__datefin,"Y-m-d");

    //Upload Image
    $uploadOk = true;
    $target_dir = "../storage/";
    $imageFileType = strtolower(pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION));
    $imagename = uniqid("i").".".$imageFileType;;
    $target_file = $target_dir . $imagename;

    $imageSize = getimagesize($_FILES["image"]["tmp_name"]);
    if($imageSize == false)
    {
        $msg = "Le fichier n'est pas une image.";
    }
    else
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $msg = "Désolé, seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
        $uploadOk = false;
    }
    else if(!move_uploaded_file($_FILES["image"]["tmp_name"],$target_file))
    {
        $msg = "Votre image n'a pas été téléchargée";
        $ok = false;
    }

    $success = false;
    if($ok)
    {
        $event->titre = $titre;
        $event->type = $type;
        $event->cordx = $cordx;
        $event->cordy = $cordy;
        $event->image = $imagename;
        $event->id_member = Decrypt($_COOKIE['_qt']);
        $event->description = $desc;
        $event->datefin = $datefin;
        $event->datedep = $datedepart;
        $success = $eventDAO->save($event);
    }


    if(!$success && $ok)
    {
        $msg = "Erreur est survenue";
    }
    else{
        $msg = "Votre événement a été ajouté";
    }
    echo json_encode(["success"=>$success,"msg"=>$msg]);