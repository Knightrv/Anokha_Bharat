<?php
    if(isset($_POST['cancel'])){
        //session_start();
     //   session_destroy();
        echo('<script>location.href="index.php"</script>');
    }
    if(isset($_POST['admin'])){
        echo('<script>location.href="admin/adminlogin.php"</script>');
    }
    require_once("config.php");
    if(isset($_SESSION['access_token'])){
        header("Location:index.php");
        exit();
    }
    $loginURL=$gClient->createAuthUrl();
    $row=false;
    //session_start();
    if(isset($_POST['email']) && isset($_POST['pw'])){
        require_once "pdo.php";
        unset($_SESSION['account']);
        unset($_SESSION['id']);
        if(strlen($_POST['email'])<1 && strlen(htmlentities(($_POST['pw'])))<1){
            $_SESSION['error']="E-mail and password are required";
        }
        elseif(strpos(htmlentities($_POST['email']),'@')==false){
            $_SESSION['error']="Email must have an at-sign (@)";
        }
        else{
            $stmt=$pdo->prepare("SELECT * FROM users WHERE e_mail=:email");
            $stmt->execute(array('email'=>htmlentities($_POST['email'])));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            if($row!=false && $row['password']==$_POST['pw']){
                $_SESSION['account']=htmlentities($row['user_name']);
                $_SESSION['success']="success";
                $_SESSION['id']=$row['user_id'];
                echo('<script>location.href="index.php"</script>');  
            }
            else{
                $_SESSION['error']="Incorrect password/e-mail";
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
 <h1>Login</h1>
  <?php
   if(isset($_SESSION['error'])){
       echo ('<p style="color:red;">'.$_SESSION['error'].'</p>');
       unset($_SESSION['error']);
   }
   ?>
    <form method="POST">
        <p>E-Mail:</p>
        <input type="text" name="email" class="textbox">
        <p>Password:</p>
        <input type="password" name="pw" class="textbox">
        <br><br>
        <input type="submit" class='btn' name="submit" value="Submit">
        <input type="submit" class='btn' name="cancel" value="Cancel">
        <div class="row">
          <div class="col-md-12">
                <a class="btn btn-outline-dark" onclick="window.location='<?php echo $loginURL ;?>'" role="button" style="text-transform:none">
              <img width="20px" style="margin-bottom:3px; margin-right:5px" alt="Google sign-in" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />Login with Google
                </a>
          </div>
        </div>
        <a href="admin/adminlogin.php">Admin Login</a><br>
        <a href="registration.php">Sign up</a>
        <br>
      
        <!--<a onclick="window.location='<//?php echo $loginURL ;?>'">Sign in with Google</a>-->
    </form>
</div>
</body>
</html>