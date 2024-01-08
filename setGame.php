<?php 
    require 'connect.php';
    $roomAdmin = $_SESSION['roomID_admin'];

    $sql = "SELECT * FROM user WHERE id_room = '$roomAdmin'";
    $listUser = mysqli_query($con, $sql);
    $tempUser = array();
    while ($user = $listUser->fetch_array()) {
        array_push($tempUser, $user[0]);
    }
    if ($listUser->num_rows <= 0) {
        echo 'Tidak ada user';
    }

    if (isset($_POST['adminStart'])) {
        // print_r($_POST);
        
        // Untuk ngatur origin tiap player
        foreach ($tempUser as $user) {
            if($_POST[$user] != '') {
                $bayUser = $_POST[$user];
                $sql = "UPDATE user SET origin = '$bayUser' WHERE team_name = '$user'";
                mysqli_query($con, $sql);
            }
        }
        
        // Untuk set jumlah bay
        $countBays = $_POST['jumlahBay'];
        $layout = [];
        for ($bay = 1; $bay <= $countBays; $bay++) {
            $bayArray = [];

            for ($row = 0; $row < 3; $row++) {
                $rowArray = [0, 0, 0];
                $bayArray[] = $rowArray;
            }
            $layout[] = $bayArray;
        }
        $room = $_SESSION['roomID_admin'];

        // Ngatur jumlah bay
        $tempShip = json_encode($layout);
        $sql = "UPDATE user SET ship = '$tempShip' WHERE id_room='$room'";
        mysqli_query($con, $sql);

        //Ngatur rondenya user dari awal 0
        $sql = "UPDATE user SET round = 0 WHERE id_room='$room'";
        mysqli_query($con, $sql);

        // Maximum rondenya
        $countRounds = $_POST['jumlahRonde'];
        $sql = "UPDATE user SET finish = '$countRounds' WHERE id_room='$room'";
        mysqli_query($con, $sql);

        // Maximum rondenya
        $countRounds = $_POST['jumlahRonde'];
        $sql = "UPDATE user SET finish = '$countRounds' WHERE id_room='$room'";
        mysqli_query($con, $sql);

        // Ini buat max chance Card
        $room = $_SESSION['roomID_admin'];
        $chance = $_POST['chanceCard'];
        $sql = "UPDATE user SET chance = '$chance', max_chances ='$chance' WHERE id_room = '$room'";
        $result = mysqli_query($con,$sql);

        // Ngatur status
        $value = 1;
        $sql = "UPDATE room SET status=? WHERE id_room =?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ii", $value, $room);
        $stmt->execute();

        header("Location: waitingRoom2.php");
    }

    if (isset($_POST['swap'])) {
        $id = $_SESSION['roomID_admin'];
        $sql = "SELECT * FROM user WHERE id_room = '$id'";
        $result = mysqli_query($con, $sql);
        $tanggal = date("Y-m-d H:i:s");

        while ($row = mysqli_fetch_array($result)) {
            $team = $row[0];
            $ship = $row[2];
            $origin = $row[5];
            $revenue = $row[6];
            $round = $row[7];
            $room = $row[4];
            $maxChances = $row[10];

            $sql = "INSERT INTO history VALUES ('$tanggal','$round','$team','$ship','$origin','$revenue','$room')";
            $result2 = mysqli_query($con, $sql);
        }
        $round = $round + 1;
        $sql = "UPDATE user SET round = '$round' WHERE id_room = '$id'";
        $result = mysqli_query($con, $sql);

        $sql = "UPDATE user SET max_chances = '$maxChances' WHERE id_room = '$room'";
        $result = mysqli_query($con,$sql);

        // $countRounds = $_POST['jumlahRonde'];
        // if ($round = $countRounds) {

        // }

        $sql = "SELECT * FROM user WHERE id_room = $id";
        $result = mysqli_query($con, $sql);

        // Logic Swap JANGAN DIRUBAH
        $tempBay = [];
        $tempName = [];
        while ($row = mysqli_fetch_array($result)) {
            $id = $row[0];
            $sql = "SELECT * FROM temp_container2 WHERE id_user = '$id'";
            $result2 = mysqli_query($con, $sql);

            // Ini hitung jumlah container yang nginep
            $count = 0;
            while ($row2 = mysqli_fetch_array($result2)) {
                $count = $count + 1;
            }
            // Hitung denda
            if ($count > 0) {
                $pay = $count * 1500;

                $sql = "SELECT * FROM user WHERE team_name = '$id'";
                $result3 = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($result3);

                $revenue = $row[6];
                $revenue = $revenue - $pay;

                $sql = "UPDATE user SET revenue = '$revenue' WHERE team_name = '$id'";
                $result4 = mysqli_query($con, $sql);
            }
            $count = 0;

            array_push($tempBay, $row[2]);
            array_push($tempName, $row[0]);
        }

        $length = count($tempBay) - 1;

        $temp = $tempBay[0];
        for ($i = 0; $i < $length; $i++) {
            $tempBay[$i] = $tempBay[$i + 1];
        }
        $tempBay[$length] = $temp;

        //

        // Testing 
        // echo "$tempName[0] ====== $tempBay[0]";
        // echo "<br>";
        // echo "$tempName[1] ====== $tempBay[1]";
        // echo "<br>";
        // echo "$tempName[2] ====== $tempBay[2]";
        // echo "<br>";

        // Proses memasukan ship ke user setelah swap
        for ($i = 0; $i <= $length; $i++) {
            $bay = $tempBay[$i];
            $name = $tempName[$i];

            $sql = "UPDATE user SET ship = '$bay' WHERE team_name = '$name'";
            $result = mysqli_query($con, $sql);
        }

        // Pindah ke page 1 setelah swap
        $sql = "UPDATE user SET pindah = 'YES' WHERE id_room = $room";
        $result = mysqli_query($con, $sql);
        // Update atribut pindah jadi YES
        // $id = $_SESSION['username'];
        // $sql = "SELECT * FROM user WHERE id_room = '$room' ";

        // Memasukan ke tabel history

        // $sql = "SELECT ship FROM user WHERE team_name = 'Samuel'";
        // $result = mysqli_query($con, $sql);
        // $row = mysqli_fetch_array($result);
        // $hasil1 = json_decode($row['ship']);

        // $sql2 = "SELECT ship FROM user WHERE team_name = 'Vincentius'";
        // $result2 = mysqli_query($con, $sql2);
        // $row2 = mysqli_fetch_array($result2);
        // $hasil2 = json_decode($row2['ship']);

        // $swap1 = json_encode($hasil2);
        // $swap2 = json_encode($hasil1);
        // $sql3 = "UPDATE user SET ship = '$swap1' WHERE team_name = 'Samuel'";
        // $sql4 = "UPDATE user SET ship = '$swap2' WHERE team_name = 'Vincentius'";
        // $result3 = mysqli_query($con, $sql3);
        // $result4 = mysqli_query($con, $sql4);


        // $sql = "SELECT * FROM temp_container WHERE id_user = 'Vincentius'";
        // $result = mysqli_query($con,$sql);

        // $count = 0;
        // while($row = mysqli_fetch_array($result)){
        //     $count = $count + 1;
        // }

        // if($count > 0){
        //     $pay = $count * 1500;

        //     $sql = "SELECT * FROM user WHERE team_name = 'Vincentius'";
        //     $result = mysqli_query($con,$sql);
        //     $row = mysqli_fetch_array($result);

        //     $revenue = $row[6];
        //     $revenue = $revenue - $pay;

        //     $sql = "UPDATE user SET revenue = '$revenue' WHERE team_name = 'Vincentius'";
        //     $result = mysqli_query($con,$sql);
        // }
        header("Location: waitingRoom2.php");
    }
?>