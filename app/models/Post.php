<?php

namespace app\models;

class Post {
    public function getAllPostsByTitle($params) {
  
        $allPosts = [
            ['title' => 'Mock title.', 'content' => 'Mock content.'],
            ['title' => 'Mock title 2.', 'content' => 'Mock content 2.'],
        ];

        if (!empty($params['title'])) {
            return array_filter($allPosts, function ($post) use ($params) {
                return stripos($post['title'], $params['title']) !== false;
            });
        }

        return $allPosts;
    }

    public function savePost($post) {
        if (empty($post['title']) || empty($post['content'])) {
            throw new Exception("Post title and content are required.");
        }
    }

}

?>