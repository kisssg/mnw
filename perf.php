<?php
require('query_with_mask.php');
function explain_rows($sql) {
	if(!$sql) return []; 
	$result=query_with_mask('explain '.$sql);
	return isset($result['data'][0]['rows']) ? $result['data'][0]['rows'] : 0;
}

#print_r(explain_rows('select 1'));
#print_r(explain_rows('select 1 from t_user'));
#print_r(explain_rows('select 1 from t_user')>100);
