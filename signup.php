<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login and Registration Form in HTML | CodingNepal</title>
	  <link rel="stylesheet" href="signup.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
   <?php
   session_start();
   require_once('connection.php');
   if(isset($_POST['login'])){
      $email=$_POST['email'];
      $pass=$_POST['pass'];

      if(empty($email)|| empty($pass))
      {
          echo '<script>alert("please fill the blanks")</script>';
      }
      else{
          $query="select *from users where EMAIL='$email'";
          $res=mysqli_query($con,$query);
          if($row=mysqli_fetch_assoc($res)){
              $db_password = $row['PASSWORD'];
              if($pass  == $db_password)
              {
                  $_SESSION['email'] = $email;
                  echo '<script>alert("Welcome ADMINISTRATOR!");</script>';
                  if(isset($_SESSION['email'])){
                  header("location: index.php");    
                  }
              }
              else{
                  echo '<script>alert("Enter a proper password")</script>';
              }
          }
          else{
              echo '<script>alert("enter a proper email")</script>';
          }
      }
  }
     
  

 //sign up new user
 


if(isset($_POST['regs']))
{
    $fname=mysqli_real_escape_string($con,$_POST['fname']);
    $lname=mysqli_real_escape_string($con,$_POST['lname']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $lic=mysqli_real_escape_string($con,$_POST['lic']);
    $ph=mysqli_real_escape_string($con,$_POST['ph']);
   
    $pass=mysqli_real_escape_string($con,$_POST['pass']);
    $cpass=mysqli_real_escape_string($con,$_POST['cpass']);
    $Pass=md5($pass);
    if(empty($fname)|| empty($lname)|| empty($email)|| empty($lic)|| empty($ph)|| empty($pass))
    {
        echo '<script>alert("please fill the place")</script>';
    }
    else{
        if($pass==$cpass){
        $sql2="SELECT *from `users` where EMAIL='$email'";
        $res=mysqli_query($con,$sql2);
        if(mysqli_num_rows($res)>0){
            echo '<script>alert("EMAIL ALREADY EXISTS PRESS OK FOR LOGIN!!")</script>';
            echo '<script> window.location.href = "index.php";</script>';

        }
        else{
        $sql="insert into `users` (FNAME,LNAME,EMAIL,LIC_NUM,PHONE_NUMBER,PASSWORD) values('$fname','$lname','$email','$lic',$ph,'$Pass')";
        $result = mysqli_query($con,$sql);
          
        if($result){
            echo '<script>alert("Registration Successful Press ok to login")</script>';
            echo '<script> window.location.href = "index.php";</script>';       
           }
        else{
            echo '<script>alert("please check the connection")</script>';
        }
    
        }

        }
        else{
            echo '<script>alert("PASSWORD DID NOT MATCH")</script>';
            echo '<script> window.location.href = "register.php";</script>';
        }
    }
}


?>


<div class="wrapper">
        <img src="images/Logo.png" class="center">
         <div class="title-text">
            <div class="title login">
               Login Form
            </div>
            <div class="title signup">
               Signup Form
            </div>
         </div>
         <div class="form-container">
            <div class="slide-controls">
               <input type="radio" name="slide" id="login" checked>
               <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">Login</label>
               <label for="signup" class="slide signup">Signup</label>
               <div class="slider-tab"></div>
            </div>
            <!-- LOGIN PAGE -->
            <div class="form-inner">
               <form method="POST" class="login">
                  <div class="field">
                     <input type="text" name="email" placeholder="Email Address" required>
                  </div>
                  <div class="field">
                     <input type="text" name="pass" placeholder="Password" required>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" name="login" value="Login">
               </div>
        


                  <div class="signup-link">
                     Login as a admin? <a href="adminlogin.php">ADMIN</a>
                  </div>
               </form>
               <form method="POST" class="signup">
                  <div class="field">
                     <input type="text" name="fname" placeholder="FNAME" required>
                  </div>
                  <div class="field">
                     <input type="text" name="lname" placeholder="LNAME" required>
                  </div>
                  <div class="field">
                     <input type="text" name="email" placeholder="EMAIL" required>
                  </div>
                  <div class="field">
                     <input type="text" name="lic" placeholder="LIC_NUM" required>
                  </div>
                  <div class="field">
                     <input type="text" name="ph" placeholder="PHONE_NUMBER" required>
                  </div>
                  <div class="field">
                     <input type="password" name="pass" placeholder="PASSWORD" required>
                  </div>
                  <div class="field">
                     <input type="password" name="cpass" placeholder="CONFIRM PASSWORD" required>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     
                     <input type="submit" name="regs" value="Signup">
                     
                  </div>
               </form>
            </div>
         </div>
      </div>

      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });
      </script>
   </body>
</html>