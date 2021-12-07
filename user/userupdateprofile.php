<?php   



        include("db_psicoterapia.php");

      

        session_start();

     

        if(empty($_SESSION['userID'])){

          header('location:userLogin.php');

        }

     

       

 ?>

<!DOCTYPE html>

<html>

<head>

    <script src="./removeBanner.js"></script>

    <title>Psicoterapia | User Account</title>

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

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>



   

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

        @media (max-width: 1360px) {

    #save, #cancel{

      float: left;

    }

  }

        body{

            font-family: Poppins;

            height: 100vh;

        width: 100vw;

        }

        #userprofileform{

          

          margin: auto;

           max-width: 500px;

           padding: 10px;

           padding-left: 30px;

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

    height: 900px;

    background-color: #DEEBF7;

    margin-bottom: -50px;

     margin: auto;

     align-items: center;



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

input[type="file"] {

    display: none;

}

input[type=text], input[type=password]{

  width: 60%;

}

.custom-file-upload {

    margin-top: 30px;

    border: 2px solid #4562E5;

    background-color: transparent;

    color: #4562E5;

    font-family: Poppins;

    height: 40px;

    border-radius: 5px;

    padding: 10px;

    font-size: 9pt;

    display: inline-block;

}

#upload{

    margin-top: 30px;

    border: 2px solid #4562E5;

    background-color: transparent;

    color: #4562E5;

    font-family: Poppins;

    height: 40px;

    border-radius: 5px;

    padding: 10px;

    font-size: 9pt;

    display: inline-block;

}

.form-control{

    border: .5px solid gray;

    border-radius: 2px;

    background-color: transparent;

    height: 40px;

    font-size: 9pt;

}

.form-label{

    color: #010101;

    font-size: 9pt;

}

.form-control:focus{

    background-color: transparent;



}

#defaultprofile{

    background-color: transparent;

    color: #FE0808;

    font-size: 9pt;

    border: none;

}



#save{

    background-color: #4663E5;

    font-size: 9pt;

}

#cancel{

    border: none;

    background-color: transparent;

    color: #FE0808;

    font-size: 9pt;

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

           

            <a href="#" data-bs-toggle="modal" data-bs-target="#logout">Log out</a>

       





          </div>

       

        </div>

        <div class="cont">

        

        <br>    

        <p>Edit Profile</p>

        <div class="col-md-12"> 

        <hr>    

    



<!-- Modal -->

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

<!--Modal-->

        

        </div>

        <div class="text-center">

        



        



<br>

<img src="<?php echo $dbpass ?>" class="rounded" alt="..." style=" height: 130px; width: 130px;" >

<div class="mb-3">

<form action="upload.php" method="POST" enctype="multipart/form-data">

<!-- <label for="formFile" class="form-label">Profile</label>

<input class="form-control" type="file" id="formFile">-->



<label class="custom-file-upload">

<input type="file" name="file"> Choose File

</label>

<button type="submit" name="submit" id="upload">Update</button>

<button id="defaultprofile" name="defaultprofile">Remove</button>

<?php



include("script.php");

?>

</form> 



</div>

</div>

<?php 

      if(isset($_SESSION['error'])){ 

      $error = $_SESSION['error']; ?>

      <h5 style="color: red; margin-left: 100px; margin-bottom: 25px; padding-left: 5%;"> <?php  echo $_SESSION['error'] ?></h5>

<?php } ?>

<?php



?>

<?php

$records =mysqli_query($conn, "SELECT * from tbl_useraccount where userID='{$_SESSION['userID']}'"); //





   //END OF QUERY

  

 //SHOWING THE DATA

   



  while($row= mysqli_fetch_array($records)){

      $firstname = $row['userGivenName'];

      $lastname = $row['userSurname']; 



     

    ?>



<form  method="POST" id="userprofileform" action="userAction.php" class="row g-3">

<div class="col-md-12">

<label for="inputEmail4" class="form-label">First Name</label>

<input type="text" class="form-control" id="upfirstname" name="upfirstname" value="<?php echo $firstname ?>">

</div>

<div class="col-md-12">

<label for="inputPassword4" class="form-label">Last Name</label>

<input type="text" class="form-control" id="uplastname" name="uplastname" value="<?php echo $lastname ?>">

</div>

<div class="col-12">

<label for="inputAddress" class="form-label">Current Password</label>

<input type="password" class="form-control" id="upcurrentpass" name="upcurrentpass"  >

</div>

<div class="col-12">

<label for="inputAddress2" class="form-label">New Password</label>

<input type="password" class="form-control" id="upnewpass" name="upnewpass">

</div>

<div class="col-md-6">

<!--<label for="inputCity" class="form-label">Contact Number</label> -->

<!--<input type="tel" id="contactNumber" name="contactNumber" placeholder="Contact Number" required="Required" pattern="^(09|\+639)\d{9}$" onkeypress="return isNumberKey(event)" maxlength="11" onpaste="return false;" ondrop="return false;">-->



<!--<input type="tel" class="form-control" id="upcontactnumber"  onkeypress="return isNumberKey(event)" maxlength="11" onpaste="return false;" ondrop="return false;"  value="<?php echo $contactnumber?>"> </input>

  ---></div> 

<?php 

    } 

 ?>

    

<div class="text-center">

<div class="col-12">

<button type="submit" class="btn btn-primary" id="save" name="save">Save Changes</button>

<button class="btn btn-primary" id="cancel" name="cancelupdate" >Cancel</button>

</div>

</div>

</form>



<?php



include("script.php");

?>



<!---->

        <!--</div>-->

      </div>

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



<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  

      <script>

   const phoneInputField = document.querySelector("#upcontactnumber");

   

   const phoneInput = window.intlTelInput(phoneInputField, {

    initialCountry: "ph",

     utilsScript:

       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",

   });

 </script>

</body>



</html>

<?php

 

     

 

    unset($_SESSION["error"]);

?>