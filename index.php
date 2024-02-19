<?php
require_once('./utils/autoload.php');
require_once('./utils/database.php');

$tourOperators = new TourOperatorManagement($db);

$tourOperators->getAllOperators(1);

$destinationManagement = new DestinationManagement($db);
$destinationManagement->getAllDestinations();

$allDestinations = $destinationManagement->getAllDestinations();

$destinationById = $destinationManagement->getDestinationById(1);
// var_dump($destinationById);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Tour Operator</title>
</head>
<main>

    <body>
        <section id="accueil">
            <div class="container vh-100">
                <div class="row">
                    <div class="d-flex  justify-content-center pt-5">
                        <h1>Montis Nivei</h1>
                        <div>
                            
                        </div>
                    <?php foreach ($allDestinations as $destination) { ?>
                        <form action="./process/add-destination.php">
                                    <label for="location"><?php echo $destination['name'] ?></label>
                                    <!-- <input type="text" id="location" name="location" /> -->
                            <input type="submit" value="Valider">
                        </form>
                    <?php } ?>

                    </div>
                </div>
            </div>
        </section>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>