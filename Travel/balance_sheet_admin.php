<?php session_start();?>
<?php 

if ($_SESSION["Status"] != "admin"){  //check session

	Header("Location: login.php"); 

}else{?> 

<?php 
include('sever.php');
$_SESSION["ID_Store"] = $_GET["store"];
$ID_Store = $_SESSION["ID_Store"];
$sql1 = "SELECT YEAR(Date) AS year FROM transaction WHERE ID_Store = '$ID_Store' GROUP BY year ORDER BY year DESC";
$result1 = mysqli_query($conn,$sql1);
$sql2 = "SELECT MAX(Date) AS max,MIN(Date) AS min FROM transaction WHERE ID_Store = '$ID_Store'";
$result2 = mysqli_query($conn,$sql2);
$mm = mysqli_fetch_assoc($result2);

$sql3 = "SELECT * FROM store WHERE ID_Store = '$ID_Store'";
$result3 = mysqli_query($conn,$sql3);
$name = mysqli_fetch_assoc($result3);
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
                    <a class="nav-link active" aria-current="true" href="#">รายงานงบการเงิน</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <h5 class="card-title">รายงาน รายรับ/รายจ่าย</h5>
                <form action="" method="POST" id="budget">
                            <div class="row">
                                <div class="col-md-4 align-self-start">
                                    <div class="form-group ">
                                        <label class = "text-start">ประเภท Report</label>
                                        <select class="custom-select form-control" id="category">
                                            <option selected value="">ประเภท Report</option>
                                            <option value="date">วัน</option>
                                            <option value="month">เดือน</option>
                                            <option value="quarter">ไตรมาส</option>
                                            <option value="year">ปี</option>
                                        </select>      
                                    </div> 
                                </div>

                                <div class="col-md-4 align-self-end" >
                                    <div class="form-group" id="all">
                                    </div>
                                </div>

                                <div class="col-md-4 align-self-end" >
                                    <div class="form-group" id="dateend">
                                    </div>      
                                </div>
                        <p></p>
                        <p></p>
                          <div class="" id="collapseExample">
                            <div class="card card-body" id="tcard">
                            <table class="table table-striped table-hover text-center" id="treport">
                                <thead></thead>
                                <tbody></tbody>
                                <tfoot></tfoot>
                            </table>
                            </div>
                          </div>

                        <p></p>

                            <div>
                                <button class="btn custom-btn report btn-success" type="submit">ดู Report</button>
                                <button class="btn custom-btn pdf btn-warning" type="button" id="pdf">PDF</button>
                            </div>
                    </form> 
                 
              </div>
            </div>
                       
            
            <!--p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="inquiry_form.html">แบบสอบถาม</a></span></p-->
          </div>
        </div>
      </div>
      <div>
    </div>

      
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

<script src="js/jquery-3.5.1.js"></script>
<script language="javascript" type="text/javascript" src="js/pdfmake-thai-master/build/pdfmake.min.js"></script>
<script language="javascript" type="text/javascript" src="js/pdfmake-thai-master/build/vfs_fonts.js"></script>

<script>
$(function() {
    $('#pdf').click(function() {
        print();
    });

    function print() {
        var th = $("table thead tr").length;
        var tb = $("table tbody tr").length;
        var tf = $("table tfoot tr").length;
        var table = $('#tcard').html();
        var table = $('table thead tr').html();

        if ((th || tb || tf) == 0) {
            alert("โปรดเลือกรายงาน");
        }
        else{
            var cols = [];
            var result = [];
            var resultF = [];
            $('#treport thead th').each(function(){
                cols.push($(this).text().toLowerCase());
            });
            $('#treport tbody tr').each(function(){
                var row = {};
                $(this).find('td').each(function(index){
                    row[cols[index]] = $(this).text();
                });
                result.push(row);
            });
            // console.log(result);

            $('#treport tfoot').each(function(id){
                var row = {};
                $(this).find('th').each(function(index){
                    row[cols[index]] = $(this).text();
                });
                result.push(row);
            });

            function buildTableBody(data, columns) {
                var body = [];

                body.push(columns);

                data.forEach(function(row) {
                    var dataRow = [];

                    columns.forEach(function(column) {
                        dataRow.push(row[column].toString());
                    })

                    body.push(dataRow);
                });

                return body;
            }

            pdfMake.fonts = {
                THSarabunNew: {
                    normal: 'THSarabunNew.ttf',
                    bold: 'THSarabunNew-Bold.ttf',
                    italics: 'THSarabunNew-Italic.ttf',
                    bolditalics: 'THSarabunNew-BoldItalic.ttf'
                },
                Roboto: {
                    normal: 'Roboto-Regular.ttf',
                    bold: 'Roboto-Medium.ttf',
                    italics: 'Roboto-Italic.ttf',
                    bolditalics: 'Roboto-MediumItalic.ttf'
                }
            }


            // รับค่าจากฟอร์ม
            var cat = $('#category').val();
            // วันเริ่ม
            var s = $('#s').val(); 
            // วันสิ้นสุด
            var e = $('#e').val();
            // ปี
            var y = $('#y').val();
            // ร้าน
            var store = '<?php echo $name['Store_Name'] ?>';

            if ((s == undefined) && (e == undefined) && (y == undefined)){
                // alert("year");

                function table(data, columns) {
                        return {
                            style:{
                                        fontSize: 18,
                                        alignment:'center',
                                },
                            table: {
                                style: 'tableExample',
                                headerRows: 1,
                                widths: [100,120,120,120],
                                fontSize:18,
                                alignment:'center',
                                body: buildTableBody(data, columns)
                            }
                        };
                    }

                    var docInfo = {
                        defaultStyle: {
                            font: 'THSarabunNew'
                        },
                        info:{
                            title:'รายงาน รายรับรายจ่าย'
                        },
                        pageSize:'A4',
                        pageOrientation:'landspace',
                        pageMargins:[50,50,30,60],
                         

                        content: [
                            {
                                text:'รายงาน รายรับรายจ่าย',
                                fontSize:30,
                                alignment:'center',
                            },
                            {
                                text: store,
                                fontSize:18,
                            },
                            table(result, ['ปี', 'รายรับ','รายจ่าย','% รายจ่ายต่อรายรับ'])

                        ]
                    }
                    pdfMake.createPdf(docInfo).download('income.pdf');
            }
            else if(y == undefined) {
                // alert("date");
                
                function table(data, columns) {
                        return {
                            style:{
                                        fontSize: 18,
                                        alignment:'center',
                                },
                            table: {
                                style: 'tableExample',
                                headerRows: 1,
                                widths: [80,120,80,80,100],
                                fontSize:18,
                                alignment:'center',
                                body: buildTableBody(data, columns)
                            }
                        };
                    }

                    var docInfo = {
                        defaultStyle: {
                            font: 'THSarabunNew'
                        },
                        info:{
                            title:'รายงาน รายรับรายจ่าย'
                        },
                        pageSize:'A4',
                        pageOrientation:'landspace',
                        pageMargins:[50,50,30,60],
                         

                        content: [
                            {
                                text:'รายงาน รายรับรายจ่าย',
                                fontSize:30,
                                alignment:'center',
                            },
                            {
                                text: store,
                                fontSize:18,
                            },
                            table(result, ['วันที่','รายการ', 'รายรับ','รายจ่าย','คงเหลือ'])

                        ]
                    }
                    pdfMake.createPdf(docInfo).download('income.pdf');
            }
            else if ((s == undefined) && (e == undefined)) {
                if ((cat == "quarter")) {
                    // alert("quarter");
                    function table(data, columns) {
                        return {
                            style:{
                                        fontSize: 18,
                                        alignment:'center',
                                },
                            table: {
                                style: 'tableExample',
                                headerRows: 1,
                                widths: [80,120,120,140],
                                fontSize:18,
                                alignment:'center',
                                body: buildTableBody(data, columns)
                            }
                        };
                    }

                    var docInfo = {
                        defaultStyle: {
                            font: 'THSarabunNew'
                        },
                        info:{
                            title:'รายงาน รายรับรายจ่าย'
                        },
                        pageSize:'A4',
                        pageOrientation:'landspace',
                        pageMargins:[50,50,30,60],
                         

                        content: [
                            {
                                text:'รายงาน รายรับรายจ่าย',
                                fontSize:30,
                                alignment:'center',
                            },
                            {
                                text: store,
                                fontSize:18,
                            },
                            table(result, ['ไตรมาส', 'รายรับ','รายจ่าย','% รายจ่ายต่อรายรับ'])

                        ]
                    }
                    pdfMake.createPdf(docInfo).download('income.pdf');
                    
                    
                }
                else if ((cat == "month")) {
                    // alert("month");
                    function table(data, columns) {
                        return {
                            style:{
                                        fontSize: 18,
                                        alignment:'center',
                                },
                            table: {
                                style: 'tableExample',
                                headerRows: 1,
                                widths: [100,120,120,120],
                                fontSize:18,
                                alignment:'center',
                                body: buildTableBody(data, columns)
                            }
                        };
                    }

                    var docInfo = {
                        defaultStyle: {
                            font: 'THSarabunNew'
                        },
                        info:{
                            title:'รายงาน รายรับรายจ่าย'
                        },
                        pageSize:'A4',
                        pageOrientation:'landspace',
                        pageMargins:[50,50,30,60],
                         

                        content: [
                            {
                                text:'รายงาน รายรับรายจ่าย',
                                fontSize:30,
                                alignment:'center',
                            },
                            {
                                text: store,
                                fontSize:18,
                            },
                            table(result, ['เดือน', 'รายรับ','รายจ่าย','% รายจ่ายต่อรายรับ'])

                        ]
                    }
                    pdfMake.createPdf(docInfo).download('income.pdf');
                }
            }

        }
    }


    // event เมื่อเลือกประเภท
    function select(){
        var cat = $('#category').val();

        var date1 =`<div class="form-group" id="all">
                        <label for="inputRiderDate">วันที่</label>
                        <input type="date" class="form-control" id="s" min="<?php echo $mm['min'] ?>" max="<?php echo $mm['max'] ?>">
                    </div>`;
        var date2 = `<div class="form-group" id="dateend">
                        <label for="inputRiderDate">ถึง   วันที่</label>
                        <input type="date" class="form-control" id="e" min="<?php echo $mm['min'] ?>" max="<?php echo $mm['max'] ?>">
                    </div>`;
        var year = `<div class="form-group" id="all">
                        <label for="year">ปี ค.ศ. ที่</label>
                        <select class="custom-select" id="y">
                            <option selected value="">เลือกปี ค.ศ.</option>
                            <?php 
                            while ($row1 = mysqli_fetch_array($result1)){
                                echo '<option value = "' . $row1['year'] . '">' . $row1['year'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>`;
        var space1 = `<div class="form-group" id="dateend"></div>`;
        var space2 = `<div class="form-group" id="all"></div>`;

        if(cat == "date"){
            $('#all').replaceWith(date1);
            $('#dateend').replaceWith(date2);
        }
        else if((cat == "month") || (cat == "quarter")){
            // alert(cat);
            $('#all').replaceWith(year);
            $('#dateend').replaceWith(space1);
        }
        else if(cat == "year"){
            // alert(cat);
            $('#all').replaceWith(space2);
            $('#dateend').replaceWith(space1);
        }
        else if (cat == "") {
            $('#all').replaceWith(space2);
            $('#dateend').replaceWith(space1);
        }
        // ใส่ตาราง
        var thead = '';
        var tbody = '';
        var tfoot = '';
        $("table thead").html(thead);
        $("table tbody").html(tbody);
        $("table tfoot").html(tfoot);

    };

// เมือคลิกเปลี่ยนประเภท
    $(document).on('change', '#category',function(){
        select();
    });

// submit
    $('form#budget').submit(function(event) {
        event.preventDefault();
        // รับค่าจากฟอร์ม
        var cat = $('#category').val();
        // วันเริ่ม
        var s = $('#s').val(); 
        // วันสิ้นสุด
        var e = $('#e').val();
        // ปี
        var y = $('#y').val();
        // id ร้าน
        var ID_Store =  '<?php echo $_SESSION["ID_Store"]; ?>';
        // alert(s);alert(e);alert(y);

        // check null
        if (cat == "") {
            alert("โปรดเลือกประเภทรายงาน");
        }

        // รายงานต่อปี
        else if ((s == undefined) && (e == undefined) && (y == undefined)) {
            // ส่งค่าไป search_result.php ด้วย jQuery Ajax
            $.ajax({
                url: 'balance_dataY.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    y: y,
                    ID_Store: ID_Store,
                },
                success: function(data) {
                    // รวมค่าลบ
                    var totalN = 0;
                    // รวมค่าบวก
                    var totalP = 0;
                    // รวมหมด
                    var total = 0;
                    // เก็บเลข
                    var Amount = 0;
                    // เก็บค่า %
                    var per = 0;
                    // ไว้นับ keys
                    var counts = {};

                    // ถ้ามีข้อมูล
                    if (data.length != 0) {

                        // แสดงค่าลงในตาราง
                        var thead = `
                                <tr>
                                    <th>ปี</th>
                                    <th>รายรับ</th>
                                    <th>รายจ่าย</th>
                                    <th>% รายจ่ายต่อรายรับ</th>
                                </tr>`;
                        var tbody ="";

                        // วนลูปข้อมูล JSON ลงตาราง
                            $.each(data, function(key,value) {
                                if (!counts.hasOwnProperty(value.year)) {
                                    counts[value.year] = 1;
                                } else {
                                    counts[value.year]++;
                                }
                            });

                            var ar1 = [];
                            var ar15 = [];
                            var ar3 = [];

                            $.each(data,function(i,value){
                                ar1[i+1] = value.Amount;
                                ar15[i+1] = value.ID_TransactionType;
                                ar3[i+1] = value.year;
                            });

                            var c = 1;
                            var ap = 0;
                            var an = 0;

                            $.each(data,function(key,value){
                                $.each(counts,function (k,v) {
                                    for (let i = 1; i <= v; i++) {
                                        var Amount = ar1[c];

                                        if (ar15[c] == "pay") {
                                        Amount = Amount * (-1);
                                        totalN += Amount;
                                        }
                                        else if (ar15[c] == "revenue") {
                                            totalP += parseFloat(Amount);
                                        } 


                                        c++;
                                    }    

                                    per = (totalN * -100) / totalP;
                                    ap += totalP;
                                    an += totalN;
                                    tbody += `      
                                        <tr id ="" class="">
                                            <td class="text-center">`+ k +`</td>
                                            <td class="text-center text-success" id="">`+totalP.toLocaleString()+`</td>
                                            <td class="text-center text-danger" id="">`+totalN.toLocaleString()+`</td>
                                            <td class="text-center">`+ per.toFixed(2) +`</td>
                                        </tr>`;



                                    totalN = 0;
                                    totalP = 0;

                                });
                                c = 0;
                                return false;
                            });

                            per = (an * -100) / ap;

                            var tfoot = `
                                    <th colspan="">ยอดรวม</th>
                                    <th class="text-success">`+`รายรับ `+ap.toLocaleString()+` บาท`+`</th>
                                    <th class="text-danger">`+`รายจ่าย `+an.toLocaleString()+` บาท`+`</th>
                                    <th>รายจ่ายต่อรายรับทั้งปี `+ per.toFixed(2) +` %`+`</th>
                                    `;
                            // ใส่ตาราง
                            $("table thead").html(thead);
                            $("table tbody").html(tbody);
                            $("table tfoot").html(tfoot);
                    } 
                    else {
                        alert('ไม่พบวันที่ค้นหา');
                    }
                }
            });
        }

        // รายงานต่อวัน
        else if(y == undefined) {
            // alert("date");

            // ส่งค่าไป search_result.php ด้วย jQuery Ajax
            $.ajax({
                url: 'balance_dataD.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    s: s,
                    e: e,
                    ID_Store: ID_Store,
                },
                success: function(data) {
                    
                    // เก็บค่าลบ
                    // var negative =[];
                    // รวมค่าลบ
                    var totalN = 0;
                    // เก็บค่าบวก
                    // var plus =[];
                    // รวมค่าบวก
                    var totalP = 0;
                    // รวมหมด
                    var total = 0;
                    // เก็บเลข
                    var Amount = 0;
                    // เก็บค่า %
                    var per = 0;

                    // กรณีมีข้อมูล
                    if (data.length != 0) {
                        
                        // แสดงค่าลงในตาราง
                        var thead = `
                                <tr>
                                    <th>วันที่</th>
                                    <th>รายการ</th>
                                    <th>รายรับ</th>
                                    <th>รายจ่าย</th>
                                    <th>คงเหลือ</th>
                                </tr>`;
                        var tbody ="";
                        
                        // วนลูปข้อมูล JSON ลงตาราง
                            $.each(data, function(key,value) {
                                var Amount = value.Amount;
                                parseFloat(Amount);
                                // alert(Amount);	
                                // กำหนดตัวแปรเก็บโครงสร้างแถวของตาราง
                                if (value.ID_TransactionType == "pay") {
                                    Amount = Amount * (-1);
                                    totalN += Amount;
                                    total += parseFloat(Amount);
                                    var ne = parseFloat(value.Amount);
                                    ne = ne * (-1);
                                    tbody += `
                                    <tr id ="" class="">
                                        <td class="text-center">${value.Date}</td>
                                        <td class="text-center  id="">${value.List}</td>
                                        <td class="text-center" id="">`+ ` - ` +`</td>
                                        <td class="text-center text-danger" id="">`+ne.toLocaleString()+`</td>
                                        <td class="text-center">`+ total.toLocaleString() +`</td>
                                    </tr>`;
                                }
                                else if (value.ID_TransactionType == "revenue") {
                                    totalP += parseFloat(Amount);
                                    total += parseFloat(Amount);
                                    var pl = parseFloat(value.Amount);
                                    tbody += `
                                    <tr id ="" class="">
                                        <td class="text-center">${value.Date}</td>
                                        <td class="text-center" id="">${value.List}</td>
                                        <td class="text-center text-success" id="">`+pl.toLocaleString()+`</td>
                                        <td class="text-center" id="">`+ ` - ` +`</td>
                                        <td class="text-center">`+ total.toLocaleString() +`</td>
                                    </tr>`;
                                }
                                parseFloat(totalN)
                                parseFloat(totalP)
                                per = (totalN * -100) / totalP;
                                // alert(per);
                            });
                            
                            var tfoot = `
                                    <th colspan="">ยอดรวม</th>
                                    <th colspan=""></th>
                                    <th class="text-success">`+`รายรับ `+totalP.toLocaleString()+` บาท`+`</th>
                                    <th class="text-danger">`+`รายจ่าย `+totalN.toLocaleString()+` บาท`+`</th>
                                    <th>รายจ่ายต่อรายรับ `+ per.toFixed(2) +` %`+`</th>
                                    `;
                            // ใส่ตาราง
                            $("table thead").html(thead);
                            $("table tbody").html(tbody);
                            $("table tfoot").html(tfoot);
                    } 
                    else {
                        alert('ไม่พบวันที่ค้นหา');
                    }
                }
            });
        }

        // รายงานไตรมาส เดือน
        else if ((s == undefined) && (e == undefined)) {
            if ((cat == "quarter")) {
                // alert("quarter");
                // ส่งค่าไป search_result.php ด้วย jQuery Ajax
                $.ajax({
                    url: 'balance_dataQ.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        y: y,
                        ID_Store: ID_Store,
                    },
                    success: function(data) {
                        // รวมค่าลบ
                        var totalN1 = 0;
                        // รวมค่าบวก
                        var totalP1 = 0;

                        // รวมค่าลบ
                        var totalN2 = 0;
                        // รวมค่าบวก
                        var totalP2 = 0;

                        // รวมค่าลบ
                        var totalN3 = 0;
                        // รวมค่าบวก
                        var totalP3 = 0;

                        // รวมค่าลบ
                        var totalN4 = 0;
                        // รวมค่าบวก
                        var totalP4 = 0;

                        // รวมหมด
                        var total = 0;
                        // เก็บเลข
                        var Amount = 0;
                        // เก็บค่า %
                        var per1 = 0;
                        var per2 = 0;
                        var per3 = 0;
                        var per4 = 0;

                        var ap = 0;
                        var an = 0;
                        var per = 0;

                        // กรณีมีข้อมูล
                        if (data.length != 0) {
                            
                            // แสดงค่าลงในตาราง
                            var thead = `
                                    <tr>
                                        <th>ไตรมาส</th>
                                        <th>รายรับ</th>
                                        <th>รายจ่าย</th>
                                        <th>% รายจ่ายต่อรายรับ</th>
                                    </tr>`;
                            var tbody ="";
                            
                            // วนลูปข้อมูล JSON ลงตาราง
                                $.each(data, function(key,value) {
                                    var Amount = value.Amount;
                                    var month = value.month;
                                    // alert(month);
                                    // console.log(month);

                                    if ((month == 1) || (month == 2) || (month == 3)) {
                                        if (value.ID_TransactionType == "pay") {
                                            Amount = Amount * (-1);
                                            totalN1 += Amount;
                                        }
                                        else if (value.ID_TransactionType == "revenue") {
                                            totalP1 += parseFloat(Amount);
                                        } 
                                        per1 = (totalN1 * -100) / totalP1;
                                        // an += totalN1;
                                        // ap += totalP1;

                                        
                                    }
                                    else if((month == 4) || (month == 5) || (month == 6)) {
                                        if (value.ID_TransactionType == "pay") {
                                            Amount = Amount * (-1);
                                            totalN2 += Amount;
                                        }
                                        else if (value.ID_TransactionType == "revenue") {
                                            totalP2 += parseFloat(Amount);
                                        } 
                                        per2 = (totalN2 * -100) / totalP2;
                                        // an += totalN2;
                                        // ap += totalP2;

                                        
                                    }
                                    else if((month == 7) || (month == 8) || (month == 9)) {
                                        if (value.ID_TransactionType == "pay") {
                                            Amount = Amount * (-1);
                                            totalN3 += Amount;
                                        }
                                        else if (value.ID_TransactionType == "revenue") {
                                            totalP3 += parseFloat(Amount);
                                        } 
                                        per3 = (totalN3 * -100) / totalP3;
                                        // an += totalN3;
                                        // ap += totalP3;

                                        
                                    }
                                    else if((month == 10) || (month == 11) || (month == 12)) {
                                        if (value.ID_TransactionType == "pay") {
                                            Amount = Amount * (-1);
                                            totalN4 += Amount;
                                        }
                                        else if (value.ID_TransactionType == "revenue") {
                                            totalP4 += parseFloat(Amount);
                                        } 
                                        per4 = (totalN4 * -100) / totalP4;
                                        // an += totalN4;
                                        // ap += totalP4;

                                        
                                    }
                                });
                                tbody += `    
                                    <tr id ="" class="">
                                        <td class="text-center"> ไตรมาสที่ 1 </td>
                                        <td class="text-center text-success" id="">`+totalP1.toLocaleString()+`</td>
                                        <td class="text-center text-danger" id="">`+totalN1.toLocaleString()+`</td>
                                        <td class="text-center">`+ per1.toFixed(2) +`</td>
                                    </tr>`
                                tbody += `    
                                    <tr id ="" class="">
                                        <td class="text-center"> ไตรมาสที่ 2 </td>
                                        <td class="text-center text-success" id="">`+totalP2.toLocaleString()+`</td>
                                        <td class="text-center text-danger" id="">`+totalN2.toLocaleString()+`</td>
                                        <td class="text-center">`+ per2.toFixed(2) +`</td>
                                    </tr>`;
                                tbody += `    
                                    <tr id ="" class="">
                                        <td class="text-center"> ไตรมาสที่ 3 </td>
                                        <td class="text-center text-success" id="">`+totalP3.toLocaleString()+`</td>
                                        <td class="text-center text-danger" id="">`+totalN3.toLocaleString()+`</td>
                                        <td class="text-center">`+ per3.toFixed(2) +`</td>
                                    </tr>`;
                                tbody += `    
                                    <tr id ="" class="">
                                        <td class="text-center"> ไตรมาสที่ 4 </td>
                                        <td class="text-center text-success" id="">`+totalP4.toLocaleString()+`</td>
                                        <td class="text-center text-danger" id="">`+totalN4.toLocaleString()+`</td>
                                        <td class="text-center">`+ per4.toFixed(2) +`</td>
                                    </tr>`;
                                
                                an = (totalN1 + totalN2 + totalN3 + totalN4);
                                ap = (totalP1 + totalP2 + totalP3 + totalP4);

                                console.log(an);
                                console.log(ap);
                                per = (an * -100) / ap;

                                var tfoot = `
                                        <th colspan="">ยอดรวม</th>
                                        <th class="text-success">`+`รายรับ `+ap.toLocaleString()+` บาท`+`</th>
                                        <th class="text-danger">`+`รายจ่าย `+an.toLocaleString()+` บาท`+`</th>
                                        <th>รายจ่ายต่อรายรับ `+ per.toFixed(2) +` %`+`</th>
                                        `;
                                // ใส่ตาราง
                                $("table thead").html(thead);
                                $("table tbody").html(tbody);
                                $("table tfoot").html(tfoot);
                        } 
                        else {
                            alert('ไม่พบวันที่ค้นหา');
                        }
                    }
                });
            }
            else if ((cat == "month")) {
                // alert("month");
                // alert(y);
                // ส่งค่าไป search_result.php ด้วย jQuery Ajax
                $.ajax({
                    url: 'balance_dataM.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        y: y,
                        ID_Store: ID_Store,
                    },
                    success: function(data) {
                        // รวมค่าลบ
                        var totalN = 0;
                        // รวมค่าบวก
                        var totalP = 0;
                        // รวมหมด
                        var total = 0;
                        // เก็บเลข
                        var Amount = 0;
                        // เก็บค่า %
                        var per = 0;
                        // ไว้นับ keys
                        var counts = {};

                        // ถ้ามีข้อมูล
                        if (data.length != 0) {
                            
                            // แสดงค่าลงในตาราง
                            var thead = `
                                    <tr>
                                        <th>เดือน</th>
                                        <th>รายรับ</th>
                                        <th>รายจ่าย</th>
                                        <th>% รายจ่ายต่อรายรับ</th>
                                    </tr>`;
                            var tbody ="";
                            
                            // วนลูปข้อมูล JSON ลงตาราง
                                $.each(data, function(key,value) {
                                    if (!counts.hasOwnProperty(value.month)) {
                                        counts[value.month] = 1;
                                    } else {
                                        counts[value.month]++;
                                    }
                                });

                                var ar1 = [];
                                var ar15 = [];
                                var ar3 = [];

                                $.each(data,function(i,value){
                                    ar1[i+1] = value.Amount;
                                    ar15[i+1] = value.ID_TransactionType;
                                    ar3[i+1] = value.month;
                                });

                                // var oc = Object.keys(counts).length;
                                
                                var c = 1;
                                var ap = 0;
                                var an = 0;

                                $.each(data,function(key,value){
                                    $.each(counts,function (k,v) {
                                        for (let i = 1; i <= v; i++) {
                                            var Amount = ar1[c];
                                            
                                            if (ar15[c] == "pay") {
                                            Amount = Amount * (-1);
                                            totalN += Amount;
                                            }
                                            else if (ar15[c] == "revenue") {
                                                totalP += parseFloat(Amount);
                                            } 

                                            
                                            c++;
                                        }    
                                        // console.log("///////////////");
                                        per = (totalN * -100) / totalP;
                                        ap += totalP;
                                        an += totalN;
                                        // console.log("totalP "+ap);
                                        // console.log("totalN "+an);
                                        // console.log("***************");

                                        // if (Infinity(per)) {
                                        //     per = totalN;
                                        // }
                                        if (k == "1") {
                                            k ="มกราคม";
                                        }
                                        else if (k == "2" ) {
                                            k ="กุมภาพันธ์";
                                        }
                                        else if (k == "3") {
                                            k ="มีนาคม";
                                        }
                                        else if (k == "4") {
                                            k ="เมษายน"
                                        }
                                        else if (k == "5") {
                                            k ="พฤษภาคม";
                                        }
                                        else if (k == "6") {
                                            k ="มิถุนายน";
                                        }
                                        else if (k == "7") {
                                            k ="กรกฎาคม";
                                        }
                                        else if (k == "8") {
                                            k ="สิงหาคม";
                                        }
                                        else if (k == "9") {
                                            k ="กันยายน";
                                        }
                                        else if (k == "10") {
                                            k ="ตุลาคม";
                                        }
                                        else if (k == "11") {
                                            k ="พฤศจิกายน";
                                        }
                                        else if (k == "12") {
                                            k ="ธันวาคม";
                                        }  
                                        
                                        tbody += `      
                                            <tr id ="" class="">
                                                <td class="text-center">`+ k +`</td>
                                                <td class="text-center text-success" id="">`+totalP.toLocaleString()+`</td>
                                                <td class="text-center text-danger" id="">`+totalN.toLocaleString()+`</td>
                                                <td class="text-center">`+ per.toFixed(2) +`</td>
                                            </tr>`;
                                        

                                        
                                        totalN = 0;
                                        totalP = 0;
                                        
                                    });
                                    c = 0;
                                    return false;
                                });

                                per = (an * -100) / ap;

                                var tfoot = `
                                        <th colspan="">ยอดรวม</th>
                                        <th class="text-success">`+`รายรับ `+ap.toLocaleString()+` บาท`+`</th>
                                        <th class="text-danger">`+`รายจ่าย `+an.toLocaleString()+` บาท`+`</th>
                                        <th>รายจ่ายต่อรายรับ `+ per.toFixed(2) +` %`+`</th>
                                        `;
                                // ใส่ตาราง
                                $("table thead").html(thead);
                                $("table tbody").html(tbody);
                                $("table tfoot").html(tfoot);
                        } 
                        else {
                            alert('ไม่พบวันที่ค้นหา');
                        }
                    }
                });
            }
        }
    });
});
</script>
<?php }?> 