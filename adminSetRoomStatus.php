<?php
    require 'connect.php';
    $room = $_SESSION['roomID_admin'];
    $values = 1;
    $sql = "UPDATE room SET status=? WHERE id_room =?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ii",$values,$room);
    $stmt->execute();
    header('Location : waitingRoom.php');
?>  