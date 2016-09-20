<?php
require('query.php');
require('mask.php');

function query_with_mask($sql) {
	$mask_data=[];

	$result=query($sql);
	foreach($result['data'] as $row) {
		$mask_row=[];
		foreach($result['fields'] as $field) {
			$mask_row[$field->name]=mask($field->orgtable, $field->orgname, $row[$field->name]);
		}		
		$mask_data[]=$mask_row;
	}

	$result['data']=$mask_data;

	return $result;
}

#print_r(query_with_mask('select * from t_user'));
#print_r(query_with_mask('select 1 '));
