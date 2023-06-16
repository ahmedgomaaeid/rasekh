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
                                <div class="chat">
                                    
                                    @livewire('show-message', ['message_id' => $message->id])
                                    
                                    @livewire('add-message', ['message_id' => $message->id])
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
