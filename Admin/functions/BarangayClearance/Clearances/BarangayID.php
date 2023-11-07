<?php
include_once '../connection.php';
$sql_Problema = "SELECT brgy_Name, citymun_Name, province_Name
                  FROM brgy_address_info";
$result_Problema = mysqli_query($db, $sql_Problema);
$resultCheck_Problema = mysqli_num_rows($result_Problema);

if($resultCheck_Problema >0){
    while($row = mysqli_fetch_assoc($result_Problema)){
        $head_brgy_Name = $row['brgy_Name'];
        $citymun_disp = $row['citymun_Name'];
        $province_disp =$row ['province_Name'];
    }
}
?>
<?php
@$Grantedto = $_GET['Grantedto'];
@$Addresss = $_GET['Addresss'];
@$Purpose = $_GET['Purpose'];
$id = $_GET['id'];
include_once "OfficialsModel.php";
$sql_Problema = "SELECT * FROM `users` where id=".$_GET['id'].";";
$result_Problema = mysqli_query($db, $sql_Problema);
$resultCheck_Problema = mysqli_num_rows($result_Problema);
if($resultCheck_Problema >0){
    while($row = mysqli_fetch_assoc($result_Problema)){
        $fullAddress = $row['housenumber'] . ' ' . $row['street'] . ', ' . $row['barangay'] . ', ' . $row['city'] . ', ' . $row['state'] . ' ' . $row['zip'];
$fullName = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];
$phone = $row['phone'];
$dob = $row['dob'];
    }
}


?>

<!--logo-->

<!DOCTYPE>
<html>
<header>
    <title>Barangay Clearance</title>
    <meta http-equiv="Content-Type" content="text/html" ; charset="utf-8" />
    <script type="text/javascript" src="../js/jspdf.min.js"></script>
    <script type="text/javascript" src="../js/html2canvas.js"></script>
    <script type="text/javascript">
    function genPDF() {
        html2canvas(document.getElementById('main-container')).then(function(canvas) {
            scale: 1;

            var img = canvas.toDataURL('image/png', 1.0);
            if (canvas.width > canvas.height) {
                doc = new jsPDF('l', 'mm', [canvas.width, canvas.height]);
            } else {
                doc = new jsPDF('p', 'mm', [canvas.height, canvas.width]);
            }

            doc.addImage(img, 'JPEG', -4, 20, canvas.width, canvas.height);
            doc.save('BarangayClearance.pdf');
            pdfData = doc.output('blob');
            const formData = new FormData();
            formData.append('pdfdata', pdfData);
            formData.append('Created_at', ' <?php //echo $_GET['created'] ?>');
            formData.append('Res_id', '<?php //echo  $_GET['resId']?>');
            formData.append('signaid', '<?php echo  $_GET['signifu']?>');
            
            formData.append('certids', '<?php echo  $_GET['certid']?>');
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert(xhr.responseText);
                    window.location.href = "../../ServiceRequest/show-request.php";
                }
            };
            xhr.open('POST', 'savepdf.php', true);
            xhr.send(formData);
        });
    }
    </script>
    <style>
    .info {
        color: rgba(29, 33, 36, 0.76);
        background-color: #e7f3fe;
        border-left: 6px solid #2196F3;
    }

    <?php include_once "OfficialsDesign.css";

    ?>
    </style>
</header>

<body>
<style>
  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
</style>
<div class="spinner-overlay">
<div style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.7); display: flex; justify-content: center; align-items: center;">
  <div style="border: 4px solid rgba(255, 255, 255, 0.3);border-top: 4px solid #fbfeff;border-radius: 50%;width: 50px;height: 50px;animation: spin 2s linear infinite;"></div>
</div>
</div>
        <h3><a href="javascript:genPDF();javascript:showSpinner();" data-html2canvas-ignore="true">Approve Clearance</a>
            <h3>


    <div id="main-container">

        <div class="logo-holder">
            <?php
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $resultlogo1['logo_img'] ).'"/>';
        ?>
        </div>

        <div class="header" style='font-family: "Times New Roman", Times, serif;'>
            Republic of the Philippines<br />
            Province of <?php echo $province_disp;?><br />
            <b>CITY OF <?php echo $citymun_disp;?></b><br />

        


        <div class="header tag" style="font-size:25px;margin:0px !important">
            <span id="" style='font-family: "Times New Roman", Times, serif;'>BARANGAY
                <?php echo $head_brgy_Name;?></span><br>
            OFFICE OF THE SANGGUNIANG BARANGAY
        </div>

        <div class="header tag" style="font-size:15px;margin:0px !important ">
            <span id="" style='font-family: "Times New Roman", Times, serif;'>SITIO UPPER STO.NINO BARANGAY STA.
                CRUZ</span>
        </div>
        </div>
        <div class="c-wrapper" style="
    display: flex;
">
            <?php


        ?>
            <div class="content" style="
    width: 70%;
    padding-top:0px;
">
                <div class="header tag1">
                    BARANGAY ID
                </div>

                <div id="par" style='font-family: Arial, Helvetica, sans-serif; font-size:16px;font-weight: 300;'>
                    Please Cut out the ID and have it laminated!<br><br>
                    <?php
                
                $CivilStatus = "single";
                


                ?>
                <style>
                    tr
	{mso-height-source:auto;}
col
	{mso-width-source:auto;}
br
	{mso-data-placement:same-cell;}
.style0
	{mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	white-space:nowrap;
	mso-rotate:0;
	mso-background-source:auto;
	mso-pattern:auto;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	border:none;
	mso-protection:locked visible;
	mso-style-name:Normal;
	mso-style-id:0;}
td
	{mso-style-parent:style0;
	padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border:none;
	mso-background-source:auto;
	mso-pattern:auto;
	mso-protection:locked visible;
	white-space:nowrap;
	mso-rotate:0;}
.xl65
	{mso-style-parent:style0;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;}
.xl66
	{mso-style-parent:style0;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;}
.xl67
	{mso-style-parent:style0;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;}
.xl68
	{mso-style-parent:style0;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;}
.xl69
	{mso-style-parent:style0;
	text-align:center;}
.xl70
	{mso-style-parent:style0;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;}
.xl71
	{mso-style-parent:style0;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;}
.xl72
	{mso-style-parent:style0;
	text-align:center;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;}
.xl73
	{mso-style-parent:style0;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;}
.xl74
	{mso-style-parent:style0;
	text-align:center;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;}
.xl75
	{mso-style-parent:style0;
	text-align:center;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;}
.xl76
	{mso-style-parent:style0;
	text-align:center;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;}
.xl77
	{mso-style-parent:style0;
	text-align:center;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;}
.xl78
	{mso-style-parent:style0;
	text-align:center;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;}
.xl79
	{mso-style-parent:style0;
	text-align:center;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;}
.xl80
	{mso-style-parent:style0;
	text-align:center;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;}
.xl81
	{mso-style-parent:style0;
	text-align:center;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	white-space:normal;}
.xl82
	{mso-style-parent:style0;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;}
.xl83
	{mso-style-parent:style0;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;}
.xl84
	{mso-style-parent:style0;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;}
.xl85
	{mso-style-parent:style0;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;}
.xl86
	{mso-style-parent:style0;
	text-align:center;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;}
.xl87
	{mso-style-parent:style0;
	text-align:center;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;}
.xl88
	{mso-style-parent:style0;
	text-align:center;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;}
.xl89
	{mso-style-parent:style0;
	font-size:8.0pt;
	text-align:center;}
.xl90
	{mso-style-parent:style0;
	font-size:8.0pt;
	text-align:center;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;}
.xl91
	{mso-style-parent:style0;
	font-size:8.0pt;
	text-align:center;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;}
.xl92
	{mso-style-parent:style0;
	font-size:10.0pt;
	font-weight:700;
	text-align:center;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;}
.xl93
	{mso-style-parent:style0;
	font-size:10.0pt;
	font-weight:700;
	text-align:center;}
.xl94
	{mso-style-parent:style0;
	font-size:10.0pt;
	font-weight:700;
	text-align:center;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;}
.xl95
	{mso-style-parent:style0;
	font-size:8.0pt;
	text-align:center;
	vertical-align:top;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;}
.xl96
	{mso-style-parent:style0;
	font-size:8.0pt;
	text-align:center;
	vertical-align:top;}
.xl97
	{mso-style-parent:style0;
	font-size:8.0pt;
	text-align:center;
	vertical-align:top;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;}
.xl98
	{mso-style-parent:style0;
	font-size:16.0pt;
	font-weight:700;
	text-align:center;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	white-space:normal;}
.xl99
	{mso-style-parent:style0;
	font-size:16.0pt;
	font-weight:700;
	text-align:center;
	white-space:normal;}
.xl100
	{mso-style-parent:style0;
	font-size:16.0pt;
	font-weight:700;
	text-align:center;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;
	white-space:normal;}
.xl101
	{mso-style-parent:style0;
	font-size:16.0pt;
	font-weight:700;
	text-align:center;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	white-space:normal;}
.xl102
	{mso-style-parent:style0;
	font-size:16.0pt;
	font-weight:700;
	text-align:center;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	white-space:normal;}
.xl103
	{mso-style-parent:style0;
	font-size:16.0pt;
	font-weight:700;
	text-align:center;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	white-space:normal;}
.xl104
	{mso-style-parent:style0;
	font-size:8.0pt;
	text-align:center;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	white-space:normal;}
.xl105
	{mso-style-parent:style0;
	font-size:8.0pt;
	text-align:center;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	white-space:normal;}
.xl106
	{mso-style-parent:style0;
	font-size:8.0pt;
	text-align:center;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	white-space:normal;}
.xl107
	{mso-style-parent:style0;
	font-size:8.0pt;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;}
.xl108
	{mso-style-parent:style0;
	font-size:8.0pt;
	border:1.0pt solid windowtext;}
.xl109
	{mso-style-parent:style0;
	font-size:8.0pt;
	font-style:italic;
	text-align:center;
	vertical-align:top;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	white-space:normal;}
.xl110
	{mso-style-parent:style0;
	font-size:8.0pt;
	font-style:italic;
	text-align:center;
	vertical-align:top;
	white-space:normal;}
.xl111
	{mso-style-parent:style0;
	font-size:8.0pt;
	font-style:italic;
	text-align:center;
	vertical-align:top;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;
	white-space:normal;}
.xl112
	{mso-style-parent:style0;
	font-weight:700;
	text-align:center;
	vertical-align:top;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;}
.xl113
	{mso-style-parent:style0;
	font-weight:700;
	text-align:center;
	vertical-align:top;}
.xl114
	{mso-style-parent:style0;
	font-weight:700;
	text-align:center;
	vertical-align:top;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;}

                    </style>
                <table border="0" cellpadding="0" cellspacing="0" width="571" style="border-collapse:
 collapse;table-layout:fixed;width:429pt">
 <colgroup><col width="64" style="width:48pt">
 <col width="71" style="mso-width-source:userset;mso-width-alt:2596;width:53pt">
 <col width="64" style="width:48pt">
 <col width="42" style="mso-width-source:userset;mso-width-alt:1536;width:32pt">
 <col width="77" style="mso-width-source:userset;mso-width-alt:2816;width:58pt">
 <col width="76" style="mso-width-source:userset;mso-width-alt:2779;width:57pt">
 <col width="64" span="2" style="width:48pt">
 <col width="49" style="mso-width-source:userset;mso-width-alt:1792;width:37pt">
 </colgroup><tbody><tr height="21" style="height:15.75pt">
  <td height="21" width="64" style="height:15.75pt;width:48pt"></td>
  <td width="71" style="width:53pt"></td>
  <td width="64" style="width:48pt"></td>
  <td width="42" style="width:32pt"></td>
  <td width="77" style="width:58pt"></td>
  <td width="76" style="width:57pt"></td>
  <td width="64" style="width:48pt"></td>
  <td width="64" style="width:48pt"></td>
  <td width="49" style="width:37pt"></td>
 </tr>
 <tr height="15" style="mso-height-source:userset;height:11.25pt">
  
  <td class="xl65">&nbsp;</td>
  <td class="xl66">&nbsp;</td>
  <td class="xl66">&nbsp;</td>
  <td class="xl66">&nbsp;</td>
  <td class="xl65">&nbsp;</td>
  <td class="xl66">&nbsp;</td>
  <td class="xl66">&nbsp;</td>
  <td class="xl67">&nbsp;</td>
 </tr>
 <tr height="12" style="mso-height-source:userset;height:9.0pt">
  
  <td colspan="4" class="xl90" style="border-right:1.0pt solid black">Republic of
  the Philippines</td>
  <td class="xl68" style="border-left:none">&nbsp;</td>
  <td></td>
  <td></td>
  <td class="xl70">&nbsp;</td>
 </tr>
 <tr height="13" style="mso-height-source:userset;height:9.75pt">
  
  <td colspan="4" class="xl90" style="border-right:1.0pt solid black">Province of
  Rizal</td>
  <td colspan="4" class="xl92" style="border-right:1.0pt solid black;border-left:
  none">BARANGAY STA.CRUZ</td>
 </tr>
 <tr height="13" style="mso-height-source:userset;height:9.75pt">
  
  <td colspan="4" class="xl90" style="border-right:1.0pt solid black">City of
  Antipolo</td>
  <td colspan="4" class="xl95" style="border-right:1.0pt solid black;border-left:
  none">SITIO UPPER STO NINO BARANGAY STA CRUZ</td>
 </tr>
 <tr height="17" style="mso-height-source:userset;height:12.75pt">
  
  <td colspan="4" class="xl92" style="border-right:1.0pt solid black">BARANGAY
  STA.CRUZ</td>
  <td class="xl68" style="border-left:none">&nbsp;</td>
  <td></td>
  <td></td>
  <td class="xl70">&nbsp;</td>
 </tr>
 <tr height="19" style="mso-height-source:userset;height:14.25pt">
  
  <td colspan="4" class="xl95" style="border-right:1.0pt solid black">SITIO UPPER
  STO NINO BARANGAY STA CRUZ</td>
  <td class="xl68" style="border-left:none">&nbsp;</td>
  <td></td>
  <td></td>
  <td class="xl70">&nbsp;</td>
 </tr>
 <tr height="20" style="mso-height-source:userset;height:15.0pt">
  
  <td class="xl68">&nbsp;</td>
  <td colspan="2" rowspan="5" class="xl74" style="border-right:1.0pt solid black;
  border-bottom:1.0pt solid black">&nbsp;</td>
  <td></td>
  <td colspan="4" rowspan="4" class="xl109" width="253" style="border-right:1.0pt solid black;
  width:190pt">The bearer is a bonafide Barangay Sta.Cruz resident and
  authorized to transct business with proper authorities in discharge of
  his/her functions. Kindly extend any possible assistance that you<span style="mso-spacerun:yes">&nbsp; </span>can provide to the bearer</td>
 </tr>
 <tr height="20" style="height:15.0pt">
  
  <td class="xl68">&nbsp;</td>
  <td></td>
 </tr>
 <tr height="20" style="height:15.0pt">
  
  <td class="xl68">&nbsp;</td>
  <td></td>
 </tr>
 <tr height="20" style="height:15.0pt">
  
  <td class="xl68">&nbsp;</td>
  <td></td>
 </tr>
 <tr height="28" style="mso-height-source:userset;height:21.0pt">
  
  <td class="xl68">&nbsp;</td>
  <td></td>
  <td class="xl68">&nbsp;</td>
  <td></td>
  <td></td>
  <td class="xl70">&nbsp;</td>
 </tr>
 <tr height="23" style="mso-height-source:userset;height:17.25pt">
  
  <td id="idno" colspan="4" class="xl76" style="border-right:1.0pt solid black">ID NO:<?php echo $id ?></td>
  <td class="xl108" style="border-left:none">Birthdayy</td>
  <td id="dob" colspan="3" class="xl87" style="border-right:1.0pt solid black;border-left:
  none"><?php echo $dob ?></td>
 </tr>
 <tr height="21" style="height:15.75pt">
  
  <td colspan="4" class="xl76" style="border-right:1.0pt solid black">VALID UNTIL: <?php $timestamp = strtotime($datedate);

// Add 1 year to the timestamp
$newTimestamp = strtotime('+1 year', $timestamp);

// Format the new timestamp as yyyy-mm-dd
$newdate = date('Y-m-d', $newTimestamp);

echo $newdate;?></td>
  <td class="xl108" style="border-top:none;border-left:none">Precint No.</td>
  <td colspan="3" class="xl87" style="border-right:1.0pt solid black;border-left:
  none">&nbsp;</td>
 </tr>
 <tr height="21" style="height:15.75pt">
  
  <td class="xl68">&nbsp;</td>
  <td></td>
  <td></td>
  <td></td>
  <td class="xl107">Philhealth No.</td>
  <td></td>
  <td></td>
  <td class="xl70">&nbsp;</td>
 </tr>
 <tr height="29" style="mso-height-source:userset;height:21.75pt">
  
  <td id="grantedto" colspan="4" rowspan="2" class="xl98" width="254" style="border-right:1.0pt solid black;
  border-bottom:1.0pt solid black;width:191pt"><?php echo $fullName ?></td>
  <td colspan="4" class="xl87" style="border-right:1.0pt solid black;border-left:
  none">In case of Emergency, Please Notify:</td>
 </tr>
 <tr height="35" style="mso-height-source:userset;height:26.25pt">
  
  <td colspan="4" class="xl87" style="border-right:1.0pt solid black;border-left:
  none">&nbsp;</td>
 </tr>
 <tr height="21" style="height:15.75pt">
  
  <td class="xl65" style="border-top:none">&nbsp;</td>
  <td colspan="2" class="xl80">NAME</td>
  <td class="xl66" style="border-top:none">&nbsp;</td>
  <td class="xl85">Cp. No.</td>
  <td colspan="3" class="xl87" style="border-right:1.0pt solid black;border-left:
  none">&nbsp;</td>
 </tr>
 <tr height="27" style="mso-height-source:userset;height:20.25pt">
  
  <td class="xl71">&nbsp;</td>
  <td colspan="2" class="xl72">&nbsp;</td>
  <td class="xl73">&nbsp;</td>
  <td class="xl68">&nbsp;</td>
  <td></td>
  <td></td>
  <td class="xl70">&nbsp;</td>
 </tr>
 <tr height="20" style="mso-height-source:userset;height:15.0pt">
  
  <td class="xl65" style="border-top:none">&nbsp;</td>
  <td colspan="2" class="xl81" width="106" style="width:80pt">SIGNATURE</td>
  <td class="xl66" style="border-top:none">&nbsp;</td>
  <td colspan="4" class="xl112" style="border-right:1.0pt solid black">HON. CIRILO
  "BEBOT" TENORIO</td>
 </tr>
 <tr height="35" style="mso-height-source:userset;height:26.25pt">
  
  <td id="address" colspan="4" class="xl104" width="254" style="border-right:1.0pt solid black;
  width:191pt"><?php echo $fullAddress ?></td>
  <td colspan="4" class="xl78" style="border-right:1.0pt solid black;border-left:
  none">PUNONG BARANGAY</td>
 </tr>
 <tr height="18" style="mso-height-source:userset;height:13.5pt">
  
  <td class="xl71">&nbsp;</td>
  <td colspan="2" class="xl86">ADDRESS</td>
  <td class="xl73">&nbsp;</td>
  <td class="xl82" style="border-top:none">&nbsp;</td>
  <td class="xl83" style="border-top:none">&nbsp;</td>
  <td class="xl83" style="border-top:none">&nbsp;</td>
  <td class="xl84" style="border-top:none">&nbsp;</td>
 </tr>
 <!--[if supportMisalignedColumns]-->
 <tr height="0" style="display:none">
  <td width="64" style="width:48pt"></td>
  <td width="71" style="width:53pt"></td>
  <td width="64" style="width:48pt"></td>
  <td width="42" style="width:32pt"></td>
  <td width="77" style="width:58pt"></td>
  <td width="76" style="width:57pt"></td>
  <td width="64" style="width:48pt"></td>
  <td width="64" style="width:48pt"></td>
  <td width="49" style="width:37pt"></td>
 </tr>
 <!--[endif]-->
</tbody></table>


                <br><br><br>
                <br><br><br>

                <div class="ctc">

                    ISSUED ON: <span id="name-input"><?php echo $datedate?></span><br>
                    ISSUED AT: <span
                        id="name-input"><?php echo $head_brgy_Name." ".$citymun_disp.","." ".$province_disp;?></span>.<br>

                </div>
                <div class="puno">
                    <span id="name-input"><?php echo "HON. CIRILO 'BEBOT' TENORIO"?></span><br>
                    &emsp;PUNONG BARANGAY
                </div>
                <!--<div class = "ctrl">Control #: <?php /*echo $ctrlout;*/?>
            </div>-->
                <center>
                    <div class="seal">
                        <i>NOTE: not valid without a seal</i>
                    </div>
                </center>

            </div>
        </div>
    </div>
    <div>


</body>
<script>
     function showSpinner() {
    document.querySelector(".spinner-overlay").style.display = "flex";
  }

  function hideSpinner() {
    document.querySelector(".spinner-overlay").style.display = "none";
  }
hideSpinner();
    </script>
</html>