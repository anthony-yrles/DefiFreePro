<?php
declare(strict_types = 1);
include 'includes/autoLoader.php';
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
            <form action="includes/login.php" method="post">
              <section class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email">
              </section>
              <section class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
              </section>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </section>
          <section class="col-6">
            <h2>S'inscrire</h2>
            <form action="includes/register.php" method="post">
              <section class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
              </section>
              <section class="mb-3">
                <label for="surname" class="form-label">Surname</label>
                <input type="text" class="form-control" id="surname" name="surname">
              </section>
              <section class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email">
              </section>
              <section class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
              </section>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </section>
        </section>
        </section>
      </section>
    </section>
  </section>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>