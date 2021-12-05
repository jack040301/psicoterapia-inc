<?php
    session_start();
    require "connection.php";

    // global variables
    $xmessage = array();
    $ymessage = array();
    $today_year = date("Y");
    $today_date = date("Y-m-d");
    $day_run = array();
    $daily_value = array();
    $day_runs = array();
    $daily_values = array();

    

    // daily appointments
    $daily_appointment_query = "SELECT date, count(*) as daily_appointment from tbl_appointments WHERE date <= date(now()) GROUP BY date ORDER BY date ASC";
    $daily_appointment = mysqli_query($connect, $daily_appointment_query);
    for($i=0; $row = mysqli_fetch_array($daily_appointment); $i++){
        $daily_value[] = $row['daily_appointment'];
        $day_run[] = $row['date'];
    }

    // getting the company details 
    $company_details_query = "SELECT * FROM tbl_company WHERE id = 1";
    $company_details = mysqli_query($connect, $company_details_query);
    $fetch_company_details = mysqli_fetch_assoc($company_details);
    
    // set yesterday pending status to expired
    $expired_status_query = "UPDATE tbl_appointments SET status = 'expired' WHERE date < date(now()) AND status = 'pending'";
    $expired_status = mysqli_query($connect, $expired_status_query);

    // total yesterday appointment
    $total_yesterday_appointment = 0;
    $yesterday_appointment_query = "SELECT COUNT(status) as total_appointment FROM tbl_appointments WHERE date = date(now())-1";
    $yesterday_appointment = mysqli_query($connect, $yesterday_appointment_query);
    $fetch_yesterday_appointment = mysqli_fetch_assoc($yesterday_appointment);
    $total_yesterday_appointment = $fetch_yesterday_appointment['total_appointment'];

    // total yesterday success appointment
    $total_yesterday_success_appointment = 0;
    $yesterday_success_appointment_query = "SELECT COUNT(status) as total_success FROM tbl_appointments WHERE status = 'done' AND date = date(now())-1";
    $yesterday_success_appointment = mysqli_query($connect, $yesterday_success_appointment_query);
    $fetch_yesterday_success_appointment = mysqli_fetch_assoc($yesterday_success_appointment);
    $total_yesterday_success_appointment = $fetch_yesterday_success_appointment['total_success'];

    // total yesterday cancelled appointment
    $total_yesterday_cancelled_appointment = 0;
    $yesterday_cancelled_appointment_query = "SELECT COUNT(status) as total_cancelled FROM tbl_appointments WHERE status = 'cancelled' AND date = date(now())-1";
    $yesterday_cancelled_appointment = mysqli_query($connect, $yesterday_cancelled_appointment_query);
    $fetch_yesterday_cancelled_appointment = mysqli_fetch_assoc($yesterday_cancelled_appointment);
    $total_yesterday_cancelled_appointment = $fetch_yesterday_cancelled_appointment['total_cancelled'];

    // total yesterday expired appointment
    $total_yesterday_expired_appointment = 0;
    $yesterday_expired_appointment_query = "SELECT COUNT(status) as total_expired FROM tbl_appointments WHERE status = 'expired' AND date = date(now())-1";
    $yesterday_expired_appointment = mysqli_query($connect, $yesterday_expired_appointment_query);
    $fetch_yesterday_expired_appointment = mysqli_fetch_assoc($yesterday_expired_appointment);
    $total_yesterday_expired_appointment = $fetch_yesterday_expired_appointment['total_expired'];

    // total appointment
    $total_appointment = 0;
    $appointment_query = "SELECT COUNT(status) as total_appointment FROM tbl_appointments WHERE status != 'pending'";
    $appointment = mysqli_query($connect, $appointment_query);
    $fetch_appointment = mysqli_fetch_assoc($appointment);
    $total_appointment = $fetch_appointment['total_appointment'];

    // total success appointment
    $total_success_appointment = 0;
    $success_appointment_query = "SELECT COUNT(status) as total_success FROM tbl_appointments WHERE status = 'done'";
    $success_appointment = mysqli_query($connect, $success_appointment_query);
    $fetch_success_appointment = mysqli_fetch_assoc($success_appointment);
    $total_success_appointment = $fetch_success_appointment['total_success'];

    // total cancelled appointment
    $total_cancelled_appointment = 0;
    $cancelled_appointment_query = "SELECT COUNT(status) as total_cancelled FROM tbl_appointments WHERE status = 'cancelled'";
    $cancelled_appointment = mysqli_query($connect, $cancelled_appointment_query);
    $fetch_cancelled_appointment = mysqli_fetch_assoc($cancelled_appointment);
    $total_cancelled_appointment = $fetch_cancelled_appointment['total_cancelled'];

    // total expired appointment
    $total_expired_appointment = 0;
    $expired_appointment_query = "SELECT COUNT(status) as total_expired FROM tbl_appointments WHERE status = 'expired'";
    $expired_appointment = mysqli_query($connect, $expired_appointment_query);
    $fetch_expired_appointment = mysqli_fetch_assoc($expired_appointment);
    $total_expired_appointment = $fetch_expired_appointment['total_expired'];
    
    // ratings
    $success_rate = ($total_success_appointment)/($total_cancelled_appointment+$total_success_appointment)*100;
    $cancelled_rate = ($total_cancelled_appointment)/($total_success_appointment+$total_cancelled_appointment)*100;
    $expired_rate = ($total_expired_appointment)/($total_appointment)*100;

    if(isset($_SESSION['doctor'])){

    $doc_email = $_SESSION['doctor'];

    // daily appointments of doctors
    $daily_appointment_querys = "SELECT date, count(*) as daily_appointment from tbl_appointments WHERE date <= date(now()) AND doctor = '$doc_email' GROUP BY date ORDER BY date ASC";
    $daily_appointments = mysqli_query($connect, $daily_appointment_querys);
    for($i=0; $row = mysqli_fetch_array($daily_appointments); $i++){
        $daily_values[] = $row['daily_appointment'];
        $day_runs[] = $row['date'];
    }

    // total yesterday appointment for doctors
    $total_yesterday_appointments = 0;
    $yesterday_appointment_querys = "SELECT COUNT(status) as total_appointment FROM tbl_appointments WHERE date = date(now())-1 AND doctor = '$doc_email'";
    $yesterday_appointments = mysqli_query($connect, $yesterday_appointment_querys);
    $fetch_yesterday_appointments = mysqli_fetch_assoc($yesterday_appointments);
    $total_yesterday_appointments = $fetch_yesterday_appointments['total_appointment'];

    // total yesterday success appointment for doctors
    $total_yesterday_success_appointments = 0;
    $yesterday_success_appointment_querys = "SELECT COUNT(status) as total_success FROM tbl_appointments WHERE status = 'done' AND date = date(now())-1 AND doctor = '$doc_email'";
    $yesterday_success_appointments = mysqli_query($connect, $yesterday_success_appointment_querys);
    $fetch_yesterday_success_appointments = mysqli_fetch_assoc($yesterday_success_appointments);
    $total_yesterday_success_appointments = $fetch_yesterday_success_appointments['total_success'];

    // total yesterday cancelled appointment for doctors
    $total_yesterday_cancelled_appointments = 0;
    $yesterday_cancelled_appointment_querys = "SELECT COUNT(status) as total_cancelled FROM tbl_appointments WHERE status = 'cancelled' AND date = date(now())-1 AND doctor = '$doc_email'";
    $yesterday_cancelled_appointments = mysqli_query($connect, $yesterday_cancelled_appointment_querys);
    $fetch_yesterday_cancelled_appointments = mysqli_fetch_assoc($yesterday_cancelled_appointments);
    $total_yesterday_cancelled_appointments = $fetch_yesterday_cancelled_appointments['total_cancelled'];

    // total yesterday expired appointment
    $total_yesterday_expired_appointments = 0;
    $yesterday_expired_appointment_querys = "SELECT COUNT(status) as total_expired FROM tbl_appointments WHERE status = 'expired' AND date = date(now())-1 AND doctor = '$doc_email'";
    $yesterday_expired_appointments = mysqli_query($connect, $yesterday_expired_appointment_querys);
    $fetch_yesterday_expired_appointments = mysqli_fetch_assoc($yesterday_expired_appointments);
    $total_yesterday_expired_appointments = $fetch_yesterday_expired_appointments['total_expired'];

    // total success appointment
    $total_success_appointments = 0;
    $success_appointment_querys = "SELECT COUNT(status) as total_success FROM tbl_appointments WHERE status = 'done' AND doctor = '$doc_email'";
    $success_appointments = mysqli_query($connect, $success_appointment_querys);
    $fetch_success_appointments = mysqli_fetch_assoc($success_appointments);
    $total_success_appointments = $fetch_success_appointments['total_success'];

    // total cancelled appointment
    $total_cancelled_appointments = 0;
    $cancelled_appointment_querys = "SELECT COUNT(status) as total_cancelled FROM tbl_appointments WHERE status = 'cancelled' AND doctor = '$doc_email'";
    $cancelled_appointments = mysqli_query($connect, $cancelled_appointment_querys);
    $fetch_cancelled_appointments = mysqli_fetch_assoc($cancelled_appointments);
    $total_cancelled_appointments = $fetch_cancelled_appointments['total_cancelled'];


    // total expired appointment
    $total_expired_appointments = 0;
    $expired_appointment_querys = "SELECT COUNT(status) as total_expired FROM tbl_appointments WHERE status = 'expired' AND doctor = '$doc_email'";
    $expired_appointments = mysqli_query($connect, $expired_appointment_querys);
    $fetch_expired_appointments = mysqli_fetch_assoc($expired_appointments);
    $total_expired_appointments = $fetch_expired_appointments['total_expired'];

    // total appointment
    $total_appointments = 0;
    $appointment_querys = "SELECT COUNT(status) as total_appointment FROM tbl_appointments WHERE doctor = '$doc_email' AND status != 'pending'";
    $appointments = mysqli_query($connect, $appointment_querys);
    $fetch_appointments = mysqli_fetch_assoc($appointments);
    $total_appointments = $fetch_appointments['total_appointment'];

    // ratings
        $success_rates = 0;
        $cancelled_rates = 0;
        $expired_rates = 0;
        if($total_success_appointments != 0 || $total_yesterday_cancelled_appointments != 0 || $total_yesterday_expired_appointments != 0){
            $success_rates = ($total_success_appointments)/($total_cancelled_appointments+$total_success_appointments)*100;
            $cancelled_rates = ($total_cancelled_appointments)/($total_success_appointments+$total_cancelled_appointments)*100;
            $expired_rates = ($total_expired_appointments)/($total_appointments)*100;
        }

    }   

    // superadmin login
    if(isset($_POST['admin_login'])){
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $password = mysqli_real_escape_string($connect, $_POST['password']);
        
        $user_info_query = "SELECT * FROM tbl_superadmin WHERE email = '$email'";
        $user_info = mysqli_query($connect, $user_info_query);
        
        if(mysqli_num_rows($user_info) > 0){
            $fetch_user_info = mysqli_fetch_assoc($user_info);

            $fetch_email = $fetch_user_info['email'];
            $fetch_password = $fetch_user_info['password'];
            $fetch_status = $fetch_user_info['status'];
            $fetch_code = $fetch_user_info['code'];
            $fetch_firstname = ucwords($fetch_user_info['firstname']);
            $code = rand(999999, 111111);

            if(password_verify($password, $fetch_password)){
                if($fetch_status == 'online'){
                    if($fetch_code == 0){
                        $_SESSION['email'] = $email;
                        header('location: dashboard.php');
                        exit();
                    }
                    else{
                        $insert_code_query = "UPDATE tbl_superadmin SET code = $code WHERE email = '$email'";
                        $insert_code = mysqli_query($connect, $insert_code_query);
                        if($insert_code){
                            $subject = "Email Verification Code";
                            $message = "Hi! $fetch_firstname this is your Email Verification code, $code";
                            $sender = "From: psicoterapiainc@gmail.com";
                            if(mail($email, $subject, $message, $sender)){
                                $_SESSION['otp'] = "we have sent and email verification code to this email, $email";
                                $_SESSION['email']= $email;
                                header('location: profile_emver.php');
                                exit();
                            }
                        }
                    }
                }
                else{
                    $xmessage['message'] = "This account was deactivated";
                }
            }
            else{
                $xmessage['message'] = "Invalid username or password";
            }
        }
        else{
            $xmessage['message'] = "Unrecognized Account";
        }
    }

    // superadmin forgot password
    if(isset($_POST['admin_forgot'])){
        $email = mysqli_real_escape_string($connect, $_POST['email']);

        $user_info_query = "SELECT * FROM tbl_superadmin WHERE email = '$email'";
        $user_info = mysqli_query($connect, $user_info_query);

        if(mysqli_num_rows($user_info) > 0){
            $fetch_user_info = mysqli_fetch_assoc($user_info);
            $fetch_firstname = ucwords($fetch_user_info['firstname']);
            $code = rand(999999, 111111);

            $insert_code_query = "UPDATE tbl_superadmin SET code = $code WHERE email = '$email'";
            $insert_code = mysqli_query($connect, $insert_code_query);

            if($insert_code){
                $subject = "Email Verification Code";
                $message = "Hi! $fetch_firstname this is your Email Verification code, $code";
                $sender = "From: psicoterapiainc@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $_SESSION['otp'] = "we have sent and email verification code to this email, $email";
                    $_SESSION['email']= $email;
                    header('location: verify.php');
                    exit();
                }
            }
        }
        else{
            $xmessage['message'] = "Unrecognized Email";
        }
    }

    // superadmin resent otp code
    if(isset($_GET['resend_otp'])){
        $email = $_GET['resend_otp'];

        $user_info_query = "SELECT * FROM tbl_superadmin WHERE email = '$email'";
        $user_info = mysqli_query($connect, $user_info_query);

        if(mysqli_num_rows($user_info) > 0){
            $fetch_user_info = mysqli_fetch_assoc($user_info);
            $fetch_firstname = ucwords($fetch_user_info['firstname']);
            $code = rand(999999, 111111);

            $insert_code_query = "UPDATE tbl_superadmin SET code = $code WHERE email = '$email'";
            $insert_code = mysqli_query($connect, $insert_code_query);

            if($insert_code){
                $subject = "Email Verification Code";
                $message = "Hi! $fetch_firstname this is your Email Verification code, $code";
                $sender = "From: psicoterapiainc@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $_SESSION['info'] = "weve sent and email verification code to this email, $email";
                }
            }
        }
        else{
            $xmessage['message'] = "Resend code failed";
        }
    }

    // superadmin verify otp code
    if(isset($_POST['admin_verify'])){
        $code = mysqli_real_escape_string($connect, $_POST['code']);
        $email = $_SESSION['email'];

        $user_info_query = "SELECT * FROM tbl_superadmin WHERE code = $code AND email ='$email'";
        $user_info = mysqli_query($connect, $user_info_query);

        if(mysqli_num_rows($user_info) > 0){
            $insert_code_query = "UPDATE tbl_superadmin SET code = 0 WHERE email = '$email'";
            $insert_code = mysqli_query($connect, $insert_code_query);

            if($insert_code){
                header('location: change.php');
                exit();
            }
        }
        else{
            $xmessage['message'] = "Invalid code";
        }
    }

    // superadmin reset password
    if(isset($_POST['admin_change'])){
        $npassword = mysqli_real_escape_string($connect, $_POST['npassword']);
        $cpassword = mysqli_real_escape_string($connect, $_POST['cpassword']);
        $email = $_SESSION['email'];

        if($npassword !== $cpassword){
            $xmessage['message'] = "Password did not matched";
        }
        else{
            $encrypt_password = password_hash($npassword, PASSWORD_BCRYPT);
            $new_password_query = "UPDATE tbl_superadmin SET password = '$encrypt_password' WHERE email = '$email'";
            $new_password = mysqli_query($connect, $new_password_query);

            if($new_password){
                $_SESSION['info'] = "Please login again using your new password";
                header('location: superadmin.php'); 
                exit();
            }
        }
    }

    // get team info
    if(isset($_GET['team_id'])){
        $id = $_GET['team_id'];

        $employee_info_query = "SELECT * FROM tbl_employee WHERE id = $id";
        $employee_info = mysqli_query($connect, $employee_info_query);
        if(mysqli_num_rows($employee_info) > 0){
            $fetch_employee_info = mysqli_fetch_assoc($employee_info);
            $fetch_status = $fetch_employee_info['status'];
            $fetch_firstname = ucwords($fetch_employee_info['firstname']);
            $fetch_lastname = ucwords($fetch_employee_info['lastname']);
            if($fetch_status == 'online'){
                $update_status_query = "UPDATE tbl_employee SET status = 'offline' WHERE id = $id";
                $update_status = mysqli_query($connect, $update_status_query);
                if($update_status){
                    $_SESSION['info'] = "$fetch_firstname $fetch_lastname to OFFLINE";
                    header('location: ../superadmin/team.php');
                    exit();
                }
            }
            else{
                $update_status_query = "UPDATE tbl_employee SET status = 'online' WHERE id = $id";
                $update_status = mysqli_query($connect, $update_status_query);
                if($update_status){
                    $_SESSION['info'] = "$fetch_firstname $fetch_lastname to ONLINE";
                    header('location: ../superadmin/team.php');
                    exit();
                }
            }
        }
    }
    
    // get doctor info
    if(isset($_GET['doctor_id'])){
        $id = $_GET['doctor_id'];

        $employee_info_query = "SELECT * FROM tbl_employee WHERE id = $id";
        $employee_info = mysqli_query($connect, $employee_info_query);
        if(mysqli_num_rows($employee_info) > 0){
            $fetch_employee_info = mysqli_fetch_assoc($employee_info);
            $fetch_status = $fetch_employee_info['status'];
            $fetch_firstname = ucwords($fetch_employee_info['firstname']);
            $fetch_lastname = ucwords($fetch_employee_info['lastname']);
            if($fetch_status == 'online'){
                $update_status_query = "UPDATE tbl_employee SET status = 'offline' WHERE id = $id";
                $update_status = mysqli_query($connect, $update_status_query);
                if($update_status){
                    $_SESSION['info'] = "$fetch_firstname $fetch_lastname to OFFLINE";
                    header('location: ../superadmin/physician.php');
                    exit();
                }
            }
            else{
                $update_status_query = "UPDATE tbl_employee SET status = 'online' WHERE id = $id";
                $update_status = mysqli_query($connect, $update_status_query);
                if($update_status){
                    $_SESSION['info'] = "$fetch_firstname $fetch_lastname to ONLINE";
                    header('location: ../superadmin/physician.php');
                    exit();
                }
            }
        }
    }

    // superadmin employeedetails
    if(isset($_GET['staff_id'])){
        $id = $_GET['staff_id'];

        $employee_info_query = "SELECT * FROM tbl_employee WHERE id = $id";
        $employee_info = mysqli_query($connect, $employee_info_query);
        if(mysqli_num_rows($employee_info) > 0){
            $fetch_employee_info = mysqli_fetch_assoc($employee_info);
            $fetch_status = $fetch_employee_info['status'];
            $fetch_firstname = ucwords($fetch_employee_info['firstname']);
            $fetch_lastname = ucwords($fetch_employee_info['lastname']);
            if($fetch_status == 'online'){
                $update_status_query = "UPDATE tbl_employee SET status = 'offline' WHERE id = $id";
                $update_status = mysqli_query($connect, $update_status_query);
                if($update_status){
                    $_SESSION['info'] = "$fetch_firstname $fetch_lastname to OFFLINE";
                    $_SESSION['id'] = $id;
                    header('location: ../superadmin/employee.php');
                    exit();
                }
            }
            else{
                $update_status_query = "UPDATE tbl_employee SET status = 'online' WHERE id = $id";
                $update_status = mysqli_query($connect, $update_status_query);
                if($update_status){
                    $_SESSION['info'] = "$fetch_firstname $fetch_lastname to ONLINE";
                    $_SESSION['id'] = $id;
                    header('location: ../superadmin/employee.php');
                    exit();
                }
            }
        }
    }

    // superadmin change doctors schedule
    if(isset($_POST['doctors_schedule'])){
        $id = mysqli_real_escape_string($connect, $_POST['doctors_id']);
        $timeslot = mysqli_real_escape_string($connect, $_POST['timeslot']);
        $start = mysqli_real_escape_string($connect, $_POST['start_date']);
        $end = mysqli_real_escape_string($connect, $_POST['end_date']);

        $doctors_info_query = "UPDATE tbl_employee SET start_date = '$start', end_date ='$end', time = '$timeslot' WHERE id = $id";
        $doctors_info = mysqli_query($connect, $doctors_info_query);
        if($doctors_info){
            $xmessage['message'] = "New Schedule From: $start to $end";
        }
    }

    // superadmin register new account
    if(isset($_POST['register'])){
        $position1 = mysqli_real_escape_string($connect, $_POST['position']);
        $firstname1 = mysqli_real_escape_string($connect, $_POST['firstname']);
        $lastname1 = mysqli_real_escape_string($connect, $_POST['lastname']);
        $birthday = mysqli_real_escape_string($connect, $_POST['birthday']);
        $contact = mysqli_real_escape_string($connect, $_POST['contact']);
        $email1 = mysqli_real_escape_string($connect, $_POST['email']);

        $position = strtolower($position1);
        $firstname = strtolower($firstname1);
        $lastname = strtolower($lastname1);
        $email = strtolower($email1);
        $picture = "profile.png";
        $password = "Admin";
        $code = 0;
        $status = "online";

        $check_email_query = "SELECT * FROM tbl_employee WHERE email = '$email'";
        $check_email = mysqli_query($connect, $check_email_query);

        if(mysqli_num_rows($check_email) > 0){
            $xmessage['message'] = "Email Address already taken";
        }
        else{
            $encrypted_password = password_hash($password, PASSWORD_BCRYPT);

            $insert_data_query = "INSERT INTO tbl_employee (picture, lastname, firstname, birthday, position, mobile, email, password, code, status, created) values('$picture','$lastname','$firstname','$birthday','$position','$contact','$email','$encrypted_password','$code','$status','$today_date')";
            $insert_data = mysqli_query($connect, $insert_data_query);
            if($insert_data){
                $plname = ucwords($lastname);
                $pfname = ucwords($firstname);
                $ymessage['message'] = "$plname, $pfname";
            }
        }
    }

    // superadmin change profile pic
    if(isset($_POST["change_pic"])){

        // getting files properties
        $img_name = $_FILES['picture']['name'];
        $img_size = $_FILES['picture']['size'];
        $tmp_name = $_FILES['picture']['tmp_name'];
        $error = $_FILES['picture']['error'];
        
        // check for errors
        if ($error === 0) {
            if ($img_size > 999000) {
                $errors['info'] = "File too Large";
            }else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
    
                // files to be accepted
                $allowed_exs = array("jpg", "jpeg", "png"); 
    
                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_upload_path = '../resources/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
    
                    // Insert into Database
                    $email = $_SESSION['email'];
                    $sql = "UPDATE tbl_superadmin SET picture = '$new_img_name' where email = '$email'";
                    $insertpic = mysqli_query($connect, $sql);
                    if($insertpic){
                        $ymessage['message'] = "Yahoo! New Profile Pic";
                    }
                }
                else {
                    $xmessage['message'] = "You can't upload files of this type";
                }
            }
        }
        else {
            $xmessage['message'] = "unknown error occurred!";
        }
    } // end

    // superadmin change lastname
    if(isset($_POST['change_lastname'])){
        $email = $_SESSION['email'];
        $rawdata = mysqli_real_escape_string($connect, $_POST['lastname']);
        $lower_rawdata = strtolower($rawdata);

        $query = "UPDATE tbl_superadmin SET lastname = '$lower_rawdata' WHERE email = '$email'";
        $run_query = mysqli_query($connect, $query);
        if($run_query){
            $ymessage['message'] = "New Lastname: $lower_rawdata";
        }
    }

    // superadmin change firstname
    if(isset($_POST['change_firstname'])){
        $email = $_SESSION['email'];
        $rawdata = mysqli_real_escape_string($connect, $_POST['firstname']);
        $lower_rawdata = strtolower($rawdata);

        $query = "UPDATE tbl_superadmin SET firstname = '$lower_rawdata' WHERE email = '$email'";
        $run_query = mysqli_query($connect, $query);
        if($run_query){
            $ymessage['message'] = "New Firstname: $lower_rawdata";
        }
    }

    // superadmin change birthday
    if(isset($_POST['change_birthday'])){
        $email = $_SESSION['email'];
        $rawdata = mysqli_real_escape_string($connect, $_POST['birthday']);
        $lower_rawdata = strtolower($rawdata);

        $query = "UPDATE tbl_superadmin SET birthday = '$lower_rawdata' WHERE email = '$email'";
        $run_query = mysqli_query($connect, $query);
        if($run_query){
            $ymessage['message'] = "New Birthday: $lower_rawdata";
        }
    }

    // superadmin change contact number
    if(isset($_POST['change_contact'])){
        $email = $_SESSION['email'];
        $contact = mysqli_real_escape_string($connect, $_POST['contact']);

        $query = "UPDATE tbl_superadmin SET mobile = '$contact' WHERE email = '$email'";
        $run_query = mysqli_query($connect, $query);
        if($run_query){
            $ymessage['message'] = "New Contact Number: $contact";
        }
    }

    // moderator login
    if(isset($_POST['moderator_login'])){
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $password = mysqli_real_escape_string($connect, $_POST['password']);
        
        $user_info_query = "SELECT * FROM tbl_employee WHERE email = '$email'";
        $user_info = mysqli_query($connect, $user_info_query);
        
        if(mysqli_num_rows($user_info) > 0){
            $fetch_user_info = mysqli_fetch_assoc($user_info);

            $fetch_email = $fetch_user_info['email'];
            $fetch_password = $fetch_user_info['password'];
            $fetch_status = $fetch_user_info['status'];
            $fetch_code = $fetch_user_info['code'];
            $fetch_firstname = ucwords($fetch_user_info['firstname']);
            $fetch_position = $fetch_user_info['position'];
            $code = rand(999999, 111111);

            if(password_verify($password, $fetch_password)){
                if($fetch_status == 'online'){
                    if($fetch_code == 0){
                        if($fetch_position == 'moderator'){
                            $_SESSION['email'] = $email;
                            header('location: dashboard.php');
                            exit();
                        }
                        else{
                            $xmessage['message'] = "Unauthorized Login";
                        }
                    }
                    else{
                        $insert_code_query = "UPDATE tbl_employee SET code = $code WHERE email = '$email'";
                        $insert_code = mysqli_query($connect, $insert_code_query);
                        if($insert_code){
                            $subject = "Email Verification Code";
                            $message = "Hi! $fetch_firstname this is your Email Verification code, $code";
                            $sender = "From: psicoterapiainc@gmail.com";
                            if(mail($email, $subject, $message, $sender)){
                                $_SESSION['otp'] = "we have sent and email verification code to this email, $email";
                                $_SESSION['email']= $email;
                                header('location: verify.php');
                                exit();
                            }
                        }
                    }
                }
                else{
                    $xmessage['message'] = "This account was deactivated";
                }
            }
            else{
                $xmessage['message'] = "Invalid username or password";
            }
        }
        else{
            $xmessage['message'] = "Unrecognized Account";
        }
    }

    // moderator verify otp code
    if(isset($_POST['moderator_verify'])){
        $code = mysqli_real_escape_string($connect, $_POST['code']);
        $email = $_SESSION['email'];

        $user_info_query = "SELECT * FROM tbl_employee WHERE code = $code AND email ='$email'";
        $user_info = mysqli_query($connect, $user_info_query);

        if(mysqli_num_rows($user_info) > 0){
            $insert_code_query = "UPDATE tbl_employee SET code = 0 WHERE email = '$email'";
            $insert_code = mysqli_query($connect, $insert_code_query);

            if($insert_code){
                header('location: change.php');
                exit();
            }
        }
        else{
            $xmessage['message'] = "Invalid code";
        }
    }

    // moderator forgot password
    if(isset($_POST['moderator_forgot'])){
        $email = mysqli_real_escape_string($connect, $_POST['email']);

        $user_info_query = "SELECT * FROM tbl_employee WHERE email = '$email'";
        $user_info = mysqli_query($connect, $user_info_query);

        if(mysqli_num_rows($user_info) > 0){
            $fetch_user_info = mysqli_fetch_assoc($user_info);
            $fetch_firstname = ucwords($fetch_user_info['firstname']);
            $code = rand(999999, 111111);

            $insert_code_query = "UPDATE tbl_employee SET code = $code WHERE email = '$email'";
            $insert_code = mysqli_query($connect, $insert_code_query);

            if($insert_code){
                $subject = "Email Verification Code";
                $message = "Hi! $fetch_firstname this is your Email Verification code, $code";
                $sender = "From: psicoterapiainc@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $_SESSION['otp'] = "we have sent and email verification code to this email, $email";
                    $_SESSION['email']= $email;
                    header('location: verify.php');
                    exit();
                }
            }
        }
        else{
            $xmessage['message'] = "Unrecognized Email";
        }
    }

    // moderator resent otp code
    if(isset($_GET['resends_otp'])){
        $email = $_GET['resends_otp'];

        $user_info_query = "SELECT * FROM tbl_employee WHERE email = '$email'";
        $user_info = mysqli_query($connect, $user_info_query);

        if(mysqli_num_rows($user_info) > 0){
            $fetch_user_info = mysqli_fetch_assoc($user_info);
            $fetch_firstname = ucwords($fetch_user_info['firstname']);
            $code = rand(999999, 111111);

            $insert_code_query = "UPDATE tbl_employee SET code = $code WHERE email = '$email'";
            $insert_code = mysqli_query($connect, $insert_code_query);

            if($insert_code){
                $subject = "Email Verification Code";
                $message = "Hi! $fetch_firstname this is your Email Verification code, $code";
                $sender = "From: psicoterapiainc@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $_SESSION['info'] = "weve sent and email verification code to this email, $email";
                }
            }
        }
        else{
            $xmessage['message'] = "Resend code failed";
        }
    }

    // moderator reset password
    if(isset($_POST['moderator_change'])){
        $npassword = mysqli_real_escape_string($connect, $_POST['npassword']);
        $cpassword = mysqli_real_escape_string($connect, $_POST['cpassword']);
        $email = $_SESSION['email'];

        if($npassword !== $cpassword){
            $xmessage['message'] = "Password did not matched";
        }
        else{
            $encrypt_password = password_hash($npassword, PASSWORD_BCRYPT);
            $new_password_query = "UPDATE tbl_employee SET password = '$encrypt_password' WHERE email = '$email'";
            $new_password = mysqli_query($connect, $new_password_query);

            if($new_password){
                $_SESSION['info'] = "Please login again using your new password";
                header('location: moderator.php'); 
                exit();
            }
        }
    }

    // get doctor info
    if(isset($_GET['doctors_id'])){
        $id = $_GET['doctors_id'];

        $employee_info_query = "SELECT * FROM tbl_employee WHERE id = $id";
        $employee_info = mysqli_query($connect, $employee_info_query);
        if(mysqli_num_rows($employee_info) > 0){
            $fetch_employee_info = mysqli_fetch_assoc($employee_info);
            $fetch_status = $fetch_employee_info['status'];
            $fetch_firstname = ucwords($fetch_employee_info['firstname']);
            $fetch_lastname = ucwords($fetch_employee_info['lastname']);
            if($fetch_status == 'online'){
                $update_status_query = "UPDATE tbl_employee SET status = 'offline' WHERE id = $id";
                $update_status = mysqli_query($connect, $update_status_query);
                if($update_status){
                    $_SESSION['info'] = "$fetch_firstname $fetch_lastname to OFFLINE";
                    header('location: ../moderator/team.php');
                    exit();
                }
            }
            else{
                $update_status_query = "UPDATE tbl_employee SET status = 'online' WHERE id = $id";
                $update_status = mysqli_query($connect, $update_status_query);
                if($update_status){
                    $_SESSION['info'] = "$fetch_firstname $fetch_lastname to ONLINE";
                    header('location: ../moderator/team.php');
                    exit();
                }
            }
        }
    }

    // moderator employeedetails
    if(isset($_GET['staffs_id'])){
        $id = $_GET['staffs_id'];

        $employee_info_query = "SELECT * FROM tbl_employee WHERE id = $id";
        $employee_info = mysqli_query($connect, $employee_info_query);
        if(mysqli_num_rows($employee_info) > 0){
            $fetch_employee_info = mysqli_fetch_assoc($employee_info);
            $fetch_status = $fetch_employee_info['status'];
            $fetch_firstname = ucwords($fetch_employee_info['firstname']);
            $fetch_lastname = ucwords($fetch_employee_info['lastname']);
            if($fetch_status == 'online'){
                $update_status_query = "UPDATE tbl_employee SET status = 'offline' WHERE id = $id";
                $update_status = mysqli_query($connect, $update_status_query);
                if($update_status){
                    $_SESSION['info'] = "$fetch_firstname $fetch_lastname to OFFLINE";
                    $_SESSION['id'] = $id;
                    header('location: ../moderator/employee.php');
                    exit();
                }
            }
            else{
                $update_status_query = "UPDATE tbl_employee SET status = 'online' WHERE id = $id";
                $update_status = mysqli_query($connect, $update_status_query);
                if($update_status){
                    $_SESSION['info'] = "$fetch_firstname $fetch_lastname to ONLINE";
                    $_SESSION['id'] = $id;
                    header('location: ../moderator/employee.php');
                    exit();
                }
            }
        }
    }

    // superadmin register new account
    if(isset($_POST['registers'])){
        $firstname1 = mysqli_real_escape_string($connect, $_POST['firstname']);
        $lastname1 = mysqli_real_escape_string($connect, $_POST['lastname']);
        $birthday = mysqli_real_escape_string($connect, $_POST['birthday']);
        $contact = mysqli_real_escape_string($connect, $_POST['contact']);
        $email1 = mysqli_real_escape_string($connect, $_POST['email']);

        $firstname = strtolower($firstname1);
        $lastname = strtolower($lastname1);
        $email = strtolower($email1);
        $picture = "profile.png";
        $password = "Admin";
        $code = 0;
        $status = "online";
	$position = 'doctor';

        $check_email_query = "SELECT * FROM tbl_employee WHERE email = '$email'";
        $check_email = mysqli_query($connect, $check_email_query);

        if(mysqli_num_rows($check_email) > 0){
            $xmessage['message'] = "Email Address already taken";
        }
        else{
            $encrypted_password = password_hash($password, PASSWORD_BCRYPT);

            $insert_data_query = "INSERT INTO tbl_employee (picture, position, lastname, firstname, birthday, mobile, email, password, code, status, created) values('$picture','$position','$lastname','$firstname','$birthday','$contact','$email','$encrypted_password','$code','$status','$today_date')";
            $insert_data = mysqli_query($connect, $insert_data_query);
            if($insert_data){
                $plname = ucwords($lastname);
                $pfname = ucwords($firstname);
                $ymessage['message'] = "$plname, $pfname";
            }
        }
    }

    // moderator change profile pic
    if(isset($_POST["change_pics"])){

        // getting files properties
        $img_name = $_FILES['picture']['name'];
        $img_size = $_FILES['picture']['size'];
        $tmp_name = $_FILES['picture']['tmp_name'];
        $error = $_FILES['picture']['error'];
        
        // check for errors
        if ($error === 0) {
            if ($img_size > 999000) {
                $errors['info'] = "File too Large";
            }else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
    
                // files to be accepted
                $allowed_exs = array("jpg", "jpeg", "png"); 
    
                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_upload_path = '../resources/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
    
                    // Insert into Database
                    $email = $_SESSION['email'];
                    $sql = "UPDATE tbl_employee SET picture = '$new_img_name' where email = '$email'";
                    $insertpic = mysqli_query($connect, $sql);
                    if($insertpic){
                        $ymessage['message'] = "Yahoo! New Profile Pic";
                    }
                }
                else {
                    $xmessage['message'] = "You can't upload files of this type";
                }
            }
        }
        else {
            $xmessage['message'] = "unknown error occurred!";
        }
    } // end

    // moderator change lastname
    if(isset($_POST['change_lastnames'])){
        $email = $_SESSION['email'];
        $rawdata = mysqli_real_escape_string($connect, $_POST['lastname']);
        $lower_rawdata = strtolower($rawdata);

        $query = "UPDATE tbl_employee SET lastname = '$lower_rawdata' WHERE email = '$email'";
        $run_query = mysqli_query($connect, $query);
        if($run_query){
            $ymessage['message'] = "New Lastname: $lower_rawdata";
        }
    }

    // moderator change firstname
    if(isset($_POST['change_firstnames'])){
        $email = $_SESSION['email'];
        $rawdata = mysqli_real_escape_string($connect, $_POST['firstname']);
        $lower_rawdata = strtolower($rawdata);

        $query = "UPDATE tbl_employee SET firstname = '$lower_rawdata' WHERE email = '$email'";
        $run_query = mysqli_query($connect, $query);
        if($run_query){
            $ymessage['message'] = "New Firstname: $lower_rawdata";
        }
    }

    // moderator change birthday
    if(isset($_POST['change_birthdays'])){
        $email = $_SESSION['email'];
        $rawdata = mysqli_real_escape_string($connect, $_POST['birthday']);
        $lower_rawdata = strtolower($rawdata);

        $query = "UPDATE tbl_employee SET birthday = '$lower_rawdata' WHERE email = '$email'";
        $run_query = mysqli_query($connect, $query);
        if($run_query){
            $ymessage['message'] = "New Birthday: $lower_rawdata";
        }
    }

    // moderator change contact number
    if(isset($_POST['change_contacts'])){
        $email = $_SESSION['email'];
        $contact = mysqli_real_escape_string($connect, $_POST['contact']);

        $query = "UPDATE tbl_employee SET mobile = '$contact' WHERE email = '$email'";
        $run_query = mysqli_query($connect, $query);
        if($run_query){
            $ymessage['message'] = "New Contact Number: $contact";
        }
    }

    // doctor login
    if(isset($_POST['doctor_login'])){
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $password = mysqli_real_escape_string($connect, $_POST['password']);
        
        $user_info_query = "SELECT * FROM tbl_employee WHERE email = '$email'";
        $user_info = mysqli_query($connect, $user_info_query);
        
        if(mysqli_num_rows($user_info) > 0){
            $fetch_user_info = mysqli_fetch_assoc($user_info);

            $fetch_email = $fetch_user_info['email'];
            $fetch_password = $fetch_user_info['password'];
            $fetch_status = $fetch_user_info['status'];
            $fetch_code = $fetch_user_info['code'];
            $fetch_firstname = ucwords($fetch_user_info['firstname']);
            $fetch_position = $fetch_user_info['position'];
            $code = rand(999999, 111111);

            if(password_verify($password, $fetch_password)){
                if($fetch_status == 'online'){
                    if($fetch_code == 0){
                        if($fetch_position == 'doctor'){
                            $_SESSION['email'] = $email;
                            $_SESSION['doctor'] = $email;
                            header('location: dashboard.php');
                            exit();
                        }
                        else{
                            $xmessage['message'] = "Unauthorized Login";
                        }
                    }
                    else{
                        $insert_code_query = "UPDATE tbl_employee SET code = $code WHERE email = '$email'";
                        $insert_code = mysqli_query($connect, $insert_code_query);
                        if($insert_code){
                            $subject = "Email Verification Code";
                            $message = "Hi! $fetch_firstname this is your Email Verification code, $code";
                            $sender = "From: psicoterapiainc@gmail.com";
                            if(mail($email, $subject, $message, $sender)){
                                $_SESSION['otp'] = "we have sent and email verification code to this email, $email";
                                $_SESSION['email']= $email;
                                header('location: verify.php');
                                exit();
                            }
                        }
                    }
                }
                else{
                    $xmessage['message'] = "This account was deactivated";
                }
            }
            else{
                $xmessage['message'] = "Invalid username or password";
            }
        }
        else{
            $xmessage['message'] = "Unrecognized Account";
        }
    }
    
    // doctor reset password
    if(isset($_POST['doctor_change'])){
        $npassword = mysqli_real_escape_string($connect, $_POST['npassword']);
        $cpassword = mysqli_real_escape_string($connect, $_POST['cpassword']);
        $email = $_SESSION['email'];

        if($npassword !== $cpassword){
            $xmessage['message'] = "Password did not matched";
        }
        else{
            $encrypt_password = password_hash($npassword, PASSWORD_BCRYPT);
            $new_password_query = "UPDATE tbl_employee SET password = '$encrypt_password' WHERE email = '$email'";
            $new_password = mysqli_query($connect, $new_password_query);

            if($new_password){
                $_SESSION['info'] = "Please login again using your new password";
                header('location: doctor.php'); 
                exit();
            }
        }
    }

    if(isset($_POST['change_email'])){
        $newemail = mysqli_real_escape_string($connect, $_POST['email']);
        $oldemail = $_SESSION['email'];

        $check_newemail_query = "SELECT * FROM tbl_superadmin WHERE email = '$newemail'";
        $check_newemail = mysqli_query($connect, $check_newemail_query);
        if(mysqli_num_rows($check_newemail) > 0){
            $xmessage['message'] = "Email Address already taken";
        }
        else{
            $code = rand(999999, 111111);
            $settempo_query = "UPDATE tbl_superadmin SET tempomail = '$newemail', code = $code WHERE email = '$oldemail'";
            $settempo = mysqli_query($connect, $settempo_query);
            if($settempo){
                $subject = "Email Verification Code";
                $message = "Good Day! this is your Email Verification code, $code";
                $sender = "From: psicoterapiainc@gmail.com";
                if(mail($newemail, $subject, $message, $sender)){
                    $_SESSION['info'] = "weve sent and email verification code to this email, $newemail";
                    header('location: profile_emver.php');
                    exit();
                }
            }
        }
    }
    if(isset($_POST['verify_acct'])){
        $urcode = mysqli_real_escape_string($connect, $_POST['code']);
        $myemail = $_SESSION['email'];

        $check_urcode_query = "SELECT * FROM tbl_superadmin WHERE code = $urcode";
        $check_urcode = mysqli_query($connect, $check_urcode_query);
        if(mysqli_num_rows($check_urcode) > 0){
            $fetch_update = mysqli_fetch_assoc($check_urcode);
            $fetch_tempomail = $fetch_update['tempomail'];
            $update_query = "UPDATE tbl_superadmin SET code = 0, email = '$fetch_tempomail' WHERE email = '$myemail'";
            $update = mysqli_query($connect, $update_query);
            if($update){
                $_SESSION['email'] = $fetch_tempomail;
                $_SESSION['info'] = "Email Address";
                header('location: profile.php');
                exit();
            }
        }
        else{
            $xmessage['message'] = "Incorrect Code";
        }
    }
    if(isset($_POST['change_emails'])){
        $newemail = mysqli_real_escape_string($connect, $_POST['email']);
        $oldemail = $_SESSION['email'];

        $check_newemail_query = "SELECT * FROM tbl_employee WHERE email = '$newemail'";
        $check_newemail = mysqli_query($connect, $check_newemail_query);
        if(mysqli_num_rows($check_newemail) > 0){
            $xmessage['message'] = "Email Address already taken";
        }
        else{
            $code = rand(999999, 111111);
            $settempo_query = "UPDATE tbl_employee SET tempomail = '$newemail', code = $code WHERE email = '$oldemail'";
            $settempo = mysqli_query($connect, $settempo_query);
            if($settempo){
                $subject = "Email Verification Code";
                $message = "Good Day! this is your Email Verification code, $code";
                $sender = "From: psicoterapiainc@gmail.com";
                if(mail($newemail, $subject, $message, $sender)){
                    $_SESSION['info'] = "weve sent and email verification code to this email, $newemail";
                    header('location: profile_emver.php');
                    exit();
                }
            }
        }
    }
    if(isset($_POST['verify_accts'])){
        $urcode = mysqli_real_escape_string($connect, $_POST['code']);
        $myemail = $_SESSION['email'];

        $check_urcode_query = "SELECT * FROM tbl_employee WHERE code = $urcode";
        $check_urcode = mysqli_query($connect, $check_urcode_query);
        if(mysqli_num_rows($check_urcode) > 0){
            $fetch_update = mysqli_fetch_assoc($check_urcode);
            $fetch_tempomail = $fetch_update['tempomail'];
            $fetch_id = $fetch_update['id'];
            $update_doctor_query = "UPDATE tbl_appointments SET doctor = '$fetch_tempomail' WHERE doc_id = $fetch_id";
            $update_doctor = mysqli_query($connect, $update_doctor_query);
            $update_query = "UPDATE tbl_employee SET code = 0, email = '$fetch_tempomail' WHERE email = '$myemail'";
            $update = mysqli_query($connect, $update_query);
            if($update && $update_doctor){
                $_SESSION['email'] = $fetch_tempomail;
                $_SESSION['doctor'] = $fetch_tempomail;
                $_SESSION['info'] = "Email Address";
                header('location: profile.php');
                exit();
            }
        }
        else{
            $xmessage['message'] = "Incorrect Code";
        }
    }
    if(isset($_POST['verify_acctx'])){
        $urcode = mysqli_real_escape_string($connect, $_POST['code']);
        $myemail = $_SESSION['email'];

        $check_urcode_query = "SELECT * FROM tbl_employee WHERE code = $urcode";
        $check_urcode = mysqli_query($connect, $check_urcode_query);
        if(mysqli_num_rows($check_urcode) > 0){
            $fetch_update = mysqli_fetch_assoc($check_urcode);
            $fetch_tempomail = $fetch_update['tempomail'];
            $fetch_id = $fetch_update['id'];
            $update_query = "UPDATE tbl_employee SET code = 0, email = '$fetch_tempomail' WHERE email = '$myemail'";
            $update = mysqli_query($connect, $update_query);
            if($update){
                $_SESSION['email'] = $fetch_tempomail;
                $_SESSION['info'] = "Email Address";
                header('location: profile.php');
                exit();
            }
        }
        else{
            $xmessage['message'] = "Incorrect Code";
        }
    }

    if(isset($_POST['change_p'])){
        $oldpass = mysqli_real_escape_string($connect, $_POST['oldpass']);
        $newpass = mysqli_real_escape_string($connect, $_POST['newpass']);
        $conpass = mysqli_real_escape_string($connect, $_POST['conpass']);
        $cpmail = $_SESSION['email'];
        
        $opass_query = "SELECT * FROM tbl_superadmin WHERE email = '$cpmail'";
        $opass = mysqli_query($connect, $opass_query);
        $fetch_opass = mysqli_fetch_assoc($opass);

        $fetch_pass = $fetch_opass['password'];
        if(password_verify($oldpass, $fetch_pass)){
            if($newpass == $conpass){
                $enpass = password_hash($newpass, PASSWORD_BCRYPT);
                $enpass_query = "UPDATE tbl_superadmin SET password = '$enpass' WHERE email = '$cpmail'";
                $epass = mysqli_query($connect, $enpass_query);
                if($epass){
                    $ymessage['message']="Password Changed";
                }
            }
            else{
                $xmessage['message'] = "Mismatch New Password";
            }
        }
        else{
            $xmessage['message'] = "Incorrect Old Password";
        }
    }

    if(isset($_POST['change_ps'])){
        $oldpass = mysqli_real_escape_string($connect, $_POST['oldpass']);
        $newpass = mysqli_real_escape_string($connect, $_POST['newpass']);
        $conpass = mysqli_real_escape_string($connect, $_POST['conpass']);
        $cpmail = $_SESSION['email'];
        
        $opass_query = "SELECT * FROM tbl_employee WHERE email = '$cpmail'";
        $opass = mysqli_query($connect, $opass_query);
        $fetch_opass = mysqli_fetch_assoc($opass);

        $fetch_pass = $fetch_opass['password'];
        if(password_verify($oldpass, $fetch_pass)){
            if($newpass == $conpass){
                $enpass = password_hash($newpass, PASSWORD_BCRYPT);
                $enpass_query = "UPDATE tbl_employee SET password = '$enpass' WHERE email = '$cpmail'";
                $epass = mysqli_query($connect, $enpass_query);
                if($epass){
                    $ymessage['message']="Password Changed";
                }
            }
            else{
                $xmessage['message'] = "Mismatch New Password";
            }
        }
        else{
            $xmessage['message'] = "Incorrect Old Password";
        }
    }
?>