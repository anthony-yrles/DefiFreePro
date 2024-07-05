<?php
declare(strict_types=1);
include 'includes/autoLoader.php';

session_start();

// if (!isset($_SESSION['nameFirstname'])) {
//     // Rediriger vers la page de connexion ou afficher un message d'erreur
//     header('Location: index.php');
//     exit();
// }

$nameFirstname = isset($_SESSION['nameFirstname']) ? $_SESSION['nameFirstname'] : '';
$accountValidate = isset($_SESSION['accountValidate']) ? $_SESSION['accountValidate'] : '';

unset($_SESSION['nameFirstname']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Defi FreePro</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <section class="container mt-5">
        <section class="row">
            <section class="col-12 bg-dark text-light text-center">
                <h1>Welcome <?php echo $nameFirstname; ?></h1>
            </section>
        </section>
        <?php if ($accountValidate === '0'): ?>
            <p>Your account is not validated yet</p>
            <button>Send a notification to the admin to validate your account</button>
        <?php endif; ?>
    </section>
    <a href="index.php">Logout</a>
    </section>
</body>

</html>