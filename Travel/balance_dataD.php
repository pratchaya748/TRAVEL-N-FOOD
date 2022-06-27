<?php
require ('sever.php');
// รับค่าจาก jQuery
$s = $_POST['s'];
$e = $_POST['e'];
$ID_Store = $_POST['ID_Store'];

$result = mysqli_query($conn, "SELECT * FROM transaction WHERE Date BETWEEN '$s' AND '$e' AND ID_Store = '$ID_Store' ORDER BY Date");

$data = array();
while ($row = mysqli_fetch_object($result))
{
    $data[] = $row;
}
echo json_encode($data);
?>