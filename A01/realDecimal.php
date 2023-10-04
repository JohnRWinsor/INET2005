<!DOCTYPE html>
<head>
    <title>Results</title>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve the number from user
            $number = $_POST["number"]; 
        
            // Check if input is valid number
        if (is_numeric($number)) {
            $ceilResult = ceil($number);
            $floorResult = floor($number);
            $roundResult = round($number);

            // Display the results
            echo "<p>Original number: $number</p>";
            echo "<p>ceiling: $ceilResult</p>";
            echo "<p>floor: $floorResult</p>";
            echo "<p>round: $roundResult</p>";
        } else {
            echo "<p>Please Enter a valid number :( </p>";
        }
        }
    ?>

</body>
</html>