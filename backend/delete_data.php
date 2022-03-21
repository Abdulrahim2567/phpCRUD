<?php 
  //code used by ajax to delete users from the system
  $email = $_REQUEST['email'];
  include "session.php";
  require "connection.php";
  $conn->select_db("school");
  $sql = $conn->prepare("DELETE FROM users WHERE Email = ?");
  $sql->bind_param("s", $email);
  if($sql->execute())
  {
    print "true"; die;
  }
  if($_SESSION['logged_in'] != "true")
  {
    header("location: login.php");
  }
?>