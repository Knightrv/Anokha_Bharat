<?php
    session_start();
    error_reporting(0);
    if(!isset($_SESSION['id'])){
        header('Refresh:4;url=index.php');
        echo('<script src="alert/alertify.min.js"></script>');
        echo('<link rel="stylesheet" href="alert/alertify.core.css"/>');
        echo('<link rel="stylesheet" href="alert/alertify.default.css" id="toggleCSS" />');
        echo('<script type="text/javascript">window.onload=function(){alertify.alert("Please Login/Register Before!!");}</script>');
        die();
    }
    require_once "pdo.php";
    unset($SESSION['place']);
    unset($_SESSION['image_url']);
    unset($_SESSION['image_name']);
    $obj=json_decode($_POST['edata']);
    $srt=$pdo->prepare("INSERT IGNORE INTO enquiries(e_mail,subject,message,status) VALUES (:pr1,:pr2,:pr3,'UNSOLVED');");
    $srt->execute(array(':pr1'=>$obj->umail,':pr2'=>$obj->subject,':pr3'=>$obj->msg));
    
?>
