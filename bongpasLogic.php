<?php
    require 'connect.php';
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
            // Pakai sweetalert
            echo "1";
            exit();
            // header("Location: game1.php?error=Pembongkaran Kontainer melebihi koordinat");
            // echo ("<script LANGUAGE='JavaScript'>
            //                 window.alert('Melebihi koordinat');
            //                 window.location.href='game1.php';
            //                 </script>");
        } else {
            if ($arr[$bay][$baris][$kolom] != 0) {
                if ($baris - 1 == -1) {
                    $id = $_SESSION['username'];
                    // Memasukan Kontainer Ke Temp
                    $data = $arr[$bay][$baris][$kolom];
                    $sql = "INSERT INTO temp_container VALUES ('$data','$id')";
                    $result = mysqli_query($con, $sql);

                    // Menghapus Kontainer
                    $arr[$bay][$baris][$kolom] = 0;
                    $arr_enc = json_encode($arr);
                    $sql = "UPDATE user SET ship = '$arr_enc' WHERE team_name = '$id'";
                    $result = mysqli_query($con, $sql);
                    
                    $pay = 2000;
                    
                    $sql = "SELECT * FROM user WHERE team_name = '$id'";
                    $result = mysqli_query($con,$sql);
                    $row = mysqli_fetch_array($result);
                    
                    $revenue = $row[6];
                    $revenue = $revenue - $pay;

                    $sql = "UPDATE user SET revenue = '$revenue' WHERE team_name = '$id'";
                    $result = mysqli_query($con,$sql);

                    $detail = "$id has unloaded container $data from $bay$baris$kolom.";
                    $sql = "INSERT INTO log_users VALUES('','$detail')";
                    mysqli_query($con, $sql);

                    // Pakai sweetalert
                    echo"4";
                    exit();
                    // header("Location: game1.php?error=Berhasil dibongkar");
                    // echo ("<script LANGUAGE='JavaScript'>
                    //                 window.alert('Berhasil Dibongkar');
                    //                 window.location.href='game1.php';
                    //                 </script>");
                } elseif ($arr[$bay][$baris - 1][$kolom] == 0) {
                    $id = $_SESSION['username'];
                    $data = $arr[$bay][$baris][$kolom];
                    $sql = "INSERT INTO temp_container VALUES ('$data','$id')";
                    $result = mysqli_query($con, $sql);

                    $arr[$bay][$baris][$kolom] = 0;
                    $arr_enc = json_encode($arr);
                    $sql = "UPDATE user SET ship = '$arr_enc' WHERE team_name = '$id'";
                    $result = mysqli_query($con, $sql);

                    $pay = 2000;
                    
                    $sql = "SELECT * FROM user WHERE team_name = '$id'";
                    $result = mysqli_query($con,$sql);
                    $row = mysqli_fetch_array($result);
                    
                    $revenue = $row[6];
                    $revenue = $revenue - $pay;

                    $sql = "UPDATE user SET revenue = '$revenue' WHERE team_name = '$id'";
                    $result = mysqli_query($con,$sql);

                    $detail = "$id has unloaded container $data from $bay$baris$kolom.";
                    $sql = "INSERT INTO log_users VALUES('','$detail')";
                    mysqli_query($con, $sql);

                    // Pakai sweetalert
                    echo"4";
                    exit();
                    // header("Location: game1.php?error=Berhasil dibongkar");
                    // echo ("<script LANGUAGE='JavaScript'>
                    //                 window.alert('Berhasil Dibongkar');
                    //                 window.location.href='game1.php';
                    //                 </script>");
                } else {
                    echo "2";
                    exit();
                    // header("Location: game1.php?error=ERROR! Ada kontainer di atasnya");
                    // echo ("<script LANGUAGE='JavaScript'>
                    //                     window.alert('Ada Kontainer Diatasnya');
                    //                     window.location.href='game1.php';
                    //                     </script>");
                }
            }
            elseif ($arr[$bay][$baris][$kolom] == 0) {
                // Pakai sweetalert
                echo "3";
                exit();
                // header("Location: game1.php?error=Tidak ada kontainer yang dapat dibongkar");
                // echo ("<script LANGUAGE='JavaScript'>
                //                         window.alert('Tidak ada kontainer yang dibongkar');
                //                         window.location.href='game1.php';
                //                         </script>");
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
            // Pakai sweetalert
            echo "1";
            exit();
            // header("Location: game1.php?error=Pemasangan Kontainer melebihi koordinat");
            // echo ("<script LANGUAGE='JavaScript'>
            //                         window.alert('Melebihi Koordinat');
            //                         window.location.href='game1.php';
            //                         </script>");
        } else {
            // Mengecek apakah koordinat tersebut masih kosong
            if ($arr[$bay][$baris][$kolom] == 0) {
                if (($baris < count($arr[$bay]) - 1) && $arr[$bay][$baris + 1][$kolom] == 0) {
                    // Pakai sweetalert
                    echo "2";
                    exit();
                    // header("Location: game1.php?error=Pemasangan Kontainer melayang (tidak ada kontainer di bawahnya)");
                    // echo ("<script LANGUAGE='JavaScript'>
                    //                 window.alert('Melayang, coba di cek kembali');
                    //                 window.location.href='game1.php';
                    //                 </script>");
                } 
                else {
                    $sql = "SELECT * FROM temp_container WHERE id_container = '$kontainer'";
                    $result = mysqli_query($con, $sql);
                    // Tidak ada kontainer pada stack
                    if (mysqli_num_rows($result) == 0) {
                        // Pakai sweetalert
                        echo "5";
                        exit();
                        // header("Location: game1.php?error=Kontainer ID tidak terdaftar");
                        // echo ("<script LANGUAGE='JavaScript'>
                        //                     window.alert('Kontainer ID tidak terdaftar');
                        //                     window.location.href='game1.php';
                        //                     </script>");
                    } else {
                        $sql = "DELETE FROM temp_container WHERE id_container = '$kontainer'";
                        $result = mysqli_query($con, $sql);
                        $arr[$bay][$baris][$kolom] = $kontainer;

                        $arr_enc = json_encode($arr);
                        $id = $_SESSION['username'];
                        $sql = "UPDATE user SET ship = '$arr_enc' WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);

                        $pay = 2000;
                    
                        $sql = "SELECT * FROM user WHERE team_name = '$id'";
                        $result = mysqli_query($con,$sql);
                        $row = mysqli_fetch_array($result);
                        
                        $revenue = $row[6];
                        $revenue = $revenue - $pay;

                        $sql = "UPDATE user SET revenue = '$revenue' WHERE team_name = '$id'";
                        $result = mysqli_query($con,$sql);
                        
                        // Pakai sweetalert

                        $detail = "$id has loaded container $kontainer into $bay$baris$kolom.";
                        $sql = "INSERT INTO log_users VALUES('','$detail')";
                        mysqli_query($con, $sql);

                        echo "4";
                        exit();
                        // header("Location: game1.php?error=Kontainer berhasil dimasukkan");
                        // echo ("<script LANGUAGE='JavaScript'>
                        //                 window.alert('Kontainer Berhasil Dimasukan !');
                        //                 window.location.href='game1.php';
                        //                 </script>");
                    }
                }
            } else {
                // Pakai sweetalert
                echo "3";
                exit();
                // header("Location: game1.php?error=Sudah terdapat kontainer");
                // echo ("<script LANGUAGE='JavaScript'>
                //                         window.alert('Sudah ada kontainer !');
                //                         window.location.href='game1.php';
                //                         </script>");
            }
            exit();
        }
    }

    if (isset($_POST['done'])) {
        $id = $_SESSION['username'];
        $sql = "SELECT ship FROM user WHERE team_name = '$id'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        $arr = json_decode($row['ship']);
        for ($i = 0; $i < count($arr); $i++) {
            for ($j = 0; $j < count($arr[$i]); $j++) {
                for ($k = 0; $k < count($arr[$i][$j]); $k++) {
                    // // Mengecek yang ada kontainernya saja
                    if ($arr[$i][$j][$k] > 0) {

                        $id_con = $arr[$i][$j][$k];
                        $sql = "SELECT * FROM container where id_container = '$id_con'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        if ($row[2] == 'SBY') {
                            // Pakai sweetalert
                            echo"1";
                            exit();
                            // echo ("<script LANGUAGE='JavaScript'>
                            //             window.alert('Masih ada kontainer yang perlu dibongkar !');
                            //             window.location.href='game1.php';
                            //             </script>");
                        }
                    }
                    else {
                        $detail = "$id has cleared Section 1.";
                        $sql = "INSERT INTO log_users VALUES('','$detail')";
                        mysqli_query($con,$sql);

                        echo "2";
                        exit();
                    }
                }
            }
        }

        // Checking Container Apakah Container yang seharusnya diturunkan merup
        $sql = "SELECT * FROM temp_container WHERE id_user = '$id'";
        $result = mysqli_query($con,$sql);
        $fatal = 0;
        while($row = mysqli_fetch_array($result)){
            $cont = $row[0];
            $sql = "SELECT * FROM container WHERE id_container = '$cont'";
            $result2 = mysqli_query($con,$sql);
            $row2 = mysqli_fetch_array($result2);
            if($row2[2] != "SBY"){
                $fatal = $fatal + 1;
            }
        }
        if ($fatal > 0){
            // Pakai sweetalert
            echo"2";
            exit();
            // echo ("<script LANGUAGE='JavaScript'>
            //                 window.alert('$fatal Check lagi apakah Container yang diturunkan sudah sesuai semua !');
            //                 window.location.href='game1.php';
            //                 </script>");
        }
        else{
            // Clearing Container
            // Pakai sweetalert
            $id = $_SESSION['username'];
            $sql = "DELETE FROM temp_container WHERE id_user = '$id'";
            $result = mysqli_query($con,$sql);

            $detail = "$id has cleared Section 1.";
            $sql = "INSERT INTO log_users VALUES('','$detail')";
            mysqli_query($con,$sql);

            echo"2";
            exit();
            // echo ("<script LANGUAGE='JavaScript'>
            //                     window.alert('Section 1 Selesai !');
            //                     window.location.href='game2.php';
            //                     </script>");

        }
        exit();
    }

?>