<?php

class Notification {
    private $id;
    private $id_user;
    private $status;
    
    public function __construct($id, $id_user, $status) {
        $this->id = $id;
        $this->id_user = $id_user;
        $this->status = $status;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getIdUser() {
        return $this->id_user;
    }
    
    public function getStatus() {
        return $this->status;
    }
}
