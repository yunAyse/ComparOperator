<?php
require_once('../utils/autoload.php');
require_once('../utils/database.php');
session_start();

if (isset($_POST['name_operator']) && isset($_POST['operator_id'])) {
    $_SESSION['operator_id'] = $_POST['operator_id'];
    $_SESSION['operator'] = $_POST['name_operator'];
} 

$review = new ReviewManagement($db);
$getAllReview = $review->getAllReview($_SESSION['operator_id']);


// echo '<pre>';
// var_dump($getAllReview);
// echo '</pre>';
// var_dump($getTourOperators);



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
                <a class="navbar-brand fs-1 fw-bold text-light d-flex align-items-center" href="../index.php"><img src="../img/mountain.png" alt="mountain-icon">Montis Nivei</a>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <section id="operator" style="min-height: 100vh;">
            <div class="container d-flex flex-column align-items-center p-5">
                <h1 class="text-light px-4 py-2 rounded" style="text-transform: uppercase; background-color: #00000049"><?php echo $_SESSION['operator'] ?></h1>
                <div class="container vh-100">
                    <div class="row">
                        <div id="form">
                            <form action="../process/add-review.php" method="post">
                                <div class="mb-3">
                                    <label for="author" class="form-label">Name</label>
                                    <input type="text" placeholder="who is thinking this way?" class="form-control" name="author">
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" name="message"> </textarea>
                                </div>
                                <input type="hidden" value="<?php echo $_SESSION['operator_id'] ?>">
                                <input type="submit" value="Send">
                            </form>
                        </div>
                        <div class="d-flex flex-column align-items-end justify-content-end pt-5">
                            <div class="card" style="width: 18rem;">
                                <div class="card-header">
                                    <h3>Reviews</h3>
                                </div>
                                <?php foreach ($getAllReview as $review) { ?>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <h5><?php echo $review->getAuthor() ?></h5>
                                            <p class="card-title"><?php echo $review->getMessage() ?></p>
                                        </li>
                                    </ul>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="d-flex justify-content-around py-2">
<p class="copyright text-white mb-0 mt-3">© 2024 - Ayse Onal & Anthony Canet</p>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>