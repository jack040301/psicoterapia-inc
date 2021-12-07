<?php require_once "../data/control.php"; ?>
<?php
    $email = $_SESSION['email'];

    $user_info_query = "SELECT * FROM tbl_employee WHERE email ='$email'";
    $user_info = mysqli_query($connect, $user_info_query);

    if(mysqli_num_rows($user_info) > 0){
        $fetch_user_info = mysqli_fetch_assoc($user_info);
        
        $fetch_status = $fetch_user_info['status'];
        if($fetch_status != 'online'){
            $_SESSION['error'] = "an error occured while fetching your data";
            header('location: moderator.php');
        }
    }
    else{
        $_SESSION['error'] = "an error occured while fetching your data";
        header('location: moderator.php');
    }
?>
<!DOCTYPE html>
<html>

    <head>

        <title><?php echo ucwords($fetch_company_details['companyname1']); ?><?php echo strtolower($fetch_company_details['companyname2']); ?> | Dashboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'/>
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
                        <a href="doctor.php"><i class='bx bxs-notepad' ></i><span class="links_name">Doctors</span></a>
                        <span class="tooltip">Doctors</span>
                    </li>
                    <li>
                        <a href="user.php"><i class='bx bxs-contact'></i><span class="links_name">Client's Data</span></a>
                        <span class="tooltip">Client's Data</span>
                    </li>
                    <li>
                        <a href="create.php"><i class='bx bxs-user-plus'></i><span class="links_name">Create New Account</span></a>
                        <span class="tooltip">Create New Account</span>
                    </li>
                    <li>
                        <a href="profile.php"><i class='bx bx-user' style="color:#000;"></i><span class="links_name">Profile</span></a>
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
                <div class="container-fluid row">
                    <div class="col-md-4">
                        <img class="img-fluid" src="../resources/<?=$fetch_user_info['picture']?>"/>
                    </div>
                    <div class="col-md-8">
                        <div style="font-size:10pt; width:90%; margin:auto; border-radius:10px; box-shadow:rgba(99, 99, 99, 0.2)0px 2px 8px 0px; padding:20px;"><h5 style="margin:0px; color:#5065AF;"><?php echo ucwords($fetch_user_info['lastname']);?>, <?php echo ucwords($fetch_user_info['firstname']);?></h5><label style="font-size:9pt;"><i class='bx bx-envelope' ></i> <?php echo $fetch_user_info['email'];?></label> <label style="font-size:9pt;"><i class='bx bxs-phone'></i> <?php echo $fetch_user_info['mobile'];?></label> <label style="font-size:9pt;"><i class='bx bx-cake' ></i> <?php echo $fetch_user_info['birthday'];?></label><hr>
                        <table style="width:80%; border-collapse:collapse; margin:auto; font-size:0.9em; border-radius:5px 5px 0 0; overflow: hidden;">
                            <thead style="background-color:#F1F3FF; text-align:left;">
                                <tr><th>Personal Information</th><th>Actions</th></tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <form action="profile.php" method="post" enctype="multipart/form-data">
                                    <td><input type="file" name="picture" class="form-control" style="font-size:9pt;" ondrop="return false;" onpaste="return false;" required="Required"></td>
                                    <td><input name="change_pics" type="submit" value="Upload Picture" style="background:none; border:none;color:#5065AF;"></td>
                                    </form>
                                </tr>
                                <tr>
                                    <form action="profile.php" method="post">
                                    <td><input type="text" name="lastname" style="font-size:9pt;" class="form-control" ondrop="return false;" onpaste="return false;" placeholder="Lastname" required="Required"></td>
                                    <td><input name="change_lastnames" type="submit" value="Change" style="background:none; border:none;color:#5065AF;"></td>
                                    </form>
                                </tr>
                                <tr>
                                    <form action="profile.php" method="post">
                                    <td><input type="text" name="firstname" style="font-size:9pt;" class="form-control" ondrop="return false;" onpaste="return false;" placeholder="Firstname" required="Required"></td>
                                    <td><input name="change_firstnames" type="submit" value="Change" style="background:none; border:none;color:#5065AF;"></td>
                                    </form>
                                </tr>
                                <tr>
                                    <form action="profile.php" method="post">
                                    <td><input type="date" name="birthday" style="font-size:9pt;" max="<?php echo $lastYear = date("Y-m-d", strtotime("-18 years")); ?>" class="form-control" ondrop="return false;" onpaste="return false;" required="Required"></td>
                                    <td><input name="change_birthdays" type="submit" value="Change" style="background:none; border:none;color:#5065AF;"></td>
                                    </form>
                                </tr>
                                <tr>
                                    <form action="profile.php" method="post">
                                    <td><input type="tel" name="contact" style="font-size:9pt;" placeholder="09xxxxxxxxx" ondrop="return false;" onpaste="return false;" class="form-control" maxlength="11" onkeypress="return isNumberKey(event)" size="100%" required="Required"></td>
                                    <td><input name="change_contacts" type="submit" value="Change" style="background:none; border:none;color:#5065AF;"></td>
                                    </form>
                                </tr>
                                <tr>
                                    <form action="profile.php" method="post">
                                    <td><input type="email" name="email" style="font-size:9pt;" class="form-control" ondrop="return false;" onpaste="return false;" placeholder="Email Address" required="Required"></td>
                                    <td><input name="change_emails" type="submit" value="Change" style="background:none; border:none;color:#5065AF;"></td>
                                    </form>
                                </tr>
                            </tbody>
                        </table>
                        <table style="width:80%; border-collapse:collapse; margin:auto; font-size:0.9em; border-radius:5px 5px 0 0; overflow: hidden;">
                            <thead style="background-color:#F1F3FF; text-align:left;">
                                <tr><th>Personal Information</th><th></th></tr>
                            </thead>
                            <tbody>
                                <form action="profile.php" method="post">
                                <tr>
                                    <td><label>Old Password: </label></td>
                                    <td><input type="password" name="oldpass" style="font-size:9pt; padding:5px;" class="form-control" placeholder="Old Password" required="Required"/></td>
                                </tr>
                                <tr>
                                    <td><label>New Password: </label></td>
                                    <td><input type="password" name="newpass" style="font-size:9pt; padding:5px;" class="indicator form-control" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" minlength="6" maxlength="20" placeholder="New Password" required="Required"/></td>
                                </tr>
                                <tr>
                                    <td><label>Confirm New Password: </label></td>
                                    <td><input type="password" name="conpass" style="font-size:9pt; padding:5px;" class="form-control" placeholder="Re-enter new Password" required="Required"/></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input name="change_ps" type="submit" value="Change Password" style="font-size:9pt; float:right;" class="btn btn-primary"/></td>
                                </tr>
                                </form>
                            </tbody>
                        </table>
                    </div>
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
                echo "<script>swal('Updated Successfully', '$message', 'success')</script>";
            }
            $ymessage = null;
        }

        if(isset($_SESSION['info'])){
            $message = $_SESSION['info'];
            echo "<script>swal('Updated Successfully', '$message', 'success')</script>";
        }
        $_SESSION['info'] = null;
    ?>

</html>
