<?php require_once "../data/control.php"; ?>
<?php
    $email = $_SESSION['email'];

    $user_info_query = "SELECT * FROM tbl_superadmin WHERE email ='$email'";
    $user_info = mysqli_query($connect, $user_info_query);

    if(mysqli_num_rows($user_info) > 0){
        $fetch_user_info = mysqli_fetch_assoc($user_info);
        
        $fetch_status = $fetch_user_info['status'];
        $fetch_code = $fetch_user_info['code'];
        $fetch_tempomail = $fetch_user_info['tempomail'];
        if($fetch_status != 'online'){
            $_SESSION['error'] = "an error occured while fetching your data";
            header('location: superadmin.php');
        }
        elseif($fetch_code != 0){
            $_SESSION['info'] = "weve sent and email verification code to this email, $fetch_tempomail";
            header('location: profile_emver.php');
            exit();
        }
    }
    else{
        $_SESSION['error'] = "an error occured while fetching your data";
        header('location: superadmin.php');
    }
?>
<!DOCTYPE html>
<html>

    <head>

        <title><?php echo ucwords($fetch_company_details['companyname1']); ?><?php echo strtolower($fetch_company_details['companyname2']); ?> | Dashboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
        <link rel="icon" type="png" href="../resources/<?=$fetch_company_details['companylogo']?>"/>
        <link rel="stylesheet" type="text/css" href="../style/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="../style/style.css"/>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript" src="../script/time.js"></script>
        
    </head>

    <body onload="display_ct();">

        <!-- main container -->
        <div class="container-fluid row">
            <div class="sidebar">
                <div class="logo_details" style="transition-timing-function:ease;">
                    <img style="opacity:0; width:30px; height:30px;" class="img-fluid" src="../resources/<?=$fetch_company_details['companylogo']?>"/>
                    <div class="logo_name" style="transition-timing-function:ease;">
                        <p style="transition-timing-function:ease; font-size:15pt; color:#4C4D5B; margin:5px; font-weight:bold; line-height:35px;"><?php echo ucwords($fetch_company_details['companyname1']); ?><span style="color:#5065AF;"><?php echo strtolower($fetch_company_details['companyname2']); ?></span></p>
                    </div>
                    <i class='bx bx-menu' id="btn" ></i>
                </div>
                <ul class="nav-list">
                    <li>
                        <a href="dashboard.php"><i class='bx bxs-dashboard' ></i><span class="links_name">Dashboard</span></a>
                        <span class="tooltip">Dashboard</span>
                    </li>
                    <li>
                        <a href="appointment.php"><i class='bx bx-calendar-check' ></i><span class="links_name">Appointments</span></a>
                        <span class="tooltip">Appointments</span>
                    </li>
                    <li>
                        <a href="team.php"><i class='bx bxs-group'></i><span class="links_name">Team</span></a>
                        <span class="tooltip">Team</span>
                    </li>
                    <li>
                        <a href="doctor.php"><i class='bx bxs-notepad' ></i><span class="links_name">Doctors Schedule</span></a>
                        <span class="tooltip">Doctors Schedule</span>
                    </li>
                    <li>
                        <a href="user.php"><i class='bx bxs-contact'></i><span class="links_name">Client's Data</span></a>
                        <span class="tooltip">Client's Data</span>
                    </li>
                    <li>
                        <a href="create.php"><i class='bx bxs-user-plus' style="color:#000;"></i><span class="links_name">Create New Account</span></a>
                        <span class="tooltip">Create New Account</span>
                    </li>
                    <li>
                        <a href="profile.php"><i class='bx bx-user'></i><span class="links_name">Profile</span></a>
                        <span class="tooltip">Profile</span>
                    </li><hr>
                    <li>
                        <a href="logout.php"><i class='bx bx-log-out'></i><span class="links_name">Log out</span></a>
                        <span class="tooltip">Log out</span>
                    </li>
                </ul>
            </div>
            <section class="home-section">
                <span style="font-size: 9pt;color:#5065AF; margin-left:5px; margin-bottom:0px;">SERVER TIME:</span><span id='ct' style="font-size: 9pt;color:#5065AF; margin-left:5px; margin-bottom:0px;"></span>
                <h2 style="font-size:15pt; color:#4C4D5B; margin-left:5px; font-weight:bold; line-height:35px;"><?php echo ucwords($fetch_company_details['companyname1']); ?><span style="color:#5065AF;"><?php echo strtolower($fetch_company_details['companyname2']); ?></span> <span style="font-size:12pt; font-weight:normal;"><?php echo ucwords($fetch_company_details['organization']); ?></span></h2><hr>

                <div style="padding:0px; width:70%; margin-top:5%; margin-bottom:5%; margin-left:auto; margin-right:auto; border-radius:10px; box-shadow:rgba(99, 99, 99, 0.2)0px 2px 8px 0px;" class="container-fluid row">

            <!-- Left Side -->
            <div style="padding:50px; background-color:#F1F3FF;" class="col-md-6">
                <div class="d-flex justify-content-center">
                    <img style="width:30px; height:30px; margin-right:5px;" class="img-fluid" src="../resources/<?= $fetch_company_details['companylogo']?>"/>
                    <p style="font-size:15pt; color:#4C4D5B; font-weight:bold; line-height:35px;"><?php echo ucwords($fetch_company_details['companyname1']); ?><label style="color:#5065AF;"><?php echo strtolower($fetch_company_details['companyname2']); ?></label></p>
                </div>
                <img style="margin-top:20px;" class="img-fluid" src="../resources/signinPoster.png"/>
            </div>

            <!-- Right Side -->
            <div style="padding: 50px;" class="col-md-6">
                <label>Register New</label>
                <h3 style="color:#5065AF">Company Account</h3>
                <div class="form-outline">
                    <form action="create.php" method="post">
                        <label style="margin-top:30px; font-size:9pt;" class="FormLabel form-label"><i class='bx bx-id-card'></i> Position</label>
                        <select class="form-control" style="font-size:8pt; padding:10px;" name="position">
                            <option disabled selected hidden>Choose...</option>
                            <option>Moderator</option>
                            <option>Doctor</option>
                        </select>

                        <label style="margin-top:20px; font-size:9pt;" class="FormLabel form-label"><i class='bx bx-book-content'></i> Firstname</label>
                        <input style="font-size:8pt; padding:10px;" name="firstname" type="text" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Firstname" required="Required">

                        <label style="margin-top:20px; font-size:9pt;" class="FormLabel form-label"><i class='bx bx-book-content'></i> Lastname</label>
                        <input style="font-size:8pt; padding:10px;" name="lastname" type="text" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Lastname" required="Required">

                        <label style="margin-top:20px; font-size:9pt;" class="FormLabel form-label"><i class='bx bx-cake'></i> Birthday</label>
                        <input style="font-size:8pt; padding:10px;" name="birthday" type="date" ondrop="return false;" onpaste="return false;" class="form-control" required="Required">

                        <label style="margin-top:20px; font-size:9pt;" class="FormLabel form-label"><i class='bx bxs-phone'></i> Contact Number</label>
                        <input style="font-size:8pt; padding-left:50px; padding-top:10px; padding-bottom:10px;" name="contact" type="tel" id="contact" ondrop="return false;" onpaste="return false;" class="form-control" maxlength="11" onkeypress="return isNumberKey(event)" size="100%" required="Required"><br>

                        <label style="margin-top:20px; font-size:9pt;" class="FormLabel form-label"><i class='bx bx-envelope'></i> Email Address</label>
                        <input style="font-size:8pt; padding:10px;" name="email" type="email" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Email" required="Required">
                        
                        <input style="margin-top:20px; font-size:9pt; padding:10px; width:100px;" name="register" type="submit" value="Register" class="btn btn-primary">
                    </form>
                </div>
                <p style="margin-top:10px; font-size:9pt;">INFO: Every Account Default Password was, Admin</p>
                <hr style="margin-top: 20%;">
                <p  style="margin-top: 2%; font-size: 9pt;">&copy; <?php echo $today_year; ?> <?php echo ucwords($fetch_company_details['companyname1']); ?><?php echo strtolower($fetch_company_details['companyname2']); ?> <?php echo ucwords($fetch_company_details['organization']); ?>, All rights reserved</p>
            </div>
        </div>

            </section>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
        <script src="../script/navigation.js"></script>
        <script src="../script/contact.js"></script>
        <script src="../script/voidletters.js"></script>
    </body>

    <?php
        if(isset($xmessage['message'])){
            $message = $xmessage['message'];
            foreach($xmessage as $showerror){
                echo "<script>swal('Something went wrong', '$message', 'error')</script>";
            }
            $xmessage = null;
        }

        if(isset($ymessage['message'])){
            $message = $ymessage['message'];
            foreach($ymessage as $showerror){
                echo "<script>swal('Registered Succesfully', '$message', 'success')</script>";
            }
            $ymessage = null;
        }
    ?>

</html>
