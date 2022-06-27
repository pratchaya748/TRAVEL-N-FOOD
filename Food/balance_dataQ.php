<?php
require ('sever.php');
// รับค่าจาก jQuery
$y = $_POST['y'];
$ID_Store = $_POST['ID_Store'];

settype($y, "string");
$sy = $y."-01-01";
$ey = $y."-12-31";

$result = mysqli_query($conn, "SELECT *,MONTH(Date) AS month FROM transaction WHERE Date BETWEEN '$sy' AND '$ey'  AND ID_Store = '$ID_Store' ORDER BY Date");

$data = array();
while ($row = mysqli_fetch_object($result))
{
    $data[] = $row;
}
echo json_encode($data);
?>