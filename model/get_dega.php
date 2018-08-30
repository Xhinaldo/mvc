<?php

	require_once('../config.php');
	require_once('connectdb.php');
	$DB = new DBPDO();

	$fakulteti = $_POST['fakulteti'];


	$sql_fakul = "SELECT id FROM fakultetet WHERE id=?";
	$result_fakul = $DB->execute($sql_fakul,array($fakulteti));
	$row_fakul = $result_fakul->fetch(PDO::FETCH_ASSOC);
	if(count($row_fakul)>0){
		$id = $row_fakul['id'];
		$sql_dega = "SELECT id,name FROM deget WHERE fakulteti_id=?";
		$result_dega = $DB->execute($sql_dega,array($fakulteti));
		$row_dega = $result_dega->fetchAll(PDO::FETCH_ASSOC);
		$deget = array();
		foreach ($row_dega as $index) {
			array_push($deget, $index);
		}			
		echo json_encode(array('deget' => $deget));
		
	}
		
?>