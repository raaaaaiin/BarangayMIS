
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
include_once "OfficialsModel.php";
?>

<!--logo-->

<!DOCTYPE>
<html>
<header>
    <title>Barangay Clearance</title>
    <meta http-equiv="Content-Type" content ="text/html"; charset="utf-8" />
    <script type="text/javascript" src="../js/jspdf.min.js"></script>
    <script type="text/javascript" src="../js/html2canvas.js"></script>
    <script type="text/javascript">
        function genPDF() {
           
        }
    </script>
    <style> .info {
        color: rgba(29, 33, 36, 0.76);
        background-color: #e7f3fe;
        border-left: 6px solid #2196F3;
    }

    <?php

    include_once "OfficialsDesign.css";

    ?>

    </style>
</header>
<body>


<div id="main-container" style="
    overflow-x: hidden;
    background-color: white;
    min-width: 850px;
">
    <div class="logo-holder">
        <?php
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $resultlogo['logo_img'] ).'"/>';
        ?>
    </div>

    <div class="logo-holder1">
        <?php
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $resultlogo1['logo_img'] ).'"/>';
        ?>
    </div>

    <div class="header" style='font-family: "Times New Roman", Times, serif;'>
        Republic of the Philippines<br/>
        Province of <?php echo $province_disp;?><br/>
        <b>CITY OF <?php echo $citymun_disp;?></b><br/>

    </div>

    <div class="header tag" style="font-size:25px;">
        <span id="" style='font-family: "Times New Roman", Times, serif;'>BARANGAY <?php echo $head_brgy_Name;?></span><br>
        OFFICE OF THE SANGGUNIANG BARANGAY
    </div>

    <div class="c-wrapper" style="
    display: flex;
">
        <?php

        include_once "OfficialsTable.php";

        ?>
        <div class="content" style="
    width: 70%;
    padding-top:0px;
">
           <div id="readerTitle" class="header tag1">
  Title
</div>
<div id="readerContent" style='font-family: Arial, Helvetica, sans-serif; font-size:16px;font-weight: 300;'>
  Paragraph
</div>
<br>
<div style="display: none;" id="issuedtext" style='font-family: Arial, Helvetica, sans-serif; font-size:16px;font-weight: 300;'>
  &emsp;&emsp;&emsp;Issued this <span id="name-input"><?php echo $datedate?></span> at <span id="name-input"><?php echo $head_brgy_Name." ".$citymun_disp.",".$province_disp;?></span>.
</div>
<br>
<div style="display: none;" id="Signa" class="signature signline center margint120">APPLICANT'S SIGNATURE</div>
<div style="display: none;" id="thumbmark" class="thumb-container" style="display:flex;flex-direction: column;align-items: center;">
  <div id="thumb">
  </div>
  <div id="thumb-caption" class="center" style="order: 2;">
    Right Thumb Mark
  </div>
</div>
<br><br><br>
<div class="ctc">
  <div style="display: none;" id="issuedon">ISSUED ON: <span id="name-input"><?php echo $datedate?></span><br>
  </div>
  <div style="display: none;" id="issuedat">ISSUED AT: <span id="name-input"><?php echo $head_brgy_Name." ".$citymun_disp.","." ".$province_disp;?></span>.<br>
  </div>
</div>
<br><br>
<div style="display: none;" id="puno" class="puno">
  <span id="name-input"><?php echo $capfName." ".$capmInitial."."." ".$caplName;?></span><br>
  &emsp;PUNONG BARANGAY
</div>
<!--<div class = "ctrl">Control #: <?php /*echo $ctrlout;*/?>
</div>-->
<center>
  <div style="display: none;" id="seal"; class="seal">
    <i>NOTE: not valid without a seal</i>
  </div>
</center>
</div>
    </div>
</div>



</body>
<h3><a href="javascript:genPDF();" data-html2canvas-ignore="true">Approve and Download PDF</a><h3>
</html>