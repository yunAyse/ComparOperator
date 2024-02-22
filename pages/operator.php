<?php
require_once('../utils/autoload.php');
require_once('../utils/database.php');

$_SESSION['operator'] = $_POST['name_operator'];



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
        <div class="container d-flex flex-column align-items-center p-5">
            <h1 class="text-light px-4 py-2 rounded" style="text-transform: uppercase; background-color: #00000049"><?php echo $_SESSION['operator'] ?></h1>
            <div class="d-flex justify-content-center">

            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>