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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
      <i class="fa fa-home w3-xxlarge"></i>
      <p>HOME</p>
    </a>
    <a href="#activity" class="w3-bar-item w3-button w3-padding-large w3-black w3-center">
      <i class="fa fa-bars w3-xxlarge"></i>
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
              <h3 class="card-title" style="font-weight:bold;">NEW GAME</h3>
              <img class="object-fit-md-cover border rounded" src="https://clipart-library.com/images/6Tp5kxo6c.jpg" alt="Admin">
              <p class="w3-light-grey w3-padding-8">
                <a href="" class="btn btn-dark" role="button" data-bs-target="#modalCreateRoom">Create</a>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modalCreateRoom" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Recipient:</label>
                  <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">Message:</label>
                  <textarea class="form-control" id="message-text"></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Send message</button>
            </div>
          </div>
        </div>
      </div>

      <div class="w3-half">
        <div class="w3-white w3-center w3-opacity w3-hover-opacity-off">
          <div class="card" style="width:w3">
            <div class="card-body">
              <h3 class="card-title" style="font-weight:bold;">CARDS</h3>
              <img class="object-fit-md-cover border rounded" src="https://clipart-library.com/images/6Tp5kxo6c.jpg" alt="Admin">
              <p class="w3-light-grey w3-padding-8">
                <a href="#activity" class="btn btn btn-dark" role="button" data-bs-toggle="button">Create</a>
              </p>
            </div>
          </div>
          <div>
          </div>
        </div>
      </div>

      <div class=" w3-row-padding w3-center" id="activity">
        <div class="w3-padding-32" style="margin-top: 8px;">
          <h2 class="w3-jumbo">Your Activity</h2>
          <table class="table ActivityList">
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

</body>

</html>