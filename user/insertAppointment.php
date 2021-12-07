<?php

session_start();
extract($_POST);
include('db_psicoterapia.php');

// header('Location:userSummary.php');
						// exit();
	
	$maxnum = "";
	$appointmentNumber = "SELECT max(apptID) as maxnum FROM tbl_appts";
	$check_number = mysqli_query($conn, $appointmentNumber);
	while($runrows = mysqli_fetch_assoc($check_number))
	{
		$maxnum = $runrows['maxnum'];
		if(empty($maxnum) || $maxnum = NULL){
			$maxnum += 1;
		}
		else{
			$runrows['maxnum'] += 1;
			$maxnum = $runrows['maxnum'] ;
		}
	}
	// echo $maxnum;

	$status = "pending";
	$today = date("m-d-Y");

	// echo $maxnum ." ". $_SESSION['userID'] ." ". $_SESSION['CopyOfdoctor'] ." ". $_SESSION['CopyOfdatepick'] ." ". $_SESSION['CopyOfdisplaytime'];
	// echo $status;
	// echo $today;

	$sqlinsertappoinment = mysqli_query($conn,"INSERT INTO tbl_appts VALUES ($maxnum,'{$_SESSION['userID']}','{$_SESSION['CopyOfdoctor']}', '{$_SESSION['CopyOfdatepick']}', '{$_SESSION['CopyOfdisplaytime']}','$status','$today')");
	// $data_check_appointment = mysqli_query($conn, $sqlinsertappoinment);
	if($sqlinsertappoinment){
		// echo "///";
		$sqlSummary = "SELECT * FROM tbl_appts AS t1 LEFT JOIN tbl_useraccount AS t2 ON t1.userID = t2.userID left join tbl_employee t3 on t1.docID = t3.id WHERE 
		userEmail = '{$_SESSION['email']}' AND apptID = $maxnum";
		$checkSummary = mysqli_query($conn,$sqlSummary);
		if(mysqli_num_rows($checkSummary) > 0){
			$fetch_summaryData = mysqli_fetch_assoc($checkSummary);
			$sumUserName = $fetch_summaryData['userFullname'];
			$sumDoctorsName = $fetch_summaryData['lastname'];
			$sumDate = $fetch_summaryData['date'];
			$sumTime = $fetch_summaryData['time'];
			$sumNumber = $fetch_summaryData['apptID'];

			// echo $sumDoctorsName;
			$_SESSION['name'] = $sumUserName;
			$_SESSION['DoctorsName'] = $sumDoctorsName;
			$_SESSION['date'] = $sumDate;
			$_SESSION['time'] = $sumTime;
			$_SESSION['appointmentNumber'] = $sumNumber;

			$subject = "SCHEDULE";
			$message = "Hi! $sumUserName \nYour Appointment for Doctor $sumDoctorsName \n\nSummary:\nAppointment Number: $sumNumber\nDate: $sumDate\nTime: $sumTime";
			$sender = "From: psicoterapiainc@gmail.com";
			if(mail($_SESSION['email'], $subject, $message, $sender)){
				header('Location:userSummary.php');
				exit();
			}else{
				$error = "Failed to Reset!";
				$_SESSION['error'] = $error;
				header('location: userLogin.php');
				exit();
			}
		}
	}else{
		echo "failed to book";
		// header('location: Appointment.php');
		// exit();
	}

$conn->close();
?>