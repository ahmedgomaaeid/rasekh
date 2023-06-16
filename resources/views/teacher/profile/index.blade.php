@extends('layouts.teacherdashboard')
@section('content')
<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
        @if(session()->has('status'))
        <div class="alert alert-danger">
            {{ session()->get('status') }}
        </div>
        @endif
        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">تعديل الحساب</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">الرئسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">تعديل الحساب</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW-1 OPEN -->
            <div class="row">
                <div class="col-xl-4">
                    <div class="card panel-theme">
                        <form method="POST" action="{{route('post.teacher.profile.image')}}" enctype= "multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <div class="float-start">
                                    <h3 class="card-title">تغيير الصورة</h3>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="card-body no-padding">
                                <ul class="list-group no-margin">
                                    <div class="row mb-5">
                                            <div class="col-lg-12 col-sm-12 mb-12 mb-lg-0" style="margin: auto;">
                                                <input type="file" name="photo" class="dropify" data-bs-height="180"/>
                                                @error('photo')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                </ul>
                            </div>
                             <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">تحديث</button>
                                <a href="{{route('get.teacher.dashboard')}}" class="btn btn-danger">الغاء</a>
                            </div>
                        </form>
                    </div>
                    <div class="card">
                        <form method="POST" action="{{route('post.teacher.profile.password')}}">
                        @csrf
                            <div class="card-header">
                                <div class="card-title">تغيير كلمة المرور</div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">كلمة المرور الحالية</label>
                                    <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                        </a>
                                        <input class="input100 form-control" type="password" name="old_password" placeholder="كلمة المرور الحالية">
                                    </div>
                                    <!-- <input type="password" class="form-control" value="password"> -->
                                </div>
                                <div class="form-group">
                                    <label class="form-label">كلمة المرور الجديدة</label>
                                    <div class="wrap-input100 validate-input input-group" id="Password-toggle2">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                        </a>
                                        <input class="input100 form-control" name="password" type="password" placeholder="كلمة المرور الجديدة">
                                    </div>
                                    <!-- <input type="password" class="form-control" value="password"> -->
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">تحديث</button>
                                <a href="{{route('get.teacher.dashboard')}}" class="btn btn-danger">الغاء</a>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="col-xl-8">
                    <div class="card">
                        <form method="POST" action="{{route('post.teacher.profile')}}">
                            @csrf
                            <div class="card-header">
                                <h3 class="card-title">المعلومات الشخصية</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputname">الاسم</label>
                                            <input type="text" class="form-control" id="exampleInputname" name="name" placeholder="الاسم" value="{{$teacher->name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">البريد الالكتروني</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="البريد الالكتروني" value="{{$teacher->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputnumber">رقم الهاتف</label>
                                    <input type="number" class="form-control" id="exampleInputnumber" name="phone" placeholder="رقم الهاتف" value="{{$teacher->phone}}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">وصف المعلم</label>
                                    <textarea class="form-control" rows="6" name="description">{{$teacher->description}}</textarea>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-success my-1">تحديث</button>
                                <a href="{{route('get.teacher.dashboard')}}" class="btn btn-danger my-1">الغاء</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ROW-1 CLOSED -->

        </div>
        <!--CONTAINER CLOSED -->

    </div>
</div>
<!--app-content open-->
@endsection
