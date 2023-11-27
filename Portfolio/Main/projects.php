<?php
$activePage = 'projects';
$pageName = 'Projects';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./sections/style.css">
    <title>My Projects</title>
</head>
<body>
<?php include './sections/header.php' ?>
<?php include './sections/nav.php' ?> 
<h2>NS Challenge</h2>
<p>
    The Nova Scotia Challenge was an initiative by the Nova Scotia government, where participants were presented with a specific topic.
    Our task was to generate unique ideas and propose innovative solutions to address the given issue. This year's theme focused on food insecurity.
    The video below showcases my team's solution to the challenge.
</p>
<iframe width="560" height="315" src="https://www.youtube.com/embed/iADQcNEhDio" frameborder="0" allowfullscreen></iframe>
<hr>

<h2>Morse Code Translator in C++</h2>
<p>
    This is a C++ program titled Morse Code Converter. It's designed to convert English to Morse code and vice versa.
    The user is presented with two options: to encode English to Morse code or decode Morse code to English.
    Additionally, the user can input the phrase to be converted either directly from the keyboard or from a file.
    The Morse code mappings are stored in a map data structure.
</p>
<p>GitHub Link: <a href="https://github.com/JohnRWinsor/PROJECTS">Morse Code Translator in C++</a></p>
<img src="MORSECODE.png" alt="Morse Code Translator in C++">
<hr>

<h2>C Tic Tac Toe</h2>
<p>
    This is a C program titled Tic Tac Toe. It's designed to allow one player to play against a bot in a game of Tic Tac Toe.
    The game is played on a 3x3 grid. The first player to get three of their marks in a row (vertically, horizontally, or diagonally) wins the game.
    The game ends when either one player wins or the grid is full. The players can choose to play again or quit the game.
</p>
<p>GitHub Link: <a href="https://github.com/JohnRWinsor/PROJECTS/blob/main/TICTACTOE.c">C Tic Tac Toe</a></p>
<img src="TICTACTOE.png" alt="C Tic Tac Toe">
<hr>

</body>
<?php include './sections/footer.php' ?>
</html>
