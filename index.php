<?php
declare(strict_types = 1);
include 'includes/autoLoader.php';

session_start();

$message = isset($_SESSION['result']) ? $_SESSION['result'] : '';
$alert = isset($_SESSION['alert']) ? $_SESSION['alert'] : false;

unset($_SESSION['result']);
unset($_SESSION['alert']);

?>

<!doctype html>
<html lang="en">
 
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Defi FreePro</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <section class="container mt-5">
    <section class="row">
      <section class="col-12 bg-dark text-light text-center">
        <h1>Welcome to Free Pro</h1>
      </section>
    </section>
    <section class="row mt-3 text-center">
      <section class="col-12 mt-5">
        <section class="row">
          <section class="col-6">
            <h2>Se connecter</h2>
            <form action="includes/login.php" method="post" novalidate>

              <?php if ($message): ?>
                <?php if ($alert === true): ?>
                  <section class="alert alert-danger" role="alert">
                    <?php echo htmlspecialchars($message); ?>
                  </section>
                <?php else: ?>
                  <section class="alert alert-success" role="alert">
                    <?php echo htmlspecialchars($message); ?>
                  </section>
                <?php endif; ?>
              <?php endif; ?>

              <section class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </section>
              <section class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password">
              </section>
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
          </section>
          <section class="col-6">
            <h2>S'inscrire</h2>
            <form action="includes/register.php" method="post" novalidate>

            
              <?php if ($message): ?>
                <?php if ($alert === true): ?>
                  <section class="alert alert-danger" role="alert">
                    <?php echo htmlspecialchars($message); ?>
                  </section>
                <?php else: ?>
                  <section class="alert alert-success" role="alert">
                    <?php echo htmlspecialchars($message); ?>
                  </section>
                <?php endif; ?>
              <?php endif; ?>

              <section class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required maxLength="50">
              </section>
              <section class="mb-3">
                <label for="surname" class="form-label">Surname</label>
                <input type="text" class="form-control" id="surname" name="surname" required maxLength="50">
              </section>
              <section class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" maxLength="100">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </section>
              <section class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}" maxLength="50">
                <small id="passwordHelp" class="form-text text-muted">Your password have to be at least 8 characters long and contain 1 capital / minus / number / special</small>
              </section>
              <section class="mb-3">
                <label for="passwordRepeat" class="form-label">Repeat Password</label>
                <input type="password" class="form-control" id="passwordRepeat" name="passwordRepeat" required autocomplete="new-password" maxLength="50">
              </section>
              <section class="mb-3">
                <section class="form-check">
                  <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="terms" required>
                  <label class="form-check-label" for="flexCheckDefault">
                    I agree to the terms and conditions
                  </label>
                </section>
              </section>
              <button type="submit" name="submit" class="btn btn-primary mt-2">Submit</button>
            </form>
          </section>
        </section>
      </section>
    </section>
  </section>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>