<?php
session_start();
require_once '../../actions/connection.php';
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../src/output.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>วิธีการเล่นบอร์ดเกม - Board & Card Game</title>
    <link rel="icon" href="https://lh6.googleusercontent.com/proxy/G45tSK1mVgHEM1IED-wutbaE2vQgEep-eXlWkI91sqvppHGHqOoD2SsdY3pbLbG8lyOkKGNCi7__ROzEkmoFKSPUi0uCn7wKANFWJgiLM911IAO5LPhjJ-T6Zelrw3KIQn4BaA">
</head>

<style>
    .nav-link {
        position: relative;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: -2px;
        left: 0;
        background-color: #ffffff;
        transition: width 0.3s ease-in-out;
    }

    .nav-link:hover::after {
        width: 100%;
    }

    .dropdown-menu {
        transform: translateY(10px);
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease-in-out;
    }

    .dropdown:hover .dropdown-menu {
        transform: translateY(0);
        opacity: 1;
        visibility: visible;
    }

    .glass-effect {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }
</style>

<body class="bg-blue-50 font-sans flex flex-col min-h-screen">
    <header class="fixed w-full z-50 transition-all duration-300 bg-gradient-to-r from-blue-800 to-blue-700 shadow-lg "
        id="navbar">
        <nav class="glass-effect border-gray-200 px-4 lg:px-6 py-4">
            <div class="max-w-screen-xl mx-auto">
                <div class="flex flex-wrap justify-between items-center">
                    <!-- Logo -->
                    <a href="../../index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                        <img
                            src="https://lh6.googleusercontent.com/proxy/G45tSK1mVgHEM1IED-wutbaE2vQgEep-eXlWkI91sqvppHGHqOoD2SsdY3pbLbG8lyOkKGNCi7__ROzEkmoFKSPUi0uCn7wKANFWJgiLM911IAO5LPhjJ-T6Zelrw3KIQn4BaA"
                            class="h-12 rounded-lg shadow-lg" alt="Logo" />
                        <div>
                            <span class="self-center text-2xl font-semibold text-white whitespace-nowrap"
                                style="font-family: 'Kanit', sans-serif;">
                                Board Game
                            </span>
                            <p class="text-sm text-blue-100" style="font-family: 'Kanit', sans-serif;">
                                แนะนำบอร์ดเกมและการ์ดเกม
                            </p>
                        </div>
                    </a>

                    <!-- Mobile menu button -->
                    <button type="button"
                        class="inline-flex items-center p-2 ml-3 text-sm text-white rounded-lg lg:hidden hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>

                    <!-- Desktop Menu -->
                    <div class="hidden lg:flex lg:items-center lg:w-auto" id="desktop-menu">
                        <ul class="flex flex-col lg:flex-row lg:space-x-8 items-center">
                            <li>
                                <a href="../../index.php"
                                    class="nav-link text-white hover:text-blue-100 px-3 py-2 text-lg font-medium transition-colors duration-200"
                                    style="font-family: 'Kanit', sans-serif;">หน้าแรก</a>
                            </li>
                            <!-- Dropdown บอร์ดเกม -->
                            <li class="dropdown relative group">
                                <button
                                    class="nav-link text-white hover:text-blue-100 px-3 py-2 text-lg font-medium transition-colors duration-200 flex items-center"
                                    style="font-family: 'Kanit', sans-serif;">
                                    บอร์ดเกม
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div
                                    class="dropdown-menu absolute left-0 mt-2 w-48 rounded-xl shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                    <div class="py-2 px-3">
                                        <a href="./playboardgames.php"
                                            class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200"
                                            style="font-family: 'Kanit', sans-serif;">แนะนำบอร์ดเกม</a>
                                        <a href="#"
                                            class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200"
                                            style="font-family: 'Kanit', sans-serif;">วิธีการเล่น</a>

                                    </div>
                                </div>
                            </li>
                            <!-- Dropdown การ์ดเกม -->
                            <li class="dropdown relative group">
                                <button
                                    class="nav-link text-white hover:text-blue-100 px-3 py-2 text-lg font-medium transition-colors duration-200 flex items-center"
                                    style="font-family: 'Kanit', sans-serif;">
                                    การ์ดเกม
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div
                                    class="dropdown-menu absolute left-0 mt-2 w-48 rounded-xl shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                    <div class="py-2 px-3">
                                        <a href="./playcardgames.php"
                                            class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200"
                                            style="font-family: 'Kanit', sans-serif;">แนะนำการ์ดเกม</a>
                                        <a href="./how-to-play-cardgames.php"
                                            class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200"
                                            style="font-family: 'Kanit', sans-serif;">วิธีการเล่น</a>

                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="./articles.php"
                                    class="nav-link text-white hover:text-blue-100 px-3 py-2 text-lg font-medium transition-colors duration-200"
                                    style="font-family: 'Kanit', sans-serif;">บทความ</a>
                            </li>
                            <li>
                                <a href="./about.php"
                                    class="nav-link text-white hover:text-blue-100 px-3 py-2 text-lg font-medium transition-colors duration-200"
                                    style="font-family: 'Kanit', sans-serif;">ติดต่อเรา</a>
                            </li>
                            <!-- ปุ่ม Login -->
                            <?php if (!isset($_SESSION['user_id'])): ?>
                                <li class="ml-4">
                                    <a href="../../login.php"
                                        class="inline-flex items-center px-6 py-2.5 text-blue-600 bg-white rounded-full font-medium shadow-lg hover:bg-blue-50 transition-all duration-200 transform hover:scale-105"
                                        style="font-family: 'Kanit', sans-serif;">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                        </svg>
                                        เข้าสู่ระบบ
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <li class="ml-2">
                                    <a href="../../dashboard.php"
                                        class="inline-flex items-center px-6 py-2.5 text-white bg-blue-600 rounded-full font-medium shadow-lg hover:bg-blue-700 transition-all duration-200 transform hover:scale-105"
                                        style="font-family: 'Kanit', sans-serif;">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                        </svg>
                                        ไปที่แดชบอร์ด
                                    </a>
                                </li>
                                <li>
                                    <a href="../../logout.php"
                                        class="inline-flex items-center px-6 py-2.5 text-blue-600 bg-white rounded-full font-medium shadow-lg hover:bg-blue-50 transition-all duration-200 transform hover:scale-105"
                                        style="font-family: 'Kanit', sans-serif;">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                        </svg>
                                        ออกจากระบบ
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Mobile Menu -->
    <div class="lg:hidden hidden bg-blue-700 mt-8 pt-12" id="mobile-menu">
        <div class="glass-effect px-2 pt-2 pb-3 space-y-1 bg-blue-900">
            <a href="../../index.php"
                class="block px-3 py-2 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors duration-200"
                style="font-family: 'Kanit', sans-serif;">หน้าแรก</a>
            <a href="./playboardgames.php"
                class="block px-3 py-2 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors duration-200"
                style="font-family: 'Kanit', sans-serif;">บอร์ดเกม</a>
            <a href="#"
                class="block px-3 py-2 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors duration-200"
                style="font-family: 'Kanit', sans-serif;">วิธีการเล่นบอร์ดเกม</a>
            <a href="#"
                class="block px-3 py-2 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors duration-200"
                style="font-family: 'Kanit', sans-serif;">รีวิวบอร์ดเกม</a>
            <a href="./playcardgames.php"
                class="block px-3 py-2 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors duration-200"
                style="font-family: 'Kanit', sans-serif;">การ์ดเกม</a>
            <a href="./how-to-play-cardgames.php"
                class="block px-3 py-2 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors duration-200"
                style="font-family: 'Kanit', sans-serif;">วิธีการเล่นการ์ดเกม</a>
            <a href="#"
                class="block px-3 py-2 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors duration-200"
                style="font-family: 'Kanit', sans-serif;">รีวิวการ์ดเกม</a>
            <a href="./articles.php"
                class="block px-3 py-2 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors duration-200"
                style="font-family: 'Kanit', sans-serif;">บทความ</a>
            <a href="./About.php"
                class="block px-3 py-2 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors duration-200"
                style="font-family: 'Kanit', sans-serif;">ติดต่อเรา</a>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="relative pt-32 pb-16 bg-gradient-to-r from-blue-800 to-blue-700">
        <div class="absolute inset-0 bg-pattern opacity-10"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-white mb-4" style="font-family: 'Kanit', sans-serif;">
                    วิธีการเล่นบอร์ดเกม
                </h1>
                <p class="text-xl text-blue-100 max-w-2xl mx-auto" style="font-family: 'Kanit', sans-serif;">
                    เรียนรู้กฎและวิธีการเล่นบอร์ดเกมแต่ละเกมอย่างละเอียด เพื่อความสนุกสนานในการเล่นกับเพื่อนและครอบครัว
                </p>
            </div>
        </div>
    </section>



    <!-- Content Section -->
    <section class="py-16 px-4 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 gap-12">
                <?php
                $stmt = $conn->query("SELECT * FROM how_to_play_boardgames WHERE status = 'published' ORDER BY created_at DESC");
                while ($howToPlay = $stmt->fetch(PDO::FETCH_ASSOC)):
                ?>
                    <article class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:shadow-2xl transition-all duration-500">
                        <div class="flex flex-col lg:flex-row">
                            <!-- รูปภาพด้านซ้าย -->
                            <div class="lg:w-2/5 relative">
                                <img src="<?php echo htmlspecialchars("../../" . $howToPlay['image_url']); ?>"
                                    alt="<?php echo htmlspecialchars($howToPlay['name']); ?>"
                                    class="w-full h-full object-cover object-center min-h-[400px]">
                                <!-- Badges -->
                                <div class="absolute top-4 left-4 flex flex-col gap-2">
                                    <!-- จำนวนผู้เล่น -->
                                    <span class="inline-flex items-center px-4 py-2 rounded-full bg-blue-600 text-white shadow-lg backdrop-blur-sm bg-opacity-90"
                                        style="font-family: 'Kanit', sans-serif;">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                        <?php echo htmlspecialchars($howToPlay['player_min'] . '-' . $howToPlay['player_max']); ?> คน
                                    </span>
                                    <!-- เวลาในการเล่น -->
                                    <span class="inline-flex items-center px-4 py-2 rounded-full bg-green-600 text-white shadow-lg backdrop-blur-sm bg-opacity-90"
                                        style="font-family: 'Kanit', sans-serif;">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <?php echo htmlspecialchars($howToPlay['play_time']); ?> นาที
                                    </span>
                                </div>
                            </div>

                            <!-- เนื้อหาด้านขวา -->
                            <div class="lg:w-3/5 p-8">
                                <div class="flex flex-col h-full">
                                    <div class="mb-6">
                                        <h2 class="text-3xl font-bold mb-4 text-gray-800" style="font-family: 'Kanit', sans-serif;">
                                            <?php echo htmlspecialchars($howToPlay['name']); ?>
                                        </h2>
                                        <!-- หมวดหมู่และความยาก -->
                                        <div class="flex flex-wrap gap-2 mb-4">
                                            <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm"
                                                style="font-family: 'Kanit', sans-serif;">
                                                <?php echo htmlspecialchars($howToPlay['category']); ?>
                                            </span>
                                            <span class="px-3 py-1 bg-purple-100 text-purple-600 rounded-full text-sm"
                                                style="font-family: 'Kanit', sans-serif;">
                                                อายุ <?php echo htmlspecialchars($howToPlay['age_rating']); ?>
                                            </span>
                                        </div>
                                    </div>

                                    <!-- คำอธิบายย่อ -->
                                    <div class="prose prose-lg max-w-none mb-6" style="font-family: 'Kanit', sans-serif;">
                                        <?php
                                        $description = strip_tags($howToPlay['description']);
                                        echo htmlspecialchars($description,);
                                        ?>
                                    </div>

                                    <!-- ปุ่มอ่านเพิ่มเติม -->
                                    <div class="mt-auto">
                                        <button onclick="showFullContent(<?php echo $howToPlay['id']; ?>)"
                                            class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-300"
                                            style="font-family: 'Kanit', sans-serif;">
                                            อ่านวิธีการเล่นทั้งหมด
                                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- Modal สำหรับแสดงเนื้อหาเต็ม -->
    <div id="fullContentModal" class="fixed inset-0 bg-opacity-50 backdrop-blur-sm min-h-screen hidden z-50 overflow-y-auto">
        <div class="min-h-screen px-4 text-center">
            <!-- Background overlay -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Modal content -->
            <div class="inline-block w-full max-w-5xl my-8 text-left align-middle transition-all transform bg-white shadow-2xl rounded-2xl overflow-hidden">
                <!-- Modal header -->
                <div class="relative bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4">
                    <h3 class="text-2xl font-bold text-white" id="modalTitle" style="font-family: 'Kanit', sans-serif;"></h3>
                    <button onclick="closeModal()" class="absolute top-4 right-4 text-white hover:text-blue-200 transition-colors duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-8">
                    <div id="modalContent" class="space-y-6">
                        <!-- Content will be dynamically inserted here -->
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="bg-gray-50 px-6 py-4 flex justify-between items-center border-t border-gray-100">
                    <div class="flex items-center space-x-4">
                        <span id="modalPlayerCount" class="inline-flex items-center px-3 py-1 rounded-full bg-blue-100 text-blue-800 text-sm font-medium">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <span style="font-family: 'Kanit', sans-serif;"></span>
                        </span>
                        <span id="modalPlayTime" class="inline-flex items-center px-3 py-1 rounded-full bg-green-100 text-green-800 text-sm font-medium">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span style="font-family: 'Kanit', sans-serif;"></span>
                        </span>
                        <span id="modalAgeRating" class="inline-flex items-center px-3 py-1 rounded-full bg-purple-100 text-purple-800 text-sm font-medium">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span style="font-family: 'Kanit', sans-serif;"></span>
                        </span>
                    </div>
                    <button onclick="closeModal()"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-300 flex items-center"
                        style="font-family: 'Kanit', sans-serif;">
                        ปิด
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer ที่ปรับปรุงแล้ว -->
    <?php include '../../footer/footer.php'; ?>

    <script>
        // ฟังก์ชันกรองบอร์ดเกม
        function filterBoardgames(difficulty) {
            const articles = document.querySelectorAll('article');
            articles.forEach(article => {
                // ตรวจสอบความยากของเกม (ต้องเพิ่ม data attribute ในแต่ละ article)
                if (difficulty === 'all' || article.dataset.difficulty === difficulty) {
                    article.style.display = 'block';
                    article.classList.add('animate-fade-in');
                } else {
                    article.style.display = 'none';
                }
            });

            // ปรับสถานะปุ่ม
            const buttons = document.querySelectorAll('.filter-btn');
            buttons.forEach(btn => {
                if (btn.textContent.toLowerCase().includes(difficulty)) {
                    btn.classList.remove('bg-white', 'text-gray-700');
                    btn.classList.add('bg-blue-600', 'text-white');
                } else {
                    btn.classList.remove('bg-blue-600', 'text-white');
                    btn.classList.add('bg-white', 'text-gray-700');
                }
            });
        }

        // ฟังก์ชันแสดง Modal
        function showFullContent(id) {
            fetch(`../../actions/get-how-to-play-boardgame.php?id=${id}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('modalTitle').textContent = data.name;
                    document.getElementById('modalContent').innerHTML = `
                        <div class="space-y-8">
                            <!-- รูปภาพ -->
                            <div class="relative rounded-xl overflow-hidden">
                                <img src="../../${data.image_url}" alt="${data.name}" 
                                     class="w-full h-[400px] object-cover">
                                <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-black to-transparent h-32"></div>
                            </div>

                            <!-- คำอธิบาย -->
                            <div class="prose prose-lg max-w-none" style="font-family: 'Kanit', sans-serif;">
                                <h3 class="text-xl font-bold text-gray-800 mb-4">คำอธิบายเกม</h3>
                                ${data.description}
                            </div>

                            <!-- กฎการเล่น -->
                            <div class="prose prose-lg max-w-none bg-blue-50 p-6 rounded-xl" style="font-family: 'Kanit', sans-serif;">
                                <h3 class="text-xl font-bold text-blue-800 mb-4">กฎการเล่น</h3>
                                ${data.rules}
                            </div>
                        </div>
                    `;

                    // อัพเดทข้อมูลในส่วน footer
                    document.querySelector('#modalPlayerCount span').textContent =
                        `${data.player_min}-${data.player_max} คน`;
                    document.querySelector('#modalPlayTime span').textContent =
                        `${data.play_time} นาที`;
                    document.querySelector('#modalAgeRating span').textContent =
                        `อายุ ${data.age_rating}+`;

                    // แสดง Modal พร้อม animation
                    const modal = document.getElementById('fullContentModal');
                    modal.classList.remove('hidden');
                    modal.querySelector('.inline-block').classList.add('animate-modal-in');
                });
        }

        // ฟังก์ชันปิด Modal
        function closeModal() {
            const modal = document.getElementById('fullContentModal');
            modal.querySelector('.inline-block').classList.remove('animate-modal-in');
            modal.classList.add('hidden');
        }

        // Animation styles
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .animate-fade-in {
                animation: fadeIn 0.5s ease-out forwards;
            }
        `;
        document.head.appendChild(style);

        // เพิ่ม animation styles
        const modalStyle = document.createElement('style');
        modalStyle.textContent = `
            @keyframes modalIn {
                from {
                    opacity: 0;
                    transform: scale(0.95) translateY(-20px);
                }
                to {
                    opacity: 1;
                    transform: scale(1) translateY(0);
                }
            }
            .animate-modal-in {
                animation: modalIn 0.3s ease-out forwards;
            }
        `;
        document.head.appendChild(modalStyle);

        // ใช้ Intersection Observer API
        document.addEventListener('DOMContentLoaded', () => {
            const sections = document.querySelectorAll('main > section'); // เลือกทุก section ภายใน main

            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('opacity-100', 'translate-y-0');
                        } else {
                            entry.target.classList.remove('opacity-100', 'translate-y-0');
                        }
                    });
                }, {
                    threshold: 0.2, // แสดงเมื่อ 20% ของ section อยู่ใน viewport
                }
            );

            sections.forEach((section) => observer.observe(section)); // ผูก observer กับแต่ละ section
        });

        // Mobile Menu Toggle
        const mobileMenuButton = document.querySelector('[aria-controls="mobile-menu"]');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', function() {
            const expanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !expanded);
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>

</html>