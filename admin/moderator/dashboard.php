<?php require_once "../data/control.php"; ?>
<?php
    $email = $_SESSION['email'];

    $user_info_query = "SELECT * FROM tbl_employee WHERE email ='$email'";
    $user_info = mysqli_query($connect, $user_info_query);

    if(mysqli_num_rows($user_info) > 0){
        $fetch_user_info = mysqli_fetch_assoc($user_info);
        
        $fetch_status = $fetch_user_info['status'];
        $fetch_code = $fetch_user_info['code'];
        $fetch_tempomail = $fetch_user_info['tempomail'];
        if($fetch_status != 'online'){
            $_SESSION['error'] = "an error occured while fetching your data";
            header('location: moderator.php');
        }
        elseif($fetch_code != 0){
            $_SESSION['info'] = "weve sent and email verification code to this email, $fetch_tempomail";
            header('location: profile_emver.php');
            exit();
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
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="icon" type="png" href="../resources/<?=$fetch_company_details['companylogo']?>"/>
        <link rel="stylesheet" type="text/css" href="../style/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="../style/style.css"/>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
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
                        <a href="dashboard.php"><i class='bx bxs-dashboard' style="color:#000;"></i><span class="links_name" style="color:#5065AF;">Dashboard</span></a>
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
                        <a href="create.php"><i class='bx bxs-user-plus'></i><span class="links_name">Create New Account</span></a>
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

                <div class="container-fluid row"><div class="col-sm" style="margin:auto;">
                <div class="card" style="width:18rem; margin:5px;">
                    <div class="card-body" style="text-align:center;">
                        <h5 class="card-title" style="color:#009933;">Success appointment</h5>
                        <span class="card-text" style="font-size:20pt;"><?php echo number_format($success_rate); ?>%</span><br>
                        <span class="card-text" style="font-size:9pt;">Overall Total: <?php echo $total_success_appointment ?></span>
                    </div>
                </div></div>
                <div class="col-sm" style="margin:auto;">
                <div class="card" style="width:18rem; margin:5px;">
                    <div class="card-body" style="text-align:center;">
                        <h5 class="card-title" style="color:#ff0000;">Cancelled appointment</h5>
                        <span class="card-text" style="font-size:20pt;"><?php echo number_format($cancelled_rate); ?>%</span><br>
                        <span class="card-text" style="font-size:9pt;">Overall Total: <?php echo $total_cancelled_appointment ?></span>
                    </div>
                </div></div>
                <div class="col-sm" style="margin:auto;">
                <div class="card" style="width:18rem; margin:5px;">
                    <div class="card-body" style="text-align:center;">
                        <h5 class="card-title" style="color:#0033cc;">Expired appointment</h5>
                        <span class="card-text" style="font-size:20pt;"><?php echo number_format($expired_rate); ?>%</span><br>
                        <span class="card-text" style="font-size:9pt;">Overall Total: <?php echo $total_expired_appointment ?></span>
                    </div>
                </div></div></div>
                <div class="container-fluid row">
                    <div class="col-lg" style="max-width:350px; padding:30px; margin:20px; border-radius:10px; box-shadow:rgba(99, 99, 99, 0.2)0px 2px 8px 0px;">
                        <h6>YESTERDAY'S REPORTS</h6><hr>
                        <p style="font-size:10pt;"><i class='bx bx-calendar-check' style="font-size:14pt;"></i>  Total No. of Success: <?php echo $total_yesterday_success_appointment ?><br><i class='bx bx-calendar-x' style="font-size:14pt;"> </i> Total No. of Cancelled: <?php echo $total_yesterday_cancelled_appointment ?><br><i class='bx bxs-archive' style="font-size:14pt;"></i> Total No. of Expired: <?php echo $total_yesterday_expired_appointment ?><br><br><i class='bx bx-calendar-star' style="font-size:14pt;"></i> Overall Appointments: <?php echo $total_yesterday_appointment ?></p>
                    </div>
                    <div class="col-lg" style="padding:5px; margin:20px; border-radius:10px; box-shadow:rgba(99, 99, 99, 0.2)0px 2px 8px 0px;">
                        <canvas style="padding:20px;" class="chart" id="myChart"></canvas>
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
        <script>
        const labels = <?php echo json_encode($day_run) ?>;
        const data = {
            labels: labels,
            datasets: [{
                label: 'Daily Appointment',
                data: <?php echo json_encode($daily_value) ?>,
                borderColor: "#2E74B6",
                backgroundColor: "#46D5F3",
            }]
        };
        const config = {
            type: 'line',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };
        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
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

        if(isset($_SESSION['info'])){
            $message = $_SESSION['info'];
            echo "<script>swal('Changed Password', '$message', 'success')</script>";
        }
        $_SESSION['info'] = null;
    ?>

</html>
