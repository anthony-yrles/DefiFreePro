<?php
// Declare strict typing mode to enforce strict data types.
declare(strict_types=1);

// Include the autoLoader.php file to automatically load necessary classes.
include 'includes/autoLoader.php';

// Start the PHP session to manage session variables.
session_start();

// Retrieve messages and alerts stored in the session, if any.
$message = isset($_SESSION['result']) ? $_SESSION['result'] : '';
$alert = isset($_SESSION['alert']) ? $_SESSION['alert'] : false;

// Clear unused session variables.
unset($_SESSION['result']);
unset($_SESSION['alert']);
unset($_SESSION['nameFirstname']);
unset($_SESSION['unreadNotificationList']);
unset($_SESSION['id']);
unset($_SESSION['product']);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Define document metadata -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Defi FreePro</title>
    <!-- Include Bootstrap CSS file -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Main Bootstrap container with top margin -->
    <section class="container mt-5">
        <!-- Center the row horizontally -->
        <section class="row justify-content-center">
            <!-- Medium column taking 8 out of 12 grid columns -->
            <section class="col-md-8">
                <!-- Header section with dark background, light text, and rounded borders -->
                <section class="bg-dark text-light text-center p-4 rounded mb-4">
                    <h1>Welcome to Free Pro</h1>
                </section>
                <!-- Container for forms with white background, shadow, and rounded borders -->
                <section class="bg-white p-4 rounded shadow-sm">
                    <section class="row">
                        <!-- Column for the login form -->
                        <section class="col-md-6">
                            <h2>Login</h2>
                            <form action="includes/login.php" method="post" novalidate>
                                <!-- Display alert or success messages -->
                                <?php if ($message): ?>
                                    <section class="alert <?php echo $alert === true ? 'alert-danger' : 'alert-success'; ?>" role="alert">
                                        <?php echo htmlspecialchars($message); ?>
                                    </section>
                                <?php endif; ?>

                                <!-- Email address input field -->
                                <section class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </section>
                                <!-- Password input field -->
                                <section class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password">
                                </section>
                                <!-- Submit button for the login form -->
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </section>
                        <!-- Column for the registration form -->
                        <section class="col-md-6">
                            <h2>Register</h2>
                            <form action="includes/register.php" method="post" novalidate>
                                <!-- Display alert or success messages -->
                                <?php if ($message): ?>
                                    <section class="alert <?php echo $alert === true ? 'alert-danger' : 'alert-success'; ?>" role="alert">
                                        <?php echo htmlspecialchars($message); ?>
                                    </section>
                                <?php endif; ?>

                                <!-- Name input field -->
                                <section class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required maxLength="50">
                                </section>
                                <!-- Surname input field -->
                                <section class="mb-3">
                                    <label for="surname" class="form-label">Surname</label>
                                    <input type="text" class="form-control" id="surname" name="surname" required maxLength="50">
                                </section>
                                <!-- Email address input field -->
                                <section class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" maxLength="100">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </section>
                                <!-- Password input field -->
                                <section class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}" maxLength="50">
                                    <small id="passwordHelp" class="form-text text-muted">Your password must be at least 8 characters long and contain 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character.</small>
                                </section>
                                <!-- Repeat password input field -->
                                <section class="mb-3">
                                    <label for="passwordRepeat" class="form-label">Repeat Password</label>
                                    <input type="password" class="form-control" id="passwordRepeat" name="passwordRepeat" required autocomplete="new-password" maxLength="50">
                                </section>
                                <!-- Checkbox for agreeing to terms and conditions -->
                                <section class="mb-3">
                                    <section class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="terms" required>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            I agree to the terms and conditions
                                        </label>
                                    </section>
                                </section>
                                <!-- Submit button for the registration form -->
                                <button type="submit" name="submit" class="btn btn-primary mt-2">Submit</button>
                            </form>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    <!-- Include Bootstrap JavaScript file -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
