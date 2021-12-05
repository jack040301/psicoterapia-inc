<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
   
  <title>Psicoterapia | User Reset Code</title>
  <script src="./removeBanner.js"></script>.
  <link rel="icon" type="png" href="userDesigns/user_images/noLabelLogo.png">
  <link rel="stylesheet" type="text/css" href="userResetCode.css">
   <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="calendar.js"> </script> 
</head>
<body style="background-color: #F1F3FF;">
   <a href="index.php" class="logo"><label class="psico" style="font-size: 20pt;">Psico</label><label class="terapia" style="color: #4F64AF; font-size: 20pt;">terapia</label></a> <!--EDIT THE LINK TO YOUR LANDING PAGE-->
  <div class="container">
        
          <div class="laptop">
            <center><img src="userDesigns/user_images/withPencil.png"></center>
         
        </div>
        <form method="POST" id="signupform" action="userAction.php">
        <div class="row">
          <div class="col-25">
            <h3>Code Verification</h3>

          </div>
          <!--<div class="col-75">-->
            <br>
            <br><br>
            <?php 
                if(isset($_SESSION['error'])){ 
                $error = $_SESSION['error']; ?>
                <h4 style="color: red; margin-left: 30; padding-left: 1%;"> <?php  echo $_SESSION['error'] ?></h4>
            <?php } ?>
            <label>Verification Code</label>
            <input type="text" id="otp"  name="otp" ondrop="return false;" onpaste="return false;" placeholder="Enter verification code" class="form-control tag" required="Required">
            <br>
            <br>
            <label>New Password</label>
            <input type="password" name="newpassword" autocomplete="current-password"  id="newpassword" required="Required" placeholder="Enter New Password">
            <br>
            <br>
            <label>Confirm New Password</label>
            <input type="password" name="cnewpassword" autocomplete="current-password"  id="cnewpassword" required="Required" placeholder="Confirm New Password">
         <!-- </div>-->
         
          <input type="submit" name="btnRestPass" value="Reset Password" id="btnRestPass">
      </form>
    <!-- </div> -->
  </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>
</html>
<?php
    unset($_SESSION["error"]);
?>