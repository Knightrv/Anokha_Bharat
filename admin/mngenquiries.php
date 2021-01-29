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
            <h2 class="page-title">ENQUIRIES</h2>
            <table>
                <thead>
                    <th>Enquiry ID</th>
                    <th>Subject</th>
                    <th>Status</th>
                   <th colspan="2">Action</th>
                </thead>
                <tbody>
                  <?php 
        $stmt=$pdo->prepare('SELECT * FROM enquiries;');
        $stmt->execute();
        $ar=$stmt->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($stmt->rowCount() > 0)
        {
        foreach($ar as $bd)
        {	
        ?>
                    <tr id="del_enq_<?php echo($bd->enquiry_id);?>">
                       <td id="valued"><?php echo(htmlentities($bd->enquiry_id));?></td>
                        <td><?php echo(htmlentities($bd->subject));?></td>
                        <td><?php echo(htmlentities($bd->status));?></td>
                        <td><button onclick="dele(<?php echo($bd->enquiry_id);?>);" id="del">Delete</button></td>
                        <td><button onclick="views(<?php echo($bd->enquiry_id);?>);" id="view">View</button></td>
                        <!--<td><a href="updatepackages.php?place=<?//php echo($bd->package_name);?//>" class="confirm">Details</a></td>-->
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
   
    /*function deleteEnq(eid){
        
        console.log("Hello Works");
        if(confirm('Are you sure!!')){
            $.ajax({
                type:"get",
                url:"delete_enquiry.php?eid="+eid,
                success:function(data){
                    $('#del_enq_'+eid).hide();
                }
            });
        };
    }*/
    function dele(ids){
    alertify.confirm("Are you sure, you want to delete this Enquiry?", function (e) {
    if (e) {
        alertify.alert("Enquiry Removed!");
        $.ajax({
                type:"get",
                url:encodeURI("delete_enquiry.php?eid="+ids),
                success:function(data){
                    $('#del_enq_'+ids).hide();
                }
       });
    } 
});
};
    /*document.getElementById("del").addEventListener("click",function(){
        console.log("Hello Works");
        if(confirm('Are you sure!!')){
            $.ajax({
                type:"get",
                url:"delete_enquiry.php?eid="+ids,
                success:function(data){
                    $('#del_enq_'+ids).hide();
                }
            });
        };
    });*/
    function views(ids){
        console.log(ids);
        window.location.href=encodeURI("display_enquiry.php?eid="+ids); 
    };
   
</script>
</body>
</html>