<?php
session_start();
require_once 'actions/connection.php';
// ตรวจสอบว่าเป็น admin หรือไม่
if (!isset($_SESSION['user_id']) || $_SESSION['permissions'] !== 'admin') {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แดชบอร์ด - Board & Card Game</title>
    <link rel="icon" href="https://lh6.googleusercontent.com/proxy/G45tSK1mVgHEM1IED-wutbaE2vQgEep-eXlWkI91sqvppHGHqOoD2SsdY3pbLbG8lyOkKGNCi7__ROzEkmoFKSPUi0uCn7wKANFWJgiLM911IAO5LPhjJ-T6Zelrw3KIQn4BaA">
    <link rel="icon" href="https://lh6.googleusercontent.com/proxy/G45tSK1mVgHEM1IED-wutbaE2vQgEep-eXlWkI91sqvppHGHqOoD2SsdY3pbLbG8lyOkKGNCi7__ROzEkmoFKSPUi0uCn7wKANFWJgiLM911IAO5LPhjJ-T6Zelrw3KIQn4BaA">
    <link rel="icon" href="https://lh6.googleusercontent.com/proxy/G45tSK1mVgHEM1IED-wutbaE2vQgEep-eXlWkI91sqvppHGHqOoD2SsdY3pbLbG8lyOkKGNCi7__ROzEkmoFKSPUi0uCn7wKANFWJgiLM911IAO5LPhjJ-T6Zelrw3KIQn4BaA">
    <link rel="icon" href="https://lh6.googleusercontent.com/proxy/G45tSK1mVgHEM1IED-wutbaE2vQgEep-eXlWkI91sqvppHGHqOoD2SsdY3pbLbG8lyOkKGNCi7__ROzEkmoFKSPUi0uCn7wKANFWJgiLM911IAO5LPhjJ-T6Zelrw3KIQn4BaA">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body class="bg-gray-50 font-sans">
    <!-- Sidebar -->
    <div class="fixed left-0 top-0 w-64 h-full bg-blue-800 p-4 z-50 transition-all duration-300">
        <div class="flex items-center space-x-3 mb-8">
            <img src="./img/9187604.png" alt="Logo" class="h-8 w-8 rounded">
            <span class="text-white text-lg font-semibold" style="font-family: 'Kanit', sans-serif;">
                Dashboard
            </span>
        </div>

        <!-- Menu Items -->
        <nav class="space-y-2">
            <a href="dashboard.php"
                class="flex items-center space-x-3 text-white bg-blue-700 px-4 py-3 rounded-lg transition-colors duration-300">
                <i class="ri-dashboard-line text-xl"></i>
                <span style="font-family: 'Kanit', sans-serif;">หน้าแรก</span>
            </a>

            <a href="manage-boardgames.php"
                class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg transition-colors duration-300">
                <i class="ri-gamepad-line text-xl"></i>
                <span style="font-family: 'Kanit', sans-serif;">จัดการบอร์ดเกม</span>
            </a>

            <a href="manage-cardgames.php"
                class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg transition-colors duration-300">
                <i class="ri-file-list-3-line text-xl"></i>
                <span style="font-family: 'Kanit', sans-serif;">จัดการการ์ดเกม</span>
            </a>

            <a href="manage-articles.php"
                class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg transition-colors duration-300">
                <i class="ri-article-line text-xl"></i>
                <span style="font-family: 'Kanit', sans-serif;">จัดการบทความ</span>
            </a>
            <a href="manage-how-to-play-boardgames.php"
                class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg transition-colors duration-300">
                <i class="ri-clapperboard-line"></i>
                <span style="font-family: 'Kanit', sans-serif;">จัดการวิธีเล่นบอร์ดเกม</span>
            </a>
            <a href="manage-how-to-play-cardgames.php"
                class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg transition-colors duration-300">
                <i class="ri-gamepad-line"></i>
                <span style="font-family: 'Kanit', sans-serif;">จัดการวิธีเล่นการ์ดเกม</span>
            </a>

            <div class="pt-4 mt-4 border-t border-blue-700">
                <a href="./index.php"
                    class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg transition-colors duration-300">
                    <i class="ri-logout-box-line text-xl"></i>
                    <span style="font-family: 'Kanit', sans-serif;">กลับไปหน้าหลัก</span>
                </a>
            </div>

            <div class="pt-4 mt-4 border-t border-blue-700">
                <a href="logout.php"
                    class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg transition-colors duration-300">
                    <i class="ri-logout-box-line text-xl"></i>
                    <span style="font-family: 'Kanit', sans-serif;">ออกจากระบบ</span>
                </a>
            </div>

        </nav>
    </div>

    <!-- Main Content -->
    <div class="ml-64 p-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800" style="font-family: 'Kanit', sans-serif;">
                ภาพรวมระบบ
            </h1>
            <div class="flex items-center space-x-4">
                <span class="text-gray-600" style="font-family: 'Kanit', sans-serif;">
                    ยินดีต้อนรับ, <?php echo htmlspecialchars($_SESSION['username']); ?>
                </span>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <!-- Boardgames Stats -->

            <!-- Stats Grid -->
            <!-- Boardgames Stats -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center space-x-3">
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <i class="ri-gamepad-line text-2xl text-blue-600"></i>
                    </div>
                    <div>
                        <h3 class="text-gray-600 text-sm" style="font-family: 'Kanit', sans-serif;">บอร์ดเกมทั้งหมด</h3>
                        <p class="text-2xl font-semibold text-gray-800">
                            <?php
                            $stmt = $conn->query("SELECT COUNT(*) FROM boardgames");
                            $count = $stmt->fetchColumn();
                            echo $count;
                            ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center space-x-3">
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <i class="ri-gamepad-line text-2xl text-blue-600"></i>
                    </div>
                    <div>
                        <h3 class="text-gray-600 text-sm" style="font-family: 'Kanit', sans-serif;">การ์ดเกมทั้งหมด</h3>
                        <p class="text-2xl font-semibold text-gray-800">
                            <?php
                            $stmt = $conn->query("SELECT COUNT(*) FROM cardgames");
                            $count = $stmt->fetchColumn();
                            echo $count;
                            ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center space-x-3">
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <i class="ri-gamepad-line text-2xl text-blue-600"></i>
                    </div>
                    <div>
                        <h3 class="text-gray-600 text-sm" style="font-family: 'Kanit', sans-serif;">วิธีเล่นบอร์ดเกมทั้งหมด</h3>
                        <p class="text-2xl font-semibold text-gray-800">
                            <?php
                            $stmt = $conn->query("SELECT COUNT(*) FROM how_to_play_boardgames");
                            $count = $stmt->fetchColumn();
                            echo $count;
                            ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center space-x-3">
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <i class="ri-gamepad-line text-2xl text-blue-600"></i>
                    </div>
                    <div>
                        <h3 class="text-gray-600 text-sm" style="font-family: 'Kanit', sans-serif;">วิธีเล่นการ์ดเกมทั้งหมด</h3>
                        <p class="text-2xl font-semibold text-gray-800">
                            <?php
                            $stmt = $conn->query("SELECT COUNT(*) FROM how_to_play_cardgames");
                            $count = $stmt->fetchColumn();
                            echo $count;
                            ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center space-x-3">
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <i class="ri-gamepad-line text-2xl text-blue-600"></i>
                    </div>
                    <div>
                        <h3 class="text-gray-600 text-sm" style="font-family: 'Kanit', sans-serif;">บทความทั้งหมด</h3>
                        <p class="text-2xl font-semibold text-gray-800">
                            <?php
                            $stmt = $conn->query("SELECT COUNT(*) FROM articles");
                            $count = $stmt->fetchColumn();
                            echo $count;
                            ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Similar stats cards for other metrics -->
            <!-- ... -->
        </div>

        <!-- Recent Activities -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <h2 class="text-xl font-semibold text-gray-800 mb-4" style="font-family: 'Kanit', sans-serif;">
                กิจกรรมล่าสุด
            </h2>
            <!-- Activity list -->
            <div class="space-y-4">
                <?php
                // Query recent activities with consistent collation
                $stmt = $conn->prepare("
                    SELECT 'article' as type, title COLLATE utf8mb4_unicode_ci as title, created_at, 'created' as action 
                    FROM articles 
                    WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)
                    UNION ALL
                    SELECT 'boardgame' as type, title COLLATE utf8mb4_unicode_ci as title, created_at, 'created' as action 
                    FROM boardgames 
                    WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)
                    UNION ALL
                    SELECT 'cardgame' as type, title COLLATE utf8mb4_unicode_ci as title, created_at, 'created' as action 
                    FROM cardgames 
                    WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)
                    UNION ALL
                    SELECT 'how_to_play_boardgames' as type, name COLLATE utf8mb4_unicode_ci as title, created_at, 'created' as action 
                    FROM how_to_play_boardgames 
                    WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)
                    UNION ALL
                    SELECT 'how_to_play_cardgames' as type, name COLLATE utf8mb4_unicode_ci as title, created_at, 'created' as action 
                    FROM how_to_play_cardgames 
                    WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)
                    ORDER BY created_at DESC
                    LIMIT 5
                ");
                $stmt->execute();
                $activities = $stmt->fetchAll();

                if (empty($activities)) {
                    echo '<p class="text-gray-500 text-center py-4" style="font-family: \'Kanit\', sans-serif;">ไม่มีกิจกรรมในช่วง 7 วันที่ผ่านมา</p>';
                } else {
                    foreach ($activities as $activity):
                        $typeText = [
                            'article' => 'บทความ',
                            'boardgame' => 'บอร์ดเกม',
                            'cardgame' => 'การ์ดเกม',
                            'how_to_play_boardgames' => 'วิธีเล่นบอร์ดเกม',
                            'how_to_play_cardgames' => 'วิธีเล่นการ์ดเกม'
                        ][$activity['type']];
                ?>
                        <div class="bg-white p-4 rounded-lg border border-gray-100 shadow-sm">
                            <div class="flex items-center space-x-3">
                                <div class="bg-blue-100 p-2 rounded-lg">
                                    <i class="ri-file-list-line text-blue-600"></i>
                                </div>
                                <div>
                                    <p class="text-gray-600" style="font-family: 'Kanit', sans-serif;">
                                        เพิ่ม<?php echo $typeText; ?>ใหม่: <?php echo htmlspecialchars($activity['title']); ?>
                                    </p>
                                    <p class="text-sm text-gray-400">
                                        <?php echo date('d/m/Y H:i', strtotime($activity['created_at'])); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                <?php endforeach;
                } ?>
            </div>
        </div>
    </div>
</body>

</html>