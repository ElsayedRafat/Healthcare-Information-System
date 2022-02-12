<?php

require_once('machine-learning.php');

if(isset($_POST['submit-img'])){
    $extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
    $dst_fname =  getcwd() . '/brain_images/' . time() . uniqid(rand()) . '.' . $extension;
    $dst_fname = str_replace('\\', '/', $dst_fname);
    move_uploaded_file($_FILES["img"]["tmp_name"],  $dst_fname);
    $result = classify_image($dst_fname);
} else {
    header("Location: classification.php");
    exit();
}

?>



<!DOCTYPE html>
<html>
    <head>
        <title>HMIS</title>
        <link href="css/phpstyle.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" />
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        
        <style>
            table, td, th {
                border: 1px solid black;
            }
            table {
                border-collapse: collapse;
                text-align: center;
            }
            th {
                text-align: right;
                
                background-color:#76D1F3 ;
                text-align: center;
            }
            th, td {
                padding: 10px;
                text-align: center;
            
            }
        </style>
    </head>
    <body style=" background-image:url(back10.png);background-repeat: no-repeat;background-size: cover;">
    <div class="header"  style="background-color:white;">
      <img src="logo2.jpg">
    <h3>Benha Medical Center</h3>
    <h3 style="float: right;margin-top: 40px;" >Admin | Dashboard &nbsp&nbsp</h3>
   
    

  
</div>
        <<section class="container2">
        <h1 style="color:#1A6A88;">Brain Tumer Diagnosis Result</h1>
        <br>
        <table style="margin-left:50px;width:100%;background-color:#e0f2f1;">
            <tr>
                <th>Result</th>
                <td><?php echo $result['class_name'] ?></td>
            </tr>
            <tr>
                <th>Probability of no_tumor</th>
                <td><?php echo $result['prob_no_tumor'] ?></td>
            </tr>
            <tr>
                <th>Probability of yes_tumor</th>
                <td><?php echo $result['prob_yes_tumor'] ?></td>
            </tr>
        </table>
        <p>
           <b> To return to previous page ..........<a href="classification.php" style="color:#1A6A88;">click here</a></b>
        </p>
        </section>
        <footer class="footer-distributed">
 
            <div class="footer-left">
            
            <h3>Benha<span>Medical</span><span>Center</span></h3>
            
            <p class="footer-links">
            <a href="#">Home</a>
            ·
            <a href="#">Blog</a>
            ·
            <a href="#">Pricing</a>
            ·
            <a href="#">About</a>
            ·
            <a href="#">Faq</a>
            ·
            <a href="#">Contact</a>
            </p>
            
            <p class="footer-company-name">BMC IT STUFF &copy; 2021</p>
            </div>
            
            <div class="footer-center">
            
            <div>
            <i class="fa fa-map-marker"></i>
            <p><span>21 Revolution Street</span> benha, EGYPT</p>
            </div>
            
            <div>
            <i class="fa fa-phone"></i>
            <p>+1 555 123456</p>
            </div>
            
            <div>
            <i class="fa fa-envelope"></i>
            <p><a href="mailto:support@company.com">contact@BMC.com</a></p>
            </div>
            
            </div>
            
            <div class="footer-right">
            
            <p class="footer-company-about">
            <span>About the MedicalCenter</span>
            Social Media Platforms
            </p>
            
            <div class="footer-icons">
            
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-github"></i></a>
            
            </div>
            
            </div>
            
            </footer>
    
    </body>
</html>