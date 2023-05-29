
<?php

$logoBarangay="Barangay Logo";
$sqllogo = "SELECT * FROM ref_logo WHERE logo_Name='$logoBarangay';";
$sth = mysqli_query($db, $sqllogo);
$resultlogo=mysqli_fetch_array($sth);
?>
<?php
$logoMunicipal="Municipal Logo";
$sqllogo1 = "SELECT * FROM ref_logo WHERE logo_Name='$logoMunicipal';";
$sth1 = mysqli_query($db, $sqllogo1);
$resultlogo1=mysqli_fetch_array($sth1);
?>
    <!--end of logo-->

    <!--headers and officials-->


    <!--end of header and display officials-->

    <!--for control #-->
<?php

?>
    <!--end control #-->
<?php
$ap = date_default_timezone_set('Asia/Manila');
date_default_timezone_set('Asia/Manila');
$datedate = date('Y-m-d H:i:s');


?>

