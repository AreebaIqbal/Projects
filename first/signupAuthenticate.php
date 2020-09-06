<?php
session_start();
$con = mysqli_connect('localhost','root','','registration');
if ( mysqli_connect_errno() ) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }

$fnam = $_POST['fname'];
$lnam = $_POST['lname'];
$mail = $_POST['email'];
$mobi = $_POST['mob'];
$pass = $_POST['password'];
$educ = $_POST['edu'];

$query = "SELECT * FROM `signup` WHERE Email = '$mail'";
$run = mysqli_query($con, $query);
$row = mysqli_num_rows($run);
if($row <1)
{
   $query = "INSERT INTO `signup` (`First Name`, `Name`, `Email`, `Password`, `Phone`, `Education`) VALUES ('$fnam', '$lnam', '$mail', '$pass', '$mobi', '$educ')";
   $run = mysqli_query($con, $query);
   
   $checkbox1=$_POST['skillsCheck'];  
   
   foreach($checkbox1 as $chk1)  
      {  
     // $chk .= $chk1.",";    
     $qry ="INSERT INTO `skills own` (`Email`, `Skills`) VALUES ('$mail', '$chk1')";
     $run = mysqli_query($con, $qry);

      }  
   $checkbox2=$_POST['skillsLearn'];  
        
      foreach($checkbox2 as $chk2)  
         {  
            //$chk3 .= $chk2.",";  
         $qry ="INSERT INTO `learning skills` (`Email`, `Learning Skills`) VALUES ('$mail', '$chk2')";
         $run = mysqli_query($con, $qry);
         }  
      
         ?> <script> 
         alert("Data Inserted Succesfully..!")
         window.open('index.html', '_self');
         </script>
         <?php
      
  
}
else{
 ?> <script> 
 alert("This Email is already Registered.")
window.open('index.html', '_self');
</script>
<?php
}


?>
