<?php component("admin/header") ?>
<main class="flex-1 overflow-y-auto p-4">
    <div class="container mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold kfu-text">إضافة فعالية جديدة</h1>
            <a href="<?= home() ?>/dashboard" class="flex items-center space-x-1 space-x-reverse text-gray-600 hover:text-gray-800">
                <i data-feather="arrow-right"></i>
                <span>عودة إلى قائمة الفعاليات</span>
            </a>
        </div>

        <div class="bg-white rounded-lg shadow p-6" data-aos="fade-up">
            <form action="#" method="POST" enctype="multipart/form-data" novalidate>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="title" class="block text-gray-700 mb-2">اسم الفعالية</label>
                        <input type="text" id="title" value="<?= $title ?? null ?>" name="title" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="أدخل اسم الفعالية" required>
                        <span class="text-red-500"><?= $errors["title"] ?? null ?></span>
                    </div>

                    <div>
                        <label for="date" class="block text-gray-700 mb-2">تاريخ الفعالية</label>
                        <input type="date" id="date" value="<?= $date ?? null ?>" name="date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                        <span class="text-red-500"><?= $errors["date"] ?? null ?></span>
                    </div>
                    <div>
                        <label for="from_time" class="block text-gray-700 mb-2">وقت الفعالية - من</label>
                        <input type="time" id="from_time" value="<?= $from_time ?? null ?>" name="from_time" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                        <span class="text-red-500"><?= $errors["from_time"] ?? null ?></span>
                    </div>
                    <div>
                        <label for="to_time" class="block text-gray-700 mb-2">وقت الفعالية - الى</label>
                        <input type="time" id="to_time" value="<?= $to_time ?? null ?>" name="to_time" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                        <span class="text-red-500"><?= $errors["to_time"] ?? null ?></span>
                    </div>
                    <div>
                        <label for="location" class="block text-gray-700 mb-2">مكان الفعالية</label>
                        <input type="text" id="location" value="<?= $location ?? null ?>" name="location" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="أدخل مكان الفعالية" required>
                        <span class="text-red-500"><?= $errors["location"] ?? null ?></span>
                    </div>

                    <div class="md:col-span-2">
                        <label for="description" class="block text-gray-700 mb-2">وصف الفعالية</label>
                        <textarea id="description" name="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="أدخل وصفاً مفصلاً للفعالية" required><?= $description ?? null ?></textarea>
                        <span class="text-red-500"><?= $errors["description"] ?? null ?></span>
                    </div>
                    <div class="md:col-span-2">
                        <label for="source" class="block text-gray-700 mb-2">صورة الفعالية</label>
                                <input type="file" id="source" name="source" class="hidden">

                        <div class="flex items-center space-x-4 space-x-reverse">
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center w-full">
                                <div id="uploadImgButton" class="flex flex-col items-center justify-center cursor-pointer">
                                    <i data-feather="upload" class="w-12 h-12 text-gray-400 mb-2"></i>
                                    <p class="text-gray-500">اضغط هنا لرفع الصورة</p>
                                    <p class="text-gray-400 text-sm mt-1">PNG, JPG, GIF بحد أقصى 5MB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 flex justify-end space-x-4 space-x-reverse">
                    <a href="<?= home()?>/dashboard" type="reset" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 transition">إلغاء</a>
                    <button type="submit" class="kfu-primary text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">حفظ الفعالية</button>
                </div>
            </form>
        </div>
    </div>
</main>
</div>
</div>
<script>
    AOS.init();
    feather.replace();

    // فتح اختيار الملف عند الضغط على زر الرفع
    const uploadButton = document.getElementById('uploadImgButton');
    const fileInput = document.getElementById('source');
    const uploadArea = uploadButton.parentElement;

    uploadButton.addEventListener("click", () => {
        fileInput.click();
    });

    // عند اختيار صورة
    fileInput.addEventListener("change", function() {
        if (this.files.length > 0) {
            const fileName = this.files[0].name;
            uploadArea.innerHTML = `
                <div class="flex flex-col items-center justify-center">
                    <i data-feather="check-circle" class="w-12 h-12 text-green-500 mb-2"></i>
                    <p class="text-gray-700">${fileName}</p>
                    <p class="text-gray-400 text-sm mt-1">تم اختيار الصورة بنجاح ✅</p>
                </div>
            `;
            feather.replace();
        }
    });
</script>

</body>

</html>