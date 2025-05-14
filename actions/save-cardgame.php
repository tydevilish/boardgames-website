<?php
session_start();
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $cardgame_id = isset($_POST['cardgame_id']) && !empty($_POST['cardgame_id']) ? $_POST['cardgame_id'] : null;
        $title = $_POST['title'];
        $description = $_POST['description'];
        $player_count = $_POST['player_count'];
        $difficulty = $_POST['difficulty'];
        $play_time = $_POST['play_time'];
        $status = $_POST['status'];

        // จัดการอัพโหลดรูปภาพ
        $image_url = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $upload_dir = '../uploads/cardgames/';
            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            // ถ้าเป็นการแก้ไข ให้ลบรูปเก่า
            if ($cardgame_id) {
                $stmt = $conn->prepare("SELECT image_url FROM cardgames WHERE id = :id");
                $stmt->execute([':id' => $cardgame_id]);
                $old_cardgame = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($old_cardgame && $old_cardgame['image_url']) {
                    $old_image_path = '../' . $old_cardgame['image_url'];
                    if (file_exists($old_image_path)) {
                        unlink($old_image_path);
                    }
                }
            }

            $file_extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
            $new_filename = uniqid() . '.' . $file_extension;
            $upload_path = $upload_dir . $new_filename;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
                $image_url = 'uploads/cardgames/' . $new_filename;
            }
        }

        if ($cardgame_id) {
            // อัพเดทการ์ดเกมที่มีอยู่
            $sql = "UPDATE cardgames SET 
                    title = :title,
                    description = :description,
                    player_count = :player_count,
                    difficulty = :difficulty,
                    play_time = :play_time,
                    status = :status";
            
            if ($image_url) {
                $sql .= ", image_url = :image_url";
            }
            
            $sql .= " WHERE id = :id";
            
            $stmt = $conn->prepare($sql);
            $params = [
                ':title' => $title,
                ':description' => $description,
                ':player_count' => $player_count,
                ':difficulty' => $difficulty,
                ':play_time' => $play_time,
                ':status' => $status,
                ':id' => $cardgame_id
            ];
            
            if ($image_url) {
                $params[':image_url'] = $image_url;
            }
            
        } else {
            // เพิ่มการ์ดเกมใหม่
            $stmt = $conn->prepare("INSERT INTO cardgames (title, description, image_url, player_count, difficulty, play_time, status) 
                                  VALUES (:title, :description, :image_url, :player_count, :difficulty, :play_time, :status)");
            $params = [
                ':title' => $title,
                ':description' => $description,
                ':image_url' => $image_url,
                ':player_count' => $player_count,
                ':difficulty' => $difficulty,
                ':play_time' => $play_time,
                ':status' => $status
            ];
        }

        $stmt->execute($params);
        header('Location: ../manage-cardgames.php?success=true');
        exit();

    } catch(PDOException $e) {
        error_log("Error saving cardgame: " . $e->getMessage());
        header('Location: ../manage-cardgames.php?error=save');
        exit();
    }
}
?> 