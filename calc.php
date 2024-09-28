<!DOCTYPE html>
<html>
<head>
    <title>PHP Multipurpose Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 50px;
        }
        .calculator {
            background: #fff;
            padding: 20px;
            margin: 0 auto;
            width: 300px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
        }
        button {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h2>Multipurpose Calculator</h2>
        <form method="POST">
            <input type="number" name="num1" placeholder="Enter first number" required>
            <input type="number" name="num2" placeholder="Enter second number" required>
            
            <select name="operation">
                <option value="add">Addition (+)</option>
                <option value="subtract">Subtraction (-)</option>
                <option value="multiply">Multiplication (×)</option>
                <option value="divide">Division (÷)</option>
                <option value="exponentiation">Exponentiation (^)</option>
                <option value="percentage">Percentage (%)</option>
                <option value="sqrt">Square Root (√)</option>
                <option value="log">Logarithm (log)</option>
            </select>
            
            <button type="submit" name="calculate">Calculate</button>
        </form>
        
        <?php
        if (isset($_POST['calculate'])) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $operation = $_POST['operation'];
            $result = "";

            switch ($operation) {
                case 'add':
                    $result = $num1 + $num2;
                    break;
                case 'subtract':
                    $result = $num1 - $num2;
                    break;
                case 'multiply':
                    $result = $num1 * $num2;
                    break;
                case 'divide':
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                    } else {
                        $result = "Error: Division by zero.";
                    }
                    break;
                case 'exponentiation':
                    $result = pow($num1, $num2);
                    break;
                case 'percentage':
                    $result = ($num1 / 100) * $num2;
                    break;
                case 'sqrt':
                    $result = "√" . $num1 . " = " . sqrt($num1);
                    break;
                case 'log':
                    if ($num1 > 0) {
                        $result = "log(" . $num1 . ") = " . log($num1);
                    } else {
                        $result = "Error: Logarithm of a non-positive number.";
                    }
                    break;
                default:
                    $result = "Invalid operation";
                    break;
            }

            echo "<h3>Result: $result</h3>";
        }
        ?>
    </div>
</body>
</html>