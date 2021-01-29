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
        <div class="admin-content">
            <h2 class="page-title">Manage Bookings</h2>
            <table>
                <thead>
                    <th>Booking ID</th>
                    <th>User Name</th>
                    <th>Package Name</th>
                    <th>Booking Time</th>
                    <th>FROM_DATE</th>
                    <th>TO_DATE</th>
                    <th>Status</th>
                   <th colspan="2">Action</th>
                </thead>
                <tbody>
                  <?php 
        $stmt=$pdo->prepare('SELECT * FROM bookings;');
        $stmt->execute();
        $ar=$stmt->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($stmt->rowCount() > 0)
        {
        foreach($ar as $bd)
        {	
            /*$fort=$pdo->prepare('SELECT package_name FROM packages WHERE package_id=:pts');
            $fort->execute(array(':pts'=>$bd->package_id));
            $press=$fort->fetch(PDO::FETCH_ASSOC);*/
            $pala=$pdo->prepare('SELECT user_name FROM users WHERE user_id=:uts');
            $pala->execute(array(':uts'=>$bd->user_id));
            $pred=$pala->fetch(PDO::FETCH_ASSOC);
        ?>
                    <tr id="book_id_<?php echo($bd->booking_id);?>">
                        <td><?php echo(htmlentities($bd->booking_id));?></td>
                        <td><?php echo(htmlentities($pred['user_name']));?></td>
                        <td><?php echo(htmlentities($bd->package_name));?></td>
                        <td><?php echo(htmlentities($bd->booking_date));?></td>
                        <td><?php echo(htmlentities($bd->from_date));?></td>
                        <td><?php echo(htmlentities($bd->to_date));?></td>
                        <td class="stat"><?php echo(htmlentities($bd->status));?></td>
                        <td><a href="#" class="delete" onclick="cancelajax(<?php echo($bd->booking_id);?>)">Cancel Booking</a></td>
                        <td><a href="#" onclick="confirmajax(<?php echo($bd->booking_id);?>)" class="confirm">Confirm Booking</a></td>
                    </tr>
                <?php }}?>
                </tbody>
            </table>
        </div>
    </div>
<script type="text/javascript">
    function confirmajax(id){
        $.ajax({
            type:"get",
            url:encodeURI("action_booking.php?confirm_id="+id),
            success:function(data){
                $('#book_id_'+id).children('td.stat').text("Confirmed");
            }
        })
    };
    function cancelajax(id){
        $.ajax({
            type:"get",
            url:encodeURI("action_booking.php?cancel_id"+id),
            success:function(data){
                //console.log($("#book_id"+id).children('td.stat').text());
                $('#book_id_'+id).children('td.stat').text("Cancelled");
            }
        })
    };
</script>
  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<script src="js/admin.js" ></script>
</body>
</html>