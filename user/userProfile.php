<?php
session_start();
include("db_psicoterapia.php");


$fname = $_POST['upfirstname'];
$lname = $_POST['uplastname'];
$currentpass = $_POST['upcurrentpass'];
$newpass = $_POST['upnewpass'];
$contacts = $_POST['upcontactnumber'];



$fullname = $fname." ".$lname;

if(isset($_POST['save'])){

         $ciphering = "AES-128-CTR";
		$iv_length = openssl_cipher_iv_length($ciphering);
		$options = 0;
		$encryption_iv = '1234567891011121';
		$encryption_key = "mavis";
		$encryption = openssl_encrypt($_POST['upcurrentpass'], $ciphering,
		$encryption_key, $options, $encryption_iv);

        $query ="SELECT userPassword, userUsername from tbl_useraccount where userID='{$_SESSION['userID']}'";
        
        $res = mysqli_query($conn, $query);
       
        $fetch = mysqli_fetch_assoc($res);
        
        //Need for loginform
        $username = $fetch['userUsername'];
       $_SESSION['username'] = $username;

        $dbpass = $fetch['userPassword'];

        if(mysqli_num_rows($res)>0){
            if($dbpass==$encryption){


                $ciphering = "AES-128-CTR";
                $iv_length = openssl_cipher_iv_length($ciphering);
                $options = 0;
                $encryption_iv = '1234567891011121';
                $encryption_key = "mavis";
                $encryption = openssl_encrypt($_POST['upnewpass'], $ciphering,
                $encryption_key, $options, $encryption_iv);
        

                $sql = "UPDATE tbl_useraccount set  userFullname='" . $fullname . "', userPassword='" . $encryption . "', userContactNumber='" . $contacts . "' WHERE userID='{$_SESSION['userID']}'";

                if($conn->query($sql) === TRUE){


                    $_SESSION['status'] = "Updated Data";
                    $_SESSION['status_code'] = "success";
                	header("location:user_Account.php");
                
                }


            }else{

                $_SESSION['status'] = "Wrong Password";
                $_SESSION['status_code'] = "error";
                header("location:userupdateprofile.php");
            }



        }else{
    $_SESSION['status'] = "Updated Data Error";
	$_SESSION['status_code'] = "error";
    header("location:userupdateprofile.php");

        }
        

}else{
	$_SESSION['status'] = "Error in the POST";
	$_SESSION['status_code'] = "error";
    header("location:userupdateprofile.php");

}


?>