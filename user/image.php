<?php




$imagesql = "SELECT userImage From tbl_useraccount WHERE userID='{$_SESSION['userID']}'"; 

$res = mysqli_query($conn, $imagesql);
   
$fetch = mysqli_fetch_assoc($res);

$dbpass = $fetch['userImage'];
$SESSION['image'] = $dbpass;
        ?>