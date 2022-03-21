<?php
  include "session.php";
  require("connection.php");
  if($_SESSION['logged_in'] != "true")
  {
    header("location: login.php");
  }
  $conn->select_db("school");
  $update_email = $_POST['update'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $phone = $_POST['phone'];
  $password = $_POST['pswd'];
  $gender = $_POST['gender'];
  $location = $_POST['location'];
  $sql = $conn->prepare("UPDATE users SET Email = '$email', Username = '$username', Phone = '$phone', Gender = '$gender', Location = '$location',Password = '$password' WHERE Email = ?");
  $sql->bind_param("s", $update_email);
  $sql->execute();
  header("location: ../index.php");
?> 