<?php
require 'connect.php';
$admin = $_SESSION["usernameADM"];
$sql = "SELECT * FROM admin WHERE id_admin = '$admin'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Cargo Master</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: "Montserrat", sans-serif
    }

    .w3-row-padding img {
      margin-bottom: 12px
    }

    /* Set the width of the sidebar to 120px */
    .w3-sidebar {
      width: 120px;
      background: #222;
    }

    /* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
    #main {
      margin-left: 120px
    }

    /* Remove margins from "page content" on small screens */
    @media only screen and (max-width: 600px) {
      #main {
        margin-left: 0
      }
    }
  </style>
</head>

<body class="w3">

  <!-- Icon Bar (Sidebar - hidden on small screens) -->
  <nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
    <a href="#" class="w3-bar-item w3-button w3-padding-large w3-black">
      <i class="fa fa-home w3-xxlarge d-flex justify-content-center mt-2"></i>
      <p>HOME</p>
    </a>
    <a href="#activity" class="w3-bar-item w3-button w3-padding-large w3-black w3-center">
      <i class="fa fa-bars w3-xxlarge d-flex justify-content-center mt-2"></i>
      <p>ACTIVITY</p>
    </a>
  </nav>

  <!-- Page Content -->
  <div class="w3-padding-large" id="main">
    <!-- Header/Home -->
    <div class=" w3-padding-16 w3-center" id="home">
      <h1 class="w3-jumbo"><span class="w3-hide-small">CARGO MASTER</span></h1>
      <h3>Hello,
        <?php echo $row[1]; ?>
      </h3>
    </div>

    <!-- Grid for pricing tables -->
    <div class="w3-row-padding">
      <div class="w3-half w3-margin-bottom">
        <div class="w3-white w3-center w3-opacity w3-hover-opacity-off">
          <div class="card" style="width:w3">
            <div class="card-body">
              <h3 class="card-title" style="font-weight:bold; font-style:italic;">NEW GAME</h3>
              <img class="object-fit-md-cover border rounded" src="https://clipart-library.com/images/6Tp5kxo6c.jpg" alt="Admin">
              <div class="row d-flex justify-content-center">
                <div class="col-3">
                  <button type = "button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modal-createroom" style="margin-top: 10px; width: 10rem;">Create</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modal-createroom">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-3" style="font-weight:bold;"id="exampleModalLabel">Create Room</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="createRoomLogic.php">
              <div class="modal-body">
                  <div class="mb-3">
                    <label for="roomCode" class="col-form-label">Room Code</label>
                    <input type="text" class="form-control" id="roomCode" name="roomCode">
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="create">Finish</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="w3-half">
        <div class="w3-white w3-center w3-opacity w3-hover-opacity-off">
          <div class="card" style="width:w3">
            <div class="card-body">
              <h3 class="card-title" style="font-weight:bold;font-style:italic;">CARDS</h3>
              <img class="object-fit-md-cover border rounded" src="https://clipart-library.com/images/6Tp5kxo6c.jpg" alt="Admin">
              <div class="row d-flex justify-content-center">
                <div class="col-3">
                  <form action="setSalesCard.php">
                    <button type = "submit" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#moda-createcards" style="margin-top: 10px; width: 10rem;">Create</button>
                  </form>
                </div>
                <div class="col-3">
                  <form action="viewSalesCard.php">
                    <button type = "submit" class="btn btn-danger" style="margin-top: 10px; width: 10rem;">View</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modal-createcards">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-3" style="font-weight:bold;"id="exampleModalLabel">Input Data Penjualan</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form>
                <div class="mb-3">
                  <label for="deck-id" class="col-form-label">ID Deck</label>
                  <input type="text" class="form-control" id="deck-id">
                </div>
                <div class="mb-3">
                  <label for="deck-id-sales" class="col-form-label">ID Sales</label>
                  <input type="text" class="form-control" id="deck-id-sales">
                </div>
                <div class="mb-3">
                  <label for="priority" class="col-form-label">Priority</label>
                  <input type="text" class="form-control" id="priority">
                </div>
                <div class="mb-3">
                  <label for="origin" class="col-form-label">Origin</label>
                  <input type="text" class="form-control" id="origin">
                </div>
                <div class="mb-3">
                  <label for="destination" class="col-form-label">Destination</label>
                  <input type="text" class="form-control" id="destination">
                </div>
                <div class="mb-3">
                  <label for="revenue" class="col-form-label">Revenue</label>
                  <input type="text" class="form-control" id="revenue">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Finish</button>
            </div>
          </div>
        </div>
      </div>

      <div class=" w3-row-padding w3-center" id="activity">
        <div class="w3-padding-32">
          <h2 class="w3-jumbo mb-5" >Your Activity</h2>
          <table class="table ActivityList mx-auto table-responsive-lg">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Room ID</th>
                <th scope="col">Admin</th>
                <th scope="col">Status</th>
                <th scope="col">Date</th>
                <th scope="col">Score</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1 ?>
              <?php
              $sql = "SELECT * FROM room";
              $result = mysqli_query($con, $sql);

              while ($row = mysqli_fetch_array($result)) {
                if ($row[2] == 1) {
                  $val = 'Finished';
                } else {
                  $val = 'Ongoing';
                }

                echo "<tr>
                        <td>$i</td>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$val</td>
                        <td>$row[3]</td>
                        </tr>
                    ";
                $i += 1;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>