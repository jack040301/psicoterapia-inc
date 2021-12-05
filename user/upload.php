<?php



session_start();

include('db_psicoterapia.php');

if(isset($_POST['submit'])){



    $file  = $_FILES['file'];



    

    $filename = $_FILES['file']['name'];

    $fileTmpName = $_FILES['file']['tmp_name'];

    $fileSize = $_FILES['file']['size'];

    $fileError = $_FILES['file']['error'];

    $fileType = $_FILES['file']['type'];





    $fileExt = explode('.',$filename);

    $fileActualExt = strtolower(end($fileExt));



    $allowed = array('jpg','jpeg','png');



    if(in_array($fileActualExt,$allowed)){

            if($fileError===0){

                    if($fileSize < 1000000){



                            $fileNameNew = uniqid('',true).'.'.$fileActualExt;



                            $fileDestination = 'uploads/'.$fileNameNew;
                            $twoDestination  = '../main/user/uploads'.$fileNameNew;

                            move_uploaded_file($fileTmpName,$twoDestination);
                            move_uploaded_file($fileTmpName,$fileDestination);
                          
                          


                        //    header("userdashboard.php");

                      

                            $sql = "UPDATE tbl_useraccount set userID='{$_SESSION['userID']}', userImage='" . $fileNameNew . "' WHERE userID='{$_SESSION['userID']}'";



                            if($conn->query($sql) === TRUE){





                                $_SESSION['status'] = "Updated Image";

                                $_SESSION['status_code'] = "success";

                               
                                header("location:userupdateprofile.php");

                              

                            }



                            

                    }else{



                        

                        $_SESSION['status'] = "your file is too big";

                        $_SESSION['status_code'] = "error";

                        header("location:userupdateprofile.php");

                            

                    }



            }else{

             $_SESSION['status'] = "There was an error uploading the file,Try again";

                $_SESSION['status_code'] = "error";

                header("location:userupdateprofile.php");

            }





    }else{



        $_SESSION['status'] = "You cannot upload file of this type";

        $_SESSION['status_code'] = "error";

        header("location:userdashboard.php");

    }

}





if(isset($_POST['defaultprofile'])){





    $fileDestination = 'default.png';



    $sql = "UPDATE tbl_useraccount set userID='{$_SESSION['userID']}', userImage='" . $fileDestination . "' WHERE userID='{$_SESSION['userID']}'";



    if($conn->query($sql) === TRUE){




        $_SESSION['status'] = "Updated Image";

        $_SESSION['status_code'] = "success";
        echo dirname($fileDestination);
        header("location:userupdateprofile.php");

    
      

    }  else{



        $_SESSION['status'] = "Error in Default Profile";

        $_SESSION['status_code'] = "error";

        header("location:userdashboard.php");

    }



}





?>