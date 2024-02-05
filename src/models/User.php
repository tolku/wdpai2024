<?php

namespace models;

use DateTime;

class User {

    private $id;
    private $email;
    private $username;
    private $password;

    public function __construct(string $id, string $email, string $username, string $password) {
        $this->id = $id;
        $this -> email = $email;
        $this -> username = $username;
        $this -> password = $password;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getEmail() {
        return $this -> email;
    }

    public function setEmail(string $email) {
        $this -> email = $email;
    }

    public function getUsername() {
        return $this -> username;
    }

    public function setUsername(string $username) {
        $this -> username = $username;
    }

    public function getPassword() {
        return $this -> password;
    }

    public function setPassword(string $password) {
        $this -> password = $password;
    }

}