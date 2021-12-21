<?php
include ('./include/conf.php');
include ('./include/functions.php');

if($_POST['type'] == 'getIMDB'){
	$row_num = $_POST['row_num'];
	$value = $_POST['name_startsWith'];
	$query = getSelfDB()->query("SELECT c00, $tb_originals.uniqueid_value as uniqueid FROM $tb_originals JOIN $tb_rental ON kwv_originals.uniqueid_value = $tb_rental.uniqueid_value where $tb_rental.stop_date != '' AND c00 LIKE '%".$value."%'")->fetchAll(PDO::FETCH_ASSOC);
	$data = array();

	foreach($query as $row) {
		$value = $row['c00'].'|'.$row['uniqueid'].'|'.$row_num;
		array_push($data, $value);	
	}	

	echo json_encode($data);
}
?>