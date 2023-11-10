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
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#isiDataBay">
            Submit
            </button>

            <!-- Modal -->
            <div class="modal fade" id="isiDataBay" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Bay</h1>
                </div>
                <div class="modal-body">
                    <?php
                       for ($i = 0; $i < $_POST['qty_bay']; $i++) {
                        echo '<label for="id_sales">Bay'.$i.'</label>
                            <input type="number" class="form-control" name="namaBay'.$i.'" required>
                            <label for="id_sales">Detail Nama</label>
                            <input type="number" class="form-control" name="detailBay'.$i.'" required>';
                        } 
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" name="addDeck">Save changes</button>
                </div>
                </div>
            </div>
            </div>
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

