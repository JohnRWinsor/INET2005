<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database (replace with your database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "assignment3";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $title = $_POST["title"];
    $first_name = $_POST["firstname"];
    $last_name = $_POST["lastname"];
    $street = $_POST["street"];
    $city = $_POST["city"];
    $province = $_POST["province"];
    $postal_code = $_POST["postalcode"];
    $country = $_POST["country"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $newsletter = isset($_POST["newsletter"]) ? 1 : 0;

    $createTableQuery = "CREATE TABLE IF NOT EXISTS registered_users (
        user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        title VARCHAR(10),
        first_name VARCHAR(30),
        last_name VARCHAR(30),
        street VARCHAR(50),
        city VARCHAR(50),
        province VARCHAR(50),
        postal_code VARCHAR(50),
        country VARCHAR(50),
        phone VARCHAR(50),
        email VARCHAR(50),
        newsletter BOOLEAN
        )";

$sql = "INSERT INTO registered_users (title, first_name, last_name, street, city, province, postal_code, country, phone, email, newsletter) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($conn->query($createTableQuery) === TRUE) {
        echo "Table created successfully.";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    // Validate required fields
    $errors = [];
    if (empty($title) || empty($first_name) || empty($last_name) || empty($street) || empty($city) || empty($province) || empty($postal_code) || empty($country) || empty($phone) || empty($email)) {
        $errors[] = "All fields are required except Newsletter.";
    }

    // Inserts data into the database using prepared statements
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sssssssssss", $title, $first_name, $last_name, $street, $city, $province, $postal_code, $country, $phone, $email, $newsletter);
    
        if ($stmt->execute()) {
            $user_id = $stmt->insert_id;
            echo "Data inserted successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
    
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
    // If there are errors, display the form with errors
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
        // You can also repopulate the form with user input here.
        include('dbProgramming.html');
    } else {

        if ($conn->query($sql) === TRUE) {
            echo "User registered successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        // Close the database connection
        $conn->close();
    }

        // Redirect to the registration form
} else {
        // Redirect to the registration form if accessed directly
    header("Location: dbProgramming.html");
}





