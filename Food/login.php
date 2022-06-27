<?php 
session_start();

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <title>ท่องเที่ยวเชิงอาหารภาคใต้เชื่อมโยงมาเลเซียและสิงคโปร์</title>
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
            <meta content="Free Website Template" name="keywords">
            <meta content="Free Website Template" name="description">
    
            <!-- Favicon -->
            <link href="img/favicon.ico" rel="icon">
    
            <!-- Google Font -->
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Nunito:600,700" rel="stylesheet"> 
            
            <!-- CSS Libraries -->
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
            <link href="lib/animate/animate.min.css" rel="stylesheet">
            <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
            <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
            <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    
            <!-- Template Stylesheet -->
            <link href="css/style.css" rel="stylesheet">
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
                        <input type="text" name="txtUsername" class="form-control input-sm chat-input" placeholder="username"/>
                        </br>
                        <input type="text" name="txtPass" class="form-control input-sm chat-input" placeholder="password"/>
                        </br>
                        <div class="wrapper">
                                <span class="group-btn">
                                    <button class="btn custom-btn" type="submit">Login</button>
                                </span>
                        </div>
                    </form>
                    </br></br>
                    </div>
                </div>
            </div>
            <!--footer-->
            <div class="footer text-center">
                <p>การท่องเที่ยวเชิงอาหารพื้นถิ่นภาคใต้ มาเลเซีย และสิงคโปร์ <a href="#">มหาวิทยาลัยสวนดุสิต</a></p>
            </div>
            <!--//footer-->
        </div>
        </body>
</html>