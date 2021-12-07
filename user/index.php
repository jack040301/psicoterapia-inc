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
	<title>Psicoterapia</title>
	<link rel="stylesheet" type="text/css" href="landing.css">
	<link rel="icon" type="png" href="userDesigns/user_images/noLabelLogo.png">
	<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
	<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</head>
<body style="background-color: #F1F3FF;">
	<nav class="main-nav">
		<input type="checkbox" id="check" />
        <label for="check" class="menu-btn">
          <i class="fas fa-bars"></i>
        </label>
        <a href="index.php" class="logo"><label class="psico">Psico</label><label>terapia</label></a>
        <ul class="navlinks">
          <li><a href="index.php" class="active">Home</a></li>
          <li><a href="policy.php">Policy</a></li>
          <li><a href="userAboutUs.php">About us</a></li>
          <li><a href="userLogin.php" class="signIn">Sign in</a></li>
        </ul>
	</nav>

	<div class="cont">
		<div class="quotation">
      	 <p class="it">It doesn’t get <label class="easier">easier,</label></p>
     	 <p class="it">You just get <label class="easier">stronger.</p>
      	</div><!--quotation-->
      <img src="userDesigns/user_images/doctor.png" class="pic img-fluid">
     </div><!--cont-->

     <div class="booking col-md-12">
     	<div class="rows col-md-12">
			  <div class="column col-md-3">
			    <h2>Professional Psychiatrists</h2>
			    <p>We'll offer you the most in demand professionals to care for you</p>
			  </div>
			  <div class="column col-md-3">
			    <h2>Online Appointment</h2>
			    <p>Booking for a professional made easier.</p>
			  </div>
			  <div class="column col-md-3">
			    <h2>Fast Booking</h2>
			    <p>Confirm your booking today to be consulted the next day.</p>
			  </div>
			  <div class="column3 col-md-3">
			  	<form method="POST" action="userAction.php">
			   <input class="book" type="submit" name="btnBookNow" value="Book Now!">
			  </div>
			</div>
     </div><!--booking-->

     <div class="secondCont">
     	<h1 class="head">Psicoterapia is for everyone</h1>
      		<p>Read articles about how to fight mental problems and help your loved ones.</p>
     </div><!--secondCont-->
     <div class="boxes">
      	<div class="firstBox">
      		<div class="yourself">
      		</div>
      		<h3 class="care">Care for yourself</h3>
      		<p class="first">If you are experiencing one of the symptoms, you can check yourself out.</p>
      		<a class="read" href="Yourself.php">Read More&#x2192;</a>
      	</div>
      	<div class="firstBox">
      		<div class="friends">
      		</div>
      		<h3 class="care">Care for your friends</h3>
      		<p class="first">Do you a friend experiencing mental problems? check this out to help them.</p>
      		<a class="read" href="Yourself.php">Read More&#x2192;</a>
      	</div>
      	<div class="firstBox">
      		<div class="family">
      		</div>
      		<h3  class="care">Care for your family</h3>
      		<p class="first">You have a family member experiencing mental problems? Help them thru reading our articles.</p>
      		<a class="read" href="Yourself.php">Read More&#x2192;</a>
      	</div>
	</div>

      <footer class="">
	<div class="foots container-fluid">
		
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
		<a href="https://www.facebook.com/MentalHealthCenterNH/" class="facebook"> </a>	
		<a href="https://www.instagram.com/mhcgm/" class="instagram"> </a>
		<a href="https://twitter.com/MentalHealthNH" class="twitter"> </a>
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
<!--	</div>-->
    

</body>
</html>