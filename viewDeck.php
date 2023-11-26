<!DOCTYPE html>
<html>
<head>
    <!-- Add Bootstrap CSS (you can link to a CDN or use a local file) -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Deck</h1>
        <form method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Choose Deck</label>
                <select class="form-control" name="idDeck">
                    <?php
                        require 'connect.php';
                        $sql = "SELECT id_deck, nama_deck FROM deck";
                        $deck = mysqli_query($con,$sql);
                        if ($deck->num_rows > 0) {
                            while ($row = $deck->fetch_array()) {
                                echo '<option value='.$row[0].'>'.$row[1].'</option>';
                            }
                        } else {
                            echo 'No data found in the database.';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
            <?php
                $sql = "SELECT * FROM sales";
                $result= mysqli_query($con,$sql);
                // $sql2 = "SELECT list_card FROM deck";
                // $result2 = mysqli_query($con, $sql2);
                // $tmp = json_encode($result[3]);
                // $tmp = mysqli_fetch_assoc($result2);

                if ($result->num_rows > 0) {
                    echo '<table class="table">';
                    echo '<thead>
                            <tr>
                                <th>ID Sales</th><th>Priority</th>
                                <th>Origin</th>
                                <th>Destination</th>
                                <th>qty</th>
                                <th>revenue</th>
                                <th>Choose</th>
                            </tr>
                        </thead>';
                    echo '<tbody>';

                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['id_sales'] . '</td>';
                        echo '<td>' . $row['priority'] . '</td>';
                        echo '<td>' . $row['origin'] . '</td>';
                        echo '<td>' . $row['destination'] . '</td>';
                        echo '<td>' . $row['quantity'] . '</td>';
                        echo '<td>' . $row['revenue'] . '</td>';
                        // if (in_array($row['id_sales'], $tmp['list_card'])) {
                        //     echo "Sudah ada";
                        // }
                        
                        echo '<td><input type="checkbox" class="form-check-input" type="submit" name="'.$row['id_sales'].'"></td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                } else {
                    echo 'No data found in the database.';
                }
            ?>
            </div>
            <button class="btn btn-success" name="updateDeck">Submit</button>
        </form>
        <form action="homeAdmin.php">
            <button class="btn btn-primary">Back to Home</button>
        </form>

    </div>
    <?php
        if (isset($_POST['updateDeck'])) {
            $tempArr = array();
            $sql = "SELECT id_sales FROM sales";
            $listSales = mysqli_query($con,$sql);
            while ($row = $listSales->fetch_array()) {
                if (isset($_POST[$row[0]])) {
                    array_push($tempArr,$row[0]);
                }
            }
            $jsonSales = json_encode($tempArr);
            // echo $jsonSales;
            $idDeck = $_POST['idDeck'];
            $sql = "UPDATE deck SET list_card = '$jsonSales' WHERE id_deck = '$idDeck'";
            mysqli_query($con,$sql);
        }
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
