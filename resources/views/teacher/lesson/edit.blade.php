@extends('layouts.teacherdashboard')

@section('content')
<div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">تعديل درس</h1>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- ROW-1 OPEN -->
                        <div class="row">
                            <div class="col-lg-12">
                            <form method="post" action="{{route('post.teacher.lesson.edit',$lesson->id)}}" enctype= "multipart/form-data">
                            @csrf
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">تعديل درس</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-4">
                                        <label class="col-md-3 form-label"> ملف الفيديو :</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="file" name="video">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label">اسم الدرس :</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="name" placeholder="اسم الدرس" value="{{$lesson->name}}">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> الكورس :</label>
                                            <div class="col-md-9">
                                                <select name="course_id" class="form-control form-select select2" data-bs-placeholder="القسم الرئسي">
                                                @foreach ($courses as $course)
                                                    @if($course->id == $lesson->course_id)
                                                        <option value="{{$course->id}}" selected>{{$course->name}} / {{$course->steacher->name}}</option>
                                                    @else
                                                        <option value="{{$course->id}}">{{$course->name}} / {{$course->steacher->name}}</option>
                                                    @endif
                                                   
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label">حالة الدرس :</label>
                                                <div class="form-group">
                                                    <label class="custom-switch form-switch mb-0">
                                                            <input type="checkbox" name="status" value="1" class="custom-switch-input" 
                                                            @if($lesson->status == 'مفعل')
                                                                checked
                                                                @endif
                                                            >
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                        </label>
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