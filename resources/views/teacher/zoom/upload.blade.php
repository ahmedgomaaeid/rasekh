 @extends('layouts.teacherdashboard')

 @section('content')
 <div class="main-content app-content mt-0">
     <div class="side-app">

         <!-- CONTAINER -->
         <div class="main-container container-fluid">

             <!-- PAGE-HEADER -->
             <div class="page-header">
                 <h1 class="page-title">رفع مجلد البث</h1>
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
                     <form method="post" action="{{route('post.teacher.zoom-meeting.upload')}}" enctype="multipart/form-data">
                         @csrf
                         <div class="card">
                             <div class="card-header">
                                 <div class="card-title">رفع مجلد البث</div>
                             </div>
                             <div class="card-body">
                                 <input type="hidden" name="folder_name" id="folder_name">

                                 <div class="row mb-4">
                                     <input type="file" class="dropify" data-bs-height="180" id="folder" name="folder" webkitdirectory directory multiple onchange="folderr()">
                                         @error('lesson_name')
                                         <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                         @enderror
                                     
                                 </div>


                                 <div class="card-footer">
                                     <!--Row-->
                                     <div class="row">
                                         <div class="col-md-3"></div>
                                         <div class="col-md-9">
                                             <button type="submit" class="btn btn-primary">رفع</button>
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
    // make it as js $('.dropify-message p').text('قم بسحب وإفلات الملفات هنا أو انقر لتحميلها');
    document.querySelector('.dropify-message p')[0].innerHTML = 'قم بسحب وإفلات الملفات هنا أو انقر لتحميلها';
    function folderr() {
        var x = document.getElementById("folder").files;
        var txt = x[0].webkitRelativePath;
        document.getElementById("folder_name").value = txt;
    }
    function showpick() {
        document.getElementById("start_time").showPicker();
    }

 </script>
 @endsection
