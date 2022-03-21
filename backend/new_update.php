<?php
   //code to update users via ajax and also send properties of the affected row to ajax for html table update
   if(!empty($_REQUEST['email']))
   {
      require "connection.php";
      $conn->select_db("school");
      $email = $_REQUEST['email'];
      $username = $_REQUEST['username'];
      $location = $_REQUEST['location'];
      $phone = $_REQUEST['phone'];
      $gender = $_REQUEST['gender'];
      $sql = $conn->prepare("UPDATE users SET Username = '$username', Location = '$location', Phone = '$phone', Gender = '$gender' WHERE Email = ?");
      $sql->bind_param("s", $email);
      $sql->execute();
      $sql = $conn->prepare("SELECT * FROM users WHERE Email = ?");
      $sql->bind_param("s", $email);
      $sql->execute();
      $result = $sql->get_result();
      $array = $result->fetch_assoc();
      $arr[] = array(
         "Email" => $array['Email'],
         "Username" =>  $array['Username'],
         "Phone" =>  $array['Phone'],
         "Password" =>  $array['Password'],
         "Gender" =>  $array['Gender'],
         "Location" =>  $array['Location'],
         "Created_on" => $array['Created_on'],
         "Active" => $array['Active'],
         "Type" => $array['Type'],
         "Status" => $array['Status']
      );
      print json_encode($arr);
   }
   else{
      print "empty";
   }
?>