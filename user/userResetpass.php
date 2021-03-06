<?php
  // session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
  <style type="text/css">
  .lbl{
    font-family: Poppins;
    margin-top: 10px;
    margin-bottom: -5px;
  }
  #fname, #email, #mobile{
    width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
        height: 40px;
        font-family: Poppins;
  }
    input:focus { 
        outline: none !important;
        border-color: #4BD6F3;
        box-shadow: 0 0 10px #4BD6F3;
        box-shadow: #4BD6F3 0px 0px 1px, #4BD6F3 0px 0px 0px 1px;
 }
 .btn{
  margin-top: 15px;
    background-color: #4663E5; 
    color: #F1F3FF; 
    font-family: Poppins;
 }

  </style>
  <!-- <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">Forgot Password</a> -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
  <div class="col-50">
    <div class="container" >
      <form  action="donate.php" method="post" style="padding: 25px;">
      
        <div class="row">
          <div class="col-25">
            <h3>Code Verification</h3> <br>
            <?php 
                if(isset($_SESSION['error'])){ 
                $error = $_SESSION['error']; ?>
                <h4 style="color: red; margin-left: 30; padding-left: 1%;"> <?php  echo $_SESSION['error'] ?></h4>
            <?php } ?>
            <label for="fname" class="lbl">Verification Code</label><br>
            <input type="text" id="otp" name="otp" placeholder = "OTP code" required="Required">
            <br>
            <label for="fname" class="lbl">New Password</label><br>
            <input type="text" id="newpassword" name="newpassword" placeholder = "New Password required" required="Required">
            <br>
            <label for="fname" class="lbl">Confirm New Password</label><br>
            <input type="password" id="cnewpassword" name="cnewpassword" placeholder = "Confirm New Password" required="Required">
            <br>
            <input type="submit"  value="Send OTP Code" class="btn">
        </form>


          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

</body>
</html>