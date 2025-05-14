<?php
session_start();
require_once 'connection.php';

if (isset($_GET['id'])) {
    try {
        // ดึงข้อมูลรูปภาพก่อนลบ
        $stmt = $conn->prepare("SELECT image_url FROM articles WHERE id = :id");
        $stmt->execute([':id' => $_GET['id']]);
        $article = $stmt->fetch(PDO::FETCH_ASSOC);

        // ลบรูปภาพถ้ามี
        if ($article && $article['image_url']) {
            $image_path = '../' . $article['image_url'];
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        // ลบข้อมูลจากฐานข้อมูล
        $stmt = $conn->prepare("DELETE FROM articles WHERE id = :id");
        $stmt->execute([':id' => $_GET['id']]);

        header('Location: ../manage-articles.php?success=delete');
        exit();

    } catch(PDOException $e) {
        error_log("Error deleting article: " . $e->getMessage());
        header('Location: ../manage-articles.php?error=delete');
        exit();
    }
}
?>