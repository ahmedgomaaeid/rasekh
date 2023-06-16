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
                                                        <h6 class="">الارباح المستلمة</h6>
                                                        <h2 class="mb-0 number-font">{{$received}} <i class="fa fa-shekel"></i></h2>
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
                                                        <h6 class="">المستحقات</h6>
                                                        <h2 class="mb-0 number-font">{{$dues}} <i class="fa fa-shekel"></i></h2>
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
                                                        <h6 class="">الارباح الكلية</h6>
                                                        <h2 class="mb-0 number-font">{{$dues + $received}} <i class="fa fa-shekel"></i></h2>
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
                                                        <h6 class="">عدد كورساتك</h6>
                                                        <h2 class="mb-0 number-font"> {{$teacher_courses}}</h2>
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
                        
                         <!-- Row -->
                        <div class="row row-sm">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class=" pt-0 main-chat-2">
                                        <div class="main-content-left main-content-left-chat">
                                            <div class="tab-content main-chat-list flex-2 ">
                                                <div class="tab-pane active" id="ChatList">
                                                    <div class=" tab-pane">
                                                    @foreach ($messages as $message )
                                                        <a class="media new" href="{{route('get.teacher.chat.chat',$message->id)}}">
                                                            <div class="main-img-user">
                                                            @if($message->student->photo==null)
                                                                <img alt="" src="{{route('index')}}/assets/images/users/6.jpg"> 
                                                            @else
                                                                <img alt="" src="{{route('index')}}/assets/images/students/{{$message->student->photo}}"> 
                                                            @endif
                                                                @if($message->teacher_read == 0)
                                                                <span></span>
                                                                @endif
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="media-contact-name">
                                                                    <span>{{$message->student->name}}</span>
                                                                </div>
                                                                <p>رسالة من درس {{$message->lesson->name}} التابع لكورس {{$message->lesson->course->name}}</p>
                                                            </div>
                                                        </a>
                                                    @endforeach
                                                    </div>
                                                    <!-- main-chat-list -->
                                                </div>
                                                <!-- main-chat-list -->
                                                <div class="tab-pane" id="ChatGroups">
                                                    <div class="d-flex align-items-center media border-top-0">
                                                        <div class="mb-0 me-2">
                                                            <div class="main-img-user online text-primary">
                                                                <img alt="" src="../assets/images/users/4.jpg"> <span>2</span>
                                                            </div>
                                                        </div>
                                                        <div class="align-items-center justify-content-between">
                                                            <div class="media-body ms-2">
                                                                <div class="media-contact-name">
                                                                    <span>Web Designers</span>
                                                                    <span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ms-auto"> <a href="javascript:void(0)"><i class="contact-status text-primary fe fe-user-plus"></i></a> </div>
                                                    </div>
                                                    <div class="d-flex align-items-center media">
                                                        <div class="mb-0 me-2">
                                                            <div class="main-img-user online">
                                                                <img alt="" src="../assets/images/users/4.jpg"> <span>2</span>
                                                            </div>
                                                        </div>
                                                        <div class="align-items-center justify-content-between">
                                                            <div class="media-body ms-2">
                                                                <div class="media-contact-name">
                                                                    <span>Project 2020</span>
                                                                    <span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ms-auto"> <a href="javascript:void(0)"><i class="contact-status text-primary fe fe-user-plus"></i></a> </div>
                                                    </div>
                                                    <div class="d-flex align-items-center media">
                                                        <div class="mb-0 me-2">
                                                            <div class="main-img-user online">
                                                                <img alt="" src="../assets/images/users/9.jpg"> <span>2</span>
                                                            </div>
                                                        </div>
                                                        <div class="align-items-center justify-content-between">
                                                            <div class="media-body ms-2">
                                                                <div class="media-contact-name">
                                                                    <span>Project 2021</span>
                                                                    <span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ms-auto"> <a href="javascript:void(0)"><i class="contact-status text-primary fe fe-user-plus"></i></a> </div>
                                                    </div>
                                                    <div class="d-flex align-items-center media">
                                                        <div class="mb-0 me-2">
                                                            <div class="main-img-user online">
                                                                <img alt="" src="../assets/images/users/12.jpg"> <span>2</span>
                                                            </div>
                                                        </div>
                                                        <div class="align-items-center justify-content-between">
                                                            <div class="media-body ms-2">
                                                                <div class="media-contact-name">
                                                                    <span>Freshers</span>
                                                                    <span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ms-auto"> <a href="javascript:void(0)"><i class="contact-status text-primary fe fe-user-plus"></i></a> </div>
                                                    </div>
                                                    <div class="d-flex align-items-center media">
                                                        <div class="mb-0 me-2">
                                                            <div class="main-img-user online">
                                                                <img alt="" src="../assets/images/users/6.jpg"> <span>2</span>
                                                            </div>
                                                        </div>
                                                        <div class="align-items-center justify-content-between">
                                                            <div class="media-body ms-2">
                                                                <div class="media-contact-name">
                                                                    <span>Experienced</span>
                                                                    <span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ms-auto"> <a href="javascript:void(0)"><i class="contact-status text-primary fe fe-user-plus"></i></a> </div>
                                                    </div>
                                                    <div class="d-flex align-items-center media">
                                                        <div class="mb-0 me-2">
                                                            <div class="main-img-user online">
                                                                <img alt="" src="../assets/images/users/7.jpg"> <span>2</span>
                                                            </div>
                                                        </div>
                                                        <div class="align-items-center justify-content-between">
                                                            <div class="media-body ms-2">
                                                                <div class="media-contact-name">
                                                                    <span>Freelancer</span>
                                                                    <span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ms-auto"> <a href="javascript:void(0)"><i class="contact-status text-primary fe fe-user-plus"></i></a> </div>
                                                    </div>
                                                    <div class="text-center p-5">
                                                        <a href="javascript:void(0)" class="btn btn-outline-primary">Create New Group</a>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="ChatContacts">
                                                    <div>
                                                        <div class="py-4 px-6 fw-bold">A</div>
                                                        <div class="d-flex align-items-center media">
                                                            <div class="mb-0 me-2">
                                                                <div class="main-img-user online">
                                                                    <img alt="" src="../assets/images/users/3.jpg"> <span>2</span>
                                                                </div>
                                                            </div>
                                                            <div class="align-items-center justify-content-between">
                                                                <div class="media-body ms-2">
                                                                    <div class="media-contact-name">
                                                                        <span>Anna Sthesia</span>
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="d-flex align-items-center">
                                                                        <p class="text-muted fs-13">Home</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <a href="javascript:void(0)"><i class="contact-status text-primary fe fe-message-square me-2"></i></a>
                                                                <a href="javascript:void(0)"><i class="contact-status text-success fe fe-phone-call me-2"></i></a>
                                                                <a href="javascript:void(0)"><i class="contact-status text-danger fe fe-video me-2"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center media">
                                                            <div class="mb-0 me-2">
                                                                <div class="main-img-user online">
                                                                    <img alt="" src="../assets/images/users/9.jpg"> <span>2</span>
                                                                </div>
                                                            </div>
                                                            <div class="align-items-center justify-content-between">
                                                                <div class="media-body ms-2">
                                                                    <div class="media-contact-name">
                                                                        <span>Abraham Clark</span>
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="d-flex align-items-center">
                                                                        <p class="text-muted fs-13">Mobile</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <a href="javascript:void(0)"><i class="contact-status text-primary fe fe-message-square me-2"></i></a>
                                                                <a href="javascript:void(0)"><i class="contact-status text-success fe fe-phone-call me-2"></i></a>
                                                                <a href="javascript:void(0)"><i class="contact-status text-danger fe fe-video me-2"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center media">
                                                            <div class="mb-0 me-2">
                                                                <div class="main-img-user online">
                                                                    <img alt="" src="../assets/images/users/4.jpg"> <span>2</span>
                                                                </div>
                                                            </div>
                                                            <div class="align-items-center justify-content-between">
                                                                <div class="media-body ms-2">
                                                                    <div class="media-contact-name">
                                                                        <span>Anderson</span>
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="d-flex align-items-center">
                                                                        <p class="text-muted fs-13">Office</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <a href="javascript:void(0)"><i class="contact-status text-primary fe fe-message-square me-2"></i></a>
                                                                <a href="javascript:void(0)"><i class="contact-status text-success fe fe-phone-call me-2"></i></a>
                                                                <a href="javascript:void(0)"><i class="contact-status text-danger fe fe-video me-2"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <div class="py-4 px-6 fw-bold">B</div>
                                                        <div class="d-flex align-items-center media">
                                                            <div class="mb-0 me-2">
                                                                <div class="main-img-user online">
                                                                    <img alt="" src="../assets/images/users/5.jpg"> <span>2</span>
                                                                </div>
                                                            </div>
                                                            <div class="align-items-center justify-content-between">
                                                                <div class="media-body ms-2">
                                                                    <div class="media-contact-name">
                                                                        <span>Bernadette</span>
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="d-flex align-items-center">
                                                                        <p class="text-muted fs-13">Mobile</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <a href="javascript:void(0)"><i class="contact-status text-primary fe fe-message-square me-2"></i></a>
                                                                <a href="javascript:void(0)"><i class="contact-status text-success fe fe-phone-call me-2"></i></a>
                                                                <a href="javascript:void(0)"><i class="contact-status text-danger fe fe-video me-2"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <div class="py-4 px-6 fw-bold">C</div>
                                                        <div class="d-flex align-items-center media">
                                                            <div class="mb-0 me-2">
                                                                <div class="main-img-user online">
                                                                    <img alt="" src="../assets/images/users/5.jpg"> <span>2</span>
                                                                </div>
                                                            </div>
                                                            <div class="align-items-center justify-content-between">
                                                                <div class="media-body ms-2">
                                                                    <div class="media-contact-name">
                                                                        <span>Cameron Watson</span>
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="d-flex align-items-center">
                                                                        <p class="text-muted fs-13">Home</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <a href="javascript:void(0)"><i class="contact-status text-primary fe fe-message-square me-2"></i></a>
                                                                <a href="javascript:void(0)"><i class="contact-status text-success fe fe-phone-call me-2"></i></a>
                                                                <a href="javascript:void(0)"><i class="contact-status text-danger fe fe-video me-2"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center media">
                                                            <div class="mb-0 me-2">
                                                                <div class="main-img-user online">
                                                                    <img alt="" src="../assets/images/users/21.jpg"> <span>2</span>
                                                                </div>
                                                            </div>
                                                            <div class="align-items-center justify-content-between">
                                                                <div class="media-body ms-2">
                                                                    <div class="media-contact-name">
                                                                        <span>Christopher Arnold</span>
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="d-flex align-items-center">
                                                                        <p class="text-muted fs-13">Mobile</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <a href="javascript:void(0)"><i class="contact-status text-primary fe fe-message-square me-2"></i></a>
                                                                <a href="javascript:void(0)"><i class="contact-status text-success fe fe-phone-call me-2"></i></a>
                                                                <a href="javascript:void(0)"><i class="contact-status text-danger fe fe-video me-2"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center media">
                                                            <div class="mb-0 me-2">
                                                                <div class="main-img-user online">
                                                                    <img alt="" src="../assets/images/users/2.jpg"> <span>2</span>
                                                                </div>
                                                            </div>
                                                            <div class="align-items-center justify-content-between">
                                                                <div class="media-body ms-2">
                                                                    <div class="media-contact-name">
                                                                        <span>Clarkson Gray</span>
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="d-flex align-items-center">
                                                                        <p class="text-muted fs-13">Home</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <a href="javascript:void(0)"><i class="contact-status text-primary fe fe-message-square me-2"></i></a>
                                                                <a href="javascript:void(0)"><i class="contact-status text-success fe fe-phone-call me-2"></i></a>
                                                                <a href="javascript:void(0)"><i class="contact-status text-danger fe fe-video me-2"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <div class="py-4 px-6 fw-bold">D</div>
                                                        <div class="d-flex align-items-center media">
                                                            <div class="mb-0 me-2">
                                                                <div class="main-img-user online">
                                                                    <img alt="" src="../assets/images/users/7.jpg"> <span>2</span>
                                                                </div>
                                                            </div>
                                                            <div class="align-items-center justify-content-between">
                                                                <div class="media-body ms-2">
                                                                    <div class="media-contact-name">
                                                                        <span>Deirdre Short</span>
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="d-flex align-items-center">
                                                                        <p class="text-muted fs-13">Home</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <a href="javascript:void(0)"><i class="contact-status text-primary fe fe-message-square me-2"></i></a>
                                                                <a href="javascript:void(0)"><i class="contact-status text-success fe fe-phone-call me-2"></i></a>
                                                                <a href="javascript:void(0)"><i class="contact-status text-danger fe fe-video me-2"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center media">
                                                            <div class="mb-0 me-2">
                                                                <div class="main-img-user online">
                                                                    <img alt="" src="../assets/images/users/12.jpg"> <span>2</span>
                                                                </div>
                                                            </div>
                                                            <div class="align-items-center justify-content-between">
                                                                <div class="media-body ms-2">
                                                                    <div class="media-contact-name">
                                                                        <span>Dylan Gill</span>
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="d-flex align-items-center">
                                                                        <p class="text-muted fs-13">Mobile</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <a href="javascript:void(0)"><i class="contact-status text-primary fe fe-message-square me-2"></i></a>
                                                                <a href="javascript:void(0)"><i class="contact-status text-success fe fe-phone-call me-2"></i></a>
                                                                <a href="javascript:void(0)"><i class="contact-status text-danger fe fe-video me-2"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center media">
                                                            <div class="mb-0 me-2">
                                                                <div class="main-img-user online">
                                                                    <img alt="" src="../assets/images/users/1.jpg"> <span>2</span>
                                                                </div>
                                                            </div>
                                                            <div class="align-items-center justify-content-between">
                                                                <div class="media-body ms-2">
                                                                    <div class="media-contact-name">
                                                                        <span>Donna Davies</span>
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="d-flex align-items-center">
                                                                        <p class="text-muted fs-13">Office</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <a href="javascript:void(0)"><i class="contact-status text-primary fe fe-message-square me-2"></i></a>
                                                                <a href="javascript:void(0)"><i class="contact-status text-success fe fe-phone-call me-2"></i></a>
                                                                <a href="javascript:void(0)"><i class="contact-status text-danger fe fe-video me-2"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <div class="py-4 px-6 fw-bold">E</div>
                                                        <div class="d-flex align-items-center media">
                                                            <div class="mb-0 me-2">
                                                                <div class="main-img-user online">
                                                                    <img alt="" src="../assets/images/users/4.jpg"> <span>2</span>
                                                                </div>
                                                            </div>
                                                            <div class="align-items-center justify-content-between">
                                                                <div class="media-body ms-2">
                                                                    <div class="media-contact-name">
                                                                        <span>Elizabeth Scott</span>
                                                                        <span></span>
                                                                    </div>
                                                                    <div class="d-flex align-items-center">
                                                                        <p class="text-muted fs-13">Office</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <a href="javascript:void(0)"><i class="contact-status text-primary fe fe-message-square me-2"></i></a>
                                                                <a href="javascript:void(0)"><i class="contact-status text-success fe fe-phone-call me-2"></i></a>
                                                                <a href="javascript:void(0)"><i class="contact-status text-danger fe fe-video me-2"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="ChatContacts1">
                                                    <div>
                                                        <div class="d-flex py-4 px-6 fw-bold"><span>Networks</span>
                                                            <a href="javascript:void(0)" class="ms-auto"><i class="fe fe-plus"></i></a>
                                                        </div>
                                                        <a href="javascript:void(0)" class="align-items-center media">
                                                            <div class="align-items-center justify-content-between">
                                                                <div class="media-body ms-4">
                                                                    <div class="media-contact-name">
                                                                        <span>Work</span>
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="javascript:void(0)" class="align-items-center media">
                                                            <div class="align-items-center justify-content-between">
                                                                <div class="media-body ms-4">
                                                                    <div class="media-contact-name">
                                                                        <span>Freelancer</span>
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="javascript:void(0)" class="align-items-center media">
                                                            <div class="align-items-center justify-content-between">
                                                                <div class="media-body ms-4">
                                                                    <div class="media-contact-name">
                                                                        <span>Personal</span>
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="">
                                                        <div class="d-flex py-4 px-6 fw-bold"><span>Rooms</span>
                                                            <a href="javascript:void(0)" class="ms-auto"><i class="fe fe-plus"></i></a>
                                                        </div>
                                                        <a href="javascript:void(0)" class="align-items-center media">
                                                            <div class="align-items-center justify-content-between">
                                                                <div class="media-body ms-4">
                                                                    <div class="media-contact-name">
                                                                        <span>Project Managers</span>
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="javascript:void(0)" class="align-items-center media">
                                                            <div class="align-items-center justify-content-between">
                                                                <div class="media-body ms-4">
                                                                    <div class="media-contact-name">
                                                                        <span>Designers</span>
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="javascript:void(0)" class="align-items-center media">
                                                            <div class="align-items-center justify-content-between">
                                                                <div class="media-body ms-4">
                                                                    <div class="media-contact-name">
                                                                        <span>Developers</span>
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="">
                                                        <div class="d-flex py-4 px-6 fw-bold"><span>On Hand Talk</span>
                                                            <a href="javascript:void(0)" class="ms-auto"><i class="fe fe-plus"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- main-chat-list -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- CONTAINER END -->
                </div>
            </div>
@endsection