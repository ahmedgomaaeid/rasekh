@extends('layouts.teacherdashboard')

@section('content')
<div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">تعديل سؤال</h1>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- ROW-1 OPEN -->
                        <div class="row">
                            <div class="col-lg-12">
                            <form method="post" action="{{route('post.teacher.question.edit',$question->id)}}" enctype= "multipart/form-data">
                            @csrf
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">تعديل سؤال</div>
                                    </div>
                                    <div class="card-body">
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label"> السؤال :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="title" placeholder="السؤال" value="{{$question->title}}">
                                        @error('title')
                                        <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label"> درجة السؤال :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="points" placeholder="درجة السؤال" value="{{$question->points}}">
                                        @error('points')
                                        <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">الاختيار الاول :</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="answer1" placeholder="الاختيار الاول" value="{{$question->answer1}}">

                                        @error('answer1')
                                        <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <label class="custom-control custom-radio-md">
                                        <input type="radio" class="custom-control-input" name="answer" value="1" @if($question->right_answer==1) checked @endif>
                                        <span class="custom-control-label">الاجابة الصحيحة</span>
                                    </label>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">الاختيار الثاني :</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="answer2" placeholder="الاختيار الثاني" value="{{$question->answer2}}">

                                        @error('answer2')
                                        <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <label class="custom-control custom-radio-md">
                                        <input type="radio" class="custom-control-input" name="answer" value="2" @if($question->right_answer==2) checked @endif>
                                        <span class="custom-control-label">الاجابة الصحيحة</span>
                                    </label>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">الاختيار الثالث :</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="answer3" placeholder="الاختيار الثالث" value="{{$question->answer3}}">

                                        @error('answer3')
                                        <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <label class="custom-control custom-radio-md">
                                        <input type="radio" class="custom-control-input" name="answer" value="3" @if($question->right_answer==3) checked @endif>
                                        <span class="custom-control-label">الاجابة الصحيحة</span>
                                    </label>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">الاختيار الرابع :</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="answer4" placeholder="الاختيار الرابع" value="{{$question->answer4}}">

                                        @error('answer4')
                                        <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <label class="custom-control custom-radio-md">
                                        <input type="radio" class="custom-control-input" name="answer" value="4" @if($question->right_answer==4) checked @endif>
                                        <span class="custom-control-label">الاجابة الصحيحة</span>
                                    </label>
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