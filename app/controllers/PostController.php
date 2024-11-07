<?php

namespace app\controllers;
use app\models\Post;

class PostController {
    public function getPost() {
        $params = [
            'title' => $_GET['title'] ?: null,
        ];
        $postModel = new Post();
        $posts = $postModel->getAllPostsByTitle($params);
        header("Content-Type: application/json");
        echo json_encode($posts);
        exit();
    }

    public function savePost() {
        
        $title = $_POST['title'] ?: null;
        $content = $_POST['content'] ?: null;
        $errors = [];

        if ($title) {
            
            $title = htmlspecialchars($title);

            if (strlen($title) < 4) {
                $errors['title'] = 'Title is too short';
            }
        } else {
            $errors['title'] = 'title is required';
        }

        if ($content) {
            $content = htmlspecialchars($content);

            if (strlen($content) < 15) {
                $errors['content'] = 'Content is too short';
            }
        } else {
            $errors['content'] = 'Content is required';
        }

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }

        $returnData = [
            'title' => $title,
            'content' => $content,
        ];
        echo json_encode($returnData);
        exit();

    }

}
?>