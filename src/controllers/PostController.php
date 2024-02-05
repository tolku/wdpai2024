<?php

use models\Post;
use repository\PostRepository;
use repository\UserRepository;

require_once __DIR__ . '/../models/Post.php';
require_once __DIR__ . '/../repository/PostRepository.php';
class PostController extends AppController {

    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';
    const COOKIE_KEY = "ciasteczko";
    const MAX_POST_NUMBER = 14;

    private $messages = [];

    public function addPost() {
        $userRepo = new UserRepository();
        $postRepo = new PostRepository();
        if (!$userRepo->isCookieValid($_COOKIE[self::COOKIE_KEY])){
            $this->render("login", ["messages" => "You have been logged out - session no longer valid"]);
        }

        $user = $userRepo->getUserFromCookie($_COOKIE[self::COOKIE_KEY]);

        if ($this->isPost() && is_uploaded_file($_FILES["file"]["tmp_name"]) && $this->validate($_FILES["file"])){
            move_uploaded_file(
                $_FILES["file"]["tmp_name"],
                dirname(__DIR__) . self::UPLOAD_DIRECTORY . $_FILES['file']['name']);

            $post_title_id = uniqid();
            $postRepo->addPostTitle($post_title_id, $_POST["topic"], $user->getId());
            $postRepo->addPostContent($_POST["content"], $_FILES['file']['name'], $post_title_id);

            $this->getPosts();
        }

        $this->render("addpost", ["messages" => $this->messages]);
    }

    public function getPosts($page = 1) {
        $userRepo = new UserRepository();
        $postRepo = new PostRepository();
        if (!$userRepo->isCookieValid($_COOKIE[self::COOKIE_KEY])){
            $this->render("login", ["messages" => "You have been logged out - session no longer valid"]);
        }

        $titles_arr = array_reverse($postRepo->getPostTitles());

        $page_from_url = $_GET['page'];
        if ($page_from_url != null) {
            $page = $page_from_url;
        }

        $is_next_page = false;

        if (count($titles_arr) > self::MAX_POST_NUMBER) {
            $start_index = 0;
            $end_index = self::MAX_POST_NUMBER;
            if ($page != 1) {
                $start_index = self::MAX_POST_NUMBER * ($page - 1);
                $end_index = $start_index + self::MAX_POST_NUMBER;
            }
            if (count($titles_arr) > $end_index){
                $is_next_page = true;
            }
            $titles_arr = array_slice($titles_arr, $start_index, $end_index);
        }


        $this->render("general-registered", ["posts" => $titles_arr, "page" => $page, "is_next_page" => $is_next_page]);
    }

    public function showpost() {
        $userRepo = new UserRepository();
        if (!$userRepo->isCookieValid($_COOKIE[self::COOKIE_KEY])){
            $this->render("login", ["messages" => "You have been logged out - session no longer valid"]);
        }

        if ($_GET["id"] == null) {
            return $this->getPosts();
        }

        $postRepo = new PostRepository();

        $post = $postRepo->getPost($_GET["id"]);

        $this->render("showpost", ["post" => $post]);

    }

    private function validate(array $file) : bool {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->messages[] = "File too large";
            return false;
        }

        if (!isset($file["type"]) || !in_array($file["type"], self::SUPPORTED_TYPES)) {
            $this->messages[] = "File type not supported";
            return false;
        }

        return true;
    }
}