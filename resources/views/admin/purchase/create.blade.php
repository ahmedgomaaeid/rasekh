@extends('layouts.dashboard')

@section('content')
<div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">اضافة اشتراك</h1>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- ROW-1 OPEN -->
                        <div class="row">
                            <div class="col-lg-12">
                            <form method="post" action="{{route('post.admin.purchase.create')}}" enctype= "multipart/form-data">
                            @csrf
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">اضافة اشتراك جديد</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> الكورس:</label>
                                            <div class="col-md-9">
                                                <select name="course_id" class="form-control form-select select2" data-bs-placeholder="القسم الرئسي">
                                                @foreach ($courses as $course)
                                                    <option value="{{$course->id}}">{{$course->category->mainCategory->name}} / {{$course->category->name}} / {{$course->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('course_id')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> الطالب:</label>
                                            <div class="col-md-9">
                                                <select name="student_id" class="form-control form-select select2" data-bs-placeholder="الطالب">
                                                @foreach ($students as $student)
                                                    <option value="{{$student->id}}">{{$student->name}} / {{$student->email}}</option>
                                                @endforeach
                                            </select>
                                            @error('student_id')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label">تاريخ الانتهاء :</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                <div class="input-group-text">
                                                    <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                </div><input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text" name = "finnished_at">
                                                @error('finnished_at')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                            </div>
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