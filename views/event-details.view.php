<?php component("header") ?>



<!-- Event Details -->
<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Event Header -->
            <div class="relative">
                <img
                    src=<?= asset($event->source) ?>
                    alt="Event"
                    class="w-full h-96 object-cover" />
                <div
                    class="absolute bottom-0 right-0 left-0 bg-gradient-to-t from-black to-transparent p-6">
                    <h1 class="text-3xl font-bold text-white"><?= $event->title ?></h1>
                    <div class="flex flex-wrap items-center mt-2 text-white">
                        <div class="flex items-center mr-6">
                            <i data-feather="calendar" class="ml-2"></i>
                            <span><?= $event->date ?></span>
                        </div>
                        <div class="flex items-center mr-6">
                            <i data-feather="map-pin" class="ml-2"></i>
                            <span><?= $event->location ?></span>
                        </div>
                        <!-- <div class="flex items-center">
                  <i data-feather="users" class="ml-2"></i>
                  <span>320 مسجل</span>
                </div> -->
                    </div>
                </div>
            </div>

            <!-- Event Content -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 p-6">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold kfu-text mb-4">وصف الفعالية</h2>
                        <p class="text-gray-700 leading-relaxed">
                            <?= $event->description ?>
                        </p>
                    </div>

                    <div class="mb-8">
                        <h2 class="text-2xl font-bold kfu-text mb-4">
                            تفاصيل الفعالية
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h3 class="font-semibold kfu-text mb-2">الوقت</h3>
                                <p class="text-gray-700"><?= \Carbon\Carbon::parse($event->from_time)->locale('ar')->translatedFormat('h:i A') ?> الى <?= \Carbon\Carbon::parse($event->to_time)->locale('ar')->translatedFormat('h:i A') ?></p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h3 class="font-semibold kfu-text mb-2">المكان</h3>
                                <p class="text-gray-700"><?= $event->location ?></p>
                            </div>
                            <?php if (isset($event->target)): ?>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <h3 class="font-semibold kfu-text mb-2">الفئة المستهدفة</h3>
                                    <p class="text-gray-700">
                                        <?= $event->target ?>
                                    </p>
                                </div>
                            <?php endif ?>

                        </div>
                    </div>


                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="bg-gray-50 rounded-lg p-6 sticky top-6">
                        <div class="text-center mb-6">
                            <?php if (\Carbon\Carbon::now()->lt(\Carbon\Carbon::parse($event->date))): ?>
                                <span
                                    class="inline-block px-3 py-1 rounded-full bg-green-100 text-green-800 text-sm font-medium">متاح للتسجيل</span>
                            <?php else: ?>
                                <span
                                    class="inline-block px-3 py-1 rounded-full bg-red-100 text-red-800 text-sm font-medium">التسجيل مغلق</span>

                            <?php endif ?>
                        </div>

                        <div class="mb-6">
                            <h3 class="font-semibold kfu-text mb-3">آخر موعد للتسجيل</h3>
                            <p class="text-gray-700"><?= \Carbon\Carbon::parse($event->date)->subDay()->toDateString() ?></p>
                        </div>

                        <!-- <div class="mb-6">
                            <h3 class="font-semibold kfu-text mb-3">المقاعد المتاحة</h3>
                            <div class="w-full bg-gray-200 rounded-full h-4">
                                <div
                                    class="bg-green-600 h-4 rounded-full"
                                    style="width: 75%"></div>
                            </div>
                            <p class="text-gray-700 mt-2">80 من 400 مقعد متبقي</p>
                        </div> -->

                        <div class="space-y-4">
                            <form action="<?= home() ?>/event/register?id=<?=$event->id?>" method="post">
                                <button type="submit"
                                    class="block kfu-primary text-white text-center py-3 rounded-lg hover:bg-green-700 transition font-medium">التسجيل في الفعالية

                                </button>
                            </form>
                            <a
                                href="#"
                                class="block border border-gray-300 text-gray-700 text-center py-3 rounded-lg hover:bg-gray-100 transition font-medium">إضافة إلى المفضلة</a>
                            <a
                                href="#"
                                class="flex items-center justify-center text-gray-600 hover:text-gray-800">
                                <i data-feather="share-2" class="ml-2"></i>
                                <span>مشاركة الفعالية</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php component("footer") ?>