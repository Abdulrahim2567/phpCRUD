<?php
   include "session.php";
   require("connection.php");
   if($_SESSION['logged_in'] != "true")
   {
     header("location: login.php");
   }
   $conn->select_db("school");
   $sql = "SELECT Username, Email, Phone, Gender, Location, Created_on, Status FROM users";
   $result = $conn->query($sql);
   while ($array = $result->fetch_assoc())
   {
      $arr[] = array(
         "Email" => $array['Email'],
         "Username" =>  $array['Username'],
         "Phone" =>  $array['Phone'],
         "Gender" =>  $array['Gender'],
         "Location" =>  $array['Location'],
         "Created_on" =>  $array['Created_on'],
         "Status" => $array['Status']
       );
   }
   print json_encode($arr);
?>