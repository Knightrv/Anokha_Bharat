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
    <script src="alert/alertify.min.js"></script>
    <link rel="stylesheet" href="alert/alertify.core.css"/>
    <link rel="stylesheet" href="alert/alertify.default.css" id="toggleCSS" />
</head>
<body>
    <div class="admin-wrapper">
        <?php require_once("sidebar.php");?>
        <div class="admin-content">
            <h2 class="page-title">EDIT DETAILS</h2>
            <table>
                <thead>
                    <th>Place ID</th>
                    <th>Place Name</th>
                   <th>Action</th>
                </thead>
                <tbody>
                  <?php 
        $stmt=$pdo->prepare('SELECT * FROM details WHERE package_name=:plc;');
        $stmt->execute(array(':plc'=>$_GET['place']));
        $ar=$stmt->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($stmt->rowCount() > 0)
        {
        foreach($ar as $bd)
        {	
            $vars1=urlencode($_GET['place']);
            $string='place='.$vars1;
        ?>
                    <tr id="del_dtl_<?php echo($bd->details_id);?>">
                        <td><?php echo(htmlentities($bd->details_id));?></td>
                        <td><?php echo(htmlentities($bd->place_title));?></td>
                        <td><a onclick="deleteDetail(<?php echo($bd->details_id);?>)" class="delete">Delete</a></td>
                    </tr>
                <?php }}?>
                </tbody>
            </table>
            <input type="submit" class="pcg-btn" onclick="window.location.href='<?php echo("adddetails.php?".$string."");?>'" value="ADD PLACES">
        </div>
    </div>
  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<script src="js/admin.js" ></script>
<script type="text/javascript">
    function deleteDetail(dtl_id){
        alertify.confirm("Are you sure, you want to delete this Place?", function (e) {
        if (e) {
        alertify.alert("Place Removed!");
        $.ajax({
                type:"get",
                url:encodeURI("delete_details.php?dtl_id="+dtl_id),
                success:function(data){
                    $('#del_dtl_'+dtl_id).hide();
                }
        });
    } 
});
    }
        /*console.log("Hello Works");
        if(confirm('Are you sure!!')){
            $.ajax({
                type:"get",
                url:"delete_details.php?dtl_id="+dtl_id,
                success:function(data){
                    $('#del_dtl_'+dtl_id).hide();
                }
            })
        }
    }*/
</script>
</body>
</html>