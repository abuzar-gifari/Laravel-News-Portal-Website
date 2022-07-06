@extends('admin.layout.app')
@section('heading','Create Category')
@section('content')
<div class="section-body">
    <form action="{{ route('admin_category_store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">Create Category</h4>
                        @csrf
                        <div class="form-group mb-3">
                            <label>Category Name</label>
                            <input type="text" class="form-control" name="category_name">
                        </div>
                        <div class="form-group mb-3">
                            <label>Show on Menu?</label>
                            <select name="show_on_menu" class="form-control">
                                <option value="Show">Show</option>
                                <option value="Hide">Hide</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Category Order</label>
                            <input type="text" class="form-control" name="category_order">
                        </div>
                        <div class="form-group mb-3">
                            <label>Select Language</label>
                            <select name="language_id" class="form-control">
                                @foreach ($global_language_data as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
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
        <a href="{{ route('admin_category_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
    </div>
@endsection