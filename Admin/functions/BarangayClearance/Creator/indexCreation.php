<?php
session_start();
include("../session.php");
include '../connection.php';
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
        <?php include_once '../indexDesign.php' ?>
    </style>

</head>
<body style="font-family: Roboto, sans-serif !important;">

<script>
function toggleElement(target, button, text) {
  var element = document.getElementById(target);
  var buttonElement = document.getElementById(button);

  if (element.style.display === "none") {
    element.style.display = "block";
    buttonElement.innerHTML = "Remove " + text;
  } else {
    element.style.display = "none";
    buttonElement.innerHTML = "Add " + text;
  }
}

document.addEventListener("DOMContentLoaded", function() {
document.getElementById("Issueds").addEventListener("click", function() {
  toggleElement("issuedtext", "Issueds", "Issued");
});

document.getElementById("Signatures").addEventListener("click", function() {
  toggleElement("Signa", "Signatures", "Signature");
});

document.getElementById("Thumbmarkss").addEventListener("click", function() {
  toggleElement("thumbmark", "Thumbmarkss", "Thumbmark");
});

document.getElementById("Issuedats").addEventListener("click", function() {
  toggleElement("issuedon", "Issuedats", "Issued");
  toggleElement("issuedat", "Issuedats", "Issued");
});

document.getElementById("BrgSignature").addEventListener("click", function() {
  toggleElement("puno", "BrgSignature", "Signature");
});

document.getElementById("Notes").addEventListener("click", function() {
  toggleElement("seal", "Notes", "Notes");
});
});


</script>




<?php
// session_start();
// if(isset($_SESSION['device_Id']))
// {
//     if ($_SESSION['device_Id'] != null)
//     {

?>
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
                        <div class="clg-4 cmd-12">
                            <div class="formdes-main-wrpr">
                                <div class="formdes-form-wrpr">



                                        <div class="mb-6 h-100 d-flex flex-column">
                                            <div class="frgp">
                                                <label class="ctrl-label cls-2" for="Category">Certificate Name</label>
                                                <div class="cls-10">
                                                    <select class="form-ctrl" required id="sel1" name="forms"  >
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
                                                    <input type="text" class="form-ctrl" required id="creationTitle" onkeyup="Titletopreview()" name="creationTitle" >
                                                </div>
                                            </div>
                                            <label class="formdes-form-label formdes-form-label-2">
                                                Content
                                            </label>

                                            <div class="cls-10">
                                                <textarea id="creationContent" name="creationContent" required class="form-ctrl" rows="10" onkeyup="copytopreview()" id="title" name="title"></textarea>
                                            </div>

                                            <div class="frmbld-form-sniBut-wrpr">
                                                <style>
                                                    button{
                                                        font-size: 1em !important;
                                                    }
                                                </style>

                                                <button style="submit"  id="Issueds" name="sub"  class="frmbld-sniBut">
                                                    Add Issued

                                                </button> <button style="submit"  id="Signatures" name="sub"  class="frmbld-sniBut">
                                                    Add Res Signature

                                                </button> <button style="submit"  id="Issuedats" name="sub"  class="frmbld-sniBut">
                                                    Add Issued At
                                                </button>
                                            </div>
                                            <div class="frmbld-form-sniBut-wrpr">


                                              <button style="submit"  id="Thumbmarkss" name="sub"  class="frmbld-sniBut">
                                                  Add Thumbmark

                                                </button><button style="submit"  id="BrgSignature" name="sub"  class="frmbld-sniBut">
                                                    Add Signature

                                                </button><button style="submit"  id="Notes" name="sub"  class="frmbld-sniBut">
                                                    Add Note

                                                </button>
                                            </div>



                                        </div>
                                </div>
                            </div>

                        </div>
                        <div class="clg-8 cmd-12">
                            <div class="frmbld-main-wrpr" style="flex-direction: column;">
                                <?php include_once 'BUILDER_Clearance.php' ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


















</body>





<script>
    const Titlewriter = document.getElementById('creationTitle');
    const Titlereader = document.getElementById('readerTitle');
    const writer = document.getElementById('creationContent');
    const reader = document.getElementById('readerContent');

    function Titletopreview(){
        Titlereader.innerHTML = Titlewriter.value;
    }
    function copytopreview(){
        reader.innerHTML = writer.value;
    }
</script>











</html>
