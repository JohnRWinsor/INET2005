<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pizza Order Summary</title>
</head>
<body>
    
    <?php
    // Pizza size and topping prices
    $sizePrices = [
        "small" => 9.00,
        "medium" => 12.50,
        "large" => 15.00,
        "extra" => 17.50,
    ];
    
    $toppingPrice = [
        "cheese" => 0.00,
        "pepperoni" => 1.00,
        "olive" => 1.00,
        "pineapple" => 1.00,
        "ham" => 1.00,
    ];

    // Get user input from form
    if (isset($_POST["size"]) && isset($_POST["toppings"])) {
        $selectedSize = $_POST["size"];
        $selectedToppings = $_POST["toppings"];

        // Check if topping exists in the price array
        // Add the topping price to the total cost
    $totalCost = $sizePrices[$selectedSize];
    foreach ($selectedToppings as $topping) {
        if (array_key_exists($topping, $toppingPrice)) { 
            $totalCost += $toppingPrice[$topping]; 
        }
    }
}
    // Display the order summary
     echo "<p>Size: $selectedSize</p>";
     echo "<p>Toppings: " . implode(", ", $selectedToppings) . "</p>";
     echo "<p>Total Cost: $" . number_format($totalCost, 2) . "</p>";

    ?>
</body>
</html>