<?php
session_start();
include('db_psicoterapia.php');


if(isset($_POST['btn_appointment'])){

    $doctor = $_POST['displaydoctor'];
    $pickedDate = $_POST['datepick'];
    $displaytime = $_POST['displaytime'];
    $doc_id = $_POST['docid'];
    $doc_email = $_POST['docemail'];

    $find = "SELECT * FROM tbl_useraccount where userID='{$_SESSION['userID']}'";
    $checking = mysqli_query($conn, $find);

    if(mysqli_num_rows($checking) > 0){
            $fetch_appointments = mysqli_fetch_assoc($checking);
            $userSurname = $fetch_appointments['userSurname'];
            $userGivenName = $fetch_appointments['userGivenName'];
            $userBirthday = $fetch_appointments['userBirthday'];
            $userImage = $fetch_appointments['userImage'];
            $userContactNumber = $fetch_appointments['userContactNumber'];	
            $userEmail = $fetch_appointments['userEmail'];	
        
            $userStatus = "pending";	

            

    $sqlinsertappoinments = "INSERT INTO tbl_appointments(lastname, firstname, birthday, picture, mobile, email,date, time, doctor, doc_id,concern,status,userID) VALUES ('$userSurname','$userGivenName','$userBirthday','$userImage','$userContactNumber','$userEmail','$pickedDate', '$displaytime', '$doc_email','$doc_id','headachess','$userStatus','{$_SESSION['userID']}')";
    $data_admin = mysqli_query($conn, $sqlinsertappoinments);



    $sqlSummary = "SELECT * FROM tbl_appointments WHERE userID='{$_SESSION['userID']}'";
			$checkSummary = mysqli_query($conn,$sqlSummary);

            
                 $subject = "SCHEDULE";
                $message = "Hi! $userSurname,$userGivenName \nYour Appointment for Doctor $sumDoctorsName \n\nSummary:\nContanct Number: $sumNumber\nDate: $pickedDate\nTime: $displaytime";
                $sender = "From: psicoterapiainc@gmail.com";



            if(mail($_SESSION['email'], $subject, $message, $sender)){
                
           
		
            if(mysqli_num_rows($checkSummary) > 0){
                $fetch_summaryData = mysqli_fetch_assoc($checkSummary);
				$sumUserName = $fetch_summaryData['email'];
				$sumDoctorsName = $fetch_summaryData['lastname'];
				$sumDate = $fetch_summaryData['date'];
				$sumTime = $fetch_summaryData['time'];
				$sumNumber = $fetch_summaryData['mobile'];

	            $_SESSION['name'] = $sumUserName;
				$_SESSION['DoctorsName'] = $doctor;
				$_SESSION['date'] = $sumDate;
				$_SESSION['time'] = $sumTime;
				$_SESSION['appointmentNumber'] = $sumNumber;

            }
            header('location: userSummary.php');
            exit();
    }

}else{
// $error = "Failed to Reset!";
// $_SESSION['error'] = $error;
// header('location: userLogin.php');
// exit();
echo "x";
}


	}else{
        echo "";
    }

?>