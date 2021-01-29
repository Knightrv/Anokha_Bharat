<?php
    if(isset($_POST['cancel'])){
        //session_start();
        //session_destroy();
        echo('<script>location.href="index.php"</script>');
    }
    $rowd=false;
    session_start();
    if(isset($_POST['email']) && isset($_POST['pw']) && isset($_POST['uname'])){
        require_once "pdo.php";
        unset($_SESSION['account']);
        unset($_SESSION['id']);
        if(strlen($_POST['email'])<1 && strlen(htmlentities(($_POST['pw'])))<1 && strlen(htmlentities(($_POST['uname'])))<1){
            $_SESSION['error']="Please Fill all the fields";
        }
        elseif(strpos(htmlentities($_POST['email']),'@')==false){
            $_SESSION['error']="Email must have an at-sign (@)";
        }
        else{
            $check=$pdo->prepare("SELECT * FROM users WHERE e_mail = :email");
            $check->execute(array('email'=>htmlentities($_POST['email'])));
            if($check->rowCount()>0)
                $_SESSION['error']="PLEASE USE ANOTHER E_MAIL!!";
            else{
                $ins=$pdo->prepare("INSERT IGNORE INTO users(user_name,password,e_mail) VALUES (:pl1,:pl2,:pl3)");
                $ins->execute(array(':pl1'=>htmlentities($_POST['uname']),':pl2'=>htmlentities($_POST['pw']),':pl3'=>htmlentities($_POST['email'])));
                $otp=$pdo->prepare("SELECT * FROM users WHERE e_mail=:email");
                $otp->execute(array(':email'=>htmlentities($_POST['email'])));
                $rowd=$stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION['account']=htmlentities($rowd['user_name']);
                $_SESSION['success']="success";
                $_SESSION['id']=$rowd['user_id'];
                echo('<script>location.href="index.php"</script>');  
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Anokha Bharat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body style="background:url(img/loginback.jpg);background-size:cover;background-position:center;">
<div class="loginbox">
<img src="img/images.png" class="avatar">
 <h1>Sign Up</h1>
  <?php
   if(isset($_SESSION['error'])){
       echo ('<p style="color:red;">'.$_SESSION['error'].'</p>');
       unset($_SESSION['error']);
   }
   ?>
    <form method="POST">
       <p>Username</p>
       <input type="text" name="uname" class="textbox">
        <p>E-Mail:</p>
        <input type="text" name="email" class="textbox">
        <p>Password:</p>
        <input type="password" name="pw" class="textbox">
        <br><br>
        <input type="submit" class='btn' name="submit" value="REGISTER">
        <input type="submit" class='btn' name="cancel" value="Cancel">
    </form>
</div>
</body>
</html>