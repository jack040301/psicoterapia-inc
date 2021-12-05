<?php

session_start();
extract($_POST);
include('db_psicoterapia.php');


	$maxnum = "";
			$appointmentNumber = "SELECT max(userNumber) as maxnum FROM tbl_appointment";
			$check_number = mysqli_query($conn, $appointmentNumber);
			while($runrows = mysqli_fetch_assoc($check_number))
			{
				$maxnum = $runrows['maxnum'] ;
				 if(empty($maxnum) || $maxnum = NULL){
					$maxnum += 1;
				 }
				 else{
					$runrows['maxnum'] += 1;
					$maxnum = $runrows['maxnum'] ;
				}
			}
			
			// echo $maxnum;
			$today = date("m-d-Y");

			$sqlinsertappoinment = "INSERT INTO tbl_appointment VALUES ($maxnum,'{$_SESSION['userID']}','{$_SESSION['CopyOfdatepick']}', '{$_SESSION['CopyOfdisplaydoctor']}', '{$_SESSION['CopyOfdisplaytime']}','$today')";
			$data_check_appointment = mysqli_query($conn, $sqlinsertappoinment);
			if($data_check_appointment){

				$sqlSummary = "SELECT * FROM tbl_appointment AS t1 LEFT JOIN tbl_useraccount AS t2 ON (t1.userID = t2.userID) WHERE userEmail = '{$_SESSION['email']}' AND userNumber = $maxnum";
				$checkSummary = mysqli_query($conn,$sqlSummary);
				if(mysqli_num_rows($checkSummary) > 0){
					$fetch_summaryData = mysqli_fetch_assoc($checkSummary);
					$sumUserName = $fetch_summaryData['userFullname'];
					$sumDoctorsName = $fetch_summaryData['user_pickedDoctor'];
					$sumDate = $fetch_summaryData['user_pickedDate'];
					$sumTime = $fetch_summaryData['user_pickedTime'];
					$sumNumber = $fetch_summaryData['userNumber'];

					$_SESSION['name'] = $sumUserName;
					$_SESSION['DoctorsName'] = $sumDoctorsName;
					$_SESSION['date'] = $sumDate;
					$_SESSION['time'] = $sumTime;
					$_SESSION['appointmentNumber'] = $sumNumber;

					$subject = "SCHEDULE";
					$message = "Hi! $sumUserName \nYour Appointment for Doctor $sumDoctorsName \n\nSummary:\nAppointment Number: $sumNumber\nDate: $sumDate\nTime: $sumTime";
					$sender = "From: psicoterapiainc@gmail.com";
					if(mail($_SESSION['email'], $subject, $message, $sender)){
						header('location: userSummary.php');
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
			}

$conn->close();
?>