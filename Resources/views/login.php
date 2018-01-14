<?php  
    
    require_once '../../core/init.php';
    require_once '../../core/hash.php';

    $queriesObject =  new queries();  

    if(isset($_POST['login'])){
       $role = $_POST['role'];
       $username = $_POST['username'];
       $password = $_POST['password'];

       /*hashing the password*/
      $password = hash::passwordhash($password);

      if ($role == 'parents') {
        $param1 = 'email';
        $param2 = 'password';
      }else{
        $param1 = 'username';
        $param2 = 'password';
      }

       $smt = 'id';
       $table = $role;
       $value1 =  $username;
        $condition = 'AND';
        $value2 = $password;

           $result = $queriesObject->Select($smt,$table,$param1,$value1,$condition,$param2,$value2);

            if (is_numeric($result['id'])){
              session_start();

              $_SESSION['id'] = $result['id'];
              $_SESSION['role'] = $role;

              $_SESSION['token'] = $queriesObject->token();
                if($role == 'students'){
                  redirect::to('studentsHome.php');
                  }
                elseif($role == 'admin'){
                  redirect::to('../admin_views/adminHome.php');
                  }
                elseif($role == 'senate'){
                  redirect::to('../other_views/senate.php');
                  }
                elseif($role == 'parents'){
                  redirect::to('../other_views/parent.php');
                  }
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

    <!-- Custom Theme Style -->
    <link href="../assests/css/custom.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../assests/js/custom.js"></script>
  </head>

  <body style="background:#F7F7F7;">
    <div class="container">
      <div style="height:40px;" class="col-md-12"></div>
      
      <div class="col-md-4">
         <p><header><h1>INSTRUCTION</h1></header>
           <h4> 1. You are required to select your role </h4>
           <h4> 2. Parents are required to use their e-mail address as the username and their wards' matric number as the password. </h4>
           <h4> 3. Departmental heads and the management representative should please visit the ICT to obtain their usernames and passwords. </h4>
           <h4> 4. Students are required to register before they can make use of the portal. after registration, the username and password entered during registration should be used in accessing the portal.</h4>
           </p>
      </div>

      <div class="col-md-4">
          <div class="col-md-12">
             <img src = "../images/mcu_logo.png" style="margin-left:30%;"/>
          </div>

          <div class="col-md-12">
              <section class="login_content">
                <form method="POST">
                  <div class="col-md-5">
                    <select style="float:left; margin-bottom:40px;" class="form-control" name="role">
                      <option value="0" select="select"> ROLE</option>
                      <option value="parents" select="select"> Parent</option>
                      <option value="students" select="select"> Students</option>
                      <option value="senate" select="select"> Senate</option>
                      <option value="admin" select="select">Admin</option>
                    </select> 
                  </div>
                          
                  <div>
                    <input type="text" class="form-control" placeholder="Username" name="username" />
                  </div>
                  <div>
                    <input type="password" class="form-control" placeholder="Password" name="password" />
                  </div>

                  <div>
                    <input type="reset" name="" class="btn btn-default">

                    <input type="submit" name="login" class="btn btn-default submit" value="Login">
                  </div>
                  <div>
                     <a class="reset_pass" href="forgotpassword.php">Forgot your password?</a>
                  </div>
                  <div class="clearfix"></div>
                  <div class="separator">
                    <p class="change_link">New to portal?
                      <a href="News.php" class=""> Go to Home Page</a>
                    </p>
                    <div class="clearfix"></div>
                    <br />
                    
                </form>
              </section>

          </div>
      </div>

      <div class="col-md-4">
        
      </div>

    </div>


  </body>
</html>