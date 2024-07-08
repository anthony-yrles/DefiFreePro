<?php
declare(strict_types=1);
include 'includes/autoLoader.php';

// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['nameFirstname'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: index.php');
    exit();
}

// Récupérer le nom complet de l'utilisateur depuis la session, sinon une chaîne vide
$nameFirstname = $_SESSION['nameFirstname'] ?? '';

// Récupérer la liste des notifications non lues depuis la session, sinon un tableau vide
$unreadNotificationsList = $_SESSION['unreadNotificationList'] ?? [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Defi FreePro</title>
    <!-- Lien vers le fichier CSS de Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <!-- En-tête avec le nom de l'utilisateur -->
        <div class="row">
            <div class="col-12 text-center bg-dark text-light py-3 mb-4">
                <h1>Welcome, <?php echo htmlspecialchars($nameFirstname); ?></h1>
            </div>
        </div>

        <!-- Formulaire pour vérifier les notifications -->
        <div class="row mb-4">
            <div class="col-12 text-center">
                <form action="includes/validateAccount.php" method="POST">
                    <button type="submit" name="checkNotif" class="btn btn-primary">Check Notifications</button>
                </form>
            </div>
        </div>

        <!-- Afficher les notifications non lues si elles existent -->
        <?php if (!empty($unreadNotificationsList)): ?>
            <div class="row">
                <div class="col-12">
                    <!-- Alerte pour notifier l'utilisateur qu'il y a des notifications non lues -->
                    <div class="alert alert-warning" role="alert">
                        You have unread notifications
                    </div>
                    <?php foreach ($unreadNotificationsList as $notification): ?>
                        <div class="dropdown mb-3">
                            <!-- Bouton pour afficher le contenu des notifications -->
                            <button class="btn btn-secondary dropdown-toggle w-100 text-start" type="button" id="dropdownMenuButton-<?php echo htmlspecialchars($notification->getId()); ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                Notification ID: <?php echo htmlspecialchars($notification->getId()); ?>, User ID: <?php echo htmlspecialchars($notification->getIdUser()); ?>
                            </button>
                            <ul class="dropdown-menu w-100 p-3" aria-labelledby="dropdownMenuButton-<?php echo htmlspecialchars($notification->getId()); ?>">
                                <li>
                                    <p>Please select the products reserved by the guest</p>
                                    <form action="includes/productInfo.php" method="POST">
                                        <!-- Champ caché pour l'ID de l'utilisateur -->
                                        <input type="hidden" name="idUser" value="<?php echo htmlspecialchars($notification->getIdUser()); ?>">
                                        
                                        <!-- Liste des options de produit avec des cases à cocher -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="Pop" id="Pop-<?php echo htmlspecialchars($notification->getId()); ?>" value="1">
                                            <label class="form-check-label" for="Pop-<?php echo htmlspecialchars($notification->getId()); ?>">FreeBox Pop</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="Delta" id="Delta-<?php echo htmlspecialchars($notification->getId()); ?>" value="1">
                                            <label class="form-check-label" for="Delta-<?php echo htmlspecialchars($notification->getId()); ?>">FreeBox Delta</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="Mini4K" id="Mini4K-<?php echo htmlspecialchars($notification->getId()); ?>" value="1">
                                            <label class="form-check-label" for="Mini4K-<?php echo htmlspecialchars($notification->getId()); ?>">FreeBox Mini 4K</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="deuxEuros" id="deuxEuros-<?php echo htmlspecialchars($notification->getId()); ?>" value="1">
                                            <label class="form-check-label" for="deuxEuros-<?php echo htmlspecialchars($notification->getId()); ?>">Forfait 2€</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="centquarante" id="centquarante-<?php echo htmlspecialchars($notification->getId()); ?>" value="1">
                                            <label class="form-check-label" for="centquarante-<?php echo htmlspecialchars($notification->getId()); ?>">Forfait 140 Giga Octets</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="illimite" id="illimite-<?php echo htmlspecialchars($notification->getId()); ?>" value="1">
                                            <label class="form-check-label" for="illimite-<?php echo htmlspecialchars($notification->getId()); ?>">Forfait 5G illimités</label>
                                        </div>
                                        <!-- Bouton pour soumettre le formulaire -->
                                        <button type="submit" name="submitProduct" class="btn btn-primary mt-3">Submit</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Lien pour se déconnecter -->
        <div class="row">
            <div class="col-12 text-end">
                <a href="index.php" class="btn btn-secondary">Logout</a>
            </div>
        </div>
    </div>

    <!-- Script Bootstrap Bundle -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>