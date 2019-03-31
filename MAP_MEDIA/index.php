<?php
    require_once("./config/config.php");
    $screens = "./screens/";
    $route = "home";
    $title = "Home";
    $params = null;
    if(isset($_GET['route']))
    {
        if(strpos("/",$_GET['route'])>=0)
        {
            $params = explode("/",$_GET['route']);
            $route = $params[0];
            if(sizeof($params)<1)
                $params = null;
        }
        else
            $route = $_GET['route'];
    }

    //Check if is logged in
    require_once ("./models/Member.php");
    $member = new Member();
    $loggedin = false;
    $id = null;
    $isadmin = false;
    if(isset($_COOKIE['_qt']))
    {
        $id = Decrypt($_COOKIE['_qt']);
        $id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);
        $member->id_member = $id;
        $loggedin = $member->getById();
        $isadmin = $member->level>1?true:false;
        if(!$loggedin)
        {
            setcookie("_qt",0,time()-655,"/");
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="./assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="./assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="./assets/css/font-awesome.css" rel="stylesheet" type="text/css">

    <script src="./assets/js/jquery-3.2.1.js"></script>
    <script src="./assets/js/popper.js"></script>
    <script src="./assets/js/bootstrap.js"></script>
    <script src="./assets/js/ajaxForm.js"></script>
    <script src="./assets/js/sweetalert.min.js"></script>
</head>
<body>
    <?php
        if(in_array($route,["login","signup"]) && $loggedin) {
            header("Location: " . $env["link"]);
            die;
        }
        else if(in_array($route,["article","profile","event","eventsort"]) && sizeof($params)<2)
        {
            $route = "errors/404"; //Page not found
        }
        else if(in_array($route,$protected_routes) && !$loggedin)
            $route = "errors/401";
        else if(!file_exists($screens.$route.".php"))
            $route = "errors/404"; //Page not found

        //Include Header
        include($screens."partes/header.php");
    ?>
    <?php if($route == "home" || $route == "eventsort"): ?>
    <div class="row">
        <img class="col-12 hback" src="<?= assets("img/background.jpg") ?> "/>
        <h1 align="center">Essouira en 3D</h1>
        <h3 class="title"><?= $route == "home"?"Les Articles":"Les Événements" ?></h3>
    </div>
    <?php endif; ?>
    <div class="container" style="margin-top:86px;height: calc(100vh - 72px);" >

    <?php
        include($screens.$route.".php");
    ?>
   <iframe src="googleMa" style="width: 100%; height:570px;border-color: red;">
</iframe>

    </div>
</body>
</html>
