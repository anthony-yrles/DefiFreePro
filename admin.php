<?php
declare(strict_types = 1);
include 'includes/autoLoader.php';

session_start();

if (!isset($_SESSION['nameFirstname'])) {
    // Rediriger vers la page de connexion ou afficher un message d'erreur
    header('Location: index.php');
    exit();
}

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
    <a href="index.php">Logout</a>
    
</body>
</html>