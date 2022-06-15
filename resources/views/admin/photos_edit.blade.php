@extends('admin.layout.app')
@section('heading','Create Photo')
@section('content')
<div class="section-body">
    <form action="{{ route('admin_photo_update',$photo_data->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">Edit Photo</h4>
                        @csrf
                        <div class="form-group mb-3">
                            <label>Existing Photo</label>
                            <img src="{{ asset('uploads/'.$photo_data->photo) }}" alt="No Image" style="width: 150px;">
                        </div>
                        <div class="form-group mb-3">
                            <label>Change Photo</label>
                            <input type="file" class="form-control" name="photo">
                        </div>
                        <div class="form-group mb-3">
                            <label>Caption</label>
                            <textarea name="caption" class="form-control snote" cols="30" rows="10">{{ $photo_data->caption }}</textarea>
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
        <a href="{{ route('admin_photo_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
    </div>
@endsection