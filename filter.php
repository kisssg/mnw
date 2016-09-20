<?php
session_start();
if(!isset($_SESSION['login'])) {
	echo("<script language='javascript'>window.top.location.href='/'</script>");
	exit;
}
