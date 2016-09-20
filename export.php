<?php
require('filter.php');

$sql=$_POST['sql_export'];
require('check_sql.php');

require('query_with_mask.php');
$result=query_with_mask($sql);

header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment;filename=export.csv");

$title=[];
foreach($result['fields'] as $field) {
	$title[]='"'.str_replace('"','""',$field->name).'"';
}
printf(implode(',', $title).PHP_EOL);

$f='';
foreach($result['data'] as $row){
	$line=[];
	foreach($result['fields'] as $field) {
		$line[]='"'.str_replace('"','""',$row[$field->name]).'"';
	}
	$f.=implode(',', $line).PHP_EOL; 
}
printf($f);

