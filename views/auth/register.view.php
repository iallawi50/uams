<?php component("header") ?>



<div class="container mt-5">



    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up">
                <div class="kfu-primary py-4 text-center">
                    <h2 class="text-2xl font-bold text-white">تسجيل حساب جديد</h2>
                </div>
                <div class="p-8">
                    <form method=POST action="./register">
                        <div class="mb-6">
                            <label for="name" class="block text-gray-700 mb-2">الاسم</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <i data-feather="user" class="text-gray-500"></i>
                                </div>
                                <input type="text" id="name" name="name" value="<?= $name ?? "" ?>" class="w-full pr-10 pl-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="ادخل الاسم" required>

                            </div>
                            <p class="text-red-500"><?= $errors["email"] ?? '' ?></p>

                        </div>
                        <div class="mb-6">
                            <label for="email" class="block text-gray-700 mb-2">البريد الالكتروني</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <i data-feather="mail" class="text-gray-500"></i>
                                </div>
                                <input type="text" id="email" name="email" value="<?= $email ?? "" ?>" class="w-full pr-10 pl-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="ادخل البريد الالكتروني" required>

                            </div>
                            <p class="text-red-500"><?= $errors["email"] ?? '' ?></p>

                        </div>
                        <div class="mb-6">
                            <label for="password" class="block text-gray-700 mb-2">كلمة المرور</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <i data-feather="lock" class="text-gray-500"></i>
                                </div>
                                <input type="password" id="password" name="password" class="w-full pr-10 pl-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="أدخل كلمة المرور" required>
                            </div>
                            <p class="text-red-500"><?= $errors["password"] ?? '' ?></p>


                        </div>
                        <div class="mb-6">
                            <label for="password" class="block text-gray-700 mb-2">تأكيد كلمة المرور</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <i data-feather="lock" class="text-gray-500"></i>
                                </div>
                                <input type="password" id="password" name="confirmpassword" class="w-full pr-10 pl-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="اعد كتابة كلمة المرور" required>
                            </div>


                        </div>
                        <button type="submit" class="w-full kfu-primary text-white py-2 rounded-lg hover:bg-green-700 transition">تسجيل</button>
                    </form>
                    <div class="mt-6 text-center">
                        <p class="text-gray-600">هل لديك حساب؟ <a href="login" class="text-green-600 hover:underline">سجل دخولك</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- <div class="p-3">
            <h1 class="text-center">تسجيل مستخدم جديد</h1>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">الاسم</label>
                <input type="text" name="name" value="<?= $name ?? "" ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <p class="text-danger"><?= $errors["name"] ?? '' ?></p>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">البريد الالكتروني</label>
                <input type="text" name="email" value="<?= $email ?? "" ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <p class="text-danger"><?= $errors["email"] ?? '' ?></p>

            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">كلمة المرور</label>
                <input type="password" name="password" value="<?php $password ?? "" ?>" class="form-control" id="exampleInputPassword1">
                <p class="text-danger"><?= $errors["password"] ?? '' ?></p>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">كلمة المرور</label>
                <input type="password" name="confirmpassword" class="form-control" id="exampleInputPassword1">

            </div>
        </div> -->

    <button type="submit" class="btn btn-success rounded-0 col-12">تسجيل</button>
    </form>
</div>
<?php component("footer") ?>