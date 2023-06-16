@extends('student.auth.layouts.sign')
@section('content')
    <div id="login">
        <h1 style="height: 50px;"><a href="{{route('index')}}"><img class="bs-cs-login-logo" src="{{route('index')}}/webassets/loggg.png"></a></h1>
        <div class="login-heading">
            <h2>استرجاع كلمة المرور</h2>
        </div>
        @if(session()->has('status'))
            <div style="display:block; color:red;">
                {{session()->get('status')}}
            </div>
        @endif
        @if(session()->has('success'))
            <div style="display:block; color:green;">
                {{session()->get('success')}}
            </div>
        @endif
        <form name="loginform" id="loginform" action="{{route('post.reset.password')}}" method="post">
            @csrf
            <div class="user-pass-wrap" >
                <div class="wp-pwd">
                <i class="fa-solid fa-lock" style="position: absolute; padding: 13px 16px;"></i>
                    <input type="password" name="password" id="user_pass" class="input password-input" value="" size="20" autocomplete="current-password" placeholder="كلمة المرور الجديدة ">
                </div>
                <input type="hidden" name="token" value="{{$token}}">
            </div>

            <p class="submit">
                <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="ارسال">
                <input type="hidden" name="redirect_to" value="https://watad.me/wp-admin/">
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