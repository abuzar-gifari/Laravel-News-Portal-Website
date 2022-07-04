@extends('admin.layout.app')
@section('heading','Create Language')
@section('content')
<div class="section-body">
    <form action="{{ route('admin_language_store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">Create Language</h4>
                        @csrf
                        <div class="form-group mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group mb-3">
                            <label>Short Name</label>
                            <input type="text" class="form-control" name="short_name">
                        </div>
                        <div class="form-group mb-3">
                            <label>Is Default</label>
                            <select name="is_default" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
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
        <a href="{{ route('admin_language_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
    </div>
@endsection