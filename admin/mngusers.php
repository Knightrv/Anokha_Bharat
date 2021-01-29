<?php
    session_start();
    error_reporting(0);
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
        <div class="admin-content" style="background-size:cover;background-repeat:no-repeat;background-position:center;">
            <h2 class="page-title">Manage Users</h2>
            <table>
                <thead>
                    <th>User Id</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th colspan="2">Action</th>
                </thead>
                <tbody>
                <?php 
                    $stmt=$pdo->prepare("SELECT * FROM users;");
                    $stmt->execute();
                    $ans=$stmt->fetchAll(PDO::FETCH_OBJ);
                    $cnt=1;
                    if($stmt->rowCount() > 0)
                    {
                        foreach($ans as $result)
                        {   	?>
                    <tr id="del_user_<?php echo($result->user_id);?>">
                        <td><?php echo(htmlentities($result->user_id));?></td>
                        <td><?php echo(htmlentities($result->user_name));?></td>
                        <td><?php echo(htmlentities($result->e_mail));?></td>
                       <!-- <td><a href="delete_user.php?id=<//?php echo($result->user_id);?>" class="delete">Delete</a></td>-->
                       <td><button onclick="deleteAjax(<?php echo($result->user_id);?>)">Delete</button></td>
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
   function deleteAjax(id){
    alertify.confirm("Are you sure, you want to delete this User?", function (e) {
    if (e) {
        alertify.alert("User Removed!");
        $.ajax({
                type:"get",
                url:encodeURI("delete_user.php?id="+id),
                success:function(data){
                    $('#del_user_'+id).hide();
            }
            });
    } 
});
}
/*    function deleteAjax(id){
        
        if(confirm('Are you sure!!')){
            $.ajax({
                type:"get",
                url:"delete_user.php?id="+id,
                success:function(data){
                    $('#del_user_'+id).hide();
            }
            })
        }
    }*/
</script>
</body>
</html>    