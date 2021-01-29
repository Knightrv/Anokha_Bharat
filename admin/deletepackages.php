<?php
    session_start();
    error_reporting(0);
    if(!isset($_SESSION['admin'])){
        header("Location:adminlogin.php");
        die();
    }
    require_once "pdo.php";
    if(isset($_GET['pid'])){
        $stan=$pdo->prepare('DELETE FROM packages  WHERE package_id=:pn');
        $stan->execute(array(':pn'=>$_GET['pid']));
    }
    ///echo('<script>location.href="mngusers.php"</script>')
?>