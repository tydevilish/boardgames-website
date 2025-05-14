<?php
session_start();
require_once '../../actions/connection.php';

// ตรวจสอบว่ามี id ถูกส่งมาหรือไม่
if (!isset($_GET['id'])) {
    header('Location: articles.php');
    exit();
}

// ดึงข้อมูลบทความ
try {
    $stmt = $conn->prepare("SELECT * FROM articles WHERE id = :id AND status = 'published'");
    $stmt->execute([':id' => $_GET['id']]);
    $article = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$article) {
        header('Location: articles.php');
        exit();
    }
} catch (PDOException $e) {
    error_log("Error fetching article: " . $e->getMessage());
    header('Location: articles.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($article['title']); ?> - Board & Card Game</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="https://lh6.googleusercontent.com/proxy/G45tSK1mVgHEM1IED-wutbaE2vQgEep-eXlWkI91sqvppHGHqOoD2SsdY3pbLbG8lyOkKGNCi7__ROzEkmoFKSPUi0uCn7wKANFWJgiLM911IAO5LPhjJ-T6Zelrw3KIQn4BaA">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body class="bg-gray-50">
    <!-- Hero Section with Article Image -->
    <div class="relative h-[60vh] min-h-[400px] w-full">
        <img src="<?php echo htmlspecialchars("../../" . $article['image_url']); ?>"
            alt="<?php echo htmlspecialchars($article['title']); ?>" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-black/30"></div>

        <!-- Back Button -->
        <a href="articles.php"
            class="absolute top-8 left-8 text-white flex items-center space-x-2 hover:text-blue-200 transition-colors duration-300"
            style="font-family: 'Kanit', sans-serif;">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            <span>กลับไปหน้าบทความ</span>
        </a>

        <!-- Article Title -->
        <div class="absolute bottom-0 left-0 right-0 p-8 md:p-16">
            <div class="max-w-4xl mx-auto">
                <div class="flex items-center space-x-4 text-white/80 mb-4">
                    <span class="flex items-center space-x-2" style="font-family: 'Kanit', sans-serif;">
                        <i class="ri-calendar-line"></i>
                        <span><?php echo date('d/m/Y', strtotime($article['created_at'])); ?></span>
                    </span>
                    <span class="flex items-center space-x-2" style="font-family: 'Kanit', sans-serif;">
                        <i class="ri-eye-line"></i>
                        <span>1.2k views</span>
                    </span>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4" style="font-family: 'Kanit', sans-serif;">
                    <?php echo htmlspecialchars($article['title']); ?>
                </h1>
            </div>
        </div>
    </div>

    <!-- Article Content -->
    <main class="max-w-4xl mx-auto px-4 py-12">
        <article class="bg-white rounded-2xl shadow-xl p-8 md:p-12">
            <div class="prose prose-lg max-w-none" style="font-family: 'Kanit', sans-serif;">
                <?php echo $article['content']; ?>
            </div>

            <!-- Share Buttons -->
            <div class="mt-12 pt-8 border-t">
                <h3 class="text-lg font-semibold mb-4" style="font-family: 'Kanit', sans-serif;">แชร์บทความนี้</h3>
                <div class="flex space-x-4">
                    <button
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center space-x-2 hover:bg-blue-700 transition-colors duration-300"
                        onclick="shareOnFacebook()">
                        <i class="ri-facebook-fill"></i>
                        <span style="font-family: 'Kanit', sans-serif;">Facebook</span>
                    </button>
                    <button
                        class="bg-blue-400 text-white px-4 py-2 rounded-lg flex items-center space-x-2 hover:bg-blue-500 transition-colors duration-300"
                        onclick="shareOnTwitter()">
                        <i class="ri-twitter-fill"></i>
                        <span style="font-family: 'Kanit', sans-serif;">Twitter</span>
                    </button>
                </div>
            </div>
        </article>
    </main>

    <script>
        function shareOnFacebook() {
            const url = encodeURIComponent(window.location.href);
            window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank');
        }

        function shareOnTwitter() {
            const url = encodeURIComponent(window.location.href);
            const text = encodeURIComponent('<?php echo htmlspecialchars($article['title']); ?>');
            window.open(`https://twitter.com/intent/tweet?url=${url}&text=${text}`, '_blank');
        }
    </script>
</body>

</html>