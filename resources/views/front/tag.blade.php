@extends('front.layout.app')
@section('content')

<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>All post of tag: {{ $tag_name }}</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item">Posts</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $tag_name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-6">
                <div class="category-page">
                    <div class="row">


                        @if (count($all_post))
                            @foreach ($all_post as $item)

                                @if (!in_array($item->id,$tag_array))
                                    @continue
                                @endif
                                
                                <div class="col-lg-6 col-md-12">
                                    <div class="category-page-post-item">
                                        <div class="photo">
                                            <img src="{{ asset('uploads/'.$item->post_photo) }}" alt="No Image">
                                        </div>
                                        <div class="category">
                                            <span class="badge bg-success">{{ $item->rSubCategory->sub_category_name }}</span>
                                        </div>
                                        <h3><a href="{{ route('news_detail',$item->id) }}">{{ $item->post_title }}</a></h3>
                                        <div class="date-user">
                                            <div class="user">
                                                @if ($item->author_id == 0)
                                                    @php
                                                        $user_data = \App\Models\Admin::where('id',$item->admin_id)->first();
                                                    @endphp
                                                @else
                                                    <!-- We Will Work Later -->
                                                @endif
                                                <a href="">{{ $user_data->name }}</a>
                                            </div>
                                            <div class="date">
                                                @php
                                                    $ts = strtotime($item->updated_at);
                                                    $updated_at = date('d F, Y',$ts);
                                                @endphp
                                                
                                                <a href="">{{ $updated_at }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                
                            @endforeach

                        @else
                            <span class="text-danger">No Post is found!</span>
                        @endif

                        

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