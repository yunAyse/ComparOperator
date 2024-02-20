<?php
require_once('../utils/autoload.php');
require_once('../utils/database.php');

$tourOperators = new TourOperatorManagement($db);
$tourOperators = $tourOperators->getAllOperators();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Montis Nivei</title>
</head>

<body>
    <h1>Operators</h1>
    <div class="d-flex justify-content-center">
    <select name="select-operator" id="select-operator"><?php foreach ($tourOperators as $tourOperator) { ?><option value="<?php $tourOperator['name'] ?>">
                <?php echo $tourOperator['name']; ?>
            </option><?php }
            var_dump($tourOperator['name']) ?>                                            
    </select>
</div>
</body>

</html>