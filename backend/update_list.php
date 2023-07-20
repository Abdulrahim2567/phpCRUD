<?php
   //code to add pending user uopdates to server update list for other users
   if(!empty($_REQUEST['email']))
   {
      require_once "connection.php";
      $conn->select_db("school");
      $email = $_REQUEST['email'];
      $index = $_REQUEST['indexValue'];
      $sql = $conn->prepare("INSERT INTO update_list VALUES ('$email', '$index')");
      $sql->execute();
      $sql = $conn->prepare("UPDATE users SET updated = 'no' WHERE Active = 'online'");
      $sql->execute();
   }
?>