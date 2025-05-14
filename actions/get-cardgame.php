<?php
require_once 'connection.php';

if (isset($_GET['id'])) {
    try {
        $stmt = $conn->prepare("SELECT * FROM cardgames WHERE id = :id");
        $stmt->execute([':id' => $_GET['id']]);
        $cardgame = $stmt->fetch(PDO::FETCH_ASSOC);
        
        header('Content-Type: application/json');
        echo json_encode($cardgame);
        
    } catch(PDOException $e) {
        error_log("Error fetching cardgame: " . $e->getMessage());
        http_response_code(500);
        echo json_encode(['error' => 'Database error']);
    }
}
?> 