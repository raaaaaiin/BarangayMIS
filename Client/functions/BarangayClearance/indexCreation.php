<?php
session_start();
include("session.php");
include 'connection.php';
$s1="";
$s2="";
$s3="";

if (isset($_POST['sub'])) {
    $var_id = $_POST['a1'];
    $var_or = $_POST['or'];
    $var_crc = $_POST['crc'];
            $var_forms = $_POST['forms'];
            $var_or = $_POST['or'];
            $var_crc = $_POST['crc'];
            $first = $_POST['a2'];
            $lastName = $_POST['a4'];
            $middleName = $_POST['a3'];
            var_dump($var_forms);
               if($var_forms=="Barangay Clearance Survey" ){
                   header("Location:Clearances/BarangayClearanceSurvey.php?res_ID=$var_id&or=$var_or&crc=$var_crc&first=$first&middle=$middleName&last=$lastName");
                }else if($var_forms=="Barangay Clearance Good Moral"){
                   header("Location:Clearances/BarangayClearanceRecord.php?res_ID=$var_id&or=$var_or&crc=$var_crc&first=$first&middle=$middleName&last=$lastName");
               }else if($var_forms=="Barangay Clearance Cut Tree"){
                   header("Location:Clearances/BarangayClearanceCutTree.php?res_ID=$var_id&or=$var_or&crc=$var_crc&first=$first&middle=$middleName&last=$lastName");
               }else if($var_forms=="Barangay Clearance Excavation"){
                   header("Location:Clearances/BarangayClearanceExcavation.php?res_ID=$var_id&or=$var_or&crc=$var_crc&first=$first&middle=$middleName&last=$lastName");
               }else if($var_forms=="Barangay Clearance Fencing"){
                   header("Location:Clearances/BarangayClearanceFencing.php?res_ID=$var_id&or=$var_or&crc=$var_crc&first=$first&middle=$middleName&last=$lastName");
               }else if($var_forms=="Barangay Clearance Building"){
                   header("Location:Clearances/BarangayClearanceBuilding.php?res_ID=$var_id&or=$var_or&crc=$var_crc&first=$first&middle=$middleName&last=$lastName");
               }








}

?>
<!DOCTYPE>
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
</script>




<?php
// session_start();
// if(isset($_SESSION['device_Id']))
// {
//     if ($_SESSION['device_Id'] != null)
//     {

?>
<form action="index.php" method="post">
    <div clas="wrpr" id="clearance" style="">

        <div class = "cnt-fld p-4">

            <div class="rw">
                <div class="c-12 ">
                    <style>.info {
        color: rgba(29, 33, 36, 0.76);
        background-color: #e7f3fe;
        border-left: 6px solid #2196F3;
    }
                        .frmbld-form-sniBut-wrpr {
                            display: flex;
                            align-items: center;
                            justify-content: space-between;
                            gap: 25px;
                            row-gap: 25px;
                            column-gap: 25px;
                            margin-top: 25px;
                        }
                    </style> <div class="info">
                        <p>&nbsp <strong>Instruction!</strong><br>&nbspFirst step: Ask the resident for official receipt <br>&nbspSecond step: Choose the right papers the resident want to process <br>&nbspThird step: Input the required information  on the blanks box provided</p>
                    </div>
                    <span ><h2 class="ml-4">Add Certificate</h2></span>

                    <div class="rw ">
                        <div class="clg-6 cmd-12">
                            <div class="formdes-main-wrpr">
                                <div class="formdes-form-wrpr">



                                        <div class="mb-6 h-100 d-flex flex-column">
                                            <div class="frgp">
                                                <label class="ctrl-label cls-2" for="Category">Certificate Name</label>
                                                <div class="cls-10">
                                                    <select class="form-ctrl" required id="sel1" name="forms" onchange="val()" >
                                                        <?php

                                                        $sql_ret = "SELECT clearance_form FROM finance_clearance_list";
                                                        $result_ret = mysqli_query($db, $sql_ret);
                                                        $resultCheck_ret = mysqli_num_rows($result_ret);

                                                        if($resultCheck_ret > 0){
                                                            while($row_ret = mysqli_fetch_assoc($result_ret)){
                                                                ?>
                                                                <option name="forms" value="<?php echo $row_ret['clearance_form']?>"><?php echo $row_ret['clearance_form']?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                            </div><div class="frgp">
                                                <label class="ctrl-label cls-2" for="Category">Purpose</label>
                                                <div class="cls-10">
                                                    <input type="text" class="form-ctrl" required id="sel1" name="forms" >
                                                </div>
                                            </div>
                                            <label class="formdes-form-label formdes-form-label-2">
                                                Content
                                            </label>

                                            <div class="cls-10">
                                                <input type="text" id="a1" name="a1" hidden>
                                                <textarea id="a4" name="a4" required class="form-ctrl" rows="10" id="title" name="title"></textarea>
                                            </div>

                                            <div class="frmbld-form-sniBut-wrpr">
                                                <style>
                                                    button{
                                                        font-size: 1em !important;
                                                    }
                                                </style>

                                                <button tyle="submit"  id="sub" name="sub"  class="frmbld-sniBut">
                                                    Add Blank

                                                </button> <button tyle="submit"  id="sub" name="sub"  class="frmbld-sniBut">
                                                    Add Paragraph

                                                </button> <button tyle="submit"  id="sub" name="sub"  class="frmbld-sniBut">
                                                    Add Auto fill

                                                </button>
                                            </div>
                                            <div class="frmbld-form-sniBut-wrpr">


                                              <button tyle="submit"  id="sub" name="sub"  class="frmbld-sniBut">
                                                  Add Thumbmark

                                                </button><button tyle="submit"  id="sub" name="sub"  class="frmbld-sniBut">
                                                    Add Signature

                                                </button><button tyle="submit"  id="sub" name="sub"  class="frmbld-sniBut">
                                                    Add Note

                                                </button>
                                            </div>



                                        </div>
                                </div>
                            </div>

                        </div>
                        <div class="clg-6 cmd-12">
                            <div class="frmbld-main-wrpr">


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

    function testPass(){
        var search = document.getElementById("searchtext").value;
        const FD = new FormData();
        FD.append('Action','1');
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
        FD.append('Action','2');
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
    function selectUser(){

    }
    function selectResident(id,img){
        document.getElementById("a1").value =  id;
        document.getElementById("a2").value =  document.getElementById('fname'+id).getAttribute('value');
        document.getElementById("a3").value =  document.getElementById("mname"+id).getAttribute('value');
        document.getElementById("a4").value =  document.getElementById("lname"+id).getAttribute('value');
        document.getElementById('change').innerHTML = "<img style='width:250px;height:250px;' src='data:image/jpg;charset=utf8;base64," +img + "'>";
        searcharea.style.display = "none";
        clearance.style.display = "contents";
    }

    function val(){
        selected = document.getElementById("sel1").value;
        if(selected ==='Barangay Clearance Survey'){clearancepapers.innerHTML = `<?php include 'Clearance_Tab/Survey.php'?>`}
        else if(selected ==='Barangay Clearance Good Moral'){clearancepapers.innerHTML = `<?php include 'Clearance_Tab/GoodMoral.php'?>`}
        else if(selected ==='Barangay Clearance Cut Tree'){clearancepapers.innerHTML = `<?php include 'Clearance_Tab/CutTree.php'?>`}
        else if(selected ==='Barangay Clearance Excavation'){clearancepapers.innerHTML = `<?php include 'Clearance_Tab/Excavation.php'?>`}
        else if(selected ==='Barangay Clearance Fencing'){clearancepapers.innerHTML = `<?php include 'Clearance_Tab/Fencing.php'?>`}
        else if(selected ==='Barangay Clearance Building'){clearancepapers.innerHTML = `<?php include 'Clearance_Tab/Building.php'?>`}
        else if(selected ==='Barangay Certificate Indigency'){clearancepapers.innerHTML = `<?php include 'Clearance_Tab/Indigency.php'?>`}
        else if(selected ==='Barangay Certificate Single Parent'){clearancepapers.innerHTML = `<?php include 'Clearance_Tab/SingleParent.php'?>`}
        else if(selected ==='Barangay Certificate Educational Assistance'){clearancepapers.innerHTML = `<?php include 'Clearance_Tab/EducationalAssistance.php'?>`}
        else if(selected ==='Barangay Certificate Bussiness Certification'){clearancepapers.innerHTML = `<?php include 'Clearance_Tab/BusinessCert.php'?>`}

        alert(selected);
    }
    function change(){}
    initiate();


</script>











</html>
