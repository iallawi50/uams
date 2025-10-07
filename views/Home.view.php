<?php

use App\Middleware\Auth;
use Carbon\Carbon;

component("header") ?>



<!-- Hero Section -->
<section class="kfu-primary text-white py-20">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6" data-aos="fade-down">نظام إدارة الفعاليات الجامعية</h1>
        <p class="text-xl mb-8 max-w-2xl mx-auto" data-aos="fade-down" data-aos-delay="100">
            منصة متكاملة لإدارة الفعاليات والأنشطة الطلابية في جامعة الملك فيصل
        </p>
        <div class="flex justify-center space-x-4 space-x-reverse" data-aos="fade-up" data-aos-delay="200">
            <?= Auth::check() ? '' : "<a href=" . home() . "/register class='bg-white kfu-text px-6 py-3 rounded-lg font-medium hover:bg-gray-100 transition'>سجل الآن</a>" ?>
            <a href="#events" class="border-2 border-white px-6 py-3 rounded-lg font-medium hover:bg-white  hover:text-green-900 transition">استكشف الفعاليات</a>
        </div>
    </div>
</section>

<!-- Events Section -->
<section id="events" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center kfu-text mb-12">الفعاليات</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <?php foreach ($events as $event):
            ?>
                <?php
                if (Carbon::parse($event->date)->isBefore(\Carbon\Carbon::now()->subWeeks(2))) continue;
                ?>

                <!-- Event Card 1 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200" data-aos="fade-up">
                    <img src="<?= asset($event->source) ?>" alt="Event" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-xl font-bold kfu-text"><?= $event->title ?></h3>
                            <?php
                            switch ($event->status) {
                                case '0':
                                    echo '<span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">متاح</span>';
                                    break;

                                default:
                                    // أي كود تبيه يظهر في الحالة الافتراضية
                                    echo '<span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded">غير متاح</span>';
                                    break;
                            }
                            ?>

                        </div>
                        <p class="text-gray-600 mb-4"><?= $event->description ?></p>
                        <div class="flex items-center text-gray-500 mb-4">
                            <i data-feather="calendar" class="ml-2"></i>
                            <span><?= $event->date ?></span>
                        </div>
                        <div class="flex items-center text-gray-500 mb-4">
                            <i data-feather="map-pin" class="ml-2"></i>
                            <span><?= $event->location ?></span>
                        </div>
                        <a href="<?= home() ?>/event?id=<?= $event->id ?>" class="block kfu-primary text-white text-center py-2 rounded-lg hover:bg-green-700 transition">التفاصيل</a>
                    </div>
                </div>

            <?php endforeach ?>
        </div>
        <!-- <div class="text-center mt-10">
            <a href="events.html" class="inline-block kfu-primary text-white px-6 py-3 rounded-lg font-medium hover:bg-green-700 transition">عرض جميع الفعاليات</a>
        </div> -->
    </div>
</section>

<!-- Features Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center kfu-text mb-12">مميزات النظام</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-md text-center" data-aos="fade-up">
                <div class="kfu-primary rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i data-feather="calendar" class="text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold kfu-text mb-2">إدارة الفعاليات</h3>
                <p class="text-gray-600">سهولة إضافة وتعديل الفعاليات الجامعية من قبل المسؤولين</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="kfu-primary rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i data-feather="users" class="text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold kfu-text mb-2">تسجيل الطلاب</h3>
                <p class="text-gray-600">إمكانية تسجيل الطلاب في الفعاليات بسهولة وسرعة</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="kfu-primary rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i data-feather="bar-chart-2" class="text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold kfu-text mb-2">تقارير وإحصائيات</h3>
                <p class="text-gray-600">متابعة وتحليل مشاركات الطلاب في الفعاليات المختلفة</p>
            </div>
        </div>
    </div>
</section>

<?php component("footer") ?>