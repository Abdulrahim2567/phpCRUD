<?php
   if(isset($_POST['sign-in']))
   {
      require("connection.php");
      $conn->select_db("school");
      $email = $_POST['login_email'];
      $password = $_POST['login_password'];
      $sql = $conn->prepare("SELECT * FROM users WHERE Email = ?");
      $sql->bind_param("s", $email);
      $sql->execute();
      $result = $sql->get_result();
      $array = $result->fetch_assoc();
      if($_POST['login_email'] == $array['Email'] && $_POST['login_password'] == $array['Password'])
      {
         session_start();
         if($array['Status'] == "inactive")
         {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $conn->real_escape_string($password);
            $_SESSION['inactive'] = "Account disabled, contact the admin for support";
            $_SESSION['login_error2'] ="error";
            header("location: ../login.php");
         }
         else
         {
            $_SESSION['login_email'] = $array['Email'];
            $_SESSION['login_password'] = $array['Password'];
            $_SESSION['username'] = $array['Username'];
            $sql = $conn->prepare("UPDATE users SET Active = 'online' WHERE Email = ?");
            $sql->bind_param("s", $email);
            $sql->execute();
            header("location: ../index.php");
         }
      }
      else
      {
         session_start();
         $_SESSION['logged_in'] = "true";
         $_SESSION['email'] = $email;
         $_SESSION['password'] = $conn->real_escape_string($password);
         $_SESSION['login_error'] = "Email or password incorrect";
         $_SESSION['login_error2'] ="error";
         header("location: ../login.php");
      }
   }
?>