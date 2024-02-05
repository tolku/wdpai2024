<?php

namespace repository;

use DateTime;
use models\User;
use PDO;

require_once "Repository.php";
require_once __DIR__ . "/../models/User.php";

class UserRepository extends Repository {

    public function getUser(string $email) : ?User {
        $stmnt = $this->database->connect()->prepare("SELECT * FROM public.users WHERE email = :email");
        $stmnt->bindParam(":email", $email);
        $stmnt->execute();

        $user = $stmnt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }

        return new User($user["id"], $user["email"], $user["name"], $user["password"]);
    }

    public function getUserFromCookie(string $cookie) {
        $stmnt = $this->database->connect()->prepare("SELECT * FROM public.users WHERE cookie = :id");
        $stmnt->bindParam(":id", $cookie);
        $stmnt->execute();

        $user = $stmnt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }

        return new User($user["id"], $user["email"], $user["name"], $user["password"]);

    }

    public function createUser($user) {
        $stmnt = $this->database->connect()->prepare("INSERT INTO users (name, email, password, id) VALUES (?, ?, ?, ?)");
        $stmnt->execute([$user->getUsername(), $user->getEmail(), $user->getPassword(), $user->getId()]);
    }

    public function setCookie($id, $cookie) {
        $exp_date = date('Y-m-d H:i:s', strtotime('+15 minutes'));
        $stmnt = $this->database->connect()->prepare("UPDATE users SET cookie = :cookie, cookie_expiration_date = :date WHERE users.id = :id");
        $stmnt->bindParam(":id", $id);
        $stmnt->bindParam(":cookie", $cookie);
        $stmnt->bindParam(":date", $exp_date);
        $stmnt->execute();
    }

    public function isCookieValid($cookie) {
        $stmnt = $this->database->connect()->prepare("SELECT cookie, cookie_expiration_date FROM users WHERE cookie = :cookie");
        $stmnt->bindParam(":cookie", $cookie);
        $stmnt->execute();

        $cookie_from_db = $stmnt->fetch(PDO::FETCH_ASSOC);

        $currentDateTime = new DateTime();
        $currentDateTime->format('Y-m-d H:i:s');


        $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $cookie_from_db["cookie_expiration_date"]);
        $dateTime->modify('-780 seconds');

        if ($cookie_from_db != null && $dateTime > $currentDateTime) {
            return true;
        }
        else {
            $this->deleteCookie($cookie_from_db["cookie"]);
            return false;
        }
    }

    public function deleteCookie($cookie) {
        $stmnt = $this->database->connect()->prepare("UPDATE users SET cookie = NULL, cookie_expiration_date = NULL WHERE cookie = :id");
        $stmnt->bindParam(":id", $cookie);
        $stmnt->execute();
    }
}