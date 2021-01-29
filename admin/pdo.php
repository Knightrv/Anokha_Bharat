<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=anokha_bharat', 'rvm', 'zap');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>