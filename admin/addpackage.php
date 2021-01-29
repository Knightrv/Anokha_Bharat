<?php
    session_start();
    error_reporting(0);
    if(!isset($_SESSION['admin'])){
        header("Location:adminlogin.php");
        die();
    }
    require_once "pdo.php";
    /*if(isset($_POST['package_details'])){
        if(!empty($_POST['pname']) && !empty($_POST['pprice']) && !empty($_POST['pimg']) && !empty($_POST['ptext']) && !empty($_POST['dur']) && !empty($_POST['d_img']) && !empty($_POST['desc_img_details'])){
            $bolt=$pdo->prepare("INSERT IGNORE INTO packages(package_name,package_price,package_image,package_text,details_image,image_desc,duration) VALUES (:pt1,:pt2,:pt3,:pt4,:pt5,:pt6,:pt7)");
            $bolt->execute(array(':pt1'=>$_POST['pname'],':pt2'=>$_POST['pprice'],':pt3'=>$_POST['pimg'],':pt4'=>$_POST['ptext'],':pt5'=>$_POST['d_img'],':pt6'=>$_POST['desc_img_details'],':pt7'=>$_POST['dur']));
            echo('<script>location.href="adddetails.php?place="'.$_POST['pname'].'</script>');
        }
    }*/
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
                   <input type="text" id="pname" name="pname" placeholder="Enter Package Name " class="form-control" autocomplete="off">
                   <br>
                   <br>
                   <label for="pprice">Price: &nbsp;</label>
                   <input type="text" id="pprice" name="pprice" placeholder="Enter cost of Package " class="form-control" autocomplete="off">
                   <br><br>
                   <label for="pimg">Package Image URL: &nbsp;</label>
                   <input type="text" id="pimg" name="pimg" placeholder="Enter Pacakge image Web URL" class="form-control" autocomplete="off">
                   <br><br>
                   <label for="ptext">Package Info: &nbsp;</label>
                   <textarea name="ptext" id="ptext" placeholder="Enter Package Info" class="form-control" autocomplete="off"></textarea>
                   <br><br>
                   <label for="dur">Package Duration: &nbsp;</label>
                   <input type="number" id="dur" name="dur" placeholder="Enter duration (in days)" class="form-control" autocomplete="off">
                   <br><br>
                   <label for="d_img">Details page Image Web URL : &nbsp;</label>
                   <input type="text" id="d_img" name="d_img" placeholder="Enter Details page image Web URL" class="form-control" autocomplete="off">
                   <br><br>
                   <label for="desc_img_details">Name of place in Details page Image: &nbsp;</label>
                   <input type="text" id="desc_img_details" name="desc_img_details" placeholder="Enter name of place in the details page image" class="form-control" autocomplete="off">
                   <br><br>
                   <input type="submit" id="pbtn" class="pcg-btn" name="package_details" value="Add Place Details">
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
    $('#pbtn').click(function(){
        var isValid=true;
        $('input').each(function(){
            if(!$(this).val()){
                isValid=false;
                alert("Please Fill All Fields!!");
                return false;
            }
        });
        if(isValid==true){
            var f1=document.getElementById("pname").value;
            var f2=document.getElementById("pprice").value;
            var f3=document.getElementById("pimg").value;
            var f4=document.getElementById("ptext").value;
            var f5=document.getElementById("dur").value;
            var f6=document.getElementById("d_img").value;
            var f7=document.getElementById("desc_img_details").value;
            var values={'pname':f1,'pprice':f2,'pimg':f3,'ptext':f4,'dur':f5,'d_img':f6,'desc_img_details':f7};
            $.ajax({
                    url:"package_session.php",
                    type:"POST",
                    data:{data:JSON.stringify(values)},
                    success:function(data){
                       window.location.href=encodeURI("adddetails.php?place="+f1);
                    },
                    error:function(){
                        alert("Some Unknown Error Occured");
                    }
                       
                });
        }
    });
</script>
</body>
</html>