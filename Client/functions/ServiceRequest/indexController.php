<?php
session_start();
include "../../../db.php";
$s1 = "";
$s2 = "";
$s3 = "";
$data = array();

    

    
$dob = $_SESSION["user_info"]["dob"];
    $birthdate = new DateTime($dob);
    $currentDate = new DateTime();
    $age = $currentDate->diff($birthdate)->y;
if (isset($_POST['sub'])) {
    $signatureImageData = $_FILES["signatureImageData"];
    $signatureFilenameOrig = "signature_" . time();
    $signatureFilename = $signatureFilenameOrig . ".png";
    $signatureFilePath = "../../../Public/signatures/" . $signatureFilename;
    
    if ($signatureImageData["error"] === UPLOAD_ERR_OK) {
        // Move the uploaded image to the desired location
        if (move_uploaded_file($signatureImageData["tmp_name"], $signatureFilePath)) {
            // File upload and move succeeded
            // You can add additional actions here if needed
        } else {
            // File move failed
            // Handle the error as needed
        }
    } else {
        // File upload failed
        // Handle the error as needed
    }

    $var_forms = $_POST['purposecert'];
    $resid = $_SESSION['user_info']['lastname'] . " " . $_SESSION['user_info']['firstname'] . " " . $_SESSION['user_info']['middlename'];
    $file = "No Remarks Yet.";
    
    $type = $var_forms;
    $issued_id = $_SESSION['id'];
    $created_at = date("Y-m-d H:i:s");
    if ($_POST["purposepick"] == "Other") {
        $Purpose = $_POST["otherPurpose"];
    } else {
        $Purpose = $_POST["purposepick"];
    }
    if ($var_forms == "Barangay Clearance") {
        $Grantedto = $_SESSION['user_info']['lastname'] . " " . $_SESSION['user_info']['firstname'] . " " . $_SESSION['user_info']['middlename'];
        $Addresss = $_SESSION["user_info"]["housenumber"] . ", " . $_SESSION["user_info"]["street"] . ", " . $_SESSION["user_info"]["barangay"] . ", " . $_SESSION["user_info"]["city"] . ", " . $_SESSION["user_info"]["state"] . ", " . $_SESSION["user_info"]["zip"];
       
        $loc = "Location: Clearances/BarangayClearance.php?Grantedto=$Grantedto&Addresss=$Addresss&Purpose=$Purpose";
        $data = array(
            'Grantedto' => $Grantedto,
            'Addresss' => $Addresss,
            'Purpose' => $Purpose
        );
    } else if ($var_forms == "Barangay Certificate of Indigency") {
        $Grantedto = $_SESSION['user_info']['lastname'] . " " . $_SESSION['user_info']['firstname'] . " " . $_SESSION['user_info']['middlename'];
        $Addresss = $_SESSION["user_info"]["housenumber"] . ", " . $_SESSION["user_info"]["street"] . ", " . $_SESSION["user_info"]["barangay"] . ", " . $_SESSION["user_info"]["city"] . ", " . $_SESSION["user_info"]["state"] . ", " . $_SESSION["user_info"]["zip"];
     
        $loc = "Location: Clearances/BarangayClearanceIndigen.php?Grantedto=$Grantedto&Addresss=$Addresss&Purpose=$Purpose";
        $data = array(
            'Grantedto' => $Grantedto,
            'Addresss' => $Addresss,
            'Purpose' => $Purpose
        );
    }else if ($var_forms == "Barangay ID") {
        $Grantedto = $_SESSION['user_info']['lastname'] . " " . $_SESSION['user_info']['firstname'] . " " . $_SESSION['user_info']['middlename'];
        $Addresss = $_SESSION["user_info"]["housenumber"] . ", " . $_SESSION["user_info"]["street"] . ", " . $_SESSION["user_info"]["barangay"] . ", " . $_SESSION["user_info"]["city"] . ", " . $_SESSION["user_info"]["state"] . ", " . $_SESSION["user_info"]["zip"];
     
        $loc = "Location: Clearances/BarangayID.php?id=$issued_id";
        $data = array(
            'Grantedto' => $Grantedto,
            'Addresss' => $Addresss,
            'Purpose' => $Purpose
        );
    }
    
    /*$dob = $_SESSION["user_info"]["dob"];
    $birthdate = new DateTime($dob);
    $currentDate = new DateTime();
    $age = $currentDate->diff($birthdate)->y;*/
    
    $data = json_encode(array($data));
    
    $link = $loc . "&resId=$resid&created=$created_at&dob=$age&signifu=$signatureFilenameOrig";
    $sqlsms = "INSERT INTO sms_messages (phone_number, message_content, send_date, active_status)
    SELECT phone AS phone_number, 
           'Your Certificate request is processed. Expect our SMS confirmation soon\n\nYours truly, Sitio Igiban Services, Antipolo City.' AS message_content, 
           CURRENT_TIMESTAMP AS send_date, 
           0 AS active_status
    FROM users
    WHERE id = '$issued_id';";
    
    $sqlsli = "INSERT INTO finance_clearance_issued(phone, SIGNATURE, res_id, issue_id, data, file, link, type, status, created_at) 
           SELECT phone AS phone_number, '$signatureFilename', '$resid', '$issued_id', '$data', '$file', '$link', '$type', 'Pending', '$created_at'
           FROM users
           WHERE id = '$issued_id'";

    mysqli_query($conn, $sqlsli);
    mysqli_query($conn, $sqlsms);
    echo "<script>alert('Clearance Requested Please wait for SMS for confirmation ');</script>";
}

?>


<html class="no-js" lang="en-GB"><head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style> .info {
        color: rgba(29, 33, 36, 0.76);
        background-color: #e7f3fe;
        border-left: 6px solid #2196F3;
    }
        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: inherit;
        }
        html {
            box-sizing: border-box;
            font-size: 62.5%;
        }
        body {
            display: flex;
            justify-content: center;
            align-content: center;
            padding: 6rem;
            background-color:#f9fafe !important
            font-family: "Inter", sans-serif;
        }
        @media (max-width: 60em) {
            body {
                padding: 3rem;
            }
        }
        .grid {
            display: grid;
            width: 114rem;
            grid-gap: 6rem;
            grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
            align-items: start;
        }
        @media (max-width: 60em) {
            .grid {
                grid-gap: 3rem;
            }
        }
        .grid__item {
            height:100%;
            background-color: #fff;
            border-radius: 0.4rem;
            overflow: hidden;
            box-shadow: 0 3rem 6rem rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: 0.2s;
        }
        .grid__item:hover {
            transform: translateY(-0.5%);
            box-shadow: 0 4rem 8rem rgba(0, 0, 0, 0.2);
        }
        .card__img {
            display: block;
            width: 100%;
            height: 18rem;
            object-fit: cover;
        }
        .card__content {
            padding: 3rem 3rem;
        }
        .card__header {
            font-size: 3rem;
            font-weight: 500;
            color: #0d0d0d;
            margin-bottom: 1.5rem;
        }
        .card__text {
            font-size: 1.5rem;
            letter-spacing: 0.1rem;
            line-height: 1.7;
            color: #3d3d3d;
            margin-bottom: 2.5rem;
        }
        .card__btn {
            display: block;
            width: 100%;
            padding: 1.5rem;
            font-size: 1.5rem;
            text-align: center;
            color: #3363ff;
            background-color: #e6ecff;
            border: none;
            border-radius: 0.4rem;
            transition: 0.2s;
            cursor: pointer;
        }
        .card__btn span {
            margin-left: 1rem;
            transition: 0.2s;
        }
        .card__btn:hover, .card__btn:active {
            background-color: #dce4ff;
        }
        .card__btn:hover span, .card__btn:active span {
            margin-left: 1.5rem;
        }
        .mdl-overlay{
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
        }

        .mdl-content{

            background-color: #f4f4f4;
            margin: 5% auto;
            width: 50%;
            box-shadow: 0 5px 8px 0 rgba(0,0,0,0.2),0 7px 20px 0 rgba(0,0,0,0.17);
        }
        @media (max-width: 700px) {
    .mdl-content {
        width: 100%;
        margin: 5% auto;
        box-shadow: none;
    }
}
        .mdl-header h2, .mdl-footer h3{
            margin: 0;
        }

        .mdl-header{
            background: #1877f2;
            padding: 15px;
            color: #fff;
        }

        .mdl-body{
            padding: 10px 20px;
        }

        .mdl-footer{
            background: #ffffff;
            padding: 10px;
            color: #fff;
            text-align: center;
        }.closeBtn{
             font-size: 30px;
             color: #fff;
             float: right;
         }

        .closeBtn:hover,.closeBtn:focus{
            color: #ef3939;
            text-decoration: none;
            cursor:  pointer;
        }
        .kyotie{
            width: 300px;
            background-color: #fff;
            border: 2px solid #eaeaea;
            border-radius: 3px;
            padding: 0 14px 1px;
            height: 48px;
            font-size: 16px;
            -webkit-appearance: none;
        }
        .button--purple {
            color: #fff;
            background: #1877f2;
            transition: all .5s ease;
            box-shadow: 0 4px 6px rgb(50 50 93 / 11%), 0 1px 3px rgb(0 0 0 / 8%);
        }
        .btn__large {
            outline: 0;
            position: relative;
            font-size: 18px;
            padding: 15px 35px 15px;
            display: inline-block;
            border: none;
            cursor: pointer;
            font-weight: 700;
        }
    </style>
</head>

<body style="font-family: Roboto, sans-serif !important;">
<div id="simpleModal" class="mdl-overlay">
    <div class="mdl-content">
        <div class="mdl-header">
            <span class="closeBtn" onclick="Modalhide()">✖</span>
            <h2 style="color:white">Cert approval</h2>
        </div><form style="margin: 25px" method="post" action="" enctype="multipart/form-data">
  
        <center><div style="display:flex;flex-direction: column;align-content: space-between;align-items: center;flex-direction: column;width:75%;margin:0px">
        <span style="font-size:2em">Proof of residency</span>
        <input type="file" name="signatureImageData" accept="image/*">

                    
                    <div style="width:75%;display:flex;justify-content: space-between;align-items: center;flex-direction: column;"><span style="font-size:2em">Purpose:</span><select id="purposepick" class="kyotie" name="purposepick" required>
    <option value="" disabled selected>Select Purpose</option>
    <option value="Applying for government assistance">Applying for government assistance</option>
    <option value="Employment requirements">Employment requirements</option>
    <option value="School enrollment">School enrollment</option>
    <option value="Legal documentation">Legal documentation</option>
    <option value="Residence verification">Residence verification</option>
    <option value="Income verification">Income verification</option>
    <option value="Scholarship application">Scholarship application</option>
    <option value="Travel or visa application">Travel or visa application</option>
    <option value="Public housing application">Public housing application</option>
    <option value="Social welfare program enrollment">Social welfare program enrollment</option>
    <option value="Medical assistance">Medical assistance</option>
    <option value="Bank account opening">Bank account opening</option>
    <option value="Other">Other</option>
</select>
<br>
<div id="otherPurposeField" style="display: none;">
<span style="font-size:2em">Specify purpose</span>
    <input class="kyotie" type="text" id="otherPurpose" name="otherPurpose">
</div>

<script>
    var purposePick = document.getElementById('purposepick');
    var otherPurposeField = document.getElementById('otherPurposeField');
    var otherPurposeInput = document.getElementById('otherPurpose');

    purposePick.addEventListener('change', function () {
        if (purposePick.value === 'Other') {
            otherPurposeField.style.display = 'block';
            otherPurposeInput.setAttribute('required', 'required');
        } else {
            otherPurposeField.style.display = 'none';
            otherPurposeInput.removeAttribute('required');
        }
    });
</script>
</div>


            <input id="purposecert" name="purposecert" value="" hidden><br>


            <input type="submit" id="sub" name="sub"  class="button app btn__large button--purple" value="Confirm">

        </div></center>
        </form>
        <div class="mdl-footer"><span style="color:gray;float:right;">Sitio Igiban Services</span><br>



        </div>
    </div>
</div>
<div class="grid" style="
    height: 600px;
">
    


        





        


        <div class="grid__item">
            <div class="card"><img class="card__img" src="https://www.fileright.com/wp-content/uploads/2023/09/letters-on-wooden-blocks-spell-moral.jpg" alt="Snowy Mountains">
                <div class="card__content">
                    <h1 class="card__header">Request Good Moral</h1>
                    <p class="card__text">A Certificate of Good Moral Character is an official document that attests to an individual's reputation, behavior, and ethical conduct. It is typically issued by a relevant authority, such as an educational institution, employer, or government agency, and serves to verify that the person has exhibited responsible and ethical behavior. </p>
                    <button class="card__btn">Barangay Clearance</button>
                </div>
            </div>
        </div>





        


        





        


        





        


        





        


        





        


        <div class="grid__item">
            <div class="card"><img class="card__img" src="data:image/jpeg;base64,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" alt="Snowy Mountains">
                <div class="card__content">
                    <h1 class="card__header">Request Indigency Form</h1>
                    <p class="card__text">A Certificate of Indigence is provided to disadvantaged residents who wish to access support, including scholarships, medical services, free legal aid from the Public Attorney's Office (PAO), and similar assistance. Issuing Office or Department: Municipal Social Welfare and Development.</p>
                    <button class="card__btn">Barangay Certificate of Indigency</button>
                </div>
            </div>
        </div>





        


        





        


        
        <div class="grid__item">
            <div class="card"><img class="card__img" src="https://www.shutterstock.com/image-vector/id-cards-personal-info-data-260nw-1931221970.jpg" alt="Snowy Mountains">
                <div class="card__content">
                    <h1 class="card__header">Request Barangay ID</h1>
                    <p class="card__text">A Barangay ID, also known as a Barangay Identification Card or simply a Barangay ID card, is an identification card issued to residents of a barangay in the Philippines. </p>
                    <button class="card__btn">Barangay ID</button>
                </div>
            </div>
        </div>




        


</div>

<script>
    let btns = document.querySelectorAll('button');
    let timepick = document.getElementById('timepick');
    let datepick = document.getElementById('datepick');
    let purposepick = document.getElementById('purposepick');
    let purposecert = document.getElementById('purposecert');
    btns.forEach(function (i) {
        i.addEventListener('click', function() {
            testPass(i.innerHTML);
        });
    });

    function testPass(purpose){
        purposecert.value = purpose;
        openModal();
    }
    function setdate(){
        const FD = new FormData();
        FD.append('Action','2');
        FD.append('timepick',timepick.value);
        FD.append('datepick',datepick.value);
        FD.append('purposepick',purposepick.value);
        FD.append('Request',purposecert.value);
        var ajx = new XMLHttpRequest();
        ajx.onreadystatechange = function () {
            if (ajx.readyState == 4 ) {
                alert('Appointment created, please wait for email confirmation');
                window.location = 'indexController.php';
            }
        };
        ajx.open("POST", "./indexController.php", true);
        ajx.send(FD);

    }
    let selected;

    // Get mdl element
    var mdl = document.getElementById('simpleModal');
    // Get open mdl button
    var modalBtn = document.getElementById('modalBtn');
    // Get close button
    var closeBtn = document.getElementsByClassName('closeBtn')[0];

    // Listen for open click
    // Listen for close click
    closeBtn.addEventListener('click', closeModal);
    // Listen for outside click
    window.addEventListener('click', outsideClick);

    // Open mdl
    function openModal(){

        mdl.style.display = 'block';
    }

    // Close mdl
    function closeModal(){
        mdl.style.display = 'none';
    }

    // Click outside and close
    function outsideClick(e){
        if(e.target == mdl){
            mdl.style.display = 'none';
        }
    }
    function Modalhide(){
        closeModal();
    }

</script>
    </body></html>