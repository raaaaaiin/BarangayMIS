<?php
include 'connection.php';
@$Action = intval($_POST['Action']);

if($Action == 1){
    $searchq = $_POST['search'] ? : "asd";
    $searchq = preg_replace ("#^0-9a-z#i","",$searchq);
    $squery = "SELECT DISTINCT
resident_detail.res_Img,
resident_detail.res_ID,
resident_detail.res_fName,
resident_detail.res_mName,
resident_detail.res_lName,
ref_marital_status.marital_Name,
resident_address.address_Lot_No,
resident_address.address_Block_No,
resident_address.address_Phase_No,
resident_address.address_House_No,
resident_address.address_Street_Name,
resident_detail.res_Bday,
ref_religion.religion_Name,
ref_occupation.occupation_Name
FROM
resident_detail
LEFT JOIN resident_address ON resident_detail.res_ID = resident_address.res_ID
LEFT JOIN ref_marital_status ON resident_detail.marital_ID = ref_marital_status.marital_ID
LEFT JOIN ref_country ON resident_detail.country_ID = ref_country.country_ID
LEFT JOIN ref_gender ON resident_detail.gender_ID = ref_gender.gender_ID
LEFT JOIN ref_religion ON resident_detail.religion_ID = ref_religion.religion_ID
LEFT JOIN ref_brgy ON resident_address.brgy_ID = ref_brgy.brgy_ID
LEFT JOIN ref_citymun ON resident_address.citymun_ID = ref_citymun.citymun_ID
LEFT JOIN ref_province ON resident_address.province_ID = ref_province.province_ID 
LEFT JOIN ref_occupation ON resident_detail.occupation_ID = ref_occupation.occupation_ID
WHERE resident_detail.res_fName LIKE '%$searchq%' OR resident_detail.res_lName LIKE '%$searchq%'
ORDER BY res_lName ASC

";

    $res_conf = mysqli_query($db, $squery);
    $conf_check = mysqli_num_rows($res_conf);


    if($conf_check > 0){
        while($row6 = mysqli_fetch_assoc($res_conf)){
            ?>


            <li onclick="selectResident(<?php echo $row6['res_ID'];?> , '<?php echo base64_encode($row6['res_Img']);?> ')" value="<?php echo $row6['res_ID'];?>" class="table-row b post-bar"style="    align-items: center;">
                <div id="fname<?php echo $row6['res_ID'];?>" class="c c-1" value="<?php echo $row6['res_fName'];?>" hidden><?php echo $row6['res_fName'];?></div>
                <div id="mname<?php echo $row6['res_ID'];?>" class="c c-1" value="<?php echo $row6['res_mName'];?>" hidden><?php echo $row6['res_mName'];;?></div>
                <div id="lname<?php echo $row6['res_ID'];?>"class="c c-1" value="<?php echo $row6['res_lName'];?>" hidden><?php echo $row6['res_lName'];?></div>
                <div class="c c-2"><?php echo $row6['res_lName'].' '.$row6['res_fName'].' '.$row6['res_mName'];?></div>
                <div class="c c-1"><?php echo $row6['marital_Name'];?></div>
                <div class="c c-1"><?php echo $row6['res_Bday'];?></div>
                <div class="c c-1"><?php echo $row6['address_Street_Name'];?></div>
                <div class="c c-1"><?php echo $row6['religion_Name'];?></div>
                <div class="c c-1"><?php echo $row6['occupation_Name'];?></div>
            </li>




            <?php
        }
    }
    else{$s2 = "Person is not a resident in the Barangay";}
}else if($Action == 2){
    {
        $searchq = $_POST['search'];
        $searchq = preg_replace ("#^0-9a-z#i","",$searchq);
        $squery = "SELECT
resident_detail.res_Img,
resident_detail.res_ID,
resident_detail.res_fName,
resident_detail.res_mName,
resident_detail.res_lName,
ref_marital_status.marital_Name,
resident_address.address_Lot_No,
resident_address.address_Block_No,
resident_address.address_Phase_No,
resident_address.address_House_No,
resident_address.address_Street_Name,
resident_detail.res_Bday,
ref_religion.religion_Name,
ref_occupation.occupation_Name
FROM
resident_detail
LEFT JOIN resident_address ON resident_detail.res_ID = resident_address.res_ID
LEFT JOIN ref_marital_status ON resident_detail.marital_ID = ref_marital_status.marital_ID
LEFT JOIN ref_country ON resident_detail.country_ID = ref_country.country_ID
LEFT JOIN ref_gender ON resident_detail.gender_ID = ref_gender.gender_ID
LEFT JOIN ref_religion ON resident_detail.religion_ID = ref_religion.religion_ID
LEFT JOIN ref_brgy ON resident_address.brgy_ID = ref_brgy.brgy_ID
LEFT JOIN ref_citymun ON resident_address.citymun_ID = ref_citymun.citymun_ID
LEFT JOIN ref_province ON resident_address.province_ID = ref_province.province_ID 
Left JOIN ref_occupation ON resident_detail.occupation_ID = ref_occupation.occupation_ID
ORDER BY res_ID DESC
LIMIT 12
";

        $res_conf = mysqli_query($db, $squery);
        $conf_check = mysqli_num_rows($res_conf);


        if($conf_check > 0){
            while($row6 = mysqli_fetch_assoc($res_conf)){
                ?>


                <li onclick="selectResident(<?php echo $row6['res_ID'];?> , '<?php echo base64_encode($row6['res_Img']);?> ')" value="<?php echo $row6['res_ID'];?>" class="table-row b post-bar"style="    align-items: center;">
                    <div id="fname<?php echo $row6['res_ID'];?>" class="c c-1" value="<?php echo $row6['res_fName'];?>" hidden><?php echo $row6['res_fName'];?></div>
                    <div id="mname<?php echo $row6['res_ID'];?>" class="c c-1" value="<?php echo $row6['res_mName'];?>" hidden><?php echo $row6['res_mName'];;?></div>
                    <div id="lname<?php echo $row6['res_ID'];?>"class="c c-1" value="<?php echo $row6['res_lName'];?>" hidden><?php echo $row6['res_lName'];?></div>
                    <div class="c c-2"><?php echo $row6['res_lName'].' '.$row6['res_fName'].' '.$row6['res_mName'];?></div>
                    <div class="c c-1"><?php echo $row6['marital_Name'];?></div>
                    <div class="c c-1"><?php echo $row6['res_Bday'];?></div>
                    <div class="c c-1"><?php echo $row6['address_Street_Name'];?></div>
                    <div class="c c-1"><?php echo $row6['religion_Name'];?></div>
                    <div class="c c-1"><?php echo $row6['occupation_Name'];?></div>
                </li>




                <?php
            }
        }
        else{$s2 = "Person is not a resident in the Barangay";}
    }
}

else if($Action == 3){
    {
        $searchq = $_POST['search'];
        $searchq = preg_replace ("#^0-9a-z#i","",$searchq);
        $squery = "SELECT
    finance_clearance_issued.id,
    finance_clearance_issued.Res_ID,
    finance_clearance_issued.Issue_ID,
    finance_clearance_issued.`DATA`,
    finance_clearance_issued.FILE,
    finance_clearance_issued.LINK,
    finance_clearance_issued.`status`,
    finance_clearance_issued.TYPE,
    finance_clearance_issued.Created_at,
    CONCAT(resident_detail.res_lName, ' ', resident_detail.res_fName, ' ', resident_detail.res_mName) AS Reciever,
    CONCAT(a.last_name, ' ', a.first_name, ' ', a.middle_name) AS Issuer
FROM
    finance_clearance_issued
    INNER JOIN resident_detail ON finance_clearance_issued.Res_ID = resident_detail.res_ID 
    INNER JOIN accounts a ON finance_clearance_issued.Issue_ID = a.ID
WHERE
    resident_detail.res_fName LIKE '%$searchq%'
    OR resident_detail.res_lName LIKE '%$searchq%'
    OR resident_detail.res_mName LIKE '%$searchq%'
    OR CONCAT(resident_detail.res_fName, ' ', resident_detail.res_mName, ' ', resident_detail.res_lName) LIKE '%$searchq%'
    OR CONCAT(resident_detail.res_fName, ' ', resident_detail.res_lName, ' ', resident_detail.res_mName) LIKE '%$searchq%'
    OR CONCAT(resident_detail.res_mName, ' ', resident_detail.res_fName, ' ', resident_detail.res_lName) LIKE '%$searchq%'
    OR CONCAT(resident_detail.res_mName, ' ', resident_detail.res_lName, ' ', resident_detail.res_fName) LIKE '%$searchq%'
    OR CONCAT(resident_detail.res_lName, ' ', resident_detail.res_fName, ' ', resident_detail.res_mName) LIKE '%$searchq%'
    OR CONCAT(resident_detail.res_lName, ' ', resident_detail.res_mName, ' ', resident_detail.res_fName) LIKE '%$searchq%'
    OR a.last_name LIKE '%$searchq%' OR a.first_name LIKE '%$searchq%' OR a.middle_name LIKE '%$searchq%'
OR CONCAT(a.last_name, ' ', a.first_name) LIKE '%$searchq%' OR CONCAT(a.first_name, ' ', a.last_name) LIKE '%$searchq%' OR CONCAT(a.last_name, ' ', a.middle_name) LIKE '%$searchq%' OR CONCAT(a.middle_name, ' ', a.last_name) LIKE '%$searchq%' OR CONCAT(a.first_name, ' ', a.middle_name) LIKE '%$searchq%' OR CONCAT(a.middle_name, ' ', a.first_name) LIKE '%$searchq%'
OR CONCAT(a.last_name, ' ', a.first_name, ' ', a.middle_name) LIKE '%$searchq%' OR CONCAT(a.first_name, ' ', a.middle_name, ' ', a.last_name) LIKE '%$searchq%' OR CONCAT(a.last_name, ' ', a.middle_name, ' ', a.first_name) LIKE '%$searchq%' OR CONCAT(a.middle_name, ' ', a.last_name, ' ', a.first_name) LIKE '%$searchq%' OR CONCAT(a.first_name, ' ', a.last_name, ' ', a.middle_name) LIKE '%$searchq%' OR CONCAT(a.middle_name, ' ', a.first_name, ' ', a.last_name) LIKE '%$searchq%'
LIMIT 50;";

        $res_conf = mysqli_query($db, $squery);
        $conf_check = mysqli_num_rows($res_conf);


        if($conf_check > 0){
            while($row6 = mysqli_fetch_assoc($res_conf)){
                ?>


                <li  class="table-row b post-bar"style="    align-items: center;">
                  

                     <div class="c c-1" hidden><?php echo $row6['id'];?>id</div>
                        <div class="c c-1" hidden><?php echo $row6['LINK'];?>Link</div>
                        <div class="c c-1" hidden><?php echo $row6['DATA'];?>Data</div>
                        <div class="c c-2"><?php echo $row6['Reciever'];?> </div>
                        <div class="c c-2"><?php echo $row6['Issuer'];?>  </div>
                        <div class="c c-1"><?php echo $row6['TYPE'];?></div>
                        <div class="c c-1"><?php echo $row6['Created_at'];?></div>
                        <div class="c c-1"><?php echo $row6['status'];?></div>
                        <div class="c c-1">  <div style="display:flex;"> <?php if($row6['status'] == "Approved"): ?>
   <button onclick="downloadFile('<?php echo $row6['FILE']; ?>')" style="background-color:#7bd58b; min-width:44px; font-size:14px;; border:none; outline:none; box-shadow:none;">
  <svg style="fill:#ffffff;" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/>
  </svg> 
</button>
    <?php else: ?>
    <button onclick="window.location.href='<?php
$output = substr($row6["LINK"], 10);
echo $output."&resId=".$row6['Res_ID']."&created=".$row6['Created_at'];
?>'" style="background-color:#7bd58b; min-width:44px; font-size:14px; padding:10px; border:none; outline:none; box-shadow:none;">
        <svg style="fill:#ffffff;" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
        </svg> 
    </button>
    <?php endif; ?>
    <button onclick="deleteRecord('<?php echo  $row6['id']; ?>')" style="background-color:#fbb2b2; min-width:44px; font-size:14px; padding:10px; border:none; outline:none; box-shadow:none;">
    <svg style="fill:#ffffff;" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
    </svg> 
</button>
</div>
                        
  <!-- Code to be executed if condition is true -->

  <!-- Code to be executed if condition is false -->

                        </div>

                </li>




                <?php
            }
        }
       
    }
}
else if($Action == 4){
    {
        $searchq = $_POST['search'];
        $searchq = preg_replace ("#^0-9a-z#i","",$searchq);
        $squery = "SELECT
finance_clearance_issued.id,
finance_clearance_issued.Res_ID,
finance_clearance_issued.Issue_ID,
finance_clearance_issued.`DATA`,
finance_clearance_issued.FILE,
finance_clearance_issued.LINK,
finance_clearance_issued.`status`,
finance_clearance_issued.TYPE,
finance_clearance_issued.Created_at,
concat(resident_detail.res_lName ,' ', resident_detail.res_fName ,' ', resident_detail.res_mName) as Reciever,
concat(a.last_name ,' ', a.first_name ,' ', a.middle_name) as Issuer
FROM
finance_clearance_issued
left JOIN resident_detail ON finance_clearance_issued.Res_ID = resident_detail.res_ID 
left JOIN accounts a ON finance_clearance_issued.Issue_ID = a.ID ORDER BY finance_clearance_issued.id desc
Limit 50;
";

        $res_conf = mysqli_query($db, $squery);
        $conf_check = mysqli_num_rows($res_conf);


        if($conf_check > 0){
            while($row6 = mysqli_fetch_assoc($res_conf)){
                ?>


                <li  class="table-row b post-bar"style="    align-items: center;">
                  

                     <div class="c c-1" hidden><?php echo $row6['id'];?>id</div>
                        <div class="c c-1" hidden><?php echo $row6['LINK'];?>Link</div>
                        <div class="c c-1" hidden><?php echo $row6['DATA'];?>Data</div>
                        <div class="c c-2"><?php echo $row6['Reciever'];?> </div>
                        <div class="c c-2"><?php echo $row6['Issuer'];?>  </div>
                        <div class="c c-1"><?php echo $row6['TYPE'];?></div>
                        <div class="c c-1"><?php echo $row6['Created_at'];?></div>
                        <div class="c c-1"><?php echo $row6['status'];?></div>
                        <div class="c c-1">  <div style="display:flex;"> <?php if($row6['status'] == "Approved"): ?>
   <button onclick="downloadFile('<?php echo $row6['FILE']; ?>')" style="background-color:#7bd58b; min-width:44px; font-size:14px;; border:none; outline:none; box-shadow:none;">
  <svg style="fill:#ffffff;" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/>
  </svg> 
</button>
    <?php else: ?>
    <button onclick="window.location.href='<?php
$output = substr($row6["LINK"], 9);
echo $output."&resId=".$row6['Res_ID']."&created=".$row6['Created_at'];
?>'" style="background-color:#7bd58b; min-width:44px; font-size:14px; padding:10px; border:none; outline:none; box-shadow:none;">
        <svg style="fill:#ffffff;" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
        </svg> 
    </button>
    <?php endif; ?>
    <button onclick="generateQR('<?php echo $row6['FILE']; ?>')" style="background-color: #4a90e2; min-width: 44px; font-size: 14px; padding: 10px; border: none; outline: none; box-shadow: none;">
    
    <svg style="fill: #ffffff;" width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M3 3v18h18V3H3zm8 15H6v-3h5v-2H6V9h5V7H5v10h6v1zm7-3h-1v3h-1v-3h-1v-1h3v1zm0-4h-2v1h2v2h-1v1h-1v-4zm-4 2v2h1v-2h-1zm-1-2h1v-1h-1v1z"/>
    </svg>
</button>

    <button onclick="deleteRecord('<?php echo  $row6['id']; ?>')" style="background-color:#fbb2b2; min-width:44px; font-size:14px; padding:10px; border:none; outline:none; box-shadow:none;">
    <svg style="fill:#ffffff;" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
    </svg> 
</button>
</div>
                        
  <!-- Code to be executed if condition is true -->

  <!-- Code to be executed if condition is false -->

                        </div>

                </li>




                <?php
            }
        }
       
    }
}
else if($Action == 5){
$sql = "DELETE FROM `finance_clearance_issued` WHERE id = '{$_POST['id']}'";

    // Execute SQL query
    if (mysqli_query($db, $sql)) {
        // Record deleted successfully
        echo "Record deleted successfully";
    } else {
        // Error deleting record
        echo "Error deleting record: " . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($db);
}
?>
