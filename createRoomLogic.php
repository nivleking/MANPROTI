<?php
    if(isset($_POST['create'])){
        require 'connect.php';
        $code = htmlspecialchars($_POST["roomCode"]);
        $deck = htmlspecialchars($_POST["selectDeck"]);
        $id = $_SESSION["usernameADM"];
        $tanggal = date("Y-m-d");

        $sql = "UPDATE bay SET id_deck = '$deck'";
        mysqli_query($con,$sql);

        $sql2 = "SELECT id_room FROM room";
        $result = mysqli_query($con,$sql2);

        $tmp = true;
        while ($row = mysqli_fetch_array($result)) {
            if ($row['id_room'] == $code) {
                $tmp = false;
                break;
            }
        }

        if ($tmp) {
            $sql = "INSERT INTO room VALUES ('$code','$id',0, '$tanggal','$deck','')";
            $res = mysqli_query($con,$sql);
            $_SESSION['roomID_admin'] = $code;
        }
        header("Location: waitingRoom2.php");
    }
?>