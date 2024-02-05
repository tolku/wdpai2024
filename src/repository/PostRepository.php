<?php

namespace repository;

use models\Post;
use PDO;

class PostRepository extends Repository {
    public function getPostTitles() {
        $stmnt = $this->database->connect()->prepare("SELECT id, topic FROM public.post_titles");
        $stmnt->execute();

        $titles_array = $stmnt->fetchAll(PDO::FETCH_ASSOC);

        if (!$titles_array) {
            return null;
        }

        return $titles_array;
    }

    public function getPost($id) {
        $stmnt = $this->database->connect()->prepare("SELECT topic, content, image_path FROM public.post_titles titles INNER JOIN public.post_contents contents ON contents.post_title_id_fk = :id AND titles.id = :id");
        $stmnt->bindParam(":id", $id);
        $stmnt->execute();

        $post = $stmnt->fetchAll(PDO::FETCH_ASSOC);

        if ($post == null) {
            return null;
        }

        return $post;
    }

    public function addPostTitle($id, $post_title, $user_id) {
        $stmnt = $this->database->connect()->prepare("INSERT INTO post_titles (id, topic, user_id_fk) VALUES (?, ?, ?)");
        $stmnt->execute([$id, $post_title, $user_id]);

    }

    public function addPostContent($content, $filename, $post_title_id) {
        $stmnt = $this->database->connect()->prepare("INSERT INTO post_contents (id, content, image_path, post_title_id_fk) VALUES (?, ?, ?, ?)");
        $stmnt->execute([uniqid(), $content, $filename, $post_title_id]);

    }
}