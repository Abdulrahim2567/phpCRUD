<?php
  if (isset($_REQUEST['email'])) {
    require("connection.php");
    $conn->select_db("school");
    $email = $_REQUEST['email'];
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
      "Status" => $array['Status']
    );
      print json_encode($arr);
  }
  else
  {
    header("location: ../login.php");
  }
?>