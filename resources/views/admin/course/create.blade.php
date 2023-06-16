@extends('layouts.dashboard')

@section('content')
<div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">اضافة كورس</h1>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- ROW-1 OPEN -->
                        <div class="row">
                            <div class="col-lg-12">
                            <form method="post" action="{{route('post.admin.course.create')}}" enctype= "multipart/form-data">
                            @csrf
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">اضافة كورس جديد</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-5">
                                            <div class="col-lg-4 col-sm-12 mb-4 mb-lg-0" style="margin: auto;">
                                                <input type="file" name="image" class="dropify" data-bs-height="180" />
                                                @error('image')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label">اسم الكورس :</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="name" placeholder="اسم الكورس">
                                                @error('name')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label">سعر الكورس :</label>
                                            <div class="input-group col-md-9">
                                                <span class="input-group-text"><i class="fa fa-shekel"></i></span>
                                                <input type="text" class="form-control br-0" name="price" placeholder="سعر الكورس" aria-label="Amount (to the nearest shekl)">
                                                @error('price')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label">نسبة المعلم:</label>
                                            <div class="input-group col-md-9">
                                                <span class="input-group-text">%</span>
                                                <input type="text" class="form-control br-0" name="teacher_percentage" placeholder="نسبة المعلم" aria-label="%">
                                                @error('teacher_percentage')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label">ينتهي بعد :</label>
                                            <div class="input-group col-md-9">
                                                <span class="input-group-text">يوم</span>
                                                <input type="text" class="form-control br-0" name="finnish_after" placeholder="ينتهي بعد" aria-label="">
                                                @error('finnish_after')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label">المعلم :</label>
                                            <div class="col-md-9">
                                                <select name="teacher_id" class="form-control form-select select2" data-bs-placeholder="المعلم">
                                                @foreach ($teachers as $teacher)
                                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> قسم الكورس :</label>
                                            <div class="col-md-9">
                                                <select name="category_id" class="form-control form-select select2" data-bs-placeholder="القسم الرئسي">
                                                @foreach ($categories as $cate)
                                                    <option value="{{$cate->id}}">{{$cate->mainCategory->name}} / {{$cate->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
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