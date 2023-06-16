@extends('layouts.dashboard')

@section('content')
<div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">تعديل اشتراك</h1>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- ROW-1 OPEN -->
                        <div class="row">
                            <div class="col-lg-12">
                            <form method="post" action="{{route('post.admin.purchase.edit',$purchase->id)}}" enctype= "multipart/form-data">
                            @csrf
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">تعديل اشتراك</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> الكورس:</label>
                                            <div class="col-md-9">
                                                <select name="course_id" class="form-control form-select select2" data-bs-placeholder="القسم الرئسي">
                                                @foreach ($courses as $course)
                                                @if ($course->id == $purchase->course_id)
                                                    <option value="{{$course->id}}" selected>{{$course->category->mainCategory->name}} / {{$course->category->name}} / {{$course->name}}</option>
                                                @else
                                                    <option value="{{$course->id}}">{{$course->category->mainCategory->name}} / {{$course->category->name}} / {{$course->name}}</option>
                                                @endif
                                                    
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> الطالب:</label>
                                            <div class="col-md-9">
                                                <select name="student_id" class="form-control form-select select2" data-bs-placeholder="القسم الرئسي">
                                                @foreach ($students as $student)
                                                @if ($student->id == $purchase->student_id)
                                                    <option value="{{$student->id}}" selected>{{$student->name}} / {{$student->email}}</option>
                                                @else
                                                    <option value="{{$student->id}}">{{$student->name}} / {{$student->email}}</option>
                                                @endif
                                                    
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label">تاريخ الانتهاء :</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                <div class="input-group-text">
                                                    <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                </div><input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text" name = "finnished_at" value="{{$purchase->finnished_at}}">
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