<?php
session_start();
    if(isset($_POST['create'])){
        require 'connect.php';
        $code = $_POST["roomCode"];
        $id = $_SESSION["username"];
        $sql = "INSERT INTO room VALUES ('$code','$id',0)";
        $res = mysqli_query($con,$sql);
        $_SESSION['roomID_admin'] = $code;
        header("Location: createRoom.php");
    }
?>