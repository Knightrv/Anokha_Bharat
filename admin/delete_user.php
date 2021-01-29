<?php
    session_start();
    error_reporting(0);
    if(!isset($_SESSION['admin'])){
        header("Location:adminlogin.php");
        die();
    }
    require_once "pdo.php";
    if(isset($_GET['id'])){
        $stat=$pdo->prepare('DELETE FROM users  WHERE user_id=:pd');
        $stat->execute(array(':pd'=>$_GET['id']));
    }
    ///echo('<script>location.href="mngusers.php"</script>')
?>