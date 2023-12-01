<?php
$movies = array();

$xml = simplexml_load_file("favoriteMovie.xml") or die("Error: Cannot create object");

class Movie {
    private $title;
    private $director;
    private $mainActor;
    private $genre;
    private $picture;

    function __construct($title, $director, $mainActor, $genre, $picture) {
        $this->title = $title;
        $this->director = $director;
        $this->mainActor = $mainActor;
        $this->genre = $genre;
        $this->picture = $picture;
    }

    // Getters
    function getTitle() {
        return $this->title;
    }

    function getDirector() {
        return $this->director;
    }

    function getMainActor() {
        return $this->mainActor;
    }

    function getGenre() {
        return $this->genre;
    }

    function getPicture() {
        return $this->picture;
    }

    // Setters
    function setTitle($title) {
        $this->title = $title;
    }

    function setDirector($director) {
        $this->director = $director;
    }

    function setMainActor($mainActor) {
        $this->mainActor = $mainActor;
    }

    function setGenre($genre) {
        $this->genre = $genre;
    }

    function setPicture($picture) {
        $this->picture = $picture;
    }
}

// Loop through the XML nodes
foreach ($xml->children() as $movie) {
    $title = $movie->TITLE;
    $director = $movie->Director;
    $mainActor = $movie->{'Main Actor/Actress'};
    $genre = $movie->Genre;
    $picture = $movie->PICTURE;

    $movies[] = new Movie($title, $director, $mainActor, $genre, $picture);
}

// Display
function display($movies) {
    echo '<table>';
    foreach ($movies as $movie) {
        echo '<tr>';
        echo '<td>' . $movie->getTitle() . '</td>';
        echo '<td>' . $movie->getDirector() . '</td>';
        echo '<td>' . $movie->getMainActor() . '</td>';
        echo '<td>' . $movie->getGenre() . '</td>';
        echo '<td>' . $movie->getPicture() . '</td>';
        echo '</tr>';
    }
    echo '</table>';
}

display($movies);
?>