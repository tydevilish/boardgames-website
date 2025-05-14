<?php
session_start();
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $article_id = isset($_POST['article_id']) && !empty($_POST['article_id']) ? $_POST['article_id'] : null;
        $title = $_POST['title'];
        $content = $_POST['content'];
        $status = $_POST['status'];
        $author_id = $_SESSION['user_id'];

        // จัดการอัพโหลดรูปภาพ
        $image_url = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $upload_dir = '../uploads/articles/';
            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            // ถ้าเป็นการแก้ไข ให้ลบรูปเก่า
            if ($article_id) {
                $stmt = $conn->prepare("SELECT image_url FROM articles WHERE id = :id");
                $stmt->execute([':id' => $article_id]);
                $old_article = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($old_article && $old_article['image_url']) {
                    $old_image_path = '../' . $old_article['image_url'];
                    if (file_exists($old_image_path)) {
                        unlink($old_image_path);
                    }
                }
            }

            $file_extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
            $new_filename = uniqid() . '.' . $file_extension;
            $upload_path = $upload_dir . $new_filename;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
                $image_url = 'uploads/articles/' . $new_filename;
            }
        }

        if ($article_id) {
            // อัพเดทบทความที่มีอยู่
            $sql = "UPDATE articles SET 
                    title = :title,
                    content = :content,
                    status = :status";
            
            if ($image_url) {
                $sql .= ", image_url = :image_url";
            }
            
            $sql .= " WHERE id = :id";
            
            $stmt = $conn->prepare($sql);
            $params = [
                ':title' => $title,
                ':content' => $content,
                ':status' => $status,
                ':id' => $article_id
            ];
            
            if ($image_url) {
                $params[':image_url'] = $image_url;
            }
            
        } else {
            // เพิ่มบทความใหม่
            $stmt = $conn->prepare("INSERT INTO articles (title, content, image_url, status, author_id) 
                                  VALUES (:title, :content, :image_url, :status, :author_id)");
            $params = [
                ':title' => $title,
                ':content' => $content,
                ':image_url' => $image_url,
                ':status' => $status,
                ':author_id' => $author_id
            ];
        }

        $stmt->execute($params);
        header('Location: ../manage-articles.php?success=true');
        exit();

    } catch(PDOException $e) {
        error_log("Error saving article: " . $e->getMessage());
        header('Location: ../manage-articles.php?error=save');
        exit();
    }
}
?> 