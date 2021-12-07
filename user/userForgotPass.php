<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <script src="./removeBanner.js"></script>
  <title>Psicoterapia | Forgot Password</title>
  <link rel="icon" type="png" href="userDesigns/user_images/noLabelLogo.png">
   <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

</head>
<body>
    <style type="text/css">
        .containerr{
            background-color: #F1F3FF;
            border-radius: 25px;
            margin:0px;
            height:950px;
            margin-left: 140px;
            margin-right: 140px;
            margin-top: 3%;
            margin-bottom: 500px;
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
            background-color: #FAFBFC;
            border-radius: 25px;
            margin:0px;
            height:80%;
            width: 25%;
            margin-left: 140px;
            margin-right: 140px;
            margin-bottom: 50px;
            padding-left: 50px;
            padding-right: 50px;
            margin-top: -60px;
            padding-bottom: 30px;
            transform: translate(80%,10%);
            box-shadow: rgba(0, 0, 0, 0.09) 0px 3px 12px;
            
        }
        p{
            font-size: 15pt;
        }
        h2{
            text-align: center;
            padding-top:  50px;
            color: #404040;
            font-size: 25pt;
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
          width: 50%;
          height: 60px;
          text-align: center;
          background-color: #4663E5;
          color: white;
          font-size: 15px;
          font-family: Poppins;
          margin-top: 30px;
          cursor: pointer;
          margin-bottom: 10px;
        }
        input[type=text]{
            width: 100%;
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
    background-image: url(userDesigns/user_images/noLabelLogo.png);
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
  
  <div class="containerr">
        </label>
        <a href="index.html" class="logo"><label class="psico">Psico</label><label>terapia</label></a>
        <div class="cont">
          <h2>Forgot Password</h2>
          
            
        <img src="userDesigns/user_images/withTablet.png" alt="With Tablet">
        <form method="POST" id="signupform" action="userAction.php">
         <?php 
            if(isset($_SESSION['error'])){ 
            $error = $_SESSION['error']; ?>
            <h4 style="color: red; margin-left: auto; padding-left: 0px;"> <?php  echo $_SESSION['error'] ?></h4>
        <?php } ?>
          <p style="margin-bottom: 1px;">Email Address</p>
          <input type="text" name="email" autofocus="" autocapitalize="none" autocomplete="email" required="" id="email" placeholder="Email">
          
          <input type="submit" name="btnSendCode" id="btnSendCode" value="Send OTP Code"></button>
          <p style="margin-top: 20px; font-size: 13px;">Signin instead? <a href="userLogin.php">Click here</a></p>
          <p style="font-size: 13px;">New Account? <a href="userSignup.php">Register here</a></p>
</form>

        </div>
       
  </div>

</body>
</html>
<?php
    unset($_SESSION["error"]);
?>