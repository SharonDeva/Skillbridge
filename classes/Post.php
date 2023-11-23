<?php

namespace classes;

use PDO;
use PDOException;

class Post {

    private $post_id;
    private $userid;
    private $description;
    private $image_path;
    private $video_path;
    private $like_count;

    public function __construct($userid, $description, $image_path = null, $video_path = null) {
        $this->userid = $userid;
        $this->description = $description;
        $this->image_path = $image_path;
        $this->video_path = $video_path;
        $this->like_count = 0; // Initialize like count to zero
    }

    public function setPostId($post_id) {
        $this->post_id = $post_id;
    }

    public function getPostId() {
        return $this->post_id;
    }

    public function getUserId() {
        return $this->userid;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getImagePath() {
        return $this->image_path;
    }

    public function getVideoPath() {
        return $this->video_path;
    }

    public function getLikeCount() {
        return $this->like_count;
    }

    public function createPost($con) {
        try {
            $query = "INSERT INTO Posts (userid, description, image_path, video_path, likes) VALUES (?, ?, ?, ?, ?)";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $this->userid);
            $pstmt->bindValue(2, $this->description);
            $pstmt->bindValue(3, $this->image_path);
            $pstmt->bindValue(4, $this->video_path);
            $pstmt->bindValue(5, $this->like_count);
            $pstmt->execute();

            // Retrieve the auto-generated post_id
            $this->post_id = $con->lastInsertId();

// Handle image upload
            if (!empty($_FILES['image']['tmp_name'])) {
                $imagePath = $this->uploadFile('image');
                $this->image_path = $imagePath;
            }

            // Handle video upload
            if (!empty($_FILES['video']['tmp_name'])) {
                $videoPath = $this->uploadFile('video');
                $this->video_path = $videoPath;
            }
            return ($pstmt->rowCount() > 0);
        } catch (PDOException $exc) {
            die("Error in Post class's createPost function: " . $exc->getMessage());
        }
    }

    private function uploadFile($fileInputName) {
        $targetDir = "uploads/";
        $uploadedFile = $_FILES[$fileInputName];
        $targetFilePath = $targetDir . basename($uploadedFile["name"]);
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Generate a unique filename
        $fileName = uniqid() . '.' . $fileType;
        $targetFilePath = $targetDir . $fileName;

        // Check file size and type
        if ($uploadedFile["size"] > 0 && in_array($fileType, ["jpg", "jpeg", "png", "gif", "mp4"])) {
            // Move the uploaded file to the destination
            if (move_uploaded_file($uploadedFile["tmp_name"], $targetFilePath)) {
                // Return the path to the uploaded file
                return $targetFilePath;
            } else {
                // Handle upload failure
                return null;
            }
        }

        // Invalid file type or size
        return null;
    }

    public static function retrievePosts($con, $page = 1, $perPage = 10) {
        try {
            $offset = ($page - 1) * $perPage;
            $query = "SELECT * FROM Posts ORDER BY post_id DESC LIMIT $offset, $perPage";
            $pstmt = $con->prepare($query);
            $pstmt->execute();
            return $pstmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $exc) {
            die("Error in Post class's retrievePosts function: " . $exc->getMessage());
        }
    }

    public function addLike($con) {
        try {
            $this->like_count++; // Increment like count
            $query = "UPDATE Posts SET likes = ? WHERE post_id = ?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $this->like_count);
            $pstmt->bindValue(2, $this->post_id);
            $pstmt->execute();
            return ($pstmt->rowCount() > 0);
        } catch (PDOException $exc) {
            die("Error in Post class's addLike function: " . $exc->getMessage());
        }
    }

    public function removeLike($con) {
        try {
            if ($this->like_count > 0) {
                $this->like_count--; // Decrement like count
                $query = "UPDATE Posts SET likes = ? WHERE post_id = ?";
                $pstmt = $con->prepare($query);
                $pstmt->bindValue(1, $this->like_count);
                $pstmt->bindValue(2, $this->post_id);
                $pstmt->execute();
                return ($pstmt->rowCount() > 0);
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            die("Error in Post class's removeLike function: " . $exc->getMessage());
        }
    }

}
