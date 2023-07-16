 @extends('layouts.teacherdashboard')

 @section('content')
 <div class="main-content app-content mt-0">
     <div class="side-app">

         <!-- CONTAINER -->
         <div class="main-container container-fluid">
             @if(session()->has('success'))
             <div class="alert alert-success">
                 {{ session()->get('success') }}
             </div>
             @endif
                @if(session()->has('status'))
                <div class="alert alert-danger">
                    {{ session()->get('status') }}
                </div>
                @endif
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
                                     <label class="col-md-3 form-label">oauth client id :</label>
                                     <div class="col-md-9">
                                         <input type="text" class="form-control" name="oauth_client_id" placeholder="oauth client id" value="{{$oauth_c_id}}">
                                         @error('oauth_client_id')
                                         <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                         @enderror
                                     </div>
                                 </div>
                                 <div class="row mb-4">
                                     <label class="col-md-3 form-label">oauth client secret :</label>
                                     <div class="col-md-9">
                                         <input type="text" class="form-control" name="oauth_client_secret" placeholder="oauth client secret" value="{{$oauth_c_secret}}">
                                         @error('oauth_client_secret')
                                         <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                         @enderror
                                     </div>
                                 </div>
                                 <div class="row mb-4">
                                     <label class="col-md-3 form-label">sdk client id :</label>
                                     <div class="col-md-9">
                                         <input type="text" class="form-control" name="sdk_client_id" placeholder="sdk client id" value="{{$sdk_c_id}}">
                                         @error('sdk_client_id')
                                         <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                         @enderror
                                     </div>
                                 </div>
                                 <div class="row mb-4">
                                     <label class="col-md-3 form-label">sdk client secret :</label>
                                     <div class="col-md-9">
                                         <input type="text" class="form-control" name="sdk_client_secret" placeholder="sdk client secret" value="{{$sdk_c_secret}}">
                                         @error('sdk_client_secret')
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
                                         @if($zoom_token == null && $oauth_c_id != null && $oauth_c_secret != null && $sdk_c_id != null && $sdk_c_secret != null)
                                         <div class="col-md-3"></div>
                                         <div class="col-md-9" style="margin-top: 15px;">
                                             <a href="{{route('get.teacher.zoom-meeting.connect')}}" class="btn btn-success">اتصال</a>
                                         </div>
                                         @endif
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
