<?php

	require_once('../config.php');
	require_once('connectdb.php');
	$DB = new DBPDO();

	$universiteti = $_POST['universiteti'];


	$sql_uni = "SELECT id FROM universitetet WHERE id=?";
	$result_uni = $DB->execute($sql_uni,array($universiteti));
	$row_uni = $result_uni->fetch(PDO::FETCH_ASSOC);
	if(count($row_uni)>0){
		$id = $row_uni['id'];
		$sql_fakul = "SELECT id,name FROM fakultetet WHERE universiteti_id=?";
		$result_fakul = $DB->execute($sql_fakul,array($universiteti));
		$row_fakul = $result_fakul->fetchAll(PDO::FETCH_ASSOC);
		$fakultetet = array();
		foreach ($row_fakul as $index) {
			array_push($fakultetet, $index);
		}			
		echo json_encode(array('fakultetet' => $fakultetet));
		
	}
?>