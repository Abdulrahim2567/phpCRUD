<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <meta name="Description" content="Enter your description here"/>
   <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="css/bootstrap-icons/font/bootstrap-icons.css">
   <link rel="stylesheet" href="css/custom.css">
   <title>Sign-in</title>
</head>
<body>
   <div class="container">
      <div class="row justify-content-center height align-items-center">
         <div class="card login-card">
            <form action="backend/login.php" method = "post" class="card-body">
               <div class="text-center">
                  <img class = "img-fluid img-thumbnail p-0 image-profile rounded-circle mb-4"  type="image" src="img/profile.png" alt="profile">
               </div>
               <div class="row justify-content-center">
                  <div class="col-4 pt-1" style="color: #00acee; font-size: 18px">
                     <span>Sign in</span>
                  </div>
                  <div class="col-4 pl-5"style="font-size: 23px">
                     <span class="bi bi-facebook mr-3 ml-3" style="color: #3b5998"></span>
                     <span class="bi bi-twitter" style="color: #00acee"></span>
                  </div>
               </div>
               <div class="row justify-content-center">
                  <div class="col-8 my-2">
                     <input type="email" class="form-control" id="login-email" value = "<?php session_start(); if (!empty($_SESSION['login_error2'])) {print $_SESSION['email'];}?>" placeholder="example@email.com" name="login_email" required>
                  </div>
                  <div class="col-8 my-2 mb-2">
                     <input type="password" class="form-control" id="login-password" placeholder="**********" name="login_password" required>
                  </div>
               </div>
               <div class="col-12 my-2 mb-2 form-check text-center text-secondary" style="font-size: 0.9rem;">
                  <input type="checkbox" class="form-check-input" id="login-as-admin" value = "" name = "login-as" style = "cursor: pointer">
                  <lable class="form-check-lable" for="flexCheckDefault">Login as Admin</lable>
               </div>
               <div class="col-8 email-incorrect <?php (!empty($_SESSION['inactive']))? print "text-warning" : print "text-danger"?>"
                  style="font-size: .7em; font-weight: bold; <?php (!empty($_SESSION['inactive']))? print "margin-left: 78px" : print "margin-left: 130px"?>">
                  <span class = "email_incorrect_password">
                     <?php
                        if(!empty($_SESSION['login_error']))
                        {
                           print $_SESSION['login_error'];
                           unset($_SESSION['login_error']);
                           session_destroy();
                        }
                        if(!empty($_SESSION['inactive']))
                        {
                           print $_SESSION['inactive'];
                           unset($_SESSION['inactive']);
                           session_destroy();
                        }
                     ?>               
                  </span>
               </div>
               <div class="col-8 my-2 mt-2 terms" style="color: darkgray; font-size: .7em;">
                  <span>By signing in, you agree to our terms and conditions</span>
               </div>
               <button type="submit" class="btn btn-outline-primary rounded col-3 mt-2 mb-3 sign-in" id = "sign-in" name = "sign-in">
                  <span class = "bi bi-check2-circle">
                     Sign-in
                  </span>
               </button>
            </form>
         </div>
      </div>   
   </div>

</body>
   <script src="node_modules/jquery/dist/jquery.min.js"></script>
   <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
   <script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</html>