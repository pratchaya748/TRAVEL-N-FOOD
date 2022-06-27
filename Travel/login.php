<?php 
session_start();

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
    <head>
        <title>ท่องเที่ยวภาคใต้</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">
    
        <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.css">
        
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
    
        <link rel="stylesheet" href="css/aos.css">
    
        <link rel="stylesheet" href="css/ionicons.min.css">
    
        <link rel="stylesheet" href="css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="css/jquery.timepicker.css">
    
        
        <link rel="stylesheet" href="css/flaticon.css">
        <link rel="stylesheet" href="css/icomoon.css">
        <link rel="stylesheet" href="css/style.css">
      </head>

    <body>

        <!-- Page Content -->
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-offset-5 col-md-4 text-center">
                </br></br></br></br></br>
                    <h3 class='text-center'>Login Form</h3>
                    <form action="chkLogin.php" method="post">
                      <div class="form-login"></br>
                        </br>
                        <input type="text" id="userName" name = "txtUsername" class="form-control input-sm chat-input" placeholder="username"/>
                        </br>
                        <input type="text" id="userPassword" name="txtPass" class="form-control input-sm chat-input" placeholder="password"/>
                        </br>
                        <div class="wrapper">
                                <span class="group-btn">
                                    <input type="submit" class="btn btn-danger btn-md" value="Login"> 
                                </span>
                        </div>
                    </form>
                    </br></br>
                    </div>
                </div>
            </div>
            </br></br>
            <!--footer-->
            <div class="footer text-center">
                <p>การท่องเที่ยวเชิงอาหารพื้นถิ่นภาคใต้ มาเลเซีย และสิงคโปร์ <a href="#">มหาวิทยาลัยสวนดุสิต</a></p>
            </div>
            <!--//footer-->
        </div>
        </body>
</html>