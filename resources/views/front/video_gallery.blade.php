@extends('front.layout.app')
@section('content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Video Gallery</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Video Gallery</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="video-gallery">
            <div class="row">

                @foreach ($videos_data as $single_video)
                    <div class="col-lg-3 col-md-4">
                        <div class="video-thumb">
                            <img src="http://img.youtube.com/vi/{{ $single_video->video_id }}/0.jpg" alt="">
                            <div class="bg"></div>
                            <div class="icon">
                                <a href="http://www.youtube.com/watch?v={{ $single_video->video_id }}" class="video-button"><i class="fas fa-play"></i></a>
                            </div>
                        </div>
                        <div class="video-caption">
                            <a href="javascript:void;">{!! $single_video->caption !!}</a>
                        </div>
                        <div class="video-date">
                            @php
                                $ts = strtotime($single_video->updated_at);
                                $updated_at = date('d F, Y',$ts);
                            @endphp
                            <i class="fas fa-calendar-alt"></i> {{ $updated_at }}
                        </div>
                    </div>    
                @endforeach

                <!-- Pagination -->
                <div class="col-md-12">
                    {{ $videos_data->links() }}
                </div>


            </div>
        </div>
    </div>
</div>
@endsection