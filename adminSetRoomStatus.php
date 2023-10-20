<?php
    function setRoomStatus($value,$roomID) {
        require 'connect.php';
        $sql = "UPDATE room SET status=? WHERE id_room =?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ii",$value,$roomID);
        $stmt->execute();
    }
?>  