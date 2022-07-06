@extends('admin.layout.app')
@section('heading','Edit Sub-Category')
@section('content')
<div class="section-body">
    <form action="{{ route('admin_sub_category_update',$subcategory->id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">Edit Sub-Category</h4>
                        @csrf
                        <div class="form-group mb-3">
                            <label>Sub-Category Name</label>
                            <input type="text" class="form-control" name="sub_category_name" value="{{ $subcategory->sub_category_name }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Show on Menu?</label>
                            <select name="show_on_menu" class="form-control">
                                <option value="Show" @if ($subcategory->show_on_menu=="Show")
                                    selected
                                @endif>Show</option>
                                <option value="Hide" @if ($subcategory->show_on_menu=="Hide")
                                    selected
                                @endif>Hide</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Show on Home?</label>
                            <select name="show_on_home" class="form-control">
                                <option value="Show" @if ($subcategory->show_on_home=="Show")
                                    selected
                                @endif>Show</option>
                                <option value="Hide" @if ($subcategory->show_on_home=="Hide")
                                    selected
                                @endif>Hide</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Sub-Category Order</label>
                            <input type="text" class="form-control" name="sub_category_order" value="{{ $subcategory->sub_category_order }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Select Category</label>
                            <select name="category_id" class="form-control">
                                @foreach ($categories as $row)
                                    <option value="{{ $row->id }}"
                                    @if ($subcategory->category_id == $row->id)
                                        selected
                                    @endif
                                    >{{ $row->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Select Language</label>
                            <select name="language_id" class="form-control">
                                @foreach ($global_language_data as $row)
                                    <option value="{{ $row->id }}" @if ($row->id == $subcategory->language_id)
                                        selected
                                    @endif>{{ $row->name }}</option>
                                @endforeach
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
        <a href="{{ route('admin_sub_category_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
    </div>
@endsection