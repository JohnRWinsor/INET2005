<<<<<<< HEAD
<?php
$activePage = 'login';
$pageName = 'Login';
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="./sections/style.css">
    <title>Login</title>
</head>
<body>
<?php include './sections/header.php' ?>
<?php include './sections/nav.php' ?>
    
    <form action="authenticate.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Submit">
    </form>
    
<?php include './sections/footer.php' ?>
</body>
=======
<?php
$activePage = 'login';
$pageName = 'Login';
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="./sections/style.css">
    <title>Login</title>
</head>
<body>
<?php include './sections/header.php' ?>
<?php include './sections/nav.php' ?>
    
    <form action="authenticate.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Submit">
    </form>
    
<?php include './sections/footer.php' ?>
</body>
>>>>>>> ff4bc40315ca16dd861a563f88dae83fc389895b
</html>