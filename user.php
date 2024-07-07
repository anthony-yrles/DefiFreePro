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
            <?php if ($accountValidate === '0') : ?>
                <p class="mt-4">Your account is not validated yet</p>
                <form action="includes/validateAccount.php" method="post" novalidate>
                    <button type="submit" name="submitSend" class="btn btn-primary col-6">Send a notification to
                        the admin to validate
                        your account</button>
                </form>
            <?php else : ?>
                <p class="mt-4">To see your profile, click on the button below</p>
                <form action="includes/profile.php" method="post" novalidate>
                    <button type="submit" name="profilSend" class="btn btn-primary col-6">See my profile</button>
                </form>
                <?php if (!empty($productSession)) : ?>
                    <?php if ($productSession->getPop() === '1') : ?>
                        <h2 class="mt-5">FreeBox Pop</h2>
                        <section class="row">
                            <section class="col mt-2">
                                <img src="./assets/images/pop.jpg" alt="FreeBox Pop" class="img-thumbnail">
                            </section>
                            <section class="col mt-2">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur assumenda voluptas,
                                    eveniet maiores illum error natus pariatur at! Ex, doloremque? Quaerat similique molestiae
                                    unde earum nemo? Amet earum quam sint!</p>
                            </section>
                        </section>
                    <?php endif; ?>

                    <?php if ($productSession->getDelta() === '1') : ?>
                        <h2>FreeBox Delta</h2>
                        <section class="row">
                            <section class="col-6 pa-2">
                                <img src="./assets/images/delta.jpg" alt="FreeBox Delta" class="img-thumbnail">
                            </section>
                            <section class="col-6 pa-2">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur assumenda voluptas,
                                    eveniet maiores illum error natus pariatur at! Ex, doloremque? Quaerat similique molestiae
                                    unde earum nemo? Amet earum quam sint!</p>
                            </section>
                        </section>
                    <?php endif; ?>

                    <?php if ($productSession->getMini4k() === '1') : ?>
                        <h2 class="mt-5">FreeBox Mini 4K</h2>
                        <section class="row">
                            <section class="col-6 pa-2">
                                <img src="./assets/images/mini4k.jpg" alt="FreeBox Mini 4K" class="img-thumbnail">
                            </section>
                            <section class="col-6 pa-2">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur assumenda voluptas,
                                    eveniet maiores illum error natus pariatur at! Ex, doloremque? Quaerat similique molestiae
                                    unde earum nemo? Amet earum quam sint!</p>
                            </section>
                        </section>
                    <?php endif; ?>

                    <?php if ($productSession->getDeuxEuros() === '1') : ?>
                        <h2 class="mt-5">Forfait 2€</h2>
                        <section class="row">
                            <section class="col-6 pa-2">
                                <img src="./assets/images/forfait-2e.jpg" alt="Forfait 2€" class="img-thumbnail">
                            </section>
                            <section class="col-6 pa-2">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur assumenda voluptas,
                                    eveniet maiores illum error natus pariatur at! Ex, doloremque? Quaerat similique molestiae
                                    unde earum nemo? Amet earum quam sint!</p>
                            </section>
                        </section>
                    <?php endif; ?>

                    <?php if ($productSession->getCentquarante() === '1') : ?>
                        <h2 class="mt-5">Forfait 140Go</h2>
                        <section class="row">
                            <section class="col-6 pa-2">
                                <img src="./assets/images/forfait-140go.jpg" alt="Forfait 140Go" class="img-thumbnail">
                            </section>
                            <section class="col-6 pa-2">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur assumenda voluptas,
                                    eveniet maiores illum error natus pariatur at! Ex, doloremque? Quaerat similique molestiae
                                    unde earum nemo? Amet earum quam sint!</p>
                            </section>
                        </section>
                    <?php endif; ?>

                    <?php if ($productSession->getIllimite() === '1') : ?>
                        <h2 class="mt-5">Forfait illimité</h2>
                        <section class="row">
                            <section class="col-6 pa-2">
                                <img src="./assets/images/forfait-illimite.jpg" alt="Forfait illimité" class="img-thumbnail">
                            </section>
                            <section class="col-6 pa-2">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur assumenda voluptas,
                                    eveniet maiores illum error natus pariatur at! Ex, doloremque? Quaerat similique molestiae
                                    unde earum nemo? Amet earum quam sint!</p>
                            </section>
                        </section>
                    <?php endif; ?>
                <?php endif; ?>

            <?php endif; ?>
            <a href="index.php" class="col-1 offset-11">Logout</a>
        </section>
    </section>
</body>

</html>