<?php session_start();?>
<?php 

if ($_SESSION["Status"] != "owner"){  //check session

	Header("Location: login.php"); 

}else{?> 

<?php 
include('sever.php');
$ID_Store = $_SESSION["ID_Store"];
$sql1 = "SELECT YEAR(Date) AS year FROM transaction WHERE ID_Store = '$ID_Store' GROUP BY year ORDER BY year DESC";
$result1 = mysqli_query($conn,$sql1);
$sql2 = "SELECT MAX(Date) AS max,MIN(Date) AS min FROM transaction WHERE ID_Store = '$ID_Store'";
$result2 = mysqli_query($conn,$sql2);
$mm = mysqli_fetch_assoc($result2);
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

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
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
                        <!-- <a href="index.html" class="nav-item nav-link active">หน้าหลัก</a> -->
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">รายรับ/รายจ่าย</a>
                            <div class="dropdown-menu">
                                <a href="earnings_statement.php" class="dropdown-item">ทำบัญชี</a>
                                <a href="balance_sheet.php" class="dropdown-item">รายงาน รายรับ/รายจ่าย</a>
                            </div>
                        </div>
                        <!--a href="about.html" class="nav-item nav-link">Restaurants</a-->
                        <!-- <a href="about.html" class="nav-item nav-link">แบบสอบถาม</a> -->
                        <a href="inquiry_report.php" class="nav-item nav-link">รายงาน ความพึงพอใจ</a>
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
                        <h2>รายงานรายรับ/รายจ่าย</h2>
                    </div>
                    <div class="col-12">
                        <a href="">หน้าหลัก</a>
                        <a href="">รายงานรายรับ/รายจ่าย</a>
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
                    <form action="" method="POST" id="budget">
                        <div class="food-item">
                            <i class="flaticon-cooking"></i>
                            <h2>รายงานรายรับ/รายจ่าย ร้านอาหารปักษ์ใต้</h2>
                            <p>
                                โครงการวิจัยท่องเที่ยวเชิงอาหารภาคใต้เชื่อมโยงมาเลเซียและสิงคโปร์ 
                            </p>
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
                                <button class="btn custom-btn report" type="submit">ดู Report</button>
                                <button class="btn custom-btn pdf" type="button" id="pdf">PDF</button>
                            </div>
                    </form>        
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
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="footer-contact">
                                    <h2>Our Address</h2>
                                    <p><i class="fa fa-map-marker-alt"></i>123 Street, New York, USA</p>
                                    <p><i class="fa fa-phone-alt"></i>+012 345 67890</p>
                                    <p><i class="fa fa-envelope"></i>info@example.com</p>
                                    <div class="footer-social">
                                        <a href=""><i class="fab fa-twitter"></i></a>
                                        <a href=""><i class="fab fa-facebook-f"></i></a>
                                        <a href=""><i class="fab fa-youtube"></i></a>
                                        <a href=""><i class="fab fa-instagram"></i></a>
                                        <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="footer-link">
                                    <h2>Quick Links</h2>
                                    <a href="">Terms of use</a>
                                    <a href="">Privacy policy</a>
                                    <a href="">Cookies</a>
                                    <a href="">Help</a>
                                    <a href="">FQAs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="footer-newsletter">
                            <h2>Newsletter</h2>
                            <p>
                                Lorem ipsum dolor sit amet elit. Quisque eu lectus a leo dictum nec non quam. Tortor eu placerat rhoncus, lorem quam iaculis felis, sed lacus neque id eros.
                            </p>
                            <div class="form">
                                <input class="form-control" placeholder="Email goes here">
                                <button class="btn custom-btn">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <p>Copyright &copy; <a href="#">Your Site Name</a>, All Right Reserved.</p>
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
        // alert(th);
        // console.log(table);

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
            var store = '<?php echo $_SESSION["Store_Name"]; ?>';

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
            

            

            // window.location.href = "income_sheet.pdf";
            // var table = $('#collapseExample');
            
            // var doc = new jsPDF();
            // doc.addFont('supermarket.ttf', 'supermarket', 'normal');
            // doc.setFont('supermarket');
            // // doc.autoTable({ html: '#treport' });
            // // doc.autoTable({
            // //     theme: 'plain',
            // //     font:'supermarket'
            // // });
            // doc.text('รายงาน รายรับ/รายจ่าย',80, 20);
            // // doc.fromHTML($('#tcard').html(),10,40,{
            // //    "width":80,
            // //    "height":20,
            // //    "font":"supermarket"
            // // });

            // doc.save("income.pdf");
                // html2canvas($('#tcard')[0],{
                //     onrendered:function(canvas){
                //         var data = canvas.toDataURL();
                //         var docDefinition={
                //             content:[{
                //                 image:data,
                //                 width:500
                //             }]
                //         };
                //         pdfMake.createPdf(docDefinition).download("income.pdf");
                //     }
                // });

        }
        // var table_head = [];
        // $("#treport thead th").each(function(i){
        //     table_head[i] = $(this).text();
        // });
        // // console.log(table_head);

        // var table_data = [];
        // $("#treport td").each(function(i){
        //     table_data[i] = $(this).text();
        // });
        // // console.log(table_data);

        // var table_foot = [];
        // $("#treport tfoot th").each(function(i){
        //     table_foot[i] = $(this).text();
        // });
        // console.log(table_foot);
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