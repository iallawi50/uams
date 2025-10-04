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
    <title>لوحة التحكم - نظام إدارة الفعاليات الجامعية</title>
    <link rel="icon" type="image/x-icon" href="/static/favicon.ico">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap');
        body {
            font-family: 'Tajawal', sans-serif;
        }
        .kfu-primary {
            background-color: #006747;
        }
        .kfu-secondary {
            background-color: #FFFFFF;
        }
        .kfu-accent {
            color: #FFD700;
        }
        .kfu-text {
            color: #006747;
        }
        .sidebar {
            transition: all 0.3s;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="sidebar kfu-primary text-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 right-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out" id="sidebar">
            <div class="flex items-center space-x-2 space-x-reverse px-4">
                <img src="http://static.photos/education/200x200/1" alt="جامعة الملك فيصل" class="h-10">
                <span class="text-xl font-bold">لوحة التحكم</span>
            </div>
            <nav>
                <a href="<?= home() ?>" class="flex items-center space-x-2 space-x-reverse py-2 px-4 text-white rounded-lg">
                    <i data-feather="home"></i>
                    <span>الرئيسية</span>
                </a>
                <a href="<?= home() ?>/dashboard/" class="flex items-center space-x-2 space-x-reverse py-2 px-4 text-white  rounded-lg transition">
                    <i data-feather="calendar"></i>
                    <span>إدارة الفعاليات</span>
                </a>
                <a href="admin-students.html" class="flex items-center space-x-2 space-x-reverse py-2 px-4 text-white  rounded-lg transition">
                    <i data-feather="users"></i>
                    <span>إدارة الطلاب</span>
                </a>
                <a href="admin-reports.html" class="flex items-center space-x-2 space-x-reverse py-2 px-4 text-white  rounded-lg transition">
                    <i data-feather="bar-chart-2"></i>
                    <span>التقارير والإحصائيات</span>
                </a>
                <a href="admin-settings.html" class="flex items-center space-x-2 space-x-reverse py-2 px-4 text-white  rounded-lg transition">
                    <i data-feather="settings"></i>
                    <span>الإعدادات</span>
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between px-4 py-3">
                    <button class="md:hidden text-gray-500 focus:outline-none" id="sidebarToggle">
                        <i data-feather="menu"></i>
                    </button>
                    <div class="flex items-center space-x-4 space-x-reverse">
                        <div class="relative">
                            <button class="flex items-center space-x-2 space-x-reverse focus:outline-none">
                                <span class="text-gray-700">مسؤول النظام</span>
                                <img src="http://static.photos/people/200x200/1" alt="User" class="w-8 h-8 rounded-full">
                            </button>
                        </div>
                        <button class="text-gray-500 hover:text-gray-700">
                            <i data-feather="bell"></i>
                        </button>
                        <a href="index.html" class="text-gray-500 hover:text-gray-700">
                            <i data-feather="log-out"></i>
                        </a>
                    </div>
                </div>
            </header>