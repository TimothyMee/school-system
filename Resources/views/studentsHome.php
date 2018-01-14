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

    $results = $queriesObject->Select('*',$session_role,'id',$session_id,'','','');

    $firstname = $results['firstname'];
    $imagename = $results['image_name'];

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

    <title>McU Portal - Home</title>

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
                    <img src=<?php  echo '"student_pictures/'.$imagename. '"';?> alt=""><?php echo $firstname; ?>
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


        <div class="col-md-1"></div>
        
        <div class="col-md-6"> 
           <div class="panel panel-primary">
              <div class="panel-body">
                <div class="col-md-12">
                  <h3 align="center"><?php echo $newsArray[4]['header']; ?></h3>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <img src=<?php  echo '"../admin_views/images/'.$newsArray[4]['picture1']. '"';?> width="100%" height="455px">
                </div> 
                <div class="col-md-12">
                  <?php 

                  $word = explode(' ', $newsArray[4]['main_content']);
                  if (count($word) > 10){
                    $word = array_slice($word, 0, 20);
                    $sampleWord = implode(' ', $word);
                  } 
                  echo $sampleWord . '<a href ="" data-toggle="modal" data-target="#myModal1">.......More</a>' ;
                  require_once 'studentNews.php';
                  ?>  
                </div>
              </div>
            </div>
        </div>

        <div class="col-md-4"> 
          <div class="list-group">
            <a href="#" class="list-group-item"  data-toggle="modal" data-target="#myModal2">
              <h4 class="list-group-item-heading"><?php echo $newsArray[3]['header']?></h4>
              <p class="list-group-item-text">
                 <img src=<?php  echo '"../admin_views/images/'.$newsArray[3]['picture1']. '"';?> width="200px" height="200px">
                 <?php 

                  $word = explode(' ', $newsArray[3]['main_content']);
                  if (count($word) > 10){
                    $word = array_slice($word, 0, 20);
                    $sampleWord = implode(' ', $word);
                  } 
                  echo $sampleWord .'....' ;
                  ?>  

              </p>
            </a>
          </div>

          <div class="list-group">
            <a href="#" class="list-group-item"  data-toggle="modal" data-target="#myModal3">
              <h4 class="list-group-item-heading"><?php echo $newsArray[2]['header']?></h4>
              <p class="list-group-item-text">
                 <img src=<?php  echo '"../admin_views/images/'.$newsArray[2]['picture1']. '"';?> width="200px" height="200px">
                 <?php 

                  $word = explode(' ', $newsArray[2]['main_content']);
                  if (count($word) > 10){
                    $word = array_slice($word, 0, 20);
                    $sampleWord = implode(' ', $word);
                  } 
                  echo $sampleWord .'....' ;
                  ?>  

              </p>
            </a>
          </div>     
        </div>

        <div class="col-md-12">
          <div class="col-md-5" style="margin-left:5%;">
              <div class="list-group">
                <a href="#" class="list-group-item"  data-toggle="modal" data-target="#myModal4">
                  <h4 class="list-group-item-heading"><?php echo $newsArray[1]['header']?></h4>
                  <p class="list-group-item-text">
                     <img src=<?php  echo '"../admin_views/images/'.$newsArray[1]['picture1']. '"';?> width="200px" height="200px">
                     <?php 

                      $word = explode(' ', $newsArray[1]['main_content']);
                      if (count($word) > 10){
                        $word = array_slice($word, 0, 20);
                        $sampleWord = implode(' ', $word);
                      } 
                      echo $sampleWord .'....' ;
                      ?>  

                  </p>
                </a>
              </div>
          </div>
          <div class="col-md-5" style="margin-left:5%;">
              <div class="list-group">
                <a href="#" class="list-group-item"  data-toggle="modal" data-target="#myModal5">
                  <h4 class="list-group-item-heading"><?php echo $newsArray[0]['header']?></h4>
                  <p class="list-group-item-text">
                    <img src=<?php  echo '"../admin_views/images/'.$newsArray[0]['picture1']. '"';?> width="200px" height="200px">
                     <?php 

                      $word = explode(' ', $newsArray[0]['main_content']);
                      if (count($word) > 10){
                        $word = array_slice($word, 0, 20);
                        $sampleWord = implode(' ', $word);
                      } 
                      echo $sampleWord .'....' ;
                      ?>  

                  </p>
                </a>
            </div>
          </div>
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


  </body>
</html>