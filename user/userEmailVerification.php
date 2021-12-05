<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
       <script src="./removeBanner.js"></script>
  <title>Psicoterapia | Verify Email</title>
  <link rel="icon" type="png" href="userDesigns/user_images/noLabelLogo.png">
   <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

</head>
<body style="background-color: #F1F3FF;">
    <style type="text/css">
        .containerr{
             background-color: #F1F3FF;
            border-radius: 25px;
            margin:0px;
            height:890px;
            margin-left: 140px;
            margin-right: 140px;
            margin-top: 3%;
            margin-bottom: 3%;
            padding-bottom: -50px;
        }
        body {
            background-color: #9DC3E6;
            font-family: Poppins;
            }
            ::-webkit-scrollbar {
                width: 0px;
                background: transparent; /* make scrollbar transparent */

            }
            .logo {
              color: #4E4F62;
              line-height: 90px;
              font-size: 30pt;
              font-weight: bold;
              text-decoration: none;
              margin-left: 30px;
              font-family: "Roboto", sans-serif;
             
            background-color: transparent;
            background-image: url(userDesigns/user_images/noLabelLogo.png);
            background-repeat: no-repeat;
            background-size: 50px;
            }
            label{
            color: #485EAB;
        }
        .psico{
            margin-left: 50px;
            color: #464755;
        }
        .cont{
            background-color:  #F1F3FF;
  width: 30%;
  height: auto;
    padding: 1% 2% 1% 1%;
    border-radius: 9px;
    margin: auto;
    min-width: 300px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    flex-direction: row;
    justify-content: space-around;
    flex-flow: wrap;
    margin-top: 20px;
    font-family: Poppins;
        }
        #btn_reset{
          margin-left: -25px;
          font-size: 10pt;
        }
         @media (max-width: 1360px) {
           #btn_reset{
            margin-left: -5px;
           }
         }
        form{
          margin-left: 50px;
        }
        h2{
            text-align: center;
            padding-top:  20px;
            color: #404040;
            font-size: 20pt;
        }
        .time{
            width: 25px;
            height: 25px;

        }
        .tm{
            text-align: left;
            font-size: 15pt;    
            color: #5A74E8;

        }
        .tms{
            text-align: left;
            font-size: 15pt;    
            color: black;

        }
        .clinic{
            margin-left: 30px;
            font-size: 15pt;
            color: black;
        }
        input[type=submit]{
            border: none;   
            border-radius: 5px;
          width: 30%;
          height: 40px;
          text-align: center;
          background-color: #4663E5;
          color: white;
          font-size: 15px;
          font-family: Poppins;
          margin-top: 25px;
          cursor: pointer;
        }
        input[type=text]{
            width: 70%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
            height: 25px;
            font-family: Poppins;
        }
        p{
            font-size: 12pt;
        }


  .logo {
    color: #4E4F62;
    line-height: 90px;
    font-size: 30pt;
    font-weight: bold;
    text-decoration: none;
    margin-left: 30px;
    font-family: "Roboto", sans-serif;
    background-color: transparent;
    background-image: url(images/noLabelLogo.png);
    background-repeat: no-repeat;
    background-size: 50px;
  }
  img{
    width: auto;
    height: 300px;
    padding-left: auto;
    padding-right: auto;
    display: block;
    margin-left: auto;
  margin-right: auto;
  }
  a{
    color: #627AE9;
  }

    </style>
     
      <!--<div class="containerr">-->
        <a href="index.php" class="logo"><label class="psico">Psico</label><label>terapia</label></a>
        <div class="cont">
          <h2>Verify your email</h2>
        <img src="userDesigns/user_images/withTablet.png" alt="With Tablet">
        <form method="POST" id="signupform" action="userAction.php">
         <?php 
            if(isset($_SESSION['error'])){ 
            $error = $_SESSION['error']; ?>
            <h4 style="color: red; margin-left: auto; padding-left: 0px;"> <?php  echo $_SESSION['error'] ?></h4>
        <?php } ?>

          <p style="margin-bottom: 1px;">Enter Verification Code</p>
          <input type="text" id="otp"  name="otp" autofocus="" autocapitalize="none" autocomplete="email" placeholder="6-Digit Code" ondrop="return false;" onpaste="return false;">
          <input type="submit" name="btn_emailVerify" id="btn_emailVerify" value="Verify">
          <!-- <p style="margin-top: 20px; font-size: 13px;" >Didn't get the OTP code? <a href="" name="btn_reset" id="btn_reset">Click here</a></p> -->

          <p style="margin-top: 0px; font-size: 13px;" >Didn't get the OTP code?  <input style="background: none; color: blue;"type="submit" name="btn_reset" id="btn_reset" value="Click here"></p>
            
        </form>

        </div>
       
  <!--</div>-->
</body>
</html>
<?php
    unset($_SESSION["error"]);
?>