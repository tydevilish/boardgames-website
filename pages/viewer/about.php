<?php
session_start();
?>
<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>เกี่ยวกับเรา - Board & Card Game</title>
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
  <!-- Navbar -->
  <header class="fixed w-full z-50 transition-all duration-300 bg-gradient-to-r from-blue-800 to-blue-700 shadow-lg"
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
                style="font-family: 'Kanit', sans-serif;">Board Game</span>
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
                <a href="#"
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
      <a href="./articles.php"
        class="block px-3 py-2 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors duration-200"
        style="font-family: 'Kanit', sans-serif;">บทความ</a>
      <a href="#"
        class="block px-3 py-2 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors duration-200"
        style="font-family: 'Kanit', sans-serif;">ติดต่อเรา</a>
    </div>
  </div>

  <!-- Hero Section -->
  <section class="pt-36 pb-20 bg-gradient-to-b from-blue-800 to-blue-700 text-white py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-blue-600 opacity-20 pattern-grid-lg"></div>
    <div class="container mx-auto px-4 relative">
      <div class="text-center max-w-3xl mx-auto">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight"
          style="font-family: 'Kanit', sans-serif;">
          เกี่ยวกับเรา
        </h1>
        <p class="text-xl text-blue-100 leading-relaxed" style="font-family: 'Kanit', sans-serif;">
          ค้นพบโลกแห่งความสนุกและการเรียนรู้ผ่านบอร์ดเกมและการ์ดเกม
        </p>
      </div>
    </div>
    <div class="absolute bottom-0 left-0 right-0">

    </div>
  </section>

  <!-- จุดประสงค์ Section -->
  <section class="pt-20 pb-8 bg-blue-50">
    <div class="container mx-auto px-4 max-w-7xl">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div class="relative">
          <div
            class="absolute inset-0 bg-gradient-to-r from-blue-600 to-blue-400 transform -rotate-6 rounded-2xl opacity-10">
          </div>
          <div class="relative bg-white rounded-2xl p-8 shadow-[0_20px_50px_rgba(8,_112,_184,_0.1)]">
            <h2 class="text-3xl font-bold text-blue-900 mb-6" style="font-family: 'Kanit', sans-serif;">
              จุดประสงค์ของเว็บไซต์
            </h2>
            <p class="text-gray-600 text-lg leading-relaxed mb-6" style="font-family: 'Kanit', sans-serif;">
              เว็บไซต์แนะนำบอร์ดเกมและการ์ดเกมมีประโยชน์มากในการส่งเสริมการเรียนรู้และพัฒนาทักษะในด้านการวิจัยและการวิเคราะห์ข้อมูล
            </p>
            <div class="space-y-4">
              <div class="flex items-start">
                <svg class="w-6 h-6 text-blue-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="ml-4 text-gray-600" style="font-family: 'Kanit', sans-serif;">
                  แหล่งรวมข้อมูลและคำแนะนำเกี่ยวกับเกมที่น่าสนใจ
                </p>
              </div>
              <div class="flex items-start">
                <svg class="w-6 h-6 text-blue-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="ml-4 text-gray-600" style="font-family: 'Kanit', sans-serif;">
                  ช่วยให้ผู้เล่นเข้าใจกฎและวิธีการเล่นได้ง่ายขึ้น
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="grid grid-cols-2 gap-6 scale-100 lg:scale-125 lg:ml-10">
          <div class="transform hover:-translate-y-2 transition-transform duration-300">
            <img src="../../img/IMG_0627_scaled.jpg" alt="Board Game" class="rounded-lg shadow-lg">
          </div>
          <div class="transform hover:-translate-y-2 transition-transform duration-300 mt-12">
            <img src="../../img/images.jpg" alt="Card Game" class="rounded-lg shadow-lg">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Team Section -->
  <section class="py-20 bg-white relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-blue-50 to-transparent"></div>
    <div class="container mx-auto px-4 relative">
      <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-blue-900 mb-4" style="font-family: 'Kanit', sans-serif;">
          ทีมผู้พัฒนา
        </h2>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto" style="font-family: 'Kanit', sans-serif;">
          พบกับทีมงานที่อยู่เบื้องหลังความสำเร็จของเรา
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-12 max-w-6xl mx-auto">
        <!-- Team Member Cards -->
        <div class="group">
          <div
            class="relative overflow-hidden rounded-2xl shadow-lg transform hover:-translate-y-2 transition-all duration-300">
            <div
              class="absolute inset-0 bg-gradient-to-t from-blue-900 to-transparent opacity-0 group-hover:opacity-70 transition-opacity duration-300">
            </div>
            <img src="../../img/โฟน.jpeg" class="w-full h-80 object-cover" alt="ธนากร">
            <div
              class="absolute bottom-0 left-0 right-0 p-6 transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
              <h3 class="text-2xl font-bold text-white mb-2" style="font-family: 'Kanit', sans-serif;">
                นายธนากร สุนโท
              </h3>
              <p class="text-blue-200 text-lg" style="font-family: 'Kanit', sans-serif;">Web Developer</p>
            </div>
          </div>
        </div>

        <div class="group">
          <div
            class="relative overflow-hidden rounded-2xl shadow-lg transform hover:-translate-y-2 transition-all duration-300">
            <div
              class="absolute inset-0 bg-gradient-to-t from-blue-900 to-transparent opacity-0 group-hover:opacity-70 transition-opacity duration-300">
            </div>
            <img src="../../img/ทอย.jpeg" class="w-full h-80 object-cover" alt="ธิติพล">
            <div
              class="absolute bottom-0 left-0 right-0 p-6 transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
              <h3 class="text-2xl font-bold text-white mb-2" style="font-family: 'Kanit', sans-serif;">
                นายธิติพล บุญอมฤตสกุล
              </h3>
              <p class="text-blue-200 text-lg" style="font-family: 'Kanit', sans-serif;">Backend Developer</p>
            </div>
          </div>
        </div>

        <div class="group">
          <div
            class="relative overflow-hidden rounded-2xl shadow-lg transform hover:-translate-y-2 transition-all duration-300">
            <div
              class="absolute inset-0 bg-gradient-to-t from-blue-900 to-transparent opacity-0 group-hover:opacity-70 transition-opacity duration-300">
            </div>
            <img src="../../img/เกม.jpeg" class="w-full h-80 object-cover" alt="ชวนากร">
            <div
              class="absolute bottom-0 left-0 right-0 p-6 transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
              <h3 class="text-2xl font-bold text-white mb-2" style="font-family: 'Kanit', sans-serif;">
                นายชวนากร ไชยวงค์
              </h3>
              <p class="text-blue-200 text-lg" style="font-family: 'Kanit', sans-serif;">Frontend Developer</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include '../../footer/footer.php'; ?>

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
  </script>
</body>

</html>