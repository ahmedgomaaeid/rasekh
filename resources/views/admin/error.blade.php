 @extends('layouts.dashboard')

 @section('content')
 <div class="main-content app-content mt-0">
     <div class="side-app">

         <!-- CONTAINER -->
         <div class="main-container container-fluid">

             <!-- ROW-4 -->
             <div class="row" style="padding-top: 25px;">
                 <div class="col-12 col-sm-12">
                     @if(session()->has('success'))
                     <div class="alert alert-success">
                         {{ session()->get('success') }}
                     </div>
                     @endif
                     @foreach ($errors as $error)
                        <div class="col-md-12 col-xl-12">
                            <div class="card text-danger bg-danger-transparent card-transparent">
                                <div class="card-body">
                                    <p class="card-text">{{$error->text}}</p>
                                </div>
                            </div>
                        </div>
                     @endforeach
                 </div>
             </div>
             <!-- ROW-4 END -->
         </div>
         <!-- CONTAINER END -->
     </div>
 </div>
 @endsection
