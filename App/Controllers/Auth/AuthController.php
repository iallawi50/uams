<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\User;


class AuthController extends Controller
{

    public function __construct()
    {
        return $this->middleware("guest");
    }


    public function register()
    {
        return view("auth/register");
    }

    public function forget_password() 
    {
        return view("auth/forget-password");
    }

    public function reset() {
        return view("auth/reset");
    }

    public function update_password(){
        $email = Request::get("email");
        $password = Request::get("password");

        $user = User::find($email, "email", "=");
    
        if($user) {

            User::update($user->id, [
                "password" => $password
            ]);

        } else {
            redirect("register");
        }
        
        redirect("login");


    }

    public function store()
    {

        $name = trim(Request::get("name"));
        $email = trim(Request::get("email"));
        $password = Request::get("password");
        $confirmpassword = Request::get("confirmpassword");
        $send = true;
        $data = [
            "name" => $name,
            "email" => $email,
            "errors" => [],
        ];

        // Name Validate
        if (empty($name)) {
            $data["errors"]["name"] = 'حقل الاسم فارغ';
            $send = false;
        }

        // Email Validate
        if (empty($email)) {
            $data["errors"]["email"] = 'حقل البريد الإلكتروني فارغ';
            $send = false;
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $data["errors"]["email"] = 'صيغة البريد الإلكتروني غير صحيحة';
            $send = false;
        } else if (User::find($email, "email")) {
            $data["errors"]["email"] = 'البريد الإلكتروني موجود بالفعل';
            $send = false;
        }


        // Password Validate

        if (empty($password)) {
            $data["errors"]["password"] = 'حقل كلمة المرور فارغ';
            $send = false;
        } else if (strlen($password) < 8) {
            $data["errors"]["password"] = 'كلمة المرور قصيرة , يجب ان تكون 8 او اطول';
            $send = false;
        } else if ($password != $confirmpassword) {
            $data["errors"]["password"] = 'كلمة المرور وتأكيد كلمة المرور غير متطابقين';
            $send = false;
        }

        if ($send) {
            User::create([
                "name" => $name,
                "email" => $email,
                "password" => $password,
            ]);

            $user = User::find($email, "email");
            $_SESSION['user'] = $user;

            return redirect_home();
        }


        return view("auth/register", $data);
    }

    public function login()
    {
        return view("auth/login");
    }

    public function authentication()
    {



        $email = strtolower(Request::get("email"));
        $password = Request::get("password");
        $user = User::find($email, "email", "=");
        $data = [
            "email" => $email,
        ];

        if (!empty($email) && !empty($password)) {

            if ($user) {

                if ($user->email == $email && $user->password == $password) {
                    $_SESSION["user"] = $user;
                    return redirect_home();
                } else {
                    $data["errors"] = "البيانات المدخلة غير متطابقة مع سجلاتنا";
                }
            } else {
                $data["errors"] = "البيانات المدخلة غير متطابقة مع سجلاتنا";
            }
        } else {
            $data["errors"] = "لديك حقول فارغة";
        }


        return view("auth/login", $data);
    }


    public function logout()
    {
        unset($_SESSION["user"]);
        return back();
    }
}
