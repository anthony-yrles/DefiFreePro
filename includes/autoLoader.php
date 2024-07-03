<?php
spl_autoload_register(function (string $class) {
  // Include the class file if it exists
  $path = 'classes/' . $class . '.php';

  if (!file_exists($path)) {
    return false; // Return false to move to the next autoloader
  } else {
    include 'classes/' . $class . '.php';
  }
});