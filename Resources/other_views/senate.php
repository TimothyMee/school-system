<?php 
   require_once '../../core/init.php';

   $session_id = '';
   $session_role = '';

   $session_id = $_SESSION['id'];
   $session_role = $_SESSION['role'];

   if (empty($session_id) || $session_role !== 'senate'){
     redirect::to('../views/login.php');
   }

   $queriesObject =  new queries();
   $staffInfo = $queriesObject->Select('*', $session_role, 'id', $session_id,'','','');





   if (isset($_POST['approve'])) {
     $hidden_student_id = $_POST['student_id'];
     $academicSession = $_POST['academicSession'];
     $academicSemester = $_POST['academicSemester'];

     $the_results = $queriesObject->Select('*','results','id', $hidden_student_id,'','','');

     $admin_id = $the_results['admin_id'];

     $status = 1;
     $major_result = array();
     $counter = 1;
     foreach ($the_results as $key => $value) {
       if ($key == 'course'.$counter && !empty($value)) {
         $major_result[] = $value;
         $counter++;
       }
     } 
     $queriesObject->registerCoursesAdvanced('approvedresults',$admin_id, $academicSession, $academicSemester, $hidden_student_id,$major_result, $status);
   }elseif (isset($_POST['disapprove'])) {
     $hidden_student_id = $_POST['student_id'];
     $academicSession = $_POST['academicSession'];
     $academicSemester = $_POST['academicSemester'];

     $the_results = $queriesObject->Select('*','results','id', $hidden_student_id,'','','');

     $admin_id = $the_results['admin_id'];

     $status = 0;
     $major_result = array();
     $counter = 1;
     foreach ($the_results as $key => $value) {
       if ($key == 'course'.$counter && !empty($value)) {
         $major_result[] = $value;
         $counter++;
       }
     } 
     $queriesObject->registerCoursesAdvanced('disapprovedresults',$admin_id,$academicSession, $academicSemester,$hidden_student_id,$major_result, $status);
   }





   if (isset($_POST['action'])) {
      $id_of_students_to_perform_action_on = $_POST['checkboxes'];
      $action = $_POST['actions'];
       $academicSession = $_POST['academicSession'];
       $academicSemester = $_POST['academicSemester'];
       
      if ($action == 'approved') {
        $action = 'approvedresults';
        $status = 1;
      }elseif ($action == 'disapproved') {
        $action = 'disapprovedresults';
        $status = 0;
      }

      foreach ($id_of_students_to_perform_action_on as $key => $value) {
         $student_id = $value;
         $the_results = $queriesObject->Select('*','results','id', $student_id,'','','');

         $admin_id = $the_results['admin_id'];

         $major_result = array();
         $counter = 1;
         foreach ($the_results as $key => $value) {
           if ($key == 'course'.$counter && !empty($value)) {
             $major_result[] = $value;
             $counter++;
           }
         } 
         $queriesObject->registerCoursesAdvanced($action,$admin_id,$academicSession, $academicSemester,$student_id,$major_result, $status);
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
              <a href="#" class="site_title"><i class="glyphicon glyphicon-home"></i> <span>Home</span></a>
            </div>

            <div class="clearfix"></div>
            <!-- menu prile quick info -->
            <div class="profile">
              
              <div class="profile_info">
                <span><h1>Welcome</h1></span>
                
                
                <h2>(SENATE)</h2>

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
                    <img src="images/img.jpg" alt="">user's name
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li>
                      <a href="javascript:;">Help</a>
                    </li>
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
        <div class="right_col" role="main">
          <div class="">
           <div class="col-md-10">

            <form method="post">                
              <div class="col-md-3">
                <input class="form-control" type="text" name="session"  placeholder="2012/2013">
              </div>

              <div class="col-md-3">
                <select class="form-control" name="semester">
                 <option value="0" selected="selected">Semester</option>
                 <option value="1st">1st Semester</option>
                 <option value="2nd">2nd Semester</option>
               </select>
              </div>

              <input type="submit" name="semesterSubmit" value="SUBMIT" class="btn btn-primary">
            </form>

           </div>

           <div class="col-md-9">
                <br/>
                <br/>
                <button type="" class="btn btn-default btn-sm"><a href="#"> PRE-DEGREE </a></button>
                <button type="" class="btn btn-default btn-sm"><a href="#">100 LEVEL</a> </button>
                <button type="" class="btn btn-default btn-sm"> <a href="#"> 200 LEVEL</a> </button>
                <button type="" class="btn btn-default btn-sm"><a href="#"> 300 LEVEL </a> </button>
                <button type="" class="btn btn-default btn-sm"><a href="#"> 400 LEVEL </a></button>


                <?echo $good;?>

           </div>
           <div class="col-md-12">
                 <div style="overflow-hidden">
                       <br/>

                          <?php

                              $studentsOfDepartment = array();

                              if(isset($_POST['semesterSubmit'])){
                                  $academicSession = $_POST['session'];
                                  $academicSemester = $_POST['semester'];

                                  $department = $staffInfo['department'];
                                  // instainting vAriables
                                  $studentId = '';
                                  $studentsOfDepartmentWithResult = array();
                                  /*to get id of students in department*/
                                  $studentsOfDepartment = $queriesObject->selectt('id','students','department', $department, '', '', '');
                                  $studentsOfDepartment = $studentsOfDepartment->fetchall(PDO::FETCH_ASSOC);

                                  echo '

                                          <table class="table table-bordered table-hover">
                                            <tr>
                                                <th>  </th>
                                                <th> S/N </th>
                                                <th> Matric No </th>
                                                <th> Surname </th>
                                                <th> Firstname </th>
                                                <th> Middlename </th>
                                                <th>level </th>
                                                <th> Degree in view </th>
                                                <th> Action </th>
                                            </tr> 
                                    ';
                                  $i = 1;

                              foreach ($studentsOfDepartment as $valuee) {
                                /*instainting variables*/
                                  $resultValues = array();
                                  $courses = array();
                                  $arrayOfInfo = array();
                                  $units = '';
                                  $grades = '';
                                  $totalGradePoints = '';
                                  $totalPassedUnits = '';
                                  $GPA ='';
                                  $totalUnits = '';
                                
                                foreach ($valuee as $value) {
                                    $studentId = $value;
                                   
                                    $testingForResult =  $queriesObject->selectMore('*','results', 'student_id', $studentId, 'AND', 'session',
                                     $academicSession, 'AND', 'semester', $academicSemester);

                                    $testingForResult = $testingForResult->fetchall(PDO::FETCH_ASSOC);
                                    $studentsOfDepartmentWithResult[$studentId] = $testingForResult;
                                    
                                    if ($studentsOfDepartmentWithResult[$studentId]){
                                        /*querying to get the course and score*/
                                        $course = $queriesObject->Select('*', 'courses_reg', 'student_id', $studentId,'AND','semester',$academicSemester);
                                        $result = $queriesObject->Select('*', 'results', 'student_id', $studentId,'AND','semester',$academicSemester);

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
                                            $basicInfo = $queriesObject->Select('*', 'students', 'id', $studentId,'','','');
                                            $matric_no = $basicInfo['matric_no'];
                                            $department_no = $basicInfo['department'];
                                            $department = $queriesObject->Select('name', 'departments', 'id', $department_no,'','','');
                                            $department = $department['name'];
                                            $level = $basicInfo['level'];
                                            $session = $basicInfo['Current_session'];
                                        

                                      // for student info
                                      $studentInfo = $queriesObject->Select('*','students','id', $studentId,'','',''); 
                                       echo '
                                        <tr>
                                          <form method="post">
                                           <input type="hidden" name="academicSemester" value ='.$academicSemester.'>
                                           <input type="hidden" name="academicSession" value ='.$academicSession.'>
                                           <td><input type="checkbox" name="checkboxes[]" value="'.$studentId.'"></td>
                                           <td>'.$i.'</td>
                                           <td>'.$studentInfo['matric_no'].'</td>
                                           <td>'.$studentInfo['surname'].'</td>
                                           <td>'.$studentInfo['firstname'].'</td>
                                           <td>'.$studentInfo['middlename'].'</td>
                                           <td>'.$studentInfo['level'].'</td>
                                           <td>'.$studentInfo['Course_of_study'].'</td> 
                                           <td>';
                                               require 'viewResult.php';
                                        echo '
                                           </td>
                                        <tr>'; 
                                               
                                      }
                                    }
                                    $i++;
                                  }
                                } 

                               }
                          ?>
                          
                             

                        </table>

                    </div>

                    <?php
                      echo '
                                  <div class="col-md-3">
                                          <select name="actions" class="form-control">
                                            <option value="0">Select An Action for the Checked Item</option>
                                            <option value="approved">Approve</option>
                                            <option value="disapproved">Disapprove</option>
                                          </select><br>
                                          <input type="submit" name="action" value="Perform Action" class="btn btn-default">
                                      </form>
                                  </div>
                                  
                              ';
                    ?>
            </div>
           
             <!-- <div class="col-md-9">
              <button>back to the top</button>
             </div> -->
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