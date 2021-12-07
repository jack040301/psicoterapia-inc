<?php

include('appointfunct.php');
	if(empty($_SESSION['userID'])){

	  header('location:userLogin.php');

	}

?>



<!DOCTYPE html>

<html>

<head>

    <script src="./removeBanner.js"></script>

	<meta charset="utf-8">

	<title>Psicoterapia | Invoice</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>



	<style type="text/css">

		body{

			background-color: #9DC3E6;

			font-family: Poppins;



		}

		html, body{

		  overflow-x: hidden;

		  overflow-y: hidden;

		}

		.containers{

			background-color: #F1F3FF;

			margin: auto;



			width: 	30%;

			height: auto;

			margin-top: 50px;

			text-align: left;

			min-width: 350px;

			border-radius: 5px;

			/*position: absolute;*/

			padding-left: 50px;

    		padding-bottom: 50px;

    		padding-right: 20px;

    		box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;



		}

		input{

			/*margin-top: 200px;*/

			margin-right: auto;

			float: right;

			font-family: poppins;

			font-size: 15px;

			height: 45px;

			width: 100px;

			background-color: #415CD6;

			color: #F4F4F7;

			border-radius: 5px;

			border: none;

			cursor: pointer;

		}

		h1{

			font-weight: normal;

		}

		.logo{

		  	color: #4E4F62;

	      	line-height: 90px;

	      	font-size: 27pt;

	      	font-weight: bold;

	     	text-decoration: none;

	      	font-family: "Roboto", sans-serif;

	     	background-color: transparent;

	     	background-image: url(images/brain.png);

	     	background-repeat: no-repeat;

	     	background-size: 60px;

		}

		a{

			padding-left: 50px;

    		padding-right: 50px;

    		text-decoration: none;

		}

		.terapia{

			color: #485EAB;

    		cursor: pointer;

		}

		p{

			font-size: 16pt;

		}

		.ttl{

			text-align: center;

		}

		.booking{

			font-weight: bold;

		}

		@media (max-width: 1360px) {

    .logo{

        font-size: 4vh;

        background-size: 20%;

        margin-top: 20px;

      }

      .psico{

        margin-left: -4px;

        font-size: 1.5rem;

      }

      .terapia{

        font-size: 1.5rem;

      }

  }

	</style>





	<div class="containers">	

		

		<form method="POST" action="userAction.php">

			<div class="ttl"><a href="#" class="logo"><label class="psico" style="font-size: 2.5rem;">Psico</label><label class="terapia" style="font-size: 2.5rem;">terapia</label></a></div>

			<p class="booking">Booking Invoice</p>

			<p>Name: <?php  echo $_SESSION['name'] ?></p>

			<p>Your Appointmet for Doctor <?php  echo $_SESSION['DoctorsName'] ?></p>

			<br><br>

			<p>Contanct Number: <?php  echo $_SESSION['appointmentNumber'] ?></p>

			<p>Date: <?php  echo $_SESSION['date'] ?></p>

			<p>Time: <?php  echo $_SESSION['time'] ?></p>

			

			<input type="submit" name="btndone" value="Done">

			<br>

		</form>

	</div>

</body>

</html