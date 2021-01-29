<?php
    session_start();
    error_reporting(0);
    require_once "pdo.php";
    unset($SESSION['place']);
    unset($_SESSION['image_url']);
    unset($_SESSION['image_name']);
    try{
    $stmt=$pdo->prepare("INSERT INTO bookings(user_id,package_name,status,from_date,to_date,name,persons,e_mail) VALUES (:part1,:part2,:part3,:part4,:part5,:part6,:part7,:part8)");
    $stmt->execute(array(':part1'=>$_SESSION['id'],':part2'=>$_SESSION['pid'],':part3'=>'Confirmed',':part4'=>$_SESSION['from_date'],':part5'=>$_SESSION['to_date'],':part6'=>$_SESSION['trname'],':part7'=>$_SESSION['persons'],':part8'=>$_SESSION['trmail']));
    //echo("Successfully added new user!!");
    }
    catch(PDOException $e){
        echo "DataBase Error: The user could not be added.<br>".$e->getMessage();
    }
    catch(Exception $e){
        echo "General Error: The user could not be added.<br>".$e->getMessage();
    }
 var_dump(array($_SESSION['trmail'],$_SESSION['trname'],$_SESSION['persons'],$_SESSION['persons'],$_SESSION['to_date'],$_SESSION['from_date'],$_SESSION['pid']));
    /*echo($_SESSION['trmail']);
   // echo('<script>console.log('.$_SESSION[''].')</script>');
    echo('<script>console.log('.$_SESSION['persons'].')</script>');
    echo('<script>console.log('.$_SESSION['to_date'].')</script>');
    echo('<script>console.log('.$_SESSION['from_date'].')</script>');
    echo('<script>console.log('.$_SESSION['pid'].')</script>');
    echo('<script>console.log('.$_SESSION['id'].')</script>');
    echo($_SESSION['trname']);
   /* $_SESSION['name']=($obj->name);
    $_SESSION['persons']=($obj->persons);
    $_SESSION['to_date']=($obj->to_date);
    $_SESSION['from_date']=($obj->from_date);
    $_SESSION['pid']=($obj->package_id);*/
   // header("Location:index.php");
?>
