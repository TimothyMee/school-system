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


  if(isset($_POST['upload'])){
    $header = $_POST['header'];
    $main_content = $_POST['content'];
    

    /*image 1*/
    $tempName1 = $_FILES["picture1"]["tmp_name"];
    $imageName1 = $_FILES["picture1"]["name"];
    $imageType1 = $_FILES["picture1"]["type"];
    $path1 = "images/".$imageName1;

    move_uploaded_file($tempName1, $path1);

    /*image 2*/
    $tempName2 = $_FILES["picture2"]["tmp_name"];
    $imageName2 = $_FILES["picture2"]["name"];
    $imageType2 = $_FILES["picture2"]["type"];
    $path2 = "images/".$imageName2;

    move_uploaded_file($tempName2, $path2);

    $param = array('id', 'admin_id', 'header', 'main_content', 'picture1', 'picture2', 'created_at', 'updated_at');
    $values = array('', $session_id, $header, $main_content, $imageName1, $imageName2, date('y-m-d h:i:s'), date('y-m-d h:i:s'));

    $queriesObject->insert('news', $param, $values);
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

    <title>McU E-PORTAL-Add News</title>

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
            
          <div class="col-md-12 col-sm-12 col-xs-12">
             <form method="POST" enctype="multipart/form-data">
                <div class="x_content">
               
                  <div id="alerts"></div>
                  <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">


                    <div class="btn-group">
                      <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                      <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                    </div>
                  </div>

                  <div style="background-color: white;" class="col-md-12">
                      
                    <div class="col-md-9">
                      <textarea placeholder="input your news header here"  name="header" id="descr" class="form-control" rows="1"></textarea><br>
                      <textarea placeholder="input your text here"  name="content" id="descr" class="form-control" rows="15"></textarea>
                    </div>
                    <div class="col-md-3">
                       <div class="col-md-12">
                          <input type="file" name="picture1" class="form-control">
                          <input type="file" name="picture2" class="form-control">
                      </div>
                      <h4>Picture 1</h4>
                      <img src="b">
                      <h4>Picture 2</h4>
                      <img src="o">
                    </div>
                  </div>
                </div>

                <div class=" ">

                     <button type="button" class="btn btn-default btn-sm">CANCEL</button>
                    <input type="submit" class="btn btn-default btn-sm" name="upload" value="UPLOAD">
               </div>

            </form>
               <br/>
               <br/>
               <div class="col-md-7 ">
                    <label class="feedback message">   </label>
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

    <!-- /Starrr -->
  </body>
</html>