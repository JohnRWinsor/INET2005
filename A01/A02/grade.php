<!DOCTYPE html>
<html lang="en">
<head>
    <title>Grade Result</title>
</head>
<body>
    <h1>Grade Result</h1>

    <?php
        if (isset($_POST['mark'])) {
            $mark = $_POST['mark'];

        if (empty($mark)) {
            echo "Error: No value entered.";
        } elseif (is_numeric($mark)) {
            $mark = (float)$mark;

            if($mark >= 85 && $mark <= 100) {
                echo "You got an A!.";
            } elseif ($mark >= 75 && $mark <= 85) {
                echo "You got a B!.";
            } elseif ($mark >= 60 && $mark <= 75) {
                echo "You got a C.";
            } elseif ($mark >= 0 && $mark <= 59) {
                echo "You got an F and failed.";
            } else {
                echo "Error: Mark is invaild (0-100).";
            }
        } else {
            switch ($mark) {
            case "A":
            case "a":
                echo "A: 85-100";
                break;
            case "B":
            case "b":
                echo "B: 74-84.99";
                break;
            case "C":
            case "c":
                echo "C: 60-74.99";
                break;
            case "F":
            case "f":
                echo "F: 0-59.99";
                break;
            }
        }
    }
    ?>
</body>
</html>