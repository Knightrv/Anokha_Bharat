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
  <?php require_once("navbar.php");?>
  <div class="admin-wrapper">
      <?php require_once("sidebar.php");?>
      <div class="admin-content row">
          <div class="col-sm-6 col-md-3 boxes" id="user">
              <i class="fa fa-users"></i>
              <br><br>
              <h2>Users</h2>
              <?php
                $stmt=$pdo->query("SELECT * FROM users;");
              ?>
              <br><h3><?php echo($stmt->rowCount());?></h3>
          </div>
          <div class="col-sm-6 col-md-3 boxes" id="package">
              <i class="fa fa-shopping-cart"></i><br><br>
              <?php $stmt=$pdo->query("SELECT * FROM packages;");?>
              <h2>Packages</h2><br>
              <h3><?php echo($stmt->rowCount());?></h3>
          </div>
          <div class="col-sm-6 col-md-3 boxes" id="booking">
              <i class="fa fa-plane"></i><br><br>
              <h2>Bookings</h2>
              <?php $stmt=$pdo->query("SELECT * FROM bookings;");?>
              <br><h3><?php echo($stmt->rowCount());?></h3>
          </div>
          <div class="col-sm-6 col-md-3 boxes" id="enquiry">
              <i class="fa fa-comments-o"></i><br>
              <br><h2>Enquiries</h2>
              <?php $stmt=$pdo->query("SELECT * FROM enquiries;");?>
              <br><h3><?php echo($stmt->rowCount());?></h3>
          </div>
      </div>
  </div>
  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<script src="js/admin.js" ></script>
</body>
</html>