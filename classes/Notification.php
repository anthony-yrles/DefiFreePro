<?php

class Notification {
    private $id_user;
    private $status;

    public function __construct(int $id_user, bool $status) {
        $this->id_user = $id_user;
        $this->status = $status;
    }

    public function getIdUser() {
        return $this->id_user;
    }
    public function getStatus() {
        return $this->status;
    }
    public function setStatus(bool $status) {
        $this->status = $status;
    }
}