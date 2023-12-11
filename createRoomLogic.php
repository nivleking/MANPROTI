<?php
    if(isset($_POST['create'])){
        require 'connect.php';
        $code = htmlspecialchars($_POST["roomCode"]);
        $deck = htmlspecialchars($_POST["selectDeck"]);
        $id = $_SESSION["usernameADM"];
        $tanggal = date("Y-m-d");

        if ($code != 0) {
            $sql = "SELECT list_card FROM deck WHERE id_deck = '1'";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);
            
            $listArray = json_decode($row['list_card'], true);
            if ($listArray !== null) {
                $uniqueValues = array();            
                foreach ($listArray as $number) {
                    $sql = "SELECT * FROM sales WHERE id_sales = $number";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($result);

                    $originValue = $row['origin'];

                    $sql = "UPDATE bay SET id_deck = '$deck' WHERE nama_bay = '$originValue'";
                    mysqli_query($con, $sql);
                }
                // print_r($uniqueValues);
            } else {
                echo "Error decoding the list.\n";
            }

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
        else {
            header("Location: homeAdmin.php");
        }
    }
?>