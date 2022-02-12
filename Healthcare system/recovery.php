
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
                   
                    <div class="social-container">
                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    
                    <input type="text" class="form-control" placeholder="Username" name="username" id="username" required="required" maxlength="80">
                    <input type="email" class="form-control" placeholder="E-mail" name="email" id="email" required="required" maxlength="80">
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" required="required" maxlength="80">
                    <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" onkeyup='' required="required" maxlength="80">

                    <button type="submit" name="btnsignup" class="btn btn-default">Sign UP</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form role="form" method="post" action="recovery.php" >
                    <h1>Reset Password</h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                   
                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus> 
                    <input class="form-control" placeholder="verification code" name="code" type="text" autofocus> 
                    <input class="form-control" placeholder="New Password" name="pass" type="password" value=""> 

                   
                    <button class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login" >Reset</button>
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
                    </div>
                </div>
            </div>
        </div>
        
      
        <script src="login2.js"></script>

    </body>
</html>


<?php  
  
include("config.php");  
  

 
        
        
        // Register user
        if(isset($_POST['login'])){
          
          
           $email = trim($_POST['email']);
           $password = trim($_POST['pass']);
           
        
           $isValid = true;
        
           // Check fields are empty or not
           if($email == '' || $password == ''){
             $isValid = false;
             echo "<script>alert('Please fill all fields.')</script>";  
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
               $isValid = true;
               
               
             }
             else{
                  echo "<script>alert('Email-ID is not  existed.')</script>";
             }

        
           }
        
           // Insert records
           if($isValid){
            $edit = mysqli_query($con,"update patient set password='$password' where email='$email'");
            
            
             $success_message = "Account created successfully1.";
             echo "<script>window.open(dashboardp.html','_self')</script>";  
           }
        }
        ?>