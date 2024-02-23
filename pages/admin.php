<?php
require_once('../utils/autoload.php');
require_once('../utils/database.php');

$tourOperator = new TourOperatorManagement($db);
$tourOperators = $tourOperator->getAllOperators();
// var_dump($tourOperators);

$destinationManagement = new DestinationManagement($db);
// $destinationManagement->connectDestinationAndOperator();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Admin</title>
    <link rel="icon" href="../img/mountain.png">
    <link rel="stylesheet" href="../styles/style.css">

</head>

<body>
    <div class="container d-flex justify-content-evenly ">

        <div class="card p-5">
            <h2 class="mb-3">Destination Form</h2>
            <!-- bootstrap -->
            <form class="w-50" action="../process/add-destination.php" method="post">
                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control" name="location" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="operator" class="form-label">Operator</label>
                    <select name="operator_id" class="form-select" id="operator_id">
                        <?php
                        foreach ($tourOperators as $tourOperator) { ?>
                            <option value="<?php echo $tourOperator->getId() ?>"><?php echo $tourOperator->getName(); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Price</label>
                    <input type="number" class="form-control" name="price" aria-describedby="emailHelp">
                </div>
                <div>
                    <input type="submit" value="Validate" class="bg-dark px-2 text-light border-0 rounded">
                </div>
            </form>
        </div>
        <div class="card p-5">
            <h2 class="mb-3">Tour Operator Form</h2>
            <!-- bootstrap -->
            <form class="w-75" action="../process/add-operator.php" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name_operator" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="link" class="form-label">Link</label>
                    <input type="url" class="form-control" name="link_operator" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="is_premium" class="form-label">Premium</label>
                    <select name="is_premium" class="form-select" id="is_premium">
                        <option value="1">
                            Premium
                        </option>
                        <option value="0">
                            Classic
                        </option>
                    </select>
                </div>
                <div>
                    <input type="submit" value="Validate" class="bg-dark text-light border-0 rounded px-2">
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>