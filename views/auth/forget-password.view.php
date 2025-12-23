<?php component("header") ?>

<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-md mx-auto bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up">

            <div class="kfu-primary py-4 text-center">
                <h2 class="text-2xl font-bold text-white">استعادة كلمة المرور</h2>
            </div>

            <div class="p-8">
                <form id="resetForm">

                    <!-- الايميل -->
                    <div class="mb-6">
                        <label class="block text-gray-700 mb-2">البريد الالكتروني</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <i data-feather="mail" class="text-gray-500"></i>
                            </div>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="w-full pr-10 pl-4 py-2 border border-gray-300 rounded-lg
                                       focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                required>
                        </div>
                    </div>

                    <!-- زر ارسال الرمز -->
                    <button
                        type="button"
                        onclick="sendCode()"
                        class="w-full kfu-primary text-white py-2 rounded-lg hover:bg-green-700 transition">
                        ارسال رمز
                    </button>

                    <!-- حقل الرمز (مخفي بالبداية) -->
                    <div id="codeBox" class="hidden mt-6">
                        <label class="block text-gray-700 mb-2">أدخل الرمز</label>
                        <input
                            type="text"
                            id="code"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg
                                   focus:ring-2 focus:ring-green-500 focus:border-green-500">

                        <button
                            type="button"
                            onclick="verifyCode()"
                            class="w-full kfu-primary text-white py-2 rounded-lg hover:bg-green-700 transition mt-5">
                            تحقق
                        </button>
                    </div>

                    <p id="result" class="mt-4 text-center font-semibold"></p>

                </form>
            </div>

        </div>
    </div>
</section>

<script>
    let generatedCode = null;

    function sendCode() {
        // توليد رقم عشوائي من 4 أرقام
        generatedCode = Math.floor(1000 + Math.random() * 9000).toString();

        // عرض الرمز (تجريبي)
        alert("رمز التحقق هو: " + generatedCode);

        // إظهار حقل إدخال الرمز
        document.getElementById('codeBox').classList.remove('hidden');
    }

    function verifyCode() {
        const code = document.getElementById('code').value;
        const result = document.getElementById('result');

        if (code === generatedCode) {
            result.innerText = "الرمز صحيح";
            result.className = "mt-4 text-center kfu-text font-semibold";

            let email = document.querySelector("input[name=email]").value;
            window.sessionStorage.setItem("reset_email", email);

            window.location.href = "uams/reset-password";
        } else {
            result.innerText = "الرمز غير صحيح";
            result.className = "mt-4 text-center text-red-600 font-semibold";
        }
    }
</script>


<?php component("footer") ?>