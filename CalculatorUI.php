<!-- CalculatorUI.php -->
<?php

class CalculatorUI {
    private $calculatorEngine;

    public function __construct($calculatorEngine) {
        $this->calculatorEngine = $calculatorEngine;
    }

    public function start() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $num1 = $_POST['num1'];
                $num2 = $_POST['num2'];
                $operation = $_POST['operation'];

                $result = $this->performOperation($operation, $num1, $num2);
                echo "Result: $result";
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        $this->renderForm();
    }

    private function renderForm() {
        echo '<form method="post" action="index.php">
                <label for="num1">Enter first number:</label>
                <input type="text" name="num1" required><br>

                <label for="num2">Enter second number:</label>
                <input type="text" name="num2" required><br>

                <label for="operation">Select operation:</label>
                <select name="operation">
                    <option value="add">Addition (+)</option>
                    <option value="subtract">Subtraction (-)</option>
                    <option value="multiply">Multiplication (*)</option>
                    <option value="divide">Division (/)</option>
                </select><br>

                <button type="submit">Calculate</button>
            </form>';
    }

    private function performOperation($operation, $num1, $num2) {
        switch ($operation) {
            case 'add':
                return $this->calculatorEngine->add($num1, $num2);
            case 'subtract':
                return $this->calculatorEngine->subtract($num1, $num2);
            case 'multiply':
                return $this->calculatorEngine->multiply($num1, $num2);
            case 'divide':
                return $this->calculatorEngine->divide($num1, $num2);
            default:
                throw new Exception('Invalid operation');
        }
    }
}
