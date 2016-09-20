<?php
require('filter.php');

$username=$_SESSION['login'];

require('auth.php');
$data=auth_query_user($username);
foreach($data as $table) {
	printf($table.'<br>');
}
