<?php session_start();?>
<?php 

if (!$_SESSION["ID_User"]){  //check session

	  Header("Location: login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

}else{?> 


<?php
    include('sever.php');
    $sql1 = "SELECT Answer AS gender,COUNT(Answer) AS number FROM answer
    WHERE Questionnaire_id = 'gender' GROUP BY Answer";
    $result1 = mysqli_query($conn,$sql1);

    $sql2 = "SELECT Answer AS age,COUNT(Answer) AS number FROM answer
    WHERE Questionnaire_id = 'age' GROUP BY Answer";
    $result2 = mysqli_query($conn,$sql2);

    $sql3 = "SELECT Answer AS status,COUNT(Answer) AS number FROM answer
    WHERE Questionnaire_id = 'status' GROUP BY Answer";
    $result3 = mysqli_query($conn,$sql3);

    $sql4 = "SELECT 
    questionnaire.Statement,
    answer.Answer,
    COUNT(IF(answer.Answer=5,answer.Questionnaire_id,null)) AS '5',
    COUNT(IF(answer.Answer=4,answer.Questionnaire_id,null)) AS '4',
    COUNT(IF(answer.Answer=3,answer.Questionnaire_id,null)) AS '3',
    COUNT(IF(answer.Answer=2,answer.Questionnaire_id,null)) AS '2',
    COUNT(IF(answer.Answer=1,answer.Questionnaire_id,null)) AS '1'
    
    FROM answer,questionnaire 
    
    WHERE answer.Questionnaire_id = questionnaire.Questionnaire_id AND 
    answer.Questionnaire_id IN ('a1','a2','a3','a4','a5','a6','a7') 
    
    group by answer.Questionnaire_id";
    $result4 = mysqli_query($conn,$sql4);

    $sql5 = "SELECT 
    questionnaire.Statement,answer.Questionnaire_id,
    answer.Answer,
    COUNT(IF(answer.Answer=5,answer.Questionnaire_id,null)) AS '5',
    COUNT(IF(answer.Answer=4,answer.Questionnaire_id,null)) AS '4',
    COUNT(IF(answer.Answer=3,answer.Questionnaire_id,null)) AS '3',
    COUNT(IF(answer.Answer=2,answer.Questionnaire_id,null)) AS '2',
    COUNT(IF(answer.Answer=1,answer.Questionnaire_id,null)) AS '1'
    
    FROM answer,questionnaire 
    
    WHERE answer.Questionnaire_id = questionnaire.Questionnaire_id AND 
    answer.Questionnaire_id IN ('b1','b2','b3','b4','b5','b6','b7','b8','b9','b10','b11','b12','b13','b14','b15') 
    
    group by answer.Questionnaire_id";
    $result5 = mysqli_query($conn,$sql5);

    $sql6 = "SELECT 
    questionnaire.Statement,answer.Questionnaire_id,
    answer.Answer,
    COUNT(IF(answer.Answer=5,answer.Questionnaire_id,null)) AS '5',
    COUNT(IF(answer.Answer=4,answer.Questionnaire_id,null)) AS '4',
    COUNT(IF(answer.Answer=3,answer.Questionnaire_id,null)) AS '3',
    COUNT(IF(answer.Answer=2,answer.Questionnaire_id,null)) AS '2',
    COUNT(IF(answer.Answer=1,answer.Questionnaire_id,null)) AS '1'
    
    FROM answer,questionnaire 
    
    WHERE answer.Questionnaire_id = questionnaire.Questionnaire_id AND 
    answer.Questionnaire_id IN ('c1','c2','c3','c4','c5','c6','c7','c8') 
    
    group by answer.Questionnaire_id";
    $result6 = mysqli_query($conn,$sql6);



?>


<!DOCTYPE html>
<html lang="en">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <script src="js/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.2/chart.min.js"></script>
    <script>
        $(function() {
        });

        function show_grap1() {
            $.post('inquiry_data.php',function(data){
                // console.log(data);
                var Statement = [];
                var Part = [];
                var No = [];
                var answer = [];
                var No_Participant = [];

                for (let i in data) {
                    answer.push(data[i].CAnswer);
                    No.push(data[i].No);
                    Statement.push(data[i].Statement);
                    Part.push(data[i].Part);
                    No_Participant.push(data[i].No_Participant);
                }
            });
        }

    </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
    <script type="text/javascript">  
    google.charts.load('current', {'packages':['corechart','bar']});  
    google.charts.setOnLoadCallback(drawChart1);  
    google.charts.setOnLoadCallback(drawChart2); 
    google.charts.setOnLoadCallback(drawChart3); 
    google.charts.setOnLoadCallback(drawChart4); 
    google.charts.setOnLoadCallback(drawChart5); 
    google.charts.setOnLoadCallback(drawChart6); 


        function drawChart1()  
        {  
            var data = google.visualization.arrayToDataTable([  
                    ['Gender', 'Number'],  
                    <?php  
                    while($row = mysqli_fetch_array($result1))  
                    {  
                            echo "['".$row["gender"]."', ".$row["number"]."],";  
                    }  
                    ?>
                ]);  
                var options = {'title':'เพศ', 
                    pieHole: 0.4,
                    'width':1200,
                    'height':700
                }; 
            var chart = new google.visualization.PieChart(document.getElementById('garp1'));  
            chart.draw(data, options);  
        }  

        function drawChart2()  
        {  
            var data = google.visualization.arrayToDataTable([  
                    ['Age', 'Number'],  
                    <?php  
                    while($row = mysqli_fetch_array($result2))  
                    {  
                            echo "['".$row["age"]."', ".$row["number"]."],";  
                    }  
                    ?>
                ]);  
                var options = {'title':'ช่วงอายุ', 
                    pieHole: 0.4,
                    'width':1200,
                    'height':700}; 
            var chart = new google.visualization.PieChart(document.getElementById('garp2'));  
            chart.draw(data, options);  
        }

        function drawChart3()  
        {  
            var data = google.visualization.arrayToDataTable([  
                    ['Status', 'Number'],  
                    <?php  
                    while($row = mysqli_fetch_array($result3))  
                    {  
                            echo "['".$row["status"]."', ".$row["number"]."],";  
                    }  
                    ?>
                ]);  
                var options = {'title':'สถานะ', 
                    pieHole: 0.4,
                    'width':1200,
                    'height':700,}; 
            var chart = new google.visualization.PieChart(document.getElementById('garp3'));  
            chart.draw(data, options);  
        }

        function drawChart4() {
            var data = google.visualization.arrayToDataTable([  
                ['Statement', '5 (มากสุด)', '4 (มาก)', '3 (ปานกลาง)','2 (น้อย)','1 (น้อยสุด)'],  
                    <?php  
                    while($row = mysqli_fetch_array($result4))  
                    {  
                        echo "['".$row["Statement"]."',".$row["5"].",".$row["4"].",".$row["3"].",".$row["2"].",".$row["1"].",],";    
                    }  
                    ?>
                ]);  

            var barchart_options = {'title':'การตัดสินใจ', 
                    'width':900,
                    'height':500,
                    hAxis : { 
                    textStyle : {
                        fontSize: 18}
                    }}; 
            var barchart = new google.visualization.ColumnChart(document.getElementById('garp4'));
            barchart.draw(data, barchart_options);
        }

        function drawChart5() {
            var data = google.visualization.arrayToDataTable([  
                ['Statement', '5 (มากสุด)', '4 (มาก)', '3 (ปานกลาง)','2 (น้อย)','1 (น้อยสุด)'],  
                    <?php  
                    while($row = mysqli_fetch_array($result5))  
                    {  
                        echo "['".$row["Statement"]."',".$row["5"].",".$row["4"].",".$row["3"].",".$row["2"].",".$row["1"].",],";    
                    }  
                    ?>
                ]);  

            var barchart_options = {'title':'ความพึงพอใจของนักท่องเที่ยวที่มีต่ออาหารพื้นถิ่น', 
                'width':900,
                'height':500,
                hAxis : { 
                    textStyle : {
                        fontSize: 18}
                    }};
            var barchart = new google.visualization.ColumnChart(document.getElementById('garp5'));
            barchart.draw(data, barchart_options);
        }

        function drawChart6() {
            var data = google.visualization.arrayToDataTable([  
                ['Statement', '5 (มากสุด)', '4 (มาก)', '3 (ปานกลาง)','2 (น้อย)','1 (น้อยสุด)'],  
                <?php  
                    while($row = mysqli_fetch_array($result6))  
                    {  
                        echo "['".$row["Statement"]."',".$row["5"].",".$row["4"].",".$row["3"].",".$row["2"].",".$row["1"].",],";    
                    }  
                    ?>
                ]);   

            var barchart_options = {'title':'สภาพแวดล้อมอาหารพื้นถิ่นภาคใต้', 
                    'width':900,
                    'height':500,
                    hAxis : { 
                    textStyle : {
                        fontSize: 18}
                    }
                };
            var barchart = new google.visualization.ColumnChart(document.getElementById('garp6'));
            barchart.draw(data, barchart_options);
        }

        
    </script> 
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.html">การท่องเที่ยวเชิงอาหารพื้นถิ่นภาคใต้ มาเลเซีย และสิงคโปร์</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>
  
        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="index.html" class="nav-link">หน้าหลัก</a></li>
            <!-- <li class="nav-item"><a href="inquiry_form.html" class="nav-link">แบบสอบถาม</a></li> -->
            <li class="nav-item"><a href="inquiry_report_admin.php" class="nav-link">ความพึงพอใจ</a></li>
            <!-- <li class="nav-item"><a href="earnings_statement.php" class="nav-link">งบการเงิน</a></li> -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">รายงาน งบการเงิน</a>
                <div class="dropdown-menu">
                    <?php 
                        $sqlS = "SELECT * FROM store";
                        $resultS = mysqli_query($conn,$sqlS);

                        while ($rowS = mysqli_fetch_array($resultS)){
                            echo '<a href="balance_sheet_admin.php?store='.$rowS['ID_Store'].'" class="dropdown-item">' . $rowS['Store_Name'] . '</a>';
                        }
                    ?>
                    </div>
            </div>
            <li class="nav-item"><a href="logout.php" class="nav-link">Log out</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->
    
    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_4.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <div class="card text-center">
              <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="true" href="#">รายงานผล</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <h5 class="card-title">ปัจจัยที่ส่งผลต่อการตัดสินใจท่องเที่ยวเชิงอาหารพื้นถิ่นภาคใต้ มาเลเซีย และสิงคโปร์</h5>
              </hr>
              <div class="" id="collapseExample">
                        <div class="card card-body" >
                            <div class="row  re" >
                            <div class="card-header" style="width:700; height:400; background-color: #ff9900; color: #ffffff; font-size: 20px;">
                                เพศ
                            </div>
                                <div class="card card-body " style="width:700; height:400">
                                    <div id="garp1" align="center"></div>
                                </div>
                            </div>
                            <div class="row  ">
                            <div class="card-header" style="width:700; height:400; background-color: #ff9900; color: #ffffff; font-size: 20px;">
                                ช่วงอายุ
                            </div>
                                <div class="card card-body">
                                    <div id="garp2" align="center"></div>
                                </div>
                            </div>
                            <div class="row  ">
                            <div class="card-header" style="width:700; height:400; background-color: #ff9900; color: #ffffff; font-size: 20px;">
                                สถานภาพ
                            </div>
                                <div class="card card-body">
                                    <div id="garp3" align="center"></div>
                                </div>
                            </div>
                            <div class="row  ">
                            <div class="card-header" style="width:700; height:400; background-color: #ff9900; color: #ffffff; font-size: 20px;">
                                การตัดสินใจ
                            </div>
                                <div class="card card-body">
                                    <div id="garp4" align="center" style="overflow-x: auto; overflow-y: hidden; white-space: nowrap; display:flex;"></div>
                                </div>
                            </div>
                            <div class="row  ">
                            <div class="card-header" style="width:700; height:400; background-color: #ff9900; color: #ffffff; font-size: 20px;">
                                ความพึงพอใจของนักท่องเที่ยวที่มีต่ออาหารพื้นถิ่น
                            </div>
                                <div class="card card-body">
                                    <div id="garp5" align="left" style="overflow-x: auto; overflow-y: hidden; white-space: nowrap; display:flex;"></div>
                                </div>
                            </div>
                            <div class="row  ">
                            <div class="card-header" style="width:700; height:400; background-color: #ff9900; color: #ffffff; font-size: 20px;">
                                สภาพแวดล้อมอาหารพื้นถิ่นภาคใต้
                            </div>
                                <div class="card card-body">
                                    <div id="garp6" align="center" style="overflow-x: auto; overflow-y: hidden; white-space: nowrap; display:flex;"></div>
                                </div>
                            </div>
                                <p></p>
                        </div>
            </div>
            </div>
                       
            
            <!--p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="inquiry_form.html">แบบสอบถาม</a></span></p-->
          </div>
        </div>
      </div>
      <div>
    </div>


    <!--section class="ftco-section ftco-degree-bg">
    </section> <!-- .section -->

    <!-- <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
          <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">ท่องเที่ยวภาคใต้</h2>
          <p>การท่องเที่ยวเชิงอาหารเป็นรูปแบบหนึ่งที่ให้นักท่องเที่ยวได้สื่อสารกับผู้คนในท้องถิ่นและวิถีชีวิตผ่านวัฒนธรรมอาหาร อาหารท้องถิ่นของภาคใต้ มีรสชาติที่โดดเด่นเป็นเอกลักษณ์เฉพาะบางประเภทไม่สามารถหารับประทานได้จากที่อื่นๆ จึงเหมาะสมที่จะพัฒนาการท่องเที่ยวเฉพาะกลุ่ม</p>
          </div>
          </div>
          <div class="col-md">
          <div class="ftco-footer-widget mb-4 ml-md-5">
          <h2 class="ftco-heading-2">โครงการวิจัยที่เกี่ยวข้อง</h2>
          <ul class="list-unstyled">
          <li><a href="#" class="py-2 d-block">โครงการ 1</a></li>
          <li><a href="#" class="py-2 d-block">โครงการ 2</a></li>
          <li><a href="#" class="py-2 d-block">โครงการ 3</a></li>
          </ul>
          </div>
          </div>
          <div class="col-md">
          <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">สอบถามข้อมูลเพิ่มเติม</h2>
          <div class="block-23 mb-3">
            <ul>
            <li><span class="icon icon-map-marker"></span><span class="text">295 มหาวิทยาลัยสวนดุสิต ถนนนครราชสีมา เขตดุสิต กรุงเทพ 10300</span></li>
            <li><a href="#"><span class="icon icon-phone"></span><span class="text">02 244 5000</span></a></li>
            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
            </ul>
          </div>
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
      
          <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<script>document.write(new Date().getFullYear());</script> มหาวิทยาลัยสวนดุสิต</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
        </div>   
    </footer> -->
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>

<?php }?>