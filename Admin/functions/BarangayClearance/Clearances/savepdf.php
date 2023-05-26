<?php
include_once '../connection.php';

// $createdat = trim($_POST['Created_at']);
// $resid = trim($_POST['Res_id']);
$target_dir = $_SERVER['DOCUMENT_ROOT'] . '/BarangayMis/Public/certs_issued/';

$fileName = date("Y_m_d_His") . rand(0,999999) . ".pdf";

$target_file = $target_dir . $fileName;

// if (!move_uploaded_file($_FILES["pdfdata"]["tmp_name"], $target_file)) {
// 	echo "Error uploading file";
// 	$sql = "UPDATE finance_clearance_issued SET file='', status='Error' WHERE res_Id='$resid' and created_at = '$createdat'";
// 	mysqli_query($db, $sql);
// 	var_dump($sql);

// } else {
// 	echo "PDF successfully uploaded to: " . $target_file;
// 	$sql = "UPDATE finance_clearance_issued SET file='$fileName', status='Approved' WHERE res_Id='$resid' and created_at = '$createdat'";
// 	mysqli_query($db, $sql);
// 	var_dump($sql);
// }

?>