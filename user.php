<?php
// Use strict types for strict type checking
declare(strict_types=1);

// Include the autoloader for automatically loading necessary classes
include 'includes/autoLoader.php';

// Start a new session or resume the existing session
session_start();

// Check if the user is logged in by verifying the existence of the 'nameFirstname' session variable
if (!isset($_SESSION['nameFirstname'])) {
    // Redirect to the login page if the user is not logged in
    header('Location: index.php');
    exit();
}

// Retrieve user session information
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
            <!-- Header section welcoming the user -->
            <section class="col-12 bg-dark text-light text-center p-3 mb-4 rounded">
                <h1>Welcome <?php echo $nameFirstname; ?></h1>
            </section>

            <!-- Check if the account is validated -->
            <?php if ($accountValidate === '0') : ?>
                <p class="mt-4">Your account is not validated yet</p>
                <form action="includes/validateAccount.php" method="post" novalidate>
                    <button type="submit" name="submitSend" class="btn btn-primary col-6 mx-auto">Send a notification to the admin to validate your account</button>
                </form>
            <?php else : ?>
                <p class="mt-4">To see your profile, click on the button below</p>
                <form action="includes/profile.php" method="post" novalidate>
                    <button type="submit" name="profilSend" class="btn btn-primary col-6 mx-auto">See my profile</button>
                </form>

                <!-- Check if there are products associated with the session -->
                <?php if (!empty($productSession)) : ?>
                    <!-- Display the FreeBox Pop product if it is available -->
                    <?php if ($productSession->getPop() === '1') : ?>
                        <section class="product-section mt-5 pt-4 border-top">
                            <h2>FreeBox Pop</h2>
                            <section class="row">
                                <section class="col-md-6 mb-2">
                                    <img src="./assets/images/pop.jpg" alt="FreeBox Pop" class="img-thumbnail w-100">
                                </section>
                                <section class="col-md-6 mb-2">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur assumenda voluptas,
                                        eveniet maiores illum error natus pariatur at! Ex, doloremque? Quaerat similique molestiae
                                        unde earum nemo? Amet earum quam sint!</p>
                                </section>
                            </section>
                        </section>
                    <?php endif; ?>

                    <!-- Display the FreeBox Delta product if it is available -->
                    <?php if ($productSession->getDelta() === '1') : ?>
                        <section class="product-section mt-5 pt-4 border-top">
                            <h2>FreeBox Delta</h2>
                            <section class="row">
                                <section class="col-md-6 mb-2">
                                    <img src="./assets/images/delta.jpg" alt="FreeBox Delta" class="img-thumbnail w-100">
                                </section>
                                <section class="col-md-6 mb-2">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur assumenda voluptas,
                                        eveniet maiores illum error natus pariatur at! Ex, doloremque? Quaerat similique molestiae
                                        unde earum nemo? Amet earum quam sint!</p>
                                </section>
                            </section>
                        </section>
                    <?php endif; ?>

                    <!-- Display the FreeBox Mini 4K product if it is available -->
                    <?php if ($productSession->getMini4k() === '1') : ?>
                        <section class="product-section mt-5 pt-4 border-top">
                            <h2>FreeBox Mini 4K</h2>
                            <section class="row">
                                <section class="col-md-6 mb-2">
                                    <img src="./assets/images/mini4k.jpg" alt="FreeBox Mini 4K" class="img-thumbnail w-100">
                                </section>
                                <section class="col-md-6 mb-2">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur assumenda voluptas,
                                        eveniet maiores illum error natus pariatur at! Ex, doloremque? Quaerat similique molestiae
                                        unde earum nemo? Amet earum quam sint!</p>
                                </section>
                            </section>
                        </section>
                    <?php endif; ?>

                    <!-- Display the Forfait 2€ product if it is available -->
                    <?php if ($productSession->getDeuxEuros() === '1') : ?>
                        <section class="product-section mt-5 pt-4 border-top">
                            <h2>Forfait 2€</h2>
                            <section class="row">
                                <section class="col-md-6 mb-2">
                                    <img src="./assets/images/forfait-2e.png" alt="Forfait 2€" class="img-thumbnail w-100">
                                </section>
                                <section class="col-md-6 mb-2">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur assumenda voluptas,
                                        eveniet maiores illum error natus pariatur at! Ex, doloremque? Quaerat similique molestiae
                                        unde earum nemo? Amet earum quam sint!</p>
                                </section>
                            </section>
                        </section>
                    <?php endif; ?>

                    <!-- Display the Forfait 140Go product if it is available -->
                    <?php if ($productSession->getCentquarante() === '1') : ?>
                        <section class="product-section mt-5 pt-4 border-top">
                            <h2>Forfait 140Go</h2>
                            <section class="row">
                                <section class="col-md-6 mb-2">
                                    <img src="./assets/images/forfait-140go.png" alt="Forfait 140Go" class="img-thumbnail w-100">
                                </section>
                                <section class="col-md-6 mb-2">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur assumenda voluptas,
                                        eveniet maiores illum error natus pariatur at! Ex, doloremque? Quaerat similique molestiae
                                        unde earum nemo? Amet earum quam sint!</p>
                                </section>
                            </section>
                        </section>
                    <?php endif; ?>

                    <!-- Display the Forfait 5G product if it is available -->
                    <?php if ($productSession->getIllimite() === '1') : ?>
                        <section class="product-section mt-5 pt-4 border-top">
                            <h2>Forfait 5G</h2>
                            <section class="row">
                                <section class="col-md-6 mb-2">
                                    <img src="./assets/images/forfait-5g.jpg" alt="Forfait illimité" class="img-thumbnail w-100">
                                </section>
                                <section class="col-md-6 mb-2">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur assumenda voluptas,
                                        eveniet maiores illum error natus pariatur at! Ex, doloremque? Quaerat similique molestiae
                                        unde earum nemo? Amet earum quam sint!</p>
                                </section>
                            </section>
                        </section>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>

            <!-- Logout link positioned at the top right -->
            <section class="row">
                <section class="col-12 text-end">
                    <a href="index.php" class="btn btn-danger mt-4">Logout</a>
                </section>
            </section>
        </section>
    </section>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>