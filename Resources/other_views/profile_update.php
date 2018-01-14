<?php  

require_once '../../core/init.php';
require_once '../../core/hash.php';

 $session_id = '';
   $session_role = '';
  $department = '';

   $session_id = $_SESSION['id'];
   $session_role = $_SESSION['role'];
   if (empty($session_id) || $session_role !== 'senate'){
     redirect::to('../views/login.php');
   }

 
    $queriesObject =  new queries();  


    /*to query the db for the users info*/
    $result = $queriesObject->Select('*',$session_role,'id',$session_id,'','','');
    $username = $result['username'];
    $originaloldpassword = $result['password'];

 
    /*to update profile now*/
    if(isset($_POST['update'])){
       $nUsername = '';
       $newPasswordC = '';
       $nTelephone='';
       $nEmail='';
       $imageName = '';
       $nUsername = $_POST['nUsername'];
       
       $oldp = $_POST['oldp'];
       

            /*code to check old password*/
            if (!empty($oldp)){

              /*hashing the password*/
              $oldp = hash::passwordhash($oldp);
                if($oldp == $originaloldpassword){

                 $newPassword = $_POST['newPassword'];
                    /*hashing the password*/
                  $newPassword = hash::passwordhash($newPassword);

                   $newPasswordC = $_POST['newPasswordC'];
                    /*hashing the password*/
                  $newPasswordC = hash::passwordhash($newPasswordC);
                }
                else{
                     echo "<script>
                            alert('The Old Password You Entered is wrong');
                          </script>";
                  $newPasswordC = '';
                }

              }
            /*end of the code to check password*/
       
       $nTelephone = $_POST['nTelephone'];
       $nEmail = $_POST['nEmail'];

        $values = array(
          'username' => $nUsername,
          'password' => $newPasswordC,
          'phone' => $nTelephone,
          'email' => $nEmail
          );

        $imageName = '' ;

     $queriesObject->Update($session_role, $session_id, $values, 'profile_update.php'); 

    }


 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>McU Portal - Update</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- jVectorMap -->
    <link href="css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="../assests/css/custom.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">

              <a href="studentsHome.php" class="site_title"><i class="glyphicon glyphicon-home"></i> <span>Home</span></a>

            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              
              <div class="profile_info">
                <span><h1>Welcome</h1></span>
                <?php echo '<h2>'.$username.'</h2>'?>
                
                <h2>(STUDENT)</h2>

              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
            <br/>
            <br />
            <br/>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
               <br/>
               <br/>
                <ul class="nav side-menu">
                <br/>
                  <li><a href = "senate.php"><i class="fa fa-desktop"></i>VIEW STUDENTS</a></li>                          
                  <li><a href = "profile_update.php"><i class="fa fa-desktop"></i>EDIT PROFILE</a></li>                          
                </ul>
              </div>
             
            </div>
            <!-- /sidebar menu -->

            
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php echo $username; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                  
                    
                    <li>
                      <a href="javascript:;">Help</a>
                    </li>
                    <li><a href="../other_views/logout.php" name="logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    
                  </a>
                  
                </li>

              </ul>
            </nav>
          </div>

        </div>
        <!-- /top navigation -->


        <!-- page content -->
        <div class="right_col" role="main">

        <form method="post" enctype="multipart/form-data">
          
          <div class="col-md-5"> 
            <div class="col-md-9">
                <h3>Change Username (<?php echo $username;?>)</h3><hr>  
                <input type="text" name="nUsername" class="form-control" placeholder="Enter New Username" id="nusername" onchange="username('nusername', 'username_Veri')"><br>
            </div>
            <div class="col-md-3">
                <i class="fa fa-edit" id="username_Veri"></i> 
            </div>
            
            <div class="col-md-12"><h3>Change Password</h3><hr></div>
            <div class="col-md-9">
                <h4>Enter Old Password: </h4><input type="password" name="oldp" class="form-control" id="oldp" onchange="oldPassword('','oldPassword', 'oldPassword_Veri')">
            </div>
             <div class="col-md-3">
                <i class="fa fa-edit" id="oldPassword_Veri"></i>          
            </div>

            <div class="col-md-9">
                <h4>Enter New Password: </h4><input type="password" name="newPassword" class="form-control" id="newPassword">
            </div>

            <div class="col-md-9">
                <h4>Confirm New Password: </h4><input type="password" name="newPasswordC" class="form-control" id="newPasswordC" onchange="password('newPassword','newPasswordC', 'Password_Veri')">
            </div>
            <div class="col-md-3">
                <i class="fa fa-edit" id="Password_Veri"></i>          
            </div>
          </div>

          <div class="col-md-4">
            <h4>Update Phone Number(<?php echo $result['phone']; ?>)</h4><hr>  
            <div class="col-md-9"><input type="text" name="nTelephone" placeholder="Enter Your Telephone Number" class="form-control" id="telephone" onchange="validate_telephone('telephone', 'telephone_Veri')"><br></div>
            <div class="col-md-3"><i class="fa fa-edit" id="telephone_Veri"></i>  </div>

            
            <div class="col-md-12"><h4>Update Email(<?php echo $result['email']; ?>)</h4><hr></div>
            <div class="col-md-9"><input type="email" name="nEmail" placeholder="Enter Your Email Address" class="form-control" id="email" 
                  onchange="validate_email('email','email_Veri')"></div>
            <div class="col-md-3"><i class="fa fa-edit" id="email_Veri"></i>  </div>

            <div class="col-md-12">
               <input type="submit" name="update" value="Update" class="btn btn-primary" style="float:right; margin-top:20%;">
               <input type="reset" name="" value="Reset" class="btn btn-danger" style="float:right; margin-top:20%;">
            </div>          
          </div>
        </form>

      </div>   

        <!-- footer content -->
      <div class="clearfix"></div>
        <!-- /footer content -->
        
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../assests/js/flot/jquery.flot.orderBars.js"></script>
    <script src="../assests/js/flot/date.js"></script>
    <script src="../assests/js/flot/jquery.flot.spline.js"></script>
    <script src="../assests/js/flot/curvedLines.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../assests/js/moment/moment.min.js"></script>
    <script src="../assests/js/datepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../assests/js/custom.js"></script>
    <script src="../assests/js/myjs.js"></script>


  </body>
</html>