<?php
   require("connection.php");
   $conn->select_db("school");
   $sql = "SELECT * FROM users";
   $result = $conn->query($sql);
?>