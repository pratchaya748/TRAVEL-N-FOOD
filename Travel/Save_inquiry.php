<?php
include ("sever.php");


$gender = $_POST['gender'];
$age = $_POST['age'];
$status = $_POST['status'];

$a1 = $_POST['a1'];
$a2 = $_POST['a2'];
$a3 = $_POST['a3'];
$a4 = $_POST['a4'];
$a5 = $_POST['a5'];
$a6 = $_POST['a6'];
$a7 = $_POST['a7'];

$b1 = $_POST['b1'];
$b2 = $_POST['b2'];
$b3 = $_POST['b3'];
$b4 = $_POST['b4'];
$b5 = $_POST['b5'];
$b6 = $_POST['b6'];
$b7 = $_POST['b7'];
$b8 = $_POST['b8'];
$b9 = $_POST['b9'];
$b10 = $_POST['b10'];
$b11 = $_POST['b11'];
$b12 = $_POST['b12'];
$b13 = $_POST['b13'];
$b14 = $_POST['b14'];
$b15 = $_POST['b15'];

$c1 = $_POST['c1'];
$c2 = $_POST['c2'];
$c3 = $_POST['c3'];
$c4 = $_POST['c4'];
$c5 = $_POST['c5'];
$c6 = $_POST['c6'];
$c7 = $_POST['c7'];
$c8 = $_POST['c8'];

$sql = "INSERT INTO answer (Questionnaire_id,Answer) VALUES 
('gender','$gender'),
('age','$age'),
('status','$status'),
('a1','$a1'),
('a2','$a2'),
('a3','$a3'),
('a4','$a4'),
('a5','$a5'),
('a6','$a6'),
('a7','$a7'),
('b1','$b1'),
('b2','$b2'),
('b3','$b3'),
('b4','$b4'),
('b5','$b5'),
('b6','$b6'),
('b7','$b7'),
('b8','$b8'),
('b9','$b9'),
('b10','$b10'),
('b11','$b11'),
('b12','$b12'),
('b13','$b13'),
('b14','$b14'),
('b15','$b15'),
('c1','$c1'),
('c2','$c2'),
('c3','$c3'),
('c4','$c4'),
('c5','$c5'),
('c6','$c6'),
('c7','$c7'),
('c8','$c8')
";
$query = mysqli_query($conn,$sql);
if ($query) {
    $data = "บันทึกข้อมูลสำเร็จ";
    echo json_encode($data);
}
// echo $gender;
// echo $age;
// echo $status;
// echo $a4 ;
// echo $a5 ;
// echo $a6 ;
// echo $a7 ;
// echo $b10 ;
// echo $b11 ;
// echo $b12 ;
// echo $b13 ;
// echo $b14 ;
// echo $b15 ;

// if ($a1) {
//     $id = 'a1';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$a1')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($a2) {
//     $id = 'a2';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$a2')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($a3) {
//     $id = 'a3';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$a3')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($a4) {
//     $id = 'a4';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$a4')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($a5) {
//     $id = 'a5';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$a5')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($a6) {
//     $id = 'a6';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$a6')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($a7) {
//     $id = 'a7';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$a7')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($gender) {
//     $id = 'gender';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$gender')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($age) {
//     $id = 'age';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$age')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($status) {
//     $id = 'status';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$astatus')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($b1) {
//     $id = 'b1';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$b1')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($b2) {
//     $id = 'b2';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$b2')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($b3) {
//     $id = 'b3';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$b3')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($b4) {
//     $id = 'b4';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$b4')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($b5) {
//     $id = 'b5';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$b5')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($b6) {
//     $id = 'b6';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$b6')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($b7) {
//     $id = 'b7';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$b7')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($b8) {
//     $id = 'b8';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$b8')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($b9) {
//     $id = '$b9';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$b9')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($b10) {
//     $id = '$b10';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$b10')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($b11) {
//     $id = '$b11';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$b11')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($b12) {
//     $id = '$b12';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$b12')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($b13) {
//     $id = '$b13';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$b13')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($b14) {
//     $id = '$b14';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$b14')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($b15) {
//     $id = '$b15';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$b15')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($c1) {
//     $id = 'c1';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$c1')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($c2) {
//     $id = 'c2';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$c2')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($c3) {
//     $id = 'c3';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$c3')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($c4) {
//     $id = 'c4';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$c4')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($c5) {
//     $id = 'c5';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$c5')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($c6) {
//     $id = 'c6';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$c6')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($c7) {
//     $id = 'c7';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) 
//              VALUES ('$id','$c7')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }
// if ($c8) {
//     $id = 'c8';
//     $sql = "INSERT INTO answer (Questionnaire_id,Answer) VALUES ('$id','$c8')";
//     $query = mysqli_query($conn,$sql);
//     $data = "บันทึกข้อมูลสำเร็จ";
//     echo json_encode($data);
// }






?>