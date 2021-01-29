<?php
    session_start();
    error_reporting(0);
    if(!isset($_SESSION['admin'])){
        header("Location:adminlogin.php");
        die();
    }
    require_once "pdo.php";
    $w1=json_decode($_POST['delts']);
    $_SESSION['plc_title']=$w1->plc_title;
    $_SESSION['pcgname']=$w1->pcgname;
    $_SESSION['pdesc']=$w1->pdesc;
    $forn=array($_SESSION['plc_title'],$_SESSION['pcgname'],$_SESSION['pdesc']);
    var_dump($forn);
    $stat=$pdo->prepare("INSERT IGNORE INTO details(package_name,place_title,description) VALUES (:prt1,:prt2,:prt3)");
    $stat->execute(array(':prt1'=>$_SESSION['pcgname'],':prt2'=>$_SESSION['plc_title'],':prt3'=>$_SESSION['pdesc']));
    /*if(isset($_SESSION['pprice']) && isset($_SESSION['pname']) && isset($_SESSION['d_img']) && isset($_SESSION['desc_img_details']) && isset($_SESSION['ptext']) && isset($_SESSION['pimg']) && isset($_SESSION['dur'])){
        $stat1=$pdo->prepare("INSERT IGNORE INTO packages(package_name,package_price,package_image,package_text,details_image,image_desc,duration) VALUES (:pol1,:pol2,:pol3,:pol4,:pol5,:pol6,:pol7)");
        $stat1->execute(array(':pol1'=>$_SESSION['pname'],':pol2'=>$_SESSION['pprice'],':pol3'=>$_SESSION['pimg'],':pol4'=>$_SESSION['ptext'],':pol5'=>$_SESSION['d_img'],':pol6'=>$_SESSION['desc_img_details'],':pol7'=>$_SESSION['dur']));
    }*/
?>