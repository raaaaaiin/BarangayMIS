<?php
session_start();
include 'connection.php';

$s1 = "";
$s2 = "";
$s3 = "";
$data = array();

if (isset($_POST['sub'])) {
    $var_forms = $_POST['forms'];
    $resid = $_POST["Grantedto"];
    $file = "blank";
    
    $type = $var_forms;
    $issued_id = $_SESSION['id'];
    $created_at = date("Y-m-d H:i:s");

    $signatureImageData = $_POST["signatureImageData"];
    $signatureFilenameOrig = "signature_" . time(); // Adjust the filename as needed
    $signatureFilename = $signatureFilenameOrig . ".png"; // Adjust the filename as needed
    $signatureFilePath = "../../../Public/signatures/" . $signatureFilename; // Update with the actual path
    
    // Decode and save the signature image as a PNG file
    $decodedImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $signatureImageData));
    file_put_contents($signatureFilePath, $decodedImage);
    

    if ($var_forms == "Barangay Clearance") {
        $Grantedto = $_POST["Grantedto"];
        $Addresss = $_POST["Addresss"];
        $Purpose = $_POST["Purpose"];
        $loc = "Location: Clearances/BarangayClearanceIndigen.php?Grantedto=$Grantedto&Addresss=$Addresss&Purpose=$Purpose";
        $data = array(
            'Grantedto' => $Grantedto,
            'Addresss' => $Addresss,
            'Purpose' => $Purpose,
            'signatureFilename' => $signatureFilenameOrig
        );
    } else if ($var_forms == "Barangay Certificate of Indigency") {
        $Grantedto = $_POST["Grantedto"];
        $Addresss = $_POST["Addresss"];
        $Purpose = $_POST["Purpose"];
        $loc = "Location: Clearances/BarangayClearanceIndigen.php?Grantedto=$Grantedto&Addresss=$Addresss&Purpose=$Purpose";
        $data = array(
            'Grantedto' => $Grantedto,
            'Addresss' => $Addresss,
            'signatureFilename' => $signatureFilenameOrig
        );
    } else if ($var_forms == "Barangay ID") {
        $loc = "Location: Clearances/asd.php";
    }
    $data = json_encode(array($data));
    
    $link = $loc . "&resId=$resid&created=$created_at&sigfinu=$signatureFilenameOrig";


    $sqlsli = "INSERT INTO finance_clearance_issued(res_id, issue_id, data, SIGNATURE , file, link, type, status, created_at) 
           VALUES ('$resid', '$issued_id', '$data','$signatureFilename', '$file', '$link', '$type','Pending','$created_at')";
    mysqli_query($db, $sqlsli);
    echo "<script>alert('Clearance Requested');</script>";
    //header($loc . "&resId=$resid&created=$created_at&sigfinu=$signatureFilenameOrig");
}
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Forms and Clearances</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .info {
            color: rgba(29, 33, 36, 0.76);
            background-color: #e7f3fe;
            border-left: 6px solid #2196F3;
        }
        <?php include_once 'indexDesign.php' ?>
    </style>

    <!-- Modal CSS -->
    <style>
        /* The Modal (background) */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
        }

        canvas {
            border-color: gainsboro;
            border-width: 1px;
            border-style: solid;
        }

        .modal-content {
            background-color: white;
            margin: 10% auto;
            max-width: 600px;
            border: 1px solid #888;
            width: 80%;
        }

        .modal-header {
            background-color: #1877f2;
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 24px;
        }

        /* Close button */
        .close-button {
            color: white;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        /* Signature pad container */
        .signature-container {
            text-align: center;
            margin-top: 20px;
        }

        /* Close Button */
        .close-button {
            color: #888;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close-button:hover,
        .close-button:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body style="font-family: Roboto, sans-serif !important;">

<form action="index.php" method="post">
    <div class="wrpr" id="clearance">
        <div class="cnt-fld p-4">
            <div class="rw">
                <div class="c-12 ">
                    <div class="clg-12 cmd-12">
                        
                        <div class="frmbld-main-wrpr">
                            <div class="frmbld-form-wrpr" style="border-radius: 25px;
    padding: 25px;
    background-color: white;
    box-shadow: 4px 4px 8px 2px rgba(0, 0, 0, 0.2);" >
    
    <h1>Clearance Creation</h1>
                                <input id="residentID" name="residentID" value="" hidden>
                                <div class="frgp">
                                    <label class="ctrl-label cls-2" for="Category">Category</label>
                                    <div class="cls-10">
                                        <select class="form-ctrl" required id="sel1" name="forms" onchange="val()">
                                            <option name="forms" value="<?php echo 'Barangay Certificate of Indigency' ?>"><?php echo 'Barangay Certificate of Indigency' ?></option>
                                            <option name="forms" value="<?php echo 'Barangay Clearance' ?>"><?php echo 'Barangay Clearance'; ?> </option>
                                            <option name="forms" value="<?php echo 'Barangay ID'; ?>"><?php echo 'Barangay ID'; ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div id="interchangev1">
                                    <div class="frmbld-form-step-1 active">
                                        <div class="frgp">
                                            <label class="ctrl-label cls-2" for="Statement">Last Name</label>
                                            <div class="cls-10">
                                                <input type="text" id="a1" name="a1" hidden>
                                                <textarea id="a4" name="a4" required class="form-ctrl" rows="1" id="title" name="title"></textarea>
                                            </div>
                                        </div>
                                        <div class="frmbld-input-flex">
                                            <div class="frgp">
                                                <label class="ctrl-label cls-2" for="Statement">First Name</label>
                                                <div class="cls-10">
                                                    <textarea id="a2" name="a2" required class="form-ctrl" rows="1" id="when" name="when"></textarea>
                                                </div>
                                            </div>
                                            <div class="frgp">
                                                <label class="ctrl-label cls-2" for="Statement">Middle Name</label>
                                                <div class="cls-10">
                                                    <textarea id="a3" name="a3" required class="form-ctrl" rows="1" id="where" name="where"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="frmbld-input-flex">
                                            <div class="frgp">
                                                <label class="ctrl-label cls-2" for="Statement">OR Number</label>
                                                <div class="cls-10">
                                                    <textarea id="or" name="or" required class="form-ctrl" rows="1" id="when" name="when"></textarea>
                                                </div>
                                            </div>
                                            <div class="frgp">
                                                <label class="ctrl-label cls-2" for="Statement">CTC Number</label>
                                                <div class="cls-10">
                                                    <textarea id="crc" name="crc" required class="form-ctrl" rows="1" id="where" name="where"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="frmbld-form-sniBut-wrpr">
                                    <button class="frmbld-back-sniBut">
                                        Back
                                    </button>
                                    <button type="button" id="Signature" class="frmbld-sniBut">
                                        Signature
                                    </button>
                                    <button type="submit" id="sub" name="sub" class="frmbld-sniBut" disabled>
                                        Submit
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1675_1807)">
                                                <path d="M10.7814 7.33312L7.20541 3.75712L8.14808 2.81445L13.3334 7.99979L8.14808 13.1851L7.20541 12.2425L10.7814 8.66645H2.66675V7.33312H10.7814Z" fill="white" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1675_1807">
                                                    <rect width="16" height="16" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="signatureImageData" name="signatureImageData" value="">

        <!-- Modal HTML -->
        <div id="myModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    Please Enter Signature
                    
                <span class="close-button" id="closeModal">&times;</span>
                </div>
                <div class="signature-container">
                    <canvas id="signatureCanvas" width="500" height="350"></canvas>
                    <div style="display:flex;margin:25px;justify-content: flex-end;">
                        <input type="button" id="clearSignature" class="frmbld-sniBut" style="margin:15px; display: inline;" value="Clear Signature">
                        <input type="button" id="saveSignature" class="frmbld-sniBut" style="margin:15px; display: inline;" value="Done">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
const clearance = document.getElementById("clearance");
const searcharea = document.getElementById("searcharea");
const clearancepapers = document.getElementById("interchangev1");
const residd = document.getElementById("residentID");
const signatureCanvas = document.getElementById("signatureCanvas");
const ctx = signatureCanvas.getContext("2d");
let isDrawing = false;

function selectResident(id, img) {
    id = id;
    fname = document.getElementById('fname' + id).getAttribute('value');
    mname = document.getElementById("mname" + id).getAttribute('value');
    lname = document.getElementById("lname" + id).getAttribute('value');
    document.getElementById('change').innerHTML = "<img style='width:250px;height:250px;' src='data:image/jpg;charset=utf8;base64," + img + "'>";
    residd.value = id;
    val();
}

function val() {
    selected = document.getElementById("sel1").value;
    if (selected === 'Barangay Clearance') {
        clearancepapers.innerHTML = `<?php include 'Clearance_Tab/Clearance.php'?>`;
    } else if (selected === 'Barangay Certificate of Indigency') {
        clearancepapers.innerHTML = `<?php include 'Clearance_Tab/Indigency.php'?>`;
    } else if (selected === 'Barangay ID') {
        clearancepapers.innerHTML = `<?php include 'Clearance_Tab/BarangayID.php'?>`;
    }
}

function change() {}
val();

// Modal JavaScript
const modal = document.getElementById("myModal");
const closeModal = document.getElementById("closeModal");
const signatureButton = document.getElementById("Signature");
const clearSignatureButton = document.getElementById("clearSignature");
const saveSignatureButton = document.getElementById("saveSignature");
const submitButton = document.getElementById("sub");


signatureCanvas.addEventListener("mousedown", (e) => {
    isDrawing = true;
    ctx.beginPath();
    ctx.moveTo(e.clientX - signatureCanvas.getBoundingClientRect().left, e.clientY - signatureCanvas.getBoundingClientRect().top);
});

signatureCanvas.addEventListener("mousemove", (e) => {
    if (!isDrawing) return;
    ctx.lineTo(e.clientX - signatureCanvas.getBoundingClientRect().left, e.clientY - signatureCanvas.getBoundingClientRect().top);
    ctx.stroke();
});

signatureCanvas.addEventListener("mouseup", () => {
    isDrawing = false;
    validateSignature();
});

function validateSignature() {
    if (ctx.getImageData(0, 0, signatureCanvas.width, signatureCanvas.height).data.some((val) => val !== 0)) {
        submitButton.disabled = false;
    } else {
        submitButton.disabled = true;
    }
}

signatureButton.onclick = function () {
    modal.style.display = "block";
    ctx.clearRect(0, 0, signatureCanvas.width, signatureCanvas.height);
    submitButton.disabled = true;
};

closeModal.onclick = function () {
    modal.style.display = "none";
};

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};

clearSignatureButton.addEventListener("click", () => {
    ctx.clearRect(0, 0, signatureCanvas.width, signatureCanvas.height);
});

saveSignatureButton.addEventListener("click", () => {
    validateSignature();
    const signatureImageData = signatureCanvas.toDataURL("image/png");
    document.getElementById("signatureImageData").value = signatureImageData;

    modal.style.display = "none";
});
</script>
</body>
</html>
