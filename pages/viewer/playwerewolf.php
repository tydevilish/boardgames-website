<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/output.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>แนะนำบอร์ดเกมและการ์ดเกมที่น่าเล่นกับเพื่อน</title>
</head>
<body class="bg-gray-100 font-sans flex flex-col min-h-screen">
    <!-- navbar -->
    <header class="bg- Black">
      <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
          <a href="#" class="-m-1.5 p-1.5">
            <span class="sr-only">หน้าแรก</span>
          </a>
        </div>
        <div class="flex lg:hidden">
          <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
            <span class="sr-only">Open main menu</span>
            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
          </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
          <div class="relative">
            <a href="../../index.php" type="button" class="flex items-center gap-x-1 text-sm/6 font-semibold text-gray-900" aria-expanded="false">
              หน้าแรก
            </a>
          </div>
    
          <a href="../../index.php" class="text-sm/6 font-semibold text-gray-900"></a>
          <header class="custom-navbar">
            <!-- Content ของ Navbar -->
          </header>
        </div>
      </nav>
    </header>
    <!-- end navbar -->
     <!-- เริ่ม -->
    <section class="bg-white shadow-lg rounded-lg overflow-hidden mb-10 opacity-0 transform translate-y-10 transition-all duration-700">
        <div class="p-6">
          <h2 class="text-3xl font-semibold text-gray-800" style="font-family: 'Kanit', sans-serif;">
             บอร์ดเกมหมาป่า
          </h2>
        </div>
        <div class="flex justify-center">
          <img 
            src="https://www.online-station.net/wp-content/uploads/2023/06/werewolf.jpg" 
            alt="บอร์ดเกมหมาป่า" 
            class="w-full max-w-lg object-cover rounded-lg shadow-md">
        </div>
        <div class="p-6">
          <p class="text-lg text-gray-700 leading-relaxed" style="font-family: 'Kanit', sans-serif;">
            เป็นบอร์ดเกมแนวปาร์ตี้ที่สนุกและเต็มไปด้วยกลยุทธ์ ซึ่งมีจุดเด่นที่เกมแต่ละรอบจะจบอย่างรวดเร็ว (ประมาณ 10-15 นาที) โดยผู้เล่นจะได้รับบทบาทลับเฉพาะที่มีผลต่อเกม เช่น หมาป่า, ชาวบ้าน, หรือบทบาทพิเศษอื่น ๆ ที่มีความสามารถแตกต่างกันไป
          </p>
        </div>
        <div class="flex justify-center mb-5">
          <a href="pages/viewer/playwerewolf.php" type="button" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
            ดูวิธีการเล่นเพิ่มเติม
          </a>
        </div>
      </section>