<?php  
    
    require_once '../../core/init.php';
    require_once '../../core/hash.php';

    $queriesObject =  new queries();  

    $verify = '';
    $result = array();
    $role = '';
    $originalPhoneNumber = '';
    $originalMiddlename = '';
    $originalDOB = '';

    if(isset($_POST['check'])){
       $username = $_POST['username'];
       $role = $_POST['role'];
       $result = $queriesObject->Select('*',$role,'username',$username,'','',''); 

       $id = $result['id'];
       $verify = '
            <h3 style="margin-right:0px; padding-right:0px;">Password Reset: </h3> <h5>Please Answer this Questions</h5><hr>
            <form method="post">                        
                  <div class="container">
                    <input type="text" class="form-control" placeholder="Phone Number" name="phone"><br>
                    <input type="text" class="form-control" placeholder="Middlename" name="middlename"><br>
                    <input type="hidden" name="id" value="'.$id.'">
                    <input type="hidden" name="role" value="'.$role.'">
                    <div> DOB: <input type="date" class="form-control" name="DOB"> </div><br>
                    <input type="submit" name="replacePassword" class="btn btn-default" style="margin-left: 30%; margin-right:40%;" value="Change Password">   
                  </div>
                </form>
       ';      
}



    if (isset($_POST['replacePassword'])) {
      
      $id = $_POST['id'];
      $role = $_POST['role'];

      $result = $queriesObject->Select('*',$role,'id',$id,'','','');
      
       if ($role == 'students') {
         $originalPhoneNumber = $result['telephone'];
       }else{
        $originalPhoneNumber = $result['phone'];
       }

       $originalMiddlename = $result['middlename'];
       $originalDOB = $result['DOB'];
       $originalID = $result['id'];


       $newMiddlename = $_POST['middlename'];
       $newphoneNo = $_POST['phone'];
       $newDOB = $_POST['DOB'];

       if ($newMiddlename == $originalMiddlename && $newDOB == $originalDOB) {
            $lenght = 10;
            $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
            $charactersLenght = strlen($characters);
            $randomString = '';
            for($i = 0; $i < $lenght; $i++){
              $randomString .= $characters[rand(0, $charactersLenght -1)];
            }
            $randomString;
            /*hashing the password*/
            $newpassword = hash::passwordhash($randomString);
            $textMessage = 'Here is your New Password: '. $randomString;
            $messageResult =  $queriesObject->sendMessage('E-PORTAL', $newphoneNo, $textMessage);
            echo '<script>alert("The Username And Password Message report is '.$messageResult.'");</script>';

            $values = array(
                'password' => $newpassword
              );
             if ($messageResult == 'SUCCESS') {
              $queriesObject->Update($role, $originalID, $values, 'login.php');
             }
       }else{

          echo '
            <div class="col-md-3"></div>
            <div class="alert alert-danger col-md-6">
                <h4>Wrong Answer to the Questions. Try again or See the Admin at the ICT</h4>
            </div>
          ';
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
         
      </div>

      <div class="col-md-4">
          <div class="col-md-12">
             <img src = "../images/mcu_logo.png" style="margin-left:30%;"/>
          </div>

          <div class="col-md-12">
              <section class="login_content">
                <form method="POST">                        
                  <div class="container">
                    <div class="col-md-5" style="margin-left:30%; margin-right:30%; ">
                      <select style="float:left; margin-bottom:40px;" class="form-control" name="role">
                        <option value="0" select="select"> ROLE</option>
                        <option value="parents" select="select"> Parent</option>
                        <option value="students" select="select"> Students</option>
                        <option value="senate" select="select"> Senate</option>
                        <option value="admin" select="select">Admin</option>
                      </select> 
                    </div>
                    <input type="text" class="form-control" placeholder="Username" name="username">
                    <input type="submit" name="check" class="btn btn-default" style="margin-left: 40%; margin-right:40%; ">   
                  </div>
                </form>
              </section>

             
              <?php echo $verify;?>
          </div>
      </div>

      <div class="col-md-4">
        
      </div>

    </div>


  </body>
</html>