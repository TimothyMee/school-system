<?php 
error_reporting(0);
  require_once '../../core/init.php';
   $session_id = '';
   $session_role = '';

   $session_id = $_SESSION['id'];
   $session_role = $_SESSION['role'];
   if (empty($session_id) || $session_role !== 'students'){
     redirect::to('../views/login.php');
   }

  $queriesObject =  new queries();
  $userName = $queriesObject->Select('username', 'students', 'id', $session_id,'','','');
  $userName = $userName['username'];

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
    

  if(isset($_POST['Submit'])){

     $semester = $_POST['semester'];
              /*querying to get the course and score*/

            $course = $queriesObject->Select('*', 'courses_reg', 'student_id', $session_id,'AND','semester',$semester);
            $result = $queriesObject->Select('*', 'results', 'student_id', $session_id,'AND','semester',$semester);

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

    <title>McU Portal - Results</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- jVectorMap -->
    <link href="css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>
     
    <!-- Custom Theme Style -->
    <link href="../assests/css/custom.css" rel="stylesheet">
  </head>

  <body class="nav-md" >
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="glyphicon glyphicon-home"></i> <span>Home</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              
              <div class="profile_info">
                <span><h1>Welcome</h1></span>
                <h2><?php echo $userName; ?></h2>
                
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
                <li><a href = "studentsHome.php"><i class="fa fa-home"></i> News </a></li>
                 
                  <li><a href="coursereg.php"><i class="fa fa-edit"></i> Course Registration</a></li>

                   <li><a href = "resultChecker.php"><i class="fa fa-edit"></i> Result checker</a></li>

                   <li><a href = "#"><i class="fa fa-desktop"></i> Settings <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="profile_update.php">Update Biodata</a></li>
                        <li><a href="../other_views/logout.php">Logout</a></li>
                      </ul>
                    </li>
                    
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
                    <img src="images/img.jpg" alt=""><?php echo $userName; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li>
                      <a href="javascript:;">Help</a>
                    </li>
                    <li><a href="../other_views/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
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
          <form method="post">
            <div class="">
               <div class="col-md-3">

               SELECT SEMESTER: <select class="form-control" name="semester">
                                  <option value="0" selected="selected"> Semester </option>
                                  <option value="1st"> First </option>
                                   <option value="2nd"> Second </option>
 
                                </select>

            </div>
            
            <div class="col-md-6">
                <br>
                <input type="submit" name="Submit" class="btn btn-default">
            </div>
          </form>

               
               <div class="col-md-12" >
              
                  <Label name="semester"> <BR/> <header><H2 ALIGN="CENTER"> SEMESTER RESULT SHEET </H2> </header> </Label>
              </div>
              <div class="col-md-6">
                  <h6 class=" "><strong> MATRIC NUMBER: <?php echo $matric_no; ?></strong> </h6>
              </div>
              <div class="col-md-6">
                  <h6 class=""><strong> SESSION: <?php echo $session; ?></strong> </h6> 
              </div>
            
              <div class="col-md-6"><h6 class="" ><strong> DEPARTMENT: <?php echo $department; ?></strong> </h6> 
              </div>
              <div class="col-md-6"><h6 class="" ><strong> LEVEL: <?php echo $level; ?></strong> </h6> 
              </div>
              <div class="col-md-6">
              <label> </label>
              </div>
          
             
             
              
           <div class="col-md-12">
           <br/>
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
          <div class="col-md-6">
                <h6><strong>TCP: Total Credit Passed</strong> </h6>
                <h6><strong>TNU: Total Number of Units</strong> </h6>
                 <h6><strong>TNUP: Total Number of Units Passed</strong> </h6>
                 <h6><strong>GP: Grade Point</strong> </h6>
                 <h6><strong>GPA: Grade Point Average</strong> </h6>
          </div>
          <div class="">
               <div class="col-md-6 ">
                 
                    <h5 style="text-align:center" > <strong> GRADING SYSTEM </strong></h5>
               <table class="table table-bordered grading">
                   <tr style="border:none">
                     <td style="border:none"><p><strong>Score/Marks Range</strong></p></td>
                     <td style="border:none"><p><strong>Grade</strong></p></td>
                     <td style="border:none"><p><strong>Numeric Grade Point Equivalent</strong></p></td>
                     </tr>
                     <tr>
                         <td style="border:none"><strong>70-100</strong></td>
                         <td style="border:none"><strong>A</strong></td>
                         <td style="border:none"><strong>5.0</strong></td>
                      </tr>
                      <tr>
                     <td style="border:none"><strong>60-69</strong></td>
                     <td style="border:none"><strong>B</strong></td>
                     <td style="border:none"><strong>4.0</strong></td>
                    </tr>
                      <tr>
                     <td style="border:none"><strong>50-59</strong></td>
                     <td style="border:none"><strong>C</strong></td>
                     <td style="border:none"><strong>3.0</strong></td>
                      </tr>
                      <tr>
                     <td style="border:none"><strong>45-49</strong></td>
                     <td style="border:none"><strong>D</strong></td>
                     <td style="border:none"><strong>2.0</strong></td>
                      </tr>
                      <tr>
                     <td style="border:none"><strong>0-44</strong></td>
                     <td style="border:none"><strong>F</strong></td>
                     <td style="border:none"><strong>0</strong></td>
                      </tr>
                </table>
               </div>
               <div class = "col-md-9">
            <button class="btn-btn-primary" id="downlaodBtn">
         <span class="glyphicon glyphicon-paperclip"></span>&nbsp: Download </button> 
         
         <button class="btn-btn-success">
         <span class="glyphicon glyphicon-print"></span>&nbsp:Print </button>
         </div>
  
        </div>
            <br/>
            
                      
            <footer>
          <div class="pull-right">
           
          </div>
          <div class="clearfix"></div>
        </footer>

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
    <script src="js/moment/moment.min.js"></script>
    <script src="js/datepicker/daterangepicker.js"></script>
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../assests/js/custom.js"></script>

  </body>
</html>