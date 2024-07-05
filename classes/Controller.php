<?php

/**
 * Class Controller for Model operations
 * Allows the use of the MVC pattern to:
 * - create a user and send it to the Model
 * - get and return a user to the View
 */

class Controller extends Model {

    protected $result;
    protected $alert;

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
    public function testUser($name, $surname, $email, $password, $passwordRepeat, $terms) {
        if ($this->emptyFields($name, $surname, $email, $password, $passwordRepeat)) {
            $this->result = 'You need to fill in all the fields';
            $this->alert = true;
        } elseif ($this->invalidEmail($email)) {
            $this->result = 'The email is invalid';
            $this->alert = true;
        } elseif (!$this->checkPassword($password)) {
            $this->result = 'Your password do not meet the requirements';
            $this->alert = true;
        } elseif ($this->passwordMatch($password, $passwordRepeat)) {
            $this->result = 'The two passwords are not the same';
            $this->alert = true;
        } elseif ($terms !== '1') {
            $this->result = 'You need to accept the terms and conditions';
            $this->alert = true;
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

    // Method to get the alert
    function getAlert() {
        return $this->alert;
    }

    // Method to get a user, this method receives the email and password of the user
    public function getUser() {
        $this->connectDB();
        $userData = $this->getUser();
        if ($userData === null) {
            $this->result = 'The email or password is incorrect';
            $this->alert = true;
        } else {
            $this->result = 'You are logged in';
            return $userData;
        }
    }
}