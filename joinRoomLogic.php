<?php
session_start();
require 'connect.php';
if(isset($_POST['join'])){
	$id = $_POST['roomID'];
    $_SESSION['roomID'] = $_POST['roomID'];
    $user = $_SESSION['username'];
	$sql = mysqli_query($con,"SELECT * FROM room where id_room = '$id'");
	$row  = mysqli_fetch_array($sql); 
    if(!is_array($row))
    {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Room ID tidak terdaftar');
        window.location.href='joinRoomUser.php';
        </script>");
        
    }
    else{
        $_SESSION['roomID'];
        header("Location: waitingRoom.php");
    }
}
?>