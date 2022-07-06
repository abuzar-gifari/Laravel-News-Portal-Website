@extends('admin.layout.app')
@section('heading','All Sub-Categories')
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
                                <th>Sub-Category Name</th>
                                <th>Category Name</th>
                                <th>Show on Menu?</th>
                                <th>Show on Home?</th>
                                <th>Order</th>
                                <th>Language</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategories_data as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->sub_category_name }}</td>
                                        <td>
                                            <!-- toDo -->
                                            {{ $row->rCategory->category_name }}
                                        </td>
                                        <td>{{ $row->show_on_menu }}</td>
                                        <td>{{ $row->show_on_home }}</td>
                                        <td>{{ $row->sub_category_order }}</td>
                                        <td>{{ $row->rLanguage->name }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin_sub_category_edit',$row->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('admin_sub_category_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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
        <a href="{{ route('admin_sub_category_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
    </div>
@endsection