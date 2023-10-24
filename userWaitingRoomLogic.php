<?php
    require 'connect.php';
    
    $room = $_SESSION['roomID'];
    $sql = "SELECT status FROM room WHERE id_room = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i",$room);
    $stmt->execute();
    $result = $stmt->get_result();
    if (mysqli_fetch_array($result)[0] == 1) {
        echo 'sukses';
    }
    else {
        echo '<h2>Waiting for Host To Start The Game</h2>';
    }
    exit();
?>