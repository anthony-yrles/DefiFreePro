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
            </form>
                <?php if (!empty($unreadNotificationsList)): ?>
                    <p class="mt-4">You have unread notifications</p>
                    <?php foreach ($unreadNotificationsList as $notification): ?>
                        <div class="dropdown">
                            <ul class="list-group">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <li class="list-group-item active">
                                        Notification ID: <?php echo htmlspecialchars($notification->getId()); ?>,
                                        User ID: <?php echo htmlspecialchars($notification->getIdUser()); ?>
                                    </li>
                                </button>
                                <div class="dropdown-menu col-12 text-center p-5" aria-labelledby="dropdownMenuButton">
                                    <p>Please select the products reserved by the guest</p>
                                    <form action="includes/productInfo.php" method="POST">
                                        <input type="hidden" name="idUser"
                                            value="<?php echo htmlspecialchars($notification->getIdUser()); ?>">
                                        <div class="form-check">
                                            <input class="form-check-input border" type="checkbox" name="Pop" id="Pop"
                                                value="1">
                                            <label class="form-check-label" for="Pop">
                                                FreeBox Pop
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input border" type="checkbox" name="Delta" id="Delta"
                                                value="1">
                                            <label class="form-check-label" for="Delta">
                                                FreeBox Delta
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input border" type="checkbox" name="Mini4K" id="Mini4K"
                                                value="1">
                                            <label class="form-check-label" for="Mini4K">
                                                FreeBox Mini 4K
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input border" type="checkbox" name="deuxEuros"
                                                id="deuxEuros" value="1">
                                            <label class="form-check-label" for="deuxEuros">
                                                Forfait 2€
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input border" type="checkbox" name="centquarante"
                                                id="centquarante" value="1">
                                            <label class="form-check-label" for="centquarante">
                                                Forfait 140 Giga Octets
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input border" type="checkbox" name="illimite" id="illimite"
                                                value="1">
                                            <label class="form-check-label" for="illimite">
                                                Forfait 5G illimités
                                            </label>
                                        </div>
                                        <button type="submit" name="submitProduct"
                                            class="btn btn-primary mt-5 col-4">Submit</button>
                                    </form>
                                </div>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            <a href="index.php" class="text-end mt-5">Logout</a>
        </section>
    </section>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>