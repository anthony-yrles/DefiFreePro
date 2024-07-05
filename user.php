<?php
declare(strict_types = 1);
include 'includes/autoLoader.php';

session_start();

$nameFirstname = isset($_SESSION['nameFirstname']) ? $_SESSION['nameFirstname'] : '';

unset($_SESSION['nameFirstname']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Defi FreePro</title>
</head>
<body>
    <h1>Welcome <?php echo $nameFirstname; ?></h1>
    <a href="includes/logout.php">Logout</a>
    
</body>
</html>