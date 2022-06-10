@extends('admin.layout.app')
@section('heading','Sidebar Advertisement Update')
@section('content')
<div class="section-body">
    <form action="{{ route('admin_sidebar_ad_update',$data->id) }}" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">Sidebar Search</h4>
                        @csrf
                        <div class="form-group mb-3">
                            <label>Existing Photo</label>
                            <div>
                                <img src="{{ asset('uploads/'.$data->sidebar_ad) }}" style="width: 100px;">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Change Photo</label>
                            <div>
                                <input type="file" name="sidebar_ad">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>URL</label>
                            <input type="text" class="form-control" name="sidebar_ad_url" value="{{ $data->sidebar_ad_url }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Location</label>
                            <select name="sidebar_ad_location" class="form-control">
                                <option value="Top" @if ($data->sidebar_ad_location=="Top")
                                    selected
                                @endif>Top</option>
                                <option value="Bottom"@if ($data->sidebar_ad_location=="Bottom")
                                    selected
                                @endif>Bottom</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Information</button>
        </div>
    </form>
</div>
@endsection

@section('button')
    <div class="ml-auto">
        <a href="{{ route('admin_sidebar_ad_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
    </div>
@endsection