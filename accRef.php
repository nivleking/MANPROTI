<?php
require 'connect.php';

if(isset($_POST['accept'])){
    $id = $_SESSION['username']; 
    $sales = $_SESSION['rand'];
    $sql = "SELECT * FROM container WHERE id_sales = '$sales'";
    $result = mysqli_query($con,$sql);

    while($row = mysqli_fetch_array($result)){
        $val = $row[0];
        $sql = "INSERT INTO temp_container2 VALUES ('$val','$id')";
        $result2 = mysqli_query($con,$sql);    
    }

    
    $sql = "SELECT * FROM sales WHERE id_sales = '$sales'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    $revenue = $row[4] * $row[5];

    
    $sql = "SELECT * FROM user WHERE team_name = '$id'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);

    $revenue = $revenue + $row[6];

    
    $sql = "UPDATE user SET revenue = '$revenue' WHERE team_name = '$id'";
    $result = mysqli_query($con,$sql);


    $sql = "DELETE FROM sales WHERE id_sales = '$sales'";
    $result = mysqli_query($con,$sql);
    echo ("<script LANGUAGE='JavaScript'>
                window.location.href='game2.php';
            </script>");
}

if(isset($_POST['refuse'])){
    $id = $_SESSION['username']; 
    $sales = $_SESSION['rand'];
    $sql = "DELETE FROM sales WHERE id_sales = '$sales'";
    $result = mysqli_query($con,$sql);

    echo ("<script LANGUAGE='JavaScript'>
                window.location.href='game2.php';
            </script>");
}
?>