<?php
    require "../data/control.php";
    $id = $_SESSION['cid'];
    $sql = "UPDATE tbl_appointments SET status = 'cancelled' WHERE email = '$id' AND date = date(now())";
    $res = mysqli_query($connect, $sql);
    if($res){
        $_SESSION['info'] = "Cancellation of Appointment";
        header('location: appointment.php');
        exit();
    }
?>