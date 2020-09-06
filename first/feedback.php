<?php
    session_start();
    error_reporting(0);  
    $con = mysqli_connect('localhost','root','','registration');
 ?> 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FeedBack</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
		integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
		integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
		integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
		crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
		integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>


    <style>
      body{
          text-align: center;
      }
      .container-fluid{
          padding: 2%;
          background-color: #34495E;
          color: ghostwhite;
      }
      input[type="number"]{
          width: 30%;
          padding: 10px;
          background-color: rgb(231, 231, 233);
      }

      a{
          border: 1px solid #34495E;
          border-style: outset;
          padding: 7px 25px;
          color: #34495E;
          font-weight: bold;
          background-color: #90a3b8;
      }
      a:hover{
          text-decoration: none;
          background-color: rgb(191, 197, 218);
      }
    </style>

</head>
<body>
    <div class = "container-fluid">
    <h1 style= "font-size: 3.5em">FeedBack</h1>
    <img src="https://capeholidays.info/files/capeholidaysreviewsandtestimonials.png" alt="">
    <h4>
    On a scale from 1-10 what would you rate <?= $_SESSION['user_to_name']?>?
    <br> <br>
    </h4>
    <form action="" method="POST">
       <input type="number" name = "feedback" placeholder = "Enter your FeedBack" required="required">
       <br> <br>
       
       <a href="feedSubmit.html" name ="submit">Submit</a>
    </form>
    
    </div>
    
</body>

<?php

if(isset($_POST['submit']))
   {
     
       $prog = $_POST['feedback'];
       $userTo =  $_SESSION['user_to'];
       $userFrom =  $_SESSION['user_from'];
       $query = "INSERT INTO `feedback` (`UserTo`, `UserFrom`, `Progress`, `Date`) VALUES ('$userTo', '$userFrom', '$prog', NOW())";
       $run = mysqli_query($con, $query);

   }

?>