<?php
include('db_psicoterapia.php');

session_start();

if(!empty($_SESSION['userID'])){
  header('location:userdashboard.php');
}

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <script src="./removeBanner.js"></script>
	<title>Psicoterapia | Policy</title>
	
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
        <a href="index.php" class="logo"><label class="psico">Psico</label><label class="terapia">terapia</label></a>
        <ul class="navlinks">
          <li><a href="index.php">Home</a></li>
          <li><a href="policy.php" class="active">Policy</a></li>
          <li><a href="userAboutUs.php">About us</a></li>
          <li><a href="userLogin.php" class="signIn">Sign in</a></li>
        </ul>
      </nav>
      <br>
      <br>
      <div class="content">
      	<h3>Psicoterapia Privacy Guidelines</h3>
      	<p>Psicoterapia is committed to protecting your privacy. We have created this Privacy Policy to explain why we collect certain information about you when you use this website, and how we protect the privacy of that information. This Policy does not apply to your personal health information. </p>
      <br>
      <h3>How does Psicoterapia collect and use your information?</h3>
      	<p>Information we collect and how we use it. Individually identifiable information you provide to us. We will not disclose, sell or rent your name or any personal information about you to any third party. You do not need to give personal information to receive information from this site. There are instances online, however, when Psicoterapia requests individually identifiable information from you. We may retain this information for processing and to facilitate requests. Information you submit to us is treated in the same confidential manner as information you might provide in a written format such as an application or donation form.</p>
      <br>
      <h3>Cancellation Policy</h3>
      	<p>Psicoterapia is here to provide you with the very best care and attention. We attempt to be available during the times our patients most need. At Psicoterapia, we understand that unanticipated events occur in everyone’s lives. However, out of respect for both our clinicians and the patients who are trying to rearrange their busy schedules, we ask that you do your very best to not cancel appointments last minute or not show up for your scheduled appointment.In our commitment to provide outstanding services to all of our patients and out of consideration for our clinicians’ and patients’ time, we have adopted the following policies:You may cancel or reschedule your appointment without charge prior to 24 hours in advance or by the end of business hours the day before your appointment. If you cancel or reschedule with less than the aforementioned notice or via voicemail after closing the business day preceding your appointment, you may be charged 100% of the scheduled service price.</p>
      <br>
      <h3>No Show Policy</h3>
      	<p>Out of consideration and respect of our practitioners’ time, if a client does not show up for a scheduled appointment and does not provide any type of advanced notice, the patient will be charged the full price of the scheduled visit.
We understand that sometimes life is a little out of your control and that unforeseen circumstances happen.
Thank you for your understanding. We look forward to helping you.
*Please Note: Not receiving an automated reminder is NOT an acceptable excuse for missing an appointment. These automated reminders should be considered a “bonus” to keep you on track with your schedule and should not be relied upon as your sole method of knowing when your appointment is.</p>
      <br>
      <h3>Tardy Policy</h3>
      	<p>As you can imagine, late arrivals can set back our schedules significantly. As a courtesy to our patients, if you arrive late, your session may be shortened to the remainder of your original scheduled appointment.
The first offence will be forgiven, but any following will be charged 100% of the scheduled service price. If more than three visits are missed or tardy, advanced payment will be requested.</p>
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