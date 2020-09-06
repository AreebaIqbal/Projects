                       
<?php
session_start();



?>
<html>
<head>
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
      @import url(https://fonts.googleapis.com/css?family=Exo+2:200i);

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
            #start{
          background-color: rgb(231, 231, 233);
          margin: 0%;
          padding: 2% 0%;
         
        }
        
        .conn{
          box-shadow: 2px 2px 10px grey;
          background-color: #1e2958;
          padding: 20px 30px;
          margin: 7% 5%;
          color: ghostwhite;
          color: rgb(197, 197, 197);
        }
        td{
          color: ghostwhite;
           color: rgb(197, 197, 197);
        }
        hr{
          background-color: rgb(197, 197, 197);
         
        }
        
  :root {
   
  
  /* Set neon color */
  --neon-text-color: #f40;
  --neon-border-color: #08f;
}


#connection{
  font-family: 'Exo 2', sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;  
  text-align: center;
  padding-top: 50px;
}

h1 {
  font-size: 32px;
  font-weight: 200;
  font-style: italic;
  color: #fff;
  padding: 15px;
  border: 0.4rem solid #fff;
  border-radius: 2rem;
  text-transform: uppercase;
  animation: flicker 1.5s infinite alternate;     
}

h1::-moz-selection {
  background-color: var(--neon-border-color);
  color: var(--neon-text-color);
}

h1::selection {
  background-color: var(--neon-border-color);
  color: var(--neon-text-color);
}

h1:focus {
  outline: none;
}

           .accounts{
			        margin-top: 150px;
              background-color: #252f3a !important;
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
          

/* Animate neon flicker */
@keyframes flicker {
    
    0%, 19%, 21%, 23%, 25%, 54%, 56%, 100% {
      
        text-shadow:
            -0.2rem -0.2rem 1rem #fff,
            0.2rem 0.2rem 1rem #fff,
            0 0 2rem var(--neon-text-color),
            0 0 4rem var(--neon-text-color),
            0 0 6rem var(--neon-text-color),
            0 0 8rem var(--neon-text-color),
            0 0 10rem var(--neon-text-color);
        
        box-shadow:
            0 0 .5rem #fff,
            inset 0 0 .5rem #fff,
            0 0 2rem var(--neon-border-color),
            inset 0 0 2rem var(--neon-border-color),
            0 0 4rem var(--neon-border-color),
            inset 0 0 4rem var(--neon-border-color);        
    }
    
    20%, 24%, 55% {        
        text-shadow: none;
        box-shadow: none;
    }    
}
@media only screen and (max-width: 1200px) {
            .info{
              margin-left: 0px;
              margin-top: 8%;
            }
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
<div id = "start">

<?php
$con = mysqli_connect('localhost','root','','registration');
$query1 = "SELECT * FROM `learning skills` where Email = '".$_SESSION['email']."' ";
$run1 = mysqli_query($con, $query1);

if($run1 == TRUE)
{ 
while($data1 = mysqli_fetch_assoc($run1))
{  $query2 = "SELECT * FROM `skills own`";
    $run2 = mysqli_query($con,$query2);
    
    while ( $data2 = mysqli_fetch_assoc($run2))
    {
        if ($data2['Skills'] == $data1['Learning Skills'])
        {
            $email = $data2['Email'];
            //echo $email;
            $query3 = "SELECT * FROM `learning skills` where Email = '$email' ";
            $run3 = mysqli_query($con, $query3);
            $slide = "SELECT * FROM `signup` where Email = '$email' ";
            $sliderun=mysqli_query($con, $slide);
            $row = mysqli_fetch_assoc($sliderun);

            $slide1 = "SELECT * FROM `signup` where Email = '".$_SESSION['email']."' ";
            $sliderun1=mysqli_query($con, $slide1);
            $row1 = mysqli_fetch_assoc($sliderun1);
            
           while($data3 = mysqli_fetch_assoc($run3))
            {  $query4 = "SELECT * FROM `skills own` where Email = '".$_SESSION['email']."' ";
               $run4 = mysqli_query($con,$query4);
    
               while ( $data4 = mysqli_fetch_assoc($run4))
               {
                if ($data4['Skills'] == $data3['Learning Skills']){
                  $email1 = $_SESSION['email'];
                  $name1 = $row1['First Name'] .' ' .$row1['Name'];
                  $name2 = $row['First Name'] .' ' .$row['Name'];
                  $skills1 = $data4['Skills'];
                  $learningskills1 = $data1['Learning Skills'];
                  $skills2 = $data2['Skills'];
                  $learningskills2 = $data3['Learning Skills'];
                  $insert = "INSERT INTO `connection`(`Email1`, `Name1` ,`Skill1`, `LearningSkill1`, `Email2`, `Name2`, `Skill2`, `LearningSkill2`) VALUES ('$email1', '$name1', '$learningskills1', '$skills1', '$email', '$name2', '$learningskills2', '$skills2')";
                  $run_insert = mysqli_query($con, $insert);
                  $del = "delete t1 FROM `connection` t1 INNER  JOIN `connection` t2 WHERE t1.id < t2.id AND  t1.Email1 = t2.Email1 AND  t1.Skill1 = t2.Skill1 AND t1.LearningSkill1 = t2.LearningSkill1 AND t1.Email2 = t2.Email2 AND  t1.Skill2 = t2.Skill2 AND t1.LearningSkill2 = t2.LearningSkill2";
               $run_del = mysqli_query($con, $del);
            ?> 
            
                <div class="row conn">
                  <div class="col-lg-4 col-md-12">
                  <h1 id = "name"><?=$row['First Name'] .' ' .$row['Name']?></h1>
                     <br>
                      <table cellspacing = '5' cellpadding = '5'>
                            <tr>
                              <td class = "one"> <b> Email <b> </td>
                              <td class="two"><?=$row['Email']?> </td>
                            </tr>
                           
                                      
                          <tr>
                              <td class = "one"> <b> Phone </b></td>
                              <td class="two"><?=$row['Phone']?></td>
                          </tr>
                                      
                           <tr>
                              <td  class = "one"><b> Skills </b></td>
                              <td class="two">
                              <?=$data2['Skills']?>
                              </td>
                            </tr>
                                      
                            <tr>
                              <td  class = "one"><b> Learning Skills </b></td>
                              <td class="two">
                              <?=$data3['Learning Skills']?>
                              </td>
                            </tr>
                      </table>         
                  </div>
                  <div class="col-lg-4 col-md-12 connection ">
                   <div id="connection">
                      <h1 contenteditable spellcheck="false">Connection <br>  Match</h1>
                   </div>
                  </div>
                  <div class="col-lg-4 col-md-12">
                  <h1 id = "name"><?=$row1['First Name'] .' ' .$row1['Name']?></h1>
                       <br>
                      <table cellspacing = '5' cellpadding = '5'>
                          <tr>
                              <td class = "one"> <b> Email <b> </td>
                              <td class="two"><?=$row1['Email']?> </td>
                          </tr>
                               
                          <tr>
                              <td class = "one"> <b> Phone </b></td>
                              <td class="two"><?=$row1['Phone']?></td>
                          </tr>
                                      
                           <tr>
                              <td  class = "one"><b> Learning Skills </b></td>
                              <td class="two">
                              <?=$data1['Learning Skills']?>
                              </td>
                            </tr>
                                      
                            <tr>
                              <td  class = "one"><b> Skills </b></td>
                              <td class="two">
                              <?=$data4['Skills']?>
                              </td>
                            </tr>
                            
                      </table> 
                  </div>

                </div>
                     
                      
                              
                      
                            <?php
                             
                    }
                   }
                }

            }
        }
    }
}


     
     
        ?>
        <script>
        function cancel(e)
{
    var elem = document.getElementById("rmv");
    elem.parentNode.removeChild(elem);
   // e.parentNode.parentNode.parentNode.parentNode.remove();
}
   function con()
{
    alert("hi");
    document.getElementById("rmv").style.backgroundColor = 'rgb(24,224,224)';
}
</script>
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
 </html> 




