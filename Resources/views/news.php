<?php

   require_once '../../core/init.php';

   $queriesObject =  new queries();

  $newsResults = $queriesObject->selectall('*','news');
  $newsResults = $newsResults->fetchall();
    
    $newsArray = array_slice($newsResults, -5);

?>
<!DOCTYPE html>
<html>
<head>
  <title>E-Portal</title>
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
<body>    
    <div class="container" style="margin-left:4%; margin-right:4%; margin-top:4%;">
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
          <div class="col-md-4" style="margin-left:5%;">
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
          <div class="col-md-4" style="margin-left:5%;">
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