<?php
    require "../data/control.php";
    $id = $_SESSION['cid'];
    $sql = "UPDATE tbl_appts LEFT JOIN tbl_useraccount ON tbl_appts.userID = tbl_useraccount.userID SET  tbl_appts.status = 'cancelled' WHERE tbl_useraccount.userEmail = '$id' AND date = date(now())";
    $res = mysqli_query($connect, $sql);
    if($res){
        $_SESSION['info'] = "Cancellation of Appointment";
        header('location: appointment.php');
        exit();
    }
?>

<!-- UPDATE tbl_appts
LEFT JOIN tbl_useraccount 
ON tbl_appts.userID = tbl_useraccount.userID SET  tbl_appts.status = 'cancelled'
WHERE tbl_useraccount.userEmail = 'espinola.demverleen@gmail.com'; -->