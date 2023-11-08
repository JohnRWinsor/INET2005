<h2>Part 2/3 Arrays</h2>
<?php
// Connect to the database (replace with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assignment3";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user data from the database
$sql = "SELECT user_id, first_name, last_name FROM registered_users";
$result = $conn->query($sql);

// Initialize an empty array to store all users
$all_users = [];

// Loop through each retrieved record and add user data to the all_users array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Initialize an empty array to store user data
        $user_array = [];

        // Add user data to the user_array
        $user_array["user_id"] = $row["user_id"];
        $user_array["first_name"] = $row["first_name"];
        $user_array["last_name"] = $row["last_name"];

        // Add the user_array to the end of the all_users array
        $all_users[] = $user_array;
    }
}

// Loop through the all_users array and display the stored values for each user
foreach ($all_users as $user) {
    echo "User ID: " . $user["user_id"] . "<br>";
    echo "First Name: " . $user["first_name"] . "<br>";
    echo "Last Name: " . $user["last_name"] . "<br><br>";
}

// Close the database connection
$conn->close();
?>


<h2>Favorite Movies</h2>
<?php


$favoriteMovie = array (
    array (
        'TITLE' => 'Interstellar',
        'mainActor' => 'Matthew McConaughey',
        'Director' => 'Christopher Nolan',
        'Genre' => 'Sci-Fi',
        'PICTURE' => 'https://i.pinimg.com/736x/9b/77/ff/9b77ff318ea36dc5727ad55d85fb2dca.jpg',
    ),
    array (
        'TITLE' => 'The Dark Knight',
        'mainActor' => 'Christian Bale',
        'Director' => 'Christopher Nolan',
        'Genre' => 'Action',
        'PICTURE' => 'https://1.bp.blogspot.com/-5750YkjEZls/UkFjMOGvR1I/AAAAAAAAAEA/gdu892nbUHw/s1600/The+Dark+Knight.jpg',
    ),
    array (
        'TITLE' => 'The Social Network',
        'mainActor' => 'Jesse Eisenberg',
        'Director' => 'David Fincher',
        'Genre' => 'Drama',
        'PICTURE' => 'https://www.themoviedb.org/t/p/original/jXbqfVHmvCikyTw2Lf5OhKyt9Ym.jpg',
    ),
    array (
        'TITLE' => 'The Lord of the Rings: The Return of the King',
        'mainActor' => 'Elijah Wood',
        'Director' => 'Peter Jackson',
        'Genre' => 'Adventure',
        'PICTURE' => 'https://image.tmdb.org/t/p/original/tJJBhAJixZjq5Ok787cPMWX4Yxl.jpg',
    ),
    array (
        'TITLE' => 'The Avengers',
        'mainActor' => 'Robert Downey Jr.',
        'Director' => 'Joss Whedon',
        'Genre' => 'Action',
        'PICTURE' => 'https://image.tmdb.org/t/p/original/pdhOE0NAZaPzjsgTvatRP1xFhG3.jpg',
    ),
    array (
        'TITLE' => 'The Revenant',
        'mainActor' => 'Leonardo DiCaprio',
        'Director' => 'Alejandro González Iñárritu',
        'Genre' => 'Adventure',
        'PICTURE' => 'https://th.bing.com/th/id/OIP.LCAefuDN4R1xxi-tUyp7ggHaJ4?pid=ImgDet&rs=1'
    ),
    array (
        'TITLE' => 'Inglourious Basterds',
        'mainActor' => 'Brad Pitt',
        'Director' => 'Quentin Tarantino',
        'Genre' => 'Adventure',
        'PICTURE' => 'https://th.bing.com/th/id/OIP.QUoMtBvXOVt6rgQhMTjErgHaKe?pid=ImgDet&rs=1',
    ),
    array (
        'TITLE' => 'The Silence of the Lambs',
        'mainActor' => 'Jodie Foster',
        'Director' => 'Jonathan Demme',
        'Genre' => 'Crime',
        'PICTURE' => 'https://th.bing.com/th/id/OIP.jsAScQP8NrsEaebpftXAAAHaKk?w=186&h=265&c=7&r=0&o=5&pid=1.7',
    ),
    array (
        'TITLE' => 'Goodfellas',
        'mainActor' => 'Ray Liotta',
        'Director' => 'Martin Scorsese',
        'Genre' => 'Biography',
        'PICTURE' => 'https://th.bing.com/th/id/OIP.xj-TVmz64GfKtdDw9LGbDQHaKj?w=186&h=265&c=7&r=0&o=5&pid=1.7',
    ),
    array (
        'TITLE' => 'The Shawshank Redemption',
        'mainActor' => 'Tim Robbins',
        'Director' => 'Frank Darabont',
        'Genre' => 'Drama',
        'PICTURE' => 'https://th.bing.com/th/id/OIP.R9QzRdaGcq2oTHXPpncMlAHaKT?w=186&h=259&c=7&r=0&o=5&pid=1.7',
    ),
);

// Create a new SimpleXMLElement
$xml = new SimpleXMLElement('<movies></movies>');


// Loop through the movie data and add each movie to the XML structure
foreach ($favoriteMovie as $movie) {
    $movieElement = $xml->addChild('movie');
    foreach ($movie as $key => $value) {
        $movieElement->addChild($key, htmlspecialchars($value));
    }
}

// Save the XML data to a file
$xml->asXML('favoriteMovie.xml');

// Display success message
echo "XML file created successfully: favoriteMovie.xml";


// Load the XML file
$xml = simplexml_load_file('favoriteMovie.xml');

// Start the table
echo '<table border="1">';
echo '<tr><th>TITLE</th><th>Main Actor</th><th>Director</th><th>Genre</th><th>PICTURE</th></tr>';

// Loop through the movie elements
foreach ($xml->movie as $movie) {
    echo '<tr>';
    echo '<td>' . $movie->TITLE . '</td>';
    echo '<td>' . $movie->mainActor. '</td>';
    echo '<td>' . $movie->Director . '</td>';
    echo '<td>' . $movie->Genre . '</td>';
    echo '<td><img src="' . $movie->PICTURE . '" width="100"></td>';
    echo '</tr>';
}

// End the table
echo '</table>';
?>


