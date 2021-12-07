<?php
include('db_psicoterapia.php');


session_start();
if(!empty($_SESSION['userID'])){
  header('location:userdashboard.php');
}

?>

<!DOCTYPE html>
<html>
<head>
    <script src="./removeBanner.js"></script>
	<title>Psicoterapia | Volunteer</title>
	<link rel="icon" type="png" href="userDesigns/user_images/noLabelLogo.png">
   <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
      <link rel="stylesheet" type="text/css" href="policy.css">
      
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</head>
<body style="background-color: #F1F3FF;">
  <style type="text/css">
    #support{
      height: 200px;
      width: 350px;
      align-self: center;
    }
    #advocate{
      height: 200px;
      width: 200px;
    }
  </style>


	<!--<div class="containers">-->
		<nav class="main-nav">
        <input type="checkbox" id="check" />
        <label for="check" class="menu-btn">
          <i class="fas fa-bars"></i>
        </label>
        <a href="index.php" class="logo">Psico<label>terapia</label></a>
        <ul class="navlinks">
          <li><a href="index.php">Home</a></li>
          <li><a href="policy.php">Policy</a></li>
          <li><a href="userAboutUs.php">About us</a></li>
          <li><a href="userLogin.php" class="signIn">Sign in</a></li>
        </ul>
      </nav>
      <div class="content">
        <br>
      	<h3> ​​Psicoterapia Volunteer </h3>
					<p> Our community of Mental Health Advocates welcomes anyone and everyone who wishes to heed the call, lend a hand, give back, and make a difference, particularly in these trying times. Take opportunities to learn, collaborate, and have purposeful experiences in promoting mental health and well-being. </p><br>
					
					<h3><center> ​​"BE AN IN TOUCH VOLUNTEER!" <h3></center>
						<div>
						<center><img src="userDesigns/user_images/support.png" id="support"></center>
						<center><h5> ​Support those who are struggling with their mental health. </h5></center>
            <br>
						<center><img src="userDesigns/user_images/advocate.png" id="advocate"></center>
						<center><h5> ​Advocate mental health and emotional well-being.</h5></center>
            <br>
						<center><img src="userDesigns/user_images/stakeholder.png" id="stakeholder"> </center>
						<center><h5> ​Build your capacity as a mental health stakeholder.  </h5></center>
						</div>
            <br>
            <h5>Our volunteers are the bedrock of our charity and with their help, we can reach and support a wider group of people from our communities.  </h5>
            <p>Are you looking to volunteer for a local charity that is making a difference in Lancashire, St Helens and Rochdale and want to give back to your community? View our current roles by scrolling to the bottom of this page.</p>
            <h5>Why volunteer for Advocacy Focus?</h5>
            <p>As well as transforming the lives of others, volunteering can also help to transform your own. Did you know that 90% of volunteers in the UK report a sense of personal achievement, and 77% report improved mental health and wellbeing from volunteering?</p>
      </div>
      <footer>
  <div class="foots col-md-12 ">
    
    <div class="footer1 ">  
      
      <div class="logoBottom">
      <p class="logonameBot">Psico<label>terapia</label></p></div>
    <!--<img  src="noLabelLogo.png" alt="">Psicoterapia-->
    <p>
    Psicoterapia is an online booking site for professional care needed for mental health necessities. It also offers articles to help people fight against mental health problems.
</p>
    </div>
    <div class="footer1"> 
    <ul>  
    <p class="learn">LEARN MORE</p> 
    <a href="userGethelp.php" class="learn">Get Help</a> 
    <br>
    <br>
    <a href="userVolunteer.php"class="learn">Volunteer</a>
    <br>
    <br>
    <a href="#" class="learn" data-bs-toggle="modal" data-bs-target="#exampleModal">Donate</a>
    <br>
    </ul>
    </div>
    <div class="footer1"> 
    <ul>  
    <p>Join us on:</p>  

    <a href="https://www.facebook.com/MentalHealthCenterNH/" class="facebook"><img src="userDesigns/user_images/facebook.png" style="height: 25px;"></a>
    <a href="https://www.instagram.com/mhcgm/" class="instagram"><img src="userDesigns/user_images/instagram.png" style="height: 25px;"></a>
    <a href="https://twitter.com/MentalHealthNH" class="twitter"><img src="userDesigns/user_images/twitter.png" style="height: 25px;"></a>
    </ul>
    </div>
    </div>  

  </footer>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Donate</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
  <div class="col-50">
    <div class="container" >
       <form  action="donate.php" method="post" style="padding: 25px;">
      
        <div class="row">
          <div class="col-25">
            <h3>Psicoterapia Donate</h3> <br>
          
           
            <label class="lbl">Gcash Number</label>
            
            <p>Psicoterapia - 09563123116</p>
        
            <label  class="lbl">Visa</label>
           
            <p>4003830171874018</p>
           
            <label  class="lbl">Mastercard</label>
            
            <p>5496198584584769</p>
            <label class="lbl">JCB</label>
            
            <p>3530111333300000</p>
            <br>
        </form>


          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
  <!--</div>-->
</body>
</html>