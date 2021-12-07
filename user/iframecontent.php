<?php
include('db_psicoterapia.php');
session_start();

$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : false;
$date_schedule = isset($_POST['date_schedule']) ? $_POST['date_schedule'] : '';
$date_format = date('m-d-Y', strtotime($date_schedule));
$_SESSION['pick'] = $date_format;

if($Submit){
 echo $date_format;

}

$conn->close();
?>
