<?php
   require "connection.php";
   $conn->select_db("school");
   $sql = $conn->prepare("SELECT * FROM update_list LIMIT 1");
   $sql->execute();
   $result = $sql->get_result();
   $array1 = $result->fetch_assoc();
   $newEmail = $array1['Email'];
   $index = $array1['IndexValue'];
   $sql = $conn->prepare("SELECT Username, Location, Phone, Gender, Active, Status FROM users WHERE Email = ?");
   $sql->bind_param("s", $newEmail);
   $sql->execute();
   $result = $sql->get_result();
   $array = $result->fetch_assoc();
   $arr[] = array(
      "Username" =>  $array['Username'],
      "Phone" =>  $array['Phone'],
      "Gender" =>  $array['Gender'],
      "Location" =>  $array['Location'],
      "Status" => $array['Status'],
      "Active" => $array['Active'],
      "Index" => $index
   );
   //get email which has applied updates
   $sql= $conn->prepare("SELECT Email FROM users WHERE updated LIKE 'no' LIMIT 1");
   $sql->execute();
   $result = $sql->get_result();
   $arrayE = $result->fetch_assoc();
   $email = $arrayE['Email'];
   //get all users in db
   $sql = "SELECT COUNT(Email) AS all_users FROM users";
   $result = $conn->query($sql);
   $data = $result->fetch_assoc();
   $all_users = $data['all_users'];
   //get users who already applied updates
   $sql = "SELECT COUNT(Email) AS updated_users FROM users WHERE updated LIKE 'yes'";
   $result = $conn->query($sql);
   $data = $result->fetch_assoc();
   $updated_users = $data['updated_users'];

   if($all_users == $updated_users)
   {
      $sql = $conn->prepare("DELETE FROM update_list WHERE Email = ?");
      $sql->bind_param("s", $newEmail);
      $sql->execute();
   }
   print json_encode($arr); 
   
   $sql= $conn->prepare("UPDATE users SET updated = 'yes' WHERE Email = ?");
   $sql->bind_param("s", $email);
   $sql->execute(); 
?>