@extends('layouts.sign')

@section('content')
<form method="POST" action="{{route('teacher.login')}}" class="login100-form validate-form">
    @csrf
    <span class="login100-form-title pb-5">
        تسجيل الدخول
    </span>
    <div class="panel panel-primary">
        @if(session()->has('status'))
        <div class="invalid-feedback" style="display:block;">
            {{session()->get('status')}}
        </div>
        @endif
        <div class="panel-body tabs-menu-body p-0 pt-5">
            <div class="tab-content">
                <div class="tab-pane active" id="tab5">
                    <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                            <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                        </a>
                        <input class="input100 border-start-0 form-control ms-0" type="email" name="email" placeholder="البريد الالكتروني">
                        @error('email')
                        <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                            <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                        </a>
                        <input class="input100 border-start-0 form-control ms-0" type="password" name="password" placeholder="كلمة المرور">
                        @error('password')
                        <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="container-login100-form-btn">
                        <button tybe="submit" name="submit" class="login100-form-btn btn-primary">
                            تسجيل
                        </button>
                    </div>
                    <div class="text-center pt-3">
                        <p class="text-dark mb-0">ليس لديك حساب؟<a href="{{route('get.teacher.register')}}" class="text-primary ms-1">سجل الان</a></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>
@endsection
