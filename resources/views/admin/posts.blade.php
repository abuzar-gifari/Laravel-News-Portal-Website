@extends('admin.layout.app')
@section('heading','All Posts')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Post Title</th>
                                <th>Thumbnail</th>
                                <th>SubCategory</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Admin</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->post_title }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/'.$row->post_photo) }}" alt="No Image Found" style="width: 200px;">
                                        </td>
                                        <td>
                                            <!-- ToDo -->
                                            {{ $row->rSubCategory->sub_category_name }}
                                        </td>
                                        <td>
                                            <!-- ToDo -->
                                            {{ $row->rSubCategory->rCategory->category_name }}
                                        </td>
                                        <td>
                                            <!-- ToDo -->
                                        </td>
                                        <td>
                                            <!-- ToDo -->
                                            @if ($row->admin_id != 0)
                                                {{ Auth::guard('admin')->user()->name }}
                                            @endif
                                        </td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin_post_edit',$row->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('admin_post_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('button')
    <div class="ml-auto">
        <a href="{{ route('admin_post_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
    </div>  
@endsection