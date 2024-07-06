<?php
declare(strict_types=1);
include 'includes/autoLoader.php';

session_start();

if (!isset($_SESSION['nameFirstname'])) {
    // Rediriger vers la page de connexion ou afficher un message d'erreur
    header('Location: index.php');
    exit();
}

$nameFirstname = isset($_SESSION['nameFirstname']) ? $_SESSION['nameFirstname'] : '';
$unreadNotificationsList = isset($_SESSION['unreadNotificationList']) ? $_SESSION['unreadNotificationList'] : '';

unset($_SESSION['unreadNotificationList']);
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
                <h1>Welcome <?php echo htmlspecialchars($nameFirstname); ?></h1>
            </section>
            <form action="includes/validateAccount.php" method="POST" class="mt-5">
                <button type="submit" name="checkNotif" class="btn btn-primary col-6">Check Notifications</button>
                <?php if (!empty($unreadNotificationsList)): ?>
                    <p class="mt-4">You have unread notifications</p>
                    <ul class="list-group">
                        <?php foreach ($unreadNotificationsList as $notification): ?>
                            <section class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <li class="list-group-item active">Notification ID:
                                        <?php echo htmlspecialchars($notification->getId()); ?>, User ID:
                                        <?php echo htmlspecialchars($notification->getIdUser()); ?>
                                    </li>
                                    <section class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <p>Pleaser select the products reserved by the guest</p>
                                        <form action="includes/validateAccount.php" method="POST">
                                            <section class="form-check">
                                                <input class="form-check-input border" type="checkbox" name="Pop" id="Pop"
                                                    value="1">
                                                <label class="form-check-label" for="Pop">
                                                    FreeBox Pop
                                                </label>
                                            </section>
                                            <section class="form-check">
                                                <input class="form-check-input border" type="checkbox" name="Delta" id="Delta"
                                                    value="2">
                                                <label class="form-check-label" for="Delta">
                                                    FreeBox Delta
                                                </label>
                                            </section>
                                            <section class="form-check">
                                                <input class="form-check-input border" type="checkbox" name="Mini4K" id="Mini4K"
                                                    value="3">
                                                <label class="form-check-label" for="Mini4K">
                                                    FreeBox Mini 4K
                                                </label>
                                            </section>
                                            <section class="form-check">
                                                <input class="form-check-input border" type="checkbox" name="deuxEuros"
                                                    id="deuxEuros" value="4">
                                                <label class="form-check-label" for="deuxEuros">
                                                    Forfait 2€
                                                </label>
                                            </section>
                                            <section class="form-check">
                                                <input class="form-check-input border" type="checkbox" name="centquarante"
                                                    id="centquarante" value="5">
                                                <label class="form-check-label" for="centquarante">
                                                    Forfait 140 Giga Octets
                                                </label>
                                            </section>
                                            <section class="form-check">
                                                <input class="form-check-input border" type="checkbox" name="illimite"
                                                    id="illimite" value="6">
                                                <label class="form-check-label" for="illimite">
                                                    Forfait 5G illimités
                                                </label>
                                            </section>
                                            <button type="submit" name="submit" class="btn btn-primary mt-5">Submit</button>
                                        </form>
                                    </section>
                                </button>
                            </section>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <a href="index.php" class="text-end mt-5">Logout</a>
            </form>
        </section>
    </section>
</body>

</html>