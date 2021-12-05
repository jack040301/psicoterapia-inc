<?php

session_start();

extract($_POST);

include('db_psicoterapia.php');

//require "db_psicoterapia.php";





if ($_SERVER['REQUEST_METHOD'] == "POST") {



	// LOGIN

	//

	if(isset($_POST['btnlogin'])){

		

		$ciphering = "AES-128-CTR";

		$iv_length = openssl_cipher_iv_length($ciphering);

		$options = 0;

		$encryption_iv = '1234567891011121';

		$encryption_key = "mavis";

		$encryption = openssl_encrypt($_POST['password'], $ciphering,

		$encryption_key, $options, $encryption_iv);



    	$sqllogin = mysqli_query($conn,"SELECT * FROM tbl_useraccount WHERE userEmail = '$email' AND userPassword = '$encryption' ");

    	if(mysqli_num_rows($sqllogin) > 0 ){

    		// check if verified

    		$sqlcheckEmail = mysqli_query($conn,"SELECT * FROM tbl_useraccount WHERE userEmail = '$email' AND userStatus = 'verified'");

    		if(mysqli_num_rows($sqlcheckEmail) > 0){

    			$fetch_userid = mysqli_fetch_assoc($sqlcheckEmail);

		     	$fetch_useridcode = $fetch_userid['userID'];

		     	$fetch_username = $fetch_userid['userUsername'];



		     	$_SESSION['userID'] = $fetch_useridcode;

			    $_SESSION['email'] = $email;

			    $_SESSION['username'] = $fetch_username;



			  





			    header('location: user_Account.php');

			    

			    exit();



    		}else{

    			$code = rand(999999, 111111);

				$updatecode = mysqli_query($conn,"UPDATE tbl_useraccount SET userCode = '$code' WHERE userEmail = '$email'");

				if($updatecode){

					$subject = "Email Verification Code";

			        $message = "Your verification code is $code";

			        $sender = "From: psicoterapiainc@gmail.com";

			        if(mail($_POST['email'], $subject, $message, $sender)){

			            $errorev = "We've sent a verification code to your email - $email";

			            $_SESSION['info'] = $info;

			           //$_SESSION['email'] = $email;

			            $_SESSION['password'] = $password;



			            $btnlogin = "LoginPage";

			            $_SESSION['btnlogin'] = $btnlogin;

			            $_SESSION['errorev'] = $errorev;

					

			            header('location: userEmailVerification.php');

			            exit();

			        }else{

			            $error = "Failed while sending code!";

					     $_SESSION['error'] = $error;

					     header('location: userLogin.php');

					   

			        }

	    		}else{

	        		 $error = "Failed while inserting data into database!";

					     $_SESSION['error'] = $error;

					     header('location: userLogin.php');

					     

	   			}



    		}

		}else{

			$error = "You have entered invalid email or password";

			$_SESSION['error'] = $error;

			header('location: userLogin.php');

	        exit();

	    }

	}//log in



	// SIGNUP

	//

	else if(isset($_POST['btn_signup'])){



		// $fullname = $givenName .' '. $surename;

		// echo $fullname;



		$EmailCheck = mysqli_query($conn,"SELECT * FROM tbl_useraccount where userEmail = '$email'");

		if(mysqli_num_rows($EmailCheck) > 0){

			$error = "Email is Already Exists, Please use other Email";

			$_SESSION['error'] = $error;

			header('location: userSignup.php');

		}else{

			$ciphering = "AES-128-CTR";

			$iv_length = openssl_cipher_iv_length($ciphering);

			$options = 0;

			$encryption_iv = '1234567891011121';

			$encryption_key = "mavis";

			$encryption = openssl_encrypt($_POST['password'], $ciphering,

			$encryption_key, $options, $encryption_iv);



			$code = rand(999999, 111111);

			$fpcode = 0;

			$status = "Not Verified";



			$maxUserId = "";

			$tbluseraccount = "SELECT max(userID) as maxID FROM tbl_useraccount";

			$checkMaxID = mysqli_query($conn, $tbluseraccount);

			while($idRows = mysqli_fetch_assoc($checkMaxID))

			{

				$maxUserId = $idRows['maxID'] ;

				 if(empty($maxUserId) || $maxUserId = NULL){

					$maxUserId += 1;

				 }

				 else{

					$idRows['maxID'] += 1;

					$maxUserId = $idRows['maxID'] ;

				}

			}





			$computeAge = "SELECT DATE_FORMAT(FROM_DAYS(DATEDIFF(now(),'$birthday')), '%Y')+0 AS Age;";

			$agenow = mysqli_query($conn,$computeAge);



			if(mysqli_num_rows($agenow) > 0){

				$f1 = mysqli_fetch_assoc($agenow);

					$agenow = $f1['Age'];

					// echo $agenow;

					$imagedefault = 'uploads/default.png';

					$fullname = $givenName .' '. $surename;

					// INSERT INTO tbl_useraccount VALUES (null,1,2,3,4,5,6,7,8,9,0)



				$sqlInsertdata = "INSERT INTO tbl_useraccount VALUES ('$maxUserId','$imagedefault','$givenName','$surename','$fullname', '$username', '$contactNumber', '$address','$birthday','$agenow','$email','$encryption','$code' ,'$fpcode', '$status')";

				$data_check = mysqli_query($conn, $sqlInsertdata);

				if($data_check){

					// echo $maxUserId;

					$subject = "Email Verification Code";

			        $message = "Your verification code is $code";

			        $sender = "From: psicoterapiainc@gmail.com";

			        if(mail($_POST['email'], $subject, $message, $sender)){

			            $error = "We've sent a verification code to your email - $email";

			            // $_SESSION['info'] = $info;

			            $_SESSION['email'] = $email; 

			            $_SESSION['userID'] = $maxUserId;

			            $_SESSION['username'] = $username;

			            // $_SESSION['password'] = $password;

			            $_SESSION['error'] = $error;



			            // echo "<script type='text/javascript'>alert('{$_SESSION['email']}');</script>";\

			   //          echo '<script language=""text/javascript"">';

						// echo 'alert(' .$_SESSION['email'].' )';

						// echo '</script>';

						// echo $_SESSION['email'];



			            header('location: userEmailVerification.php');

			            exit();

			        }else{

						$error = "Failed!";

						$_SESSION['error'] = $error;

						header('location: userSignup.php');

			        }

				}

				else{

			        $error = "failed to signup!";

					$_SESSION['error'] = $error;

					header('location: userSignup.php');

			    }

			}// row if

			else{

				$error = "Birth date invalid";

				$_SESSION['error'] = $error;

				header('location: userSignup.php');

			}

		}

	}// btnsign up



	//email verification

	//

	else if(isset($_POST['btn_emailVerify'])){

		$CheckCode = mysqli_query($conn,"SELECT * FROM tbl_useraccount where userCode = '$otp'");

		if(mysqli_num_rows($CheckCode) > 0){

			 $fetch_data = mysqli_fetch_assoc($CheckCode);

		     $fetch_code = $fetch_data['userCode'];

		     $email = $fetch_data['userEmail'];

		     $code = 0;

		     $status = 'verified';

		     $update_otp = "UPDATE tbl_useraccount SET userCode = '$code', userStatus = '$status' WHERE userCode = $fetch_code";

		     $update_res = mysqli_query($conn, $update_otp);

		     if($update_res){

		            $_SESSION['email'] = $email;

		            header('location: user_Account.php');

		            exit();

		      }else{

				$error = "Failed while updating code!";

				$_SESSION['error'] = $error;

				header('location: userEmailVerification.php');

		      }

		}else{

			$error = "You have entered incorrect code!";

			$_SESSION['error'] = $error;

			header('location: userEmailVerification.php');

    	}

	} //btn_emailVerify



	//forgot pass

	//

	elseif(isset($_POST['linkforgotpass'])){

		// if ($email == "") {

		// 	$error = "Please Enter your email";

		// 	$_SESSION['error'] = $error;

		// 	header('location: userLogin.php');

		// }



		$ssqlcheckemail_fp = mysqli_query($conn,"SELECT * FROM tbl_useraccount WHERE userEmail = '$femail'");

	    if(mysqli_num_rows($ssqlcheckemail_fp) > 0 ){

	    	$fpcode = rand(999999, 111111);

			$sqlforgotpass = "UPDATE tbl_useraccount SET userFPCode = '$fpcode' WHERE userEmail = '$femail'";

			$data_check = mysqli_query($conn, $sqlforgotpass);

			if($sqlforgotpass){	

				$subject = "Password Reset Code";

				$message = "Your password reset code is $fpcode";

				$sender = "From: psicoterapiainc@gmail.com";

				if(mail($_POST['femail'], $subject, $message, $sender)){

					$error = "We've sent a verification code to your email - $femail";

					//$_SESSION['email'] = $email;

					$_SESSION['error'] = $error;

				 	header('location: userResendCode.php');

				 	// header('location: userResetpass.php');

					exit();

				}else{

					$error = "Failed to Reset!";

					$_SESSION['error'] = $error;

					header('location: userLogin.php');

					exit();

				}

			}else{

				$error = "Failed to connect!";

				$_SESSION['error'] = $error;

				header('location: userLogin.php');

				exit();

			}

		}else{

			$error = "Email Doesnt exist!";

			$_SESSION['error'] = $error;

			header('location: userLogin.php');

		}

	}// forgot pass



	// reset pass

	// 

	elseif ( isset($_POST['btnRestPass']) ) {

		$CheckCode = mysqli_query($conn,"SELECT * FROM tbl_useraccount where userFPCode = '$otp'");

		if(mysqli_num_rows($CheckCode) > 0){

			$fetch_data = mysqli_fetch_assoc($CheckCode);

	        $email = $fetch_data['userEmail'];

	        if($newpassword != $cnewpassword){

				$error = "New Password and Confirm Password Didnt match";

					$_SESSION['error'] = $error;

					header('location: userResendCode.php');

			        exit();

	        }else{

	            	$ciphering = "AES-128-CTR";

				$iv_length = openssl_cipher_iv_length($ciphering);

				$options = 0;

				$encryption_iv = '1234567891011121';

				$encryption_key = "mavis";

				$encryption = openssl_encrypt($cnewpassword, $ciphering,

				$encryption_key, $options, $encryption_iv);

				

	        	$sqlUpdatePass = mysqli_query($conn,"UPDATE tbl_useraccount SET userPassword = '$encryption' where userFPCode = '$otp'");

	        	$fpcode = "0";

	        	$sqlupdatefpcode = mysqli_query($conn,"UPDATE tbl_useraccount SET userFPCode = '$fpcode' where userEmail = '$email'");

	        	$error = "Successfully Updated Password";

				$_SESSION['error'] = $error;

				header('location: userLogin.php');

				exit();

			}

		}else{

			$error = "Incorrect otp!";

			$_SESSION['error'] = $error;

			header('location: userResendCode.php');

		}

	}//resetpass



	//btn appointment

	//

	else if( isset($_POST['btn_appointment']) == "book"){
$checkappointment = mysqli_query($conn,"SELECT * FROM tbl_appointment WHERE userID = '{$_SESSION['userID']}'");
		if(mysqli_num_rows($checkappointment) > 0){
			
			// echo "asd";
			$fetchdata = mysqli_fetch_assoc($checkappointment);
			$fetchDatepicked = $fetchdata['user_pickedDate'];
			$fetchdoctorName = $fetchdata['user_pickedDoctor'];
			$fetchTimepicked = $fetchdata['user_pickedTime'];
			
			if($datepick != $fetchDatepicked){
				// echo "xxx";
				$_SESSION['CopyOfdisplaydoctor'] = $displaydoctor;
				$_SESSION['CopyOfdatepick'] = $datepick;
				$_SESSION['CopyOfdisplaytime'] = $displaytime;
				header('location: insertAppointment.php');
				exit();
			}else{
			// echo "///";
				echo "<script>
				alert('You already have an Appointment For this day, Please Check Your Email');
				window.location.href='Appointment.php';
				</script>";
			}		
			
		}else{
			$_SESSION['CopyOfdisplaydoctor'] = $displaydoctor;
			$_SESSION['CopyOfdatepick'] = $datepick;
			$_SESSION['CopyOfdisplaytime'] = $displaytime;
			header('location: insertAppointment.php');
			exit();
		}
	}//appointment



	//btn book on landing page

	//

	else if( isset($_POST['btnBookNow'])){

		if(!isset($_SESSION['email'])){

			header('location: userLogin.php');

			exit();



			 // echo $_SESSION['email'];

			 // echo "<script type='text/javascript'>alert('{$_SESSION['userID']}');</script>";

			// exit();

		}else{

			header('location: Appointment.php');

			exit();

			// echo $_SESSION['email'];

			// echo "<script type='text/javascript'>alert('{$_SESSION['userID']}');</script>";

			// session_destroy();

			// header('location: LandingPage.php');

			

			exit();

		}

	}//btn book



	//btn age

	//

	else if( isset($_POST['btnsave'])){

		// // SELECT DATE_FORMAT(FROM_DAYS(DATEDIFF(now(),'2010-11-25')), '%Y')+0 AS Age;

		// $sql = "SELECT userBirthday as birthday FROM tbl_useraccount";

		// $age = mysqli_query($conn,$sql);



		// if(mysqli_num_rows($age) > 0){

		// 	$f = mysqli_fetch_assoc($age);

		// 	$agec = $f['birthday'];



		// 	// echo $agec;

		// 	$sql1 = "SELECT DATE_FORMAT(FROM_DAYS(DATEDIFF(now(),'$agec')), '%Y')+0 AS Age;";

		// 	$agenow = mysqli_query($conn,$sql1);



		// 	if(mysqli_num_rows($agenow) > 0){

		// 	$f1 = mysqli_fetch_assoc($agenow);

		// 		$agenow = $f1['Age'];



		// 		echo $agenow;

		// 	}

		echo $givename . ' ' . $surename;

		// echo "Today is " . date("m-d-Y") . "<br>";

		$today = date("m-d-Y");

			echo $today;



		// }

	}//btn book





	//btn done

	// //

	else if( isset($_POST['btndone'])){

	

		header('location: userdashboard.php');

	

	}//btn done

	else if(isset($_POST['cancelupdate'])){

		header('location: userdashboard.php');

	}



	//userupdateprofile action

	////

	else if (isset($_POST['save'])) {

		$ciphering = "AES-128-CTR";

		$iv_length = openssl_cipher_iv_length($ciphering);

		$options = 0;

		$encryption_iv = '1234567891011121';

		$encryption_key = "mavis";

		$encryption = openssl_encrypt($_POST['upcurrentpass'], $ciphering,

		$encryption_key, $options, $encryption_iv);



    	$updateprofile = mysqli_query($conn,"SELECT * FROM tbl_useraccount WHERE userID ='{$_SESSION['userID']}' AND userPassword = '$encryption' ");

    	if(mysqli_num_rows($updateprofile) > 0 ){

    		$ciphering = "AES-128-CTR";

                $iv_length = openssl_cipher_iv_length($ciphering);

                $options = 0;

                $encryption_iv = '1234567891011121';

                $encryption_key = "mavis";

                $encryption = openssl_encrypt($_POST['upnewpass'], $ciphering,

                $encryption_key, $options, $encryption_iv);



                $fullname = $upfirstname." ".$uplastname;



                $sql = "UPDATE tbl_useraccount set userGivenName = '" . $upfirstname . "',userSurname = '" . $uplastname . "', userFullname='" . $fullname . "', userPassword='" . $encryption . "', userContactNumber='" . $upcontactnumber . "' WHERE userID='{$_SESSION['userID']}'";

                // UPDATE tbl_useraccount set userFullname = concat(userGivenName, " " ,userSurname), userContactNumber='09673222205' WHERE userID =1;

                if($conn->query($sql) === TRUE){

                    $error = "Update Successfully";

		    		$_SESSION['error'] = $error;

		    		header('location: userupdateprofile.php');

                }else{

                	$error = "Update Unsuccessfully";

		    		$_SESSION['error'] = $error;

		    		header('location: userupdateprofile.php');

                }



    	}else{

    		$error = "Current Password is Incorrect, Please Try Again";

    		$_SESSION['error'] = $error;

    		header('location: userupdateprofile.php');



    	}

	}

	//userupdateprofile action











// unset($_SESSION["email"]);



}//post



$conn->close();

// unset($_SESSION['email']);



?>