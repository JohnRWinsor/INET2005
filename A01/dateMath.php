<!DOCTYPE html>
<head>
    <title>Results</title>
</head>
<body>
    <?php

     if ($_SERVER["REQUEST_METHOD"] == "POST") {
         // Retrieve the date from user
         $userDate = $_POST["date"];
         //match date time format
         if (preg_match("/^\d{4}-\d{2}-\d{2}$/", $userDate)) {

             $userTimestamp = strtotime($userDate);
             $june302016Timestamp = strtotime("2016-06-30");

             $daysDifference = floor(($june302016Timestamp - $userTimestamp) / (60 * 60 * 24));

             echo "<p> Number of days between $userDate and June 30, 2016: $daysDifference days</p>";
         } else {
             echo "<p> Please enter a valid date in the format YYYY-MM-DD.</p>";
         }

     }
 ?>
</body>
</html>