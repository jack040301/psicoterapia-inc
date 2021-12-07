<?php
session_start();

if(!empty($_SESSION['userID'])){
  header('location:userdashboard.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
    <script src="./removeBanner.js"></script>
  <meta charset="UTF-8">
  <meta  name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Psicoterapia | User Login</title>
  <link rel="icon" type="png" href="userDesigns/user_images/noLabelLogo.png">
  <link rel="stylesheet" type="text/css" href="userLogin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!--  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<!--  -->
</head>
<body style="background-color: #F1F3FF;">
  <style type="text/css">
    .btn{
  margin-top: 15px;
    background-color: #4663E5; 
    color: #F1F3FF; 
    font-family: Poppins;
 }
 .btnlogin{
  border-radius: 5px;
  font-family: Poppins;
 }
  </style>

<!--<div class="container">-->
    <nav class="main-nav">
       <input type="checkbox" id="checks" />
        <label for="checks" class="menu-btn">
          <i class="fas fa-bars"></i>
        </label>
        <a href="index.php" class="logo"><label class="psico"></label>Psico<label class="terapia" style="color: #4F64AF;">terapia</label></a> <!--EDIT THE LINK TO YOUR LANDING PAGE-->
        <ul class="navlinks">
          <li><a href="index.php">Home</a></li>
          <li><a href="policy.php">Policy</a></li>
          <li><a href="userAboutUs.php">About us</a></li>
          <li><a href="userSignup.php" class="signIn">Sign up</a></li>
        </ul>
      </nav>
<div class="whole">
    <img src="userDesigns/user_images/withTablet.png" alt="With Tablet">
    <h2 style="text-align: center;">Sign In</h2>
  
  <?php 
      if(isset($_SESSION['error'])){ 
      $error = $_SESSION['error']; ?>
      <h5 style="color: red; margin-left: 25px; margin-right: 25px; padding-left: 5%;"> <?php  echo $_SESSION['error'] ?></h5>
  <?php } ?>

  <form method="POST" id="userLoginform" action="userAction.php">
    <div class="row">
      <div class="col-25">
    <p style="margin-bottom: 1px;" class="Lemail">Email</p>
  </div>
    <input type="text" name="email" autofocus="" autocapitalize="none" autocomplete="email" id="email" >
    <p style="margin-bottom: 1px;" class="Lpassword">Password</p>
    <input type="password" name="password" autocomplete="current-password"  id="password" >
    <div class="col-25">   
    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" style="padding: 0px; margin: 0px;">Forgot Password</a>
      <br><br><br>
  
<button  type="submit" name="btnlogin" id="btnlogin" class="btnlogin">Sign In</button>
    <br>
    <p style="margin-top: 20px; font-size: 13px;">Dont have an account yet? <a href="userSignup.php" class="click" style="margin-left: 5px;">Click here </a></p>
  
    </div>
</form>


<!-- MODAL -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-50">
            <!--<div class="container" >-->
              <form  action="userAction.php" method="post" style="padding: 25px;">
                <div class="row">
                  <div class="col-25">
                    <!-- <h3>Forgot Password</h3> <br> -->
                     <?php 
                       if(isset($_SESSION['error'])){ 
                       $ferror = $_SESSION['error']; ?>
                       <h4 style="color: red; margin-left: 65px; padding-left: 5%;"> <?php  echo $_SESSION['error'] ?></h4>
                    <?php } ?>
                    <label for="fname" class="lbl">Email Address</label>
                    <br>
                    <input type="text" id="fname" name="femail" placeholder="Email" required="Required" id="femail">
                    <input type="submit"  value="Send OTP Code" class="btn" name="linkforgotpass" id="linkforgotpass">
                  </div>
                </div>
              </form>
            <!--</div>-->
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
      </div>
    </div>
<!--  -->
<!--  -->

</div>
<!--</div>-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</body>
</html>

<?php
    unset($_SESSION["error"]);
?>

<script >
  // $(document).off('focusin.modal');
    // $(document).ready(function() {
    //  $("#btnlogin").click(function() {
    //    $.ajax({
    //      url : "userAction.php", // file path you want to send data
    //      type : "POST",
    //      data : {},
    //      success : function(data) {
    //           $("#response").html("Confirmed Sucessfully!");
    //      }
    //    });
    //  });
    // });
</script>


<!--<script>
function myFunction() {
  // Get the checkbox
  var checkBox = document.getElementById("check");
  // Get the output text
  var text = document.getElementById("text");
  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
  /*swal("Terms and Agreement", " \r\n Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor  reprehenderit  voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proiden suntculpa qui officia deserunt mollit anim id est laborum.", "info");
   */
  swal({
  title: "Terms and Agreement",
  text: "Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor  reprehenderit  voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proiden suntculpa qui officia deserunt mollit anim id est laborum.",
  icon: "info",
  button: "I agree",
});
  }
  else {
  swal("ERROR!", "INVALID EMAIL AND PASSWORD", "error");
  }
}
  </script>

<?php

// include('userConnection.php');

// if($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['btnlogin'])) { 
//  $email = mysqli_real_escape_string($conn, $_POST["email"]);


//  $ciphering = "AES-128-CTR";
//    $iv_length = openssl_cipher_iv_length($ciphering);
//    $options = 0;
//    $encryption_iv = '1234567891011121';
//    $encryption_key = "mavis";
//    $encryption = openssl_encrypt($_POST['password'], $ciphering,
//    $encryption_key, $options, $encryption_iv);




//  $stmt = $conn -> prepare("SELECT * FROM tbl_useraccount WHERE email = '$email' AND password = '$encryption'");
  
//  $stmt->execute();
//  $result = $stmt->get_result();

//  $obj = $result->fetch_assoc(); //fetch assoc array in db or row
   
//  if ($obj) {
//    echo 'You have entered valid use name and password';
//    header("location: userSignup.php");
    
    
//  }else {
   
//    echo' <script>swal("ERROR!", "INVALID EMAIL AND PASSWORD", "error");</script>';
  
//  }


//  $conn->close();
  

//  }
   
  
?>