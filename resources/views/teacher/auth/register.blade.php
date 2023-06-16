@extends('layouts.sign')
@section('content')
<form method="POST" action="{{route('teacher.register')}}" enctype="multipart/form-data" class="login100-form validate-form">
@csrf
    <span class="login100-form-title">
        تسجيل حساب
    </span>
    <div class="row">
        <div class="col-lg-12 col-sm-12 mb-12 mb-lg-0" style="margin: auto;">
            <input type="file" name="photo" class="dropify" data-bs-height="180" />
            @error('photo')
            <div class="invalid-feedback" style="display:block;">{{$message}}</div>
            @enderror
        </div>
    </div>
    <br>
    <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
            <i class="mdi mdi-account" aria-hidden="true"></i>
        </a>
        <input class="input100 border-start-0 ms-0 form-control" type="text" name="name" placeholder="الاسم">
    </div>
    <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
            <i class="zmdi zmdi-email" aria-hidden="true"></i>
        </a>
        <input class="input100 border-start-0 ms-0 form-control" type="email" name="email" placeholder="البريد الالكتروني">
    </div>
    <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid phone is required: 214214214">
        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
            <i class="zmdi zmdi-phone" aria-hidden="true"></i>
        </a>
        <input class="input100 border-start-0 ms-0 form-control" type="tel" name="phone" placeholder="رقم الهاتف">
    </div>
    <div class="wrap-input100 validate-input input-group" id="Password-toggle">
        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
            <i class="zmdi zmdi-eye" aria-hidden="true"></i>
        </a>
        <input class="input100 border-start-0 ms-0 form-control" type="password" name="password" placeholder="كلمة المرور">
    </div>
    <div class="wrap-input100 validate-input input-group">
        <textarea class="form-control mb-4" placeholder="وصف المعلم" rows="4" name="description"></textarea>
    </div>
    <div class="container-login100-form-btn">
        <button tybe="submit" name="submit" class="login100-form-btn btn-primary">
            تسجيل
        </button>
    </div>
    <div class="text-center pt-3">
        <p class="text-dark mb-0">هل تمتلك حساب؟<a href="{{route('get.teacher.login')}}" class="text-primary ms-1">سجل الدخول</a></p>
    </div>
</form>
@endsection
