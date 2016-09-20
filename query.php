<?php
function query($sql) {
	$mysqli=mysqli_connect('127.0.0.1', 'root', 'Mnw1230op', 'manaowan');

	$result = $mysqli->query($sql);

	$fields = $result->fetch_fields();
	for($data = array (); $row = $result->fetch_assoc(); $data[] = $row);

	$result->free();
	$mysqli->close();	

	return [ 'fields' => $fields, 'data' => $data ];
}

#print_r(query('select id, name from t_user'));
