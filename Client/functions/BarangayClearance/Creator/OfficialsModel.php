
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
<?php
$capitan = "2";
$sql1 = "SELECT res_lName, res_fName, res_mName FROM resident_detail
          WHERE position_ID='$capitan';";

$result1 = mysqli_query($db, $sql1);
$resultCheck1 = mysqli_num_rows($result1);

if($resultCheck1 > 0){
    while($row1 = mysqli_fetch_assoc($result1)){
        $capfName = $row1['res_fName'];
        $capmInitial = $row1['res_mName'];
        $caplName = $row1['res_lName'];
    }
}
?>
<?php
$new = "8";
$sql1 = "SELECT res_lName, res_fName, res_mName FROM resident_detail
          WHERE position_ID='$new';";

$result1 = mysqli_query($db, $sql1);
$resultCheck1 = mysqli_num_rows($result1);

if($resultCheck1 > 0){
    while($row1 = mysqli_fetch_assoc($result1)){
        $newfName = $row1['res_fName'];
        $newmInitial = $row1['res_mName'];
        $newlName = $row1['res_lName'];
    }
}
?>



<?php
$pNc = "9";
include_once '../connection.php';
$sql2 = "SELECT rd.res_fName,rd.res_mName,rd.res_lName,rs.suffix,rp.position_Name,
  (IF(bod.commitee_assignID IS NOT NULL , (SELECT position_Name
    FROM ref_position WHERE position_ID = bod.commitee_assignID), '')) as Kagawad_committee
    FROM brgy_official_detail bod INNER JOIN resident_detail rd ON bod.res_ID = rd.res_ID
    LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID
    INNER JOIN ref_position rp ON rd.position_ID = rp.position_ID WHERE bod.commitee_assignID='$pNc'";

$result2 = mysqli_query($db, $sql2);
$resultCheck2 = mysqli_num_rows($result2);

if($resultCheck2 > 0){
    while($row2 = mysqli_fetch_assoc($result2)){
        $pNcfName = $row2['res_fName'];
        $pNcmInitial = $row2['res_mName'];
        $pNclName = $row2['res_lName'];
    }
}
?>
<?php
$wfy = "12";
include_once '../connection.php';
$sql3 = "SELECT rd.res_fName,rd.res_mName,rd.res_lName,rs.suffix,rp.position_Name,
  (IF(bod.commitee_assignID IS NOT NULL , (SELECT position_Name
    FROM ref_position WHERE position_ID = bod.commitee_assignID), '')) as Kagawad_committee
    FROM brgy_official_detail bod INNER JOIN resident_detail rd ON bod.res_ID = rd.res_ID
    LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID
    INNER JOIN ref_position rp ON rd.position_ID = rp.position_ID WHERE bod.commitee_assignID='$wfy';";

$result3 = mysqli_query($db, $sql3);
$resultCheck3 = mysqli_num_rows($result3);

if($resultCheck3 > 0){
    while($row3 = mysqli_fetch_assoc($result3)){
        $wfyfName = $row3['res_fName'];
        $wfymInitial = $row3['res_mName'];
        $wfylName = $row3['res_lName'];
    }
}
?>
<?php
$hea = "13";
include_once '../connection.php';
$sql4 = "SELECT rd.res_fName,rd.res_mName,rd.res_lName,rs.suffix,rp.position_Name,
  (IF(bod.commitee_assignID IS NOT NULL , (SELECT position_Name
    FROM ref_position WHERE position_ID = bod.commitee_assignID), '')) as Kagawad_committee
    FROM brgy_official_detail bod INNER JOIN resident_detail rd ON bod.res_ID = rd.res_ID
    LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID
    INNER JOIN ref_position rp ON rd.position_ID = rp.position_ID WHERE bod.commitee_assignID='$hea';";

$result4 = mysqli_query($db, $sql4);
$resultCheck4 = mysqli_num_rows($result4);

if($resultCheck4 > 0){
    while($row4 = mysqli_fetch_assoc($result4)){
        $heafName = $row4['res_fName'];
        $heamInitial = $row4['res_mName'];
        $healName = $row4['res_lName'];
    }
}
?>
<?php
$wam = "10";
include_once '../connection.php';
$sql5 = "SELECT rd.res_fName,rd.res_mName,rd.res_lName,rs.suffix,rp.position_Name,
  (IF(bod.commitee_assignID IS NOT NULL , (SELECT position_Name
    FROM ref_position WHERE position_ID = bod.commitee_assignID), '')) as Kagawad_committee
    FROM brgy_official_detail bod INNER JOIN resident_detail rd ON bod.res_ID = rd.res_ID
    LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID
    INNER JOIN ref_position rp ON rd.position_ID = rp.position_ID WHERE bod.commitee_assignID='$wam';";
$result5 = mysqli_query($db, $sql5);
$resultCheck5 = mysqli_num_rows($result5);

if($resultCheck5 > 0){
    while($row5 = mysqli_fetch_assoc($result5)){
        $wamfName = $row5['res_fName'];
        $wamInitial = $row5['res_mName'];
        $wamlName = $row5['res_lName'];
    }
}
?>
<?php

$agri = "11";
include_once '../connection.php';
$sql6 = "SELECT rd.res_fName,rd.res_mName,rd.res_lName,rs.suffix,rp.position_Name,
  (IF(bod.commitee_assignID IS NOT NULL , (SELECT position_Name
    FROM ref_position WHERE position_ID = bod.commitee_assignID), '')) as Kagawad_committee
    FROM brgy_official_detail bod INNER JOIN resident_detail rd ON bod.res_ID = rd.res_ID
    LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID
    INNER JOIN ref_position rp ON rd.position_ID = rp.position_ID WHERE bod.commitee_assignID='$agri';";

$result6 = mysqli_query($db, $sql6);
$resultCheck6 = mysqli_num_rows($result6);

if($resultCheck6 > 0){
    while($row6 = mysqli_fetch_assoc($result6)){
        $agrifName = $row6['res_fName'];
        $agrimInitial = $row6['res_mName'];
        $agrilName = $row6['res_lName'];
    }
}
?>

<?php
$apro = "14";
include_once '../connection.php';
$sql7 = "SELECT rd.res_fName,rd.res_mName,rd.res_lName,rs.suffix,rp.position_Name,
  (IF(bod.commitee_assignID IS NOT NULL , (SELECT position_Name
    FROM ref_position WHERE position_ID = bod.commitee_assignID), '')) as Kagawad_committee
    FROM brgy_official_detail bod INNER JOIN resident_detail rd ON bod.res_ID = rd.res_ID
    LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID
    INNER JOIN ref_position rp ON rd.position_ID = rp.position_ID WHERE bod.commitee_assignID='$apro';";

$result7 = mysqli_query($db, $sql7);
$resultCheck7 = mysqli_num_rows($result7);

if($resultCheck7 > 0){
    while($row7 = mysqli_fetch_assoc($result7)){
        $aprofName = $row7['res_fName'];
        $apromInitial = $row7['res_mName'];
        $aprolName = $row7['res_lName'];
    }
}
?>
<?php
$infra = "15";
include_once '../connection.php';
$sql8 = "SELECT rd.res_fName,rd.res_mName,rd.res_lName,rs.suffix,rp.position_Name,
  (IF(bod.commitee_assignID IS NOT NULL , (SELECT position_Name
    FROM ref_position WHERE position_ID = bod.commitee_assignID), '')) as Kagawad_committee
    FROM brgy_official_detail bod INNER JOIN resident_detail rd ON bod.res_ID = rd.res_ID
    LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID
    INNER JOIN ref_position rp ON rd.position_ID = rp.position_ID WHERE bod.commitee_assignID='$infra';";

$result8 = mysqli_query($db, $sql8);
$resultCheck8 = mysqli_num_rows($result8);

if($resultCheck8 > 0){
    while($row8 = mysqli_fetch_assoc($result8)){
        $infrafName = $row8['res_fName'];
        $inframInitial = $row8['res_mName'];
        $infralName = $row8['res_lName'];
    }
}
?>
<?php
$sec = "3";
include_once '../connection.php';
$sql9 = "SELECT res_lName, res_fName, res_mName FROM resident_detail
          WHERE position_ID='$sec';";

$result9 = mysqli_query($db, $sql9);
$resultCheck9 = mysqli_num_rows($result9);

if($resultCheck9 > 0){
    while($row9 = mysqli_fetch_assoc($result9)){
        $secfName = $row9['res_fName'];
        $secmInitial = $row9['res_mName'];
        $seclName = $row9['res_lName'];
    }
}
?>
<?php
$tres = "4";
$sql10 = "SELECT res_lName, res_fName, res_mName FROM resident_detail
          WHERE position_ID='$tres'";

$result10 = mysqli_query($db, $sql10);
$resultCheck10 = mysqli_num_rows($result10);

if($resultCheck10 > 0){
    while($row10 = mysqli_fetch_assoc($result10)){
        $tresfName = $row10['res_fName'];
        $tresmInitial = $row10['res_mName'];
        $treslName = $row10['res_lName'];

    }
}
?>


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

