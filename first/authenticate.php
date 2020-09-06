<?php
  
   session_start();
   $con = mysqli_connect('localhost','root','','registration');
   if(isset($_POST['signin']))
   {
      
       $mail = $_POST['email'];
       $pass = $_POST['password'];
       $name = $_POST['fname'];

       $qry = "SELECT * FROM `signup` WHERE Email = '$mail' AND Password = '$pass'";
       $run = mysqli_query($con , $qry);
       $row = mysqli_num_rows($run);
       if($row <1)
       {
       ?> <script> 
       alert("Incorrect Email Or Password");
       window.open('index.html', '_self');
       </script>
       <?php
    
   }
    else{
        $_SESSION['email'] = $mail;
        $_SESSION['pswrd'] = $pass;
        ?> <script> 
       window.open('home.html', '_self');
       </script>
       <?php
    }
}
?>
