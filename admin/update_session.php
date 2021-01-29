<?php
    session_start();
    error_reporting(0);
    if(!isset($_SESSION['admin'])){
        header("Location:adminlogin.php");
        die();
    }
    require_once "pdo.php";
    //if(isset($_POST['edit_btn'])){
    //$pla=$_GET['place'];
    if(isset($_POST['pimg']) && !empty($_POST['pimg'])){
       $forn['package_image']=htmlentities($_POST['pimg']);
       $ktm=$pdo->prepare("UPDATE packages SET package_image=:tr2 WHERE package_name=:tr3");
       $ktm->execute(array(':tr2'=>htmlentities($_POST['pimg']),':tr3'=>$_GET['place']));
    }
    if(isset($_POST['ptext']) && !empty($_POST['ptext'])){
        $forn['package_text']=htmlentities($_POST['ptext']);
        $ktm=$pdo->prepare("UPDATE packages SET package_text=:tr2 WHERE package_name=:tr3");
        $ktm->execute(array(':tr2'=>htmlentities($_POST['ptext']),':tr3'=>$_GET['place']));
    }
    if(isset($_POST['d_img']) && !empty($_POST['d_img'])){
        $forn['details_image']=htmlentities($_POST['d_img']);
        $ktm=$pdo->prepare("UPDATE packages SET details_image=:tr2 WHERE package_name=:tr3");
        $ktm->execute(array(':tr2'=>htmlentities($_POST['d_img']),':tr3'=>$_GET['place']));
    }
    if(isset($_POST['desc_img_details']) && !empty($_POST['desc_img_details'])){
        $forn['image_desc']=htmlentities($_POST['desc_img_details']);
        $ktm=$pdo->prepare("UPDATE packages SET image_desc=:tr2 WHERE package_name=:tr3");
        $ktm->execute(array(':tr2'=>htmlentities($_POST['desc_img_details']),':tr3'=>$_GET['place']));
    }
    if(isset($_POST['pprice']) && !empty($_POST['pprice'])){
        $forn['package_price']=htmlentities($_POST['pprice']);
        $ktm=$pdo->prepare("UPDATE packages SET package_price=:tr2 WHERE package_name=:tr3");
        $ktm->execute(array(':tr2'=>htmlentities($_POST['pprice']),':tr3'=>$_GET['place']));
    }
    if(isset($_POST['dur']) && !empty($_POST['dur'])){
        $forn['duration']=htmlentities($_POST['dur']);
        $ktm=$pdo->prepare("UPDATE packages SET duration=:tr2 WHERE package_name=:tr3");
        $ktm->execute(array(':tr2'=>htmlentities($_POST['dur']),':tr3'=>$_GET['place']));
    }
    if(isset($_POST['pname']) && !empty($_POST['pname'])){
        $forn['package_name']=htmlentities($_POST['pname']);
        $ktm=$pdo->prepare("UPDATE packages SET package_name=:tr2 WHERE package_name=:tr3");
        $ktm->execute(array(':tr2'=>htmlentities($_POST['pname']),':tr3'=>$_GET['place']));
        $pla=$forn['package_name'];
    }
    /*foreach($objl as $key=>$value){
        echo($key);
        echo($value);
        $stm=$pdo->prepare("UPDATE packages SET :el1=:el2 WHERE package_name=:el3");
        $stm->execute(array(':el1'=>$key,':el2'=>$value,':el3'=>$_GET['place']));
    }*/
?>