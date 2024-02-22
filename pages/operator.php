<?php
require_once('../utils/autoload.php');
require_once('../utils/database.php');

$review = new ReviewManagement($db);

$getAllReview = $review->getAllReview($_POST['operator_id']);

// echo '<pre>';
// var_dump($getAllReview);
// echo '</pre>';
// var_dump($getTourOperators);

// $operators = new TourOperator($tourOperators->hydrate($getTourOperators));
// $selectTourOperators = $tourOperators->selectTourOperator($operators);
// var_dump($selectTourOperators);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Montis Nivei</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="icon" href="../img/mountain.png">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #0F151C;">
            <div class="container-fluid d-flex justify-content-between">
                <div class="d-flex align-items-center gap-2">
                    <img src="../img/mountain.png" alt="mountain-icon">
                    <a class="navbar-brand fs-1 fw-bold text-light" href="#">Montis Nivei</a>
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
    <section id="operator" style="min-height: 100vh;">
        <div class="container">
            <h1>Operators</h1>
            <section id="accueil">
            <div class="container vh-100">
                <div class="row">
                    <div class="d-flex flex-column justify-content-center pt-5">
                        <div class="d-flex flex-wrap justify-content-evenly gap-4 pt-5">
                        <?php foreach ($getAllReview as $review) { ?>
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h1><?php echo $review->getMessage() ?></h1>
                                        <h5 class="card-title"><?php echo $review->getMessage() ?></h5>
                                        <form action="./pages/destination.php" method="post">
                                            <input type="submit" class="bg-info px-2 text-light border-0 rounded" value="Select">
                                            <input type="hidden" name="the_location" value="<?php echo $review->getMessage() ?>">
                                        </form>
                                    </div>
                                </div>
                            <?php } ?>
                           
                        </div>

                    </div>
                </div>
            </div>
        </section>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>