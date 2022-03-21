<?php 
   //code to count and return number of users of the system
   require "connection.php";
   $conn->select_db("school");
   $sql = "SELECT COUNT(*) AS num FROM users";
   $result = $conn->query($sql);
   $data = $result->fetch_assoc();
   print $data['num'];  
?>