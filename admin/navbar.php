<div class="header">
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="index.php"><img src="../img/logo.png" alt="logo" class="img-fluid">&nbsp&nbsp<span id="nav-head">Anokha Bharat Management System</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-expanded="false">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <?php
                if(!isset($_SESSION['admin'])){
                    echo('<li class="nav-item">');
                    echo('<a class="nav-link" href="adminlogin.php">Login</a>');
                    echo('</li>');
                }
                else{
                    echo('<li class="nav-item">');
                    echo('<a class="nav-link" href="#">'.$_SESSION['admin'].'</a>');
                    echo('</li>');
                    echo('<li class="nav-item">');
                    echo('<a class="nav-link" href="adminlogout.php">Logout</a>');
                    echo('</li>');
                }
            ?>
        </ul>
    </div>
</nav>
</div>