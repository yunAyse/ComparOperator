<?php
require_once('../utils/autoload.php');
require_once('../utils/database.php');

$tourOperators = new TourOperatorManagement($db);
$getTourOperators = $tourOperators->getAllOperators();
$selectTourOperators = $tourOperators->selectTourOperator($selectTourOperator);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Montis Nivei</title>
</head>

<body>
    <div class="d-flex justify-content-center">
        <h1>Operators</h1>

        <form action="../pages/operator.php" method="post">
            <select name="select-operator" id="select-operator">
                <?php foreach ($getTourOperators as $getTourOperator) { ?>
                    <option value="<?php echo $getTourOperator['name']; ?>">
                        <?php echo $getTourOperator['name']; ?>
                    </option>
                <?php } ?>
            </select>
            <input value="valider" type="submit">
        </form>
    </div>
</body>

</html>