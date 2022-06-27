<?php 
session_start();
        if(isset($_POST['txtUsername'])){
				//connection
                  include("sever.php");
				//รับค่า user & password
                  $Username = $_POST['txtUsername'];
                  $Password = $_POST['txtPass'];
				//query 
                  $sql="SELECT user.ID_User,user.Status 
                        FROM user 
                        WHERE user.ID_User ='".$Username."' AND user.Password='".$Password."'";

                  $result = mysqli_query($conn,$sql);
				
                  if(mysqli_num_rows($result)==1){

                      $row = mysqli_fetch_array($result);

                      $_SESSION["ID_User"] = $row["ID_User"];
                      $_SESSION["Status"] = $row["Status"];

                      if($_SESSION["Status"]=="admin"){ //ถ้าเป็น admin 

                        Header("Location: inquiry_report_admin.php");

                      }

                      if ($_SESSION["Status"]=="owner"){  //ถ้าเป็น owner 

                        $sql2="SELECT store.ID_Store,store.Store_Name,store.ID_User,user.ID_User,user.Status 
                        FROM store,user 
                        WHERE store.ID_User = user.ID_User AND user.ID_User ='".$Username."' AND user.Password='".$Password."'";
                        $result2 = mysqli_query($conn,$sql2);
                        $row2 = mysqli_fetch_array($result2);

                        $_SESSION["ID_User"] = $row2["ID_User"];
                        $_SESSION["Status"] = $row2["Status"];
                        $_SESSION['ID_Store'] = $row2["ID_Store"];
                        $_SESSION['Store_Name'] = $row2["Store_Name"];

                        Header("Location: earnings_statement.php");

                      }
                      else {
                        echo "<script>";
                        echo "alert(\" 11111111111111111\");"; 
                        echo "window.history.back()";
                        echo "</script>";
                      }

                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";
                  }

        }else{
             Header("Location: login.php"); //user & password incorrect back to login again

        }
?>