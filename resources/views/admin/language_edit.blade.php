@extends('admin.layout.app')
@section('heading','Edit Language')
@section('content')
<div class="section-body">
    <form action="{{ route('admin_language_update',$language_data->id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">Edit Language</h4>
                        @csrf
                        <div class="form-group mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $language_data->name }}">
                        </div>
                        {{-- <div class="form-group mb-3">
                            <label>Short Name</label>
                            <input type="text" class="form-control" name="short_name" value="{{ $language_data->short_name }}">
                        </div> --}}
                        <div class="form-group mb-3">
                            <label>Is Default</label>
                            <select name="is_default" class="form-control">
                                <option value="Yes" @if ($language_data->is_default == "Yes")
                                    selected
                                @endif>Yes</option>
                                <option value="No" @if ($language_data->is_default == "No")
                                    selected
                                @endif>No</option>
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
        <a href="{{ route('admin_language_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
    </div>
@endsection