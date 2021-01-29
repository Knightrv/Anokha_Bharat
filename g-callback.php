<?php 
require_once("config.php");
require_once("pdo.php");
if (isset($_SESSION['access_token']))
		$gClient->setAccessToken($_SESSION['access_token']);
	else if (isset($_GET['code'])) {
		$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
		$_SESSION['access_token'] = $token;
	} else {
		header('Location: userlogin.php');
		exit();
	}
//session_start();
$oAuth=new Google_Service_Oauth2($gClient);
$userdata=$oAuth->userinfo_v2_me->get();


$_SESSION['account']=$userdata['givenName'];
$mail_id=$userdata['email'];


$ins=$pdo->prepare("INSERT IGNORE INTO users(user_name,password,e_mail) VALUES (:pl1,'abcd',:pl3)");
$ins->execute(array(':pl1'=>htmlentities($_SESSION['account']),':pl3'=>htmlentities($mail_id)));

$otp=$pdo->prepare("SELECT * FROM users WHERE e_mail=:email");
$otp->execute(array(':email'=>htmlentities($mail_id)));
$rowd=$otp->fetch(PDO::FETCH_ASSOC);
//$_SESSION['account']=htmlentities($rowd['user_name']);
$_SESSION['success']="success";
$_SESSION['id']=$rowd['user_id'];

header('Location: index.php');
exit();
?>