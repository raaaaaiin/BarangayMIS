<?php
session_start();
include("session.php");
include 'connection.php';
$s1="";
$s2="";
$s3="";
 $data = array();
if (isset($_POST['sub'])) {
            $var_forms = $_POST['forms'];
    if($var_forms=="Barangay Clearance Survey"){
        $Surveyor = $_POST["Surveyor"];
        $Location = $_POST["Location"];
        $SurveyNumber = $_POST["SurveyNumber"];
        $PinNumber = $_POST["PinNumber"];
        $TDNARPNNo = $_POST["TDNARPNNo"];
        $ARPN = $_POST["ARPN"];
        $Area = $_POST["Area"];
        $purpose = $_POST["purpose"];
        array_push($data, $Surveyor, $Location, $SurveyNumber, $PinNumber, $TDNARPNNo, $ARPN, $Area, $purpose);
        $loc = "Location: Clearances/BarangayClearanceSurvey.php?Surveyor=$Surveyor&Location=$Location&SurveyNumber=$SurveyNumber&PinNumber=$PinNumber&TDNARPNNo=$TDNARPNNo&ARPN=$ARPN&Area=$Area&purpose=$purpose";
} else if($var_forms=="Barangay Clearance Good Moral"){
        $var_or = $_POST['or'];
        $var_crc = $_POST['crc'];
        $lastName = $_POST['a4'];
        array_push($data, $var_or, $var_crc, $lastName);
        $loc = "Location:Clearances/BarangayClearanceRecord.php?or=$var_or&crc=$var_crc&name=$lastName";
} else if($var_forms=="Barangay Clearance Cut Tree"){
        $lastName = $_POST["a4"];
        $orNumber = $_POST["or"];
        $ctcNumber = $_POST["crc"];
        array_push($data, $orNumber, $ctcNumber, $lastName);
        $loc = "Location: Clearances/BarangayClearanceCutTree.php?lastName=$lastName&orNumber=$orNumber&ctcNumber=$ctcNumber";
} else if($var_forms=="Barangay Clearance Excavation"){
        $Grantedto = $_POST['Grantedto'];
        $Contractor = $_POST['Contractor'];
        $Located = $_POST['Located'];
        $Request = $_POST['Request'];
        $Occupation = $_POST['Occupation'];
        $purpose = $_POST['purpose'];
        array_push($data, $Grantedto, $Contractor, $Located, $Request, $Occupation, $purpose);
        $loc = "Location: Clearances/BarangayClearanceExcavation.php?Grantedto=$Grantedto&Contractor=$Contractor&Located=$Located&Request=$Request&Occupation=$Occupation&purpose=$purpose";
} else if($var_forms=="Barangay Clearance Fencing"){
        $Surveyor = $_POST["Surveyor"];
        $Location = $_POST["Location"];
        $SurveyNumber = $_POST["SurveyNumber"];
        $PinNumber = $_POST["PinNumber"];
        $TDNARPNNo = $_POST["TDNARPNNo"];
        $ARPN = $_POST["ARPN"];
        $Area = $_POST["Area"];
        $purpose = $_POST["purpose"];
        array_push($data, $_POST["Surveyor"], $_POST["Location"], $_POST["SurveyNumber"], $_POST["PinNumber"], $_POST["TDNARPNNo"], $_POST["ARPN"], $_POST["Area"], $_POST["purpose"]);
        $loc = "Location: Clearances/BarangayClearanceFencing.php?Surveyor=$Surveyor&Location=$Location&SurveyNumber=$SurveyNumber&PinNumber=$PinNumber&TDNARPNNo=$TDNARPNNo&ARPN=$ARPN&Area=$Area&purpose=$purpose";
} else if($var_forms=="Barangay Clearance Building"){
        $Grantedto = $_POST["Grantedto"];
        $infrastracture = $_POST["infrastracture"];
        $Description = $_POST["Description"];
        $Location = $_POST["Location"];
        $Tct = $_POST["Tct"];
        $Survey = $_POST["Survey"];
        $Pin = $_POST["Pin"];
        $Arpn = $_POST["Arpn"];
        $area = $_POST["area"];
        $Purpose = $_POST["Purpose"];
        $Issued = $_POST["Issued"];
        array_push($data, $Grantedto, $infrastracture, $Description, $Location, $Tct, $Survey, $Pin, $Arpn, $area, $Purpose, $Issued);
        $loc = "Location:Clearances/BarangayClearanceBuilding.php?Grantedto=$Grantedto&infrastracture=$infrastracture&Description=$Description&Location=$Location&Tct=$Tct&Survey=$Survey&Pin=$Pin&Arpn=$Arpn&area=$area&Purpose=$Purpose&Issued=$Issued";
} else if($var_forms=="Barangay Certificate Indigency"){
        $Grantedto = $_POST["Grantedto"];
        $Addresss = $_POST["Addresss"];
        $Purpose = $_POST["Purpose"];
        
array_push($data, $Grantedto, $Addresss, $Purpose);
        $loc = "Location: Clearances/BarangayClearanceIndigen.php?Grantedto=$Grantedto&Addresss=$Addresss&Children=$Children&age=$age&Purpose=$Purpose";
} else if($var_forms=="Barangay Certificate Single Parent"){
        $Grantedto = $_POST["Grantedto"];
        $Addresss = $_POST["Addresss"];
        $since = $_POST["since"];
        $children = implode(",", $_POST["child"]);
        $childAge = implode(",", $_POST["firstchildage"]);
        array_push($data, $Grantedto, $Addresss, $since, $children, $childAge);
        $loc = "Location: Clearances/BarangayClearanceSingleparents.php?Grantedto=$Grantedto&Addresss=$Addresss&since=$since&children=$children&childAge=$childAge";
} /*else if($var_forms=="Barangay Certificate Educational Assistance"){
        $lastName = $_POST["a4"];
        $ORNumber = $_POST["or"];
        $CTCNumber = $_POST["crc"];
        $loc = "Location: Clearances/BarangayClearanceEduc.php?lastName=$lastName&ORNumber=$ORNumber&CTCNumber=$CTCNumber";
} */else if($var_forms=="Barangay Certificate Bussiness Certification"){
        $Name = $_POST["Name"];
        $Business = $_POST["Business"];
        $Address = $_POST["Address"];
        $Businessage = $_POST["Businessage"];
        $purpose = $_POST["purpose"];
        array_push($data, $Name, $Business, $Address, $Businessage, $purpose);
        $loc = "Location: Clearances/BarangayClearanceBusiness.php?Name=$Name&Business=$Business&Address=$Address&Businessage=$Businessage&purpose=$purpose";
}
$data = json_encode(array($data)); // assume $data is an empty array for now
$resid = $_POST["residentID"];
$file = "No Remarks Yet.";
$link = $loc;
$type = $var_forms;
$issued_id = $_SESSION['id'];
$created_at = date("Y-m-d H:i:s");
$phone = $_POST["phone"];
$sqlsli = "INSERT INTO finance_clearance_issued(phone,SIGNATURE,res_id, issue_id, data, file, link, type, status, created_at) 
           VALUES ('$phone','$signatureFilename','$resid', '$issued_id', '$data', '$file', '$link', '$type','Pending','$created_at')";
              mysqli_query($db, $sqlsli);
       header($loc."&resId=$resid&created=$created_at");



   

    

}

?>
<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8">
    <title>Forms and Clearances</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style> 
        <?php include_once 'indexDesign.php' ?>
    </style>
  <style>
    /* Style the modal background */
    .psbr {
            margin: 0;
            padding: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            -ms-border-radius: 4px;
            -o-border-radius: 4px;
            border-radius: 4px;
            float: left;
            width: 100%;
            background-color: #fff;
            border-left: 1px solid #e4e4e4;
            border-right: 1px solid #e4e4e4;
            border-bottom: 1px solid #e4e4e4;
            margin-bottom: 20px;
            border-radius: 15px;
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
        }

        .closeBtn{
            font-size: 30px;
            color: #fff;
            float: right;
        }

        .closeBtn:hover,.closeBtn:focus{
            color: #ef3939;
            text-decoration: none;
            cursor:  pointer;
        }

  </style>
  <script type="text/javascript" src="qrc.js"></script>
</head>
<body style="font-family: Roboto, sans-serif !important;">







<div id="simpleModal" class="mdl-overlay">
    <div class="mdl-content">
        <div class="mdl-header">
            <span class="closeBtn" onclick="Modalhide()">✖</span>
            <h2 style="color:white">Qr Code</h2>
        </div>
        <div class="dflx mdl-body jtcc" style="display: flex; justify-content: center; align-items: center;">
  <div id="qrcode"></div>
</div>


        <div class="mdl-footer">



            
        </div>
    </div>
</div>







<script>
    
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
    function Modalshow(a,b,c,c1,d,e,f,g){
        document.getElementById('time').value= a ;
        document.getElementById('date').value= b;
        document.getElementById('name').value= c;
        document.getElementById('email').value= c1;
        document.getElementById('purpose').value= d;
        document.getElementById('requirement').value= e;
        document.getElementById('verdict').value= f;
        document.getElementById('id').value= g;
        /*document.getElementById('maximize').value= y;*/
        openModal();
        selected = g;
    }

    function generateQR(data){
        
        document.getElementById("qrcode").innerHTML = "";
        var qrcode = new QRCode(document.getElementById("qrcode"), {
	text: data,
	width: 512,
	height: 512,
	colorDark : "#000000",
	colorLight : "#ffffff",
	correctLevel : QRCode.CorrectLevel.H
});

        openModal()
    }
    const imgs ={};
    let childCounter = 0;

    function addChild() {
        childCounter++;
        let newChild = document.createElement("div");
        newChild.innerHTML = `
      <div class="frmbld-input-flex">
        <div class="frgp">
          <label class="ctrl-label cls-2" for="child">
            Children Name
          </label>
          <div class="cls-10">
            <textarea id="child-${childCounter}" name="child[]" required="" class="form-ctrl" rows="1"></textarea>
          </div>
        </div>
        <div class="frgp">
          <label class="ctrl-label cls-2" for="firstchildage">Child Age</label>
          <div class="cls-10">
            <input type="text" id="firstchildage-${childCounter}" hidden="">
            <textarea id="firstchildage-${childCounter}" name="firstchildage[]" required="" class="form-ctrl" rows="1"></textarea>
          </div>
        </div>
      </div>
    `;
        document.querySelector(".add-children-section").appendChild(newChild);
    }
</script>




<?php
// session_start();
// if(isset($_SESSION['device_Id']))
// {
//     if ($_SESSION['device_Id'] != null)
//     {

?>
<form action="index.php" method="post">
    <div clas="wrpr" id="clearance" style="display: none">

        <div class = "cnt-fld p-4">

            <div class="rw">
                <div class="c-12 ">
                    <style>.info {
        color: rgba(29, 33, 36, 0.76);
        background-color: #e7f3fe;
        border-left: 6px solid #2196F3;
    }</style> <div class="info">
                        <p>&nbsp <strong>Instruction!</strong><br>&nbspFirst step: Ask the resident for official receipt <br>&nbspSecond step: Choose the right papers the resident want to process <br>&nbspThird step: Input the required information  on the blanks box provided</p>
                    </div>
                    <span ><h2 class="ml-4">Add Item</h2></span>

                    <div class="rw ">
                        <div class="clg-6 cmd-12">
                            <div class="formdes-main-wrpr">
                                <div class="formdes-form-wrpr">



                                        <div class="mb-6 h-100 d-flex flex-column">
                                            <div class="frgp">
                                                <label class="ctrl-label cls-2" for="Category">Category</label>
                                                <div class="cls-10">
                                                    <select class="form-ctrl" required id="sel1" name="forms" onchange="val()" >
                                                        <?php

                                                        $sql_ret = "SELECT clearance_form, purpose FROM finance_clearance_list
                                                       LEFT JOIN finance_clearance_set ON finance_clearance_list.clearance_id = finance_clearance_set.clearance_id";
                                                        $result_ret = mysqli_query($db, $sql_ret);
                                                        $resultCheck_ret = mysqli_num_rows($result_ret);

                                                        if($resultCheck_ret > 0){
                                                            while($row_ret = mysqli_fetch_assoc($result_ret)){
                                                                ?>
                                                                <option name="forms" value="<?php echo $row_ret['clearance_form'].' '.$row_ret['purpose'];?>"><?php echo $row_ret['clearance_form']." "."-"." ".$row_ret['purpose'];?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <label class="formdes-form-label formdes-form-label-2">
                                                Verify Image
                                            </label>

                                            <div id='Changepic' style="background-color: #e7effc;" class="formdes-mb-5 formdes-file-input h-100" >





                                                <label id="RemovePic" for="file" class="h-100">
                                                    <div id="change">
                                                        <span id="first" class="formdes-drop-file" > Resident Picture </span>
                                                        <span id="second"  class="formdes-or" > search below </span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                </div>
                            </div>

                        </div>
                        <div class="clg-6 cmd-12">
                            <div class="frmbld-main-wrpr">
                                <div class="frmbld-form-wrpr">

                                        <div class="frmbld-steps">
                                            <ul>
                                                <li class="frmbld-step-menu1 active">
                                                    <span></span>Barangay Resident Information
                                                </li>

                                            </ul>
                                        </div>
                                        <input id="residentID" name="residentID" value="" hidden>
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

                                        <div class="frmbld-form-step-2">
                                            <div class="frgp">
                                                <label class="ctrl-label cls-2" for="Statement">Statement</label>
                                                <div class="cls-10">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="frmbld-form-step-3">
                                            <div class="frmbld-form-confirm">
                                                <p>
                                                    <br>
                                                    Title:<span id="tit"></span>
                                                    <br>
                                                    Reciever:<span id="rec"></span>
                                                    <br>
                                                    When:<span id="whe"></span>
                                                    <br>
                                                    Where:<span id="wher"></span>
                                                    <br>
                                                    Description:<span id="desc"></span>

                                                </p>

                                                <div>



                                                </div>
                                            </div>
                                        </div>

                                        <div class="frmbld-form-sniBut-wrpr">
                                            <button class="frmbld-back-sniBut">
                                                Back
                                            </button>

                                            <button tyle="submit"  id="sub" name="sub"  class="frmbld-sniBut">
                                                Submit
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_1675_1807)">
                                                        <path d="M10.7814 7.33312L7.20541 3.75712L8.14808 2.81445L13.3334 7.99979L8.14808 13.1851L7.20541 12.2425L10.7814 8.66645H2.66675V7.33312H10.7814Z" fill="white"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_1675_1807">
                                                            <rect width="16" height="16" fill="white"/>
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
        </div>
    </div>




</form>
<div clas="wrpr" id="searcharea">
    <div class = "cnt-fld p-4">
        <div class="rw">
            <div class="c-12">
                <style>.info {
        color: rgba(29, 33, 36, 0.76);
        background-color: #e7f3fe;
        border-left: 6px solid #2196F3;
    }</style> <div class="info">
                    <p>&nbsp <strong>Instruction!</strong>&nbsp This is used to edit  Clearance and Certificate, First step is you may search for the resident using the search bar and then select the action according to your task...</p>
                </div>
                    <span style="height:100%"><h2   style="display:inline;margin:10px;padding:10px;">Barangay Clearance</h2> <input type="text" id="searchtext" class="form-ctrl ml-4" name="search" placeholder="Search Resident" style="width:25% !important">
                                    <input type="submit"name="searchbtn" id="searchbtn" value="Search" <button onclick="testPass();" class="sniBut sniBut-success"></button>
                <ul  class="responsive-table p-0">
                    <li class="tbh a">
                        <div class="c c-1" hidden>id</div>
                        <div class="c c-1" hidden>Link</div>
                        <div class="c c-1" hidden>Data</div>
                        <div class="c c-2">Resident Name</div>
                        <div class="c c-2">Issuer Name </div>
                        <div class="c c-1">Type</div>
                        <div class="c c-1">Date</div>
                        <div class="c c-1">Status</div>
                        <div class="c c-1">Action</div>

                    </li>
                    <div id="interchange" >

                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>












</body>




<script>
function downloadFile(data) {
  var filename = data;
  var path = "<?php echo '../asset/certs_issued/'; ?>" + filename;
  var link = document.createElement("a");
  link.setAttribute("href", path);
  link.setAttribute("download", filename);
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
}

    function testPass(){
        var search = document.getElementById("searchtext").value;
        const FD = new FormData();
        FD.append('Action','3');
        FD.append('search',search);
        var ajx = new XMLHttpRequest();
        ajx.onreadystatechange = function () {
            if (ajx.readyState == 4 ) {
                document.getElementById("interchange").innerHTML = ajx.responseText;
            }
        };
        ajx.open("POST", "search.php", true);
        ajx.send(FD);

    }
    function initiate(){
        var search = document.getElementById("searchtext").value;
        const FD = new FormData();
        FD.append('Action','4');
        FD.append('search',search);
        var ajx = new XMLHttpRequest();
        ajx.onreadystatechange = function () {
            if (ajx.readyState == 4 ) {
                document.getElementById("interchange").innerHTML = ajx.responseText;
                
            }
        };
        ajx.open("POST", "search.php", true);
        ajx.send(FD);
    }

    function deleteRecord(id){
        var result = confirm("Are you sure you want to delete this?");
    if (result) {
        var search = document.getElementById("searchtext").value;
        const FD = new FormData();
        FD.append('Action','5');
        FD.append('id',id);
        var ajx = new XMLHttpRequest();
        ajx.onreadystatechange = function () {
            if (ajx.readyState == 4 ) {
                alert(ajx.responseText);
                location.reload()
            }
        };
        ajx.open("POST", "search.php", true);
        ajx.send(FD); 
    }
    }
    function selectUser(){

    }

    function selectResident(id,img){
        id =  id;
        fname =  document.getElementById('fname'+id).getAttribute('value');
        mname =  document.getElementById("mname"+id).getAttribute('value');
        lname =  document.getElementById("lname"+id).getAttribute('value');
        document.getElementById('change').innerHTML = "<img style='width:250px;height:250px;' src='data:image/jpg;charset=utf8;base64," +img + "'>";
        searcharea.style.display = "none";
        clearance.style.display = "contents";
        residd.value = id;
        val();
    }
    initiate();
</script>











</html>
