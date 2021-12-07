<?php
session_start();
extract($_POST);
include('db_psicoterapia.php');


if(isset($_POST['btn_appointment'])){
 // header('location: userSummary.php');
//             exit();

$checkappointment = mysqli_query($conn,"SELECT date as C1 FROM tbl_appts WHERE userID = '{$_SESSION['userID']}'");
        if(mysqli_num_rows($checkappointment) > 0){
         $hasnosamedate = TRUE;
         for($i = 1; $i <= mysqli_num_rows($checkappointment); $i++){
             // echo $i;
             $date = mysqli_fetch_assoc($checkappointment);
             $datecheck = $date['C1'];
             if($datepick == $datecheck){
                 $hasnosamedate = FALSE;
                 break;
             }
         }
         if($hasnosamedate == TRUE){
             // echo $datepick;
             $_SESSION['CopyOfdoctor'] = $docid;
             $_SESSION['CopyOfdatepick'] = $datepick;
             $_SESSION['CopyOfdisplaytime'] = $displaytime;
             // echo $_SESSION['CopyOfdoctor'];
             // echo $_SESSION['CopyOfdatepick'];
             // echo $_SESSION['CopyOfdisplaytime'];
             header('location:insertAppointment.php');
             exit();

         }else{
             echo "<script>
             alert('You already have an Appointment For this day, Please Check Your Email');
             window.location.href='Appointment.php';
             </script>";
         }

        }else{
         // echo "///";
         $_SESSION['CopyOfdoctor'] = $docid;
         $_SESSION['CopyOfdatepick'] = $datepick;
         $_SESSION['CopyOfdisplaytime'] = $displaytime;
         // echo $_SESSION['CopyOfdoctor'];
         //     echo $_SESSION['CopyOfdatepick'];
         //     echo $_SESSION['CopyOfdisplaytime'];
         header('location:insertAppointment.php');
         exit();
        }
}
$conn->close();
?>