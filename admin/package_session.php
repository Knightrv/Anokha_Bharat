<?php
    session_start();
    error_reporting(0);
    if(!isset($_SESSION['admin'])){
        header("Location:adminlogin.php");
        die();
    }
    require_once "pdo.php";
    unset($_SESSION['pprice']);
    unset($_SESSION['pname']);
    unset($_SESSION['d_img']);
    unset($_SESSION['desc_img_details']);
    unset($_SESSION['ptext']);
    unset($_SESSION['pimg']);
    unset($_SESSION['dur']);
    $objs=json_decode($_POST['data']);
    $_SESSION['pprice']=($objs->pprice);
    $_SESSION['pname']=($objs->pname);
    $_SESSION['pimg']=($objs->pimg);
    $_SESSION['ptext']=($objs->ptext);
    $_SESSION['dur']=($objs->dur);
    $_SESSION['d_img']=($objs->d_img);
    $_SESSION['desc_img_details']=($objs->desc_img_details);
    if(isset($_SESSION['pprice']) && isset($_SESSION['pname']) && isset($_SESSION['d_img']) && isset($_SESSION['desc_img_details']) && isset($_SESSION['ptext']) && isset($_SESSION['pimg']) && isset($_SESSION['dur'])){
        $stat1=$pdo->prepare("INSERT IGNORE INTO packages(package_name,package_price,package_image,package_text,details_image,image_desc,duration) VALUES (:pol1,:pol2,:pol3,:pol4,:pol5,:pol6,:pol7)");
        $stat1->execute(array(':pol1'=>$_SESSION['pname'],':pol2'=>$_SESSION['pprice'],':pol3'=>$_SESSION['pimg'],':pol4'=>$_SESSION['ptext'],':pol5'=>$_SESSION['d_img'],':pol6'=>$_SESSION['desc_img_details'],':pol7'=>$_SESSION['dur']));
    }
?>