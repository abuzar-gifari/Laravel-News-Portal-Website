@extends('front.layout.app')
@section('content')
@foreach ($sub_category_data as $single_subcategory)
    <div class="page-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $single_subcategory->sub_category_name }}</h2>
                    <nav class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $single_subcategory->sub_category_name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endforeach

<div class="page-content">
    <div class="container">
        <div class="row">
            <!-- We have $sub_category_data, $post_data -->
            <div class="col-lg-8 col-md-6">
                <div class="category-page">
                    <div class="row">


                        <!-- 2nd Try -->

                        @foreach ($sub_category_data as $single_subcategory)

                            @foreach ($single_subcategory->rPost as $single_news)
                                
                                <div class="col-lg-6 col-md-12">
                                    <div class="category-page-post-item">
                                        <div class="photo">
                                            <img src="{{ asset('uploads/'.$single_news->post_photo) }}" alt="No Image">
                                        </div>
                                        <div class="category">
                                            <span class="badge bg-success">{{ $single_subcategory->sub_category_name }}</span>
                                        </div>
                                        <h3><a href="{{ route('news_detail',$single_news->id) }}">{{ $single_news->post_title }}</a></h3>
                                        <div class="date-user">
                                            <div class="user">
                                                @if ($single_news->author_id == 0)
                                                    @php
                                                        $user_data = \App\Models\Admin::where('id',$single_news->admin_id)->first();
                                                    @endphp
                                                @else
                                                    @php
                                                        $user_data = \App\Models\Author::where('id',$single_news->author_id)->first();
                                                    @endphp
                                                @endif
                                                <a href="">{{ $user_data->name }}</a>
                                            </div>
                                            <div class="date">
                                                @php
                                                    $ts = strtotime($single_news->updated_at);
                                                    $updated_at = date('d F, Y',$ts);
                                                @endphp
                                                
                                                <a href="">{{ $updated_at }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> 

                            @endforeach
                              
                        @endforeach

                        <!-- //2nd Try -->
                    </div>
                </div>

            </div>


            <div class="col-lg-4 col-md-6 sidebar-col">
                @include('front.layout.sidebar')
            </div>




        </div>
    </div>
</div>
@endsection