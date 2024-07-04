<?php

/**
 * Class Controller for Model operations
 * Allows the use of the MVC pattern to:
 * - create a user and send it to the Model
 * - get and return a user to the View
 */

class Controller extends Model {

    protected $result;

    // Constructor to initialize properties and call parent constructor
    public function __construct(string $host, string $username, string $password, string $database) {
        parent::__construct($host, $username, $password, $database);
    }

    /*
    * 5 fiddérents méthods that will be used to validate the user input and create a new user
    * 1. hashPassword: Hash the password using the PASSWORD_DEFAULT algorithm
    * 2. emptyFields: Check if any of the fields are empty
    * 3. invalidEmail: Check if the email is valid
    * 4. checkPassword: Check if the password meets the requirements
    * 5. passwordMatch: Check if the password and passwordRepeat match
    */

    public function hashPassword($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }
    private function emptyFields($name, $surname, $email, $password, $passwordRepeat) {
        return empty($name) || empty($surname) || empty($email) || empty($password) || empty($passwordRepeat);
    }

    private function invalidEmail($email) {
        return !filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    private function checkPassword($password) {
        $pattern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/';
        return preg_match($pattern, $password) === 1;
    }

    private function passwordMatch($password, $passwordRepeat) {
        return $password !== $passwordRepeat;
    }

    // Use all th 5 preceding methods to create a new user in the database, if any of the checks fail, an error message is displayed
    public function testUser($name, $surname, $email, $password, $passwordRepeat) {
        if ($this->emptyFields($name, $surname, $email, $password, $passwordRepeat)) {
            $this->result = 'You need to fill in all the fields';
        } elseif ($this->invalidEmail($email)) {
            $this->result = 'The email is invalid';
        } elseif (!$this->checkPassword($password)) {
            $this->result = 'Your password do not meet the requirements';
        } elseif ($this->passwordMatch($password, $passwordRepeat)) {
            $this->result = 'The two passwords are not the same';
        } else {
            $this->connectDB();
            $hashedPassword = $this->hashPassword($password);
            $this->createUser($name, $surname, $email, $hashedPassword);
            $this->disconnectDB();
            $this->result = 'Your registration is successful';
        }
    }

    // Method to get the result
    function getResult() {
        return $this->result;
    }

    // Method to get a user, this method receives the email and password of the user
    public function getUser($email, $password) {
        $this->connectDB();
        $user = $this->getUser($email, $password);
        $this->disconnectDB();
        return $user;
    }
}