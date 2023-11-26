<?php
require 'connect.php';

if (isset($_POST['addDeck'])) {
    $id = $_POST['id_deck'];
    $qty = $_POST['qty_bay'];
    $nama = $_POST['nama_deck'];

    $sql = "INSERT INTO deck VALUES (?,?,?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("iis", $id, $qty, $nama);
    $stmt->execute();
}
if (isset($_POST['backtoHome'])) {
    header('Location:homeAdmin.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Penjualan</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        // $(document).ready(function() {
        //     // $("#btnSubmit").click(function(e) {
        //     //     e.preventDefault()

        //     //     let idDeck = $("id_deck").val()
        //     //     let qtyBay = $("qty_bay").val()
        //     //     let namaDeck = $("nama_deck").val()
        //     // })
        // })
    </script>
</head>

<body>
    <div class="container mt-5">
        <h1>Input Data Penjualan</h1>
        <form method="POST">
            <div class="form-group mt-4">
                <label for="id_sales">ID Deck </label>
                <input type="number" class="form-control" name="id_deck" id="id_deck" required>
            </div>
            <div class="form-group mt-4">
                <label for="id_sales">Jumlah Pemain</label>
                <input type="text" class="form-control" name="qty_bay" id="qty_bay" required>
            </div>
            <div class="form-group mt-4">
                <label for="priority">Nama Deck</label>
                <input type="text" class="form-control" name="nama_deck" id="nama_deck" required>
            </div>
            <!-- Button trigger modal -->
            <button type="submit" name="coba" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#isiDataBay" id="btnSubmit">
                Submit
            </button>

            <button type="button" class="btn btn-danger mt-4" name="backToHome">
                Back
            </button>
        </form>

        <!-- Modal -->
        <div class="modal fade" id="isiDataBay" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Bay</h1>
                    </div>
                    <form method="" action="">

                    </form>
                    <div class="modal-body">
                        <?php

                        if (isset($_POST['coba'])) {
                            // echo "Tess";
                            echo $_POST['qty_bay'];
                            // $temp = $_POST['qty_bay'];
                            // for ($i = 0; $i < $temp; $i++) {
                            //     echo '
                            //             <label for="id_sales">Bay' . $i . '</label>
                            //             <input type="number" class="form-control" name="namaBay' . $i . '" required>
                            //             <label for="id_sales">Detail Nama</label>
                            //             <input type="number" class="form-control" name="detailBay' . $i . '" required>';
                            // }
                        }
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" name="addDeck">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>