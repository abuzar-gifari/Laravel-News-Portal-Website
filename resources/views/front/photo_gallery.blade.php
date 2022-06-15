@extends('front.layout.app')
@section('content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Photo Gallery Page</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Photo Gallery</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <div class="container">
        <div class="photo-gallery">
            <div class="row">

                @foreach ($photos_data as $single_photo)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="photo-thumb">
                            <img src="{{ asset('uploads/'.$single_photo->photo) }}" alt="No Image">
                            <div class="bg"></div>
                            <div class="icon">
                                <a href="{{ asset('uploads/'.$single_photo->photo) }}" class="magnific"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="photo-caption">
                            <a href="">{!! $single_photo->caption !!}</a>
                        </div>
                        <div class="photo-date">
                            @php
                                $ts = strtotime($single_photo->updated_at);
                                $updated_at = date('d F, Y',$ts);
                            @endphp
                            <i class="fas fa-calendar-alt"></i> {{ $updated_at }}
                        </div>
                    </div>
                @endforeach

                <div class="col-md-12">
                    {{ $photos_data->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection