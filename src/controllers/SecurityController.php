<?php


use models\User;
use repository\UserRepository;

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../repository/UserRepository.php';
require_once 'PostController.php';
class SecurityController extends AppController {

    const COOKIE_KEY = "ciasteczko";

    public function login() {

        if (!$this->isPost()) {
            $this->render("login");
        }

        $userRepository = new UserRepository();
        $user = $userRepository->getUser($_POST["email"]);

        if(!$user) {
            return $this->render("login", ["messages" => "User does not exist!"]);
        }

        $cookie_unique = uniqid();
        setcookie(self::COOKIE_KEY, $cookie_unique, time() + 900, '/');
        $userRepository->setCookie($user->getId(), $cookie_unique);
        if ($_POST["email"] !== $user->getEmail() || !password_verify($_POST["password"], $user->getPassword())) {
            $this->render("login", ["messages" => "Authentication failure!"]);
        } else {
            header("Location: http://localhost:8080/getPosts?page=1");
        }
    }

    public function register() {

        if (!$this->isPost()) {
            $this->render("register");
        }

        $userRepository = new UserRepository();
        if ($userRepository->getUser($_POST["email"]) !== null) {
            $this->render("login", ["erorr" => "user with that email already exist!"]);
        }
        $userRepository->createUser(new User(uniqid(), $_POST["email"], $_POST["username"], password_hash($_POST["password"], PASSWORD_BCRYPT)));

        $this->render("login", ["messages" => "registered successfully"]);
    }

    public function logout() {
        $userRepository = new UserRepository();
        $userRepository->deleteCookie($_COOKIE[self::COOKIE_KEY]);

        $this->render("login", ["messages" => "You have successfully logged out"]);
    }
}