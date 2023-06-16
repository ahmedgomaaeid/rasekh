@extends('layouts.dashboard')

@section('content')
<div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">اضافة معلم</h1>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- ROW-1 OPEN -->
                        <div class="row">
                            <div class="col-lg-12">
                            <form method="post" action="{{route('post.admin.teacher.create')}}" enctype= "multipart/form-data">
                            @csrf
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">اضافة معلم جديد</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-5">
                                            <div class="col-lg-4 col-sm-12 mb-4 mb-lg-0" style="margin: auto;">
                                                <input type="file" name="photo" class="dropify" data-bs-height="180" />
                                                @error('photo')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label">اسم المعلم :</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="name" placeholder="اسم المعلم">
                                                @error('name')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label">البريد الالكتروني :</label>
                                            <div class="col-md-9">
                                                <input type="email" class="form-control" name="email" placeholder="البريد الالكترونى">
                                                @error('email')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label">كلمة المرور  :</label>
                                            <div class="col-md-9">
                                                <input type="password" class="form-control" name="password" placeholder="كلمة المرور">
                                                @error('password')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label">رقم الهاتف :</label>
                                            <div class="col-md-9">
                                                <input type="tel" class="form-control" name="phone" placeholder="رقم الهاتف">
                                                @error('phone')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label">وصف المعلم :</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="description" placeholder="وصف المعلم">
                                                @error('description')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label">مهارات المعلم :</label>
                                            <div class="col-md-9">
                                                <div class="selectgroup selectgroup-pills">
                                                @foreach($sub_categories as $cate)
                                                    <label class="selectgroup-item">
                                                            <input type="checkbox" name="sections[]" value="{{$cate->id}}" class="selectgroup-input">
                                                            <span class="selectgroup-button">{{$cate->mainCategory->name}} / {{$cate->name}}</span>
                                                        </label>
                                                @endforeach
                                                @error('sections')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label">صلاحية نشر الدروس :</label>
                                                <div class="form-group">
                                                    <label class="custom-switch form-switch mb-0">
                                                            <input type="checkbox" name="course_access" value="1" class="custom-switch-input">
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                        </label>
                                                </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label">صلاحية عمل يث مباشر:</label>
                                                <div class="form-group">
                                                    <label class="custom-switch form-switch mb-0">
                                                            <input type="checkbox" name="live_access" value="1" class="custom-switch-input">
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                        </label>
                                                </div>
                                        </div>
                                        
                                    <div class="card-footer">
                                        <!--Row-->
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-9">
                                                <button type="submit" class="btn btn-primary">اضافة</button>
                                            </div>
                                        </div>
                                        <!--End Row-->
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                        <!-- /ROW-1 CLOSED -->
                    </div>
                    <!-- CONTAINER CLOSED -->
                </div>
            </div>
@endsection