<?php
    require 'connect.php';
    $roomID = $_POST['roomID'];

    $sql = "DELETE FROM room WHERE id_room = $roomID";
    mysqli_query($con, $sql);

    $sql = "DELETE FROM history WHERE id_room = $roomID";
    mysqli_query($con, $sql);

    $sql = "DELETE FROM log_users WHERE id_room = $roomID";
    mysqli_query($con, $sql);

    $sql = "DELETE FROM temp_user WHERE id_room = $roomID";
    mysqli_query($con, $sql);

    header("Location: homeAdmin.php");
?>