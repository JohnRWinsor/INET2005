<!DOCTYPE html>
<html>
<head>
    <title>Calculator Result</title>
</head>
<body>
    <h1>Calculator Result</h1>

    <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Enter 2 numbers
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];

        function addThem ($x, $y) {
            return $x + $y;
        }

        function subtractThem ($x, $y) {
            return $x - $y;
        }

        function multiplyThem ($x, $y) {
            return $x * $y;
        }

        function divideThem ($x, $y) {
            return $x / $y;
        }
     
        $resultAdd = addThem($num1, $num2);
        $resultSubtract = subtractThem($num1, $num2);
        $resultMultiply = multiplyThem($num1, $num2);
        $resultDivide = divideThem($num1, $num2);

        echo "$num1 plus $num2 is $resultAdd<br>";
        echo "$num1 minus $num2 is $resultSubtract<br>";
        echo "$num1 multiplied by $num2 is $resultMultiply<br>";
        echo "$num1 divided by $num2 is $resultDivide<br>";
     }
    ?>

</body>
</html>