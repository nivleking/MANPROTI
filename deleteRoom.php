<?php
    require 'connect.php';
    $roomID = $_POST['roomID'];

    $sql = "DELETE FROM room WHERE id_room = $roomID";
    mysqli_query($con, $sql);

    header("Location: homeAdmin.php");
?>