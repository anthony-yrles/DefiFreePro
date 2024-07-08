<?php

/**
 * Class Notification
 * Represents a notification entity with its associated properties and methods.
 */
class Notification {
    /**
     * @var int $id The ID of the notification.
     */
    private $id;
    
    /**
     * @var int $id_user The ID of the user associated with the notification.
     */
    private $id_user;
    
    /**
     * @var int $status The status of the notification.
     */
    private $status;

    /**
     * Constructor to initialize the properties of the Notification.
     *
     * @param int $id      The ID of the notification.
     * @param int $id_user The ID of the user associated with the notification.
     * @param int $status  The status of the notification.
     */
    public function __construct($id, $id_user, $status) {
        $this->id = $id;
        $this->id_user = $id_user;
        $this->status = $status;
    }

    /**
     * Get the ID of the notification.
     *
     * @return int The ID of the notification.
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Get the ID of the user associated with the notification.
     *
     * @return int The ID of the user.
     */
    public function getIdUser() {
        return $this->id_user;
    }

    /**
     * Get the status of the notification.
     *
     * @return int The status of the notification.
     */
    public function getStatus() {
        return $this->status;
    }
}