<?php
    if(isset($_POST['cancel'])){
        //session_start();
     //   session_destroy();
        echo('<script>location.href="../index.php"</script>');
    }
    session_start();
    if(isset($_POST['user']) && isset($_POST['pw'])){
        require_once "../pdo.php";
        unset($_SESSION['admin']);
        if(strlen($_POST['user'])<1 && strlen(htmlentities(($_POST['pw'])))<1){
            $_SESSION['error']="Username and password are required";
        }
        else{
            if($_POST['user']=='admin' && $_POST['pw']=='1234'){
                $_SESSION['admin']='admin';
                $_SESSION['success']="success";
                echo('<script>location.href="index.php"</script>');  
            }
            else{
                $_SESSION['error']="Incorrect password";
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Anokha Bharat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body id="adminlog">
<?php require_once "navbar.php"; ?>
<div class="loginbox">
  <?php
   if(isset($_SESSION['error'])){
       echo ('<p style="color:red;">'.$_SESSION['error'].'</p>');
       unset($_SESSION['error']);
   }
   ?>
    <form method="POST" id="admin_form">
       <h1>Login</h1>
        <p>User Name:</p>
        <input type="text" name="user" class="form-control">
        <p>Password:</p>
        <input type="password" name="pw" class="form-control">
        <br><br>
        <input type="submit" class='btn_admin' name="submit" value="Submit">
    </form>
</div>
  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<script src="js/admin.js" ></script>
</body>
</html>