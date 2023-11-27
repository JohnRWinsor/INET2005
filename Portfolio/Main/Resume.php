<?php
$activePage = 'resume';
$pageName = 'Resume';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $pageName; ?></title>
    <link rel="stylesheet" href="./sections/style.css">
</head>
<body class = "resume-page">
<?php include './sections/header.php' ?>
<?php include './sections/nav.php' ?>
    <h2><?php echo $pageName; ?></h2>
    <object data="./Images/RESUME.pdf" type="application/pdf" width="100%" height="600px">
    </object>
<?php include './sections/footer.php' ?>
</body>
</html>