<?php
  session_start();
  if(empty($_SESSION['login_email'] || $_SESSION['username']))
  {
    header("location: login.php");
  }
  else
  {
    $signed_email = $_SESSION['login_email'];
    $signed_username = $_SESSION['username'];
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="phone/build/css/intlTelInput.css">
  <link rel="stylesheet" href="DataTables-1.11.4/media/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet"  href="css/custom.css">
  <title>User Management system</title>
</head>
<body class="bg-light text-secondary">
  <nav class="navbar navbar-icon-top navbar-expand-lg navbar-light bg-light" style = "opacity: .9">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand text-info" href="#">DASHBOARD</a>
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        
      </ul>
      <form class="form-inline my-2 my-lg-0" method="post" action="backend/logout.php">
        
        <ul class = "navbar-nav">
          <li class="nav-item">
              <a class="nav-link  mt-1 mr-1">
                <span class="bg-light rounded text-info px-1 display-name" style="line-height: 10px;">
                  <?php
                    print $signed_username;
                  ?>
                </span>
              </a>
            </li>
            <li class  ="nav-item">
                <a class = "nav-link text-secondary" href="#">
                  <em class = "bi bi-chat-fill">
                      <span class  = "badge  badge-success">11</span>
                  </em>
                </a>
            </li>
            <li class  ="nav-item mr-3">
                <a class = "nav-link text-secondary" href="#" style="line-height: 9px;">
                  <em class = "bi bi-bell-fill">
                      <span class  = "badge badge-danger">9</span>
                  </em>
                </a>
            </li>
        
            <li class  ="nav-item ml-md-3">
              <button class="btn btn-danger py-2 text-light" type="submit">
                Logout
              </button>
            </li>
        </ul>
      </form>
    </div>
  </nav>
  
   <div class="container-fluid bg-light pt-3">
     <div class="row">
        <!--12 for the table ---------------------------------------->
        <div class="container-fluid bg-light col-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
          <div class="justify-content-center">
            
            <!--end table----------------------------------------------->
            <div class="bg-div">
              <table class="table table-light shadow table-striped table-hover rounded"  id = "table">
                <div class="pl-2 mb-2 row">
                    <div class="col-10">
                      <button class = "btn btn-primary px-2 my-3 py-1" data-toggle="modal" data-target="#Add-User-Modal" 
                        data-keyboard="false" data-backdrop="static"> 
                        <span class = "bi bi-person-plus-fill text-light">  
                          Add User
                        </span>
                      </button>
                    </div>
                    <div class = "col-2 d-flex justify-content-center pt-1">
                      <ul class = "navbar-nav row">
                        <li class  ="nav-item">
                          <a class = "nav-link" href="#" style = "color:grey; font-size: 16px">
                              Users
                            <em class = "bi bi-people-fill" style="font-size: 18px">
                                <span class  = "badge  badge-primary user-badge num_users"></span>
                            </em>
                          </a>
                          <a class = "nav-link" href="#" style = "color:grey; font-size: 16px">
                              Deactivated
                            <em class = "bi bi-people-fill" style="font-size: 18px">
                                <span class  = "badge  badge-danger user-badge num_users_inactive"></span>
                            </em>
                          </a>
                        </li>
                      </ul>
                    </div>
                </div>
                <thead class = "bg-primary text-light">
                  <tr class = "rounded">
                    <th scope = "col" class = "th-lg">USERNAME</th>
                    <th scope = "col"  class = "th-lg">EMAIL</th>
                    <th scope = "col"  class = "th-lg">TELEPHONE</th>
                    <th scope = "col"  class = "th-lg">GENDER</th>
                    <th scope = "col"  class = "th-lg">LOCATION</th>
                    <th scope = "col"  class = "th-lg text-nowrap">CREATED ON</th>
                    <th scope = "col"  class = "th-lg">STATUS</th>
                    <th scope = "col"  class = "th-lg text-center">ACTIVE</th>
                    <th scope = "col"  class = "th-lg">TYPE</th>
                    <th scope = "col" class = "th-lg d-flex justify-content-center">ACTION</th>
                  </tr>
                </thead>
                <?php include "backend/tbody.php";?>
              </table>
            </div>
            
            <!--table ---------------------------------------->
          </div>
          
        </div>
     </div>
   </div>
  
   <!-- add user modal -->
   <form action="backend/register.php" method="POST" class = "py-5 userform">
   <div class="container-fluid bg-light">  
    
      <!-- The Modal ------------------------------------------------->
      <div class="modal fade" id="Add-User-Modal">
        <div class="modal-dialog">
          <div class="modal-content bg-light">
                  
            <!-- Modal Header -->
            <div class="modal-header text-center">
              <h4 class="modal-title"> <span class = "text-center text-primary bi bi-people-fill"> Create A New Account </span></h4>
              <!-- <button type="button" class="close" style="outline:none" data-dismiss="modal">&times;</button> -->
            </div>
      
            <!-- Modal body -->
            <div class="modal-body">
              <div class="row justify-content-center">
               
                  <div class="row justify-content-center">
                    <div class="col-9 my-2">
                      <input type="text" class="form-control bg-light text-secondary" id="username" placeholder="Username" name="username" required>
                    </div>
                    <div class="col-9 mt-2">
                      <input type="text" class="form-control bg-light text-dark" id="email" placeholder="Example@email.com" name="email">
                      <span class="email-error ml-3" style = "font-size: 11px"></span>
                    </div>
                    <div class="col-9">
                      <input type="hidden" class="countrycode" id = "code">
                      <input type="tel" class="form-control bg-light text-secondary intl-tel-input" id = "phone" placeholder="" name="phone" required>
                      <span class="number-error ml-3 m-0" style = "font-size: 11px; visibility:hidden">phone invalid</span>
                    </div>
                    <div class="col-9 mb-2">
                        <select type="text" class="form-control bg-light text-secondary" placeholder="Gender" name="gender">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <div class="col-9 my-2 mb-2 mt-2">
                      <input type="text" class="form-control bg-light text-secondary" placeholder="Location" name="location" required>
                    </div>
                    <div class="col-9 mb-1 mt-2 input-group">
                      <select type="text" class="form-control  text-secondary col-3 cardType" name="cardType" style="background-color: #E8E8E8; border-right: none">
                          <option>visa</option>
                          <option>mastercard</option>
                      </select>
                      <input type="number" maxlength = "16" class="cardnumber form-control bg-light text-secondary col-9" placeholder="1234 5678 9012 3456" name="cardNumber" style="border-left: none;">
                      <span class="card-error ml-3 m-0 col-12 mt-2" style = "font-size: 11px; visibility:hidden">invalid credit card number</span>
                    </div>
                    <div class="col-9 mb-2">
                      <input type="password" class="form-control bg-light text-secondary" placeholder="Enter password" name="pswd" required>
                    </div>
                    <div class="col-9 my-2 mt-2">
                      <input type="password" class="form-control bg-light text-secondary" placeholder="Re-type password" name="pswd2" required>
                    </div>
                    <div class="col-6 mt-3 d-flex justify-content-center">
                      <button type="submit" class="btn btn-primary rounded px-3 py-1 create-user" name = "create"> 
                        <span class = "bi bi-person-check-fill">  
                           Add
                        </span>
                      </button>
                    </div>
                  </div>
                
              </div>
            </div>
      
          </div>
        </div>
      </div>
      <!-- End of modal ----------------------------------------------->
      
    </div>
    </form>
   <!--end of add user modal -->
    
    <div class="container-fluid bg-light">  
      <!-- The Modal ------------------------------------------------->
      <div class="modal fade" id="Delete-Modal">
        <div class="modal-dialog py-0 text-center" style="width: 380px; height: fit-content">
          <div class="modal-content bg-light">
                  
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title text-danger"><em class = "bi bi-exclamation-triangle mx-2 text-danger"></em>Delete Account!</h4>
              <!-- <button type="button" class="close" style="outline:none" data-dismiss="modal">&times;</button> -->
            </div>
      
            <!-- Modal body -->
            <div class="modal-body">
              <h4 class = "text-center text-secondary my-1 mb-4 p-0">Are you sure?</h4>
              <form action="backend/delete_data.php" class = "d-flex justify-content-center"  method = "POST">
                <button type="button" class="btn btn-danger confirm-delete mr-1 px-3 py-0"
                  name = "confirm_delete" data-dismiss="modal">
                  Yes
                </button>
                <button type="button" class="btn btn-primary ml-1 px-3 py-0" data-dismiss="modal">
                  No
                </button>
              </form>
            </div>
      
          </div>
        </div>
      </div>
      <!-- End of modal ----------------------------------------------->
    </div>
    <button  hidden type="button" class="trigger-message-modal btn text-warning bg-light status" 
      name = "status" data-toggle="modal" data-target="#Message-Modal" data-backdrop = "none" 
      data-keyboard = "true" onclick="dismiss_message()">
      dismiss modal
    </button>
    <div class="container-fluid bg-light">  
      <!-- The Modal ------------------------------------------------->
      <div class="modal fade" id="Message-Modal">
        <div class="modal-dialog p-0 rounded" style="width: fit-content; height:10px; border-radius: 20px">
          <div class="modal-content bg-light">
                  
            <!-- Modal body -->
            <div class="modal-body msg-modal rounded bg-primary py-3 px-3" style="font-weight: bold; font-size: 20px; border: none">
              <h7 class = "text-center text-dark p-0"><span class = "bi bi-check-circle-fill text-light  mr-2"></span><span class = "text-light popup-message"></span></h7>
            </div>
      
          </div>
        </div>
      </div>
      <!-- End of modal ----------------------------------------------->
    </div>

    <div class="container-fluid bg-light">  
      <!-- The Modal ------------------------------------------------->
      <div class="modal fade" id="status-modal">
        <div class="modal-dialog" style="width: 300px; height: fit-content; ">
          <div class="modal-content bg-light">
                  
            <!-- Modal Header -->
            <!-- <div class="modal-header text-center">
              <h4 class="modal-title"><span class = "bi bi-exclamation-triangle mx-2 text-wdark status-modal-header"></span></h4>
              <button type="button" class="close" style="outline:none" data-dismiss="modal">&times;</button>
            </div>
            -->
            <!-- Modal body -->
            <div class="modal-body">
              <?php include("backend/get_data.php"); $row = $result->fetch_assoc();?>
              <h4 class = "text-center text-dark my-1 mb-2 status-header"></h4>
              <form action="backend/change_status.php" class = "d-flex justify-content-center"  method = "POST">
                <button type="submit" class="btn btn-danger confirm-status mr-1 px-4 py-0"
                  name = "confirm_status">
                  Yes
                </button>
                <input type="text" id = "status-value" hidden name = "status" value="<?php if($row['Status'] == "active") {print "inactive";} else {print "active";}?>">
                <button type="button" class="btn btn-primary ml-1 px-4 py-0" data-dismiss="modal">
                  No
                </button>
              </form>
            </div>
      
          </div>
        </div>
      </div>
      <!-- End of modal ----------------------------------------------->
    </div>

    <div class="container-fluid">  
      <!-- The Modal ------------------------------------------------->
      <div class="modal fade" id="Edit-Modal">
        <div class="modal-dialog" style = "width: 440px">
          <div class="modal-content bg-light" style = "width: fit-content">
                  
            <!-- Modal Header -->
            <div class="modal-header text-center">
              <h4 class="modal-title"><em class = "bi bi-pencil mx-2 text-info"></em>Change Account Information</h4>
              <!-- <button type="button" class="close" style="outline:none" data-dismiss="modal">&times;</button> -->
            </div>
      
            <!-- Modal body -->
            <div class="modal-body">
              <h3 class = "text-center text-info my-2">Edit Account</h1>
              <form action="backend/update_data.php" class = "d-flex justify-content-center editform"  method = "POST">
                <div class="row justify-content-center">
                  <div class="col-10 my-2">
                    <input type="text" class="form-control bg-light text-dark" id="e_username" placeholder="Username" name="username" required>
                  </div>
                  <div class="col-10 my-2">
                    <input type="email" disabled class="form-control bg-light text-secondary" id="e_email" placeholder="Example@gmail.com" name="email" required>
                  </div>
                  <div class="col-10 my-2">
                      <input type="tel" class="form-control bg-light text-dark intl-tel-input" id ="phone2" placeholder="" value = ""name="phone" required>
                  </div>
                  <div class="col-10 my-2 mb-2">
                    <select type="text" class="form-control bg-light text-dark" placeholder="Gender" name="gender" id = "e_gender">
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                  </div>
                  <div class="col-10 my-2 mb-2">
                    <input type="text" class="form-control bg-light text-dark" placeholder="Location"  id = "e_location" name="location" required>
                  </div>
                  <!-- <div class="col-10 my-2">
                    <input type="password" class="form-control bg-light text-dark" placeholder="Enter password" name="pswd" required>
                  </div> -->
                  <div class="col-6 my-3 d-flex justify-content-center">
                    <button type="button" class="btn btn-info mr-2 px-2 py-1" data-dismiss="modal" style>
                      <span class = "bi bi-arrow-left-circle-fill">
                         Back
                      </span>
                    </button>
                    <button type="submit" class="btn btn-success ml-2 px-2 py-1 update" data-dismiss="modal" name = "update">
                      Save
                      <span class = "bi bi-check2-circle"></span>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- End of modal ----------------------------------------------->
    </div>
</body>
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="js/jquery/dist/jquery.dataTables.js"></script>
  <script type="text/javascript" src="DataTables-1.11.4/media/js/dataTables.bootstrap4.min.js"></script>
  <script src="phone/build/js/intlTelInput.js"></script>
  <script type = "text/javascript" src="js/table.js"></script>
</html>