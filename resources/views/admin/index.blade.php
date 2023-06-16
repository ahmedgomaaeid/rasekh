@extends('layouts.dashboard')
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
                            <h1 class="page-title">لوحة التحكم</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">الرئسية</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">لوحة التحكم</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- ROW-1 -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h6 class="">عدد الطلاب</h6>
                                                        <h2 class="mb-0 number-font">{{$students}}</h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <div class="chart-wrapper mt-1">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h6 class="">عدد المعلمين</h6>
                                                        <h2 class="mb-0 number-font">{{$app_teachers}}</h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h6 class="">طلبات المعلمين</h6>
                                                        <h2 class="mb-0 number-font">{{$unapp_teachers}}</h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h6 class="">ارباح الموقع</h6>
                                                        <h2 class="mb-0 number-font"><i class="fa fa-shekel"></i> {{$price - $dues - $received}}</h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ROW-1 END -->
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title mb-0">طلبات المعلمين</h3>
                                    </div>
                                    <div class="card-body pt-4">
                                        <div class="grid-margin">
                                            <div class="">
                                                <div class="panel panel-primary">
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
                                                                                    الاقسام</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    تاريخ الانشاء</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    الوصف</th>
                                                                                <th class="bg-transparent border-bottom-0"
                                                                                    style="width: 5%;">الموافقة</th>
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
                                                                                                        {{$teacher->sections}}</h6>
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
                                                                                                data-bs-original-title="approve"href="{{route('get.admin.teacher.approve',$teacher->id)}}"><span
                                                                                                    class="fe fe-check-circle fs-14"></span></a>
                                                                                            <a class="btn text-danger btn-sm"
                                                                                                data-bs-toggle="tooltip"
                                                                                                data-bs-original-title="Delete" href="{{route('get.admin.teacher.delete',$teacher->id)}}"><span
                                                                                                    class="fe fe-x-circle fs-14"></span></a>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
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
                        <!-- ROW-1 END -->

                        <!-- ROW-2 -->
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title mb-0">مستحقات المعلمين</h3>
                                    </div>
                                    <div class="card-body pt-4">
                                        <div class="grid-margin">
                                            <div class="">
                                                <div class="panel panel-primary">
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
                                                                                    الاسم</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    البريد الالكتروني</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    الارباح المستلمة</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    المستحقات</th>
                                                                                
                                                                                <th class="bg-transparent border-bottom-0"
                                                                                    style="width: 5%;">اتمام الدفع</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($teacher_dues as $due)
                                                                                <tr class="border-bottom">
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <span class="avatar bradius"
                                                                                                style="background-image: url(@if($due->photo == null) {{route('index')}}/assets/images/orders/10.jpg
                                                                                                @else
                                                                                                    {{route('index')}}/assets/images/teachers/{{$due->photo}}
                                                                                                @endif
                                                                                                )"></span>
                                                                                            <div
                                                                                                class="ms-3 mt-0 mt-sm-2 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                     {{$due->name}}</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                        {{$due->email}}</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                        {{$due->received}} <i class="fa fa-shekel"></i></h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                        {{$due->dues}} <i class="fa fa-shekel"></i></h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    
                                                                                    <td>
                                                                                        <div class="g-2">
                                                                                            <a class="btn text-primary btn-lg"
                                                                                                data-bs-toggle="tooltip"
                                                                                                data-bs-original-title="send money" href="{{route('get.admin.teacher.send_money',$due->id)}}"><span
                                                                                                    class="fa fa-money"></span></a>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
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
                        <!-- ROW-2 END -->
                        
                    </div>
                    <!-- CONTAINER END -->
                </div>
            </div>
@endsection