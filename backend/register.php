<?php
   include "session.php";
   if($_SESSION['logged_in'] != "true")
   {
     header("location: ../login.php");
   }
   class Users{
      public function __construct($username, $email, $phone, $gender, $location, $cardtype, $cardnumber, $pass)
      {
         $this->email = $email;
         $this->password = $pass;
         $this->username = $username;
         $this->gender = $gender;
         $this->location = $location;
         $this->cardType = $cardtype;
         $this->cardNumber = $cardnumber;
         $this->phone = $phone;
      }
      //method to register new accounts
      public function Register()
      {
         include "connection.php";//creating a connection to localhost
         $conn->select_db("school");//selecting database
         //prepare an sql command with incomplete params
         $sql = $conn->prepare("INSERT INTO users (Email, Username, Phone, Gender, Location, CardType, CardNumber, Password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
         //initializing params
         $Email = $this->email;
         $Username = $this->username;
         $Phone = $this->phone;
         $Password = $this->password;
         $Gender = $this->gender;
         $Location = $this->location;
         $CardType = $this->cardType;
         $CardNumber = $this->cardNumber;
         //bind params to the prepared sql query
         $sql->bind_param("ssssssss", $Email, $Username, $Phone, $Gender, $Location, $CardType, $CardNumber, $Password);
         //execute sql query
         $sql->execute();
      }
      private $username;
      private $email;
      private $phone;
      private $password;
      private $gender;
      private $location;
      private $cardType;
      private $cardNumber;
   }

   if(isset($_POST['create']))
   {
      $users_can = new Users ($_POST['username'], $_POST['email'], $_POST['phone'], $_POST['gender'], $_POST['location'], $_POST['cardType'], $_POST['cardNumber'], $_POST['pswd']);
      $users_can->Register();
      header("location: ../index.php");
   }
?>