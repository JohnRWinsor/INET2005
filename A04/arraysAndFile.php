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
        'Main Actor/Actress' => 'Matthew McConaughey',
        'Director' => 'Christopher Nolan',
        'Genre' => 'Sci-Fi',
        'PICTURE' => 'https://i.pinimg.com/736x/9b/77/ff/9b77ff318ea36dc5727ad55d85fb2dca.jpg',
    ),
    array (
        'TITLE' => 'The Dark Knight',
        'Main Actor/Actress' => 'Christian Bale',
        'Director' => 'Christopher Nolan',
        'Genre' => 'Action',
        'PICTURE' => 'https://1.bp.blogspot.com/-5750YkjEZls/UkFjMOGvR1I/AAAAAAAAAEA/gdu892nbUHw/s1600/The+Dark+Knight.jpg',
    ),
    array (
        'TITLE' => 'The Social Network',
        'Main Actor/Actress' => 'Jesse Eisenberg',
        'Director' => 'David Fincher',
        'Genre' => 'Drama',
        'PICTURE' => 'https://www.themoviedb.org/t/p/original/jXbqfVHmvCikyTw2Lf5OhKyt9Ym.jpg',
    ),
    array (
        'TITLE' => 'The Lord of the Rings: The Return of the King',
        'Main Actor/Actress' => 'Elijah Wood',
        'Director' => 'Peter Jackson',
        'Genre' => 'Adventure',
        'PICTURE' => 'https://image.tmdb.org/t/p/original/tJJBhAJixZjq5Ok787cPMWX4Yxl.jpg',
    ),
    array (
        'TITLE' => 'The Avengers',
        'Main Actor/Actress' => 'Robert Downey Jr.',
        'Director' => 'Joss Whedon',
        'Genre' => 'Action',
        'PICTURE' => 'https://image.tmdb.org/t/p/original/pdhOE0NAZaPzjsgTvatRP1xFhG3.jpg',
    ),
    array (
        'TITLE' => 'The Revenant',
        'Main Actor/Actress' => 'Leonardo DiCaprio',
        'Director' => 'Alejandro González Iñárritu',
        'Genre' => 'Adventure',
        'PICTURE' => 'data:image/jpeg;base64,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',
    ),
    array (
        'TITLE' => 'Inglourious Basterds',
        'Main Actor/Actress' => 'Brad Pitt',
        'Director' => 'Quentin Tarantino',
        'Genre' => 'Adventure',
        'PICTURE' => 'https://th.bing.com/th/id/OIP.QUoMtBvXOVt6rgQhMTjErgHaKe?pid=ImgDet&rs=1',
    ),
    array (
        'TITLE' => 'The Silence of the Lambs',
        'Main Actor/Actress' => 'Jodie Foster',
        'Director' => 'Jonathan Demme',
        'Genre' => 'Crime',
        'PICTURE' => 'https://th.bing.com/th/id/OIP.jsAScQP8NrsEaebpftXAAAHaKk?w=186&h=265&c=7&r=0&o=5&pid=1.7',
    ),
    array (
        'TITLE' => 'Goodfellas',
        'Main Actor/Actress' => 'Ray Liotta',
        'Director' => 'Martin Scorsese',
        'Genre' => 'Biography',
        'PICTURE' => 'https://th.bing.com/th/id/OIP.xj-TVmz64GfKtdDw9LGbDQHaKj?w=186&h=265&c=7&r=0&o=5&pid=1.7',
    ),
    array (
        'TITLE' => 'The Shawshank Redemption',
        'Main Actor/Actress' => 'Tim Robbins',
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
        $movieElement->addChild($key, $value);
    }
}

// Save the XML data to a file
$xml->asXML('favoriteMovie.xml');

// Display success message
echo "XML file created successfully: favoriteMovie.xml";
?>

<?php
// Loop through each movie and display its information
foreach ($favoriteMovie as $movie) {
    echo "<h2>" . $movie['TITLE'] . "</h2>";
    echo "<p>Main Actor/Actress: " . $movie['Main Actor/Actress'] . "</p>";
    echo "<p>Director: " . $movie['Director'] . "</p>";
    echo "<p>Genre: " . $movie['Genre'] . "</p>";
    echo "<img src='" . $movie['PICTURE'] . "'><br><br>";
}
?>
<style>
    img {
        height: 800px;
    }   
</style>