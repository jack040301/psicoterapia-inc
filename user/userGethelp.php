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
	<title>Psicoterapia | Get Help</title>
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
      	<br>
      	<h3>Psicoterapia Get Help</h3>
      	<p> There are many ways for you to connect with us by contacting in our provided hotlines or reach out to us by phone, email or social media and let us know how we can help. </p>
					<p> National Mental Health Crisis Hotline (Philippines)
						<p>LUZON-WIDE LANDLINE TOLL FREE<br><b>
					1553</p></b>
					<p> GLOBE/TM SUBSCRIBERS <br>
					<p> 0966-351-4518<br> 0917-899-8727<br> 0917-899 –USAP </p><br>
					<p> SMART/SUN/TNT SUBSCRIBERS <br>
					<p> 0908-639-2672</p><br>
					<h4> DOH CALL CENTER </h4>
					<p> Telephone no.(632) 8651-7800<br> Local 5003-5004 (632) 165-364 <br> Email Address: callcenter@doh.gov.ph </p>
					<p>We have listed national helplines where we know they are available. If your country does not have a national helpline please seek professional and community support from trained and experienced carers.</p>

					<h4> UNITED KINGDOM </h4>
					<p> Mind Infoline on 0300 123 3393 (Monday to Friday, 9am to 6pm)For advice and support on a wide range of mental health problems. </p><br>
					<h4> INDIA </h4>
					<p>Fortis Exam Helpline +918376804102 The Fortis National Helpline number is for students or parents with queries related to stress, mental wellbeing and exam tips. Open 24 hours. </p><br>
					<h4> AUSTRALIA </h4>
					<p>Lifeline 13 11 14</p>
				      
				    <h4> NEWZEALAND</h4>
					<p>Lifeline 0800 543 354 (0800 LIFELINE) or free text 4357 (HELP)</p><br>
					<h4> SOUTH AFRICA </h4>
					<p>Suicide Crisis Helpline 0800 567 567 <br> 4hr Substance Abuse Helpline 0800121314 <br>Mental Health Helplines 0800456789/0800212223
					</p><br>
					<h4> NIGERIA </h4>
					<p>Mentally Aware Nigeria Initiative (MANI) 0809111MANI(6264)</p>					<br>
				<h4> PHILIPPINES  </h4>
					<p> #ThereisHelp at National Centre for Mental Health Crisis hotline 1553 (+63) 917-899-8727 / (02) 7-989-8727. </p><br>
						<h4> JAPAN  </h4>
					<p>Tell Lifeline on 03-5774-0992. </p><br>
					<h4> IRELAND  </h4>
					<p>Connect counselling Helpline: 1800 477 477. </p><br>
					<h4> USA  </h4>
					<p>National Alliance on Mental Illness (NAMI) hotline 1-800-950-NAMI (6264) or info@nami.org </p>

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
 <!-- </div>-->

</body>
</html>