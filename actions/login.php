<?php
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];  // รับค่า username จากฟอร์ม
    $password = $_POST['password'];  // รับค่า password จากฟอร์ม

    try {
        // เตรียมคำสั่ง SQL
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // ตรวจสอบว่ามีผู้ใช้นี้ในระบบหรือไม่
        if ($user && password_verify($password, $user['password'])) {
            // Login สำเร็จ
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['permissions'] = $user['permissions'];

            // ถ้ามีการเช็ค "จดจำฉัน"
            if (isset($_POST['remember']) && $_POST['remember'] == 'on') {
                $token = bin2hex(random_bytes(32)); // สร้าง token
                
                // บันทึก token ลงฐานข้อมูล
                $stmt = $conn->prepare("UPDATE users SET remember_token = :token WHERE id = :id");
                $stmt->execute([
                    ':token' => $token,
                    ':id' => $user['id']
                ]);

                // สร้าง cookie
                setcookie('remember_token', $token, time() + (86400 * 30), "/"); // 30 วัน
            }

            header('Location: ../login.php?login=success'); // redirect ไปหน้าหลัก
            exit();
        } else {
            // Login ไม่สำเร็จ
            header('Location: ../login.php?error=invalid');
            exit();
        }
    } catch(PDOException $e) {
        // จัดการข้อผิดพลาด
        error_log("Login error: " . $e->getMessage());
        header('Location: ../login.php?error=system');
        exit();
    }
}
?>