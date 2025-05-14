<?php
session_start();
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $boardgame_id = isset($_POST['boardgame_id']) && !empty($_POST['boardgame_id']) ? $_POST['boardgame_id'] : null;
        $name = $_POST['name'];
        $description = $_POST['description'];
        $player_min = $_POST['player_min'];
        $player_max = $_POST['player_max'];
        $play_time = $_POST['play_time'];
        $age_rating = $_POST['age_rating'];
        $category = $_POST['category'];
        $rules = $_POST['rules'];
        $status = $_POST['status'];

        // จัดการอัพโหลดรูปภาพ
        $image_url = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $upload_dir = '../uploads/how-to-play/';
            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            // ถ้าเป็นการแก้ไข ให้ลบรูปเก่า
            if ($boardgame_id) {
                $stmt = $conn->prepare("SELECT image_url FROM how_to_play_boardgames WHERE id = :id");
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
                $image_url = 'uploads/how-to-play/' . $new_filename;
            }
        }

        if ($boardgame_id) {
            // อัพเดทข้อมูลที่มีอยู่
            $sql = "UPDATE how_to_play_boardgames SET 
                    name = :name,
                    description = :description,
                    player_min = :player_min,
                    player_max = :player_max,
                    play_time = :play_time,
                    age_rating = :age_rating,
                    category = :category,
                    rules = :rules,
                    status = :status";
            
            if ($image_url) {
                $sql .= ", image_url = :image_url";
            }
            
            $sql .= " WHERE id = :id";
            
            $stmt = $conn->prepare($sql);
            $params = [
                ':name' => $name,
                ':description' => $description,
                ':player_min' => $player_min,
                ':player_max' => $player_max,
                ':play_time' => $play_time,
                ':age_rating' => $age_rating,
                ':category' => $category,
                ':rules' => $rules,
                ':status' => $status,
                ':id' => $boardgame_id
            ];
            
            if ($image_url) {
                $params[':image_url'] = $image_url;
            }
            
        } else {
            // เพิ่มข้อมูลใหม่
            $stmt = $conn->prepare("INSERT INTO how_to_play_boardgames (name, description, player_min, player_max, play_time, age_rating, category, rules, image_url, status) 
                                  VALUES (:name, :description, :player_min, :player_max, :play_time, :age_rating, :category, :rules, :image_url, :status)");
            $params = [
                ':name' => $name,
                ':description' => $description,
                ':player_min' => $player_min,
                ':player_max' => $player_max,
                ':play_time' => $play_time,
                ':age_rating' => $age_rating,
                ':category' => $category,
                ':rules' => $rules,
                ':image_url' => $image_url,
                ':status' => $status
            ];
        }

        $stmt->execute($params);
        header('Location: ../manage-how-to-play-boardgames.php?success=true');
        exit();

    } catch(PDOException $e) {
        error_log("Error saving boardgame: " . $e->getMessage());
        header('Location: ../manage-how-to-play-boardgames.php?error=save');
        exit();
    }
}
?>    