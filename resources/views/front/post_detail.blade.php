@extends('front.layout.app')
@section('content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $post_detail->post_title }}</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="{{ route('category',$post_detail->sub_category_id) }}">
                                {{ $post_detail->rSubCategory->sub_category_name }}
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $post_detail->post_title }}</li>
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
                <div class="featured-photo">
                    <img src="{{ asset('uploads/'.$post_detail->post_photo) }}" alt="" style="width:100%">
                </div>
                <div class="sub">
                    <div class="item">
                        <b><i class="fas fa-user"></i></b>
                        <a href="">{{ $user_data->name }}</a>
                    </div>
                    <div class="item">
                        <b><i class="fas fa-edit"></i></b>
                        <a href="{{ route('category',$post_detail->sub_category_id) }}">{{ $post_detail->rSubCategory->sub_category_name }}</a>
                    </div>
                    <div class="item">
                        <b><i class="fas fa-clock"></i></b>
                        @php
                            $ts = strtotime($post_detail->updated_at);
                            $updated_at = date('d F, Y',$ts);
                        @endphp
                        {{ $updated_at }}
                    </div>
                    <div class="item">
                        <b><i class="fas fa-eye"></i></b>
                        {{ $post_detail->visitors }}
                    </div>
                </div>
                <div class="main-text">
                    {!! $post_detail->post_detail !!}
                </div>
                <div class="tag-section">
                    <h2>Tags</h2>
                    <div class="tag-section-content">
                        @foreach ($tag_data as $tag)
                            <a href="{{ route('tag_show',$tag->tag_name) }}"><span class="badge bg-success">{{ $tag->tag_name }}</span></a>
                        @endforeach
                    </div>
                </div>
                <div class="share-content">
                    <h2>Share</h2>
                    <div class="addthis_inline_share_toolbox"></div>
                </div>
                <div class="comment-fb">
                    <h2>Comment</h2>
                    <div id="disqus_thread"></div>
                    <script>
                        (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document, s = d.createElement('script');
                        s.src = 'https://arefindev-com.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                        })();
                    </script>
                </div>
                <div class="related-news">
                    <div class="related-news-heading">
                        <h2>Related News</h2>
                    </div>
                    <div class="related-post-carousel owl-carousel owl-theme">
                        <div class="item">
                            <div class="photo">
                                <img src="uploads/n6.jpg" alt="">
                            </div>
                            <div class="category">
                                <span class="badge bg-success">International</span>
                            </div>
                            <h3><a href="">Haaland scores before going off injured in Dortmund win and it is very real</a></h3>
                            <div class="date-user">
                                <div class="user">
                                    <a href="">Paul David</a>
                                </div>
                                <div class="date">
                                    <a href="">10 Jan, 2022</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="photo">
                                <img src="uploads/n6.jpg" alt="">
                            </div>
                            <div class="category">
                                <span class="badge bg-success">International</span>
                            </div>
                            <h3><a href="">Haaland scores before going off injured in Dortmund win and it is very real</a></h3>
                            <div class="date-user">
                                <div class="user">
                                    <a href="">Paul David</a>
                                </div>
                                <div class="date">
                                    <a href="">10 Jan, 2022</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="photo">
                                <img src="uploads/n6.jpg" alt="">
                            </div>
                            <div class="category">
                                <span class="badge bg-success">International</span>
                            </div>
                            <h3><a href="">Haaland scores before going off injured in Dortmund win and it is very real</a></h3>
                            <div class="date-user">
                                <div class="user">
                                    <a href="">Paul David</a>
                                </div>
                                <div class="date">
                                    <a href="">10 Jan, 2022</a>
                                </div>
                            </div>
                        </div>
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