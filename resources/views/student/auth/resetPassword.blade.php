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
        <form name="loginform" id="loginform" action="{{route('post.forget.password')}}" method="post">
            @csrf
            <p>
                <i class="fa fa-user" style="position: absolute; padding: 13px 16px;"></i>
                <input type="text" name="email" id="user_login" class="input" value="" size="20" autocapitalize="off" autocomplete="username" placeholder="البريد الالكتروني ">
            </p>

            <p class="submit">
                <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="استرجاع">
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