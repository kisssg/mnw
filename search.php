<?php
require('query_with_mask.php');
require('filter.php');

$sql=$_POST['sql'];
require('check_sql.php');

$result_explain=query_with_mask('explain '.$sql);
if($result_explain['data'][0]['rows'] > 20) {
	#printf('<script language=javascript>alert("查询数据过多，只显示20条。如有需求，请用导出。");</script>');
	$sql='select * from ('.$sql.') ___ limit 20';
}

$result=query_with_mask($sql);

$username=$_SESSION['login'];
require('auth.php');
foreach($result['fields'] as $field) {
	if($field->orgtable && !auth_exist_user_table($username, $field->orgtable)) {
		printf('<script language=javascript>alert("没有权限：'.$field->orgtable.'");</script>');
		exit;
	}
}

printf('<table border=1 cellspacing=0 cellpadding=0>');

printf('<tr>');
foreach($result['fields'] as $field) {
	printf('<td>'.$field->name.'</td>');
}
printf('</tr>');

foreach($result['data'] as $row) {
	printf('<tr>');
	foreach($result['fields'] as $field) {
		printf('<td>'.$row[$field->name].'</td>');
	}
	printf('</tr>');
}
printf('</table>');
