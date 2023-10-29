<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Penjualan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <?php  require 'connect.php'?>
</head>
<body>
    <div class="container mt-5">
        <h1>Input Data Penjualan</h1>
        <form method="POST">
            <div class="form-group">
                <label for="id_sales">ID Sales </label>
                <input type="number" class="form-control" name="id_sales" required>
            </div>
            <div class="form-group">
                <label for="priority">Priority</label>
                <input type="text" class="form-control" name="priority" required>
            </div>
            <div class="form-group">
                <label for="origin">Origin</label>
                <input type="text" class="form-control" name="origin" required>
            </div>
            <div class="form-group">
                <label for="destination">Destination</label>
                <input type="text" class="form-control" name="destination" required>
            </div>
            <div class="form-group d-flex justify-content-between">
                <div class="col-6">
                    <label for="quantity_lower">Quantity (Lower)</label>
                    <input type="number" class="form-control" name="quantity_lower" required>
                </div>
                <div class="col-6">
                    <label for="quantity_upper">Quantity (Upper)</label>
                    <input type="number" class="form-control" name="quantity_upper" required>
                </div>
            </div>

            <div class="form-group">
                <label for="revenue">Revenue</label>
                <input type="number" class="form-control" name="revenue" required>
            </div>
            <button type="submit" class="btn btn-primary" name="addSales">Submit</button>
            <button class="btn btn-primary" name="backtoHome" >Back to Home</button>
        </form>

        <?php
            if (isset($_POST['addSales'])) {
                $id = $_POST['id_sales'];
                $priority = $_POST['priority'];
                var_dump($_POST['priority']);
                $origin = $_POST['origin'];
                var_dump($_POST['origin']);
                $dest = $_POST['destination'];
                var_dump($_POST['destination']);
                $qty = random_int($_POST['quantity_lower'], $_POST['quantity_upper']);
                $revenue = $_POST['revenue'];
                $sql = "INSERT INTO sales VALUES (?,?,?,?,?,?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("isssii",$id,$priority,$origin,$dest,$qty,$revenue);
                $stmt->execute();

                for ($i = 0; $i < $qty; $i++) {
                    $sql = "INSERT INTO container (asal_container,tujuan_container,id_sales) VALUES (?,?,?)";
                    $stmt = $con->prepare($sql);
                    $stmt->bind_param("ssi",$origin,$dest,$id);
                    $stmt->execute();
                }
            }
            if (isset($_POST['backtoHome'])) {
                header('Location:homeAdmin.php');
            }

        ?>

    </div>
</body>
</html>

