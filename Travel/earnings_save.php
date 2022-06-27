<?php
session_start();
if(isset($_POST["Cdate"])){
    include('sever.php');
    $Cdate = $_POST["Cdate"];
    $Pdate = date("Y/m/d");
    $ID_Store = $_POST["ID_Store"];

    $sql = "";

    $connect = new PDO("mysql:host=localhost;dbname=travel", "root", "");
    
    $order_id = uniqid();
    for($count = 0; $count < count($_POST["list"]); $count++){  
        $query = "INSERT INTO transaction 
        (Date,Date_of_Record,List,ID_TransactionType,Amount,ID_Store) 
        VALUES (:Date,:Date_of_Record,:List,:ID_TransactionType,:Amount,:ID_Store)
        ";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':Date'   => $Cdate,
                ':Date_of_Record'  => $Pdate, 
                ':List'  => $_POST["list"][$count], 
                ':ID_TransactionType' => $_POST["income"][$count], 
                ':Amount'  => $_POST["money"][$count],
                ':ID_Store'  => $ID_Store
            )
        );
    }
    $result = $statement->fetchAll();
    if(isset($result)){
        echo 'ok';
    }
}
?>
