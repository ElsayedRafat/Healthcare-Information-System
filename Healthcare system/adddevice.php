<!DOCTYPE html>

<html>
        <link rel="stylesheet" type="text/css" href="adddevice.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        

<body style=" background-image:url(back10.png);background-repeat: no-repeat;background-size: cover;"> 
  <div class="header">
    <img src="logo2.jpg">
    <h3>Benha Medical Center</h3>
    <h3 style="float: right;margin-top: 40px;" >Devices | Settings &nbsp&nbsp</h3>
   
    

  
</div>
<div class="fcf-body">
<div id="fcf-form">
        <h3 class="fcf-h3">New Device</h3>
    
        <form id="fcf-form-id" class="fcf-form-class" method="post" action="">
            
            <div class="fcf-form-group">
                <label for="Device Name" class="fcf-label">Device Name</label>
                <div class="fcf-input-group">
                    <input type="text"  name="device_name" class="fcf-form-control" required>
                </div>
            </div>
    
            <div class="fcf-form-group">
                <label for="IP Address" class="fcf-label">IP Address</label>
                <div class="fcf-input-group">
                    <input type="text"  name="ip_address" class="fcf-form-control" required>
                </div>
            </div>
            <div class="fcf-form-group">
                    <label for="Port Number" class="fcf-label">Port Number</label>
                    <div class="fcf-input-group">
                        <input type="text"  name="port_num" class="fcf-form-control" required>
                    </div>
                </div>
                <div class="fcf-form-group">
                        <label for="AE Title" class="fcf-label">AE Title</label>
                        <div class="fcf-input-group">
                            <input type="text"  name="ae_title" class="fcf-form-control" required>
                        </div>
                    </div>
            <div class="fcf-form-group">
                    <button type="submit" name="btnadd" class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block">Add Device</button>
                </div>
        
                
        
            </form>
            </div>
        </div>
        
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
<?php  
  
include("config.php");  
  

        // Register user
        if(isset($_POST['btnadd'])){
           $device_name = trim($_POST['device_name']);
          
           $ip_address = trim($_POST['ip_address']);
           $port_num = trim($_POST['port_num']);
           $ae_title = trim($_POST['ae_title']);
        
           $isValid = true;
        
           // Check fields are empty or not
           if($device_name == '' || $ip_address == '' || $port_num == '' || $ae_title == ''){
             $isValid = false;
             echo "<script>alert('Please fill all fields.')</script>";  
           }
       
        
          
          
        
           
             
            
        
           if($isValid){
        
             // Check if Email-ID already exists
             $stmt = $con->prepare("SELECT * FROM add_devices WHERE ip_address = ?");
             $stmt->bind_param("s", $ip_address);
             $stmt->execute();
             $result = $stmt->get_result();
             $stmt->close();
             if($result->num_rows > 0){
               $isValid = false;
               
               echo "<script>alert('IP is already existed.')</script>"; 
             }

        
           }
        
           // Insert records
           if($isValid){
             $insertSQL = "INSERT INTO add_devices(device_name,ip_address,port_num,ae_title ) values(?,?,?,?)";
             $stmt = $con->prepare($insertSQL);
             $stmt->bind_param("ssss",$device_name,$ip_address,$port_num,$ae_title);
             $stmt->execute();
             $stmt->close();
        
             echo "<script>window.open(dashboardd.html','_self')</script>";  
           }
        }
        ?>