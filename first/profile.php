<?php
 session_start();

 $con = mysqli_connect('localhost','root','','registration');
 $qry = "SELECT * FROM `signup` WHERE Email='".$_SESSION['email']."' ";
 $run = mysqli_query($con , $qry);
 $row = mysqli_num_rows($run);

       if($row <1)
       { echo "Oops..! No Data Found"; }
       else{
        $row = mysqli_fetch_assoc($run);
       }

       $query2 = "SELECT * FROM `skills own` WHERE Email = '".$_SESSION['email']."' ";
       $run2 = mysqli_query($con, $query2);

       $query1 = "SELECT * FROM `learning skills` WHERE Email = '".$_SESSION['email']."' ";
       $run1 = mysqli_query($con, $query1);

       $query3 = "SELECT * FROM `feedback` WHERE UserTo = '".$_SESSION['email']."' ";
       $run3 = mysqli_query($con, $query3);
       $variable = 0

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
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
         .loggedin{
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
            background-color: rgb(231, 231, 233);
            color: #34495E;
         }
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
                .content{
                  
                  background-image: linear-gradient(to right, rgb(141, 199, 191), rgb(202, 175, 219), rgb(137, 176, 194));
                  background-image: linear-gradient(to right, rgb(179, 212, 208), rgb(234, 223, 241), rgb(190, 204, 211));
                  background-color: white;
                  margin: 6% 12%;
                  padding: 50px 100px;
                }
                .one{
                    width: 150px;
                }
                .two{
                    width: 700px;
                  
                }
                progress-bar{
                  background-color: black !important;
                }
                
           .accounts{
              margin-top: 150px;
              background-color: #252f3a;
              color: rgb(197,197,197);
              padding: 30px;
            }
            .info{
               margin-left: 100px;
            } 
            .info h5{
              text-decoration: underline;
            }
            .info a{
              color: rgb(143, 140, 140);
            }
            .footer{
              background-color: rgb(200, 196, 212);
              color: rgb(60, 62, 71);
              padding: 20px;
              text-align: center;
     
            }
            @media only screen and (max-width: 1200px) {
            .info{
              margin-left: 0px;
              margin-top: 8%;
            }
          }

    </style>
    
    </head>
    
    
	<body class="loggedin">

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
                <a class="nav-link" href="profile.php"><i class="fas fa-user-circle"></i>  Profile </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> LogOut </a>
            </li>
            </ul>
            </span>
        </div>
    </nav>
		
		<div class="content">
            <h1 id = "name"><?=$row['First Name'] .' ' .$row['Name']?> </h1>
            <?php
            
            while($data = mysqli_fetch_assoc($run3))
             {
                    $var = $data['Progress']; 
                    $variable = $variable + $var;
                    
             }
            ?>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?php echo $variable; ?>%" aria-valuenow =  "<?php echo $variable; ?>" aria-valuemin="0" aria-valuemax="10"></div>
            </div>
            
             <br>
			<div>
				<table cellspacing = '5' cellpadding = '5'>
                    <tr>
						<td class = "one"> <b> Email <b> </td>
						<td class="two"><?=$row['Email']?></td>
					</tr>
					
					<tr>
						<td  class = "one"> <b> Password </b></td>
						<td class="two"> <?=$row['Password']?></td>
                    </tr>
                    
                    <tr>
						<td class = "one"> <b> Phone </b></td>
						<td class="two"><?=$row['Phone']?></td>
                    </tr>
                    
                    <tr>
            <td  class = "one"><b> Skills </b></td>
            <td class="two">
            <?php
            
            while($data1 = mysqli_fetch_assoc($run1))
             {
                    echo $data1['Learning Skills']; 
                     echo " | ";
             }
            ?>
            </td>
					</tr>
                    
          <tr>
						<td  class = "one"><b> Learning Skills </b></td>
            <td class="two">
            <?php
            
            while($data2 = mysqli_fetch_assoc($run2))
             {
                    echo $data2['Skills']; 
                    echo " | ";
             }
            ?>
            </td>
          </tr>
                    
           
                    
				</table>
			</div>
        </div>
        <div class="accounts">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-3 acc_start">
      <h3> <i class="fas fa-chalkboard-teacher" style="font-size: 24px;"></i> SkillsForSkills </h3>
      &nbsp &nbsp <i class="fas fa-phone-square"></i> &nbsp 030-53993864 <br>
      &nbsp &nbsp <i class="fas fa-phone-square"></i> &nbsp 033-32747983 <br>
      &nbsp &nbsp  <i class="fas fa-envelope"></i> &nbsp SkillsForSkills@gmail.com <br>
     

    </div>

    <div class="col-xs-12 col-sm-12 col-md-3 info">
      <h5> Follow Us on </h5>
      <i class="fab fa-facebook-square" style="font-size: 24px;"></i> &nbsp
      <i class="fab fa-twitter-square" style="font-size: 24px; "></i> &nbsp
      <i class="fab fa-instagram" style="font-size: 24px;"></i>  &nbsp
      <i class="fab fa-linkedin" style="font-size: 24px;"></i>  &nbsp
    
    </div>

    <div class="col-xs-12 col-sm-12 col-md-3 info">
    <h5> Customer Care</h5> 
      <a href="contact.html"> Contact Us</a> <br>
      <a href="#"> Terms and Conditions</a>
    </div>
  </div>
  
</div>

<div class="footer">
@ Copyright MUET CSE 17CS22, 17CS23, 17CS24
</div>
	</body>
</html>