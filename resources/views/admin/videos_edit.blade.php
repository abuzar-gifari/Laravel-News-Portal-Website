@extends('admin.layout.app')
@section('heading','Create Photo')
@section('content')
<div class="section-body">
    <form action="{{ route('admin_video_update',$video_data->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">Edit Video</h4>
                        @csrf
                        <div class="form-group mb-3">
                            <label>Video ID</label>
                            <input type="text" class="form-control" name="video_id" value="{{ $video_data->video_id }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Caption</label>
                            <textarea name="caption" class="form-control snote" cols="30" rows="10">{{ $video_data->caption }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection

@section('button')
    <div class="ml-auto">
        <a href="{{ route('admin_video_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
    </div>
@endsection