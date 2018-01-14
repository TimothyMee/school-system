<?php

  require_once '../../core/init.php';
  require_once '../../core/hash.php';

   $session_id = '';
   $session_role = '';

   $session_id = $_SESSION['id'];
   $session_role = $_SESSION['role'];
   if (empty($session_id) || $session_role !== 'admin'){
     redirect::to('../views/login.php');
   }
   
  $queriesObject =  new queries();

  /*queried the database for the admin's info*/
  $results = $queriesObject->Select('*', $session_role, 'id', $session_id,'','','');
  $username = $results['username'];

  if(isset($_POST['registerStudent'])){
    $newsurname = $_POST['surname'];
    $newfirstname = $_POST['firstname'];
    $newmiddlename = $_POST['middlename'];
    $newmatricNo = $_POST['matricNo'];
    $newphoneNo = $_POST['phoneNo'];
    $newparentEmail = $_POST['parentEmail'];
    $newaddress = $_POST['address'];
    $newcourseOfStudy = $_POST['courseOfStudy'];
    $newdepartment = $_POST['department'];
    $newgender = $_POST['gender'];
    $newlevel = $_POST['level'];
    $newDOB = $_POST['DOB'];
    $newAdmissionSession = $_POST['AdmissionSession'];

    $lenght = 10;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLenght = strlen($characters);
    $randomString = '';
    for($i = 0; $i < $lenght; $i++){
      $randomString .= $characters[rand(0, $charactersLenght -1)];
    }
    $randomString;
    /*hashing the password*/
    $newpassword = hash::passwordhash($randomString);
    
    /*session and semester*/
    $CurrentSessionResult = $queriesObject->selectall('*', 'session');
        $CurrentSessionResult = $CurrentSessionResult->fetchall(PDO::FETCH_ASSOC);
           $last = array_pop($CurrentSessionResult);
           $session = $last['session'];
           $semester = $last['semester'];
    /*end of session and semester*/

    $newusername =  $newfirstname . $newmiddlename;

    $params = array('id', 'surname', 'firstname', 'middlename', 'username', 'email', 'parent_email', 'password', 'DOB', 'address', 'matric_no', 'image_name', 'telephone', 'gender', 'level', 'Admission_session', 'department', 'Course_of_study', 'Current_session', 'Role', 'remember_token', 'created_at', 'updated_at');
    $values = array('', $newsurname, $newfirstname, $newmiddlename, $newusername, '', $newparentEmail, $newpassword, $newDOB, $newaddress, $newmatricNo,'', $newphoneNo, $newgender, $newlevel, $newAdmissionSession, $newdepartment, $newcourseOfStudy, $session, 'Student',  '', date('y-m-d h:i:s'), date('y-m-d h:i:s'));



   
   $textMessage = 'Here is your New Username: ' . $newusername. ' And Password: '. $randomString;
   $messageResult =  $queriesObject->sendMessage('E-PORTAL', $newphoneNo, $textMessage);
   echo '<script>alert("The Username And Password Message report is '.$messageResult.'");</script>';

  if ($messageResult == 'SUCCESS') {
      $lastid = $queriesObject->iinnsseertt('students', $params, $values);
     
      $parentParam = array('id','student_id', 'email', 'password');
      // hsshing the surname as password
      $parentPassword = hash::passwordhash($newsurname);

      $parentValues = array('',$lastid, $newparentEmail, $parentPassword);
      $queriesObject->insert('parents', $parentParam, $parentValues);
    }
   
  }




  if (isset($_POST['registerStaff'])) {
    $newsurname = $_POST['surname'];
    $newfirstname = $_POST['firstname'];
    $newmiddlename = $_POST['middlename'];
    $newphoneNo = $_POST['phoneNo'];
    $newemail = $_POST['email'];
    $newdepartment = $_POST['department'];

    $lenght = 10;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLenght = strlen($characters);
    $randomString = '';
    for($i = 0; $i < $lenght; $i++){
      $randomString .= $characters[rand(0, $charactersLenght -1)];
    }
   $randomString;
    /*hashing the password*/
    $newpassword = hash::passwordhash($randomString);

    /*username*/
    $newusername = $newfirstname . $newsurname;

    $params = array('id', 'username', 'password', 'department', 'phone', 'email');
    $values = array('', $newusername, $newpassword, $newdepartment, $newphoneNo, $newemail);

   $textMessage = 'Here is your New Username: ' . $newusername. ' And Password: '. $randomString;
   $messageResult =  $queriesObject->sendMessage('E-PORTAL', $newphoneNo, $textMessage);
   echo '<script>alert("The Username And Password Message report is '.$messageResult.'");</script>';

   if ($messageResult == 'SUCCESS') {
    $queriesObject->insert('senate', $params, $values);
   }

  }



  if (isset($_POST['registerAdmin'])) {
    $newusername = $_POST['newusername'];
    $newphoneNo = $_POST['phoneNo'];
    $newemail = $_POST['email'];
    $newdepartment = $_POST['department'];
    $newsuperAdmin = $_POST['superAdmin'];

    $lenght = 10;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLenght = strlen($characters);
    $randomString = '';
    for($i = 0; $i < $lenght; $i++){
      $randomString .= $characters[rand(0, $charactersLenght -1)];
    }
   $randomString;
    /*hashing the password*/
    $newpassword = hash::passwordhash($randomString);

    $params = array('id', 'username', 'password', 'department', 'image', 'email', 'phone', 'super_admin');
    $values = array('', $newusername, $newpassword, $newdepartment, '', $newemail, $newphoneNo, $newsuperAdmin);

   $textMessage = 'Here is your New Username: ' . $newusername. ' And Password: '. $randomString;
   $messageResult =  $queriesObject->sendMessage('E-PORTAL', $newphoneNo, $textMessage);
   echo '<script>alert("The Username And Password Message report is '.$messageResult.'");</script>';

   if ($messageResult == 'SUCCESS') {
    $queriesObject->insert('admin', $params, $values);
   }

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

    <title> McU E-PORTAL-Add Personel </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../assests/css/custom.css" rel="stylesheet">
  </head>

  <body class="nav-md" >
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="adminHome.php" class="site_title"><i class="glyphicon glyphicon-home"></i> <span>Home</span></a>
            </div>

            <div class="clearfix"></div>
            <!-- menu prile quick info -->
            <div class="profile">
              
              <div class="profile_info">
                <span><h1>Welcome</h1></span>
                <h2><?php echo $username;?></h2>
                
                <h2>(ADMIN)</h2>

              </div>
            </div>
            <!-- /menu prile quick info -->

            <br />
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
                <li><a href = "addStudent.php"> ADD PERSONEL </a>
                  </li>
                <li><a href = "ADDSESSION.php">ADD SESSION</a>
                 </li>
                 
                  <li><a href="add course.php">ADD COURSE</a>
      
                  </li>

                  <li><a href = "sms.php"> SEND MESSAGE</a>  
                  </li>
                   <li><a href = "addnews.php">ADD NEWS </a>
                  </li>
                  <li><a href = "COMPUTEresult.PHP">COMPUTE RESULTS</a></li>
                  <li><a href = "profile_update.PHP"><i class="fa fa-desktop"></i> Update Profile</a></li>
                    
                  
                  
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
                 <a href="../other_views/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    
                  </a>
                  
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
          <div class="col-md-4">
              <form method="post">
                  <h2>Register Student</h2>
                  <input type="text" class="form-control" name="surname" placeholder="Enter Student's Surname" required><br>
                  <input type="text" class="form-control" name="firstname" placeholder="Enter Student's Firstname" ><br>
                  <input type="text" class="form-control" name="middlename" placeholder="Enter Student's Middle"><br>
                  <input type="text" class="form-control" name="matricNo" placeholder="Enter Student's Matric_no"><br>
                  <input type="text" class="form-control" name="phoneNo" placeholder="Enter Student's Phone_no"><br>
                  <input type="email" class="form-control" name="parentEmail" placeholder="Enter Student's Parent Email"><br>
                  <input type="text" class="form-control" name="address" placeholder="Enter Student's Residental Address"><br>
                  <input type="text" class="form-control" name="courseOfStudy" placeholder="Enter Student's Course of Study"><br>
                  <input type="text" class="form-control" name="AdmissionSession" placeholder="Enter Student's Session of Admission (2015/2016)"><br>
                  <select class="form-control" name="department">
                     <option value="0" selected="selected"> Department </option>
                     <option value="1" > History and Management Studies </option>
                     <option value="2" > English </option>
                     <option value="3" > International Relations</option>
                     <option value="4" > Biological Sciences </option>
                     <option value="5" > Statistics</option>
                       <option value="6" > Physical and Computer Sciences </option>
                       <option value="7" > Physics </option>
                       <option value="8" > Accounting </option>
                       <option value="9" > Economics </option>
                       <option value="10" > Mass Communiation </option>
                       <option value="11" > Business Adminstration </option>
                 </select><br> 
                 <div class="container">      
                    <div class="col-md-6">
                      <select class="form-control" name="gender">
                        <option value="0">Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <select class="form-control" name="level">
                        <option value="0">Level</option>
                        <option value="100L">100L</option>
                        <option value="200L">200L</option>
                        <option value="300L">300L</option>
                        <option value="400L">400L</option>
                      </select>
                    </div>
                    <div class="col-md-12"><br>
                      DOB:
                      <input type="date" name="DOB" class="form-control">
                    </div>
                  </div>

                  <div style="margin-top:10px;">
                      <input type="submit" name="registerStudent" value="Register Student" class="btn btn-primary">
                      <input type="reset" name="reset" value="Reset" class="btn btn-danger">
                  </div>
            </form>
        </div>




        <div class="col-md-4">
              <form method="post">
                  <H2>Register Staff</H2>
                  <input type="text" class="form-control" name="surname" placeholder="Enter Staff's Surname" required><br>
                  <input type="text" class="form-control" name="firstname" placeholder="Enter Staff's Firstname" ><br>
                  <input type="text" class="form-control" name="middlename" placeholder="Enter Staff's Middle"><br>
                  <input type="text" class="form-control" name="phoneNo" placeholder="Enter Staff's phoneNo"><br>
                  <input type="email" class="form-control" name="email" placeholder="Enter Staff's Email"><br>
                  <input type="text" class="form-control" name="role" placeholder="Enter Staff's role"><br>
                  <select class="form-control" name="department">
                     <option value="0" selected="selected"> Department </option>
                     <option value="1" > History and Management Studies </option>
                     <option value="2" > English </option>
                     <option value="3" > International Relations</option>
                     <option value="4" > Biological Sciences </option>
                     <option value="5" > Statistics</option>
                       <option value="6" > Physical and Computer Sciences </option>
                       <option value="7" > Physics </option>
                       <option value="8" > Accounting </option>
                       <option value="9" > Economics </option>
                       <option value="10" > Mass Communiation </option>
                       <option value="11" > Business Adminstration </option>
                 </select><br> 
                  <div style="margin-top:10px;">
                      <input type="submit" name="registerStaff" value="Register Staff" class="btn btn-primary">
                      <input type="reset" name="reset" value="Reset" class="btn btn-danger">
                  </div>  
              </form>
          </div>


          <div class="col-md-4">
              <form method="post">
                  <H2>Register Admin</H2>
                  <input type="text" class="form-control" name="newusername" placeholder="Enter Admin's username" required><br>
                  <input type="text" class="form-control" name="department" placeholder="Enter Admin's department" ><br>
                  <input type="text" class="form-control" name="phoneNo" placeholder="Enter Admin's phoneNo"><br>
                  <input type="email" class="form-control" name="email" placeholder="Enter Admin's Email"><br>
                  Super Admin: <select name="superAdmin" class="form-control">
                    <option>Super Admin</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                  </select>
                  <div style="margin-top:10px;">
                      <input type="submit" name="registerAdmin" value="Register Admin" class="btn btn-primary">
                      <input type="reset" name="reset" value="Reset" class="btn btn-danger">
                  </div>  
              </form>
          </div>
          

      </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
  

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../assests/js/moment/moment.min.js"></script>
    <script src="../assests/js/datepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>

     <!-- Custom Theme Scripts -->
    <script src="../assests/js/custom.js"></script>
    <script src="../assests/js/myjs.js"></script>

  </body>
</html>