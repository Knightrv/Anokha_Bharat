<?php
    session_start();
    error_reporting(0);
    require_once "pdo.php";
    unset($_SESSION['place']);
    unset($_SESSION['image_url']);
    unset($_SESSION['image_name']);
    unset($_SESSION['t_mail']);
    unset($_SESSION['name']);
    unset($_SESSION['persons']);
    unset($_SESSION['to_date']);
    unset($_SESSION['from_date']);
    unset($_SESSION['pid']);
    $variable="";
    if(isset($_POST['btn_send']))
    {
        if(!isset($_SESSION['id'])){
            header('Refresh:4;url=index.php');
            echo('<script src="alert/alertify.min.js"></script>');
            echo('<link rel="stylesheet" href="alert/alertify.core.css"/>');
            echo('<link rel="stylesheet" href="alert/alertify.default.css" id="toggleCSS" />');
            echo('<script type="text/javascript">window.onload=function(){alertify.alert("Please Login/Register Before!!");}</script>');
            die();
        }
        else{
        if(!empty($_POST['subject']) && !empty($_POST['umail'])){
            if(strpos(htmlentities($_POST['umail']),'@')==true){
                //$_SESSION['error']="Email must have an at-sign (@)";
            echo('<script>console.log("HELLO WORLD ENQUIRY FORM WORKING !!!! :");</script>');
            $srt=$pdo->prepare("INSERT IGNORE INTO enquiries(e_mail,subject,message,status) VALUES (:pr1,:pr2,:pr3,'UNSOLVED');");
            $srt->execute(array(':pr1'=>$_POST['umail'],':pr2'=>$_POST['subject'],':pr3'=>$_POST['msg']));
            
        }
        else
        {
            $variable="Email must have an '@' sign!!";
            echo('<script src="alert/alertify.min.js"></script>');
            echo('<script type="text/javascript">window.onload=function(){alertify.alert("Please Enter Valid E-Mail!!");}</script>');
        }
    }
    else
    {
        $variable="Please Fill all the Required Fields!!";
        echo('<script src="alert/alertify.min.js"></script>');
        echo('<script type="text/javascript">window.onload=function(){alertify.alert("Please Fill all the Fields!!");}</script>');
    }
}
}
/*
    if(isset($_POST['umail']) && isset($_POST['subject']) && isset($_POST['msg']))
    {
        if(!isset($_SESSION['id'])){
            echo('<script type="text/javascript">window.onload=function(){alertify.alert("Please Login/Register Before!!");}</script>');
            echo('<script>setTimeout(function(){
                    window.location.href="index.php";
            },3000);</script>');
            die();
        }
        else{
            $srt=$pdo->prepare("INSERT IGNORE INTO enquiries(e_mail,subject,message,status) VALUES (:pr1,:pr2,:pr3,'UNSOLVED');");
            $srt->execute(array(':pr1'=>$_POST['umail'],':pr2'=>$_POST['subject'],':pr3'=>$_POST['msg']));
        }
    }*/
    $stmt=$pdo->prepare("SELECT * FROM packages;");
    $stmt->execute();
    $ans=$stmt->fetch(PDO::FETCH_ASSOC);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anokha Bharat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="alert/alertify.min.js"></script>
    <link rel="stylesheet" href="alert/alertify.core.css"/>
    <link rel="stylesheet" href="alert/alertify.default.css" id="toggleCSS" />
</head>    
<body data-spy="scroll" data-target="#navbarResponsive">
<!----Start Home Section --->
<section>
<div id="home">
<!------Navigation----->
<?php require "navbar.php"?>

<!---------Start Image slider------->

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="6000">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <!---Slide-1-->
        <div class="carousel-item active" style="background-image: url(img/homenaga.jpg)">
            <div class="carousel-caption text-center"><h1>Welcome to India</h1>
            <h2>Come,Explore the Undiscovered parts of India</h2>
            <a class="btn btn-outline-light btn-lg" href="#packages">Start Exploring</a>
            </div>
        </div>
        <!----Slider2----->
        <div class="carousel-item" style="background-image: url(img/homechattis.jpg)">
        </div>
        <!-----Slider3---->
        <div class="carousel-item" style="background-image: url(img/homelakshad.jpg)">
        </div>
    </div>
    <!-----------End of carousel Inner---->
    <a class="carousel-control-prev" href
="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </a>
    <a class="carousel-control-next" href
="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
</div>
</div>
</section>
<!------End Home section-->

<!---Start Destinations---->
<section id="packages">
<div  class="container-fluid" style="padding-top:4px;">
     <div class="features" id="first" style="background-color:rgb(0,0,0,.08);">
         <h1 id="heading_first">Packages--state/ut wise</h1>
     </div>
    <?php 
        $stmt=$pdo->prepare("SELECT * FROM packages;");
        $stmt->execute();
        $ans=$stmt->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($stmt->rowCount() > 0)
        {
        foreach($ans as $result)
        {
            $f1=urlencode($result->package_name);
            $f2=urlencode($result->details_image);
            $f3=urlencode($result->image_desc);
            $str1='place='.$f1.'&image='.$f2.'&about='.$f3;
            $str2='place='.$f1;
        ?>
        <div class="features glow" style="margin-top:1rem;">
          <div class="feature-img">
              <img src="<?php echo($result->package_image);?>">
          </div>
          <div class="feature-info">
             <div class="feature-cost">
                 <span>Rs &nbsp;<?php echo(htmlentities($result->package_price));?></span>
             </div>
              <h1 class="feature-title"><?php echo(htmlentities($result->package_name));?></h1>
              <p class="feature-text"><?php echo(htmlentities($result->package_text));?></p>
              <a class="feature-buttons" href="testing.php?<?php echo(htmlentities($str1));?>">Details</a>
              <a href="book_now.php?<?php echo(htmlentities($str2));?>" class="feature-buttons">Book Now</a>
          </div>
      </div>
    <?php }}?>
</div>
</section>
<!-----End Destinations----->
<!----Review Start------>
<section class="user_feedback" id="review">
<h1>User's Review</h1>
   <div class="container">
       <div class="row">
          <div class="col-md-4">
              <div class="user_review">
                  <p>Anokha Bharat is a trusted and very proffesional tours and travel's company.Being a traveller who like's to explore the off-beat locations,Anokha Bharat helped me to explore unique and undiscovered locations of the Incredible India!Thank You Anokha Bharat for helping me to explore India's true beauty.</p>
                  <h5>Peter Parker</h5>
                  <small>New York,USA</small>
              </div>
              <img src="img/user1.jpg">
          </div>
          <div class="col-md-4">
              <div class="user_review">
                  <p>Last Summer I visited India and with the help of Anokha Bharat, I was able to discover the soul of India.I really enjoyed the trip and am looking forward to another trip with Anokha Bharat next Winter:)</p>
                  <h5>Martha Rodriguez</h5>
                  <small>Toronto,Canada</small>
              </div>
              <img src="img/user2.jpg">
          </div>
          <div class="col-md-4">
              <div class="user_review">
                  <p>I travelled to 3 places Nagaland,Jharkhand and Andhra Pradesh with Anokha Bharat and I must say this is by far the best tour company at present in India because of it's high quality service and affordable rates.I would recommend every one who wishes to explore India to do so with Anokha Bharat!!</p>
                  <h5>Shivang Gupta</h5>
                  <small>New Delhi,India</small>
              </div>
              <img src="img/user3.jpg">
          </div> 
       </div>
    </div>
</section>
<!-----End review---------------->
<!-----Start Contacts-------->
<section>
<div id="contact" class="offset">
    
<footer>
    <div class="narrow text-center row">
        <div class="col-md-5 col-sm-12">
            <img src="img/logo.png" alt="logo">
            <p id="ideology">We believe that one is capable of finding true self only when he/she travels to undiscovered places.</p>
            <p class ="quotes">"Once a year, go someplace you've never been before."<span>--Dalai Lama</span></p>
            <p class ="quotes">"Travel makes one modest,you see what a tiny place you occupy in this world."<span>--Confucius</span></p>
        </div>
        <div class="col-md-5 col-sm-12">
            <div class="card">
                <div class="card-title">
                    <h2 class="text-center py2">Contact Us</h2>
                    <hr>
                </div>
                <div class="card-body">
                    <form method="post" id="enqform" autocomplete="off">
                        <!--<input type="text" name="uname" placeholder="User Name" class="form-control mb-2"><br>-->
                        <input type="email" name="umail" placeholder="User Email" class="form-control mb-2"><br>
                        <input type="text" name="subject" placeholder="Subject" class="form-control mb-2"><br>
                        <textarea name="msg" placeholder="Write Message" class="form-control"></textarea><br>
                        <input type="submit"  class="btn btn-success" name="btn_send" value="SEND">
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <p class="copyright text-muted">Copyright &copy;Anokha Bharat----created by Rishik Varma</p>
        <hr>
    </div>
</footer>
</div>
</section>
<!-----End contacts---------->

<!-------Script Source Files ---->
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="js/script.js"></script>
</body>
</html>