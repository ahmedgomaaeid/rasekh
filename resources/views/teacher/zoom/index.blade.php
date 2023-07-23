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
                                                                                    اسم الدرس</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    الكورس</th>
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
                                                                                                            {{$meeting->lesson_name}} 
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
                                                                                                            @if ($meeting->start_time > now() && $meeting->start_time < now()->addMinutes(60))
                                                                                                                <a href="{{$meeting->start_url}}" class="btn btn-primary btn-sm">دخول البث</a>
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
                    </div>
                    <!-- CONTAINER END -->
                </div>
            </div>
@endsection