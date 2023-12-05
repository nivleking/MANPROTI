<?php
require 'connect.php';

if (isset($_POST['addDeck'])) {
    $id = $_POST['id_deck'];
    $qty = $_POST['qty_bay'];
    $nama = $_POST['nama_deck'];
    $list_card = [];
    $tmp = json_encode($list_card);

    $sql = "INSERT INTO deck VALUES (?,?,?,?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("iiss", $id, $qty, $nama, $tmp);
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
    <title>Set Card Deck</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- FA W3 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- SWEET ALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles" />

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>
        /* POPPINS FONT */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        .wrapper {
            background: #ececec;
            padding: 0 20px 0 20px;
        }

        .w3-row-padding img {
            margin-bottom: 12px
        }

        #main {
            margin-left: 120px;
            transition: margin-left .5s;
        }

        .navbar-boots {
            background: #222;
            position: fixed;
            height: 66px;
        }

        /* Sidebar styles */
        .w3-sidebar {
            width: 150px;
            background: #222;
            position: fixed;
            height: 100%;
            z-index: 1;
            top: 0;
            left: 0;
            overflow-x: hidden;
            transition: 0.5s;
        }

        .w3-sidebar a {
            padding: 8px;
            text-align: center;
            width: 100%;
            display: block;
            transition: 0.3s;
        }

        .w3-sidebar .flex-column {
            flex-direction: column;
            align-items: stretch;
        }

        /* Small */
        @media only screen and (max-width: 600px) {
            #main {
                margin-left: -40px;
            }

            #navbarUpper {
                margin-left: -56px;
            }
        }

        /* Medium */
        @media only screen and (max-width: 991px) and (min-width: 768) {}
    </style>

    <script>
        $(document).ready(function() {
            $("#btnSubmit").click(function(e) {
                e.preventDefault()

                let idDeck = $("#id_deck").val();
                let qtyBay = $("#qty_bay").val();
                let namaDeck = $("#nama_deck").val();

                console.log("testing")

                // Display values in the modal
                $("#modal-id-deck").text(idDeck);
                $("#modal-nama-deck").text(namaDeck);

                $("#modal-qty-bay").empty(); // Clear any existing content

                for (var i = 0; i < qtyBay; i++) {
                    // Create a new label for Bay
                    var newLabelBay = $("<label>");
                    newLabelBay.attr("for", "player" + (i + 1));
                    newLabelBay.text("Player " + i);

                    // Create a new input for namaBay
                    var newInputNamaBay = $("<input>");
                    newInputNamaBay.attr({
                        type: "number",
                        class: "form-control",
                        name: "player" + i
                        // required: true
                    });

                    // Create a new label for Detail Nama
                    var newLabelDetailNama = $("<label>");
                    newLabelDetailNama.attr("for", "detailPlayer" + i);
                    newLabelDetailNama.text("Detail Nama " + i);

                    // Create a new input for detailBay
                    var newInputDetailNama = $("<input>");
                    newInputDetailNama.attr({
                        type: "number",
                        class: "form-control",
                        name: "detailPlayer" + i
                        // required: true
                    });

                    // Append elements to the modal body
                    $("#modal-qty-bay").append(newLabelBay, newInputNamaBay, newLabelDetailNama, newInputDetailNama);
                }

                $("#isiDataBay").modal("show");
            })
        })
    </script>
</head>

<body>
    <!-- Sidebar -->
    <nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
        <div class="flex-column" style="display: flex; flex-direction: column; height: 100%;">
            <h3 class="text-white w3-bar-item" style="font-style: italic;font-weight:bold;">BLC</h3>

            <a href="homeAdmin.php" class="w3-bar-item w3-button w3-padding-large w3-black">
                <i class="fa fa-dashboard w3-xxlarge d-flex justify-content-center mt-2"></i>
                <p>Home</p>
            </a>
            <a href="homeAdmin.php" class="w3-bar-item w3-button w3-padding-large w3-black w3-center">
                <i class="fa fa-ellipsis-h w3-xxlarge d-flex justify-content-center mt-2"></i>
                <p>Activity</p>
            </a>
            <a href="accounts.php" class="w3-bar-item w3-button w3-padding-large w3-black w3-center">
                <i class="fa fa-group w3-xxlarge d-flex justify-content-center mt-2"></i>
                <p>Accounts</p>
            </a>

            <!-- Profile Dropdown -->
            <div class="dropdown mt-auto">
                <a class="btn w3-black dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="margin-top: auto;" id="dropDownUser">
                    <i class="fa fa-user w3-xxlarge d-flex justify-content-center mt-1"></i>
                    Profile
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropDownUser" style="width:25px">
                    <!-- <li class="dropdown-item"><a href="#">Profile</a></li> -->
                    <li class="dropdown-item"><a href="logoutAdmin.php">Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <a class="btn btn-dark" name="" href="homeAdmin.php">Back</a>
        <a class="btn btn-dark" name="" href="viewDeck.php">View Decks</a>

        <div class="row d-flex justify-content-center">
            <h1 style="font-weight:bold;">Set Card Deck</h1>
        </div>

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

            <button type="submit" name="coba" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#isiDataBay" id="btnSubmit">
                Create
            </button>

            <!-- Modal -->
            <div class="modal fade" id="isiDataBay" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Detail Bay</h2>
                        </div>
                        <div class="modal-body">
                            <p>ID Deck: <span id="modal-id-deck"></span></p>
                            <p>Nama Deck: <span id="modal-nama-deck"></span></p>
                            <p><span id="modal-qty-bay"></span></p>

                            <?php
                            if (isset($_POST['coba'])) {
                                // echo "Tess";
                                // echo $_POST['qty_bay'];
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
                            <button type="submit" class="btn btn-primary" name="addDeck">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>