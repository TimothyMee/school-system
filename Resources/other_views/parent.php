<?php 
   require_once '../../core/init.php';

   $session_id = '';
   $session_role = '';

   $session_id = $_SESSION['id'];
   $session_role = $_SESSION['role'];

   if (empty($session_id) || $session_role !== 'parents'){
     redirect::to('../views/login.php');
   }

   $queriesObject =  new queries();
   $results = $queriesObject->Select('*', $session_role, 'id', $session_id,'','','');

   $studentId = $results['student_id'];

   $semester = '';
   $resultValues = array();
   $courses = array();
   $arrayOfInfo = '';
    $units = '';
    $grades = '';
    $totalGradePoints = '';
    $totalPassedUnits = '';
    $GPA ='';
    $totalUnits = '';
    $basicInfo = '';
    $matric_no = '';
    $session = '';
    $semester = '';
    $level ='';
    $department_no ='';
    $department ='';
    $college ='';
    
    /*session and semester*/
        $sessionResult = $queriesObject->selectall('*', 'session');
        $sessionResults = $sessionResult->fetchall(PDO::FETCH_ASSOC);
        $last = array_pop($sessionResults);
        $session = $last['session'];
        $semester = $last['semester'];
   /*end of session and semester*/

            /*querying to get the course and score*/

            $course = $queriesObject->Select('*', 'courses_reg', 'student_id', $studentId,'AND','semester',$semester);
            $result = $queriesObject->Select('*', 'approvedresults', 'student_id', $studentId,'AND','semester',$semester);

            /*to filter through the courses array to get the real courses*/ 
            if (!empty($result) && !empty($course)) {
              
              foreach ($result as $key => $value) {
                if ($key > 4 && !empty($value)) {
                 $resultValues[] = $value;
                }
             }

               foreach ($course as $key => $value) {
                  if ($key > 3 && !empty($value)) {
                   $courses[] = $value;
                  }
              }
         
          $arrayOfInfo = $queriesObject->CGPA($resultValues,$courses);
          $units = $arrayOfInfo['units'];
          $grades = $arrayOfInfo['grades'];
          $totalGradePoints = $arrayOfInfo['total grade points'];
          $totalPassedUnits = $arrayOfInfo['total passed units'];
          $GPA = $arrayOfInfo['gpa'];
          $totalUnits = $arrayOfInfo['total units'];
          $basicInfo = $queriesObject->Select('*', 'students', 'id', $session_id,'','','');
          $matric_no = $basicInfo['matric_no'];
          $department_no = $basicInfo['department'];
          $department = $queriesObject->Select('name', 'departments', 'id', $department_no,'','','');
          $department = $department['name'];
          $level = $basicInfo['level'];
          $session = $basicInfo['Current_session'];
          
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

    <title>McU E-PORTAL </title>

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
              <a href="../views/news.php" class="site_title"><i class="glyphicon glyphicon-home"></i> <span>Home</span></a>
            </div>

            <div class="clearfix"></div>
            <!-- menu prile quick info -->
            <div class="profile">
              
              <div class="profile_info">
                <span><h1>Welcome</h1></span>
                
                
                <h2>(PARENT)</h2>

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
                  <li><a href = "parent.php"><i class="fa fa-desktop"></i>RESULT CHECKER</a></li>                                                    
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
                    <img src="images/img.jpg" alt="">LOGOUT
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
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
         <div class="right_col" role="main" >

          <div class="main container">
                <div class="col-md-12">
                         <br/>
                         <h3><?php
                            $student = $queriesObject->Select('*','students','id',$studentId,'','','');
                            echo $student['surname'] . ' ';
                            echo $student['firstname'];
                         ?></h3>
                         <table class="table table-responsive table-bordered table-hover">
                         <tr>
                           <thead>
                               <th> COURSE CODE </th> 
                               <th> UNITS </th>
                               <th> GRADE</th>
                               <th> TCP</th>
                               <th> TNU</th>
                               <th> TNUP</th>
                               <th> GPA</th>
                               <th> REMARKS</th>
                           </thead>
                       </tr>
                       <?php

                       foreach ($courses as $key => $value) {
                              
                            echo '
                              <tr>
                                 <tbody>
                                    <td><strong>'.$value.'</strong></td>
                                    <td><strong>'.$units[$key].'</strong></td>
                                    <td><strong> '.$resultValues[$key].'</strong></td>
                                    <td><strong> </strong></td>
                                    <td><strong> </strong></td>
                                    <td><strong> </strong></td>
                                    <td><strong> </strong></td>
                                   <td><strong> </strong></td>
                                 </tbody>
                             </tr>
                        ';

                        }

                        echo '
                            <tr>
                              <tfoot>
                                <th></th>
                                 <th></th>
                                 <th></th>
                                 <th>'.$totalGradePoints.'</th>
                                 <th>'.$totalUnits.'</th>
                                 <th>'.$totalPassedUnits.'</th>
                                 <th>'.$GPA.'</th>
                                 <th></th>
                              </tfoot>
                            </tr>
                        ';
                       ?>
                       
                       </table>
                       </div>
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
    <script src="js/moment/moment.min.js"></script>
    <script src="js/datepicker/daterangepicker.js"></script>
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
<!--     <script src="../assests/js/bootstrap.min.js"></script>
 --> <!--    <script src="../assests/js/bootstrap.js"></script>
 -->
  </body>
</html>