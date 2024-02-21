<?php

require_once('../utils/autoload.php');
require_once('../utils/database.php');

$destination = new Destination([
  'id' => 1,
  'price' => 2,
  'location' => 'italy',
  'operator_id' => 1
]);
// $destinationById = $destinationManagement->getDestinationById($destination);

$destinationManagement = new DestinationManagement($db);
$destinationsByLocation = $destinationManagement->getDestinationByLocation($_POST['the_location']);


$destinationManagement = new DestinationManagement($db);
$destinationManagement->getAllDestinations();
$allDestinations = $destinationManagement->getAllDestinations();

?>

<!DOCTYPE html>  
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Destination</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
  <section id="destination">
  <div class="container vh-100">
<div class="row">
    <div class="d-flex flex-column justify-content-center pt-5">
    <div class="d-flex flex-wrap justify-content-evenly gap-4 pt-5">

<?php foreach ($destinationsByLocation as $destinationByLocation) {
  var_dump($destinationByLocation) ?>
    <div class="card" style="width: 18rem;">
        <img src="../img-destinations/<?php echo $destinationByLocation['location'] ?>.jpg" class="card-img-top" height="165rem;" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $destinationByLocation['location'] ?></h5>
            <form action="./pages/destination.php" method="post">
                <input type="submit" class="bg-info px-2 text-light border-0 rounded" value="Select">
                <input type="hidden" name="the_location" value="<?php echo $destinationByLocation['location'] ?>">
            </form>
        </div>
    </div>
<?php } ?>
</div>
    </div>
</div>
</div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>