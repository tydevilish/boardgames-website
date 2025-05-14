<?php
session_start();
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ - Board & Card Game</title>
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

        /* Success Animation */
        .success-animation {
            position: relative;
            height: 100px;
        }

        .success-circle {
            width: 80px;
            height: 80px;
            background: #4CAF50;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: circle-appear 0.3s ease-in-out;
        }

        .success-tick {
            width: 40px;
            height: 20px;
            border-left: 4px solid white;
            border-bottom: 4px solid white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            animation: tick-appear 0.3s ease-in-out 0.3s forwards;
            opacity: 0;
        }

        /* Error Animation */
        .error-animation {
            position: relative;
            height: 100px;
        }

        .error-circle {
            width: 80px;
            height: 80px;
            background: #FF5252;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: circle-appear 0.3s ease-in-out;
        }

        .error-cross {
            width: 40px;
            height: 40px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .error-cross::before,
        .error-cross::after {
            content: '';
            position: absolute;
            width: 4px;
            height: 40px;
            background: white;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        .error-cross::before {
            transform: translateX(-50%) rotate(45deg);
        }

        .error-cross::after {
            transform: translateX(-50%) rotate(-45deg);
        }

        @keyframes circle-appear {
            from {
                transform: translate(-50%, -50%) scale(0);
            }

            to {
                transform: translate(-50%, -50%) scale(1);
            }
        }

        @keyframes tick-appear {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body class="bg-blue-50 font-sans flex flex-col min-h-screen">
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
                                <a href="index.php"
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
                                        <a href="./pages/viewer/playboardgames.php"
                                            class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200"
                                            style="font-family: 'Kanit', sans-serif;">แนะนำบอร์ดเกม</a>
                                        <a href="./pages/viewer/how-to-play-boardgames.php"
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
                                        <a href="./pages/viewer/playcardgames.php"
                                            class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200"
                                            style="font-family: 'Kanit', sans-serif;">แนะนำการ์ดเกม</a>
                                        <a href="./pages/viewer/how-to-play-cardgames.php"
                                            class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200"
                                            style="font-family: 'Kanit', sans-serif;">วิธีการเล่น</a>

                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="./pages/viewer/articles.php"
                                    class="nav-link text-white hover:text-blue-100 px-3 py-2 text-lg font-medium transition-colors duration-200"
                                    style="font-family: 'Kanit', sans-serif;">บทความ</a>
                            </li>
                            <li>
                                <a href="./pages/viewer/about.php"
                                    class="nav-link text-white hover:text-blue-100 px-3 py-2 text-lg font-medium transition-colors duration-200"
                                    style="font-family: 'Kanit', sans-serif;">ติดต่อเรา</a>
                            </li>
                            <!-- ปุ่ม Login -->
                            <li class="ml-4">
                                <a href="#"
                                    class="inline-flex items-center px-6 py-2.5 text-blue-600 bg-white rounded-full font-medium shadow-lg hover:bg-blue-50 transition-all duration-200 transform hover:scale-105"
                                    style="font-family: 'Kanit', sans-serif;">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                    </svg>
                                    เข้าสู่ระบบ
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

<!-- Mobile Menu -->
<div class="lg:hidden hidden bg-blue-700 mt-8 pt-12" id="mobile-menu">
    <div class="glass-effect px-2 pt-2 pb-3 space-y-1 bg-blue-900">
      <a href="./index.php"
        class="block px-3 py-2 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors duration-200"
        style="font-family: 'Kanit', sans-serif;">หน้าแรก</a>
      <a href="./pages/viewer/playboardgames.php"
        class="block px-3 py-2 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors duration-200"
        style="font-family: 'Kanit', sans-serif;">บอร์ดเกม</a>
        <a href="./pages/viewer/how-to-play-boardgames.php"
        class="block px-3 py-2 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors duration-200"
        style="font-family: 'Kanit', sans-serif;">วิธีการเล่นบอร์ดเกม</a>
        <a href="#"
        class="block px-3 py-2 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors duration-200"
        style="font-family: 'Kanit', sans-serif;">รีวิวบอร์ดเกม</a>
      <a href="./pages/viewer/playcardgames.php"
        class="block px-3 py-2 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors duration-200"
        style="font-family: 'Kanit', sans-serif;">การ์ดเกม</a>
        <a href="./pages/viewer/how-to-play-cardgames.php"
        class="block px-3 py-2 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors duration-200"
        style="font-family: 'Kanit', sans-serif;">วิธีการเล่นการ์ดเกม</a>
      <a href="#"
        class="block px-3 py-2 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors duration-200"
        style="font-family: 'Kanit', sans-serif;">รีวิวการ์ดเกม</a>
      <a href="./pages/viewer/articles.php"
        class="block px-3 py-2 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors duration-200"
        style="font-family: 'Kanit', sans-serif;">บทความ</a>
      <a href="./pages/viewer/About.php"
        class="block px-3 py-2 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors duration-200"
        style="font-family: 'Kanit', sans-serif;">ติดต่อเรา</a>
    </div>
  </div>

    <!-- Login Section -->
    <section class="flex-grow flex items-center justify-center px-4 py-32">
        <div class="max-w-md w-full">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-500 px-8 py-6">
                    <h2 class="text-2xl font-bold text-white text-center" style="font-family: 'Kanit', sans-serif;">
                        เข้าสู่ระบบ
                    </h2>
                </div>

                <!-- Login Form -->
                <div class="p-8">
                    <form action="./actions/login.php" method="POST">
                        <!-- Email Input -->
                        <div class="mb-6">
                            <label for="username" class="block text-gray-700 text-sm font-medium mb-2"
                                style="font-family: 'Kanit', sans-serif;">
                                ชื่อผู้ใช้
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>
                                <input id="username" name="username" type="text" required
                                    class="pl-10 w-full border-2 border-gray-200 rounded-lg py-2 px-3 focus:outline-none focus:border-blue-500 transition-colors"
                                    placeholder="Username">
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div class="mb-6">
                            <label for="password" class="block text-gray-700 text-sm font-medium mb-2"
                                style="font-family: 'Kanit', sans-serif;">
                                รหัสผ่าน
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input id="password" name="password" type="password" required
                                    class="pl-10 w-full border-2 border-gray-200 rounded-lg py-2 px-3 focus:outline-none focus:border-blue-500 transition-colors"
                                    placeholder="••••••••">
                            </div>
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center">
                                <input id="remember" type="checkbox"
                                    class="h-4 w-4 text-blue-600 rounded border-gray-300" checked>
                                <label for="remember" class="ml-2 text-sm text-gray-600"
                                    style="font-family: 'Kanit', sans-serif;">
                                    จดจำฉัน
                                </label>
                            </div>
                            <a href="#" class="text-sm text-blue-600 hover:text-blue-800 transition-colors"
                                style="font-family: 'Kanit', sans-serif;">
                                ลืมรหัสผ่าน?
                            </a>
                        </div>

                        <!-- Login Button -->
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-blue-600 to-blue-500 text-white font-bold py-3 px-4 rounded-lg hover:from-blue-700 hover:to-blue-600 transition-all duration-300 transform hover:scale-[1.02]"
                            style="font-family: 'Kanit', sans-serif;">
                            เข้าสู่ระบบ
                        </button>
                    </form>

                    <!-- Register Link -->
                </div>
            </div>
        </div>
    </section>

    <!-- เพิ่ม Modal ต่อจาก Login Section -->
    <!-- Success Modal -->
    <div id="successModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black bg-opacity-50 backdrop-blur-sm transition-opacity duration-300"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <div class="bg-white rounded-2xl shadow-2xl p-8 w-96 transform transition-all duration-300 scale-0"
                id="successModalContent">
                <div class="text-center">
                    <!-- Success Animation -->
                    <div class="success-animation mb-6">
                        <div class="success-circle">
                            <div class="success-tick"></div>
                        </div>
                    </div>

                    <h3 class="text-2xl font-bold text-gray-800 mb-4" style="font-family: 'Kanit', sans-serif;">
                        เข้าสู่ระบบสำเร็จ
                    </h3>
                    <p class="text-gray-600 mb-8" style="font-family: 'Kanit', sans-serif;">
                        ยินดีต้อนรับกลับมา คุณ <span class="font-semibold text-green-600" id="welcomeUsername"></span>
                    </p>
                    <button onclick="handleSuccessModalClose()" class="w-full bg-gradient-to-r from-green-600 to-green-500 text-white rounded-xl px-6 py-3 
                                   font-medium transform hover:scale-105 transition-all duration-300 hover:shadow-lg"
                        style="font-family: 'Kanit', sans-serif;">
                        เริ่มต้นใช้งาน
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Error Modal -->
    <div id="errorModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black bg-opacity-50 backdrop-blur-sm transition-opacity duration-300"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <div class="bg-white rounded-2xl shadow-2xl p-8 w-96 transform transition-all duration-300 scale-0"
                id="errorModalContent">
                <div class="text-center">
                    <!-- Error Animation -->
                    <div class="error-animation mb-6">
                        <div class="error-circle">
                            <div class="error-cross"></div>
                        </div>
                    </div>

                    <h3 class="text-2xl font-bold text-gray-800 mb-4" style="font-family: 'Kanit', sans-serif;">
                        เข้าสู่ระบบไม่สำเร็จ
                    </h3>
                    <p class="text-gray-600 mb-8" style="font-family: 'Kanit', sans-serif;">
                        ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง
                    </p>
                    <button onclick="closeModal('errorModal')" class="w-full bg-gradient-to-r from-red-600 to-red-500 text-white rounded-xl px-6 py-3 
                                   font-medium transform hover:scale-105 transition-all duration-300 hover:shadow-lg"
                        style="font-family: 'Kanit', sans-serif;">
                        ลองใหม่อีกครั้ง
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer ที่ปรับปรุงแล้ว -->
    <?php include './footer/footer.php'; ?>

    <script>
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
                },
                {
                    threshold: 0.2, // แสดงเมื่อ 20% ของ section อยู่ใน viewport
                }
            );

            sections.forEach((section) => observer.observe(section)); // ผูก observer กับแต่ละ section
        });

        // Mobile Menu Toggle
        const mobileMenuButton = document.querySelector('[aria-controls="mobile-menu"]');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', function () {
            const expanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !expanded);
            mobileMenu.classList.toggle('hidden');
        });

        // ฟังก์ชันสำหรับแสดง Modal
        function showModal(modalId) {
            const modal = document.getElementById(modalId);
            const modalContent = document.getElementById(modalId + 'Content');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modalContent.classList.remove('scale-0');
                modalContent.classList.add('scale-100');
            }, 10);
        }

        // ฟังก์ชันสำหรับซ่อน Modal
        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            const modalContent = document.getElementById(modalId + 'Content');
            modalContent.classList.remove('scale-100');
            modalContent.classList.add('scale-0');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        function handleSuccessModalClose() {
            closeModal('successModal');
            window.location.href = 'dashboard.php';
        }

        document.addEventListener('DOMContentLoaded', () => {
            const urlParams = new URLSearchParams(window.location.search);
            const error = urlParams.get('error');
            const loginSuccess = urlParams.get('login');

            if (error === 'invalid') {
                showModal('errorModal');
            } else if (loginSuccess === 'success') {
                // Set username in modal if available
                const username = '<?php echo isset($_SESSION["username"]) ? $_SESSION["username"] : ""; ?>';
                if (username) {
                    document.getElementById('welcomeUsername').textContent = username;
                }
                showModal('successModal');
            }
        });
    </script>
</body>

</html>