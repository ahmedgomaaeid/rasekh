@extends('layouts.front')
@section('title')
@include('layouts.frontimplement.topcategory')
@endsection
@section('content')
<div id="content" class="site-content">
    <div class="container">
        <div class="bb-grid site-content-grid">
            <div id="primary" class="content-area bb-grid-cell">
                <main id="main" class="site-main">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card chat-app">
                                <div id="plist" class="people-list">
                                    <ul class="list-unstyled chat-list mt-2 mb-0">
                                        @foreach ($messages as $message)
                                            <a href="{{route('chat',$message->id)}}">
                                                <li class="clearfix">
                                                    <img src="
                                                    @if($message->teacher->photo == null)
                                                        https://www.gravatar.com/avatar/18c09435dd06ec766fd8ade4631cf4d7?s=100&#038;r=g&#038;d=mm
                                                    @else
                                                        {{route('index')}}/assets/images/teachers/{{$message->teacher->photo}}
                                                    @endif
                                                    " alt="avatar">
                                                    <div class="about">
                                                        <div class="name">المعلم {{$message->teacher->name}} / درس {{$message->lesson->name}} / التابع لكورس {{$message->lesson->course->name}}</div>
                                                        @if($message->student_read == 0)
                                                            <div class="status"> <i class="fa fa-circle online"></i> هناك رسالة جديدة</div>
                                                        @else
                                                            <div class="status"> لا يوجد رسائل جديدة</div>
                                                        @endif
                                                    </div>
                                                </li>
                                            </a>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </main><!-- #main -->
            </div><!-- #primary -->



        </div><!-- .bb-grid -->
    </div><!-- .container -->
</div><!-- #content -->
@endsection
