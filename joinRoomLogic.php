<?php
    require 'connect.php';
    if(isset($_POST['join'])){
        $id = $_POST['roomID'];
        $_SESSION['roomID'] = $_POST['roomID'];
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
            $room = $_SESSION['roomID'];
            $name = $_SESSION['username'];
            $sql = mysqli_query($con,"UPDATE user SET id_room = '$room' WHERE team_name = '$name'");
            header("Location: waitingRoom.php");
        }
    }
?>