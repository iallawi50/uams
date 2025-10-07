<?php component("header") ?>
<section class="py-24">
    <div class="container mx-auto px-4 flex justify-center">
        <div
            class="bg-white rounded-xl shadow-lg p-12 text-center max-w-xl"
            data-aos="fade-up">
            <i
                data-feather="check-circle"
                class="text-green-600 mx-auto mb-6"
                style="width: 70px; height: 70px;"></i>
            <h1 class="text-3xl font-bold text-green-700 mb-4">
                تم التقييم بنجاح
            </h1>
            <p class="text-gray-700 mb-6">
                شكرًا لمساهمتك في تحسين فعالياتنا. تقييمك مهم لنا 
            </p>
            <a
                href="<?=home()?>"
                class="inline-block bg-green-700 text-white py-3 px-6 rounded-lg font-medium hover:bg-green-800 transition">العودة الرئيسية</a>
        </div>
    </div>
</section>
<?php component("footer") ?>