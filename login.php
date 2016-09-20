<?php
$user_ini=parse_ini_file('login.ini');

$username=$_POST['username'];
$password=$_POST['password'];

session_start();
if( array_key_exists($username, $user_ini) && $password == $user_ini[$username]) {
	Header('Location: search.html');
	$_SESSION['login']=$username;
} else {
	Header('Location: /');
	unset($_SESSION['login']);
}
