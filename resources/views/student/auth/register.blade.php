@extends('student.auth.layouts.sign')
@section('content')
    <div id="login">
        <h1 style="height: 50px;"><a href="{{route('index')}}"><img class="bs-cs-login-logo" src="{{route('index')}}/webassets/loggg.png"></a></h1>
        <div class="login-heading">
            <h2>إنشاء حساب جديد</h2><span>او <a rel="nofollow" href="{{route('login')}}">تسجيل الدخول</a></span>
        </div>

        <form name="loginform" id="loginform" action="{{route('post.register')}}" method="post">
            @csrf
            <div class="user-pass-wrap" >
                <div class="wp-pwd">
                <i class="fa-solid fa-user" style="position: absolute; padding: 13px 16px;"></i>
                    <input type="text" name="name"  class="input" value="" size="20" autocomplete="current-password" placeholder="الاسم">
                </div>
            </div>
            <p>
                <i class="fa fa-user" style="position: absolute; padding: 13px 16px;"></i>
                <input type="text" name="email" id="user_login" class="input" value="" size="20" autocapitalize="off" autocomplete="email" placeholder="البريد الالكتروني ">
            </p>

            <div class="user-pass-wrap" >
                <div class="wp-pwd">
                <i class="fa-solid fa-phone" style="position: absolute; padding: 13px 16px;"></i>
                    <input type="text" name="phone"  class="input" value="" size="20" autocomplete="current-password" placeholder="رقم الجوال">
                </div>
            </div>
            <div class="user-pass-wrap" >
                <div class="wp-pwd">
                <i class="fa-solid fa-lock" style="position: absolute; padding: 13px 16px;"></i>
                    <input type="password" name="password" id="user_pass" class="input password-input" value="" size="20" autocomplete="current-password" placeholder="كلمة السر ">
                </div>
            </div>
            <p class="submit">
                <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="تسجيل">
                <input type="hidden" name="testcookie" value="1">
            </p>
        </form>
        <script type="text/javascript">
            function wp_attempt_focus() {
                setTimeout(function() {
                    try {
                        d = document.getElementById("user_login");
                        d.focus();
                        d.select();
                    } catch (er) {}
                }, 200);
            }
            wp_attempt_focus();
            if (typeof wpOnload === 'function') {
                wpOnload()
            }

        </script>
    </div>
@endsection