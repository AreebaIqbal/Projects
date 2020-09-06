<?php
    session_start();
    error_reporting(0);
 ?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
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
            .navbar{
	          padding: 5px 8px !important;
            }
        .navbar-brand{
            color:   rgb(212, 212, 216) !important;
            font-size: 28px;
            font-weight: bolder;
        }
        .nav-link {
                font-size: 18px;
                font-weight: 600;
                color:ghostwhite !important;
                margin: 5px;
                padding: 5px !important;
            }
            .nav-link:hover{
                color: rgb(212, 212, 216) !important;
                transition: .5s;
                
                text-decoration: underline;
            }

            #scroll_messages{
                max-height: 300px;
                height: 300px;
                overflow: scroll;
                padding: 3% 5%;
                margin: 2% 0% 2% 0%;
               
            }
          
            #select_user{
                height: 490px;
                max-height: 500px;
                overflow: scroll;
                background-color: #667292;
                padding: 30px 20px;
                margin: 1% 0% 2% 13% ;
                color: ghostwhite;
            }
           
           
            #green{
                background-color: #b9b0b0;
                border-color: #27ae60;
                width: 45%;
                padding: 10px;
                font-size: 16px;
                border-radius: 20px;
                float: right;
                margin-bottom: 5px;
                
            }
            #blue{
                background-color: #e4d1d1;
                border-color: #2980b9;
                width: 45%;
                margin-bottom: 5px;
                font-size: 16px;
                border-radius: 20px;
                float: left;
                padding: 10px;
            }
            
            .content {
            display: flex;
            flex-direction: row;
            align-items: center;
            }
            .chatarea{
                margin-top: 2%;
                background-color: #667292;
                padding: 15px 20px;
                color: ghostwhite;
                
            }
            .feedarea{
                padding-top: 7px;
                float: right;
                color: rgb(200, 196, 212);
                font-size: 18px;
               
            }.feedarea:hover{
                color:white;
            }
            .container-fluid{
                color: ghostwhite;
            }
           
            #txtArea{
                background-color: antiquewhite;
                border: 1px solid black;
                flex: 12;
                margin-right: 1%;
            }
         l #buttons{
                margin-left: 2%;
                
                flex: 1;
            }
          hr{
              background-color: rgb(200, 196, 212);
          }

        </style>
		
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: #34495E !important;">
    <a class="navbar-brand" href="#"><i class="fas fa-chalkboard-teacher" style="font-size: 24px;"></i> SkillsForSkills &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="home.html">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="connection.php">Connections</a>
        </li>
        <li class="nav-item">
                <a class="nav-link" href="chat1.php">Chat</a>
            </li>
        <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact Us</a>
        </li>
        </ul>
        <span class="navbar-text">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="profile.php"><i class="fas fa-user-circle"></i> Profile </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i>  LogOut </a>
        </li>
        </ul>
        </span>
    </div>
</nav>

<div class="row" style = "background-color: rgb(231, 231, 233);">

<?php
    
    $con = mysqli_connect('localhost','root','','registration');
    if(isset($_GET['u_email'])){
        global $con;
        $get_email = $_GET['u_email'];
        $get_user = "SELECT * FROM `signup` WHERE Email = '$get_email'";
        $run_user = mysqli_query($con, $get_user);
        $row_user = mysqli_fetch_array($run_user);

        $user_to_msg = $row_user['Email'];
        $user_to_name = $row_user['First Name'];
    }

    $user = $_SESSION['email'];
    $get_user = "SELECT * FROM `signup` WHERE Email = '$user'";
    $run_user = mysqli_query($con, $get_user);
        $row_user = mysqli_fetch_array($run_user);

        $user_from_msg = $row_user['Email'];
        $user_from_name = $row_user['First Name'];

?>
        <div class = "col-sm-3" id="select_user">
        
         <h2 style= "color: rgb(200, 196, 212)" ><i class="fas fa-user-circle"></i>&nbsp<?= $user_from_name ?></h2><hr>
         <?php 
        $user = "SELECT * FROM `connection` WHERE Email1 = '$user'";
        $run_users = mysqli_query($con, $user);
        while($run =  mysqli_fetch_array($run_users)){
            $user_email = $run['Email2'];
            $user_name =  $run['Name2'];
            echo "
                <div class='container-fluid'>
                <i style = 'font-size: 42px' class='image-circle fas fa-user'></i>
                
                <a style = 'text-decoration: none; cursor:pointer; font-size: 18px;  color: ghostwhite;' href = 'chat1.php?u_email=$user_email'> <strong> &nbsp $user_name </strong></a>
                <br><br>
                </div>
            ";
        } ?>
        </div>
        <div class = "col-sm-6 ">
         
            
                <?php
                $sel_msg = "SELECT * FROM `user_messages` WHERE (user_to = '$user_to_msg'
                AND user_from = '$user_from_msg') OR (user_from = '$user_to_msg'
                AND user_to = '$user_from_msg') ORDER by 1 ASC";
                $_SESSION['user_to'] = $user_to_msg;
                $_SESSION['user_from'] = $user_from_msg;
                $_SESSION['user_to_name'] = $user_to_name;
                $run_msg = mysqli_query($con, $sel_msg);?>
                <h3 class = 'chatarea'><i class="fas fa-user-circle"></i>&nbsp<?= $user_to_name ?> 
                   <?php
                    if(  $user_to_name != ""){
                        echo "
                        
                        <a class = 'feedarea' href='feedback.php'><i class='fas fa-comment-dots'></i> FeedBack</a>
                        ";
                    } ?>
                  
                </h3>
                
                <div class = "load_msg" id = "scroll_messages">
                <?php
                while($row_msg = mysqli_fetch_array($run_msg)){
                    $user_to = $row_msg['user_to'];
                    $user_from = $row_msg['user_from'];
                    $msg_body = $row_msg['msg_body'];
                    $msg_date = $row_msg['date'];
                    ?>
                    <div>
                   
                        <p><?php if($user_to == $user_to_msg AND $user_from == $user_from_msg){
                        echo "
                        <div class = 'message' data-toggle = 'tooltip' title = '$msg_date'id='green'>
                        $msg_body
                        </div> <br> <br>
                        ";
                        }
                        else if($user_from == $user_to_msg AND $user_to == $user_from_msg){
                        echo "
                        <div class = 'message' id='blue' data-toggle = 'tooltip' title = '$msg_date'>
                        $msg_body
                        </div> <br><br>
                        ";
                        }
                        ?>
                        </p>
                </div>
                <?php
                }
                ?>
    </div>
    <?php
    if(isset($_GET[u_email])){
        $u_email = $_GET['u_email'];
        if($u_email=="new")
        {
            echo"
            <form>
            <center> <h2> SELECT SOMEONE TO START CONVERSATION! </h2></center>
            <textarea class = 'form-control' disabled placeholder='Enter your Message'> </textarea>
            <input class= 'btn btn-default' disabled type='submit' value = 'Send'>
            </form><br><br>
            ";
        }
        else{
            echo"
            <form action = '' method='POST'>
            <div class='content'>
             <div id='txtArea' >
              <textarea id= 'message_textarea' class = 'form-control' name='msg_box' > </textarea>
             </div>
            <div id='buttons'>
             
             <button type='submit' name = 'send_msg' id= 'btn-msg'> <i class='fas fa-paper-plane' style= 'font-size: 38px;'></i> </button>
           </div>
          </div>
        
            
     </form><br><br>
            ";
        }
    }
    ?>
    <?php
      if(isset($_POST['send_msg'])){
          $msg = htmlentities($_POST['msg_box']);
          if($msg == ""){
              echo "unable to send message";
          }
          else{
              $insert = "INSERT INTO `user_messages`(`user_to`, `user_from`, `msg_body`, `date`, `msg_seen`) VALUES ('$user_to_msg','$user_from_msg', '$msg', NOW(),'no')";
              $run_insert = mysqli_query($con, $insert);
          }
      }

    ?>
    </div>
    </div> 


    <script>
        var div = document.getElementById("scroll_messages");
        div.scrollTop = div.scrollHeight;
    </script>
</body>
</html>