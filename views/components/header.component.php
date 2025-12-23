<?php

use App\Middleware\Auth;
use App\Models\User;

if (isset($_SESSION["user"]) && !User::find($_SESSION["user"]->id)) {
    unset($_SESSION["user"]);
}


?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= app_name("نظام إدارة الفعاليات الجامعية - جامعة الملك فيصل") ?></title>
    <link rel="icon" type="image/x-icon" href="/static/favicon.ico">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="<?= asset("css/app.css") ?>">

</head>

<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="kfu-primary text-white shadow-lg">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center space-x-4 space-x-reverse">
                <img src="<?= asset("logo.png") ?>" alt="جامعة الملك فيصل" class="h-12">
                <h1 class="text-xl font-bold">نظام إدارة الفعاليات الجامعية</h1>
            </div>
            <div class="hidden md:flex space-x-6 space-x-reverse">
                <a href="<?=home()?>" class="hover:text-gray-200">الرئيسية</a>
                <a href="<?=home()?>/event/registered" class="hover:text-gray-200">الفعاليات المسجلة</a>
                <a href="#" class="hover:text-gray-200">عن النظام</a>
                <a href="#" class="hover:text-gray-200">اتصل بنا</a>
            </div>
            <div class="flex items-center space-x-4 space-x-reverse">
                <?php
                if (Auth::check()):
                ?>
                
                    <?php if(user()->is_admin): ?>
                    <a href="<?=  home() ?>/dashboard" class="bg-white kfu-text px-4 py-2 rounded-lg font-medium hover:bg-gray-100 transition">لوحة التحكم</a>

                    <?php endif?>
                    <form action="logout" method="post">
                        <button type="submit" href="logout" class="bg-red-500 text-white px-4 py-2 rounded-lg font-medium hover:bg-red-600 transition">تسجيل خروج</button>
                    
                    </form>

                <?php else: ?>

                    <a href="login" class="bg-white kfu-text px-4 py-2 rounded-lg font-medium hover:bg-gray-100 transition">تسجيل الدخول</a>

                <?php endif ?>
                <button class="md:hidden">
                    <i data-feather="menu"></i>
                </button>
            </div>
        </div>
    </nav>