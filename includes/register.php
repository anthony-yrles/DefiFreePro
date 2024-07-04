<?php

if (isset($_POST['submit'])) {
  require 'autoLoader.php';

  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $email = $_POST['email'];
  $password = $_POST['password'];

} else {
  header('Location: ../index.php');
}