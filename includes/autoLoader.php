<?php

/**
 * Autoloader for classes
 * 
 * This function will automatically include the class file when a class is instantiated
 * When a class is instantiated, PHP will call this function and pass the class name as an argument
 * @param string $class The class name
 * @return void
 */

spl_autoload_register(function (string $class) {
  // Include the class file if it exists
  $path = 'classes/' . $class . '.php';

  // Check if the file exists
  if (!file_exists($path)) {
    return false; // Return false to move to the next autoloader
  } else {
    include $path; // Include the file
  }
});