<?php
session_start();
require_once 'connection.php';

if (isset($_GET['id'])) {
    try {
        // ดึงข้อมูลรูปภาพก่อนลบ
        $stmt = $conn->prepare("SELECT image_url FROM boardgames WHERE id = :id");
        $stmt->execute([':id' => $_GET['id']]);
        $boardgame = $stmt->fetch(PDO::FETCH_ASSOC);

        // ลบรูปภาพถ้ามี
        if ($boardgame && $boardgame['image_url']) {
            $image_path = '../' . $boardgame['image_url'];
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        // ลบข้อมูลจากฐานข้อมูล
        $stmt = $conn->prepare("DELETE FROM boardgames WHERE id = :id");
        $stmt->execute([':id' => $_GET['id']]);

        header('Location: ../manage-boardgames.php?success=delete');
        exit();

    } catch(PDOException $e) {
        error_log("Error deleting boardgame: " . $e->getMessage());
        header('Location: ../manage-boardgames.php?error=delete');
        exit();
    }
}
?> 