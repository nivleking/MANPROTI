<?php

require 'connect.php';
if(isset($_POST['save'])){
	$username = $_POST['usernameADM'];
	$password = $_POST['passwordADM'];
	$sql = mysqli_query($con,"SELECT * FROM admin where id_admin='$username' and password='$password'");
	$row  = mysqli_fetch_array($sql); 
    if(is_array($row))
    {
        $_SESSION["usernameADM"]=$row['id_admin'];
        $_SESSION["passwordADM"]=$row['password'];       
        header("Location: homeAdmin.php");
        
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