<?php
    //session_start();
    require_once("config.php");
    unset($_SESSION['access_token']);
    $gClient->revokeToken();
    session_destroy();
    echo('<script>location.href="index.php"</script>');
?>