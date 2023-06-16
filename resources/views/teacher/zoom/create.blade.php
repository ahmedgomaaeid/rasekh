 @extends('layouts.teacherdashboard')

@section('content')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">اضافة بث</h1>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW-1 OPEN -->
            <div class="row">
                <div class="col-lg-12">
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    <form method="post" action="{{route('post.teacher.zoom-meeting.create')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">اضافة بث جديد</div>
                            </div>
                            <div class="card-body">
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label"> السؤال :</label>
                                    <div class="col-md-9">
                                        <input type="datetime-local" class="form-control" name="start_time" id = "start_time" onclick="showpick()">
                                        @error('start_time')
                                        <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                            <label class="col-md-3 form-label"> الكورس:</label>
                                            <div class="col-md-9">
                                                <select name="course_id" class="form-control form-select select2" data-bs-placeholder="القسم الرئسي">
                                                @foreach ($courses as $course)
                                                    <option value="{{$course->id}}">{{$course->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('course_id')
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
<script>
    function showpick() {
        document.getElementById("start_time").showPicker();
    }
</script>
@endsection
