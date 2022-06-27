<?php session_start();?>
<?php 

if ($_SESSION["Status"] != "admin"){  //check session

	Header("Location: login.php"); 

}else{?> 

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
                        <h2>บันทึกรายการบัญชี</h2>
                    </div>
                    <div class="col-12">
                        <a href="">หน้าหลัก</a>
                        <a href="">บันทึกรายการบัญชี</a>
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
                        <div class="food-item align-self-end">
                            <i class="flaticon-cooking"></i>
                            <h2>บันทึกรายการบัญชี ร้านอาหารปักษ์ใต้</h2>
                            <p>
                                โครงการวิจัยท่องเที่ยวเชิงอาหารภาคใต้เชื่อมโยงมาเลเซียและสิงคโปร์ 
                            </p>
                            <div class="row align-self-end">
                        <div class="col-md-4 align-self-end">
                            <div class="control-group align-self-end">
                                <div class="input-group text-left">
                                    <form method="post" id="insert_form" class="align-self-end">
                                    <div class="form-group align-self-end">
                                        <label for="Cdate">วันที่บันทึกรายการบัญชี</label>
                                        <input type="date" class="form-control align-self-end" id="Cdate" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        </div>
                        <p></p>
                        <div>
                            <button class="btn custom-btn" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">เริ่มบันทึกข้อมูลบันทึกรายการบัญชี</button>
                        </div>
                        <p></p>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                    <!-- <div class="table-repsonsive"> -->
                                     <span id="error"></span>
                                     <table class="table table-hover table-info text-center" id="income_table">
                                        <thead> 
                                            <tr>
                                                <th>ลำดับที่    </th>
                                                <th>รายการ</th>
                                                <th>ประเภท รับ/จ่าย</th>
                                                <th>จำนวนเงิน</th>
                                                <th>ลบ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <span id="rc" class="rc"></span>
                                            </td>
                                            <td>
                                                <input type="text" name="item_name" class="form-control list"/>
                                            </td>
                                            <td>
                                                <select name="income" class="form-control income">
                                                    <option value="">ประเภทรายรับ/รายจ่าย</option>
                                                    <option value="revenue">รายรับ</option>
                                                    <option value="pay">รายจ่าย</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" name="money" class="form-control money" step=".001"  placeholder="0.00"/>
                                            </td>
                                            <td>
                                                <button type="button" name="remove" class="btn btn-danger remove">ลบ</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span id="rc" class="rc"></span>
                                            </td>
                                            <td>
                                                <input type="text" name="item_name" class="form-control list"/>
                                            </td>
                                            <td>
                                                <select name="income" class="form-control income">
                                                    <option value="">ประเภทรายรับ/รายจ่าย</option>
                                                    <option value="revenue">รายรับ</option>
                                                    <option value="pay">รายจ่าย</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" name="money" class="form-control money" step=".001"  placeholder="0.00"/>
                                            </td>
                                            <td>
                                                <button type="button" name="remove" class="btn btn-danger remove">ลบ</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span id="rc" class="rc"></span>
                                            </td>
                                            <td>
                                                <input type="text" name="item_name" class="form-control list"/>
                                            </td>
                                            <td>
                                                <select name="income" class="form-control income">
                                                    <option value="">ประเภทรายรับ/รายจ่าย</option>
                                                    <option value="revenue">รายรับ</option>
                                                    <option value="pay">รายจ่าย</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" name="money" class="form-control money" step=".001"  placeholder="0.00"/>
                                            </td>
                                            <td>
                                                <button type="button" name="remove" class="btn btn-danger remove">ลบ</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span id="rc" class="rc"></span>
                                            </td>
                                            <td>
                                                <input type="text" name="item_name" class="form-control list"/>
                                            </td>
                                            <td>
                                                <select name="income" class="form-control income">
                                                    <option value="">ประเภทรายรับ/รายจ่าย</option>
                                                    <option value="revenue">รายรับ</option>
                                                    <option value="pay">รายจ่าย</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" name="money" class="form-control money" step=".001"  placeholder="0.00"/>
                                            </td>
                                            <td>
                                                <button type="button" name="remove" class="btn btn-danger remove">ลบ</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span id="rc" class="rc"></span>
                                            </td>
                                            <td>
                                                <input type="text" name="item_name" class="form-control list"/>
                                            </td>
                                            <td>
                                                <select name="income" class="form-control income">
                                                    <option value="">ประเภทรายรับ/รายจ่าย</option>
                                                    <option value="revenue">รายรับ</option>
                                                    <option value="pay">รายจ่าย</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" name="money" class="form-control money" step=".001"  placeholder="0.00"/>
                                            </td>
                                            <td>
                                                <button type="button" name="remove" class="btn btn-danger remove">ลบ</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="2">รวมยอดเงิน</th>
                                                <th ><span id="calr">ยอดรายรับ 0.00 บาท </span></th>
                                                <th ><span id="calp">ยอดรายจ่าย 0.00 บาท </span></th>
                                                <!-- <th colspan="2"><input type="text" id="cal" class="form-control" disabled value="0.00"/></th> -->
                                                <!-- <th><input type="submit" name="submit" class="btn btn-info" value="save" /></th> -->
                                                <!-- <th></th> -->
                                                <th><button type="button" name="add" class="btn btn-success text-light add ">เพิ่ม</button>
                                                <button type="button" name="add" class="btn btn-warning text-light clear ">เคลีย</button></th>
                                            </tr>
                                        </tfoot>
                                     </table>
                                    <!-- </div> -->
                                    
                                    
                                </div>
                            </div>                        <p></p>
                            
                            <div>
                                <button class="btn custom-btn" type="submit">บันทึก</button>
                                <button class="btn custom-btn" type="button" onclick="document.location='balance_sheet.php'">Report</button>
                            </div>
                        </form>
                        <hr>
                        <span class="text-center "> หมายเหตุ<br>
                            วิธีการใช้ : ใส่ชื่อรายการรายรับรายจ่ายลงในช่อง "รายการ" เพื่อระบุชื่อของรายการ และระบุประเภท
                            ของรายการว่าเป็นรายรับหรือรายจ่าย แล้วระบุจำนวนเงิน&#40;จำนวนเงินไม่สามารถมีเลขทศนิยมเกิน 3ตำแหน่ง&#41;ให้ตรงกับรายการที่เลือก 
                            เมื่อกด "เพิ่ม" จะทำการเพิ่มแถวรายการ และเมื่อกด "ลบ" จะลบแถวรายการที่เลือก เมื่อกด "เคลีย" จะทำให้ตารางรายรับรายจ่าย
                            กลับสู่ค่าเริ่มต้น เมื่อทำรายการเสร็จสิ้นให้กดที่ "บันทึก" เพื่อบันทึกรายรับรายจ่าย และกด <a href="balance_sheet.php">"Report"</a> เพื่อไปหน้า
                            ดูรายการที่บันทึกรายรับรายจ่าย


                        </span>
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
<script>
$(function() {
    row_count();
    
    // row count
    function row_count() {
            let tr_len = 1;
            $('#income_table tbody tr').each(function (r) {
                // $('.rc').replaceWith("<span id='rc' class='rc'>" + tr_len + "</span>");
                // tr_len++;
                $(this).find('.rc').html("<span id='rc' class='rc'>" + tr_len + "</span>");
                tr_len++;
            });
    };

    // add row
    $(document).on('click', '.add', function(){
    var add_row = '';
    add_row += `<tr>
                    <td>
                        <span id="rc" class="rc"></span>
                    </td>
                    <td>
                        <input type="text" name="item_name" class="form-control list"/>
                    </td>
                    <td>
                        <select name="income" class="form-control income">
                            <option value="">ประเภทรายรับ/รายจ่าย</option>
                            <option value="revenue">รายรับ</option>
                            <option value="pay">รายจ่าย</option>
                        </select>
                    </td>
                    <td>
                        <input type="number" name="money" class="form-control money" step=".001"  placeholder="0.00"/>
                    </td>
                    <td>
                        <button type="button" name="remove" class="btn btn-danger remove">ลบ</button>
                    </td>
                </tr>`;
    $('#income_table').append(add_row);
    calculate();
    row_count();
    });

//  remove row
    $(document).on('click', '.remove', function(){
        $(this).parents('tr').remove();
        calculate();
        row_count();
    });

// clear
    $(document).on('click', '.clear', function(){
        clear();
    });    
    // clear function
    function clear(){
        var nTB = `
        <tbody>
            <tr>
                <td>
                    <span id="rc" class="rc"></span>
                </td>
                <td>
                    <input type="text" name="item_name" class="form-control list"/>
                </td>
                <td>
                    <select name="income" class="form-control income">
                        <option value="">ประเภทรายรับ/รายจ่าย</option>
                        <option value="revenue">รายรับ</option>
                        <option value="pay">รายจ่าย</option>
                    </select>
                </td>
                <td>
                    <input type="number" name="money" class="form-control money" step=".001"  placeholder="0.00"/>
                </td>
                <td>
                    <button type="button" name="remove" class="btn btn-danger remove">ลบ</button>
                </td>
            </tr>
            <tr>
                <td>
                    <span id="rc" class="rc"></span>
                </td>
                <td>
                    <input type="text" name="item_name" class="form-control list"/>
                </td>
                <td>
                    <select name="income" class="form-control income">
                        <option value="">ประเภทรายรับ/รายจ่าย</option>
                        <option value="revenue">รายรับ</option>
                        <option value="pay">รายจ่าย</option>
                    </select>
                </td>
                <td>
                    <input type="number" name="money" class="form-control money" step=".001"  placeholder="0.00"/>
                </td>
                <td>
                    <button type="button" name="remove" class="btn btn-danger remove">ลบ</button>
                </td>
            </tr>
            <tr>
                <td>
                    <span id="rc" class="rc"></span>
                </td>
                <td>
                    <input type="text" name="item_name" class="form-control list"/>
                </td>
                <td>
                    <select name="income" class="form-control income">
                        <option value="">ประเภทรายรับ/รายจ่าย</option>
                        <option value="revenue">รายรับ</option>
                        <option value="pay">รายจ่าย</option>
                    </select>
                </td>
                <td>
                    <input type="number" name="money" class="form-control money" step=".001"  placeholder="0.00"/>
                </td>
                <td>
                    <button type="button" name="remove" class="btn btn-danger remove">ลบ</button>
                </td>
            </tr>
            <tr>
                <td>
                    <span id="rc" class="rc"></span>
                </td>
                <td>
                    <input type="text" name="item_name" class="form-control list"/>
                </td>
                <td>
                    <select name="income" class="form-control income">
                        <option value="">ประเภทรายรับ/รายจ่าย</option>
                        <option value="revenue">รายรับ</option>
                        <option value="pay">รายจ่าย</option>
                    </select>
                </td>
                <td>
                    <input type="number" name="money" class="form-control money" step=".001"  placeholder="0.00"/>
                </td>
                <td>
                    <button type="button" name="remove" class="btn btn-danger remove">ลบ</button>
                </td>
            </tr>
            <tr>
                <td>
                    <span id="rc" class="rc"></span>
                </td>
                <td>
                    <input type="text" name="item_name" class="form-control list"/>
                </td>
                <td>
                    <select name="income" class="form-control income">
                        <option value="">ประเภทรายรับ/รายจ่าย</option>
                        <option value="revenue">รายรับ</option>
                        <option value="pay">รายจ่าย</option>
                    </select>
                </td>
                <td>
                    <input type="number" name="money" class="form-control money" step=".001"  placeholder="0.00"/>
                </td>
                <td>
                    <button type="button" name="remove" class="btn btn-danger remove">ลบ</button>
                </td>
            </tr>
            </tbody>
            `;
            $('#income_table tbody').replaceWith(nTB);
            calculate();
            row_count();
    }
    

 
//  calculate
    function calculate() {
        // เก็บจำนวนเงิน
        var money = [];
        // เก็บว่าเป็นรายรับ/รายจ่าย
        var income = [];
        
        // ยอดรวม
        // var totle = 0.00;
        // เก็บรายการ
        // var list = [];
        // ยอดรายรับ
        var tor = 0.00;
        // ยอดรายจ่าย
        var top = 0.00;

        // list element
        // $('.list').each(function(i,element){
        //     list.push($(element).val());
        // });

        // income element
        $('.income').each(function(i,element){
            if ($(element).val() == "") {
                var ele = $(element).val();
                ele = "revenue";
                income.push(ele);
            }
            else {
                income.push($(element).val());
            };
            
        });

        // money element
        $('.money').each(function(i,elem){
            if ($(elem).val() == "") {
                var ele = parseFloat($(elem).val()); 
                ele = 0;
                money.push(ele);
            }
            else {
                money.push(parseFloat($(elem).val()));
            };
        });

        // คำนวน เก็บค่ารายรับ/จ่าย
            $.each(money,function(i){
                if (money[i] == "undefined") {
                    money[i] = 0;
                }
                
                if (income[i] == "pay") {
                    if (money[i] != "") {
                        // money[i] = (money[i]) * (-1);
                        top += money[i];
                        // negative[i] = money[i]; alert(plus);
                    }
                }
                else if (income[i] == "revenue"){
                    if (money[i] != "") {
                        tor += money[i];
                        // plus[i] = money[i];alert(negative);
                    }
                }
            });
            
            $('#calr').replaceWith('<span id="calr">'+ "ยอดรายรับ " + tor.toFixed(2) + " บาท"+'</span>');
            $('#calp').replaceWith('<span id="calp">'+ "ยอดรายจ่าย " + top.toFixed(2) + " บาท"+'</span>');
    };
// event เมื่อพิมพ์
    $(document).keyup(function(){
        calculate();
    });

    // event เมื่อเลือกประเภท
    $(document).change(function(){
        calculate();
        row_count();
    });
    

//  submit
    $('#insert_form').on('submit', function(event){
        event.preventDefault();
        // เก็บวันที่
        var Cdate = $('#Cdate').val();
        // เก็บerror
        var error = '';
        // เก็บ alert error
        var ae =[];
        // เก็บรายการ
        var list = [];
        // เก็บรายรับ
        var plus = [];
        // เก็บรายจ่าย
        var negative = [];
        // เก็บว่าเป็นรายรับ/รายจ่าย
        var income = [];
        // เก็บจำนวนเงิน
        var money = [];
        var ID_Store =  '<?php echo $_SESSION["ID_Store"]; ?>';
        // alert(ID_Store);

        if (Cdate == "") {
            alert("โปรดระบุวันที่ต้องการบันทึก");
        }
        else if (Cdate != ""){
            
            // เช็คค่าว่างรายการ
            $('.list').each(function(i,elem){
                if($(this).val() == '')
                {
                    error += "<p>โปรดระบุรายการให้ครบทุกแถว</p>";
                    ae.push("โปรดระบุรายการให้ครบทุกแถว");
                    return false;
                }
                else{
                    list.push($(elem).val());
                }
            });
            
            // เช็คค่าว่างรายรับ/จ่าย
            $('.income').each(function(i,elem){
                if($(this).val() == '')
                {
                    error += "<p>โปรดเลือกประเภทรายรับ/รายจ่ายให้ครบทุกแถว</p>";
                    ae.push("โปรดเลือกประเภทรายรับ/รายจ่ายให้ครบทุกแถว");
                    return false;
                }
                else{
                    income.push($(elem).val());
                }
                
            });
            
            // เช็คค่าว่างเงิน
            $('.money').each(function(i,elem){
                if($(this).val() == '')
                {
                    error += "<p>โปรดใส่จำนวนเงินในแต่ละรายการให้ครบทุกแถว</p>";
                    ae.push("โปรดใส่จำนวนเงินในแต่ละรายการให้ครบทุกแถว");
                    return false;
                }
                else{
                    money.push($(elem).val());
                }
                
            });
            // alert($('#income_table tbody tr').length);
            // alert(list);
            // alert(income);
            // alert(money);

            // var form_data = $(this).serialize();
            if (($('#income_table tbody tr').length) == "0") {
                alert("โปรดเพิ่มบรรทัดรายการ");
                // error += "<p>โปรดเพิ่มบรรทัดรายการ</p>";
                // ae.push("โปรดเพิ่มบรรทัดรายการ");
                // return false;
            }
            else if(error == ''){
                // alert("hey");
                $.ajax({
                    url:"earnings_save.php",
                    method:"POST",
                    data:{
                        Cdate:Cdate,
                        list:list,
                        income:income,
                        money:money,
                        ID_Store:ID_Store,
                    },
                    success:function(data){
                        // alert(data);
                        if(data == 'ok'){
                            alert("บันทึกข้อมูลสำเร็จ");
                            clear();
                            calculate();
                            row_count();
                            $('#error').html('<span id="error"></span>');
                        }
                    }
                });
            }
            else{
                alert(ae.join('\n'));
                $('html, body').animate({ scrollTop: $('#error').offset().top }, 'fast');
                $('#error').html('<div class="alert alert-danger">'+error+'</div>');
            }
        }
    });

});
</script>
<?php }?> 