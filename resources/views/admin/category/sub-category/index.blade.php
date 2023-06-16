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
                                        <h3 class="card-title mb-0">الاقسام الفرعية</h3>
                                    </div>
                                    <div class="card-body pt-4">
                                        <div class="grid-margin">
                                            <div class="">
                                                <div class="panel panel-primary">
                                                    <div class="tab-menu-heading border-0 p-0">
                                                        <div class="tabs-menu1">
                                                            <!-- Tabs -->
                                                            <ul class="nav panel-tabs product-sale">
                                                                <li><a href="{{route('get.admin.sub-category.create')}}" class="active"
                                                                        >اضافة قسم</a></li>
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
                                                                                    القسم</th>
                                                                                <th class="bg-transparent border-bottom-0"
                                                                                    style="width: 5%;">القسم الرئسي</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    الحالة</th>
                                                                                <th class="bg-transparent border-bottom-0"
                                                                                    style="width: 5%;">العمليات</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($subCategories as $cate)

                                                                                <tr class="border-bottom">
                                                                                
                                                                                <td>
                                                                                    <div class="d-flex">
                                                                                    <span class="avatar bradius"
                                                                                                style="background-image: url(@if($cate->photo == null) {{route('index')}}/assets/images/orders/10.jpg
                                                                                                @else
                                                                                                    {{route('index')}}/assets/images/subCategory/{{$cate->photo}}
                                                                                                @endif
                                                                                                )"></span>
                                                                                        <div
                                                                                            class="ms-3 mt-0 mt-sm-2 d-block">
                                                                                            <h6
                                                                                                class="mb-0 fs-14 fw-semibold">
                                                                                                 {{$cate->name}}</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                
                                                                                <td>
                                                                                    <div class="d-flex">
                                                                                        <div
                                                                                            class="ms-3 mt-0 mt-sm-2 d-block">
                                                                                            <h6
                                                                                                class="mb-0 fs-14 fw-semibold">
                                                                                                 {{$cate->mainCategory->name}}</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                        {{$cate->status}}</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                <td>
                                                                                    <div class="g-2">
                                                                                        <a class="btn text-primary btn-sm"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-original-title="Edit" href="{{route('get.admin.sub-category.edit',$cate->id)}}"><span
                                                                                                class="fe fe-edit fs-14"></span></a>
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
                        <!-- ROW-4 END -->
                    </div>
                    <!-- CONTAINER END -->
                </div>
            </div>
@endsection