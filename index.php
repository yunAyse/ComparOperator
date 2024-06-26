<?php
require_once('./utils/autoload.php');
require_once('./utils/database.php');

$tourOperators = new TourOperatorManagement($db);

$tourOperators = $tourOperators->getAllOperators();

$destinationManagement = new DestinationManagement($db);
$destinationManagement->getAllDestinations();
$allDestinations = $destinationManagement->getAllDestinations();

?>

<!DOCTYPE html>
 <html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="icon" href="./img/mountain.png">
    <title>Montis Nivei</title>
</head>
<main>

    <body>

        <header>
            <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #0F151C;">
                <div class="container-fluid d-flex justify-content-between">
                    <div class="d-flex align-items-center gap-2">
                    <a class="navbar-brand fs-1 fw-bold text-light d-flex align-items-center gap-2" href="./index.php"><img src="./img/mountain.png" alt="mountain-icon">Montis Nivei</a>
                    </div>
                    
                </div>
            </nav>
        </header>

        <section id="accueil" class="pb-5">
            <div class="container">
                <div class="row">
                    <div class="d-flex flex-column justify-content-center pt-5">
                        <div class="d-flex flex-wrap justify-content-evenly gap-4 pt-5">

                            <?php foreach ($allDestinations as $destination) { ?>
                                <div class="card" style="width: 18rem;">
                                    <img src="./img-destinations/<?php echo $destination->getLocation() ?>.jpg" class="card-img-top" height="165rem;" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $destination->getLocation() ?></h5>
                                        <form action="./pages/destination.php" method="post">
                                            <input type="submit" class="bg-info px-2 text-light border-0 rounded" value="Select">
                                            <input type="hidden" name="the_location" value="<?php echo $destination->getLocation() ?>">
                                        </form>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                    </div>
                </div>
            </div>
        </section>
</main>
<footer class="d-flex justify-content-around py-2">
<p class="copyright text-white mb-0 mt-3">© 2024 - Ayse Onal & Anthony Canet</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>