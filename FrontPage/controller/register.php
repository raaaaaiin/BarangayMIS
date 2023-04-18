<?php
include('../../db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $firstname = $_POST['firstname'];
  $middlename = $_POST['middlename'];
  $lastname = $_POST['lastname'];
  $housenumber = $_POST['housenumber'];
  $street = $_POST['street'];
  $barangay = $_POST['barangay'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zip'];
  $phone = $_POST['phone'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $occupation = $_POST['occupation'];

  $query = "INSERT INTO users (email, username, password, firstname, middlename, lastname, housenumber, street, barangay, city, state, zip, phone, dob, gender, occupation) VALUES ('$email', '$username', '$password', '$firstname', '$middlename', '$lastname', '$housenumber', '$street', '$barangay', '$city', '$state', '$zip', '$phone', '$dob', '$gender', '$occupation')";

  if (mysqli_query($conn, $query)) {
    echo 'success';
  } else {
    echo $query;
  }
}

mysqli_close($conn);
?>
