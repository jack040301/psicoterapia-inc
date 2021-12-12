<?php



session_start();

include('db_psicoterapia.php');



if(empty($_SESSION['userID'])){

  header('location:userLogin.php');

}



?>



<!DOCTYPE html>

<html>

<head>

    <script src="./removeBanner.js"></script>

    <title>Psicoterapia | User Dashboard</title>

    <link rel="icon" type="png" href="userDesigns/user_images/noLabelLogo.png">

    <meta charset='utf-8'>

    <meta http-equiv='X-UA-Compatible' content='IE=edge'>

    <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<link rel='stylesheet' type='text/css' media='screen' href='main.css'>

    <script src='main.js'></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>



   

</head>

<body style="background-color: #F1F3FF;">

    <style type="text/css">

    html, body{

  overflow-x: hidden;

}

        .containers{

            background-color: #F1F3FF;

            border-radius: 25px;

            margin:0px;

            height:100%;

            width: 60%;

            min-width: 500px;

            margin: auto;

            margin-top: 3%;

            margin-bottom: 50px;

            padding-bottom: 50px;

            box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;

        }



        body{

            font-family: Poppins;

            width: 100vw;

            height: 100vh;

        }

        .logo {

        color: #4E4F62;

        line-height: 90px;

        font-size: 20pt;

        font-weight: bold;

        text-decoration: none;

        margin-left: 30px;

        font-family: "Roboto", sans-serif;

       

      background-color: transparent;

      background-image: url(userDesigns/user_images/brain.png);

      background-repeat: no-repeat;

      background-size: 50px;

      padding-left: 40px;

      }

      label{

      color: #485EAB;

      cursor: pointer;

    }

    /* Dropdown Button */

.dropbtn {

  background-color: transparent;

  color: #595A68;

  font-size: 16px;

  border: none;

  cursor: pointer;

  margin-right: 0;

  margin-top: 50px;

  font-family: Poppins;

  align-content: center;

}

/* Dropdown button on hover & focus */

.dropbtn:hover, .dropbtn:focus {

  background-color: transparent;

}



/* The container <div> - needed to position the dropdown content */

.dropdown {

  position: relative;

  display: inline-block;

  float: right;

   margin: 0 auto;

}



/* Dropdown Content (Hidden by Default) */

.dropdown-content {

  display: none;

  position: absolute;

  background-color: #f1f1f1;

  min-width: 160px;

  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);

  z-index: 1;

}



/* Links inside the dropdown */

.dropdown-content a {

  color: black;

  padding: 10px;

  text-decoration: none;

  display: block;

  font-size: 9pt;

}

img{

    height: 30px;

    width: 30px;

    margin-top:-10px;

    margin-bottom: -10px;

}

.cont{

    padding-left: 50px;

  padding-top: 20px;

  padding-right: 50px;

  padding-bottom: 50px;

  height: 700px;

  background-color: #DEEBF7;

  margin-bottom: -50px;

}

#newApp{

    margin-top: -58px;

    float: right;

    margin-right: 30px;

    border: 2px solid #4562E5;

    background-color: transparent;

    color: #4562E5;

    font-family: Poppins;

    height: 40px;

    border-radius: 5px;

    padding: 10px;

    font-size: 9pt;

}

p{

    font-size: 15pt;

}

h3{

    font-size: 14pt;

}

hr{

    background-color: black;

    margin-right: 40px;

}

.log{

    background-color: black;

    margin-right: 0;

    margin-top: 0;

    margin-bottom: 0;

}

h1{

    font-size: 10pt;

}

h5{

    font-size: 9pt;

}

.card{

    background-color: #F1F3FF;

    border: none;

    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;

}

.colors{

    width: auto;

    height: 8px;

    background-color: #FFE699;

    border: 2px; solid red;

    border-top-right-radius: 5px;

    border-top-left-radius: 5px;

    border-bottom-left-radius: 0;

    border-bottom-right-radius: 0;

}

.container1{

    background-color: #FFFFFF;

            border-radius: 15px;

            margin:0px;

            height:100%;

            width: 50%;

            min-width: 500px;

            margin: auto;

            margin-top: 3%;

            margin-bottom: 50px;

            padding-bottom: 50px;

            box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;

}

#search{

    width: 45%;

            height: 40px;

            margin-left: 40px;

            display: block;

            border: 1px solid  #D1D0D0;

            border-radius: 5px;

            padding-left: 30px;

            font-size: 8pt;

            align-self: center;

            margin-bottom: 15px;

            margin-top: 30px;

}

#btnSearch{

    background-color: transparent;

    color: transparent;

    border: none;

}

#label{

    position:absolute;

             top:50%;

             transform:translate(0,-30%);

             float: left;

             margin-left: 54px;

             color: #858585;

             margin-top: 1px;

}

.rows{

            border-bottom: none;

            border-color: transparent;

            font-family: Poppins;

            color: #9D9EA0;

}

table{

    display:table;  

            font-size:14px;

            border-bottom: .5px solid #D7D5D5;

            color:#8d8d8d;

            margin:10px 0;  

            font-size: 9pt;

            table-layout:fixed;



  border-collapse: collapse;

  border-spacing: 0;

  width: 100%;

}



/* Change color of dropdown links on hover */

.dropdown-content a:hover {background-color: #ddd}



/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */

.show {display:block;}



input:focus { 

        outline: none !important;

        border-color: #4BD6F3;

        box-shadow: 0 0 10px #4BD6F3;

        box-shadow: #4BD6F3 0px 0px 1px, #4BD6F3 0px 0px 0px 1px;

 }

     .btn{

        background-color: #4663E5; 

        color: #F1F3FF; 

        font-family: Poppins;

     }

     .cancelBtn{

        color: #4663E5;

        background-color: transparent;

        border: none;

        font-family: Poppins;

        align-self: center;

       }

     h3{

      font-size: 15pt;

     }

     .modal{

      text-align: center;

     }

    </style>

         <?php 

   include('image.php');

    ?>

                    <!--CODE OF APPOINTMENT HISTORY-->

<!--<div class="containers col-md-12">-->

        <a href="index.php" class="logo">Psico<label>terapia</label></a>



        <div class="dropdown">

            <div class="btnwPic">

                <img src="<?php echo $dbpass; ?>">

          <button onclick="myFunction()" class="dropbtn">Account</button>

          <i class="fa fa-caret-down" style="margin-right: 50px; margin-left: -9px;"></i>

          </div>

          <div id="myDropdown" class="dropdown-content">

            <a href="user_Account.php">Dashboard</a>

            <a href="userupdateprofile.php">Edit Profile</a>

            <a href="userdashboard.php">Appointment History</a>

            <hr class="log">    

            <a href="#"  data-bs-toggle="modal" data-bs-target="#logout" name="btnlogout">Log out</a>

          </div>

        </div>

        <div class="cont">

        

        <br>    

        <p>Appointment History</p>

        

        <hr>    

  

           <!--<div class="container1 container-fluid" style="overflow-x:auto;"> -->

           <table class="table" style="overflow-x:auto;">

             <thead>

               <tr>

                 <th scope="col" class="rows" style="background-color: #F1F3FF;">Time</th>

                 <th scope="col" class="rows" style="background-color: #F1F3FF;">Date</th>

                 <th scope="col" class="rows" style="background-color: #F1F3FF;">Doctor</th>

               </tr>

             </thead>

             <tbody>

             <div class="input-group">

             <form method="POST" id="userLoginform">

             <input type="text" class="form-control rounded" placeholder="Search" aria-label="Search"

             aria-describedby="search-addon" id="search" name="search" />

<label id='label' for="input"><i class="fa fa-search" style="font-size: 13px;"></i></label>

             <input type="submit" name="btnSearch" class="btnSearch btn btn-success" value="Search" id="btnSearch" hidden>

               </form>

           </div>



          <?php

              include('userappointhistory.php');

          ?>





            </tbody>

            

                </table>

                <div style='padding: 10px 20px 0px; font-size: 9pt;'>

                <strong>Page <?php echo $page." of ".$totalpages; ?></strong>

                </div>



                <!--paging--> <!---USES BOOTSTRAP 5-->

                <nav aria-label="Page navigation example">

                  <ul class="pagination">

                  

                    <?php if($page > 1){

                echo "<li class='page-item'><a class='page-link' href='?page=1'>&lsaquo;&lsaquo; First</a></li>";

                } ?>

                    

                    <li <?php if($page == 1){ echo "class='page-item disabled'"; } ?>>

                <a class="page-link" <?php if($page > 1){

                echo "href='?page=$previous_page'";

                } ?>>Previous</a>

                </li>



                

                    <li <?php if($page >= $totalpages){

                echo "class='page-item disabled'";

                } ?>>

                <a class="page-link"  <?php if($page< $totalpages) {

                echo "href='?page=$next_page'";

                } ?>>Next</a>

                </li>



                  

                    <?php if($page < $totalpages){

                echo "<li class='page-item'><a class='page-link' href='?page=$totalpages'>Last &rsaquo;&rsaquo;</a></li>";

                } ?>





                  </ul>

                </nav>

                    <!---END OF CODE-->





           <!-- </div>-->

          </div>

        <!--</div>-->

      



    </div>

</div>

<script type="text/javascript">

    function myFunction() {

  document.getElementById("myDropdown").classList.toggle("show");

}



// Close the dropdown menu if the user clicks outside of it

window.onclick = function(event) {

  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");

    var i;

    for (i = 0; i < dropdowns.length; i++) {

      var openDropdown = dropdowns[i];

      if (openDropdown.classList.contains('show')) {

        openDropdown.classList.remove('show');

      }

    }

  }

}

</script>





<div class="modal fade" id="logout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="staticBackdropLabel">Logout</h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>

      <div class="modal-body">

      <form  action="logout.php" method="post" style="padding: 25px;">

      

      <div class="row">

        <div class="col-25">

          <h3>Are you sure you want to log out?</h3> <br>

          <input type="submit"  value="Yes, log out" class="btn" name="logout">

          <input type="submit" value="Cancel" class="cancelBtn" name="cancel">

      </form>

      </div>

    </div>

      </div>

     

  </div>

</div>

</body>

</html>