
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="login2.css">
        <link href="fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet">
        <title>patient login</title>
        <meta charset="UTF-8"/>
       
    </head>
    <body style="background-image: url(back1.jpeg); background-repeat: no-repeat;background-size: cover;">
        <div class="header">
            <img src="logo2.jpg">
            <h3>Benha Medical Center</h3>
            <div class="header-right">
                <a class="active" href="#"><i class="fa fa-mobile" aria-hidden="true"></i>
                    </i>16259</a>

            </div>
        </div>
        
        <div class="container" id="container">
            <div class="form-container sign-up-container">
            <form method='post' action=''>
            <?php 
            // Display Error message
            if(!empty($error_message)){
            ?>
            <div class="alert alert-danger">
              <strong>Error!</strong> <?= $error_message ?>
            </div>

            <?php
            }
            ?>

            <?php 
            // Display Success message
            if(!empty($success_message)){
            ?>
            <div class="alert alert-success">
              <strong>Success!</strong> <?= $success_message ?>
            </div>

            <?php
            }
            ?>
                    <h1>Create Account</h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <span>or use your email for registration</span>
                    <input type="text" class="form-control" placeholder="Username" name="username" id="username" required="required" maxlength="80">
                    <input type="email" class="form-control" placeholder="E-mail" name="email" id="email" required="required" maxlength="80">
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" required="required" maxlength="80">
                    <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" onkeyup='' required="required" maxlength="80">

                    <button type="submit" name="btnsignup" class="btn btn-default">Sign UP</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form role="form" method="post" action="login2.php" >
                    <h1>Sign in</h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <span>or use your account</span>
                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus> 
                    <input class="form-control" placeholder="Password" name="pass" type="password" value=""> 
                    <a href="recovery.php">Forgot your password?</a>
                    <button class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login" >Sign in</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>To keep connected with us please login with your personal info</p>
                        <button class="ghost" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <p>Enter your personal details and start journey with us</p>
                        <button class="ghost" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
        
      
        <script src="login2.js"></script>

    </body>
</html>


<?php  
  
include("config.php");  
  
if(isset($_POST['login']))  
{  
    $user_email=$_POST['email'];  
    $user_pass=$_POST['pass'];  
  
    $check_user="select * from patient WHERE email='$user_email'AND password='$user_pass'";  
  
    $run=mysqli_query($con,$check_user);  
  
    if(mysqli_num_rows($run))  
    {  
        echo "<script>window.open('dashboardpat.html','_self')</script>";  
  
        $_SESSION['email']=$user_email;//here session is used and value of $user_email store in $_SESSION.  
  
    }  
    else  
    {  
      echo "<script>alert('Email or password is incorrect!')</script>";  
    }  
}  
 
        $error_message = "";$success_message = "";
        
        // Register user
        if(isset($_POST['btnsignup'])){
           $username = trim($_POST['username']);
          
           $email = trim($_POST['email']);
           $password = trim($_POST['password']);
           $confirmpassword = trim($_POST['confirmpassword']);
        
           $isValid = true;
        
           // Check fields are empty or not
           if($username == '' || $email == '' || $password == '' || $confirmpassword == ''){
             $isValid = false;
             echo "<script>alert('Please fill all fields.')</script>";  
           }
       
        
           // Check if confirm password matching or not
           if($isValid && ($password != $confirmpassword) ){
             $isValid = false;
             echo "<script>alert('Confirm password not matching')</script>";  
           }
          
        
           // Check if Email-ID is valid or not
           if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
             $isValid = false;
             echo "<script>alert('Invalid Email-ID.')</script>"; 
           }
          
             
            
        
           if($isValid){
        
             // Check if Email-ID already exists
             $stmt = $con->prepare("SELECT * FROM patient WHERE email = ?");
             $stmt->bind_param("s", $email);
             $stmt->execute();
             $result = $stmt->get_result();
             $stmt->close();
             if($result->num_rows > 0){
               $isValid = false;
               
               echo "<script>alert('Email-ID is already existed.')</script>"; 
             }

        
           }
        
           // Insert records
           if($isValid){
             $insertSQL = "INSERT INTO patient(username,email,password ) values(?,?,?)";
             $stmt = $con->prepare($insertSQL);
             $stmt->bind_param("sss",$username,$email,$password);
             $stmt->execute();
             $stmt->close();
        
             $success_message = "Account created successfully1.";
             echo "<script>window.open(dashboardp.html','_self')</script>";  
           }
        }
        ?>