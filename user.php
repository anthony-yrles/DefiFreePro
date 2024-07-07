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
$accountValidate = isset($_SESSION['accountValidate']) ? $_SESSION['accountValidate'] : '';
$id = isset($_SESSION['id']) ? $_SESSION['id'] : '';
$productSession = isset($_SESSION['product']) ? $_SESSION['product'] : '';

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
                    <button type="submit" name="submitSend" class="btn btn-primary col-6">Send a notification to
                        the admin to validate
                        your account</button>
                </form>
            <?php else: ?>
                <p class="mt-4">To see your profile, click on the button below</p>
                <form action="includes/profile.php" method="post" novalidate>
                    <button type="submit" name="profilSend" class="btn btn-primary col-6">See my profile</button>
                </form>
                <?php if (!empty($productSession)): ?>
                    <?php
                    switch (true) {
                        case $productSession->getPop() === '1':
                            ?>
                            <section class="row">
                                <section class="col-12">
                                    <h2>FreeBox Pop</h2>
                                    <section class="col-6">
                                        <img src="img/freebox-pop.jpg" alt="FreeBox Pop">
                                    </section>
                                    <section class="col-6">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur assumenda voluptas,
                                            eveniet maiores illum error natus pariatur at! Ex, doloremque? Quaerat similique molestiae
                                            unde earum nemo? Amet earum quam sint!</p>
                                    </section>
                                </section>
                            </section>
                            <?php
                            break;
                        case $productSession->getDelta() === '1':
                            ?>
                            <section class="row">
                                <section class="col-12">
                                    <h2>FreeBox Delta</h2>
                                    <section class="col-6">
                                        <img src="img/freebox-delta.jpg" alt="FreeBox Delta">
                                    </section>
                                    <section class="col-6">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur assumenda voluptas,
                                            eveniet maiores illum error natus pariatur at! Ex, doloremque? Quaerat similique molestiae
                                            unde earum nemo? Amet earum quam sint!</p>
                                    </section>
                                </section>
                            </section>
                            <?php
                            break;
                        case $productSession->getMini4k() === '1': ?>
                            <section class="row">
                                <section class="col-12">
                                    <h2>FreeBox Mini 4K</h2>
                                    <section class="col-6">
                                        <img src="img/freebox-mini-4k.jpg" alt="FreeBox Mini 4K">
                                    </section>
                                    <section class="col-6">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur assumenda voluptas,
                                            eveniet maiores illum error natus pariatur at! Ex, doloremque? Quaerat similique molestiae
                                            unde earum nemo? Amet earum quam sint!</p>
                                    </section>
                                </section>
                            </section>
                            <?php
                            break;
                        case $productSession->getDeuxEuros() === '1': ?>
                            <section class="row">
                                <section class="col-12">
                                    <h2>Forfait 2€</h2>
                                    <section class="col-6">
                                        <img src="img/forfait-2e.jpg" alt="Forfait 2€">
                                    </section>
                                    <section class="col-6">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur assumenda voluptas,
                                            eveniet maiores illum error natus pariatur at! Ex, doloremque? Quaerat similique molestiae
                                            unde earum nemo? Amet earum quam sint!</p>
                                    </section>
                                </section>
                            </section>
                            <?php
                            break;
                        case $productSession->getCentquarante() === '1': ?>
                            <section class="row">
                                <section class="col-12">
                                    <h2>Forfait 140€</h2>
                                    <section class="col-6">
                                        <img src="img/forfait-140e.jpg" alt="Forfait 140€">
                                    </section>
                                    <section class="col-6">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur assumenda voluptas,
                                            eveniet maiores illum error natus pariatur at! Ex, doloremque? Quaerat similique molestiae
                                            unde earum nemo? Amet earum quam sint!</p>
                                    </section>
                                </section>
                            </section>
                            <?php
                            break;
                        case $productSession->getIllimite() === '1': ?>
                            <section class="row">
                                <section class="col-12">
                                    <h2>Forfait illimité</h2>
                                    <section class="col-6">
                                        <img src="img/forfait-illimite.jpg" alt="Forfait illimité">
                                    </section>
                                    <section class="col-6">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur assumenda voluptas,
                                            eveniet maiores illum error natus pariatur at! Ex, doloremque? Quaerat similique molestiae
                                            unde earum nemo? Amet earum quam sint!</p>
                                    </section>
                                </section>
                            </section>
                            <?php
                            break;
                    }
                    ?>

                <?php endif; ?>
            <?php endif; ?>
            <a href="index.php" class="col-1 offset-11">Logout</a>
        </section>
    </section>
</body>

</html>