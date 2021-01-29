<?php
    session_start();
    error_reporting(0);
    if(!isset($_SESSION['admin'])){
        header("Location:adminlogin.php");
        die();
    }
    require_once "pdo.php";
    //unset($_SESSION['plc_title']);
    //unset($_SESSION['pcgname']);
    //unset($_SESSION['pdesc']);
    /*if(!empty(isset($_POST['details_submit']) && $_POST['plc_title'])){
        $stats=$pdo->prepare("INSERT IGNORE INTO details(package_name,place_title,description) VALUES (:l1,:l2,:l3)");
        $stats->execute(array(':l1'=>$_GET['place'],':l2'=>$_POST['plc_title'],':l3'=>$_POST['details_submit']));
        header("Location: adddetails.php?place=".$_SESSION['place']."");
    }*/
    //$objt=json_decode($_POST['ddata']);
   /* $_SESSION['plc_title']=$_POST['plc_title'];
    $_SESSION['pcgname']=$_POST['pcgname'];
    $_SESSION['pdesc']=$_POST['pdesc'];
    $forn=array($_SESSION['plc_title'],$_SESSION['pcgname'],$_SESSION['pdesc']);
    var_dump($forn);*/
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
           <h2>Create Package</h2>
           <div class="create_package">
               <form method="post">
                   <label for="pname">Package Name: &nbsp;</label>
                   <input type="text" id="pcgname" name="pcgname" value="<?php echo(($_GET['place']));?>" class="form-control" disabled autocomplete="off">
                   <br>
                   <br>
                   <label for="plc_title">Place Title: &nbsp;</label>
                   <input type="text" name="plc_title" id="plc_title" placeholder="Enter Place Name" class="form-control pl" autocomplete="off">
                   <br><br>
                   <label for="pdesc">Place Description: &nbsp;</label>
                   <textarea  id="pdesc" name="pdesc" placeholder="Enter Place Description" class="form-control pl" autocomplete="off"></textarea>
                   <br><br>
                   <input type="submit" id="dbtn" class="pcg-btn" name="details_submit" value="Submit">
               </form>
           </div>
        </div>
    </div>
  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<script src="js/admin.js" ></script>
<script type="text/javascript">
var pid=window.location.search.substring(7);
/*history.pushState(null, null, '/*</?//php echo $_SERVER["REQUEST_URI"];?/>');
window.addEventListener('popstate', function(event) {
    window.location.assign("editdetails.php?place="+pid);
});*/
    console.log(pid);
$('#dbtn').click(function(){
        var isValid=true;
        $('.pl').each(function(){
            if(!$(this).val()){
                isValid=false;
                alert("Please Fill All Fields!!");
                return false;
            }
        });
        if(isValid==true){
            var d1=pid;
            var d2=document.getElementById("plc_title").value;
            var d3=document.getElementById("pdesc").value;
            var delt={'pcgname':d1,'plc_title':d2,'pdesc':d3};
            console.log(delt);
            $.ajax({
                    url:"details_session.php",
                    type:"POST",
                    data:{delts:JSON.stringify(delt)},
                    error:function(){
                        alert("Some Unknown Error Occured");
                    }
                       
                });
        }
    });
</script>
</body>
</html>