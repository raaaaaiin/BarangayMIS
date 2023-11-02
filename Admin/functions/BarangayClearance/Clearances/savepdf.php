<?php
include_once '../connection.php';

// $createdat = trim($_POST['Created_at']);
// $resid = trim($_POST['Res_id']);
$sigfinu = trim($_POST['signaid']);
$target_dir = $_SERVER['DOCUMENT_ROOT'] . '/Public/certs_issued/';

$fileName = date("Y_m_d_His") . rand(0,999999) . ".pdf";

$target_file = $target_dir . $fileName;

 if (!move_uploaded_file($_FILES["pdfdata"]["tmp_name"], $target_file)) {
	echo "Error uploading file";
 	$sql = "UPDATE finance_clearance_issued SET file='', status='Error' WHERE SIGNATURE='$sigfinu'";
 	mysqli_query($db, $sql);

 } else {
 	echo "Clearance has been successfully approved! ";
	 $sql = "UPDATE finance_clearance_issued SET file='$fileName', status='Received' WHERE SIGNATURE='$sigfinu.png'";
	 mysqli_query($db, $sql);
 }
?>