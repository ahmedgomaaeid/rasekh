@extends('layouts.teacherdashboard')

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
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title mb-0">البث المباشر</h3>
                                    </div>
                                    <div class="card-body pt-4">
                                        <div class="grid-margin">
                                            <div class="">
                                                <div class="panel panel-primary">
                                                    <div class="tab-menu-heading border-0 p-0">
                                                        <div class="tabs-menu1">
                                                            <!-- Tabs -->
                                                            <ul class="nav panel-tabs product-sale">
                                                                <li><a href="{{route('get.teacher.zoom-meeting.create')}}" class="active"
                                                                        >اضافة بث</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="panel-body tabs-menu-body border-0 pt-0">
                                                        <div class="tab-content">
                                                            <div class="tab-pane active" id="tab5">
                                                                <div class="table-responsive">
                                                                    <table id="data-table"
                                                                        class="table table-bordered text-nowrap mb-0">
                                                                        <thead class="border-top">
                                                                            <tr>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    الدرس</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    دخول البث</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    الموعد</th>
                                                                                
                                                                                <th class="bg-transparent border-bottom-0"
                                                                                    style="width: 5%;">حذف</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($zoomMeetings as $meeting)
                                                                                    <tr class="border-bottom">
                                                                                        <td>
                                                                                            <div class="d-flex">
                                                                                                <div
                                                                                                    class="mt-0 mt-sm-3 d-block">
                                                                                                    <h6
                                                                                                        class="mb-0 fs-14 fw-semibold">
                                                                                                            {{$meeting->course->name}} 
                                                                                                            </h6>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="d-flex">
                                                                                                <div
                                                                                                    class="mt-0 mt-sm-3 d-block">
                                                                                                    <h6
                                                                                                        class="mb-0 fs-14 fw-semibold">
                                                                                                            @if ($meeting->start_time < now() && $meeting->start_time > now()->subMinutes(60))
                                                                                                                <a href="{{route('teacher.meet', $meeting->id)}}" >دخول البث</a>
                                                                                                            @endif 
                                                                                                            </h6>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="d-flex">
                                                                                                <div
                                                                                                    class="mt-0 mt-sm-3 d-block">
                                                                                                    <h6
                                                                                                        class="mb-0 fs-14 fw-semibold">
                                                                                                            {{$meeting->start_time}}</h6>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    
                                                                                        <td>
                                                                                            <div class="g-2">
                                                                                                <a class="btn text-danger btn-sm"
                                                                                                data-bs-toggle="tooltip"
                                                                                                data-bs-original-title="Delete" href="{{route('get.teacher.zoom-meeting.delete',$meeting->id)}}"><span
                                                                                                class="fe fe-trash-2 fs-14"></span></a>
                                                                                            </div>
                                                                                        </td>
                                                                                
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ROW-4 END -->
                        <iframe src="file:///C:/laragon/www/study/zoom/zoom-sdk-web-2.9.7/CDN/meeting.html?name=YWhtZWQgZWlk&mn=74556439021&email=&pwd=ahmedeid&role=1&lang=en-US&signature=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzZGtLZXkiOiI0TkNrdzNSNVRpR21lZUtrazFPNEEiLCJpYXQiOjE2NzcxMDg3NTgsImV4cCI6MTY3NzExNTk1OCwibW4iOjc0NTU2NDM5MDIxLCJyb2xlIjoxfQ.eg4j1voyX7A6gIeHPKElpy034zymtDqkLXKhgj7ziZ8&china=0&sdkKey=4NCkw3R5TiGmeeKkk1O4A" height="200" width="300" title="Iframe Example"></iframe>
                    </div>
                    <!-- CONTAINER END -->
                </div>
            </div>
@endsection