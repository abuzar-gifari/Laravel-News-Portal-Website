@extends('admin.layout.app')
@section('heading','Edit Post')
@section('content')
<div class="section-body">
    <form action="{{ route('admin_post_update',$posts->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">Edit Post</h4>
                        @csrf
                        <div class="form-group mb-3">
                            <label>Post Title</label>
                            <input type="text" class="form-control" name="post_title" value="{{ $posts->post_title }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Post Detail</label>
                            <textarea name="post_detail" class="form-control snote" cols="30" rows="10">{{ $posts->post_detail }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Existing Post Photo</label>
                            <img src="{{ asset('uploads/'.$posts->post_photo) }}" alt="No Image Found" style="width: 200px;">
                        </div>
                        <div class="form-group mb-3">
                            <label>Change Photo</label>
                            <input type="file" class="form-control" name="post_photo">
                        </div>
                        <div class="form-group mb-3">
                            <label>Select Category</label>
                            <select name="sub_category_id" class="form-control">
                                @foreach ($subcategories as $row)
                                    <option value="{{ $row->id }}"
                                    @if ($row->id==$posts->sub_category_id)
                                        selected
                                    @endif
                                    >{{ $row->sub_category_name }} - ({{ $row->rCategory->category_name }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Is Sharable?</label>
                            <select name="is_share" class="form-control">
                                <option value="1" @if ($posts->is_share == 1)
                                    selected
                                @endif>Yes</option>
                                <option value="0"@if ($posts->is_share == 0)
                                    selected
                                @endif>No</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Is Comment?</label>
                            <select name="is_comment" class="form-control">
                                <option value="1" @if ($posts->is_comment == 1)
                                    selected
                                @endif>Yes</option>
                                <option value="0" @if ($posts->is_comment == 0)
                                    selected
                                @endif>No</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Existing Tags</label>
                            <table class="table table-bordered">
                                @foreach ($existing_tags as $tag)
                                    <tr>
                                        <td>{{ $tag->tag_name }}</td>
                                        <td><a href="{{ route('admin_post_tag_delete',[$tag->id,$posts->id]) }}" onClick="return confirm('Are you sure?');">Delete</a></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="form-group mb-3">
                            <label>New Tags</label>
                            <input type="text" class="form-control" name="tags">
                        </div>
                        <div class="form-group mb-3">
                            <label>Select Language</label>
                            <select name="language_id" class="form-control">
                                @foreach ($global_language_data as $row)
                                    <option value="{{ $row->id }}" @if ($row->id == $posts->language_id)
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
        <a href="{{ route('admin_post_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
    </div>
@endsection