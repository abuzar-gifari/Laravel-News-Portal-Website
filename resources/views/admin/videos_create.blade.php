@extends('admin.layout.app')
@section('heading','Create Video')
@section('content')
<div class="section-body">
    <form action="{{ route('admin_video_store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">Create Video</h4>
                        @csrf
                        <div class="form-group mb-3">
                            <label>Video ID</label>
                            <input type="text" class="form-control" name="video_id">
                        </div>
                        <div class="form-group mb-3">
                            <label>Caption</label>
                            <textarea name="caption" class="form-control snote" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
@endsection

@section('button')
    <div class="ml-auto">
        <a href="{{ route('admin_photo_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
    </div>
@endsection