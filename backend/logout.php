<?php
   session_start();
   require "connection.php";
   $conn->select_db('school');
   $sql = $conn->prepare("UPDATE users SET Active = 'offline' WHERE Email = ?");
   $sql->bind_param("s", $_SESSION['login_email']);
   $sql->execute();
   unset($_SESSION['logged_in']);
   unset($_SESSION['login_email']);
   unset($_SESSION['login_password']);
   unset($_SESSION['username']);
   session_destroy();
   header("location: ../login.php");
?>