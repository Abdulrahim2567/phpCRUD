<?php
   require "connection.php";
   if(isset($_POST['confirm_status']))
   {
      $conn->select_db('school');
      $email = $_POST['confirm_status'];
      $status = $_POST['status'];
      $status == "active" ? $status = "inactive" : $status = "active";
      $sql = $conn->prepare("UPDATE users SET  Status = '$status' WHERE Email = ?");
      $sql->bind_param("s", $email);
      $sql->execute();
      header("location: ../index.php");
   }
?>