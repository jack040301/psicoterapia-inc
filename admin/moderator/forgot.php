<?php require_once "../data/control.php"; ?>
<!DOCTYPE html>
<html>

    <head>

        <title><?php echo ucwords($fetch_company_details['companyname1']); ?><?php echo strtolower($fetch_company_details['companyname2']); ?> | Forgot Password</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="icon" type="png" href="../resources/<?=$fetch_company_details['companylogo']?>"/>
        <link rel="stylesheet" type="text/css" href="../style/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="../style/style.css"/>
        
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript" src="../script/time.js"></script>
        
    </head>

    <body onload="display_ct();">

        <!-- main container -->
        <div style="padding:0px; width:70%; margin-top:5%; margin-bottom:5%; margin-left:auto; margin-right:auto; border-radius:10px; box-shadow:rgba(99, 99, 99, 0.2)0px 2px 8px 0px;" class="container-fluid row">

            <!-- Left Side -->
            <div style="padding:50px; background-color:#F1F3FF;" class="col-md-6">
                <div class="d-flex justify-content-center">
                    <img style="width:30px; height:30px; margin-right:5px;" class="img-fluid" src="../resources/<?= $fetch_company_details['companylogo']?>"/>
                    <p style="font-size:15pt; color:#4C4D5B; font-weight:bold; line-height:35px;"><?php echo ucwords($fetch_company_details['companyname1']); ?><label style="color:#5065AF;"><?php echo strtolower($fetch_company_details['companyname2']); ?></label></p>
                </div>
                <img style="margin-top:20px;" class="img-fluid" src="../resources/SigninPoster.png"/>
            </div>

            <!-- Right Side -->
            <div style="padding: 50px;" class="col-md-6">
                <label>Moderator</label>
                <h3 style="color:#5065AF">Forgot Password</h3>
                <div class="form-outline">
                    <form action="forgot.php" method="post">
                        <p style="margin-top:50px; margin-bottom:0px; font-size:10pt; color:#5065AF;">Let's find your account</p>

                        <label style="font-size:9pt;" class="FormLabel form-label"><i class='bx bx-envelope'></i> Email Address</label>
                        <input style="font-size:9pt; padding:10px;" name="email" type="email" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Email" required="Required">
                        
                        <input style="margin-top:20px; font-size:8pt; padding:10px; width:100px;" name="moderator_forgot" type="submit" value="Send OTP" class="btn btn-primary">
                    </form>
                </div>
                <p style="margin-top:10px; font-size:9pt;"><< Go Back to <a href="superadmin.php" style="color:#5065AF; text-decoration:none;">Login</a></p>
                <hr style="margin-top: 20%;">
                <p  style="margin-top: 2%; font-size: 9pt;">&copy; <?php echo $today_year; ?> <?php echo ucwords($fetch_company_details['companyname1']); ?><?php echo strtolower($fetch_company_details['companyname2']); ?> <?php echo ucwords($fetch_company_details['organization']); ?>, All rights reserved</p>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
    </body>

    <?php
        if(isset($xmessage['message'])){
            $message = $xmessage['message'];
            foreach($xmessage as $showerror){
                echo "<script>swal('Something went wrong', '$message', 'error')</script>";
            }
            $xmessage = null;
        }
    ?>

</html>
