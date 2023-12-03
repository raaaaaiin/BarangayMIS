<?php
include_once '../connection.php';

// $createdat = trim($_POST['Created_at']);
// $resid = trim($_POST['Res_id']);
$sigfinu = trim($_POST['signaid']);
$certid = $_POST['certids'];
$target_dir = $_SERVER['DOCUMENT_ROOT'] . '/Public/certs_issued/';

$fileName = date("Y_m_d_His") . rand(0,999999) . ".pdf";

$target_file = $target_dir . $fileName;

 if (!move_uploaded_file($_FILES["pdfdata"]["tmp_name"], $target_file)) {
	echo "Error uploading file";
 	$sql = "UPDATE finance_clearance_issued SET file='', status='Error' WHERE SIGNATURE='$sigfinu'";
 	mysqli_query($db, $sql);

 } else {
 	echo "Clearance has been successfully approved! ";
	 $sql = "UPDATE finance_clearance_issued SET file='$fileName', status='Approved' WHERE id='$certid'";
	 $sqlisms = "INSERT INTO sms_messages (phone_number, message_content, send_date, sent_date, active_status)
	 SELECT fci.phone AS phone_number,
			'Your Certificate is approved, please pay us a visit to claim your certs\n\Sincerely, Sitio Igiban Services' AS message_content,
			NOW() AS send_date,
			NULL AS sent_date,
			0 AS active_status
	 FROM finance_clearance_issued fci
	 WHERE fci.id = $certid;
	 ";
	 
	 mysqli_query($db, $sqlisms);
	 mysqli_query($db, $sql);
 }
?>