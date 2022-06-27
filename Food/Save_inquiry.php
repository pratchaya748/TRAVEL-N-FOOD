<?php
include ("sever.php");

if (isset($_POST['gender'])) {
	
	$gender = $_POST['gender'];
	$age = $_POST['age'];
	$education = $_POST['education'];
	$career = $_POST['career'];
	$db = $_POST['db'];

	$n1 = $_POST['n1'];
	$n2 = $_POST['n2'];
	$n3 = $_POST['n3'];

	$k1 = $_POST['k1'];
	$k2 = $_POST['k2'];
	$k3 = $_POST['k3'];

	$ak1 = $_POST['ak1'];
	$ak2 = $_POST['ak2'];
	$ak3 = $_POST['ak3'];
	
	$a1 = $_POST['a1'];
	$a2 = $_POST['a2'];
	$a3 = $_POST['a3'];
	$a4 = $_POST['a4'];
	
	$b1 = $_POST['b1'];
	$b2 = $_POST['b2'];
	$b3 = $_POST['b3'];
	$b4 = $_POST['b4'];
	$b5 = $_POST['b5'];
	
	$c1 = $_POST['c1'];
	$c2 = $_POST['c2'];
	$c3 = $_POST['c3'];
	$c4 = $_POST['c4'];
	$c5 = $_POST['c5'];

	$d1 = $_POST['d1'];
	$d2 = $_POST['d2'];
	$d3 = $_POST['d3'];

	$e1 = $_POST['e1'];
	$e2 = $_POST['e2'];
	$e3 = $_POST['e3'];

	$f1 = $_POST['f1'];
	$f2 = $_POST['f2'];
	$f3 = $_POST['f3'];
	$f4 = $_POST['f4'];

	$g1 = $_POST['g1'];
	$g2 = $_POST['g2'];
	$g3 = $_POST['g3'];
	$g4 = $_POST['g4'];
	$g5 = $_POST['g5'];
	$g6 = $_POST['g6'];
	$g7 = $_POST['g7'];

	
	
	$sql1 = "INSERT INTO answer (Questionnaire_id,Answer) VALUES 
	('gender','$gender'),
	('age','$age'),
	('education','$education'),
	('career','$career'),
	('db','$db'),
	('k1','$k1'),
	('k2','$k2'),
	('k3','$k3'),
	('n1','$n1'),
	('n2','$n2'),
	('n3','$n3'),
	('a1','$a1'),
	('a2','$a2'),
	('a3','$a3'),
	('a4','$a4'),
	('b1','$b1'),
	('b2','$b2'),
	('b3','$b3'),
	('b4','$b4'),
	('b5','$b5'),
	('c1','$c1'),
	('c2','$c2'),
	('c3','$c3'),
	('c4','$c4'),
	('c5','$c5'),
	('d1','$d1'),
	('d2','$d2'),
	('d3','$d3'),
	('e1','$e1'),
	('e2','$e2'),
	('e3','$e3'),
	('f1','$f1'),
	('f2','$f2'),
	('f3','$f3'),
	('f4','$f4'),
	('g1','$g1'),
	('g2','$g2'),
	('g3','$g3'),
	('g4','$g4'),
	('g5','$g5'),
	('g6','$g6'),
	('g7','$g7')
	";
	
	if ($ak1 == "") {
		$ak1 = "-";
	}
	if ($ak2 == "") {
		$ak2 = "-";
	}
	if ($ak3 == "") {
		$ak3 = "-";
	}
	$sql2 = "INSERT INTO known_food (Nakornsornthiromaraj,Phuket,Songkhla) VALUES ('$ak1','$ak2','$ak3')";
	$query2 = mysqli_query($conn,$sql2);


	$query1 = mysqli_query($conn,$sql1);
	
	
	foreach ($_POST['ct1'] as $key => $value) 
	{
		
		$ct1=$_POST['ct1'][$key];

		$sql3="INSERT INTO answer (Questionnaire_id,Answer) VALUES 
		('ct1','$ct1')";
		$query3=mysqli_query($conn,$sql3);
		
	}

	foreach ($_POST['ct2'] as $key => $value) 
	{
		$ct2=$_POST['ct2'][$key];

		$sql4="INSERT INTO answer (Questionnaire_id,Answer) VALUES 
		('ct2','$ct2')";
		$query4=mysqli_query($conn,$sql4);
		
	}
	
	foreach ($_POST['ct3'] as $key => $value) 
	{
		$ct3=$_POST['ct3'][$key];

		$sql5="INSERT INTO answer (Questionnaire_id,Answer) VALUES 
		('ct3','$ct3')";
		$query5=mysqli_query($conn,$sql5);
		
	}
	
	foreach ($_POST['ct4'] as $key => $value) 
	{
		$ct4=$_POST['ct4'][$key];

		$sql6="INSERT INTO answer (Questionnaire_id,Answer) VALUES 
		('ct4','$ct4')";
		$query6=mysqli_query($conn,$sql6);
		
	}
	
	foreach ($_POST['ct5'] as $key => $value) 
	{
		$ct5=$_POST['ct5'][$key];

		$sql7="INSERT INTO answer (Questionnaire_id,Answer) VALUES 
		('ct5','$ct5')";
		$query7=mysqli_query($conn,$sql7);
		
	}
	
	foreach ($_POST['ct6'] as $key => $value) 
	{
		$ct6=$_POST['ct6'][$key];

		$sql8="INSERT INTO answer (Questionnaire_id,Answer) VALUES 
		('ct6','$ct6')";
		$query8=mysqli_query($conn,$sql8);
		
	}
	
	foreach ($_POST['ct7'] as $key => $value) 
	{
		$ct7=$_POST['ct7'][$key];

		$sql9="INSERT INTO answer (Questionnaire_id,Answer) VALUES 
		('ct7','$ct7')";
		$query9=mysqli_query($conn,$sql9);
		
	}


	if ($query1 && $query2 && $query3 && $query4 && $query5 && $query6 && $query7 && $query8 && $query9 ) {
		$data = "บันทึกข้อมูลสำเร็จ";
		echo json_encode($data);
	}
	else{
		$data = "บันทึกข้อมูลไม่สำเร็จ";
		echo json_encode($data);
	}
}


?>

