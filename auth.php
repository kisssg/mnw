<?php
$auth_ini=parse_ini_file('auth.ini',true);

function auth_exist_user_table($user='', $table='') {
	$auth_ini=$GLOBALS['auth_ini'];
	return array_key_exists($user, $auth_ini) && array_key_exists($table,$auth_ini[$user]);
}

function auth_query_user($user='') {
	$auth_ini=$GLOBALS['auth_ini'];
	return array_key_exists($user, $auth_ini) ? array_keys($auth_ini[$user]) : [];
}

#print_r(query_user('admin'));
