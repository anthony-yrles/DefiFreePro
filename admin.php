<?php
declare(strict_types=1);
include 'includes/autoLoader.php';

session_start();

if (!isset($_SESSION['nameFirstname'])) {
    header('Location: index.php');
    exit();
}

$nameFirstname = isset($_SESSION['nameFirstname']) ? $_SESSION['nameFirstname'] : '';
$unreadNotificationsList = isset($_SESSION['unreadNotificationList']) ? $_SESSION['unreadNotificationList'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Defi FreePro</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <section class="container mt-5">
        <section class="row text-center">
            <section class="col-12 bg-dark text-light text-center py-4 mb-5 rounded">
                <h1>Welcome <?php echo htmlspecialchars($nameFirstname); ?></h1>
            </section>
            <form action="includes/validateAccount.php" method="POST" class="mb-4">
                <button type="submit" name="checkNotif" class="btn btn-primary col-6">Check Notifications</button>
            </form>
            <?php if (!empty($unreadNotificationsList)): ?>
                <div class="alert alert-info col-12" role="alert">
                    You have unread notifications
                </div>
                <?php foreach ($unreadNotificationsList as $notification): ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            Notification ID: <?php echo htmlspecialchars($notification->getId()); ?>,
                            User ID: <?php echo htmlspecialchars($notification->getIdUser()); ?>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Please select the products reserved by the guest</p>
                            <form action="includes/productInfo.php" method="POST">
                                <input type="hidden" name="idUser" value="<?php echo htmlspecialchars($notification->getIdUser()); ?>">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="Pop" id="Pop" value="1">
                                    <label class="form-check-label" for="Pop">FreeBox Pop</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="Delta" id="Delta" value="1">
                                    <label class="form-check-label" for="Delta">FreeBox Delta</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="Mini4K" id="Mini4K" value="1">
                                    <label class="form-check-label" for="Mini4K">FreeBox Mini 4K</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="deuxEuros" id="deuxEuros" value="1">
                                    <label class="form-check-label" for="deuxEuros">Forfait 2€</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="centquarante" id="centquarante" value="1">
                                    <label class="form-check-label" for="centquarante">Forfait 140 Giga Octets</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="illimite" id="illimite" value="1">
                                    <label class="form-check-label" for="illimite">Forfait 5G illimités</label>
                                </div>
                                <button type="submit" name="submitProduct" class="btn btn-primary mt-3 col-4">Submit</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <a href="index.php" class="btn btn-link mt-4">Logout</a>
        </section>
    </section>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>