<?php
require_once('../utils/autoload.php');
require_once('../utils/database.php');

$tourOperators = new TourOperatorManagement($db);
$tourOperators = $tourOperators->getAllOperators();
var_dump($tourOperators);

$destinationManagement = new DestinationManagement($db);
// $destinationManagement->connectDestinationAndOperator();


foreach ($tourOperators as $tourOperator) { 

    var_dump($tourOperator);
  } 
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Admin</title>
</head>

<body>
    <h2>Formulaire de déstination</h2>
    <form action="../process/add-destination.php" method="post">
        <ul>
            <li>
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" />
            </li>
            <li>
                <label for="operator">Operator:</label>
                <select name="operator_id" id="operator_id">
                 <?php
                foreach ($tourOperators as $tourOperator) { ?>
                
                    <option value="<?php echo $tourOperator['id']?>"><?php echo $tourOperator['name'] ?></option>
                   <?php } ?> 
                </select>
            </li>
            <li>
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" />
            </li>
        </ul>
        <input type="submit" value="Valider">
    </form>
    <h2>Tour operator</h2>
    <form action="../process/add-operator.php" method="post">
        <ul>
            <li>
                <label for="name">Name: </label>
                <input type="text" id="name" name="name_operator" />
            </li>
            <li>
                <label for="link">Link:</label>
                <input type="url" id="link" name="link_operator" />
            </li>
            
            <li>
                <label for="grade_total">Premium:</label>
                <select name="is_premium" id="is_premium">
                    <option value="1">
                        Premium
                    </option>
                    <option value="0">
                        Classic
                    </option>
                </select>
            </li>
        </ul>
            <input type="submit" value="Valider">
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>