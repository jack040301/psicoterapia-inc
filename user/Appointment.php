<?php   



        include("db_psicoterapia.php");

      

        session_start();

     

        if(empty($_SESSION['userID'])){

          header('location:userLogin.php');

        }

     

       

 ?>

<?php 

  if(!isset($_POST['datepick1'])){

        $txt = "";

  }else{

        $txt = $_POST['datepick1'];

  }  

?>



<!DOCTYPE html>

<html>

<head>

    <script src="./removeBanner.js"></script>

	<meta charset="UTF-8">

	<meta  name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Psicoterapia | User Login</title>

	<link rel="icon" type="png" href="userDesigns/user_images/noLabelLogo.png">

	<link rel="stylesheet" type="text/css" href="App.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!--  -->

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<!--  -->

</head>

<body style="background-color: #F1F3FF;">

	<style type="text/css">

		.btn{

  margin-top: 15px;

    background-color: #4663E5; 

    color: #F1F3FF; 

    font-family: Poppins;

 }

 #btn_appointment{

 	margin-top: 15px;

    background-color: #4663E5; 

    color: #F1F3FF; 

    font-family: Poppins;

    border: none;

    border-radius: 5px;

    width: 150px;

 }

 h2{

  font-family: Poppins;

  font-weight: bold;

 font-size: 17pt;

 color: #4E4F5D;

}

	</style>



<!--<div class="container">-->

    

        <a href="index.php" class="logo"><label class="psico"></label>Psico<label class="terapia" style="color: #4F64AF;">terapia</label></a> <!--EDIT THE LINK TO YOUR LANDING PAGE-->

        

<div class="whole">

		<h2 style="text-align: center;">Make an Appointment</h2>

  <div class="datepicker">

        <form action="" method="POST">

          <label id="ss">Select date</label>

          

            <input type="date" id="datepick1" name="datepick1" value = "<?= $txt ?>" required>

            <center><input type="submit" name="Submit" value="Check" id="check"></center>

        </form>

      </div>

      <?php
          $pick = date('Y-m-d', strtotime($txt));
          date_default_timezone_set(  'Asia/Singapore');
          $date = date('Y-m-d');
          $time = date('H:i A');
          // echo $time;
          // echo date('H:i A');
          // echo $pick;
          // session_start();
          include "db_psicoterapia.php";// Using database connection file here
          

          // Use select query here
            $records = mysqli_query($conn, "SELECT * FROM tbl_employee WHERE ( '$pick' between start_date AND end_date) AND position = 'doctor'");
              if($pick != $date){
                while($data = mysqli_fetch_array($records)){
                 // $dbtime = date('H:i A', strtotime($data['time_description']));
                 //  if($time < $dbtime){
                     // echo $dbtime;

                    echo '<div class="row" style="margin-bottom: 10px; 
                          margin-right: 20px;
                          flex-flow: wrap;
                    display: inline-block;
                    justify-content: space-around;">';
                    echo'<br><div class="card" style="width: 20rem; width:200px;
                            padding: 15px;">';
                    echo'<div class="card-body">';
                    echo' <h5 class="card-title" name="title">Doctor</h5>';
                    echo '<h4 class="text-info"> '.$data['lastname'].'</h4>';
                    echo' <p " class="card-text">Email: '.$data['email'].'</p>';
                    echo' <p class="card-text">Time: '.$data['time'].'</p>';
                    echo'<a href="#"  data-bs-toggle="modal" data-bs-target="#exampleModal" class="modalButton btn btn-primary" data-name="'. $data['lastname'] .'" data-time="'.$data['time'].'" data-docid="'.$data['id'].'" data-email="'.$data['email'].'">Schedule Appointment</a>';
                    echo'</div></div>';
                    echo'</div>';
                  // }
                }
              }else{
                while($data = mysqli_fetch_array($records)){
                 $dbtime = date('H:i A', strtotime($data['time']));
                  if($time < $dbtime){
                     // echo $dbtime;
                     echo '<div class="row" style="margin-bottom: 10px; 
                          margin-right: 20px;
                          flex-flow: wrap;
                    display: inline-block;
                    justify-content: space-around;">';
                    echo'<br><div class="card" style="width: 20rem; width:200px;
                            padding: 15px;">';
                    echo'<div class="card-body">';
                    echo' <h5 class="card-title" name="title">Doctor</h5>';
                    echo '<h4 class="text-info"> '.$data['lastname'].'</h4>';
                    echo' <p " class="card-text">Email: '.$data['email'].'</p>';
                    echo' <p class="card-text">Time: '.$data['time'].'</p>';
                    echo'<a href="#"  data-bs-toggle="modal" data-bs-target="#exampleModal" class="modalButton btn btn-primary" data-name="'. $data['lastname'] .'" data-time="'.$data['time'].'" data-docid="'.$data['id'].'" data-email="'.$data['email'].'">Schedule Appointment</a>';
                    echo'</div></div>';
                    echo'</div>';
                  }
                }
              }

          $conn ->close();
        ?> 

</div><!--whole-->

<!-- modal -->

  <form method="POST" action="appointfunct.php"> <!-- do not forget this-->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

      <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

          <div class="modal-header">

            <h3 class="modal-title" id="exampleModalLabel">Schedule Appointment</h3>

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

          </div>

          <div class="modal-body">

            <label id="selDate">Selected Date</label>

            <br>  

            <!-- <input type="date" id="datepick" name=""> -->

            <input type="text" id="datepick" readonly="readonly" name="datepick"  value = "<?= $pick ?>" style="padding-left: 10px;">

            <label id="selDate">Doctor</label>

            <br>

            <input type="text" id="doctors" name="displaydoctor" readonly="readonly"> 

            <br>

            <label id="selDate">Time</label>

            <input type="text" id="mod" name="displaytime" readonly="readonly">

            <input type="hidden" id="docid" name="docid" readonly="readonly">

            <input type="hidden" id="docemail" name="docemail" readonly="readonly">



         

            <div class="row">

              <div class="col-50">

                <div class="container" >

                  <div class="modal-footer">

                    <button type="submit" class="btns btn-secondary" name="btn_appointment" id="btn_appointment" value="book">Get appointment</button>

                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </form>

<!--</div>-->

</body>

</html>

<!-- MINIMUN DATE  -->

<script >

  datepick1.min = new Date().toISOString().split("T")[0];

</script>

<!--  -->



<script>

$(document).on('click','.modalButton', function() {

  var name = $(this).attr('data-name');

  var time = $(this).attr('data-time');

  var docid = $(this).attr('data-docid');

  var doc_email = $(this).attr('data-email');





$('.modal').find('#doctors').val(name);

$('.modal').find('#mod').val(time);

$('.modal').find('#docemail').val(doc_email);

$('.modal').find('#docid').val(docid);



});

</script> 