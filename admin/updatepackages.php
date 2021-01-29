<?php
    session_start();
    error_reporting(0);
    if(!isset($_SESSION['admin'])){
        header("Location:adminlogin.php");
        die();
    }
    require_once "pdo.php";
    /*$places=$_GET['place'];
$required=array('package_name'=>'pname','package_price'=>'pprice','package_image'=>'pimg','package_text'=>'ptext','duration'=>'dur','details_image'=>'d_img','image_desc'=>'desc_img_details');
   // $values=array('package_name','package_price','package_image','package_text','duration','details_image','image_desc');
    foreach($required as $field=>$field_value){
        if(isset($_POST[$field_value]) && !empty($_POST[$field_value])){
            if($field=='package_name'){
                $places=$_POST[$field_value];
            }
            $stm=$pdo->prepare("UPDATE packages SET :part1 = :part2 WHERE package_name=:part3");
            $stm->execute(array(':part1'=>$field,':part2'=>$_POST[$field_value],':part3'=>$places));
        }
    }
    if(isset($_POST['edit_details'])){
        header('Location: editdetails.php?place='.$places.'');
    }*/
    if(isset($_POST['edit_btn'])){
    if(isset($_POST['pimg']) && !empty($_POST['pimg'])){
       $forn['package_image']=htmlentities($_POST['pimg']);
       $ktm=$pdo->prepare("UPDATE packages SET package_image=:tr2 WHERE package_name=:tr3");
       $ktm->execute(array(':tr2'=>htmlentities($_POST['pimg']),':tr3'=>$_GET['place']));
    }
    if(isset($_POST['ptext']) && !empty($_POST['ptext'])){
        $forn['package_text']=htmlentities($_POST['ptext']);
        $ktm=$pdo->prepare("UPDATE packages SET package_text=:tr2 WHERE package_name=:tr3");
        $ktm->execute(array(':tr2'=>htmlentities($_POST['ptext']),':tr3'=>$_GET['place']));
    }
    if(isset($_POST['d_img']) && !empty($_POST['d_img'])){
        $forn['details_image']=htmlentities($_POST['d_img']);
        $ktm=$pdo->prepare("UPDATE packages SET details_image=:tr2 WHERE package_name=:tr3");
        $ktm->execute(array(':tr2'=>htmlentities($_POST['d_img']),':tr3'=>$_GET['place']));
    }
    if(isset($_POST['desc_img_details']) && !empty($_POST['desc_img_details'])){
        $forn['image_desc']=htmlentities($_POST['desc_img_details']);
        $ktm=$pdo->prepare("UPDATE packages SET image_desc=:tr2 WHERE package_name=:tr3");
        $ktm->execute(array(':tr2'=>htmlentities($_POST['desc_img_details']),':tr3'=>$_GET['place']));
    }
    if(isset($_POST['pprice']) && !empty($_POST['pprice'])){
        $forn['package_price']=htmlentities($_POST['pprice']);
        $ktm=$pdo->prepare("UPDATE packages SET package_price=:tr2 WHERE package_name=:tr3");
        $ktm->execute(array(':tr2'=>htmlentities($_POST['pprice']),':tr3'=>$_GET['place']));
    }
    if(isset($_POST['dur']) && !empty($_POST['dur'])){
        $forn['duration']=htmlentities($_POST['dur']);
        $ktm=$pdo->prepare("UPDATE packages SET duration=:tr2 WHERE package_name=:tr3");
        $ktm->execute(array(':tr2'=>htmlentities($_POST['dur']),':tr3'=>$_GET['place']));
    }
        header("Location:editpackages.php?place=".$_GET['place']);
    }
    if(isset($_POST['del_btn'])){
        header("Location:editdetails.php?place=".$_GET['place']);
    }
   // header("Location:editdetails.php?place=".$pla."");
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
          <?php 
        $stmt=$pdo->prepare('SELECT * FROM packages WHERE package_name=:tl');
        $stmt->execute(array(':tl'=>$_GET['place']));
        $ar=$stmt->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($stmt->rowCount() > 0)
        {
        foreach($ar as $bd)
        {	
        ?>
           <h2><?php echo($bd->package_name);?></h2>
           <div class="create_package">
               <form method="post">
                   <label for="pname">Package Name: &nbsp;</label>
                   <input type="text" name="pname" value="<?php echo($bd->package_name);?>" class="form-control" disabled autocomplete="off">
                   <br>
                   <br>
                   <label for="pprice">Price: &nbsp;</label>
                   <input type="text" name="pprice" placeholder="<?php echo($bd->package_price);?>" class="form-control" autocomplete="off">
                   <br><br>
                   <label for="pimg">Package Image URL: &nbsp;</label>
                   <input type="text" name="pimg" placeholder="<?php echo($bd->package_image);?>" class="form-control" autocomplete="off">
                   <br><br>
                   <label for="ptext">Package Info: &nbsp;</label>
                   <textarea name="ptext" placeholder="<?php echo($bd->package_text);?>" class="form-control" autocomplete="off"></textarea>
                   <br><br>
                   <label for="dur">Package Duration: &nbsp;</label>
                   <input type="number" name="dur" placeholder="<?php echo($bd->duration);?>" class="form-control" autocomplete="off">
                   <br><br>
                   <label for="details_img">Details page Image Web URL : &nbsp;</label>
                   <input type="text" name="d_img" placeholder="<?php echo($bd->details_image);?>" class="form-control" autocomplete="off">
                   <br><br>
                   <label for="desc_img_details">Name of place in Details page Image: &nbsp;</label>
                   <input type="text" name="desc_img_details" placeholder="<?php echo($bd->image_desc);?>" class="form-control" autocomplete="off">
                   <br><br>
                   <input type="submit" name="edit_btn" class="pcg-btn" value="Update Package Details">
                   &nbsp;&nbsp;
                   <input type="submit" name="del_btn" class="pcg-btn" value="Edit Place Details">
               </form>
            <?php }}?>
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