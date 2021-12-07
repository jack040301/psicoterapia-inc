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

	<title>Psicoterapia | Sign up</title>

	 <link rel="stylesheet" type="text/css" href="userSignup.css">

  <link rel="icon" type="png" href="userDesigns/user_images/noLabelLogo.png">

   <meta charset="UTF-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link

      rel="stylesheet"

      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

      <script src="calendar.js"> </script> 

</head>

<body style="background-color: #F1F3FF;">

	<nav class="main-nav">

        <input type="checkbox" id="check" />

        <label for="check" class="menu-btn">

          <i class="fas fa-bars"></i>

        </label>

        <a href="index.php" class="logo"><label class="psico" style="font-size: 2rem;">Psico</label><label class="terapia" style="font-size: 2rem;">terapia</label></a> <!--EDIT THE LINK TO YOUR LANDING PAGE-->

        <ul class="navlinks">

          <li><a href="index.php">Home</a></li>

          <li><a href="policy.php">Policy</a></li>

          <li><a href="userAboutUs.php">About us</a></li>

          <li><a href="userLogin.php" class="signIn">Sign in</a></li>

        </ul>

      </nav>



      <div class="whole">

      	<img src="userDesigns/user_images/withPencil.png">

      	<h2 style="text-align: center;">Sign Up</h2>

      	<?php 

            if(isset($_SESSION['error'])){ 

            $error = $_SESSION['error']; ?>

            <h4 style="color: red; margin-left: auto; padding-left: 0px;"> <?php  echo $_SESSION['error'] ?></h4>

        <?php } ?>



      	 <form method="POST" id="signupform" action="userAction.php">

      	 	<div class="row">

		        <div class="col-12">

		        	<label>First Name</label>

        			<input type="text" id="givenName" name="givenName"  autocomplete="username" placeholder="First Name" required="Required" onpaste="return false;" ondrop="return false;">

		        </div>

		        <div class="col-12">

			        <label>Last Name</label>

			        <input type="text" id="surename" name="surename"  autocomplete="username" placeholder="Last Name" required="Required" onpaste="return false;" ondrop="return false;">

		      </div>

		      <div class="col-12">

		        <label>Username</label>

		        <input type="text" id="username" name="username"  autocomplete="username" placeholder="Username" required="Required" onpaste="return false;" ondrop="return false;">

		      </div>

		      <div class="col-12">

		        <label>Contact Number</label><br>

		        <input type="tel" id="contactNumber" name="contactNumber" placeholder="Contact Number" required="Required" onkeypress="return isNumberKey(event)" maxlength="11" onpaste="return false;" ondrop="return false;">

		      </div>

		      <div class="col-12">

		        <label>Address</label>

		        <input type="text" id="address" name="address" placeholder="Address" required="Required" onpaste="return false;" ondrop="return false;">

		      </div>

		      <div class="col-12">

		        <label>Birthday</label> <!--PA EDIT NG CSS NG BIRTHDAY-->

		      	<input type="date" class="input-field" placeholder="Birthday" name="birthday" id="birthday" required onpaste="return false;" ondrop="return false;">

		      </div>

		      <div class="col-12">

		        <label>Email</label>

		        <input type="email" id="email" name="email"  autocomplete="email" placeholder="Email" pattern="^[a-zA-Z0-9-_.]+@gmail\.com$" required="Required" onpaste="return false;" ondrop="return false;">

		      </div>

		      <div class="col-12"> 

		        <label>Password</label>

		        <input type="password" id="password"  autocomplete="current-password" name="password" 

		           oninvalid="InvalidMsg(this);" 

		           oninput="InvalidMsg(this);"

		           required="required"

		           placeholder="Password" required="Required"  minlength="6"  maxlength="20" onpaste="return false;" ondrop="return false;" >

		      </div>

      	 	</div><!--row-->

      	 	<div class="row">

			    <input type="checkbox" name="checks" id="checks" onclick="myFunction()" required="Required"><label id="terms">Terms and Agreement</label><a href="#" class="agreement"></a>

			    <br>

			     <input type="submit" name="btn_signup" value="Sign Up" id="btn_signup">

			    <br><br>

			    <p class="dont">Already have an account? <a class="click" href="userLogin.php">Click here</a></p>

		    </div>

      	 </form>

      </div><!--whole-->



	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script>

     const phoneInputField = document.querySelector("#contactNumber");

   	 const phoneInput = window.intlTelInput(phoneInputField, {

    initialCountry: "ph",

     utilsScript:

       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",

   });

  	</script>

</body>

</html>

<script>

function myFunction() {

  // Get the checkbox

  var checkBox = document.getElementById("checks");

  // Get the output text

  var text = document.getElementById("text");

   if (checkBox.checked == true){

  

  swal({

  title: "Terms and Agreement",

  text: "Information we collect and how we use it. Individually identifiable information you provide to us. We will not disclose, sell or rent your name or any personal information about you to any third party. You do not need to give personal information to receive information from this site. There are instances online, however, when Psicoterapia requests individually identifiable information from you. We may retain this information for processing and to facilitate requests. Information you submit to us is treated in the same confidential manner as information you might provide in a written format such as an application or donation form.",

  icon: "info",

  button: "I agree",



});

  }

}

  </script>

<script>function isNumberKey(evt) {

  var charCode = (evt.which) ? evt.which : event.keyCode;

  if (charCode != 46 && charCode > 31

  && (charCode < 48 || charCode > 57))

  return false;

  return true;

}</script>


<script>
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0 so need to add 1 to make it 1!
var yyyy = today.getFullYear() - 90;
var legalyyyy = today.getFullYear() - 18;
dd = 31;
mm = 12;
if(dd<10){
  dd='0'+dd
} 
if(mm<10){
  mm='0'+mm
} 

today = yyyy+'-'+mm+'-'+dd;
legal = legalyyyy+'-'+mm+'-'+dd;
// console.log(today);
// console.log(legal);
document.getElementById("birthday").setAttribute("min", today);
document.getElementById("birthday").setAttribute("max", legal);
</script>


<?php

    unset($_SESSION["error"]);

?>