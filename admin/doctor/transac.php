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
            header('location: doctor.php');
        }
        elseif($fetch_code != 0){
            $_SESSION['info'] = "weve sent and email verification code to this email, $fetch_tempomail";
            header('location: profile_emver.php');
            exit();
        }
    }
    else{
        $_SESSION['error'] = "an error occured while fetching your data";
        header('location: doctor.php');
    }
?>
<!DOCTYPE html>
<html>

    <head>

        <title><?php echo ucwords($fetch_company_details['companyname1']); ?><?php echo strtolower($fetch_company_details['companyname2']); ?> | Today's Appointments</title>
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
                        <a href="appointment.php"><i class='bx bx-calendar-check' style="color:#000;"></i><span class="links_name">Appointments</span></a>
                        <span class="tooltip">Appointments</span>
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
                <a href="appointment.php" style="text-decoration:none; font-size:10pt; padding:10px; background-color: rgba(203, 209, 231, .7); border-top: 2px solid #5065AF; text-shadow: 1px 1px 1px #fff;">Today's Appointments</a>
                <div class="row">
                <div class="col-md-4" style="margin-top:10px;">
                    <?php
                       
                       if(isset($_GET['client_id'])){
                        $_SESSION['cid'] = $_GET['client_id'];
                    }

                    if(isset($_SESSION['cid'])){
                            $client_id = $_SESSION['cid'];
                            $client_info_query = "SELECT * From tbl_appointments where email = '$client_id'";
                            $client_info = mysqli_query($connect, $client_info_query);
                            $fetch_client_info = mysqli_fetch_assoc($client_info);
                        }
                    ?>
                    <img class="img-fluid" src="../../user/uploads/<?=$fetch_client_info['picture']?>"/>
                </div>
                <div class="col-md-8">
                <div class="col-md-9" style="padding-top:0px;"><div style="font-size:10pt; width:500px; margin:auto; border-radius:10px; box-shadow:rgba(99, 99, 99, 0.2)0px 2px 8px 0px; padding:20px;"><h6 style="color:#5065AF;">Customers Information</h6><p>Fullname: <?php echo ucwords($fetch_client_info['lastname'])?>, <?php echo ucwords($fetch_client_info['firstname'])?><br>Birthday: <?php echo ucwords($fetch_client_info['birthday'])?><br>Mobile Number: <?php echo ucwords($fetch_client_info['mobile'])?><br>Email Address: <?php echo ucwords($fetch_client_info['email'])?><br></p><a style="text-decoration:none; margin-right:20px; color:red;" href="transac.php?user_id=<?=$fetch_client_info['id']?>">Cancel Appointment</a><a style="text-decoration:none;" href="transac.php?users_id=<?=$fetch_client_info['id']?>">Done</a></div>
                <h5 style="color:#5065AF; margin-top:20px;"><i class='bx bx-book-alt'></i> Patient's Record History</h5>
                <table style="width:100%; border-collapse:collapse; margin:25px 0; font-size:0.9em; border-radius:5px 5px 0 0; overflow: hidden;">
                    <thead style="background-color:#F1F3FF; text-align:left;">
                        <tr><th>Ref. #</th><th>Date</th><th>Time</th><th>Status</th></tr>
                    </thead>
                    <tbody>
                        <?php
                            if (isset($_GET['page_no']) && $_GET['page_no']!=""){
                                $page_no = $_GET['page_no'];
                            }
                            else{
                                $page_no = 1;
                            }

                            
                            $total_records_per_page = 5;
                            $offset = ($page_no-1) * $total_records_per_page;
	                        $previous_page = $page_no - 1;
	                        $next_page = $page_no + 1;
	                        $adjacents = "2";

	                        $result_count = mysqli_query($connect,"SELECT COUNT(*) As total_records FROM tbl_appointments where date < date(now()) AND doctor = '$email' AND email = '$client_id'");
	                        $total_records = mysqli_fetch_array($result_count);
	                        $total_records = $total_records['total_records'];

                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
	                        $second_last = $total_no_of_pages - 1;

                            $get_data_query = "SELECT *, DATEDIFF(date(now()), birthday)/365.25 as age FROM tbl_appointments WHERE date < date(now()) AND doctor = '$email' AND email = '$client_id' ORDER BY time ASC LIMIT $offset, $total_records_per_page";
                            $get_data = mysqli_query($connect, $get_data_query);
                            for($i=0; $row = mysqli_fetch_array($get_data); $i++){
                                $doctor = $row['doctor'];
                                $see_doctor_query = "SELECT * FROM tbl_employee WHERE email = '$doctor'";
                                $see_doctor = mysqli_query($connect, $see_doctor_query);
                                $fetch_see_doctor = mysqli_fetch_assoc($see_doctor);
                        ?>
                            <tr style="border-bottom:2px solid whitesmoke;"><td><?php echo $row['id']; ?></td><td><?php echo $row['date']; ?></td><td><?php echo ucwords($row['time']); ?></td><td><?php echo ucwords($row['status']); ?></td></tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div style='font-size:10pt; padding:10px 20px 0px; border-top:dotted 1px #CCC;'>
                <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
            </div><nav style="margin-top:10px;">
            <ul class="pagination" style="font-size:9pt;">
	            <li class="page-item" <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
	                <a class="page-link"<?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
	            </li>

                <?php
	                if ($total_no_of_pages <= 10){
		                for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			                if ($counter == $page_no) {
		                        echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";
				            }
                            else{
                                echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
				            }
                        }
	                }
	                elseif($total_no_of_pages > 10){
	                    if($page_no <= 4) {
	                        for ($counter = 1; $counter < 8; $counter++){
			                    if ($counter == $page_no) {
		                            echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";
				                }
                                else{
                                    echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
				                }
                            }
		                    echo "<li class='page-item'><a class='page-link'>...</a></li>";
		                    echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
		                    echo "<li class='page-item'><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
		                }
	                    elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {
		                    echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
		                    echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
                            echo "<li class='page-item'><a class='page-link'>...</a></li>";
                            for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
                                if ($counter == $page_no) {
		                            echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";
				                }
                                else{
                                    echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
				                }
                            }
                            echo "<li class='page-item'><a class='page-link'>...</a></li>";
	                        echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
	                        echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                        }
		                else{
                            echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
		                    echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
                            echo "<li class='page-item'><a class='page-link'>...</a></li>";
                            for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                                if ($counter == $page_no) {
		                            echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";
				                }
                                else{
                                    echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
				                }
                            }
                        }
	                }
                ?>
	            <li class='page-item' <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
	                <a class='page-link' <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
	            </li>
                <?php
                    if($page_no < $total_no_of_pages){
		                echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
		            }
                ?>
                <?php
                    if(isset($_GET['user_id'])){
                        echo "<script>swal({
                            title: 'Are you sure?',
                            text: 'Cancelation of appointment cannot be undo',
                            icon: 'warning',
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location = 'delete.php';
                            }
                            else{
                                swal('Cancelation Abort');
                            }
                    });</script>";
                    }
                    $_GET['user_id']=null;
                ?>
                <?php
                    if(isset($_GET['users_id'])){
                        echo "<script>swal({
                            title: 'Are you sure?',
                            text: 'This action cannot be undo',
                            icon: 'warning',
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location = 'done.php';
                            }
                            else{
                                swal('Done Abort');
                            }
                    });</script>";
                    }
                    $_GET['users_id']=null;
                ?>
            </ul></nav></div></div>
            </section>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
        <script src="../script/navigation.js"></script>
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
            echo "<script>swal('Successfully', '$message', 'success')</script>";
        }
        $_SESSION['info'] = null;
    ?>

</html>
