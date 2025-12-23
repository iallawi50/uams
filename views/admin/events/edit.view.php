<?php component("admin/header") ?>
<main class="flex-1 overflow-y-auto p-4">
    <div class="container mx-auto">

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold kfu-text">تعديل الفعالية</h1>
            <a href="<?= home() ?>/dashboard/" class="flex items-center space-x-1 space-x-reverse text-gray-600 hover:text-gray-800">
                <i data-feather="arrow-right"></i>
                <span>عودة إلى قائمة الفعاليات</span>
            </a>
        </div>

        <div class="bg-white rounded-lg shadow p-6" data-aos="fade-up">
            <form action="" method="POST" enctype="multipart/form-data" novalidate>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-gray-700 mb-2">اسم الفعالية</label>
                        <input type="text" name="title"
                            value="<?= htmlspecialchars($event->title) ?>"
                            class="w-full px-4 py-2 border rounded-lg" required>
                        <span class="text-red-500"><?= $errors['title'] ?? null ?></span>
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">تاريخ الفعالية</label>
                        <input type="date" name="date"
                            value="<?= $event->date ?>"
                            class="w-full px-4 py-2 border rounded-lg" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">وقت الفعالية - من</label>
                        <input type="time" name="from_time"
                            value="<?= $event->from_time ?>"
                            class="w-full px-4 py-2 border rounded-lg" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">وقت الفعالية - إلى</label>
                        <input type="time" name="to_time"
                            value="<?= $event->to_time ?>"
                            class="w-full px-4 py-2 border rounded-lg" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">مكان الفعالية</label>
                        <input type="text" name="location"
                            value="<?= htmlspecialchars($event->location) ?>"
                            class="w-full px-4 py-2 border rounded-lg" required>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-gray-700 mb-2">وصف الفعالية</label>
                        <textarea name="description" rows="4"
                            class="w-full px-4 py-2 border rounded-lg"
                            required><?= htmlspecialchars($event->description) ?></textarea>
                    </div>

                    <!-- الصورة -->
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 mb-2">صورة الفعالية</label>
                        <input type="file" name="source" id="source" class="hidden">

                        <div class="border-2 border-dashed rounded-lg p-4 text-center cursor-pointer" id="uploadImgButton">
                            <?php if (!empty($event->source)): ?>
                                <img src="<?= home() ?>/uploads/<?= $event->source ?>"
                                    class="mx-auto h-40 rounded mb-2">
                                <p class="text-gray-500">اضغط لتغيير الصورة</p>
                            <?php else: ?>
                                <p class="text-gray-400">اضغط لرفع صورة</p>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>

                <div class="mt-8 flex justify-end space-x-4 space-x-reverse">
                    <a href="<?= home() ?>/events" class="px-6 py-2 border rounded-lg">إلغاء</a>
                    <button type="submit" class="kfu-primary text-white px-6 py-2 rounded-lg">
                        تحديث الفعالية
                    </button>
                </div>

            </form>
        </div>
    </div>
</main>

<script>
    AOS.init();
    feather.replace();

    const uploadButton = document.getElementById('uploadImgButton');
    const fileInput = document.getElementById('source');
    const uploadArea = uploadButton.parentElement;

    uploadButton.addEventListener("click", () => {
        fileInput.click();
    });

    fileInput.addEventListener("change", function() {
        if (this.files.length > 0) {
            uploadArea.innerHTML = `
                <div class="flex flex-col items-center justify-center">
                    <i data-feather="check-circle" class="w-12 h-12 text-green-500 mb-2"></i>
                    <p class="text-gray-700">${this.files[0].name}</p>
                    <p class="text-gray-400 text-sm mt-1">تم اختيار الصورة بنجاح ✅</p>
                </div>
            `;
            feather.replace();
        }
    });
</script>