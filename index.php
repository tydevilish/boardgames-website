<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="src/output.css">
  <link rel="icon" href="https://lh6.googleusercontent.com/proxy/G45tSK1mVgHEM1IED-wutbaE2vQgEep-eXlWkI91sqvppHGHqOoD2SsdY3pbLbG8lyOkKGNCi7__ROzEkmoFKSPUi0uCn7wKANFWJgiLM911IAO5LPhjJ-T6Zelrw3KIQn4BaA">
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  <title>แนะนำบอร์ดเกมและการ์ดเกม - Board & Card Game</title>
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
                <a href="#"
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
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
              <?php if (!isset($_SESSION['user_id'])): ?>
                <li class="ml-4">
                  <a href="login.php"
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
                  <a href="dashboard.php"
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
                  <a href="logout.php"
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
      <a href="#"
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

  <!-- เริ่ม Hero Section -->
  <section class="bg-center bg-no-repeat bg-cover bg-[url('https://www.online-station.net/wp-content/uploads/2023/06/Board-game-cover.jpg')] 
        bg-gray-500 bg-blend-multiply min-h-screen flex items-center relative">
    <!-- เพิ่ม Overlay -->


    <div class="container mx-auto px-4 relative z-10">
      <div class="max-w-3xl">
        <h1
          class="mb-6 text-5xl font-extrabold tracking-tight leading-none text-white md:text-6xl lg:text-7xl animate-fade-in"
          style="font-family: 'Kanit', sans-serif; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">
          เริ่มต้นการผจญภัย<br>ในโลกของเกม
        </h1>
        <p class="mb-8 text-xl font-normal text-blue-100 lg:text-2xl animate-slide-up max-w-2xl"
          style="font-family: 'Kanit', sans-serif;">
          ค้นพบประสบการณ์ใหม่ๆ ผ่านการเล่นบอร์ดเกมและการ์ดเกม พร้อมคำแนะนำที่จะช่วยให้คุณเลือกเกมที่ใช่สำหรับทุกโอกาส
        </p>
        <div class="flex flex-wrap gap-4">
          <button
            class="px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white text-lg font-bold rounded-full transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-xl shadow-lg inline-flex items-center space-x-2">
            <a href="#information" style="font-family: 'Kanit', sans-serif;">เริ่มต้นเลย</a>
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
            </svg>
          </button>
          <button
            class="px-8 py-4 bg-white/10 backdrop-blur-sm hover:bg-white/20 text-white text-lg font-bold rounded-full transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-xl shadow-lg inline-flex items-center space-x-2">
            <a href="./pages/viewer/how-to-play-boardgames.php" style="font-family: 'Kanit', sans-serif;">ดูวิธีการเล่น</a>
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- แนะนำ Section -->
  <section class="bg-gradient-to-b from-blue-50 to-white py-10" id="information">
    <div class="container mx-auto px-4">
      <!-- เพิ่ม Header Section -->
      <div class="text-center mb-10">
        <div class="w-80 h-1 bg-gradient-to-r from-blue-600 to-blue-400 mx-auto rounded-full mb-4"></div>
      </div>

      <div class="grid md:grid-cols-2 gap-16">
        <!-- บอร์ดเกม Card -->
        <div class="group bg-white border-0 rounded-2xl p-8 md:p-12 
                    shadow-[0_20px_50px_rgba(8,_112,_184,_0.1)] 
                    hover:shadow-[0_20px_50px_rgba(8,_112,_184,_0.4)] 
                    transition-all duration-500 hover:-translate-y-2">
          <div class="flex items-center mb-6">
            <div class="bg-gradient-to-r from-blue-600 to-blue-400 p-4 rounded-xl
                            group-hover:scale-110 transition-transform duration-300">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
              </svg>
            </div>
            <h2
              class="text-blue-900 text-3xl font-extrabold ml-4 group-hover:text-blue-600 transition-colors duration-300"
              style="font-family: 'Kanit', sans-serif;">บอร์ดเกม</h2>
          </div>
          <p class="text-lg text-gray-600 mb-6 leading-relaxed" style="font-family: 'Kanit', sans-serif;">
            เกมที่เล่นบนกระดานหรือพื้นผิวที่ออกแบบมาเฉพาะ โดยมีองค์ประกอบต่าง ๆ เช่น ตัวหมาก ลูกเต๋า การ์ด
            และอุปกรณ์อื่น ๆ ที่ใช้ในการเล่น กฎของเกมมักกำหนดให้ผู้เล่นต้องใช้กลยุทธ์ การคิดวิเคราะห์
            หรืออาศัยโชคเพื่อเอาชนะคู่แข่งหรือบรรลุเป้าหมายของเกม
          </p>
          <a href="pages/viewer/playboardgames.php" class="inline-flex items-center px-6 py-3 bg-blue-50 rounded-full
                       text-blue-600 hover:text-blue-700 font-medium text-lg 
                       transition-all duration-300 hover:bg-blue-100 group-hover:translate-x-2">
            <span style="font-family: 'Kanit', sans-serif;">ข้อมูลที่แนะนำ</span>
            <svg class="w-5 h-5 ml-2 transition-transform duration-300 group-hover:translate-x-1" fill="none"
              stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
          </a>
        </div>

        <!-- การ์ดเกม Card -->
        <div class="group bg-white border-0 rounded-2xl p-8 md:p-12 
                    shadow-[0_20px_50px_rgba(8,_112,_184,_0.1)] 
                    hover:shadow-[0_20px_50px_rgba(8,_112,_184,_0.4)] 
                    transition-all duration-500 hover:-translate-y-2">
          <div class="flex items-center mb-6">
            <div class="bg-gradient-to-r from-blue-600 to-blue-400 p-4 rounded-xl
                            group-hover:scale-110 transition-transform duration-300">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
              </svg>
            </div>
            <h2
              class="text-blue-900 text-3xl font-extrabold ml-4 group-hover:text-blue-600 transition-colors duration-300"
              style="font-family: 'Kanit', sans-serif;">การ์ดเกม</h2>
          </div>
          <p class="text-lg text-gray-600 mb-6 leading-relaxed" style="font-family: 'Kanit', sans-serif;">
            เกมที่ใช้ไพ่หรือการ์ดเป็นองค์ประกอบหลักในการเล่น โดยมีกฎกติกาเฉพาะตัวที่กำหนดวิธีการเล่น การใช้ไพ่
            และเงื่อนไขการชนะ แต่ละเกมอาจต้องใช้ทักษะการวางแผน การคำนวณ การตัดสินใจ หรืออาศัยโชค
          </p>
          <a href="pages/viewer/playcardgames.php" class="inline-flex items-center px-6 py-3 bg-blue-50 rounded-full
                       text-blue-600 hover:text-blue-700 font-medium text-lg 
                       transition-all duration-300 hover:bg-blue-100 group-hover:translate-x-2">
            <span style="font-family: 'Kanit', sans-serif;">ข้อมูลที่แนะนำ</span>
            <svg class="w-5 h-5 ml-2 transition-transform duration-300 group-hover:translate-x-1" fill="none"
              stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
          </a>
        </div>
      </div>
    </div>

  </section>



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
  </script>
</body>

</html>