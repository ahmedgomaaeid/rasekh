@extends('layouts.dashboard')

@section('content')
<div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">تعديل مشرف</h1>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- ROW-1 OPEN -->
                        <div class="row">
                            <div class="col-lg-12">
                            <form method="post" action="{{route('post.admin.edit',$admin->id)}}">
                            @csrf
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">تعديل مشرف </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label">اسم المشرف :</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="name" placeholder="اسم المشرف" value="{{$admin->name}}">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label">البريد الالكتروني :</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="email" placeholder="البريد الالكترونى" value="{{$admin->email}}">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label">كلمة المرور  :</label>
                                            <div class="col-md-9">
                                                <input type="password" class="form-control" name="password" placeholder="كلمة المرور">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label">ادارة المشرفين :</label>
                                                <div class="form-group">
                                                    <label class="custom-switch form-switch mb-0">
                                                            <input type="checkbox" name="p_admin" value="1" class="custom-switch-input"
                                                            @if($admin->p_admin == 'مفعل')
                                                                checked
                                                                @endif
                                                            >
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                        </label>
                                                </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label">ادارة الكورسات:</label>
                                                <div class="form-group">
                                                    <label class="custom-switch form-switch mb-0">
                                                            <input type="checkbox" name="p_course" value="1" class="custom-switch-input"
                                                            @if($admin->p_course == 'مفعل')
                                                                checked
                                                                @endif
                                                                >
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                        </label>
                                                </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label">ادارة الاشتراكات:</label>
                                                <div class="form-group">
                                                    <label class="custom-switch form-switch mb-0">
                                                            <input type="checkbox" name="p_purchase" value="1" class="custom-switch-input"
                                                            @if($admin->p_purchase == 'مفعل')
                                                                checked
                                                                @endif
                                                                >
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                        </label>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <!--Row-->
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-9">
                                                <button type="submit" class="btn btn-primary">تعديل</button>
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