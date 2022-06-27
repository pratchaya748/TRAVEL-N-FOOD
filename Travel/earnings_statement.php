<?php session_start();?>
<?php 

if ($_SESSION["Status"] != "owner"){  //check session

	Header("Location: login.php"); 

}else{?> 

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
    
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light text-dark" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.html">การท่องเที่ยวเชิงอาหารพื้นถิ่นภาคใต้ มาเลเซีย และสิงคโปร์</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>
  
        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="index.html" class="nav-link">หน้าหลัก</a></li>
            <!-- <li class="nav-item"><a href="inquiry_form.html" class="nav-link">แบบสอบถาม</a></li> -->
            <li class="nav-item"><a href="inquiry_report.php" class="nav-link">ความพึงพอใจ</a></li>
            <!-- <li class="nav-item"><a href="earnings_statement.php" class="nav-link">งบการเงิน</a></li> -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">งบการเงิน</a>
                <div class="dropdown-menu">
                    <a href="earnings_statement.php" class="dropdown-item">ทำบัญชี</a>
                    <a href="balance_sheet.php" class="dropdown-item">รายงาน</a>
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
                    <a class="nav-link active" aria-current="true" href="#">งบการเงิน</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
              <form method="post" id="insert_form" class="align-self-end">
                  <div class="col-md-4">
                      <label for="Cdate" class="text-dark">วันที่บันทึกรายการบัญชี</label>
                      <input type="date" class="form-control align-self-end" id="Cdate" >
                  </div>
                <hr/>
                <h5 class="card-title">บันทึกรายการรับ - รายจ่าย</h5>
                <div class="card card-body">
                         <span id="error"></span>
                         <table class="table table-hover table-info text-center text-dark" id="income_table">
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
                                    <th><button type="button" name="add" class="btn btn-success text-light add ">เพิ่ม</button>
                                    <button type="button" name="add" class="btn btn-warning text-light clear ">เคลีย</button></th>
                                </tr>
                            </tfoot>
                         </table>
                        
                        
                         <div>
                             <button class="btn btn btn-success" type="submit">บันทึก</button>
                             <button class="btn btn btn-warning" type="button" onclick="document.location='balance_sheet.php'">Report</button>
                         </div>
                    </div>
                </div>                      
            </form>
            <!-- <hr/> -->
            <span class="text-center text-dark"> หมายเหตุ<br>
                วิธีการใช้ : ใส่ชื่อรายการรายรับรายจ่ายลงในช่อง "รายการ" เพื่อระบุชื่อของรายการ และระบุประเภท
                ของรายการว่าเป็นรายรับหรือรายจ่าย แล้วระบุจำนวนเงิน&#40;จำนวนเงินไม่สามารถมีเลขทศนิยมเกิน 3ตำแหน่ง&#41;ให้ตรงกับรายการที่เลือก 
                เมื่อกด "เพิ่ม" จะทำการเพิ่มแถวรายการ และเมื่อกด "ลบ" จะลบแถวรายการที่เลือก เมื่อกด "เคลีย" จะทำให้ตารางรายรับรายจ่าย
                กลับสู่ค่าเริ่มต้น เมื่อทำรายการเสร็จสิ้นให้กดที่ "บันทึก" เพื่อบันทึกรายรับรายจ่าย และกด <a href="balance_sheet.php">"Report"</a> เพื่อไปหน้า
                ดูรายการที่บันทึกรายรับรายจ่าย


            </span>
            </div>
              </div>
            </div>

                  
            
            <!--p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="inquiry_form.html">แบบสอบถาม</a></span></p-->
          </div>
        </div>
      </div>
      <div>
    </div>



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
            alert(income);
            alert(money);

            if (($('#income_table tbody tr').length) == "0") {
                alert("โปรดเพิ่มบรรทัดรายการ");
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

</script>
<?php }?> 