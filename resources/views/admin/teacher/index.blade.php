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
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title mb-0">المعلمون</h3>
                                    </div>
                                    <div class="card-body pt-4">
                                        <div class="grid-margin">
                                            <div class="">
                                                <div class="panel panel-primary">
                                                    <div class="tab-menu-heading border-0 p-0">
                                                        <div class="tabs-menu1">
                                                            <!-- Tabs -->
                                                            <ul class="nav panel-tabs product-sale">
                                                                <li><a href="{{route('get.admin.teacher.create')}}" class="active"
                                                                        >اضافة معلم</a></li>
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
                                                                                <th class="bg-transparent border-bottom-0"
                                                                                    style="width: 5%;">رقم الهاتف</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    الاسم</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    البريد الالكتروني</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    الحالة</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    صلاحية النشر</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    صلاحية البث</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    الاقسام</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    تاريخ الانشاء</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    الوصف</th>
                                                                                <th class="bg-transparent border-bottom-0"
                                                                                    style="width: 5%;">تعديل</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($teachers as $teacher)
                                                                                <tr class="border-bottom">
                                                                                    <td class="text-center">
                                                                                        <div class="mt-0 mt-sm-2 d-block">
                                                                                            <h6
                                                                                                class="mb-0 fs-14 fw-semibold">
                                                                                                
                                                                                                {{$teacher->phone}}</h6>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <span class="avatar bradius"
                                                                                                style="background-image: url(@if($teacher->photo == null) {{route('index')}}/assets/images/orders/10.jpg
                                                                                                @else
                                                                                                    {{route('index')}}/assets/images/teachers/{{$teacher->photo}}
                                                                                                @endif
                                                                                                )"></span>
                                                                                            <div
                                                                                                class="ms-3 mt-0 mt-sm-2 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                     {{$teacher->name}}</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                        {{$teacher->email}}</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                        {{$teacher->status}}</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                        {{$teacher->course_access}}</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                        {{$teacher->live_access}}</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                    @foreach ($teacher->teacher_categories as $cate  )
                                                                                                        {{$cate->category->mainCategory->name}} / {{$cate->category->name}} 
                                                                                                        @if(!$loop->last)
                                                                                                         , 
                                                                                                            @endif
                                                                                                    @endforeach
                                                                                                        </h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td><span class="mt-sm-2 d-block">{{$teacher->created_at}}
                                                                                            </span></td>
                                                                                    <td><span
                                                                                            class="fw-semibold mt-sm-2 d-block">{{$teacher->description}}</span>
                                                                                    </td>
                                                                                    <td>
                                                                                    <div class="g-2">
                                                                                        <a class="btn text-primary btn-sm"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-original-title="Edit" href="{{route('get.admin.teacher.edit',$teacher->id)}}"><span
                                                                                                class="fe fe-edit fs-14"></span></a>
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