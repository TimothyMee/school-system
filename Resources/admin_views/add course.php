<?php 

  require_once '../../core/init.php';
  token::getToken();

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

  if(isset($_POST['add_course'])){

    $department = $_POST['department'];
    $level = $_POST['level'];
    $semester = $_POST['semester'];
    $course_code = $_POST['course_code'];
    $course_title = $_POST['course_title'];
    $course_status = $_POST['course_status'];
    $units = $_POST['unit'];

    if ($department = 0){
      echo "<script>alert('No Course added. Check If Department was added correctly');</script>";
    }else{
       $queriesObject->insertCourse('courses', $course_title, $course_code,  $level, $department, $semester, $course_status, $units);

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

    <title>McU E-PORTAL-Add Courses</title>

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
                <?php echo '<h2>'.$username.'</h2>'?>
                
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
                <li><a href = "addPersonel.php"><i class="fa fa-table"></i> ADD PERSONEL </a>
                  </li>
                <li><a href = "ADDSESSION.php"><i class="fa fa-desktop"></i>ADD SESSION</a>
                 </li>
                 
                  <li><a href="add course.php"><i class="fa fa-home"></i>ADD COURSE</a>
      
                  </li>

                  <li><a href = "sms.php"><i class="fa fa-edit"></i> SEND MESSAGE</a>  
                  </li>
                   <li><a href = "addnews.php"><i class="fa fa-table"></i> ADD NEWS </a>
                  </li>
                  <li><a href = "COMPUTEresult.PHP"><i class="fa fa-desktop"></i> COMPUTE RESULTS</a></li>

                  <li><a href = "profile_update.PHP"><i class="fa fa-desktop"></i> Profile Update</a></li>
                    
                  
                  
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
                    <?php echo $username;?>
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

    <div class="">
             <div> 
             <p>   ***SELECT DEPATRMENT*** SELECT DEPARTMENT:</p>

          <form method="POST">
            <div class="col-md-6">
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

                   </select>
              </div>

                 <div class="col-md-3">
                    <select class="form-control" name="level">
                      <option value="100L">100L</option>
                      <option value="200L">200L</option>
                      <option value="300L">300L</option>
                      <option value="400L">400L</option>
                   </select>
                 </div>

                 <div class="col-md-3">
                   <select class="form-control" name="semester">
                      <option value="1st">1st Semester</option>
                      <option value="2nd">2nd Semester</option>
                    </select>
                 </div>

                  
              </div>
              <br/>
              <br/>
              <br/>

            
             
              <div class="row"> 
              <br/>
              <br/>
              <br/>
                  <p> ADD COURSE</p>
                 <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="Course Code" name="course_code"></input>
                  </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="Course Title" name="course_title"> </input>
                </div>
               <div class="col-md-2">
                  <input type="text" class="form-control" placeholder="Course Status" name="course_status"></input>
                </div>
               <div class="col-md-2">
                  <input type="text" class="form-control" placeholder="Credit Unit" name="unit"></input>
               </div>
              <div class="col-md-3">
                 <input type="submit" name="add_course" value="Add Course">
                 <button> RESET</button>
               </div>

          </form>   
             
             <div class="col-md-1">
              <LABEL></LABEL>
            </div>
          </div>
        <div class="col-md-5">
        <br/>
          <label class="feedback message"> </label>
          </div>



          <DIV class="col-md-12">
          <br/>
          <p>REMOVE COURSE </p>

          <div class="x_content">
                    <div class="table-responsive">
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
                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" "></td>
                            <td class=" "></td>
                            <td class=" "> </td>
                            <td class=" "></td>
                            
                            </td>
                          </tr>
                          <tr class="odd pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" "></td>
                            <td class=" "></td>
                            <td class=" ">
                            </td>
                            <td class=" "></td>
                           
                            </td>
                          </tr>
                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" "></td>
                            <td class=" "></td>
                            <td class=" "> </i>
                            </td>
                            <td class=" "></td>
                            </td>
                          </tr>
                          <tr class="odd pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" "></td>
                            <td class=" "></td>
                            <td class=" "></td>
                            <td class=" "></td>
                            </td>
                          </tr>
                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" "></td>
                            <td class=" "> </td>
                            <td class=" "></td>
                            <td class=" "></td>
                        
                            </td>
                          </tr>
                          <tr class="odd pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" "></td>
                            <td class=" "></td>
                            <td class=" "> </td>
                            <td class=" "></td>
                          </tr>
                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" "></td>
                            <td class=" "></td>
                            <td class=" "></td>
                            <td class=" "></td>
                          </tr>
                          <tr class="odd pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" "></td>
                            <td class=" "></td>
                            <td class=" "></td>
                            <td class=" "></td>
                          </tr>

                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" "></td>
                            <td class=" "></td>
                            <td class=" "></td>
                            <td class=" "> </td>

                          </tr>
                          <tr class="odd pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" "></td>
                            <td class=" "></td>
                            <td class=" "></td>
                            <td class=" "></td>
                            
                          </tr>
                        </tbody>
                      </table>
                     
                       
                     <br/>
                     <div class=" ">
                     <button type="button" class="btn btn-default btn-sm">DELETE</button>
                    <button type="button" class="btn btn-default btn-sm">CANCEL</button>
                    </div>
                    
                    </div>
                </div>
                <LABEL CLASS="feedback"> </LABEL>
          </DIV>




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
  </body>
</html>