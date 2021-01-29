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
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/admin.css">
    <script src="alert/alertify.min.js"></script>
    <link rel="stylesheet" href="alert/alertify.core.css"/>
    <link rel="stylesheet" href="alert/alertify.default.css" id="toggleCSS" />
</head>
<body>
    <div class="admin-wrapper">
        <?php require_once("sidebar.php");?>
        <div class="admin-content">
            <h2 class="page-title">PACKAGES</h2>
            <table>
                <thead>
                    <th>Package ID</th>
                    <th>Package Name</th>
                   <th colspan="2">Action</th>
                </thead>
                <tbody>
                  <?php 
        $stmt=$pdo->prepare('SELECT * FROM packages;');
        $stmt->execute();
        $ar=$stmt->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($stmt->rowCount() > 0)
        {
        foreach($ar as $bd)
        {	
            $vars2=urlencode($bd->package_name);
            $str2='place='.$vars2;
        ?>
                    <tr id="del_package_<?php echo($bd->package_id);?>">
                        <td><?php echo(htmlentities($bd->package_id));?></td>
                        <td><?php echo(htmlentities($bd->package_name));?></td>
                        <td><button onclick="deletePack(<?php echo($bd->package_id);?>)">Delete</button></td>
                        <td><a href="updatepackages.php?<?php echo(htmlentities($str2));?>" class="confirm">Update</a></td>
                    </tr>
                <?php }}?>
                </tbody>
            </table>
        </div>
    </div>
  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<script src="js/admin.js" ></script>
<script type="text/javascript">
function deletePack(pid){
// A confirm dialog
alertify.confirm("Are you sure, you want to delete this package?", function (e) {
    if (e) {
        alertify.alert("Package Removed!");
        $.ajax({
                type:"get",
                url:encodeURI("deletepackages.php?pid="+pid),
                success:function(data){
                    $('#del_package_'+pid).hide();
                }
        });
    } 
});
}
   /* function deletePack(pid){
        
            console.log("Hello Works!");
            if(confirm('Are you sure!!')){
            $.ajax({
                type:"get",
                url:"deletepackages.php?pid="+pid,
                success:function(data){
                    $('#del_package_'+pid).hide();
                }
            });
        };

    }*/
</script>
</body>
</html>