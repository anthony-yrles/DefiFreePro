<?php

/**
 * Class Db for database operations:
 * - connection to the database
 * - disconnect from the database
 * - execute a query
 * - fetch results
 */

class Db {
    // Properties
    protected $host;
    protected $username;
    protected $password;
    protected $database;
    protected $connection;

    // Constructor to initialize properties
    public function __construct(string $host, string $username, string $password, string $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }
    
    // Method to connect to the database
    public function connect() {
        error_log('Connecting to database');
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    // Method to disconnect from the database
    public function disconnect() {
        error_log('Disconnecting from database');
        $this->connection->close();
    }

    // Method to execute a query
    public function query($sql) {
        error_log('Executing query: ' . $sql);
        return $this->connection->query($sql);
    }

    // Method to fetch results
    public function fetch($result) {
        error_log('Fetching result');
        return $result->fetch_assoc();
    }
} 