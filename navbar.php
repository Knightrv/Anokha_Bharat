<?php
    session_start();
?>
<div class="header">
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-expanded="false">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php#home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php#packages">Packages</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="index.php#review">Review</a>
            <li class="nav-item">
                <a class="nav-link" href="index.php#contact">Contact Us</a>
            </li>
            <?php
                if(!isset($_SESSION['account'])){
                    echo('<li class="nav-item">');
                    echo('<a class="nav-link" href="userlogin.php">Signup/Login</a>');
                    echo('</li>');
                }
                else{
                    echo('<li class="nav-item">');
                    echo('<a class="nav-link" href="userpage.php">'.$_SESSION['account'].'</a>');
                    echo('</li>');
                    echo('<li class="nav-item">');
                    echo('<a class="nav-link" href="userlogout.php">Logout</a>');
                    echo('</li>');
                }
            ?>
            </li>
        </ul>
    </div>
</nav>
</div>