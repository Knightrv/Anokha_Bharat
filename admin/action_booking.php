<?php
    session_start();
    error_reporting(0);
    if(!isset($_SESSION['admin'])){
        header("Location:adminlogin.php");
        die();
    }
    require_once "pdo.php";
    if(isset($_GET['cancel_id'])){
        $stat=$pdo->prepare('UPDATE bookings SET status="Cancelled" WHERE booking_id=:pi');
        $stat->execute(array(':pi'=>urldecode($_GET['cancel_id'])));
    }
    elseif(isset($_GET['confirm_id'])){
        $stat=$pdo->prepare('UPDATE bookings SET status="Confirmed" WHERE booking_id=:pd');
        $stat->execute(array(':pd'=>urldecode($_GET['confirm_id'])));
        
    }
    else{}
    echo('<script>location.href="mngbookings.php"</script>')
?>