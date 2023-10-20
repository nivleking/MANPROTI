<?php
session_start();
require 'connect.php';
if(isset($_POST['save'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = mysqli_query($con,"SELECT * FROM user where team_name ='$username' and password='$password'");
	$row  = mysqli_fetch_array($sql); 
    if(is_array($row))
    {
        $_SESSION["username"]=$row['team_name'];
        $name = $_SESSION['username'];
        $_SESSION["password"]=$row['password'];
        $sql = mysqli_query($con,"UPDATE user SET status = '1' WHERE team_name = '$name'"); 
        header("Location: joinRoomUser.php");
        
    }
    else
    {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Invalid Username/Password');
        window.location.href='loginAdmin.php';
        </script>");
    }
}
?>