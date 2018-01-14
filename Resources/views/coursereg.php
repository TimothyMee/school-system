<?php
   require_once '../../core/init.php';

   $session_id = '';
   $session_role = '';
  $department = '';

   $session_id = $_SESSION['id'];
   $session_role = $_SESSION['role'];
   if (empty($session_id) || $session_role !== 'students'){
     redirect::to('login.php');
   }
 $queriesObject =  new queries();  

 $results = $queriesObject->Select('*', $session_role, 'id', $session_id,'','','');

  $department = $results['department'];
  $level = $results['level'];
  $firstname = $results['firstname'];
  $imagename = $results['image_name'];

  $courses = $queriesObject->selectt('*', 'courses', 'level', $level, 'AND','department',$department);

    /*`beginning of the extra courses button click*/
    $extraCourses = null;
     if(isset($_POST['addCourses'])){
          $extraLevel = $_POST['level']; 
          $extraSemester = $_POST['semester']; 

          $extraCourses = $queriesObject->selectMore('*', 'courses', 'level', $extraLevel, 'AND','department',$department, 'AND', 'semester', $extraSemester);
        }
    /*`end of the extra courses button click*/

/*the select the department name*/
$departmentResult = $queriesObject->Select('name', 'departments', 'id', $department,'','','');
$departmentName = $departmentResult['name'];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>McU Portal - Course Reg</title>

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
              <a href="#" class="site_title"><i class="glyphicon glyphicon-home"></i> <span>Home</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              
              <div class="profile_info">
                <span><h1>Welcome</h1></span>
               <?php echo '<h2>'.$firstname.'</h2>'?>
                
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
                    <img src=<?php  echo '"student_pictures/'.$imagename. '"';?> alt=""><?php echo $firstname;?>
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
        <div class="right_col" role="main">

          <br />
          <div class="">
          <br/>

                  <form method="post">
                      <h3>To Add Extra Courses</h3>
                       <div class="col-md-5">
                           <input type="text" name="department" value="<?php echo $departmentName;?>" class="form-control" disabled>
                      </div>

                         <div class="col-md-3">
                            <select class="form-control" name="level">
                              <option value="100L">100L</option>
                              <option value="200L">200L</option>
                              <option value="300L">300L</option>
                              <option value="400L">400L</option>
                           </select>
                         </div>

                         <div class="col-md-2">
                           <select class="form-control" name="semester">
                              <option value="1st">1st Semester</option>
                              <option value="2nd">2nd Semester</option>
                            </select>
                         </div>

                         <div class="col-md-2">
                           <input type="submit" name="addCourses" value="OK" class="btn btn-primary">
                           <input type="reset" name="reset" value="Reset" class="btn btn-danger">
                         </div>

                          
                      </div>
                      <br/>
                      <br/>
                      <br/>

                  </form>

                  <hr>

                  <form method="post">
                    <div class="x_content">
                      <div class="table-responsive">

                         
                              <?php
                                  if (!empty($extraCourses)) {
                                    echo '<h3> Extra Courses</h3>
                                            <table class="table table-striped jambo_table bulk_action">
                                                <thead>
                                                  <tr class="headings">
                                                    <th>
                                                      <input type="checkbox" id="check-all" class="flat" disabled>
                                                    </th>
                                                    <th class="column-title">course code </th>
                                                    <th class="column-title">course title </th>
                                                    <th class="column-title">course status </th>
                                                    <th class="column-title">credit unit </th>
                                                  </tr>
                                                </thead>  
                                            <tbody>';
                                   
                                    while ( $extraCoursesResults=$extraCourses->fetch(PDO::FETCH_ASSOC)) {

                                   echo $table_values = ' 
                                                             
                                          <tr class="even pointer">
                                            <td class="a-center ">
                                              <input type="checkbox" class="flat" name="checkboxes[]" value="'.$extraCoursesResults['course_code'].'">
                                            </td>
                                            <td class="">'.$extraCoursesResults['course_code'].'</td>
                                            <td class=" ">'.$extraCoursesResults['course_title'].'</td>
                                            <td class=" ">'.$extraCoursesResults['course_status'].'</td>
                                            <td class=" ">'.$extraCoursesResults['units'].'</td>
                                          </tr>
                                         
                                        ';                             

                                     }

                                     echo '</tbody>
                                            </table>';
                                  }
                              ?>
                         


                        <table class="table table-striped jambo_table bulk_action">
                          <thead>
                            <tr class="headings">
                              <th>
                                <input type="checkbox" id="check-all" class="flat" disabled>
                              </th>
                              <th class="column-title">course code </th>
                              <th class="column-title">course title </th>
                              <th class="column-title">course status </th>
                              <th class="column-title">credit unit </th>
                            </tr>
                          </thead>

                          <tbody>
                              <?php                                   

                                echo '<h3> Real Courses</h3>';
                                   
                                    while ( $coursesResults=$courses->fetch(PDO::FETCH_ASSOC)) {

                                   echo $table_values = '                          
                                          <tr class="even pointer">
                                            <td class="a-center ">
                                              <input type="checkbox" class="flat" name="checkboxes[]" value="'.$coursesResults['course_code'].'">
                                            </td>
                                            <td class="">'.$coursesResults['course_code'].'</td>
                                            <td class=" ">'.$coursesResults['course_title'].'</td>
                                            <td class=" ">'.$coursesResults['course_status'].'</td>
                                            <td class=" ">'.$coursesResults['units'].'</td>
                                          </tr>
                                        ';                             

                                     }

                                    if(isset($_POST['form_submit'])){
                                        $a = 1;

                                        if (empty($_POST['checkboxes'])){
                                          echo '<script>alert("No Course has been selected");</script>';
                                        }else{
                                           $checked = $_POST['checkboxes'];
                                      /*code to check if course is already registered*/
                                      
                                           /*session and semester*/
                                          $result = $queriesObject->selectall('*', 'session');
                                          $results = $result->fetchall(PDO::FETCH_ASSOC);
                                             $last = array_pop($results);
                                             $session = $last['session'];
                                             $semester = $last['semester'];
                                          /*end of session and semester*/

                                           $alreadyReg = $queriesObject->selectMore('*','courses_reg', 'student_id', $session_id, 'AND', 'session', $session, 'AND', 'semester', $semester);

                                           if(!empty($alreadyReg)){
                                             echo '<h2 class = "alert alert-danger" role="alert"> You Have Already Registered Your Courses this Semester.... Meet an Admin To Effect any Changes</h2>';
                                           }
                                      /*end of code to check*/
                                           else{
                                             $queriesObject->registerCourses('courses_reg',$session_id,$checked);
                                           }

                                         
                                        }
                                        
                                      }


                              ?>
                        </tbody>
                      </table>
                     <br/>
                     <div class=" ">
                       <button type="button" class="btn btn-default btn-sm">CANCEL</button>
                       <input type="submit" name="form_submit" class="btn btn-default">
                      </div>
                    
                    </div>
                </div>

                  </form>
                  
                       
                     


        <!-- footer content -->
        <div>
          <footer>
          <div class="pull-right">
           
          </div>
          <div class="clearfix"></div>
        </footer>
        </div>
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
  </body>
</html>