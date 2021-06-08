<?php 
	include("system/connection.php");

	if ($_GET['data'] == 'attendance') {
		$sql = "SELECT * FROM attendance where id_user = '".$_GET['id_user']."' AND attendance_status = 1 ORDER BY id_attendance DESC LIMIT 1";
    	$result = $connection->query($sql);
     	$hasil = $result->fetch_assoc();
     	
     	echo json_encode($hasil);
	}
 ?>