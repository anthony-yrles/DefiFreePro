<?php

/**
 * Class Product
 * Represents a product entity with its associated properties and methods.
 */
class Product {
    /**
     * @var int $id The ID of the product.
     */
    private $id;

    /**
     * @var int $idUser The ID of the user associated with the product.
     */
    private $idUser;

    /**
     * @var int $pop The pop attribute of the product.
     */
    private $pop;

    /**
     * @var int $delta The delta attribute of the product.
     */
    private $delta;

    /**
     * @var int $mini4k The mini4k attribute of the product.
     */
    private $mini4k;

    /**
     * @var int $deuxEuros The deuxEuros attribute of the product.
     */
    private $deuxEuros;

    /**
     * @var int $centquarante The centquarante attribute of the product.
     */
    private $centquarante;

    /**
     * @var int $illimite The illimite attribute of the product.
     */
    private $illimite;

    /**
     * Constructor to initialize the properties of the Product.
     *
     * @param int $id            The ID of the product.
     * @param int $idUser        The ID of the user associated with the product.
     * @param int $pop           The pop attribute of the product.
     * @param int $delta         The delta attribute of the product.
     * @param int $mini4k        The mini4k attribute of the product.
     * @param int $deuxEuros     The deuxEuros attribute of the product.
     * @param int $centquarante  The centquarante attribute of the product.
     * @param int $illimite      The illimite attribute of the product.
     */
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

    /**
     * Get the ID of the product.
     *
     * @return int The ID of the product.
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Get the ID of the user associated with the product.
     *
     * @return int The ID of the user.
     */
    public function getIdUser() {
        return $this->idUser;
    }

    /**
     * Get the pop attribute of the product.
     *
     * @return int The pop attribute of the product.
     */
    public function getPop() {
        return $this->pop;
    }

    /**
     * Get the delta attribute of the product.
     *
     * @return int The delta attribute of the product.
     */
    public function getDelta() {
        return $this->delta;
    }

    /**
     * Get the mini4k attribute of the product.
     *
     * @return int The mini4k attribute of the product.
     */
    public function getMini4k() {
        return $this->mini4k;
    }

    /**
     * Get the deuxEuros attribute of the product.
     *
     * @return int The deuxEuros attribute of the product.
     */
    public function getDeuxEuros() {
        return $this->deuxEuros;
    }

    /**
     * Get the centquarante attribute of the product.
     *
     * @return int The centquarante attribute of the product.
     */
    public function getCentquarante() {
        return $this->centquarante;
    }

    /**
     * Get the illimite attribute of the product.
     *
     * @return int The illimite attribute of the product.
     */
    public function getIllimite() {
        return $this->illimite;
    }
}