<?php
session_start();
require_once '../../actions/connection.php';
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บทความ - Board & Card Game</title>
    <link rel="icon" href="https://lh6.googleusercontent.com/proxy/G45tSK1mVgHEM1IED-wutbaE2vQgEep-eXlWkI91sqvppHGHqOoD2SsdY3pbLbG8lyOkKGNCi7__ROzEkmoFKSPUi0uCn7wKANFWJgiLM911IAO5LPhjJ-T6Zelrw3KIQn4BaA">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
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
</head>

<body class="bg-blue-50 font-sans flex flex-col min-h-screen">
    <!-- Navbar ใหม่ -->
    <header class="fixed w-full z-50 transition-all duration-300 bg-gradient-to-r from-blue-800 to-blue-700 shadow-lg "
        id="navbar">
        <nav class="glass-effect border-gray-200 px-4 lg:px-6 py-4">
            <div class="max-w-screen-xl mx-auto">
                <div class="flex flex-wrap justify-between items-center">
                    <!-- Logo -->
                    <a href="../../index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                        <img src="https://lh6.googleusercontent.com/proxy/G45tSK1mVgHEM1IED-wutbaE2vQgEep-eXlWkI91sqvppHGHqOoD2SsdY3pbLbG8lyOkKGNCi7__ROzEkmoFKSPUi0uCn7wKANFWJgiLM911IAO5LPhjJ-T6Zelrw3KIQn4BaA"
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
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div
                                    class="dropdown-menu absolute left-0 mt-2 w-48 rounded-xl shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                    <div class="py-2 px-3">
                                        <a href="./playboardgames.php"
                                            class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200"
                                            style="font-family: 'Kanit', sans-serif;">แนะนำบอร์ดเกม</a>
                                        <a href="./how-to-play-boardgames.php"
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
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
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
                                <a href="#"
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
            <a href="./how-to-play-boardgames.php"
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
            <a href="#"
                class="block px-3 py-2 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors duration-200"
                style="font-family: 'Kanit', sans-serif;">บทความ</a>
            <a href="./about.php"
                class="block px-3 py-2 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors duration-200"
                style="font-family: 'Kanit', sans-serif;">ติดต่อเรา</a>
        </div>
    </div>

    <!-- Main Content -->
    <main class="flex-grow pt-16" id="hero">
        <!-- Hero Section -->
        <section class="bg-gradient-to-b from-blue-800 to-blue-700 text-white py-20">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl md:text-5xl font-bold text-center mb-6" style="font-family: 'Kanit', sans-serif;">
                    บทความทั้งหมด
                </h1>
                <p class="text-xl text-center text-blue-100 max-w-3xl mx-auto"
                    style="font-family: 'Kanit', sans-serif;">
                    รวมบทความน่าสนใจเกี่ยวกับบอร์ดเกมและการ์ดเกม
                </p>
            </div>
        </section>

        <!-- Articles Grid -->
        <section class="py-16">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php
                    // ดึงบทความที่มีสถานะ published
                    $stmt = $conn->query("SELECT * FROM articles WHERE status = 'published' ORDER BY created_at DESC");
                    while ($article = $stmt->fetch(PDO::FETCH_ASSOC)):
                    ?>
                        <article
                            class="group bg-white rounded-2xl shadow-xl overflow-hidden transform hover:-translate-y-2 transition-all duration-500 hover:shadow-2xl">
                            <div class="relative overflow-hidden">
                                <!-- รูปภาพและเอฟเฟกต์ -->
                                <div class="relative h-64 overflow-hidden">
                                    <img src="<?php echo htmlspecialchars("../../" . $article['image_url']); ?>"
                                        alt="<?php echo htmlspecialchars($article['title']); ?>"
                                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent opacity-60 group-hover:opacity-70 transition-opacity duration-300">
                                    </div>
                                </div>

                                <!-- วันที่และหมวดหมู่ -->
                                <div class="absolute bottom-4 left-4 right-4 flex justify-between items-center">
                                    <span class="text-white text-sm px-3 py-1 rounded-full bg-blue-600/80 backdrop-blur-sm"
                                        style="font-family: 'Kanit', sans-serif;">
                                        <?php echo date('d/m/Y', strtotime($article['created_at'])); ?>
                                    </span>
                                    <span class="text-white text-sm px-3 py-1 rounded-full bg-blue-600/80 backdrop-blur-sm"
                                        style="font-family: 'Kanit', sans-serif;">
                                        บทความ
                                    </span>
                                </div>
                            </div>

                            <!-- เนื้อหา -->
                            <div class="p-6">
                                <h2 class="text-xl font-bold text-gray-800 mb-4 group-hover:text-blue-600 transition-colors duration-300"
                                    style="font-family: 'Kanit', sans-serif;">
                                    <?php echo htmlspecialchars($article['title']); ?>
                                </h2>
                                <div class="text-gray-600 mb-6 line-clamp-3" style="font-family: 'Kanit', sans-serif;">
                                    <?php
                                    $content = strip_tags($article['content']);
                                    echo strlen($content) > 150 ? substr($content, 0, 150) . '...' : $content;
                                    ?>
                                </div>

                                <!-- ปุ่มอ่านเพิ่มเติม -->
                                <div class="flex justify-between items-center">
                                    <a href="read-articles.php?id=<?php echo $article['id']; ?>"
                                        class="inline-flex items-center space-x-2 text-blue-600 hover:text-blue-700 transition-colors duration-300 group/btn"
                                        style="font-family: 'Kanit', sans-serif;">
                                        <span>อ่านเพิ่มเติม</span>
                                        <svg class="w-5 h-5 transform group-hover/btn:translate-x-1 transition-transform duration-300"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                        </svg>
                                    </a>
                                    <!-- สถิติการอ่าน (ถ้ามี) -->
                                    <div class="flex items-center space-x-4 text-gray-400">
                                        <span class="flex items-center space-x-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            <span class="text-sm">1.2k</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
    </main>

    <?php include '../../footer/footer.php'; ?>

    <script>
        // Mobile Menu Toggle
        const mobileMenuButton = document.querySelector('[aria-controls="mobile-menu"]');
        const mobileMenu = document.getElementById('mobile-menu');
        const hero = document.getElementById('hero');

        mobileMenuButton.addEventListener('click', function() {
            const expanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !expanded);
            mobileMenu.classList.toggle('hidden');
            hero.classList.toggle('pt-16');
        });
    </script>
</body>

</html>