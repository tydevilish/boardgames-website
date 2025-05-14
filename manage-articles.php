<?php
session_start();
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
    <title>จัดการบทความ - Board & Card Game</title>
    <link rel="icon" href="https://lh6.googleusercontent.com/proxy/G45tSK1mVgHEM1IED-wutbaE2vQgEep-eXlWkI91sqvppHGHqOoD2SsdY3pbLbG8lyOkKGNCi7__ROzEkmoFKSPUi0uCn7wKANFWJgiLM911IAO5LPhjJ-T6Zelrw3KIQn4BaA"><link rel="icon" href="https://lh6.googleusercontent.com/proxy/G45tSK1mVgHEM1IED-wutbaE2vQgEep-eXlWkI91sqvppHGHqOoD2SsdY3pbLbG8lyOkKGNCi7__ROzEkmoFKSPUi0uCn7wKANFWJgiLM911IAO5LPhjJ-T6Zelrw3KIQn4BaA"><link rel="icon" href="https://lh6.googleusercontent.com/proxy/G45tSK1mVgHEM1IED-wutbaE2vQgEep-eXlWkI91sqvppHGHqOoD2SsdY3pbLbG8lyOkKGNCi7__ROzEkmoFKSPUi0uCn7wKANFWJgiLM911IAO5LPhjJ-T6Zelrw3KIQn4BaA"><link rel="icon" href="https://lh6.googleusercontent.com/proxy/G45tSK1mVgHEM1IED-wutbaE2vQgEep-eXlWkI91sqvppHGHqOoD2SsdY3pbLbG8lyOkKGNCi7__ROzEkmoFKSPUi0uCn7wKANFWJgiLM911IAO5LPhjJ-T6Zelrw3KIQn4BaA">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/eyqvnxa2dxoptowl6gyxl7z3mbt6p2dma6bgn05gwkefitaf/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
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
                class="flex items-center space-x-3 text-blue-100 hover:bg-blue-700 px-4 py-3 rounded-lg transition-colors duration-300">
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

            <a href="#"
                class="flex items-center space-x-3 text-white bg-blue-700 px-4 py-3 rounded-lg transition-colors duration-300">
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
                จัดการบทความ
            </h1>
            <button onclick="showModal('articleModal')"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center space-x-2 transition-colors duration-300">
                <i class="ri-add-line"></i>
                <span style="font-family: 'Kanit', sans-serif;">เพิ่มบทความใหม่</span>
            </button>
        </div>

        <!-- Articles Table -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600"
                            style="font-family: 'Kanit', sans-serif;">รูปภาพ</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600"
                            style="font-family: 'Kanit', sans-serif;">ชื่อบทความ</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600"
                            style="font-family: 'Kanit', sans-serif;">วันที่สร้าง</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600"
                            style="font-family: 'Kanit', sans-serif;">สถานะ</th>
                        <th class="px-6 py-3 text-right text-sm font-semibold text-gray-600"
                            style="font-family: 'Kanit', sans-serif;">จัดการ</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php
                    // ดึงข้อมูลบทความจากฐานข้อมูล
                    require_once 'actions/connection.php';
                    $stmt = $conn->query("SELECT * FROM articles ORDER BY created_at DESC");
                    while ($article = $stmt->fetch(PDO::FETCH_ASSOC)):
                    ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <img src="<?php echo htmlspecialchars($article['image_url']); ?>" alt="Article thumbnail"
                                    class="h-16 w-24 object-cover rounded">
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-medium text-gray-800" style="font-family: 'Kanit', sans-serif;">
                                    <?php echo htmlspecialchars($article['title']); ?>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-600">
                                <?php echo date('d/m/Y', strtotime($article['created_at'])); ?>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 text-xs font-medium rounded-full 
                                       <?php echo $article['status'] === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'; ?>">
                                    <?php echo $article['status'] === 'published' ? 'เผยแพร่' : 'ฉบับร่าง'; ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <button onclick="showModal('articleModal', <?php echo $article['id']; ?>)"
                                    class="text-blue-600 hover:text-blue-800">
                                    <i class="ri-edit-line text-lg"></i>
                                </button>
                                <button onclick="confirmDelete(<?php echo $article['id']; ?>)"
                                    class="text-red-600 hover:text-red-800">
                                    <i class="ri-delete-bin-line text-lg"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add/Edit Article Modal -->
    <div id="articleModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="min-h-screen px-4 text-center flex items-center justify-center">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm transition-opacity"></div>

            <!-- Modal content -->
            <div class="inline-block w-full max-w-4xl text-left align-middle transition-all transform bg-white rounded-xl shadow-2xl relative">
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6" style="font-family: 'Kanit', sans-serif;">
                        <span id="modalTitle">เพิ่มบทความใหม่</span>
                    </h3>
                    <form id="articleForm" action="./actions/save-article.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="article_id" id="articleId">
                        <div class="space-y-6">
                            <!-- รูปภาพ -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2"
                                    style="font-family: 'Kanit', sans-serif;">
                                    รูปภาพปก
                                </label>
                                <div class="flex items-center space-x-4">
                                    <img id="imagePreview" src="#" alt="Preview"
                                        class="h-32 w-48 object-cover rounded hidden">
                                    <input type="file" name="image" id="imageInput" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 
                                                  file:rounded-full file:border-0 file:text-sm file:font-semibold
                                                  file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                </div>
                            </div>

                            <!-- ชื่อบทความ -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2"
                                    style="font-family: 'Kanit', sans-serif;">
                                    ชื่อบทความ
                                </label>
                                <input type="text" name="title" id="titleInput" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <!-- เนื้อหา -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2"
                                    style="font-family: 'Kanit', sans-serif;">
                                    เนื้อหา
                                </label>
                                <textarea name="content" id="contentEditor"></textarea>
                            </div>

                            <!-- สถานะ -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2"
                                    style="font-family: 'Kanit', sans-serif;">
                                    สถานะ
                                </label>
                                <select name="status" id="statusInput"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="draft">ฉบับร่าง</option>
                                    <option value="published">เผยแพร่</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-8 flex justify-end space-x-4">
                            <button type="button" onclick="closeModal('articleModal')"
                                class="px-4 py-2 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors duration-300"
                                style="font-family: 'Kanit', sans-serif;">
                                ยกเลิก
                            </button>
                            <button type="submit"
                                class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors duration-300"
                                style="font-family: 'Kanit', sans-serif;">
                                บันทึก
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Initialize TinyMCE
        tinymce.init({
            selector: '#contentEditor',
            height: 400,
            plugins: 'link image code table lists',
            toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist | link image | code',
            language: 'th'
        });

        // Image preview
        document.getElementById('imageInput').addEventListener('change', function(e) {
            const preview = document.getElementById('imagePreview');
            const file = e.target.files[0];
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.classList.remove('hidden');
            }
        });

        // Show modal function
        function showModal(modalId, articleId = null) {
            const modal = document.getElementById(modalId);
            const modalContent = document.getElementById(modalId + 'Content');
            modal.classList.remove('hidden');

            // Reset form
            document.getElementById('articleForm').reset();
            document.getElementById('imagePreview').classList.add('hidden');
            tinymce.get('contentEditor').setContent('');
            document.getElementById('articleId').value = '';

            if (articleId) {
                // Load article data for editing
                fetch(`actions/get-article.php?id=${articleId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data) {
                            document.getElementById('articleId').value = data.id;
                            document.getElementById('titleInput').value = data.title;
                            tinymce.get('contentEditor').setContent(data.content);
                            document.getElementById('statusInput').value = data.status;

                            if (data.image_url) {
                                const preview = document.getElementById('imagePreview');
                                preview.src = data.image_url;
                                preview.classList.remove('hidden');
                            }

                            document.getElementById('modalTitle').textContent = 'แก้ไขบทความ';
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('เกิดข้อผิดพลาดในการโหลดข้อมูลบทความ');
                    });
            } else {
                document.getElementById('modalTitle').textContent = 'เพิ่มบทความใหม่';
            }

            setTimeout(() => {
                modalContent.classList.remove('scale-0');
                modalContent.classList.add('scale-100');
            }, 10);
        }

        // Close modal function
        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.add('hidden');
            // Reset form
            document.getElementById('articleForm').reset();
            document.getElementById('imagePreview').classList.add('hidden');
            tinymce.get('contentEditor').setContent('');
        }

        // Delete confirmation
        function confirmDelete(articleId) {
            if (confirm('คุณแน่ใจหรือไม่ที่จะลบบทความนี้?')) {
                window.location.href = `actions/delete-article.php?id=${articleId}`;
            }
        }
    </script>
</body>

</html>