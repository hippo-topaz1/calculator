<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
</head>
<body>
    <?php
        require_once 'CalculatorEngine.php';
        require_once 'CalculatorUI.php';

        $calculatorEngine = new CalculatorEngine();
        $calculatorUI = new CalculatorUI($calculatorEngine);
        $calculatorUI->start();
    ?>
</body>
</html>
