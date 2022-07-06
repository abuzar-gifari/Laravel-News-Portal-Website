@extends('admin.layout.app')

@section('heading','Admin Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fab fa-bandcamp"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Categories</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_categories }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fa fa-newspaper" style="font-size: 30px;"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total News</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_news }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total SubCategories</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_subcategories }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i style="font-size: 30px;" class="fa fa-image"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Photos</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_photos }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i style="font-size: 30px;" class="fa fa-video"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Videos</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_videos }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-secondary">
                    <i class="fas fa-comment"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total FAQs</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_faqs }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fas fa-poll"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Online Polls</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_polls }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fab fa-google-drive"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Live Channels</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_channels }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Subscribers</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_subscribers }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
