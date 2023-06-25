@extends('layouts.dashboard')

@section('content')
<div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">اضافة سؤال</h1>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- ROW-1 OPEN -->
                        <div class="row">
                            <div class="col-lg-12">
                            <form method="post" action="{{route('post.admin.common-question.create')}}" enctype= "multipart/form-data">
                            @csrf
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">اضافة سؤال جديد</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> السؤال :</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="question" placeholder=" السؤال">
                                                @error('question')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> الاجابة :</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="answer" placeholder=" الاجابة">
                                                @error('answer')
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