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
include_once "OfficialsModel.php";



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
            formData.append('signaid', '<?php echo  $_GET['sigfinu']?>');
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

        include_once "OfficialsTable.php";

        ?>
            <div class="content" style="
    width: 70%;
    padding-top:0px;
">
                <div class="header tag1">
                    BARANGAY CLEARANCE
                </div>

                <div id="par" style='font-family: Arial, Helvetica, sans-serif; font-size:16px;font-weight: 300;'>
                    TO WHOM IT MAY CONCERN:<br><br>
                    <?php
                 

                $Age = $_GET['dob'];
                $CivilStatus = "single";
                


                  echo "&nbsp This is to certify that <strong>$Grantedto</strong>, $Age years old, $CivilStatus, with a postal address at $Addresss, is a BONIFIDE RESIDENT of Barangay Sta. Cruz, Antipolo City, known to me, to have a good moral character and reputation in this community. Further certify that he/she is a peace loving and a law abiding citizen and has no derogatory record on file. <br><br>&nbsp This certification is being issued upon the request of <strong>$Grantedto</strong> for the <strong>purpose</strong> of <strong>$Purpose</strong>";
                  ?>
                    <br><br>&nbsp Issued this <span id="name-input"><?php echo $datedate?></span> at <span
                        id="name-input"><?php echo $head_brgy_Name." ".$citymun_disp.",".$province_disp;?></span>.

                </div>


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