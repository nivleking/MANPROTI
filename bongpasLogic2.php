<?php
    require 'connect.php';

    $id = $_SESSION['username'];
    $sql = "SELECT pindah, finish from user where team_name = '$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $roomID = $_SESSION['roomID'];
    
    if($row['pindah'] == 'YES') {
        $roomID = $_SESSION['roomID'];
        $sql = "UPDATE user SET pindah = 'NO' WHERE team_name = '$id'";
        mysqli_query($con,$sql);
        echo "YES";
    }

    if (isset($_POST['finishGame'])) {
        $sql = "SELECT * FROM user WHERE id_room = '$roomID' AND team_name='$id'";
        $result = mysqli_query($con, $sql);
        $tanggal = date("Y-m-d H:i:s");

        while ($row = mysqli_fetch_array($result)) {
            $team = $row[0];
            $ship = $row[2];
            $origin = $row[5];
            $revenue = $row[6];
            $round = $row[7];
            $room = $row[4];
            
            $sql = "INSERT INTO history VALUES ('$tanggal','$round','$team','$ship','$origin','$revenue','$room')";
            $result2 = mysqli_query($con, $sql);
        }

        $sql = "SELECT * FROM temp_sales WHERE id_user = '$id'";
        $result = mysqli_query($con,$sql);
        while($rows = mysqli_fetch_array($result)){
            $sale = $rows[0];
            $sql = "SELECT * FROM temp_sales WHERE id_sales = '$sale'";
            $result2 = mysqli_query($con,$sql);
            while($row = mysqli_fetch_array($result2)){
                $card = $row[0];
                $prior = $row[1];
                $origin = $row[2];
                $destination = $row[3];
                $quantity = $row[4];
                $revenue = $row[5];
                $type = $row[7];        
                $sql = "INSERT INTO sales VALUES ('$card','$prior','$origin','$destination','$quantity','$revenue','$type')";
                $result3 = mysqli_query($con,$sql);

                $sql = "DELETE FROM temp_sales WHERE id_sales = '$card'";
                $result4 = mysqli_query($con,$sql);
            
            }
        }   
        
        $sql = "SELECT * FROM user WHERE team_name = '$id'";
        $result = mysqli_query($con,$sql);

        $row = mysqli_fetch_array($result);
        $revenue = $row[6];

        $sql = "INSERT INTO temp_user VALUES('$id', '$roomID', '$revenue')";
        mysqli_query($con,$sql);
        
        $sql = "UPDATE user SET `status` = 0 WHERE team_name = '$id'";
        mysqli_query($con,$sql);

        $sql = "UPDATE user SET `round` = 0 WHERE team_name = '$id'";
        mysqli_query($con,$sql);

        $sql = "UPDATE user SET `id_room` = 0 WHERE team_name = '$id'";
        mysqli_query($con,$sql);

        $sql = "UPDATE user SET `revenue` = 0 WHERE team_name = '$id'";
        mysqli_query($con,$sql);

        $sql = "UPDATE user SET `origin` = null WHERE team_name = '$id'";
        mysqli_query($con,$sql);

        $sql = "UPDATE user SET `finish` = 0 WHERE team_name = '$id'";
        mysqli_query($con,$sql);

        $sql = "UPDATE room SET `status` = 0 WHERE id_room = '$roomID'";
        mysqli_query($con,$sql);

        $sql = "DELETE FROM temp_container WHERE id_user = '$id'";
        mysqli_query($con,$sql);

        $sql = "DELETE FROM temp_container2 WHERE id_user = '$id'";
        mysqli_query($con,$sql);

        echo "1";
    }

    if (isset($_POST['bongkar'])) {
        $bay = $_POST['bay'];
        $baris = $_POST['baris'];
        $kolom = $_POST['kolom'];
        $id = $_SESSION['username'];
        $sql = "SELECT ship FROM user WHERE team_name = '$id'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        $arr = json_decode($row['ship']);

        if ($bay < 0 || $baris < 0 || $kolom < 0 || count($arr) <= $bay || count($arr[$bay]) <= $baris || count($arr[$bay][$baris]) <= $kolom) {
            echo "1";
            exit();
        } else {
            if ($arr[$bay][$baris][$kolom] != 0) {
                if ($baris - 1 == -1) {
                    $id = $_SESSION['username'];
                    // Memasukan Kontainer Ke Temp
                    $data = $arr[$bay][$baris][$kolom];
                    $sql = "INSERT INTO temp_container2 VALUES ('$data','$id')";
                    $result = mysqli_query($con, $sql);

                    // Menghapus Kontainer
                    $arr[$bay][$baris][$kolom] = 0;
                    $arr_enc = json_encode($arr);
                    $sql = "UPDATE user SET ship = '$arr_enc' WHERE team_name = '$id'";
                    $result = mysqli_query($con, $sql);

                    $sql = "SELECT pay FROM settings";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($result);
                    
                    $pay = $row[0];

                    $sql = "SELECT * FROM user WHERE team_name = '$id'";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($result);

                    $revenue = $row[6];
                    $revenue = $revenue - $pay;

                    $sql = "UPDATE user SET revenue = '$revenue' WHERE team_name = '$id'";
                    $result = mysqli_query($con, $sql);

                    $detail = "$id has unloaded container $data from $bay$baris$kolom.";
                    $sql = "INSERT INTO log_users VALUES('','$roomID','$detail')";
                    mysqli_query($con, $sql);

                    echo"4";
                    exit();
                } elseif ($arr[$bay][$baris - 1][$kolom] == 0) {
                    $id = $_SESSION['username'];
                    $data = $arr[$bay][$baris][$kolom];
                    $sql = "INSERT INTO temp_container2 VALUES ('$data','$id')";
                    $result = mysqli_query($con, $sql);

                    $arr[$bay][$baris][$kolom] = 0;
                    $arr_enc = json_encode($arr);
                    $sql = "UPDATE user SET ship = '$arr_enc' WHERE team_name = '$id'";
                    $result = mysqli_query($con, $sql);

                    $sql = "SELECT pay FROM settings";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($result);
                    
                    $pay = $row[0];

                    $sql = "SELECT * FROM user WHERE team_name = '$id'";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($result);

                    $revenue = $row[6];
                    $revenue = $revenue - $pay;

                    $sql = "UPDATE user SET revenue = '$revenue' WHERE team_name = '$id'";
                    $result = mysqli_query($con, $sql);

                    $detail = "$id has unloaded container $data from $bay$baris$kolom.";
                    $sql = "INSERT INTO log_users VALUES('','$roomID','$detail')";

                    mysqli_query($con, $sql);

                    echo"4";
                    exit();
                    
                } else {
                    echo "2";
                    exit();
                }
            }
            elseif ($arr[$bay][$baris][$kolom] == 0) {
                echo"3";
                exit();
            }
            exit();
        }
    }

    if (isset($_POST['pasang'])) {
        $bay = $_POST['bay'];
        $baris = $_POST['baris'];
        $kolom = $_POST['kolom'];
        $kontainer = $_POST['kontainer'];
        $id = $_SESSION['username'];
        $sql = "SELECT ship FROM user WHERE team_name = '$id'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        $arr = json_decode($row['ship']);
        if ($bay < 0 || $baris < 0 || $kolom < 0 || count($arr) <= $bay || count($arr[$bay]) <= $baris || count($arr[$bay][$baris]) <= $kolom) {
            echo "1";
            exit();
        } else {
            // Mengecek apakah koordinat tersebut masih kosong
            if ($arr[$bay][$baris][$kolom] == 0) {
                if (($baris < count($arr[$bay]) - 1) && $arr[$bay][$baris + 1][$kolom] == 0) {
                    echo "2";
                    exit();
                } else {
                    // echo "Berhasil";
                    $sql = "SELECT * FROM temp_container2 WHERE id_container = '$kontainer'";
                    $result = mysqli_query($con, $sql);
                    // Tidak ada kontainer pada stack
                    if (mysqli_num_rows($result) == 0) {
                        echo "5";
                        exit();
                    } else {
                        $sql = "DELETE FROM temp_container2 WHERE id_container = '$kontainer'";
                        $result = mysqli_query($con, $sql);
                        $arr[$bay][$baris][$kolom] = $kontainer;

                        $arr_enc = json_encode($arr);
                        $id = $_SESSION['username'];
                        $sql = "UPDATE user SET ship = '$arr_enc' WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);

                        $sql = "SELECT pay FROM settings";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        
                        $pay = $row[0];

                        $sql = "SELECT * FROM user WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);

                        $revenue = $row[6];
                        $revenue = $revenue - $pay;

                        $sql = "UPDATE user SET revenue = '$revenue' WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);

                        $detail = "$id has loaded container $kontainer into $bay$baris$kolom.";
                        $sql = "INSERT INTO log_users VALUES('','$roomID','$detail')";
                        mysqli_query($con, $sql);

                        echo "4";
                        exit();
                    }
                }
            } else {
                echo "3";
                exit();
            }
            exit();
        }
    }
?>