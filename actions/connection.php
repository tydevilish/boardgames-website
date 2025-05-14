<?php
$host = 'fdb1029.awardspace.net';
$dbname = '4532839_kcfkfc123';
$username = '4532839_kcfkfc123';
$password = '@swx!oFM3hn*[qT1';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $conn = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {
    error_log ("Connection failed: " . $e->getMessage());
    die("ขออภัย เกิดข้อผิดพลาดในการเชื่อมต่อฐานข้อมูล");
}
?>