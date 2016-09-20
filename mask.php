<?php
$mask_ini=parse_ini_file('mask.ini',true);

function mask($table='', $field='', $value=''){
	$mask_ini=$GLOBALS['mask_ini'];
	if(array_key_exists($table,$mask_ini) && array_key_exists($field,$mask_ini[$table]))
		return $mask_ini[$table][$field];
	return $value;
}

#printf(mask('t_user','name','value'));
