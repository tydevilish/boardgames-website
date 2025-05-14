<?php
session_start();
require_once 'connection.php';

if (isset($_GET['id'])) {
    try {
        // ดึงข้อมูลรูปภาพก่อนลบ
        $stmt = $conn->prepare("SELECT image_url FROM cardgames WHERE id = :id");
        $stmt->execute([':id' => $_GET['id']]);
        $cardgame = $stmt->fetch(PDO::FETCH_ASSOC);

        // ลบรูปภาพถ้ามี
        if ($cardgame && $cardgame['image_url']) {
            $image_path = '../' . $cardgame['image_url'];
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        // ลบข้อมูลจากฐานข้อมูล
        $stmt = $conn->prepare("DELETE FROM cardgames WHERE id = :id");
        $stmt->execute([':id' => $_GET['id']]);

        header('Location: ../manage-cardgames.php?success=delete');
        exit();

    } catch(PDOException $e) {
        error_log("Error deleting cardgame: " . $e->getMessage());
        header('Location: ../manage-cardgames.php?error=delete');
        exit();
    }
}
?> 