<?php
    if(isset($_POST['create'])){
        require 'connect.php';
        $code = $_POST["roomCode"];
        $id = $_SESSION["usernameADM"];

        // date_default_timezone_set('Asia/Jakarta');
        $tanggal = date("Y-m-d");
        $sql = "INSERT INTO room VALUES ('$code','$id',0, '$tanggal')";
        $res = mysqli_query($con,$sql);
        $_SESSION['roomID_admin'] = $code;
        header("Location: waitingRoom.php");
    }
?>