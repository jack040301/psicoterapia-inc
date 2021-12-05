<?php
include('db_psicoterapia.php');


session_start();
if(!empty($_SESSION['userID'])){
  header('location:userdashboard.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<script src="./removeBanner.js"></script>
	<title>Psicoterapia | About  us</title>
	
	<link rel="icon" type="png" href="userDesigns/user_images/noLabelLogo.png">
   <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
      <link rel="stylesheet" type="text/css" href="policy.css">
      
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body style="background-color:  #F1F3FF;">
  <style type="text/css">
          html {
        box-sizing: border-box;
      }
      body{
        font-family: Poppins;
      }

      *, *:before, *:after {
        box-sizing: inherit;
      }

      .column {
        float: left;
        width: 24.3%;
        height: auto;
        margin-bottom: 16px;
        padding: 0 8px;


      }
      .modal{
         margin-top: 70px;
         min-width: 100%; 
      }
      .profile{
        height: auto;
      }

      @media screen and (max-width: 650px) {
        .column {
          width: 100%;
          display: block;
        }
      }

      .card {
        padding: 5px;
        border-radius: 6px;  
        
        box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;
      }

      .container {
        padding: 0 16px;
      }
      .half{
        overflow-wrap: break-word;
         display: inline-block;
      }

      .container::after, .row::after {
        content: "";
        clear: both;
        display: table;
      }

      .title {
        color: grey;
      }

      .button {
        border: none;
        border-radius: 3px;
        outline: 0;
        display: inline-block;
        padding: 8px;
        color: white;
        background-color: #4663E5;
        text-align: center;
        cursor: pointer;
        width: 60%;
        height: 50px;
        font-family: Poppins;
        margin-top: 10px;
      }

      .button:hover {
        background-color: #555;
      }
      .gmail{
        font-size: 8pt;
      }
      .follow{
        padding: 12px;
        background-color: #F1F3FF;
        display: inline-block;
        text-decoration: none;
        border-radius: 3px;
        margin-top: 20px;

      }
      .follow:hover{
        text-decoration: none;

      }
      .desc{
        font-size: 2.2vmin;
      }
      .name{
       color: #F1F3FF;
      }
    .modal-body{
      min-height:70%; 
    overflow-y: auto;
    display: inline-block;
    }

  </style>
  <!--<div class="containers">-->
    <nav class="main-nav">
        <input type="checkbox" id="check" />
        <label for="check" class="menu-btn">
          <i class="fas fa-bars"></i>
        </label>
        <a href="index.php" class="logo"><label class="psico">Psico</label><label class="terapia">terapia</label></a>
        <ul class="navlinks">
          <li><a href="index.php">Home</a></li>
          <li><a href="policy.php">Policy</a></li>
          <li><a href="userAboutUs.php" class="active">About us</a></li>
          <li><a href="userLogin.php" class="signIn">Sign in</a></li>
        </ul>
      </nav>
      <br>
      <br>
      <div class="content">
          <h3>What is Psicoterapia?</h3>
          <p>Psicoterapia is a site provides easy booking appointments regarding with your mental health issues. </p>
          <h3>Our Vision</h3>
          <p>Our VISION is for a world with good mental health for all. </p>
          <h3>Our Mission</h3>
          <p>Our MISSION is to help people understand, protect and sustain their mental health. Prevention is at the heart of what we do, because the best way to deal with a crisis is to prevent it from happening in the first place.</p><br>
          <h3>About the Developers</h3>

            <div class="row">

              <div class="column">
                <div class="card" style="background-color: #DEEBF7;">
                  <center>
                    <img src="userDesigns/user_images/Jacqueline.png" alt="Jac" style="width:60%; margin-top: 10px;">
                    <div class="container">
                      <p>Jacqueline Porral</p>
                      <p class="title">Software Engineer</p>
                      <i class="gmail">porral.jacqueline.bscs2019@gmail.com</i>
                      <p><button class="button btn btn-primary" data-toggle="modal" data-target="#Jac">Contact</button></p>
                    </div>
                  </center>
                </div>
              </div><!--column-->
            
              <div class="column">
                <div class="card" style="background-color: #FBE5D6;">
                  <center>
                    <img src="userDesigns/user_images/Danica.png" alt="Dan" style="width:60%; margin-top: 10px;">
                    <div class="container">
                      <p>Danica Cabullo</p>
                      <p class="title">Front-end Developer</p>
                      <i class="gmail">cabullo.danica.bscs2019@gmail.com</i>
                      <p><button class="button btn btn-primary" data-toggle="modal" data-target="#Danica">Contact</button></p>
                    </div>
                  </center>
                </div>
              </div><!--column-->

              <div class="column">
                <div class="card" style="background-color: #E2F0D9;">
                  <center>
                    <img src="userDesigns/user_images/Jeffrix.png" alt="Jeff" style="width:60%; margin-top: 10px;">
                    <div class="container">
                      <p>Jeffrix Briol</p>
                      <p class="title">Software Developer</p>
                      <i class="gmail">briol.jeffrix.bscs2019@gmail.com</i>
                      <p><button class="button btn btn-primary" data-toggle="modal" data-target="#Jeffrix">Contact</button></p>
                    </div>
                  </center>
                </div>
              </div><!--column-->

              <div class="column">
                <div class="card" style="background-color: #EDEDED;">
                  <center>
                    <img src="userDesigns/user_images/Demverleen.png" alt="Dem" style="width:60%; margin-top: 10px;">
                    <div class="container">
                      <p>Demverleen Espinola</p>
                      <p class="title">Back-end Developer</p>
                      <i class="gmail">espinola.demverleen.bscs2019@gmail.com</i>
                      <p><button class="button btn btn-primary" data-toggle="modal" data-target="#Demverleen">Contact</button></p>
                    </div>
                  </center>
                </div>
              </div><!--column-->

              <div class="column">
                <div class="card" style="background-color: #FFF2CC;">
                  <center>
                    <img src="userDesigns/user_images/Nikki.png" alt="Niks" style="width:60%; margin-top: 10px;">
                    <div class="container">
                      <p>Nikki E. Ba-alan</p>
                      <p class="title">Data Scientist</p>
                      <i class="gmail">baalan.nikki.bscs2019@gmail.com</i>
                      <p><button class="button btn btn-primary" data-toggle="modal" data-target="#Nikki">Contact</button></p>
                    </div>
                  </center>
                </div>
              </div><!--column-->

              <div class="column">
                <div class="card" style="background-color: #9DC3E6;">
                  <center>
                    <img src="userDesigns/user_images/Alexander.png" alt="Alex" style="width:60%; margin-top: 10px;">
                    <div class="container">
                      <p>Alexander Caberto</p>
                      <p class="title">Data Scientist</p>
                      <i class="gmail">caberto.alexander.bscs2019@gmail.com</i>
                      <p><button class="button btn btn-primary" data-toggle="modal" data-target="#Alexander">Contact</button></p>
                    </div>
                  </center>
                </div>
              </div><!--column-->

            </div><!--row-->


            

      </div><!--content-->
      <footer>
        <div class="foots col-md-12 ">
          <div class="footer1 ">  
            <div class="logoBottom">
              <p class="logonameBot">Psico<label>terapia</label></p></div><p>
              Psicoterapia is an online booking site for professional care needed for mental health necessities. It also offers articles to help people fight against mental health problems.</p>
          </div><!--footer1-->
          <div class="footer1"> 
            <ul>  
              <p class="learn">LEARN MORE</p> 
              <a href="userGethelp.php" class="learn">Get Help</a> 
              <br><br>
              <a href="userVolunteer.php"class="learn">Volunteer</a>
              <br><br>
              <a href="#" class="learn" data-bs-toggle="modal" data-bs-target="#exampleModal">Donate</a><br>
            </ul>
          </div>
          <div class="footer1"> 
              <ul>  
              <p>Join us on:</p> 
              <a href="https://www.facebook.com/MentalHealthCenterNH/" class="facebook"><img src="userDesigns/user_images/facebook.png" style="height: 25px;"></a>
              <a href="https://www.instagram.com/mhcgm/" class="instagram"><img src="userDesigns/user_images/instagram.png" style="height: 25px;"></a>
              <a href="https://twitter.com/MentalHealthNH" class="twitter"><img src="userDesigns/user_images/twitter.png" style="height: 25px;"></a>
              </ul>
          </div>
        </div><!--foots-->
      </footer>

     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Donate</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                    

                    <div class="modal-body">
                      <div class="row">
                        <div class="col-50">
                          <div class="container" >
                            <form  action="donate.php" method="post" style="padding: 25px;">
                              <div class="row">
                                <div class="col-25">
                                  <h3>Psicoterapia Donate</h3> <br>
                                  <label class="lbl">Gcash Number</label>
                                  <p>Psicoterapia - 09563123116</p>
                                  <label  class="lbl">Visa</label>
                                  <p>4003830171874018</p>
                                  <label  class="lbl">Mastercard</label>
                                  <p>5496198584584769</p>
                                  <label class="lbl">JCB</label>
                                  <p>3530111333300000</p>
                                  <br>
                                </div>
                              </div>
                            </form>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div><!--modal footer-->
                          </div><!--modal container-->
                        </div><!--col-50-->
                      </div><!--row-->
                    </div><!--modal-body-->
                  
                </div>
              </div>
            </div> 

      <!--JACQUELINE-->
      <div class="modal fade" id="Jac">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Jacqueline Porral</h4>
              <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body"  style="padding-left: 40px; padding-right: 20px;">
              <div class="row" >
                <div class="profile" style="background-color: #4663E5; width: 40%; padding-bottom: 170px; padding-top: 23px;" >
                <center><img src="userDesigns/user_images/Jacqueline.png" style="width: 60%; height: 60%;">
                <br>
                <p class="name">Jacqueline C. Porral</p>
                <a href="https://www.facebook.com/jackdaisuki" class="follow" style="font-size: 1.5vmin">Follow on Facebook</a></center>
            </div>
            <div class="half container-fluid" style="background-color: transparent; width: 60%; height: 100px; float: right; padding-left: 20px; padding-right: 20px;" >
                <h4>Jacqueline's Information</h4>
                <p class="desc">Software Engineer</p>
                <p class="desc">Email: <i>porral.jacqueline.bscs2019@gmail.com</i></p>
                <p class="desc">A 20 years old 3rd Year female Student in University of Caloocan City taking up Bachelor of Science in Computer Science.
                  Backend Developer : PHP, C#, VB .net</p>
            </div>
              </div><!--row-->
            </div><!--modal body-->
          </div>
         </div>
        </div><!--modal fade-->

      <!--DANICA-->
      <div class="modal fade" id="Danica">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Danica Cabullo</h4>
              <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body"  style="padding-left: 40px; padding-right: 20px;">
              <div class="row" >
                <div class="profile" style="background-color: #4663E5; width: 40%; height: 100%; padding-bottom: 170px; padding-top: 23px;" >
                <center><img src="userDesigns/user_images/Danica.png" style="width: 60%; height: 60%;">
                <br>
                <p class="name">Danica O. Cabullo</p>
                <a href="https://www.facebook.com/danicabullo/" class="follow" style="font-size: 1.5vmin">Follow on Facebook</a></center>
            </div>
            <div class="half container-fluid" style="background-color: transparent; width: 60%; height: 100px; float: right; padding-left: 20px; padding-right: 20px; " >
                <h4>Danica's Information</h4>
                <p class="desc">Front-end Developer</p>
                <p class="desc">Email: <i>cabullo.danica.bscs2019@gmail.com</i></p>
                <p class="desc">A 21 years old 3rd Year Female Student in University of Caloocan City taking up Bachelor of Science in Computer Science.
                  Graphic Artist: Adobe Photoshop, Adobe Illustrator and Figma.
                  Front-end Developer : HTML, Javascript, CSS</p>
            </div>
              </div><!--row-->
            </div><!--modal body-->
          </div>
         </div>
        </div><!--modal fade-->

        <!--JEFFRIX-->
      <div class="modal fade" id="Jeffrix">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Jeffrix Briol</h4>
              <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body"  style="padding-left: 40px; padding-right: 20px;">
              <div class="row" >
                <div class="profile" style="background-color: #4663E5; width: 40%; padding-bottom: 170px; padding-top: 23px;" >
                <center><img src="userDesigns/user_images/Jeffrix.png" style="width: 60%; height: 60%;">
                <br>
                <p class="name">Jeffrix Briol</p>
                <a href="https://www.facebook.com/aaugust30" class="follow" style="font-size: 1.5vmin">Follow on Facebook</a></center>
            </div>
            <div class="half container-fluid" style="background-color: transparent; width: 60%; height: 100px; float: right; padding-left: 20px; padding-right: 20px; " >
                <h4>Jeffrix's Information</h4>
                <p class="desc">Software Developer</p>
                <p class="desc">Email: <i>briol.jeffrix.bscs2019@gmail.com</i></p>
                <p class="desc">A 23 years old 3rd year student in University of Caloocan City taking up Bachelor of Science in Computer Science. Software Developer: JavaFx, Java, Javascript, PHP, C#, C</p>
            </div>
              </div><!--row-->
            </div><!--modal body-->
          </div>
         </div>
        </div><!--modal fade-->

        <!--DEMVERLEEN-->
      <div class="modal fade" id="Demverleen">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Demverleen Espinola</h4>
              <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body"  style="padding-left: 40px; padding-right: 20px;">
              <div class="row" >
                <div class="profile" style="background-color: #4663E5; width: 40%; padding-bottom: 170px; padding-top: 23px;" >
                <center><img src="userDesigns/user_images/Demverleen.png" style="width: 60%; height: 60%;">
                <br>
                <p class="name">Demverleen Espinola</p>
                <a href="https://www.facebook.com/demverleenespinola" class="follow" style="font-size: 1.5vmin">Follow on Facebook</a></center>
            </div>
            <div class="half container-fluid" style="background-color: transparent; width: 60%; height: 100px; float: right; padding-left: 20px; padding-right: 20px; " >
                <h4>Demverleen's Information</h4>
                <p class="desc">Back-end Developer</p>
                <p class="desc">Email: <i>espinola.demverleen.bscs2019@gmail.com</i></p>
                <p class="desc">A 22 year old student from Bagong Silang Caloocan City. Currently taking Bachelor of Science in Computer Science at University of Caloocan City</p>
            </div>
              </div><!--row-->
            </div><!--modal body-->
          </div>
         </div>
        </div><!--modal fade-->

        <!--NIKKI-->
      <div class="modal fade" id="Nikki">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Nikki E. Ba-alan</h4>
              <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body"  style="padding-left: 40px; padding-right: 20px;">
              <div class="row" >
                <div class="profile" style="background-color: #4663E5; width: 40%; padding-bottom: 170px; padding-top: 23px;" >
                <center><img src="userDesigns/user_images/Nikki.png" style="width: 60%; height: 60%;">
                <br>
                <p class="name">Nikki E. Ba-alan</p>
                <a href="https://www.facebook.com/nikki.baalan.14/" class="follow" style="font-size: 1.5vmin">Follow on Facebook</a></center>
            </div>
            <div class="half container-fluid" style="background-color: transparent; width: 60%; height: 100px; float: right; padding-left: 20px; padding-right: 20px; " >
                <h4>Nikki's Information</h4>
                <p class="desc">Data Scientist</p>
                <p class="desc">Email: <i>baalan.nikki.bscs2019@gmail.com</i></p>
                <p class="desc">A 20 years old 3rd Year female Student in University of Caloocan City taking up Bachelor of Science in Computer Science.
                  Backend Developer : PHP, C#, VB .net</p>
            </div>
              </div><!--row-->
            </div><!--modal body-->
          </div>
         </div>
        </div><!--modal fade-->

        <!--ALEXANDER-->
      <div class="modal fade" id="Alexander">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Alexander Caberto</h4>
              <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body"  style="padding-left: 40px; padding-right: 20px;">
              <div class="row" >
                <div class="profile" style="background-color: #4663E5; width: 40%; padding-bottom: 170px; padding-top: 23px;" >
                <center><img src="userDesigns/user_images/Alexander.png" style="width: 60%; height: 60%;">
                <br>
                <p class="name">Alexander Caberto</p>
                <a href="https://www.facebook.com/AlexCaberto011" class="follow" style="font-size: 1.5vmin">Follow on Facebook</a></center>
            </div>
            <div class="half container-fluid" style="background-color: transparent; width: 60%; height: 100px; float: right; padding-left: 20px; padding-right: 20px; " >
                <h4>Alexander's Information</h4>
                <p class="desc">Data Scientist</p>
                <p class="desc">Email: <i>caberto.alexander.bscs2019@gmail.com</i></p>
                <p class="desc">Hello I am Alexander Caberto. Pursuing Computer Science and currently in 3rd Year College at the University of Caloocan City under of Computer Department.</p>
            </div>
              </div><!--row-->
            </div><!--modal body-->
          </div>
         </div>
        </div><!--modal fade-->

 <!-- </div><!--main-->
</body>
</html>