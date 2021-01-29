<?php
    session_start();
    error_reporting(0);
    if(!isset($_SESSION['id'])){
       header('Refresh:0.5;url=index.php');
        echo('<script>alert("Please Login/Register Before!!");</script>');
        die();
    }
    require_once "pdo.php";
   /* if(isset($_SESSION['account'])){
        
        //$stmt=$pdo->prepare("INSERT INTO bookings (user_id,package_id,status,from_date,to_date) VALUES (:mk1,:mk2,:mk3,:mk4,:mk5)");
        //$stmt->execute(array(':mk1'=>2,':mk2'=>2,':mk3'=>'Cancelled',':mk4'=>'2020-02-18',':mk5'=>'2020-02-24'));
        //$ans=$stmt->fetch(PDO::FETCH_ASSOC);
        //echo('<pre>');
        //$print_r($ans);
        /*$qr=$pdo->prepare("SELECT * FROM packages WHERE package_id=:pid");
        $qr->execute(array('pid'=>$ans['package_id']));
        $ans=$qr->fetch(PDO::FETCH_ASSOC);
        $print_r($ans);
        echo($_SESSION['id']);
        $sql='SELECT * FROM bookings WHERE user_id=:names';
        $stmt=$pdo->prepare('SELECT * FROM users WHERE user_id=:names');
        $stmt->execute(array(':names'=>$_SESSION['id']));
        $ar=$stmt->fetchAll(PDO::FETCH_OBJ);
    }*/
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anokha Bharat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>  
<body>
<?php require_once "navbar.php";?>
<h1 style="color:violet;text-align:center;font-size:5rem;position:absolute;left:28%;top:20%;">Booking Details</h1>
<table class="content-table">
  <thead>
      <th>User Name</th>
      <th>Booking ID</th>
      <th>Package Name</th>
      <th>Traveller's Name</th>
      <th>Traveller's E-Mail</th>
      <th>Number Of Persons</th>
      <th>Status</th>
      <th>Booking Date</th>
      <th>From_date</th>
      <th>To_date</th>
  </thead>
  <tbody>
   <?php 
        try{
        $stmt=$pdo->prepare('SELECT * FROM bookings WHERE user_id=:names');
        $stmt->execute(array(':names'=>$_SESSION['id']));
        $ar=$stmt->fetchAll();
        foreach($ar as $bd){
            ?>
    <tr>
      <td><?php echo(htmlentities($_SESSION['account']));?></td>
      <td><?php echo(htmlentities($bd['booking_id']));?></td>
      <td><?php echo(htmlentities($bd['package_name']));?></td>
      <td><?php echo(htmlentities($bd['name']));?></td>
      <td><?php echo(htmlentities($bd['e_mail']));?></td>
      <td><?php echo(htmlentities($bd['persons']));?></td>
      <td><?php echo(htmlentities($bd['status']));?></td>
      <td><?php echo(htmlentities($bd['booking_date']));?></td>
      <td><?php echo(htmlentities($bd['from_date']));?></td>
      <td><?php echo(htmlentities($bd['to_date']));?></td>
    </tr>
    <?php }}
      catch(PDOException $e){
          echo 'Error!: ' . $e->getMessage() . '<br />';
        die();
      }?>
  </tbody>
</table>
</body>
</html>