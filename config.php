<?php
 session_start();
    require_once("GoogleAPI/vendor/autoload.php");
    $gClient = new Google_Client();
    $gClient->setClientId("223495635427-un4v8fptkcd4f128nrkre116rug1dbci.apps.googleusercontent.com");
    $gClient->setClientSecret("8vPHvc0SVRxL7Hk-DOVaZikj");
    $gClient->setApplicationName("Anokha Bharat");
    $gClient->setRedirectUri("http://localhost:8080/project/g-callback.php");
    $gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
        