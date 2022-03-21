<?php 
   //code to count and return number of disabled users
   require "connection.php";
   $conn->select_db("school");
   $sql = "SELECT COUNT(*) AS deactivated FROM users WHERE Status = 'inactive' ";
   $result = $conn->query($sql);
   $data = $result->fetch_assoc();
   print $data['deactivated'];
?>