@extends('front.layout.app')
@section('content')

@if ($setting_data->news_ticker_status == "Show")
<div class="news-ticker-item">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="acme-news-ticker">
                    <div class="acme-news-ticker-label">Latest News</div>
                    <div class="acme-news-ticker-box">
                        <ul class="my-news-ticker">
                            @php $i = 0; @endphp
                            @foreach ($post_data as $item)
                                @php $i++; @endphp
                                @if ($i > $setting_data->news_ticker_total)
                                    @break
                                @endif
                              <li><a href="{{ route('news_detail',$item->id) }}">{{ $item->post_title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endif


<!-- Featured Section Start -->

<div class="home-main">
    <div class="container">
        <div class="row g-2">
            <div class="col-lg-8 col-md-12 left">

                @php $i = 0; @endphp

                @foreach ($post_data as $row)

                    @php $i++; @endphp
                    @if ($i > 1)
                        @break
                    @endif

                    <div class="inner">
                        <div class="photo">
                            <div class="bg"></div>
                            <img src="{{ asset('uploads/'.$row->post_photo) }}" alt="">
                            <div class="text">
                                <div class="text-inner">
                                    <div class="category">
                                        <span class="badge bg-success badge-sm">{{ $row->rSubCategory->sub_category_name }}</span>
                                    </div>
                                    <h2><a href="{{ route('news_detail',$row->id) }}">{{ $row->post_title }}</a></h2>
                                    <div class="date-user">
                                        <div class="user">
                                            @if ($row->author_id == 0)
                                                <!-- Admin Exists -->
                                                @php
                                                    $user_data = \App\Models\Admin::where('id',$row->admin_id)->first();
                                                @endphp
                                            @else
                                                <!-- Author Exists -->
                                            @endif
                                            <a href="">{{ $user_data->name }}</a>
                                        </div>
                                        <div class="date">
                                            @php
                                                $ts = strtotime($row->updated_at);
                                                $updated_at = date('d F, Y',$ts);
                                            @endphp
                                            
                                            <a href="">{{ $updated_at }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-4 col-md-12">
                @php $i = 0; @endphp

                @foreach ($post_data as $row)

                    @php $i++; @endphp
                    @if ($i == 1)
                        @continue
                    @endif
                    @if ($i > 3)
                        @break
                    @endif
                    <div class="inner inner-right">
                        <div class="photo">
                            <div class="bg"></div>
                            <img src="{{ asset('uploads/'.$row->post_photo) }}" alt="">
                            <div class="text">
                                <div class="text-inner">
                                    <div class="category">
                                        <span class="badge bg-success badge-sm">{{ $row->rSubCategory->sub_category_name }}</span>
                                    </div>
                                    <h2><a href="{{ route('news_detail',$row->id) }}">{{ $row->post_title }}</a></h2>
                                    <div class="date-user">
                                        <div class="user">
                                            @if ($row->author_id == 0)
                                                @php
                                                    $user_data = \App\Models\Admin::where('id',$row->admin_id)->first();
                                                @endphp
                                            @else
                                                <!-- We Will Work Later -->
                                            @endif
                                            <a href="">{{ $user_data->name }}</a>
                                        </div>
                                        <div class="date">
                                            @php
                                                $ts = strtotime($row->updated_at);
                                                $updated_at = date('d F, Y',$ts);
                                            @endphp
                                            
                                            <a href="">{{ $updated_at }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<!-- Featured Section End -->







@if ($data->above_search_ad_status=="Show")
    <div class="ad-section-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if ($data->above_search_ad_url=="")
                        <img src="{{ asset('uploads/'.$data->above_search_ad) }}" alt="No Image Found">
                    @else
                        <a href="{{ $data->above_search_ad_url }}" target="_blank"><img src="{{ asset('uploads/'.$data->above_search_ad) }}" alt="No Image Found"></a>
                    @endif
                </div>
            </div>
        </div>
    </div>    
@endif

<div class="search-section">
    <div class="container">
        <div class="inner">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" name="" class="form-control" placeholder="Title or Description">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <select name="" class="form-select">
                            <option value="">Select Category</option>
                            <option value="">Sports</option>
                            <option value="">National</option>
                            <option value="">Lifestyle</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <select name="" class="form-select">
                            <option value="">Select SubCategory</option>
                            <option value="">Football</option>
                            <option value="">Cricket</option>
                            <option value="">Baseball</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="home-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6 left-col">
                <div class="left">

                    
                    @foreach ($sub_category_data as $item)
                        
                            <!-- If There Has No Post Found Under SubCategory -->
                            @if (count($item->rPost) == 0)
                                @continue
                            @endif

                            <!-- News Of Category -->
                            <div class="news-total-item">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <h2>{{ $item->sub_category_name }}</h2>
                                    </div>
                                    <div class="col-lg-6 col-md-12 see-all">
                                        <a href="{{ route('category',$item->id) }}" class="btn btn-primary btn-sm">See All News</a>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="bar"></div>
                                    </div>
                                </div>

                                

                                <div class="row">


                                    @foreach ($item->rPost as $single_news)
                                        @if ($loop->iteration == 2)
                                            @break
                                        @endif


                                            <div class="col-lg-6 col-md-12">
                                                <div class="left-side">
                                                    <div class="photo">
                                                        <img src="{{ asset('uploads/'.$single_news->post_photo) }}" alt="">
                                                    </div>
                                                    <div class="category">
                                                        <span class="badge bg-success">{{ $item->sub_category_name }}</span>
                                                    </div>
                                                    <h3><a href="{{ route('news_detail',$single_news->id) }}">{{ $single_news->post_title }}</a></h3>
                                                    <div class="date-user">
                                                        <div class="user">
                                                            @if ($single_news->author_id == 0)
                                                                @php
                                                                    $user_data = \App\Models\Admin::where('id',$single_news->admin_id)->first();
                                                                @endphp
                                                            @else
                                                                <!-- We Will Work Later -->
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
                                                    <p class="post_short_text">
                                                        @php
                                                            $truncated = (strlen($single_news->post_detail) > 240) ? substr($single_news->post_detail,0,240) . '...' : $single_news->post_detail;
                                                            echo $truncated;
                                                        @endphp
                                                    </p>
                                                </div>
                                            </div>

                                    @endforeach


                                    <div class="col-lg-6 col-md-12">
                                        <div class="right-side">

                                            @foreach ($item->rPost as $single_news)

                                                @if ($loop->iteration == 1)
                                                    @continue
                                                @endif
                                                @if ($loop->iteration == 6)
                                                    @break
                                                @endif

                                                <div class="right-side-item">
                                                    <div class="left">
                                                        <img src="{{ asset('uploads/'.$single_news->post_photo) }}" alt="">
                                                    </div>
                                                    <div class="right">
                                                        <div class="category">
                                                            <span class="badge bg-success">{{ $item->sub_category_name }}</span>
                                                        </div>
                                                        <h2><a href="{{ route('news_detail',$single_news->id) }}">{{ $single_news->post_title }}</a></h2>
                                                        <div class="date-user">
                                                            <div class="user">
                                                                @if ($single_news->author_id == 0)
                                                                    @php
                                                                        $user_data = \App\Models\Admin::where('id',$single_news->admin_id)->first();
                                                                    @endphp
                                                                @else
                                                                    <!-- We Will Work Later -->
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // News Of Category -->


                        
                    @endforeach 
                   
                    
                </div>
            </div>
            <div class="col-lg-4 col-md-6 sidebar-col">
                @include('front.layout.sidebar')
            </div>
        </div>
    </div>
</div>

<!-- Videos Part Start -->
@if ($setting_data->video_status == "Show")
    <div class="video-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="video-heading">
                        <h2>Videos</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="video-carousel owl-carousel">

                        @foreach ($videos_data as $single_video)

                            @if ($loop->iteration > $setting_data->video_total)
                                @break
                            @endif

                            <div class="item">
                                <div class="video-thumb">
                                    <img src="http://img.youtube.com/vi/{{ $single_video->video_id }}/0.jpg">
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
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif


<!-- Videos Part End -->



@if ($data->above_footer_ad_status=="Show")
    <div class="ad-section-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if ($data->above_footer_ad_url=="")
                        <img src="{{ asset('uploads/'.$data->above_footer_ad) }}" alt="No Image Found">
                    @else
                        <a href="{{ $data->above_footer_ad_url }}" target="_blank"><img src="{{ asset('uploads/'.$data->above_footer_ad) }}" alt="No Image Found"></a>
                    @endif
                </div>
            </div>
        </div>
    </div>    
@endif
@endsection