<?php
    session_start();
    error_reporting(0);
    if(!isset($_SESSION['admin'])){
        header("Location:adminlogin.php");
        die();
    }
    require_once "pdo.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anokha Bharat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <div class="admin-wrapper">
    <?php require_once("sidebar.php");?>
        <div class="container enquiry">
           <h1>Enquiry</h1>
            <div class="row">
               <?php 
                    $disp=$pdo->prepare("SELECT * FROM enquiries WHERE enquiry_id=:pp1");
                    $disp->execute(array(':pp1'=>$_GET['eid']));
                    $answ=$disp->fetch(PDO::FETCH_ASSOC);
                ?>
                <div class="col-md-12" id="username_enq">
                    <h4><span style="color:blue">User's E-Mail:&nbsp;&nbsp;</span><?php echo($answ['e_mail']);?></h4>
                </div>
                <div class="col-md-12" id="sub_enq">
                    <h4><span style="color:blue">Subject:&nbsp;&nbsp;</span><?php echo($answ['subject']);?></h4>
                </div>
                <div class="col-md-12" id="message_enq">
                   <h4>Message</h4>
                    <p><?php echo($answ['message']);?></p>
                </div>
            </div>
        </div>
    </div>