<?php
    if(isset($_POST['create'])){
        require 'connect.php';
        $code = htmlspecialchars($_POST["roomCode"]);
        $deck = htmlspecialchars($_POST["selectDeck"]);
        $id = $_SESSION["usernameADM"];
        $tanggal = date("Y-m-d");

        $sql = "INSERT INTO room VALUES ('$code','$id',0, '$tanggal','$deck','')";
        $res = mysqli_query($con,$sql);
        $_SESSION['roomID_admin'] = $code;
        header("Location: waitingRoom2.php");
    }
?>