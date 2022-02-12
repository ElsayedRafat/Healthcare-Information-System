<!DOCTYPE html>
<html>
    <head>
        <title>HMIS</title>
        <meta charset="UTF-8" />
        
        <link href="css/phpstyle.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" />
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
       <style>
           form{
            margin-top: 30px;
            margin-left: 25%;
            margin-right: 25%;
            color:black;
            font-family: -apple-system, Arial, sans-serif;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #9FC5E8;
            padding: 30px;
            padding-bottom: 10px;
            height:400px;
            max-width: 100%;
            border:solid;

           }
           input{
               width:200px;
               height:30px;
               
               color:blue;
               font-weight:bolder;
           }
           </style>
    </head>
    <body style=" background-image:url(back10.png);background-repeat: no-repeat;background-size: cover;">
    
    <div class="header" style="background-color:white;">
    <img src="logo2.jpg">
    <h3>Benha Medical Center</h3>
    <h3 style="float: right;margin-top: 40px;" >Admin | Dashboard &nbsp&nbsp</h3>
   
    

  
</div>
         
        
        <section class="container2">
        <form action="brain_tumer_image_upload.php" method="POST" enctype="multipart/form-data">
        <h1 style="text-align:center">Brain Tumer Diagnosis</h1>
            <label><b>Upload sample image:<b></label> <br><br>
            <input required type="file" name="img" accept=".jpg,.jpeg,.png" > <br><br>
            <input type="submit" name="submit-img" value="Upload image" class="I1">
        </form>

</section>
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