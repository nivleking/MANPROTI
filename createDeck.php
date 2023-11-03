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
                <label for="id_sales">ID Deck </label>
                <input type="number" class="form-control" name="id_deck" required>
            </div>
            <div class="form-group">
                <label for="id_sales">QTY Bay </label>
                <input type="number" class="form-control" name="qty_bay" required>
            </div>
            <div class="form-group">
                <label for="priority">Nama Deck</label>
                <input type="text" class="form-control" name="nama_deck" required>
            </div>
            <button type="submit" class="btn btn-primary" name="addDeck">Submit</button>
            <button class="btn btn-primary" name="backtoHome" >Back to Home</button>
        </form>

        <?php
            if (isset($_POST['addDeck'])) {
                $id = $_POST['id_deck'];
                $qty = $_POST['qty_bay'];
                $nama = $_POST['nama_deck'];
                $sql = "INSERT INTO deck VALUES (?,?,?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("iis",$id,$qty,$nama);
                $stmt->execute();
            }
            if (isset($_POST['backtoHome'])) {
                header('Location:homeAdmin.php');
            }

        ?>

    </div>
</body>
</html>

