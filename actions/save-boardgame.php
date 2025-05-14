<?php
session_start();
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $boardgame_id = isset($_POST['boardgame_id']) && !empty($_POST['boardgame_id']) ? $_POST['boardgame_id'] : null;
        $title = $_POST['title'];
        $description = $_POST['description'];
        $player_count = $_POST['player_count'];
        $difficulty = $_POST['difficulty'];
        $play_time = $_POST['play_time'];
        $status = $_POST['status'];

        // จัดการอัพโหลดรูปภาพ
        $image_url = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $upload_dir = '../uploads/boardgames/';
            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            // ถ้าเป็นการแก้ไข ให้ลบรูปเก่า
            if ($boardgame_id) {
                $stmt = $conn->prepare("SELECT image_url FROM boardgames WHERE id = :id");
                $stmt->execute([':id' => $boardgame_id]);
                $old_boardgame = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($old_boardgame && $old_boardgame['image_url']) {
                    $old_image_path = '../' . $old_boardgame['image_url'];
                    if (file_exists($old_image_path)) {
                        unlink($old_image_path);
                    }
                }
            }

            $file_extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
            $new_filename = uniqid() . '.' . $file_extension;
            $upload_path = $upload_dir . $new_filename;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
                $image_url = 'uploads/boardgames/' . $new_filename;
            }
        }

        if ($boardgame_id) {
            // อัพเดทบอร์ดเกมที่มีอยู่
            $sql = "UPDATE boardgames SET 
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
                ':id' => $boardgame_id
            ];
            
            if ($image_url) {
                $params[':image_url'] = $image_url;
            }
            
        } else {
            // เพิ่มบอร์ดเกมใหม่
            $stmt = $conn->prepare("INSERT INTO boardgames (title, description, image_url, player_count, difficulty, play_time, status) 
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
        header('Location: ../manage-boardgames.php?success=true');
        exit();

    } catch(PDOException $e) {
        error_log("Error saving boardgame: " . $e->getMessage());
        header('Location: ../manage-boardgames.php?error=save');
        exit();
    }
}
?> 