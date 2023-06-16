 @extends('layouts.teacherdashboard')

@section('content')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">اعداد الزووم</h1>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW-1 OPEN -->
            <div class="row">
                <div class="col-lg-12">
                    <form method="post" action="{{route('post.teacher.zoom-integration')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">المطلوب</div>
                            </div>
                            <div class="card-body">
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label"> client id :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="client_id" placeholder="client id" value="{{$c_id}}">
                                        @error('client_id')
                                        <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label"> client secret :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="client_secret" placeholder="client secret" value="{{$c_secret}}">
                                        @error('client_secret')
                                        <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label"> jwtToken :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="jwt" placeholder="jwtToken" value="{{$jwt}}">
                                        @error('jwt')
                                        <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label"> zoom email :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="zoom_email" placeholder="zoom email" value="{{$zoom_email}}">
                                        @error('zoom_email')
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
