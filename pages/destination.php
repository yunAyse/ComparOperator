<?php
require_once('../utils/autoload.php');
require_once('../utils/database.php');
// $destinationById = $destinationManagement->getDestinationById($destination);

$_SESSION['location'] = $_POST['the_location'];

$destinationManagement = new DestinationManagement($db);
$destinationsByLocation = $destinationManagement->getDestinationByLocation($_SESSION['location']);


$destinationManagement = new DestinationManagement($db);
$destinationManagement->getAllDestinations();
$allDestinations = $destinationManagement->getAllDestinations();

$tourOperators = new TourOperatorManagement($db);
$AlltourOperators = $tourOperators->getAllOperators();

$OperatorsByLocation = $tourOperators->getOperatorLocation($_SESSION['location']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $_SESSION['location'] ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #0F151C;">
      <div class="container-fluid d-flex justify-content-between">
        <div class="d-flex align-items-center gap-2">
          <img src="../img/mountain.png" alt="mountain-icon">
          <a class="navbar-brand fs-1 fw-bold text-light" href="../index.php">Montis Nivei</a>
        </div>
        <div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="background-color: #fff; border-radius: 5px;"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav fs-6">
              <a class="nav-link active text-light" aria-current="page" href="../index.php">Home</a>
              <a class="nav-link text-light" href="./operator.php">Tour Operators</a>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <section id="destination">
    <div class="container vh-100">
      <div class="row">
        <div class="d-flex flex-column justify-content-center pt-5">
          <div class="d-flex flex-wrap justify-content-evenly gap-4 pt-5">

          <?php foreach ($OperatorsByLocation as $operator) { ?>
              <div class="card" style="width: 18rem;">
                <img src="../img-destinations/<?php echo $destinationsByLocation['location'] ?>.jpg" class="card-img-top" height="165rem;" alt="...">
                <div class="card-body">
                  <h5 class="card-title fs-4"><?php echo $destinationsByLocation['location'] ?></h5>
                  <div class="d-flex justify-content-between">
                    <p class="card-text">
                      <?php 
                        echo $operator['name']; ?>
                     
                    <p class="card-text fw-bold"><?php echo $destinationsByLocation['price'] ?>$</p>
                  </div>
                  <form action="./operator.php" method="post">
                    <input type="submit" class="bg-info px-2 text-light border-0 rounded" value="Select">
                    <input type="hidden" name="the_location" value="<?php echo $destinationsByLocation['location'] ?>">

                  </form>
                </div>
              </div> <?php } ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>