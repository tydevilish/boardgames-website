<?php
require_once 'connection.php';

if (isset($_GET['id'])) {
    try {
        $stmt = $conn->prepare("SELECT * FROM how_to_play_boardgames WHERE id = :id");
        $stmt->execute([':id' => $_GET['id']]);
        $boardgame = $stmt->fetch(PDO::FETCH_ASSOC);
        
        header('Content-Type: application/json');
        echo json_encode($boardgame);
        
    } catch(PDOException $e) {
        error_log("Error fetching boardgame: " . $e->getMessage());
        http_response_code(500);
        echo json_encode(['error' => 'Database error']);
    }
}
?> 