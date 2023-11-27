<?php
$activePage = 'contact';
$pageName = 'Contact';
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $pageName; ?></title>
    <link rel="stylesheet" type="text/css" href="./sections/style.css">
</head>
<body class="contact-page">
<?php include './sections/header.php' ?>
<?php include './sections/nav.php' ?>
    <h2><?php echo $pageName; ?></h2>
    
    <header>
        <h1>Contact Me</h1>
    </header>
     <form action="process_contact.php" method="post">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Your Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit">Submit</button>
        
        </form>
    <p>School Email: w0474402@nscc.ca</p>
    <p>GitHub: <a href="https://github.com/JohnRWinsor">JohnRWinsor</a></p>
    <p>LinkedIn: <a href="https://www.linkedin.com/in/john-winsor-b1067b252/">John Winsor</a></p>
    <p>Phone: 123-456-7890</p>
</body>
<?php include './sections/footer.php' ?>
</html>

<?php
$activePage = 'contact';
$pageName = 'My Contact Page';
include("conn.php");
?>

