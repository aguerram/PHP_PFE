<?php
    header('Content-type: application/json');
    require_once ("../models/Article.php");
    $article = new Article();
    $ok = true;
    $msg = $article->MSG_ADDED;

    $titre = str_replace("'","`",$_POST['titre']);
    $contenu = str_replace("'","`",$_POST['contenu']);
    $type = $_POST['type'];
    $historique = str_replace("'","`",$_POST['historique']);
    $cordx = $_POST['cordx'];
    $cordy = $_POST['cordy'];

    $article->titre = $titre;
    $article->contenu = $contenu;
    $article->type = $type;
    $article->historique = $historique;
    $article->cordx = $cordx;
    $article->cordy = $cordy;

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
        $article->titre = $titre;
        $article->contenu = $contenu;
        $article->type = $type;
        $article->historique = $historique;
        $article->cordx = $cordx;
        $article->cordy = $cordy;
        $article->image = $imagename;
        $article->id_member = Decrypt($_COOKIE['_qt']);
        $success = $article->save();
    }


    if(!$success && $ok)
    {
        $msg = $article->MSG_FAILED;
    }
    echo json_encode(["success"=>$success,"msg"=>$msg]);