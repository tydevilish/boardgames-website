<?php
session_start();
require_once '../../actions/connection.php';
?>
<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="src/output.css">
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  <title>แนะนำบอร์ดเกม - Board & Card Game</title>
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
                    <a href="#"
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
  <style>
    body {
      font-family: "Kanit", sans-serif;
    }
  </style>

  <!-- Mobile Menu -->
  <div class="lg:hidden hidden bg-blue-700 mt-8 pt-12" id="mobile-menu">
    <div class="glass-effect px-2 pt-2 pb-3 space-y-1 bg-blue-900">
      <a href="../../index.php"
        class="block px-3 py-2 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors duration-200"
        style="font-family: 'Kanit', sans-serif;">หน้าแรก</a>
      <a href="#"
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
      <a href="./about.php"
        class="block px-3 py-2 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors duration-200"
        style="font-family: 'Kanit', sans-serif;">ติดต่อเรา</a>
    </div>
  </div>

  <!-- เนื้อหา -->
  <section class="py-24 px-4 mt-16">
    <div class="max-w-7xl mx-auto">
      <!-- Filters -->
      <div class="mb-12 flex flex-wrap gap-4">
        <button onclick="filterBoardgames('all')"
          class="filter-btn px-6 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-colors duration-300"
          data-filter="all"
          style="font-family: 'Kanit', sans-serif;">
          ทั้งหมด
        </button>
        <button onclick="filterBoardgames('2-4')"
          class="filter-btn px-6 py-2 bg-white text-gray-700 rounded-full hover:bg-blue-50 transition-colors duration-300"
          data-filter="2-4"
          style="font-family: 'Kanit', sans-serif;">
          2-4 ผู้เล่น
        </button>
        <button onclick="filterBoardgames('4-6')"
          class="filter-btn px-6 py-2 bg-white text-gray-700 rounded-full hover:bg-blue-50 transition-colors duration-300"
          data-filter="4-6"
          style="font-family: 'Kanit', sans-serif;">
          4-6 ผู้เล่น
        </button>
        <button onclick="filterBoardgames('6+')"
          class="filter-btn px-6 py-2 bg-white text-gray-700 rounded-full hover:bg-blue-50 transition-colors duration-300"
          data-filter="6+"
          style="font-family: 'Kanit', sans-serif;">
          6+ ผู้เล่น
        </button>
      </div>

      <!-- Boardgames Grid -->
      <div class="grid grid-cols-1 gap-12">
        <?php
        $stmt = $conn->query("SELECT * FROM boardgames WHERE status = 'published' ORDER BY created_at DESC");
        while ($boardgame = $stmt->fetch(PDO::FETCH_ASSOC)):
          // แปลงข้อมูลจำนวนผู้เล่นเป็นคลาส
          $player_count = $boardgame['player_count'];
          $player_class = '';
          if (preg_match('/^[2-4]/', $player_count)) {
            $player_class = 'players-2-4';
          } elseif (preg_match('/^[4-6]/', $player_count)) {
            $player_class = 'players-4-6';
          } elseif (preg_match('/^[6-9]|^[1-9][0-9]/', $player_count)) {
            $player_class = 'players-6-plus';
          }
        ?>
          <div class="boardgame-item <?php echo $player_class; ?> bg-white rounded-2xl shadow-xl overflow-hidden transform hover:shadow-2xl transition-all duration-500">
            <div class="flex flex-col lg:flex-row">
              <!-- รูปภาพด้านซ้าย -->
              <div class="lg:w-1/3 relative">
                <img src="<?php echo htmlspecialchars("../../" . $boardgame['image_url']); ?>"
                  alt="<?php echo htmlspecialchars($boardgame['title']); ?>"
                  class="w-full h-full object-cover object-center min-h-[300px]">
                <!-- จำนวนผู้เล่น Badge -->
                <div class="absolute top-4 left-4">
                  <span class="inline-flex items-center px-4 py-2 rounded-full bg-blue-600 text-white shadow-lg"
                    style="font-family: 'Kanit', sans-serif;">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <?php echo htmlspecialchars($boardgame['player_count']); ?> คน
                  </span>
                </div>
              </div>

              <!-- เนื้อหาด้านขวา -->
              <div class="lg:w-2/3 p-8">
                <div class="flex flex-col h-full">
                  <h2 class="text-3xl font-bold mb-4 text-gray-800" style="font-family: 'Kanit', sans-serif;">
                    <?php echo htmlspecialchars($boardgame['title']); ?>
                  </h2>

                  <!-- Tags/Categories -->
                  <div class="flex flex-wrap gap-2 mb-6">
                    <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm"
                      style="font-family: 'Kanit', sans-serif;">บอร์ดเกม</span>
                    <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm"
                      style="font-family: 'Kanit', sans-serif;">แนะนำ</span>
                  </div>

                  <!-- Description -->
                  <div class="prose prose-lg max-w-none mb-6" style="font-family: 'Kanit', sans-serif;">
                    <?php echo $boardgame['description']; ?>
                  </div>

                  <!-- Additional Info -->
                  <div class="mt-auto">
                    <div class="flex flex-wrap gap-6 text-gray-600">
                      <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span style="font-family: 'Kanit', sans-serif;">เวลาในการเล่น: <?php echo htmlspecialchars($boardgame['play_time']); ?></span>
                      </div>
                      <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span style="font-family: 'Kanit', sans-serif;">ความยาก:
                          <?php
                          $difficulty_text = [
                            'easy' => 'ง่าย',
                            'medium' => 'ปานกลาง',
                            'hard' => 'ยาก'
                          ];
                          echo $difficulty_text[$boardgame['difficulty']] ?? 'ไม่ระบุ';
                          ?>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </section>

  <!-- Footer ที่ปรับปรุงแล้ว -->
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
        }, {
          threshold: 0.2, // แสดงเมื่อ 20% ของ section อยู่ใน viewport
        }
      );

      sections.forEach((section) => observer.observe(section)); // ผูก observer กับแต่ละ section
    });

    // เพิ่ม Script สำหรับ Filter
    function filterBoardgames(filter) {
      // ปรับสถานะปุ่ม
      const buttons = document.querySelectorAll('.filter-btn');
      buttons.forEach(btn => {
        if (btn.dataset.filter === filter) {
          btn.classList.remove('bg-white', 'text-gray-700');
          btn.classList.add('bg-blue-600', 'text-white');
        } else {
          btn.classList.remove('bg-blue-600', 'text-white');
          btn.classList.add('bg-white', 'text-gray-700');
        }
      });

      // แสดง/ซ่อนบอร์ดเกม
      const items = document.querySelectorAll('.boardgame-item');
      items.forEach(item => {
        if (filter === 'all') {
          item.style.display = 'block';
        } else if (filter === '2-4' && item.classList.contains('players-2-4')) {
          item.style.display = 'block';
        } else if (filter === '4-6' && item.classList.contains('players-4-6')) {
          item.style.display = 'block';
        } else if (filter === '6+' && item.classList.contains('players-6-plus')) {
          item.style.display = 'block';
        } else {
          item.style.display = 'none';
        }
      });

      // เพิ่ม Animation
      items.forEach(item => {
        if (item.style.display === 'block') {
          item.classList.add('animate-fade-in');
          setTimeout(() => {
            item.classList.remove('animate-fade-in');
          }, 500);
        }
      });
    }

    // เพิ่ม Style สำหรับ Animation
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

    // เริ่มต้นแสดงทั้งหมด
    document.addEventListener('DOMContentLoaded', () => {
      filterBoardgames('all');
    });


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