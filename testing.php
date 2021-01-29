<?php
    session_start();
    error_reporting(0);
    unset($_SESSION['t_mail']);
    unset($_SESSION['name']);
    unset($_SESSION['persons']);
    unset($_SESSION['to_date']);
    unset($_SESSION['from_date']);
    unset($_SESSION['pid']);
    unset($_SESSION['place']);
    unset($_SESSION['image_url']);
    unset($_SESSION['image_name']);
    $_SESSION['place']=$_GET['place'];
    $_SESSION['image_url']=$_GET['image'];
    $_SESSION['image_name']=$_GET['about'];
    require_once "pdo.php";

?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anokha Bharat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<?php require "navbar.php";?>
    <div class="jumbotron container-fluid" id="backend" style="background-image: url(<?php echo($_SESSION['image_url']);?>)">
        <h1 id="placehead"><?php echo($_SESSION['place']);?></h1>
        <h5 id="name"><?php echo($_SESSION['image_name']);?></h5>
    </div>
    <div class="container-fluid" id="content">
        <div class="Off-beat">
            <h1>Off-beat places to visit</h1>
            <ul>
            <?php
            $pl=$pdo->prepare("SELECT * FROM details WHERE package_name=:pls;");
            $pl->execute(array(':pls'=>$_SESSION['place']));
            $awd=$pl->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($pl->rowCount() > 0)
            {
            foreach($awd as $pwd)
            {   	?>
                <li>
                    <h3><?php echo(htmlentities($pwd->place_title));?></h3>
                    <p><?php echo(htmlentities($pwd->description));?></p>
                </li>

            <?php }}?>
            </ul>
        </div>
        <div id="tourism">
           <?php $s1=urlencode($_SESSION['place']);
                 $fr1='place='.$s1;?>
            <h1><a href="book_now.php?<?php echo(htmlentities($fr1));?>">Book <?php echo($_SESSION['place']);?> Package here: </a></h1>
            <!--<p>For more information on how to reach and hotel booking <a href="https://lakshadweep.gov.in/tourism/" target="_blank">click here</a> and <a href="https://www.travelogyindia.com/lakshadweep/how-to-reach-lakshadweep.html" target="_blank">here.</a></p>-->
        </div>
        <hr>
        <p class="copyright text-muted">Copyright &copy;Anokha Bharat----created by Rishik Varma</p>
        <hr>
    </div>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="js/script.js"></script>
</body>
</html>