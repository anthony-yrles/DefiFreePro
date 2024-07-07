<?php

class Product {
    private $id;
    private $idUser;
    private $pop;
    private $delta;
    private $mini4k;
    private $deuxEuros;
    private $centquarante;
    private $illimite;

    
    public function __construct($id, $idUser, $pop, $delta, $mini4k, $deuxEuros, $centquarante, $illimite) {
        $this->id = $id;
        $this->idUser = $idUser;
        $this->pop = $pop;
        $this->delta = $delta;
        $this->mini4k = $mini4k;
        $this->deuxEuros = $deuxEuros;
        $this->centquarante = $centquarante;
        $this->illimite = $illimite;
    }
    
    public function getId() {
        return $this->id;
    }    
    public function getIdUser() {
        return $this->idUser;
    }
    public function getPop() {
        return $this->pop;
    }
    public function getDelta() {
        return $this->delta;
    }
    public function getMini4k() {
        return $this->mini4k;
    }
    public function getDeuxEuros() {
        return $this->deuxEuros;
    }
    public function getCentquarante() {
        return $this->centquarante;
    }
    public function getIllimite() {
        return $this->illimite;
    }
}