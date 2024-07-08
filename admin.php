<?php
declare(strict_types=1);

// Inclusion des fichiers nécessaires pour le fonctionnement de la page
include 'includes/autoLoader.php';

// Démarrage ou reprise d'une session PHP
session_start();

// Vérifie si l'utilisateur est connecté en vérifiant la variable de session 'nameFirstname'.
// Si ce n'est pas le cas, redirige vers la page de connexion (index.php) et arrête l'exécution du script.
if (!isset($_SESSION['nameFirstname'])) {
    header('Location: index.php');
    exit();
}

// Récupération du prénom et nom de l'utilisateur depuis la session, ou valeur par défaut si non défini
$nameFirstname = isset($_SESSION['nameFirstname']) ? $_SESSION['nameFirstname'] : '';

// Récupération de la liste des notifications non lues depuis la session, ou valeur par défaut si non défini
$unreadNotificationsList = isset($_SESSION['unreadNotificationList']) ? $_SESSION['unreadNotificationList'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Defi FreePro</title>
    <!-- Lien vers le fichier CSS Bootstrap pour le style -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <!-- Section principale de la page -->
    <section class="container mt-5">
        <section class="row text-center">
            <!-- En-tête avec le nom de l'utilisateur -->
            <section class="col-12 bg-dark text-light text-center py-4 mb-5 rounded">
                <h1>Welcome <?php echo htmlspecialchars($nameFirstname); ?></h1>
            </section>
            
            <!-- Formulaire pour vérifier les notifications -->
            <form action="includes/validateAccount.php" method="POST" class="mb-4">
                <button type="submit" name="checkNotif" class="btn btn-primary col-6">Check Notifications</button>
            </form>
            
            <!-- Vérifie s'il y a des notifications non lues -->
            <?php if (!empty($unreadNotificationsList)): ?>
                <!-- Alerte pour les notifications non lues -->
                <div class="alert alert-info col-12" role="alert">
                    You have unread notifications
                </div>
                <!-- Boucle à travers chaque notification non lue -->
                <?php foreach ($unreadNotificationsList as $notification): ?>
                    <!-- Carte pour afficher les détails de la notification -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <!-- Affichage des ID de notification et d'utilisateur -->
                            Notification ID: <?php echo htmlspecialchars($notification->getId()); ?>,
                            User ID: <?php echo htmlspecialchars($notification->getIdUser()); ?>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Please select the products reserved by the guest</p>
                            <!-- Formulaire pour sélectionner les produits réservés -->
                            <form action="includes/productInfo.php" method="POST">
                                <!-- Champ caché pour transmettre l'ID utilisateur -->
                                <input type="hidden" name="idUser" value="<?php echo htmlspecialchars($notification->getIdUser()); ?>">
                                <!-- Cases à cocher pour les produits -->
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
                                <!-- Bouton pour soumettre les produits réservés -->
                                <button type="submit" name="submitProduct" class="btn btn-primary mt-3 col-4">Submit</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            
            <!-- Lien pour se déconnecter -->
            <a href="index.php" class="btn btn-link mt-4">Logout</a>
        </section>
    </section>
    
    <!-- Inclusion du fichier JavaScript Bootstrap pour le fonctionnement des composants interactifs -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>