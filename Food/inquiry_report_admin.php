<?php session_start();?>
<?php 

if ($_SESSION["Status"] != "admin"){  //check session

	Header("Location: login.php"); 

}else{?> 
<?php
    include('sever.php');
    $sql1 = "SELECT Answer AS gender,COUNT(Answer) AS number FROM answer
    WHERE Questionnaire_id = 'gender' GROUP BY Answer";
    $result1 = mysqli_query($conn,$sql1);

    $sql2 = "SELECT Answer AS age,COUNT(Answer) AS number FROM answer
    WHERE Questionnaire_id = 'age' GROUP BY Answer";
    $result2 = mysqli_query($conn,$sql2);

    $sql3 = "SELECT Answer AS education,COUNT(Answer) AS number FROM answer
    WHERE Questionnaire_id = 'education' GROUP BY Answer";
    $result3 = mysqli_query($conn,$sql3);

    $sql4 = "SELECT Answer AS career,COUNT(Answer) AS number FROM answer
    WHERE Questionnaire_id = 'career' GROUP BY Answer";
    $result4 = mysqli_query($conn,$sql4);

    $sql5 = "SELECT Answer AS db,COUNT(Answer) AS number FROM answer
    WHERE Questionnaire_id = 'db' GROUP BY Answer";
    $result5 = mysqli_query($conn,$sql5);

// -----------------------------bar------------------------------------------------------------------------------

    $sql6 = "SELECT Answer AS ct1,COUNT(Answer) AS number FROM answer
    WHERE Questionnaire_id = 'ct1' GROUP BY Answer";
    $result6 = mysqli_query($conn,$sql6);
// ------------------------------------------------------------------------------------------------------------------

    $sql7 = "SELECT Answer AS ct2,COUNT(Answer) AS number FROM answer
    WHERE Questionnaire_id = 'ct2' GROUP BY Answer";
    $result7 = mysqli_query($conn,$sql7);
// ------------------------------------------------------------------------------------------------------------------

    $sql8 = "SELECT 
    questionnaire.Statement,answer.Questionnaire_id,answer.Answer,COUNT(answer.Questionnaire_id) AS Amount,
    COUNT(IF(answer.Questionnaire_id='n1',answer.Answer,null)) AS '1',
    COUNT(IF(answer.Questionnaire_id='n2',answer.Answer,null)) AS '2',
    COUNT(IF(answer.Questionnaire_id='n3',answer.Answer,null)) AS '3'
    
    FROM answer,questionnaire
    WHERE answer.Questionnaire_id = questionnaire.Questionnaire_id AND
    answer.Questionnaire_id IN ('n1','n2','n3')
    group by answer.Questionnaire_id,answer.Answer";
    $result8 = mysqli_query($conn,$sql8);
// --------------------------------------------------------------------------------------------------------------------

    $sql9 = "SELECT Answer AS ct3,COUNT(Answer) AS number FROM answer
    WHERE Questionnaire_id = 'ct3' GROUP BY Answer";
    $result9 = mysqli_query($conn,$sql9);
    // ------------------------------------------------------------------------------------------------------------------

    $sql10 = "SELECT Answer AS ct4,COUNT(Answer) AS number FROM answer
    WHERE Questionnaire_id = 'ct4' GROUP BY Answer";
    $result10 = mysqli_query($conn,$sql10);
    // ------------------------------------------------------------------------------------------------------------------

    $sql11 = "SELECT Answer AS ct5,COUNT(Answer) AS number FROM answer
    WHERE Questionnaire_id = 'ct5' GROUP BY Answer";
    $result11 = mysqli_query($conn,$sql11);
    // --------------------------------------------------------------------------------------------------------------------

    $sql12 = "SELECT Answer AS ct6,COUNT(Answer) AS number FROM answer
    WHERE Questionnaire_id = 'ct6' GROUP BY Answer";
    $result12 = mysqli_query($conn,$sql12);
    // ------------------------------------------------------------------------------------------------------------------

    $sql13 = "SELECT Answer AS ct7,COUNT(Answer) AS number FROM answer
    WHERE Questionnaire_id = 'ct7' GROUP BY Answer";
    $result13 = mysqli_query($conn,$sql13);
    // ------------------------------------------------------------------------------------------------------------------

    $sql14 = "SELECT 
    questionnaire.Statement,answer.Questionnaire_id,
    answer.Answer,
    COUNT(IF(answer.Answer='รู้จัก',answer.Questionnaire_id,null)) AS 'รู้จัก',
    COUNT(IF(answer.Answer='ไม่รู้จัก',answer.Questionnaire_id,null)) AS 'ไม่รู้จัก',
    COUNT(IF(answer.Answer='ไม่แน่ใจ',answer.Questionnaire_id,null)) AS 'ไม่แน่ใจ'

    FROM answer,questionnaire 

    WHERE answer.Questionnaire_id = questionnaire.Questionnaire_id AND 
    answer.Questionnaire_id IN ('k1','k2','k3') 

    group by answer.Questionnaire_id";
    $result14 = mysqli_query($conn,$sql14);
    // --------------------------------------------------------------------------------------------------------------------

    $sql16 = "SELECT 
    questionnaire.Statement,
    answer.Answer,
    COUNT(IF(answer.Answer=5,answer.Questionnaire_id,null)) AS '5',
    COUNT(IF(answer.Answer=4,answer.Questionnaire_id,null)) AS '4',
    COUNT(IF(answer.Answer=3,answer.Questionnaire_id,null)) AS '3',
    COUNT(IF(answer.Answer=2,answer.Questionnaire_id,null)) AS '2',
    COUNT(IF(answer.Answer=1,answer.Questionnaire_id,null)) AS '1',
    COUNT(IF(answer.Answer=0,answer.Questionnaire_id,null)) AS '0'
    FROM answer,questionnaire 
    WHERE answer.Questionnaire_id = questionnaire.Questionnaire_id AND 
    answer.Questionnaire_id IN ('a1','a2','a3','a4') 

    group by answer.Questionnaire_id";
    $result16 = mysqli_query($conn,$sql16);
    // ------------------------------------------------------------------------------------------------------------------

    $sql17 = "SELECT 
    questionnaire.Statement,answer.Questionnaire_id,
    answer.Answer,
    COUNT(IF(answer.Answer=5,answer.Questionnaire_id,null)) AS '5',
    COUNT(IF(answer.Answer=4,answer.Questionnaire_id,null)) AS '4',
    COUNT(IF(answer.Answer=3,answer.Questionnaire_id,null)) AS '3',
    COUNT(IF(answer.Answer=2,answer.Questionnaire_id,null)) AS '2',
    COUNT(IF(answer.Answer=1,answer.Questionnaire_id,null)) AS '1'

    FROM answer,questionnaire 

    WHERE answer.Questionnaire_id = questionnaire.Questionnaire_id AND 
    answer.Questionnaire_id IN ('b1','b2','b3','b4','b5') 

    group by answer.Questionnaire_id";
    $result17 = mysqli_query($conn,$sql17);
    // ------------------------------------------------------------------------------------------------------------------

    $sql18 = "SELECT 
    questionnaire.Statement,answer.Questionnaire_id,
    answer.Answer,
    COUNT(IF(answer.Answer=5,answer.Questionnaire_id,null)) AS '5',
    COUNT(IF(answer.Answer=4,answer.Questionnaire_id,null)) AS '4',
    COUNT(IF(answer.Answer=3,answer.Questionnaire_id,null)) AS '3',
    COUNT(IF(answer.Answer=2,answer.Questionnaire_id,null)) AS '2',
    COUNT(IF(answer.Answer=1,answer.Questionnaire_id,null)) AS '1'

    FROM answer,questionnaire 

    WHERE answer.Questionnaire_id = questionnaire.Questionnaire_id AND 
    answer.Questionnaire_id IN ('c1','c2','c3','c4','c5') 

    group by answer.Questionnaire_id";
    $result18 = mysqli_query($conn,$sql18);
    // --------------------------------------------------------------------------------------------------------------------

    $sql19 = "SELECT 
    questionnaire.Statement,
    answer.Answer,
    COUNT(IF(answer.Answer=5,answer.Questionnaire_id,null)) AS '5',
    COUNT(IF(answer.Answer=4,answer.Questionnaire_id,null)) AS '4',
    COUNT(IF(answer.Answer=3,answer.Questionnaire_id,null)) AS '3',
    COUNT(IF(answer.Answer=2,answer.Questionnaire_id,null)) AS '2',
    COUNT(IF(answer.Answer=1,answer.Questionnaire_id,null)) AS '1'
    FROM answer,questionnaire 
    WHERE answer.Questionnaire_id = questionnaire.Questionnaire_id AND 
    answer.Questionnaire_id IN ('d1','d2','d3') 

    group by answer.Questionnaire_id";
    $result19 = mysqli_query($conn,$sql19);
    // ------------------------------------------------------------------------------------------------------------------

    $sql20 = "SELECT 
    questionnaire.Statement,answer.Questionnaire_id,
    answer.Answer,
    COUNT(IF(answer.Answer=5,answer.Questionnaire_id,null)) AS '5',
    COUNT(IF(answer.Answer=4,answer.Questionnaire_id,null)) AS '4',
    COUNT(IF(answer.Answer=3,answer.Questionnaire_id,null)) AS '3',
    COUNT(IF(answer.Answer=2,answer.Questionnaire_id,null)) AS '2',
    COUNT(IF(answer.Answer=1,answer.Questionnaire_id,null)) AS '1'

    FROM answer,questionnaire 

    WHERE answer.Questionnaire_id = questionnaire.Questionnaire_id AND 
    answer.Questionnaire_id IN ('e1','e2','e3') 

    group by answer.Questionnaire_id";
    $result20 = mysqli_query($conn,$sql20);
    // ------------------------------------------------------------------------------------------------------------------

    $sql21 = "SELECT 
    questionnaire.Statement,answer.Questionnaire_id,
    answer.Answer,
    COUNT(IF(answer.Answer=5,answer.Questionnaire_id,null)) AS '5',
    COUNT(IF(answer.Answer=4,answer.Questionnaire_id,null)) AS '4',
    COUNT(IF(answer.Answer=3,answer.Questionnaire_id,null)) AS '3',
    COUNT(IF(answer.Answer=2,answer.Questionnaire_id,null)) AS '2',
    COUNT(IF(answer.Answer=1,answer.Questionnaire_id,null)) AS '1'

    FROM answer,questionnaire 

    WHERE answer.Questionnaire_id = questionnaire.Questionnaire_id AND 
    answer.Questionnaire_id IN ('f1','f2','f3','f4') 

    group by answer.Questionnaire_id";
    $result21 = mysqli_query($conn,$sql21);
    // --------------------------------------------------------------------------------------------------------------------
    $sql15 = "SELECT * FROM known_food";
    $qeury15 = mysqli_query($conn,$sql15);

    // --------------------------------------------------------------------------------------------------------------------
    $sql22 = "SELECT 
    questionnaire.Statement,answer.Questionnaire_id,
    COUNT(IF(answer.Answer=5,answer.Questionnaire_id,null)) AS '5',
    COUNT(IF(answer.Answer=4,answer.Questionnaire_id,null)) AS '4',
    COUNT(IF(answer.Answer=3,answer.Questionnaire_id,null)) AS '3',
    COUNT(IF(answer.Answer=2,answer.Questionnaire_id,null)) AS '2',
    COUNT(IF(answer.Answer=1,answer.Questionnaire_id,null)) AS '1'

    FROM answer,questionnaire 

    WHERE answer.Questionnaire_id = questionnaire.Questionnaire_id AND 
    answer.Questionnaire_id IN ('g1','g2','g3','g4','g5','g6','g7') 

    group by answer.Questionnaire_id";
    $result22 = mysqli_query($conn,$sql22);

?>
<!DOCTYPE html>
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
        <script src="js/jquery.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
            integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
        <style>
        div.card-header{
            width:700; 
            height:400; 
            background-color: #ff9900; 
            color: #ffffff; 
            font-size: 20px;
        }
        div.garp_bar{
            overflow-x: auto; 
            overflow-y: hidden; 
            white-space: nowrap; 
            display:flex;
        }
        div.garp_table{
            overflow-y: auto; 
            display:flex;
            height: 500px;
        }
        
        </style> 

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
        google.charts.setOnLoadCallback(drawChart7); 
        google.charts.setOnLoadCallback(drawChart8); 
        google.charts.setOnLoadCallback(drawChart9); 
        google.charts.setOnLoadCallback(drawChart10); 
        google.charts.setOnLoadCallback(drawChart11); 
        google.charts.setOnLoadCallback(drawChart12); 
        google.charts.setOnLoadCallback(drawChart13); 
        google.charts.setOnLoadCallback(drawChart14); 
        google.charts.setOnLoadCallback(drawChart16); 
        google.charts.setOnLoadCallback(drawChart17); 
        google.charts.setOnLoadCallback(drawChart18); 
        google.charts.setOnLoadCallback(drawChart19); 
        google.charts.setOnLoadCallback(drawChart20); 
        google.charts.setOnLoadCallback(drawChart21); 
        google.charts.setOnLoadCallback(drawChart22); 


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
                    var options = {
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
                    var options = {
                        pieHole: 0.4,
                        'width':1200,
                        'height':700}; 
                var chart = new google.visualization.PieChart(document.getElementById('garp2'));  
                chart.draw(data, options);  
            }

            function drawChart3()  
            {  
                var data = google.visualization.arrayToDataTable([  
                        ['education', 'Number'],  
                        <?php  
                        while($row = mysqli_fetch_array($result3))  
                        {  
                                echo "['".$row["education"]."', ".$row["number"]."],";  
                        }  
                        ?>
                    ]);  
                    var options = {
                        pieHole: 0.4,
                        'width':1200,
                        'height':700,}; 
                var chart = new google.visualization.PieChart(document.getElementById('garp3'));  
                chart.draw(data, options);  
            }

            function drawChart4()  
            {  
                var data = google.visualization.arrayToDataTable([  
                        ['career', 'Number'],  
                        <?php  
                        while($row = mysqli_fetch_array($result4))  
                        {  
                                echo "['".$row["career"]."', ".$row["number"]."],";  
                        }  
                        ?>
                    ]);  
                    var options = {
                        pieHole: 0.4,
                        'width':1200,
                        'height':700,}; 
                var chart = new google.visualization.PieChart(document.getElementById('garp4'));  
                chart.draw(data, options);  
            }

            function drawChart5()  
            {  
                var data = google.visualization.arrayToDataTable([  
                        ['Date of birth', 'Number'],  
                        <?php  
                        while($row = mysqli_fetch_array($result5))  
                        {  
                                echo "['".$row["db"]."', ".$row["number"]."],";  
                        }  
                        ?>
                    ]);  
                    var options = {
                        pieHole: 0.4,
                        'width':1200,
                        'height':700,}; 
                var chart = new google.visualization.PieChart(document.getElementById('garp5'));  
                chart.draw(data, options);  
            }

//----------------------------------------------BAR--------------------------------------------------

            function drawChart6() {
                var data = google.visualization.arrayToDataTable([  
                    ['Statement', 'จำนวนผู้ตอบแบบสอบถาม'],  
                        <?php  
                        while($row = mysqli_fetch_array($result6))  
                        {  
                            echo "['".$row["ct1"]."', ".$row["number"]."],";    
                        }  
                        ?>
                    ]);  

                var barchart_options = {
                        'width':1200,
                        'height':500,
                        hAxis : { 
                        textStyle : {
                            fontSize: 18}
                        }}; 
                var barchart = new google.visualization.ColumnChart(document.getElementById('garp6'));
                barchart.draw(data, barchart_options);
            }

            function drawChart7() {
                var data = google.visualization.arrayToDataTable([  
                    ['Statement', 'จำนวนผู้ตอบแบบสอบถาม'],  
                        <?php  
                        while($row = mysqli_fetch_array($result7))  
                        {  
                            echo "['".$row["ct2"]."', ".$row["number"]."],";    
                        }  
                        ?>
                    ]); 

                var barchart_options = {
                    'width':1200,
                    'height':500,
                    hAxis : { 
                        textStyle : {
                            fontSize: 18}
                        }};
                var barchart = new google.visualization.ColumnChart(document.getElementById('garp7'));
                barchart.draw(data, barchart_options);
            }

            function drawChart8() {
                var data = google.visualization.arrayToDataTable([  
                    ['จังหวัด','จำนวนผู้เลือก'],  
                    <?php  
                        $n1 = 0;
                        $s1 = "";
                        $a1 = "";

                        $n2 = 0;
                        $s2 = "";
                        $a2 = "";

                        $n3 = 0;
                        $s3 = "";
                        $a3 = "";

                        while($row = mysqli_fetch_array($result8))  
                        {  
                            if ($row["1"] >= $n1) {
                                $n1 = $row["1"];
                                $s1 = $row["Statement"];
                                $a1 = $row["Answer"];
                            }
                            if ($row["2"] >= $n2) {
                                $n2 = $row["2"];
                                $s2 = $row["Statement"];
                                $a2 = $row["Answer"];
                            }
                            if ($row["3"] >= $n3) {
                                $n3 = $row["3"];
                                $s3 = $row["Statement"];
                                $a3 = $row["Answer"];
                            }
                        }     
                        echo "['".$s1." :".$a1."',".$n1.",],
                            ['".$s2." :".$a2."',".$n2."],
                            ['".$s3." :".$a3."',".$n3."]"; 
                         
                        ?>
                    ]);   

                var barchart_options = {
                        'width':1200,
                        'height':500,
                        // colors: ['#5B69FC', '#FBFE0F', '#2ECC58'],
                        hAxis : { 
                        textStyle : {
                            fontSize: 18}
                        }
                    };
                var barchart = new google.visualization.ColumnChart(document.getElementById('garp8'));
                barchart.draw(data, barchart_options);
            }

            function drawChart9() {
                var data = google.visualization.arrayToDataTable([  
                    ['Statement', 'จำนวนผู้ตอบแบบสอบถาม'],  
                        <?php  
                        while($row = mysqli_fetch_array($result9))  
                        {  
                            echo "['".$row["ct3"]."', ".$row["number"]."],";    
                        }  
                        ?>
                    ]);   

                var barchart_options = {
                        'width':1200,
                        'height':500,
                        hAxis : { 
                        textStyle : {
                            fontSize: 18}
                        }
                    };
                var barchart = new google.visualization.ColumnChart(document.getElementById('garp9'));
                barchart.draw(data, barchart_options);
            }

            function drawChart10() {
                var data = google.visualization.arrayToDataTable([  
                    ['Statement', 'จำนวนผู้ตอบแบบสอบถาม'],  
                        <?php  
                        while($row = mysqli_fetch_array($result10))  
                        {  
                            echo "['".$row["ct4"]."', ".$row["number"]."],";    
                        }  
                        ?>
                    ]);  

                var barchart_options = {
                        'width':1200,
                        'height':500,
                        hAxis : { 
                        textStyle : {
                            fontSize: 18}
                        }
                    };
                var barchart = new google.visualization.ColumnChart(document.getElementById('garp10'));
                barchart.draw(data, barchart_options);
            }

            function drawChart11() {
                var data = google.visualization.arrayToDataTable([  
                    ['Statement', 'จำนวนผู้ตอบแบบสอบถาม'],  
                        <?php  
                        while($row = mysqli_fetch_array($result11))  
                        {  
                            echo "['".$row["ct5"]."', ".$row["number"]."],";    
                        }  
                        ?>
                    ]);  

                var barchart_options = {
                        'width':1200,
                        'height':500,
                        hAxis : { 
                        textStyle : {
                            fontSize: 18}
                        }
                    };
                var barchart = new google.visualization.ColumnChart(document.getElementById('garp11'));
                barchart.draw(data, barchart_options);
            }

            function drawChart12() {
                var data = google.visualization.arrayToDataTable([  
                    ['Statement', 'จำนวนผู้ตอบแบบสอบถาม'],  
                        <?php  
                        while($row = mysqli_fetch_array($result12))  
                        {  
                            echo "['".$row["ct6"]."', ".$row["number"]."],";    
                        }  
                        ?>
                    ]); 

                var barchart_options = {
                        'width':1200,
                        'height':500,
                        hAxis : { 
                        textStyle : {
                            fontSize: 18}
                        }
                    };
                var barchart = new google.visualization.ColumnChart(document.getElementById('garp12'));
                barchart.draw(data, barchart_options);
            }

            function drawChart13() {
                var data = google.visualization.arrayToDataTable([  
                    ['Statement', 'จำนวนผู้ตอบแบบสอบถาม'],  
                        <?php  
                        while($row = mysqli_fetch_array($result13))  
                        {  
                            echo "['".$row["ct7"]."', ".$row["number"]."],";    
                        }  
                        ?>
                    ]); 

                var barchart_options = {
                        'width':1200,
                        'height':500,
                        hAxis : { 
                        textStyle : {
                            fontSize: 18}
                        }
                    };
                var barchart = new google.visualization.ColumnChart(document.getElementById('garp13'));
                barchart.draw(data, barchart_options);
            }

            function drawChart14() {
                var data = google.visualization.arrayToDataTable([  
                    ['Statement', 'รู้จัก','ไม่รู้จัก','ไม่แน่ใจ'],  
                    <?php  
                        while($row = mysqli_fetch_array($result14))  
                        {  
                            echo "['".$row["Statement"]."',".$row["รู้จัก"].",".$row["ไม่รู้จัก"].",".$row["ไม่แน่ใจ"].",],";    
                        }  
                        ?>
                    ]);   

                var barchart_options = {
                        'width':1200,
                        'height':500,
                        hAxis : { 
                        textStyle : {
                            fontSize: 18}
                        }
                    };
                var barchart = new google.visualization.ColumnChart(document.getElementById('garp14'));
                barchart.draw(data, barchart_options);
            }

            function drawChart16() {
                var data = google.visualization.arrayToDataTable([  
                    ['Statement', '5 (มากสุด)', '4 (มาก)', '3 (ปานกลาง)','2 (น้อย)','1 (น้อยสุด)','0 (ไม่รู้จัก)'],  
                    <?php  
                        while($row = mysqli_fetch_array($result16))  
                        {  
                            echo "['".$row["Statement"]."',".$row["5"].",".$row["4"].",".$row["3"].",".$row["2"].",".$row["1"].",".$row["0"]."],";  
                        }  
                        ?>
                    ]);   

                var barchart_options = {
                        'width':1200,
                        'height':500,
                        hAxis : { 
                        textStyle : {
                            fontSize: 10}
                        }
                    };
                var barchart = new google.visualization.ColumnChart(document.getElementById('garp16'));
                barchart.draw(data, barchart_options);
            }

            function drawChart17() {
                var data = google.visualization.arrayToDataTable([  
                    ['Statement', '5 (มากสุด)', '4 (มาก)', '3 (ปานกลาง)','2 (น้อย)','1 (น้อยสุด)'],  
                    <?php  
                        while($row = mysqli_fetch_array($result17))  
                        {  
                            echo "['".$row["Statement"]."',".$row["5"].",".$row["4"].",".$row["3"].",".$row["2"].",".$row["1"].",],";    
                        }  
                        ?>
                    ]);   

                var barchart_options = {
                        'width':1200,
                        'height':500,
                        hAxis : { 
                        textStyle : {
                            fontSize: 18}
                        }
                    };
                var barchart = new google.visualization.ColumnChart(document.getElementById('garp17'));
                barchart.draw(data, barchart_options);
            }

            function drawChart18() {
                var data = google.visualization.arrayToDataTable([  
                    ['Statement', '5 (มากสุด)', '4 (มาก)', '3 (ปานกลาง)','2 (น้อย)','1 (น้อยสุด)'],  
                    <?php  
                        while($row = mysqli_fetch_array($result18))  
                        {  
                            echo "['".$row["Statement"]."',".$row["5"].",".$row["4"].",".$row["3"].",".$row["2"].",".$row["1"].",],";    
                        }  
                        ?>
                    ]);   

                var barchart_options = {
                        'width':1200,
                        'height':500,
                        hAxis : { 
                        textStyle : {
                            fontSize: 18}
                        }
                    };
                var barchart = new google.visualization.ColumnChart(document.getElementById('garp18'));
                barchart.draw(data, barchart_options);
            }

            function drawChart19() {
                var data = google.visualization.arrayToDataTable([  
                    ['Statement', '5 (มากสุด)', '4 (มาก)', '3 (ปานกลาง)','2 (น้อย)','1 (น้อยสุด)'],  
                    <?php  
                        while($row = mysqli_fetch_array($result19))  
                        {  
                            echo "['".$row["Statement"]."',".$row["5"].",".$row["4"].",".$row["3"].",".$row["2"].",".$row["1"].",],";    
                        }  
                        ?>
                    ]);   

                var barchart_options = {
                        'width':1200,
                        'height':500,
                        hAxis : { 
                        textStyle : {
                            fontSize: 18}
                        }
                    };
                var barchart = new google.visualization.ColumnChart(document.getElementById('garp19'));
                barchart.draw(data, barchart_options);
            }

            function drawChart20() {
                var data = google.visualization.arrayToDataTable([  
                    ['Statement', '5 (มากสุด)', '4 (มาก)', '3 (ปานกลาง)','2 (น้อย)','1 (น้อยสุด)'],  
                    <?php  
                        while($row = mysqli_fetch_array($result20))  
                        {  
                            echo "['".$row["Statement"]."',".$row["5"].",".$row["4"].",".$row["3"].",".$row["2"].",".$row["1"].",],";    
                        }  
                        ?>
                    ]);   

                var barchart_options = {
                        'width':1200,
                        'height':500,
                        hAxis : { 
                        textStyle : {
                            fontSize: 18}
                        }
                    };
                var barchart = new google.visualization.ColumnChart(document.getElementById('garp20'));
                barchart.draw(data, barchart_options);
            }

            function drawChart21() {
                var data = google.visualization.arrayToDataTable([  
                    ['Statement', '5 (มากสุด)', '4 (มาก)', '3 (ปานกลาง)','2 (น้อย)','1 (น้อยสุด)'],  
                    <?php  
                        while($row = mysqli_fetch_array($result21))  
                        {  
                            echo "['".$row["Statement"]."',".$row["5"].",".$row["4"].",".$row["3"].",".$row["2"].",".$row["1"].",],";    
                        }  
                        ?>
                    ]);   

                var barchart_options = {
                        'width':1200,
                        'height':500,
                        hAxis : { 
                        textStyle : {
                            fontSize: 18}
                        }
                    };
                var barchart = new google.visualization.ColumnChart(document.getElementById('garp21'));
                barchart.draw(data, barchart_options);
            }

            function drawChart22() {
                var data = google.visualization.arrayToDataTable([  
                    ['Statement', '5 (มากสุด)', '4 (มาก)', '3 (ปานกลาง)','2 (น้อย)','1 (น้อยสุด)'],  
                    <?php  
                        while($row = mysqli_fetch_array($result22))  
                        {  
                            echo "['".$row["Statement"]."',".$row["5"].",".$row["4"].",".$row["3"].",".$row["2"].",".$row["1"].",],";    
                        }  
                        ?>
                    ]);   

                var barchart_options = {
                        'width':1200,
                        'height':500,
                        hAxis : { 
                        textStyle : {
                            fontSize: 18}
                        }
                    };
                var barchart = new google.visualization.ColumnChart(document.getElementById('garp22'));
                barchart.draw(data, barchart_options);
            }

            
        </script>   

    </head>

    <body>
        <!-- Nav Bar Start -->
        <div class="navbar navbar-expand-lg bg-light navbar-light">
            <div class="container-fluid">
                <a href="index.html" class="navbar-brand">ท่องเที่ยวเชิงอาหาร<span>ภาคใต้ </span></a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">รายงาน รายรับ/รายจ่าย</a>
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
                        <a href="inquiry_report_admin.php" class="nav-item nav-link">รายงาน ความพึงพอใจ</a>
                        <a href="logout.php" class="nav-item nav-link">Log out</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->
        
        
        <!-- Page Header Start -->
        <div class="page-header mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>รายงานผลความพึงพอใจร้านอาหารปักษ์ใต้</h2>
                    </div>
                    <div class="col-12">
                        <a href="">หน้าหลัก</a>
                        <a href="">รายงายผลความพึงพอใจร้านอาหารปักษ์ใต้</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        
        <!-- Food Start -->
        <div class="food mt-0">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="food-item">
                            <i class="flaticon-cooking"></i>
                            <h2>รายงายผลความพึงพอใจร้านอาหารปักษ์ใต้</h2>
                            <p>
                                โครงการวิจัยท่องเที่ยวเชิงอาหารภาคใต้เชื่อมโยงมาเลเซียและสิงคโปร์ 
                            </p>
                            <div class="row">
                                </div>
                                <p></p>
                            <div>
                                <!-- <button class="btn custom-btn" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" id="start">ดูกราฟประเมิน</button> -->
                        </div>
                    <p></p>
                      <div class="" id="collapseExample">
                        <div class="card card-body" >
                            <div class="row  re" >
                            <div class="card-header">
                                เพศ
                            </div>
                                <div class="card card-body ">
                                    
                                        <?php
                                        $sqlN = "SELECT COUNT(Answer) 'amount' FROM `answer` WHERE Questionnaire_id = 'gender'";
                                        $qeuryN = mysqli_query($conn,$sqlN);
                                        while($row = $qeuryN-> fetch_assoc()){
                                            echo '<h5 class="fw-bold" style="text-align: right;">มีผู้ตอบแบบสอบถามทั้งหมด :'.$row['amount'].' คน</h5>';
                                        }
                                        ?>
                                    
                                    <div id="garp1" align="center" class="garp"></div>
                                </div>
                            </div>

                            <div class="row  ">
                            <div class="card-header">
                                อายุ
                            </div>
                                <div class="card card-body">
                                    <div id="garp2" align="center" class="garp"></div>
                                </div>
                            </div>

                            <div class="row  ">
                            <div class="card-header">
                                การศึกษา
                            </div>
                                <div class="card card-body">
                                    <div id="garp3" align="center" class="garp"></div>
                                </div>
                            </div>

                            <div class="row  ">
                            <div class="card-header">
                                อาชีพ
                            </div>
                                <div class="card card-body">
                                    <div id="garp4" align="center" class="garp"></div>
                                </div>
                            </div>

                            <div class="row  ">
                            <div class="card-header">
                                ปีเกิด
                            </div>
                                <div class="card card-body">
                                    <div id="garp5" align="center" class="garp"></div>
                                </div>
                            </div>

                            <div class="row  ">
                            <div class="card-header">
                                วัตถุประสงค์หลักในการมาเที่ยวในจังหวัดนครศรีธรรมราช/ภูเก็ต/สงขลา
                            </div>
                                <div class="card card-body">
                                    <div id="garp6" align="center" class="garp_bar"></div>
                                </div>
                            </div>

                            <div class="row  ">
                            <div class="card-header">
                                ในการมาเที่ยวของท่านนั้น ท่านชื่นชอบรับประทานอาหารประเภทไหน
                            </div>
                                <div class="card card-body">
                                    <div id="garp7" align="center" class="garp_bar"></div>
                                </div>
                            </div>

                            <div class="row  ">
                            <div class="card-header">
                                ถ้านึกถึงอาหารภาคใต้ ท่านนึกถึงอาหารของจังหวัดใดต่อไปนี้มากที่สุด 
                            </div>
                                <div class="card card-body">
                                    <div id="garp8" align="left" class="garp_bar"></div>
                                </div>
                            </div>

                            <div class="row  ">
                            <div class="card-header">
                                เมนูอาหารใต้ เมนูใดบ้างที่ท่านชื่นชอบ 
                            </div>
                                <div class="card card-body">
                                    <div id="garp9" align="left" class="garp_bar"></div>
                                </div>
                            </div>

                            <div class="row  ">
                            <div class="card-header">
                            ท่านรับรู้ข่าวสารร้านอาหารแนะนำ/ร้านอร่อยพื้นถิ่น จากแหล่งใดบ้างต่อไปนี้ 
                            </div>
                                <div class="card card-body">
                                    <div id="garp10" align="left" class="garp_bar"></div>
                                </div>
                            </div>

                            <div class="row  ">
                            <div class="card-header">
                            รายการอาหารท้องถิ่นที่ท่านชอบดูมีรายการอะไรบ้าง
                            </div>
                                <div class="card card-body">
                                    <div id="garp11" align="left" class="garp_bar"></div>
                                </div>
                            </div>

                            <div class="row  ">
                            <div class="card-header">
                            ติดตามเพจใดบ้างต่อไปนี้
                            </div>
                                <div class="card card-body">
                                    <div id="garp12" align="left" class="garp_bar"></div>
                                </div>
                            </div>

                            <div class="row  ">
                            <div class="card-header">
                            พฤติกรรมที่ท่านชอบทำเมื่อมาทานอาหารพื้นถิ่นในจังหวัดนครศรีธรรมราช ภูเก็ต และสงขลา
                            </div>
                                <div class="card card-body">
                                    <div id="garp13" align="left" class="garp_bar"></div>
                                </div>
                            </div>

                            <div class="row  ">
                            <div class="card-header">
                            ควาามคาดหวังของท่านในการมาทานอาหารพื้นถิ่นภาคใต้ในระดับใด
                            </div>
                                <div class="card card-body">
                                    <div id="garp22" align="left" class="garp_bar"></div>
                                </div>
                            </div>

                            <div class="row  ">
                            <div class="card-header">
                            ท่านรู้จักอาหารพื้นถิ่นของจังหวัดนครศรีธรรมราช ภูเก็ต และสงขลาหรือไม่
                            </div>
                                <div class="card card-body">
                                    <div id="garp14" align="left" class="garp_bar"></div>
                                </div>
                            </div>

                            <div class="row  ">
                            <div class="card-header">
                            อาหารพื้นถิ่นของจังหวัดนครศรีธรรมราช ภูเก็ต และสงขลาที่ท่านรู้จักชื่อว่าอะไร
                            </div>
                                <div class="card card-body">
                                <div class="garp_table">
                                    <!-- <label>อาหารพื้นถิ่นของจังหวัดนครศรีธรรมราช ภูเก็ต และสงขลาที่ท่านรู้จักชื่อว่าอะไร</label> -->
                                    <table class="table table-bordered table-hover ">
                                    <thead>
                                        <tr>
                                        <th scope="col" class="text-center">นครศรีธรรมราช</th>
                                        <th scope="col" class="text-center">ภูเก็ต</th>
                                        <th scope="col" class="text-center">สงขลา</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        while($row = $qeury15-> fetch_assoc()){
                                            if (($row['Nakornsornthiromaraj'] != "-") || ($row['Phuket'] != "-") || ($row['Songkhla'] != "-")) {
                                                echo "
                                                <tr>
                                                    <td class='text-center'>".$row['Nakornsornthiromaraj']."</td>
                                                    <td class='text-center'>".$row['Phuket']."</td>
                                                    <td class='text-center'>".$row['Songkhla']."</td>
                                                </tr>";
                                            }
                                            
                                        }
                                        ?>
                                    </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>

                            <div class="row  ">
                            <div class="card-header">
                            ท่านรู้จักวัตถุดิบพื้นบ้านภาคใต้เหล่านี้หรือไม่
                            </div>
                                <div class="card card-body">
                                    <div id="garp16" align="left" class="garp_bar"></div>
                                </div>
                            </div>

                            <div class="row  ">
                            <div class="card-header">
                            ด้านอัตลักษณ์ของอาหารพื้นถิ่นภาคใต้
                            </div>
                                <div class="card card-body">
                                <p class="fw-bold">ท่านคิดว่าปัจจัยที่ทำให้ท่านเลือกรับประทานอาหารพื้นถิ่นภาคใต้ต่อไปนี้มีความสำคัญในระดับใด</p><br>
                                    <div id="garp17" align="left" class="garp_bar"></div>
                                </div>
                            </div>

                            <div class="row  ">
                            <div class="card-header">
                            ด้านคุณภาพของอาหารพื้นถิ่นภาคใต้
                            </div>
                                <div class="card card-body">
                                <p class="fw-bold">ท่านคิดว่าปัจจัยที่ทำให้ท่านเลือกรับประทานอาหารพื้นถิ่นภาคใต้ต่อไปนี้มีความสำคัญในระดับใด</p><br>
                                    <div id="garp18" align="left" class="garp_bar"></div>
                                </div>
                            </div>

                            <div class="row  ">
                            <div class="card-header">
                            ด้านคุณค่าของราคา
                            </div>
                                <div class="card card-body">
                                <p class="fw-bold">ท่านคิดว่าปัจจัยที่ทำให้ท่านเลือกรับประทานอาหารพื้นถิ่นภาคใต้ต่อไปนี้มีความสำคัญในระดับใด</p><br>
                                    <div id="garp19" align="left" class="garp_bar"></div>
                                </div>
                            </div>

                            <div class="row  ">
                            <div class="card-header">
                            ด้านการตลาด
                            </div>
                                <div class="card card-body">
                                <p class="fw-bold">ท่านคิดว่าปัจจัยที่ทำให้ท่านเลือกรับประทานอาหารพื้นถิ่นภาคใต้ต่อไปนี้มีความสำคัญในระดับใด</p><br>
                                    <div id="garp20" align="left" class="garp_bar"></div>
                                </div>
                            </div>

                            <div class="row  ">
                            <div class="card-header">
                            ด้านลักษณะร้านอาหารพื้นถิ่น
                            </div>
                                <div class="card card-body">
                                <p class="fw-bold">ท่านคิดว่าปัจจัยที่ทำให้ท่านเลือกรับประทานอาหารพื้นถิ่นภาคใต้ต่อไปนี้มีความสำคัญในระดับใด</p><br>
                                    <div id="garp21" align="left" class="garp_bar"></div>
                                </div>
                            </div>
                                <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Food End -->
        
        <!-- Footer Start -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="footer-contact">
                                    <h2>Contact</h2>
                                    <p><i class="fa fa-map-marker-alt"></i>259 มหาวิทยาลัยสวนดุสิต ถนนนครราชสีมา เขตดุสิต กรุงเทพ 10300</p>
                                    <p><i class="fa fa-phone-alt"></i>02 244 5000</p>
                                    <p><i class="fa fa-envelope"></i>info@example.com</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="footer-link">
                                    <h2>โครงการวิจัยที่เกี่ยวข้อง</h2>
                                    <a href="">โครงการที่ 1</a>
                                    <a href="">โครงการที่ 2</a>
                                    <a href="">โครงการที่ 3</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <p>Copyright &copy; <a href="www.dusit.ac.th">มหาวิทยาลัยสวนดุสิต</a>, ท่องเที่ยวเชิงอาหารภาคใต้เชื่อมโยงมาเลเซียและสิงคโปร์</p>
                    <p>Designed By <a href="https://htmlcodex.com">HTML Codex</a></p>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/tempusdominus/js/moment.min.js"></script>
        <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
        
        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
<?php }?>

