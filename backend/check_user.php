<?php
   //php code to check if user exists when creating a user user
   //true == exist
   //false == doesn't exist
   //error == failed to execute db query
   require "connection.php";
   $conn->select_db("school");
   $email = $_REQUEST['email'];
   $sql = $conn->prepare("SELECT COUNT(DISTINCT Email) AS number FROM users WHERE Email LIKE ?");
   $sql->bind_param("s", $email);
   if($sql->execute())
   {
      $result = $sql->get_result();
      $row = $result->fetch_assoc();
      if($row['number'] > 0)
      {
         print "true";
      }
      else
      {
         print "false";
      }
   }
   else{
      print "error";
   }
?>