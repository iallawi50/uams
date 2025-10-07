<?php

use Carbon\Carbon;
        // echo "<pre>";
        // foreach ($events as $event) {
        //     print_r($event->event());
        // }
        // echo "</pre>";
        // // exit;
component("header") ?>

<!-- Main Content Area -->
<main class="flex-1 overflow-y-auto p-4">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold kfu-text mb-6">لوحة التحكم</h1>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6" data-aos="fade-up">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">إجمالي الفعاليات</p>
                        <h3 class="text-2xl font-bold kfu-text"><?= count($events) ?></h3>
                    </div>
                    <div class="kfu-primary rounded-full w-12 h-12 flex items-center justify-center">
                        <i data-feather="calendar" class="text-white"></i>
                    </div>
                </div>
            </div>
            <!-- <div class="bg-white rounded-lg shadow p-6" data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">الفعاليات القادمة</p>
                        <h3 class="text-2xl font-bold kfu-text"></h3>
                    </div>
                    <div class="kfu-primary rounded-full w-12 h-12 flex items-center justify-center">
                        <i data-feather="clock" class="text-white"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6" data-aos="fade-up" data-aos-delay="300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">الفعاليات المنتهية</p>
                        <h3 class="text-2xl font-bold kfu-text">12</h3>
                    </div>
                    <div class="kfu-primary rounded-full w-12 h-12 flex items-center justify-center">
                        <i data-feather="check-circle" class="text-white"></i>
                    </div>
                </div>
            </div> -->
        </div>

        <div class="bg-white rounded-lg shadow mb-8" data-aos="fade-up">
            <div class="p-4 border-b border-gray-200 flex items-center justify-between">
                <h2 class="text-xl font-bold kfu-text">جميع الفعاليات</h2>

            </div>
            <div class="p-4">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">اسم الفعالية</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">التاريخ</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">المكان</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">الحالة</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">إجراءات</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach ($events as $event): ?>
                    
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap"><?= $event->event()->title ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><?= $event->event()->date ?> | <?= Carbon::parse($event->event()->from_time)->locale('ar')->translatedFormat('h:i A') ?> الى <?= Carbon::parse($event->event()->to_time)->locale('ar')->translatedFormat('h:i A')  ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><?= $event->event()->location ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php switch ($event->event()->status) {
                                            case 1:
                                                echo "<span class='px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800'>نشطة</span>";
                                                break;

                                            case 2:
                                                echo "<span class='px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800'>منتهية</span>";
                                                break;

                                            default:
                                                echo "<span class='px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800'>قريباً</span>";
                                                break;
                                        } ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                         <a href="<?=home()?>/event?id=<?=$event->event_id?>" class="text-green-600 hover:text-green-900 mr-2">عرض</a>
                                        <a href="<?= home() ?>/event/rate?id=<?= $event->event_id ?>" class="text-blue-600 hover:text-blue-900 mr-2">تقييم</a>
                                        
                                    </td>
                                </tr>

                            <?php endforeach ?>
                            <!-- <tr>
                                <td class="px-6 py-4 whitespace-nowrap">يوم المهنة الجامعي</td>
                                <td class="px-6 py-4 whitespace-nowrap">15/10/2023</td>
                                <td class="px-6 py-4 whitespace-nowrap">قاعة المؤتمرات</td>
                                <td class="px-6 py-4 whitespace-nowrap">320</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">نشطة</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <a href="#" class="text-green-600 hover:text-green-900 mr-2">عرض</a>
                                    <a href="#" class="text-blue-600 hover:text-blue-900 mr-2">تعديل</a>
                                    <a href="#" class="text-red-600 hover:text-red-900">حذف</a>
                                </td>
                            </tr> -->
                            <!-- <tr>
                                <td class="px-6 py-4 whitespace-nowrap">ورشة الذكاء الاصطناعي</td>
                                <td class="px-6 py-4 whitespace-nowrap">22/10/2023</td>
                                <td class="px-6 py-4 whitespace-nowrap">كلية علوم الحاسب</td>
                                <td class="px-6 py-4 whitespace-nowrap">85</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">نشطة</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <a href="#" class="text-green-600 hover:text-green-900 mr-2">عرض</a>
                                    <a href="#" class="text-blue-600 hover:text-blue-900 mr-2">تعديل</a>
                                    <a href="#" class="text-red-600 hover:text-red-900">حذف</a>
                                </td>
                            </tr> -->
                            <!-- <tr>
                                <td class="px-6 py-4 whitespace-nowrap">المؤتمر العلمي الدولي</td>
                                <td class="px-6 py-4 whitespace-nowrap">05/11/2023</td>
                                <td class="px-6 py-4 whitespace-nowrap">مركز المؤتمرات</td>
                                <td class="px-6 py-4 whitespace-nowrap">156</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">قريباً</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <a href="#" class="text-green-600 hover:text-green-900 mr-2">عرض</a>
                                    <a href="#" class="text-blue-600 hover:text-blue-900 mr-2">تعديل</a>
                                    <a href="#" class="text-red-600 hover:text-red-900">حذف</a>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


</main>


<script>
    AOS.init();
    feather.replace();

    // Toggle sidebar on mobile
    document.getElementById('sidebarToggle').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('-translate-x-full');
    });
</script>

<?php component("footer") ?>