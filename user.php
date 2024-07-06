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
unset($_SESSION['accountValidate']);
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
        <section class="row text-center">
            <section class="col-12 bg-dark text-light text-center">
                <h1>Welcome <?php echo $nameFirstname; ?></h1>
            </section>
            <?php if ($accountValidate === '0'): ?>
                <p class="mt-4">Your account is not validated yet</p>
                <form action="includes/validateAccount.php" method="post" novalidate>
                    <button type="submit" name="submitSend" class="btn btn-primary col-6 offset-3">Send a notification to the admin to validate
                        your account</button>
                </form>
            <?php endif; ?>
            <a href="index.php" class="col-1 offset-11">Logout</a>
        </section>
    </section>
</body>

</html>