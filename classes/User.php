<?php

/**
 * The User Class allow to create objects User with differents properties like:
 * - name
 * - surname
 * - email
 * - password
 * - emailValidated
 * - connected
 * - status
 * Class User for user operations:
 * - properties
 * - constructor
 * - setter and getter for properties
 * - method to hash the password
 */

class User {

    // Properties
    private $name;
    private $surname;
    private $email;
    private $password;
    private $emailValidated;
    private $connected;
    private $status;

    // Constructor to initialize properties
    public function __construct(string $name, string $surname, string $email, string $password) {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->emailValidated = false;
        $this->connected = false;
        $this->status = 'user';
    }

    // Setter and getter for properties
    public function setName(string $name) {
        $this->name = $name;
    }
    public function getName() {
        return $this->name;
    }
    public function setSurname(string $surname) {
        $this->surname = $surname;
    }
    public function getSurname() {
        return $this->surname;
    }
    public function setEmail(string $email) {
        $this->email = $email;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setPassword(string $password) {
        $this->password = $password;
    }
    public function getPassword() {
        return $this->password;
    }
    public function setEmailValidated(string $emailValidated) {
        $this->emailValidated = $emailValidated;
    }
    public function getEmailValidated() {
        return $this->emailValidated;
    }
    public function setConnected(string $connected) {
        $this->connected = $connected;
    }
    public function getConnected() {
        return $this->connected;
    }
    public function setStatus(string $status) {
        $this->status = $status;
    }
    public function getStatus() {
        return $this->status;
    }  
}