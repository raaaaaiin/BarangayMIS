<?php
session_start();
include 'connection.php';
$s1="";
$s2="";
$s3="";
 $data = array();
if (isset($_POST['sub'])) {
            $var_forms = $_POST['forms'];
    if($var_forms=="Barangay Clearance"){
        $Grantedto = $_POST["Grantedto"];
        $Addresss = $_POST["Addresss"];
        $Purpose = $_POST["Purpose"];
        $loc = "Location: Clearances/BarangayClearanceIndigen.php?Grantedto=$Grantedto&Addresss=$Addresss&Purpose=$Purpose";

}else if($var_forms=="Barangay Certificate of Indigency"){
    $Grantedto = $_POST["Grantedto"];
    $Addresss = $_POST["Addresss"];
    $Purpose = $_POST["Purpose"];
    $loc = "Location: Clearances/BarangayClearanceIndigen.php?Grantedto=$Grantedto&Addresss=$Addresss&Purpose=$Purpose";
}else if($var_forms=="Barangay ID"){
    $loc = "Location: Clearances/asd.php";
}
$data = json_encode(array($data)); // assume $data is an empty array for now
$resid = $_POST["residentID"];
$file = "blank";
$link = $loc;
$type = $var_forms;
$issued_id = $_SESSION['id'];
$created_at = date("Y-m-d H:i:s");
$sqlsli = "INSERT INTO finance_clearance_issued(res_id, issue_id, data, file, link, type, status, created_at) 
           VALUES ('$resid', '$issued_id', '$data', '$file', '$link', '$type','pending','$created_at')";
        // var_dump($sqlsli);
       mysqli_query($db, $sqlsli);
       header($loc."&resId=$resid&created=$created_at");



   

    

}

?>

<html>
<head>
    <meta charset="utf-8">
    <title>Forms and Clearances</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style> .info {
        color: rgba(29, 33, 36, 0.76);
        background-color: #e7f3fe;
        border-left: 6px solid #2196F3;
    }
        <?php include_once 'indexDesign.php' ?>
    </style>

</head>
<body style="font-family: Roboto, sans-serif !important;">

<script>
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
    <div clas="wrpr" id="clearance">

        <div class = "cnt-fld p-4">

            <div class="rw">
                <div class="c-12 ">
                    <style>.info {
        color: rgba(29, 33, 36, 0.76);
        background-color: #e7f3fe;
        border-left: 6px solid #2196F3;
    }</style> 
                        <div class="clg-12 cmd-12">
                            <div class="frmbld-main-wrpr">
                                <div class="frmbld-form-wrpr">

                                       
                                        <input id="residentID" name="residentID" value="" hidden>
                                        <div class="frgp">
                                                <label class="ctrl-label cls-2" for="Category">Category</label>
                                                <div class="cls-10">
                                                    <select class="form-ctrl" required id="sel1" name="forms" onchange="val()" >
                                                    <option name="forms" value="<?php echo 'Barangay Certificate of Indigency'?>"><?php echo 'Barangay Certificate of Indigency'?></option>
                                                            
                                                    <option name="forms" value="<?php echo 'Barangay Clearance'?>" ><?php echo 'Barangay Clearance';?> </option>
                                                          <option name="forms" value="<?php echo 'Barangay ID';?>"><?php echo 'Barangay ID';?></option>
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









</body>




<script>
    const clearance = document.getElementById("clearance");
    const searcharea = document.getElementById("searcharea");
    const clearancepapers = document.getElementById("interchangev1");
    const residd = document.getElementById("residentID");

    function selectResident(id,img){
        id =  id;
        fname =  document.getElementById('fname'+id).getAttribute('value');
        mname =  document.getElementById("mname"+id).getAttribute('value');
        lname =  document.getElementById("lname"+id).getAttribute('value');
        document.getElementById('change').innerHTML = "<img style='width:250px;height:250px;' src='data:image/jpg;charset=utf8;base64," +img + "'>";
        residd.value = id;
        val();
    }

    function val(){
        
        selected = document.getElementById("sel1").value;
       
        if(selected ==='Barangay Clearance'){clearancepapers.innerHTML = `<?php include 'Clearance_Tab/Clearance.php'?>`;
        //document.getElementById('GrantedtoTA').value= lname + " " + fname + " " + mname;
    }else if(selected ==='Barangay Certificate of Indigency'){
        clearancepapers.innerHTML =`<?php include 'Clearance_Tab/Indigency.php'?>`;
    }else if(selected === 'Barangay ID'){
        clearancepapers.innerHTML =`<?php include 'Clearance_Tab/BarangayID.php'?>`;
    }
    
        
    }

    function change(){}
    val()

</script>











</html>
