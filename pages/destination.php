<?php
require_once('../utils/autoload.php');
require_once('../utils/database.php');
session_start();
$_SESSION['location'] = $_POST['the_location'];

$destinationManagement = new DestinationManagement($db);
$destinationsByLocation = $destinationManagement->getDestinationByLocation($_SESSION['location']);
// var_dump($destinationsByLocation);

$tourOperators = new TourOperatorManagement($db);

$operatorsByLocation = $tourOperators->getOperatorLocation($_SESSION['location']);
// var_dump($operatorsByLocation);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $_SESSION['location'] ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="../styles/style.css">
  <link rel="icon" href="../img/mountain.png">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #0F151C;">
      <div class="container-fluid d-flex justify-content-between">
        <div class="d-flex align-items-center gap-2">  
          <a class="navbar-brand fs-1 fw-bold text-light d-flex align-items-center gap-2" href="../index.php"><img src="../img/mountain.png" alt="mountain-icon">Montis Nivei</a>
        </div>
      </div>
    </nav>
  </header>

  <section id="destination">
    <div class="container vh-100">
      <div class="row">
        <div class="d-flex flex-column align-items-center justify-content-center pt-5">

          <h1 class="text-light px-4 py-2 rounded" style="text-transform: uppercase; background-color: #00000049">
          <?php echo $_SESSION['location'] ?></h1>

          <div class="d-flex flex-wrap justify-content-evenly gap-4 pt-5">
            <?php foreach ($operatorsByLocation as $operator) { ?>
              <div class="card" style="width: 18rem;">
                <img src="../img-destinations/<?php
            echo $operator['location']; 
           ?>.jpg" class="card-img-top" height="165rem;" alt="...">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                  <h5 class="card-title fs-4"><?php  echo $operator['name']; ?></h5>
                    <p class="card-text fw-bold"><?php                  
                    echo $operator['price']; 
                      ?>$</p>
                  </div>
                  <form action="./operator.php" method="post">
                    <input type="submit" class="bg-info px-2 text-light border-0 rounded" value="Select">
                    <input type="hidden" name="the_location" value="<?php $operator['location']; ?>">
                    <input type="hidden" name="name_operator" value="<?php echo $operator['name'] ?>">
                    <input type="hidden" name="operator_id" value="<?php echo $operator['tour_operator_id'] ?>">

                  </form>
                </div>
              </div> <?php } ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer class="d-flex justify-content-around py-2">
<p class="copyright text-white mb-0 mt-3">© 2024 - Ayse Onal & Anthony Canet</p>
</footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>