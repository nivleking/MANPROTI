<!DOCTYPE html>
<html>
<head>
    <!-- Add Bootstrap CSS (you can link to a CDN or use a local file) -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Sales Card</h1>
        
        <?php
            require 'connect.php';
            $sql = "SELECT * FROM sales";
            $result= mysqli_query($con,$sql);

        if ($result->num_rows > 0) {
            // Use Bootstrap table classes for styling
            echo '<table class="table">';
            echo '<thead><tr><th>ID Sales</th><th>Priority</th><th>Origin</th><th>Destination</th><th>Quantity</th><th>Revenue</th></tr></thead>';
            echo '<tbody>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['id_sales'] . '</td>';
                echo '<td>' . $row['priority'] . '</td>';
                echo '<td>' . $row['origin'] . '</td>';
                echo '<td>' . $row['destination'] . '</td>';
                echo '<td>' . $row['quantity'] . '</td>';
                echo '<td>' . $row['revenue'] . '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        } else {
            echo 'No data found in the database.';
        }

        // Close the database connection
        $con->close();
        ?>
        <form action="homeAdmin.php">
            <button class="btn btn-primary">Back to Home</button>
        </form>

    </div>

    <!-- Add Bootstrap JS and jQuery (if needed) here -->
    <!-- You can link to a CDN or use local files -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
