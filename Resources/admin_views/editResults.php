<?php

  require_once '../../core/init.php';

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

  $disapprovedResults = $queriesObject->selectt('*','disapprovedresults','status','0','','','');
  $disapprovedResults = $disapprovedResults->fetchall(PDO::FETCH_ASSOC);
  $numberOfDisapprovedResults = count($disapprovedResults);


   $newsResults = $queriesObject->selectall('*','news');
    $newsResults = $newsResults->fetchall();
    
    $newsArray = array_slice($newsResults, -5);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> McU E-PORTAL- Home </title>

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
                <li><a href = "addPersonel.php"> ADD PERSONEL </a>
                  </li>
                <li><a href = "ADDSESSION.php"><i class="fa fa-desktop"></i>ADD SESSION</a>
                 </li>
                 
                  <li><a href="add course.php"><i class="fa fa-home"></i>ADD COURSE</a>
      
                  </li>

                  <li><a href = "sms.php"><i class="fa fa-edit"></i> SEND MESSAGE</a>  
                  </li>
                   <li><a href = "addnews.php"><i class="fa fa-table"></i> ADD NEWS </a>
                  </li>
                  <li><a href = "COMPUTEresult.PHP"><i class="fa fa-desktop"></i> COMPUTE RESULTS</a>
                    
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
          <form method="post">
              <div class="col-md-12">
                    <?php 
                      $sn = 1;
                      echo '
                            <table class="table">
                                <tr>
                                  <th>S/n</th>
                                  <th>Matric No</th>
                                  <th>Course 1</th>
                                  <th>Course 2</th>
                                  <th>Course 3</th>
                                  <th>Course 4</th>
                                  <th>Course 5</th>
                                  <th>Course 6</th>
                                  <th>Course 7</th>
                                  <th>Course 8</th>
                                  <th>Course 9</th>
                                  <th>Course 10</th>
                                  <th>Course 11</th>
                                  <th>Course 12</th>
                                  <th>Course 13</th>
                                </tr>'; 
                      foreach ($disapprovedResults as $key => $value) { 
                        $studentId = $value['student_id'];
                        $basicInfo = $queriesObject->Select('*','students','id',$studentId,'','','');
                        $matricNo = $basicInfo['matric_no'];

                        echo '
                                <tr>
                                    <td>'.$sn.'</td>
                                    <td>'.$matricNo.'</td>
                                    <td>'.$value['course1'].'</td>
                                    <td>'.$value['course2'].'</td>
                                    <td>'.$value['course3'].'</td>
                                    <td>'.$value['course4'].'</td>
                                    <td>'.$value['course5'].'</td>
                                    <td>'.$value['course6'].'</td>
                                    <td>'.$value['course7'].'</td>
                                    <td>'.$value['course8'].'</td>
                                    <td>'.$value['course9'].'</td>
                                    <td>'.$value['course10'].'</td>
                                    <td>'.$value['course11'].'</td>
                                    <td>'.$value['course12'].'</td>
                                    <td>'.$value['course13'].'</td>
                                    ';          
                        
                        $sn++;
                      }

                      echo '
                            </table>
                        ';
                    ?>        
               </div>
              
          </form>
          

          

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