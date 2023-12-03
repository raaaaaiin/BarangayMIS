<?php 
session_start();

// Check if the user is logged in and has the 'role' set to 'admin' in the session
if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    // User is an admin, allow access with the provided $_GET['id'] or set it to $_SESSION['id']
    $get_id = isset($_GET['id']) ? $_GET['id'] : $_SESSION['id'];
} elseif (isset($_SESSION['id']) && isset($_SESSION['id'])) {
    // User is not an admin, and 'id' is set in the session
    $session_id = $_SESSION['id'];

    if (isset($_GET['id']) && $_GET['id'] === $session_id) {
        // User is not an admin, and $_GET['id'] matches the session 'id'
        $get_id = $_GET['id'];
    } else {
        // User is not an admin, and $_GET['id'] does not match the session 'id'
        // Replace $_GET['id'] with the session 'id'
        $get_id = $session_id;
    }
} else {
    // Handle the case where the user does not have the necessary session data set
    // You can redirect or display an error message
    // For this example, I'll set $get_id to null
    $get_id = null;
}

// Now, $get_id contains the validated 'id' (either from $_GET or $_SESSION)

?>
<!DOCTYPE html>
<html>

<head>
  <title>Registration Form</title>
  <style>
*/:root{--blue:#007bff;--indigo:#6610f2;--purple:#6f42c1;--pink:#e83e8c;--red:#dc3545;--orange:#fd7e14;--yellow:#ffc107;--green:#28a745;--teal:#20c997;--cyan:#17a2b8;--white:#fff;--gray:#6c757d;--gray-dark:#343a40;--primary:#007bff;--secondary:#6c757d;--success:#28a745;--info:#17a2b8;--warning:#ffc107;--danger:#dc3545;--light:#f8f9fa;--dark:#343a40;--breakpoint-xs:0;--breakpoint-sm:576px;--breakpoint-md:768px;--breakpoint-lg:992px;--breakpoint-xl:1200px;--font-family-sans-serif:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";--font-family-monospace:SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace}*,::after,::before{box-sizing:border-box}html{font-family:sans-serif;line-height:1.15;-webkit-text-size-adjust:100%;-webkit-tap-highlight-color:transparent}body{margin:0;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:1rem;font-weight:400;line-height:1.5;color:#212529;text-align:left;background-color:#fff}[tabindex="-1"]:focus:not(:focus-visible){outline:0!important}h3{margin-top:0;margin-bottom:.5rem}label{display:inline-block;margin-bottom:.5rem}button{border-radius:0}button:focus{outline:1px dotted;outline:5px auto -webkit-focus-ring-color}button,input{margin:0;font-family:inherit;font-size:inherit;line-height:inherit}button,input{overflow:visible}button{text-transform:none}[type=submit],button{-webkit-appearance:button}[type=button]:not(:disabled),[type=reset]:not(:disabled),[type=submit]:not(:disabled),button:not(:disabled){cursor:pointer}[type=submit]::-moz-focus-inner,button::-moz-focus-inner{padding:0;border-style:none}input[type=radio]{box-sizing:border-box;padding:0}::-webkit-file-upload-button{font:inherit;-webkit-appearance:button}h3{margin-bottom:.5rem;font-weight:500;line-height:1.2}h3{font-size:1.75rem}.container{width:100%;padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto}@media (min-width:576px){.container{max-width:540px}}@media (min-width:768px){.container{max-width:720px}}@media (min-width:992px){.container{max-width:960px}}@media (min-width:1200px){.container{max-width:1140px}}.row{display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-15px;margin-left:-15px}.col-md-2,.col-md-4,.col-md-6,.col-md-8{position:relative;width:100%;padding-right:15px;padding-left:15px}@media (min-width:768px){.col-md-2{-ms-flex:0 0 16.666667%;flex:0 0 16.666667%;max-width:16.666667%}.col-md-4{-ms-flex:0 0 33.333333%;flex:0 0 33.333333%;max-width:33.333333%}.col-md-6{-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}.col-md-8{-ms-flex:0 0 66.666667%;flex:0 0 66.666667%;max-width:66.666667%}}.form-control{display:block;width:100%;height:calc(1.5em + .75rem + 2px);padding:.375rem .75rem;font-size:1rem;font-weight:400;line-height:1.5;color:#495057;background-color:#fff;background-clip:padding-box;border:1px solid #ced4da;border-radius:.25rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out}@media (prefers-reduced-motion:reduce){.form-control{transition:none}}.form-control::-ms-expand{background-color:transparent;border:0}.form-control:-moz-focusring{color:transparent;text-shadow:0 0 0 #495057}.form-control:focus{color:#495057;background-color:#fff;border-color:#80bdff;outline:0;box-shadow:0 0 0 .2rem rgba(0,123,255,.25)}.form-control::-webkit-input-placeholder{color:#6c757d;opacity:1}.form-control::-moz-placeholder{color:#6c757d;opacity:1}.form-control:-ms-input-placeholder{color:#6c757d;opacity:1}.form-control::-ms-input-placeholder{color:#6c757d;opacity:1}.form-control:disabled{background-color:#e9ecef;opacity:1}input[type=date].form-control{-webkit-appearance:none;-moz-appearance:none;appearance:none}.form-group{margin-bottom:1rem}.form-row{display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-5px;margin-left:-5px}.form-row>[class*=col-]{padding-right:5px;padding-left:5px}.form-check{position:relative;display:block;padding-left:1.25rem}.form-check-input{position:absolute;margin-top:.3rem;margin-left:-1.25rem}.form-check-input:disabled~.form-check-label{color:#6c757d}.form-check-label{margin-bottom:0}.custom-control-input.is-valid:focus:not(:checked)~.custom-control-label::before,.was-validated .custom-control-input:valid:focus:not(:checked)~.custom-control-label::before{border-color:#28a745}.custom-control-input.is-invalid:focus:not(:checked)~.custom-control-label::before,.was-validated .custom-control-input:invalid:focus:not(:checked)~.custom-control-label::before{border-color:#dc3545}.btn{display:inline-block;font-weight:400;color:#212529;text-align:center;vertical-align:middle;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;background-color:transparent;border:1px solid transparent;padding:.375rem .75rem;font-size:1rem;line-height:1.5;border-radius:.25rem;transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out}@media (prefers-reduced-motion:reduce){.btn{transition:none}}.btn:hover{color:#212529;text-decoration:none}.btn:focus{outline:0;box-shadow:0 0 0 .2rem rgba(0,123,255,.25)}.btn:disabled{opacity:.65}.btn:not(:disabled):not(.disabled){cursor:pointer}.btn-primary{color:#fff;background-color:#007bff;border-color:#007bff}.btn-primary:hover{color:#fff;background-color:#0069d9;border-color:#0062cc}.btn-primary:focus{color:#fff;background-color:#0069d9;border-color:#0062cc;box-shadow:0 0 0 .2rem rgba(38,143,255,.5)}.btn-primary:disabled{color:#fff;background-color:#007bff;border-color:#007bff}.btn-primary:not(:disabled):not(.disabled).active,.btn-primary:not(:disabled):not(.disabled):active{color:#fff;background-color:#0062cc;border-color:#005cbf}.btn-primary:not(:disabled):not(.disabled).active:focus,.btn-primary:not(:disabled):not(.disabled):active:focus{box-shadow:0 0 0 .2rem rgba(38,143,255,.5)}.btn-secondary:not(:disabled):not(.disabled).active,.btn-secondary:not(:disabled):not(.disabled):active{color:#fff;background-color:#545b62;border-color:#4e555b}.btn-secondary:not(:disabled):not(.disabled).active:focus,.btn-secondary:not(:disabled):not(.disabled):active:focus{box-shadow:0 0 0 .2rem rgba(130,138,145,.5)}.btn-success:not(:disabled):not(.disabled).active,.btn-success:not(:disabled):not(.disabled):active{color:#fff;background-color:#1e7e34;border-color:#1c7430}.btn-success:not(:disabled):not(.disabled).active:focus,.btn-success:not(:disabled):not(.disabled):active:focus{box-shadow:0 0 0 .2rem rgba(72,180,97,.5)}.btn-info:not(:disabled):not(.disabled).active,.btn-info:not(:disabled):not(.disabled):active{color:#fff;background-color:#117a8b;border-color:#10707f}.btn-info:not(:disabled):not(.disabled).active:focus,.btn-info:not(:disabled):not(.disabled):active:focus{box-shadow:0 0 0 .2rem rgba(58,176,195,.5)}.btn-warning:not(:disabled):not(.disabled).active,.btn-warning:not(:disabled):not(.disabled):active{color:#212529;background-color:#d39e00;border-color:#c69500}.btn-warning:not(:disabled):not(.disabled).active:focus,.btn-warning:not(:disabled):not(.disabled):active:focus{box-shadow:0 0 0 .2rem rgba(222,170,12,.5)}.btn-danger:not(:disabled):not(.disabled).active,.btn-danger:not(:disabled):not(.disabled):active{color:#fff;background-color:#bd2130;border-color:#b21f2d}.btn-danger:not(:disabled):not(.disabled).active:focus,.btn-danger:not(:disabled):not(.disabled):active:focus{box-shadow:0 0 0 .2rem rgba(225,83,97,.5)}.btn-light:not(:disabled):not(.disabled).active,.btn-light:not(:disabled):not(.disabled):active{color:#212529;background-color:#dae0e5;border-color:#d3d9df}.btn-light:not(:disabled):not(.disabled).active:focus,.btn-light:not(:disabled):not(.disabled):active:focus{box-shadow:0 0 0 .2rem rgba(216,217,219,.5)}.btn-dark:not(:disabled):not(.disabled).active,.btn-dark:not(:disabled):not(.disabled):active{color:#fff;background-color:#1d2124;border-color:#171a1d}.btn-dark:not(:disabled):not(.disabled).active:focus,.btn-dark:not(:disabled):not(.disabled):active:focus{box-shadow:0 0 0 .2rem rgba(82,88,93,.5)}.btn-outline-primary:not(:disabled):not(.disabled).active,.btn-outline-primary:not(:disabled):not(.disabled):active{color:#fff;background-color:#007bff;border-color:#007bff}.btn-outline-primary:not(:disabled):not(.disabled).active:focus,.btn-outline-primary:not(:disabled):not(.disabled):active:focus{box-shadow:0 0 0 .2rem rgba(0,123,255,.5)}.btn-outline-secondary:not(:disabled):not(.disabled).active,.btn-outline-secondary:not(:disabled):not(.disabled):active{color:#fff;background-color:#6c757d;border-color:#6c757d}.btn-outline-secondary:not(:disabled):not(.disabled).active:focus,.btn-outline-secondary:not(:disabled):not(.disabled):active:focus{box-shadow:0 0 0 .2rem rgba(108,117,125,.5)}.btn-outline-success:not(:disabled):not(.disabled).active,.btn-outline-success:not(:disabled):not(.disabled):active{color:#fff;background-color:#28a745;border-color:#28a745}.btn-outline-success:not(:disabled):not(.disabled).active:focus,.btn-outline-success:not(:disabled):not(.disabled):active:focus{box-shadow:0 0 0 .2rem rgba(40,167,69,.5)}.btn-outline-info:not(:disabled):not(.disabled).active,.btn-outline-info:not(:disabled):not(.disabled):active{color:#fff;background-color:#17a2b8;border-color:#17a2b8}.btn-outline-info:not(:disabled):not(.disabled).active:focus,.btn-outline-info:not(:disabled):not(.disabled):active:focus{box-shadow:0 0 0 .2rem rgba(23,162,184,.5)}.btn-outline-warning:not(:disabled):not(.disabled).active,.btn-outline-warning:not(:disabled):not(.disabled):active{color:#212529;background-color:#ffc107;border-color:#ffc107}.btn-outline-warning:not(:disabled):not(.disabled).active:focus,.btn-outline-warning:not(:disabled):not(.disabled):active:focus{box-shadow:0 0 0 .2rem rgba(255,193,7,.5)}.btn-outline-danger:not(:disabled):not(.disabled).active,.btn-outline-danger:not(:disabled):not(.disabled):active{color:#fff;background-color:#dc3545;border-color:#dc3545}.btn-outline-danger:not(:disabled):not(.disabled).active:focus,.btn-outline-danger:not(:disabled):not(.disabled):active:focus{box-shadow:0 0 0 .2rem rgba(220,53,69,.5)}.btn-outline-light:not(:disabled):not(.disabled).active,.btn-outline-light:not(:disabled):not(.disabled):active{color:#212529;background-color:#f8f9fa;border-color:#f8f9fa}.btn-outline-light:not(:disabled):not(.disabled).active:focus,.btn-outline-light:not(:disabled):not(.disabled):active:focus{box-shadow:0 0 0 .2rem rgba(248,249,250,.5)}.btn-outline-dark:not(:disabled):not(.disabled).active,.btn-outline-dark:not(:disabled):not(.disabled):active{color:#fff;background-color:#343a40;border-color:#343a40}.btn-outline-dark:not(:disabled):not(.disabled).active:focus,.btn-outline-dark:not(:disabled):not(.disabled):active:focus{box-shadow:0 0 0 .2rem rgba(52,58,64,.5)}.custom-control-input:focus:not(:checked)~.custom-control-label::before{border-color:#80bdff}.custom-control-input:not(:disabled):active~.custom-control-label::before{color:#fff;background-color:#b3d7ff;border-color:#b3d7ff}.card{position:relative;display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column;min-width:0;word-wrap:break-word;background-color:#fff;background-clip:border-box;border:1px solid rgba(0,0,0,.125);border-radius:.25rem}.card-body{-ms-flex:1 1 auto;flex:1 1 auto;min-height:1px;padding:1.25rem}.card-header{padding:.75rem 1.25rem;margin-bottom:0;background-color:rgba(0,0,0,.03);border-bottom:1px solid rgba(0,0,0,.125)}.card-header:first-child{border-radius:calc(.25rem - 1px) calc(.25rem - 1px) 0 0}.close:not(:disabled):not(.disabled):focus,.close:not(:disabled):not(.disabled):hover{opacity:.75}.justify-content-center{-ms-flex-pack:center!important;justify-content:center!important}@supports ((position:-webkit-sticky) or (position:sticky)){}.mt-5{margin-top:3rem!important}.text-center{text-align:center!important}@media print{*,::after,::before{text-shadow:none!important;box-shadow:none!important}h3{orphans:3;widows:3}h3{page-break-after:avoid}@page{size:a3}body{min-width:992px!important}.container{min-width:992px!important}}
 
  </style>
</head>

<body>
  <div class="container mt-5">
  <?php
  
    if (isset($get_id)) {
      $id = $get_id;
      include_once("../../../db.php");
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      $query = "SELECT
        users.id,
        users.email,
        users.firstname,
        users.middlename,
        users.lastname,
        users.housenumber,
        users.street,
        users.barangay,
        users.city,
        users.state,
        users.zip,
        users.phone,
        users.dob,
        users.gender,
        users.occupation,
        users.active,
        login_acc.username,
        login_acc.password
        FROM users
        INNER JOIN login_acc ON login_acc.username = users.username AND login_acc.password = users.password
        WHERE users.id = $id";
        
      $result = $conn->query($query);
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Populate input fields with data from the database
        $email = $row['email'];
        $firstname = $row['firstname'];
        $middlename = $row['middlename'];
        $lastname = $row['lastname'];
        $housenumber = $row['housenumber'];
        $street = $row['street'];
        $barangay = $row['barangay'];
        $city = $row['city'];
        $state = $row['state'];
        $zip = $row['zip'];
        $phone = $row['phone'];
        $dob = $row['dob'];
        $gender = $row['gender'];
        $occupation = $row['occupation'];
        $active = $row['active'];
        $login_username = $row['username'];
        $login_password = $row['password'];
        // Add more fields as needed
      }
      $conn->close();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Retrieve updated values from the form
      $updatedEmail = $_POST['email'];
      $updatedFirstname = $_POST['firstname'];
      $updatedMiddlename = $_POST['middlename'];
      $updatedLastname = $_POST['lastname'];
      $updatedHousenumber = $_POST['housenumber'];
      $updatedStreet = $_POST['street'];
      $updatedBarangay = $_POST['barangay'];
      $updatedCity = $_POST['city'];
      $updatedState = $_POST['state'];
      $updatedZip = $_POST['zip'];
      $updatedPhone = $_POST['phone'];
      $updatedDob = $_POST['dob'];
      $updatedGender = $_POST['gender'];
      $updatedOccupation = $_POST['occupation'];
      $updatedActive = $_POST['active'];
      $updatedLoginUsername = $_POST['login_username'];
      $updatedLoginPassword = $_POST['login_password'];

      include_once("../../../db.php");
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $updateQuery = "UPDATE users SET
        email = '$updatedEmail',
        firstname = '$updatedFirstname',
        middlename = '$updatedMiddlename',
        lastname = '$updatedLastname',
        housenumber = '$updatedHousenumber',
        street = '$updatedStreet',
        barangay = '$updatedBarangay',
        city = '$updatedCity',
        state = '$updatedState',
        zip = '$updatedZip',
        phone = '$updatedPhone',
        dob = '$updatedDob',
        gender = '$updatedGender',
        username = '$updatedLoginUsername',
        password = '$updatedLoginPassword',
        occupation = '$updatedOccupation',
        active = '$updatedActive'
        WHERE id = $id";

      if ($conn->query($updateQuery) === TRUE) {
      } else {
        echo "Error updating record: " . $conn->error;
      }

     
      $updateQuery = "UPDATE login_acc SET
        username = '$updatedLoginUsername',
        password = '$updatedLoginPassword'
        WHERE id = $id";

      if ($conn->query($updateQuery) === TRUE) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . $conn->error;
      }

      $conn->close();
    }
    ?>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header text-center">
            <h3>Update Information Form</h3>
          </div>
          <div class="card-body">
            <form action="#" method="post">
              <!-- Personal Information -->
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" id="email" value="<?= $email ?>" placeholder="Email">
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="firstname">First Name:</label>
                  <input type="text" class="form-control" name="firstname" id="firstname" value="<?= $firstname ?>" placeholder="First Name">
                </div>
                <div class="form-group col-md-4">
                  <label for="middlename">Middle Name:</label>
                  <input type="text" class="form-control" name="middlename" id="middlename" value="<?= $middlename ?>" placeholder="Middle Name">
                </div>
                <div class="form-group col-md-4">
                  <label for="lastname">Last Name:</label>
                  <input type="text" class="form-control" name="lastname" id="lastname" value="<?= $lastname ?>" placeholder="Last Name">
                </div>
              </div>
              <div class="form-group">
                <label for="gender">Gender:</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="male" value="male" <?= $gender === "male" ? "checked" : "" ?>>
                  <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="female" value="female" <?= $gender === "female" ? "checked" : "" ?>>
                  <label class="form-check-label" for="female">Female</label>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="dob">Date of Birth:</label>
                  <input type="date" class="form-control" name="dob" id="dob" value="<?= $dob ?>" placeholder="Date of Birth">
                </div>
                <div class="form-group col-md-6">
                  <label for="phone">Phone:</label>
                  <input type="text" class="form-control" name="phone" id="phone" value="<?= $phone ?>" placeholder="Phone">
                </div>
              </div>
              <!-- Address Information -->
              <div class="form-group">
                <label for="housenumber">House Number:</label>
                <input type="text" class="form-control" name="housenumber" id="housenumber" value="<?= $housenumber ?>" placeholder="House Number">
              </div>
              <div class="form-group">
                <label for="street">Street:</label>
                <input type="text" class="form-control" name="street" id="street" value="<?= $street ?>" placeholder="Street">
              </div>
              <div class="form-group">
                <label for="barangay">Barangay:</label>
                <input type="text" class="form-control" name="barangay" id="barangay" value="<?= $barangay ?>" placeholder="Barangay">
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="city">City:</label>
                  <input type="text" class="form-control" name="city" id="city" value="<?= $city ?>" placeholder="City">
                </div>
                <div class="form-group col-md-4">
                  <label for="state">State:</label>
                  <input type="text" class="form-control" name="state" id="state" value="<?= $state ?>" placeholder="State">
                </div>
                <div class="form-group col-md-2">
                  <label for="zip">ZIP Code:</label>
                  <input type="text" class="form-control" name="zip" id="zip" value="<?= $zip ?>" placeholder="ZIP Code">
                </div>
              </div>
              <!-- Additional Information -->
              <div class="form-group">
                <label for="occupation">Occupation:</label>
                <input type="text" class="form-control" name="occupation" id="occupation" value="<?= $occupation ?>" placeholder="Occupation">
              </div>
              <div class="form-group">
                <label for="active">Active:</label>
                <input type="text" class="form-control" name="active" id="active" value="<?= $active ?>" placeholder="Active">
              </div>
              <!-- Login Information -->
              <div class="form-group">
                <label for="login_username">Username:</label>
                <input type="text" class="form-control" name="login_username" id="login_username" value="<?= $login_username ?>" placeholder="Username">
              </div>
              <div class="form-group">
                <label for="login_password">Password:</label>
                <input type="password" class="form-control" name="login_password" id="login_password" value="<?= $login_password ?>" placeholder="Password">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Update Profile</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </body>

</html>
