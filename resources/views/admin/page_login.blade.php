@extends('admin.layout.app')
@section('heading','Edit Login Page Content')
@section('content')
<div class="section-body">
    <form action="{{ route('admin_page_login_update') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">About Login Content</h4>
                        @csrf
                        <div class="form-group mb-3">
                            <label>Title</label>
                            <input type="text" class="form-control" name="login_title" value="{{ $page_data->login_title }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Status</label>
                            <select name="login_status" class="form-control">
                                <option value="Show" 
                                    @if ($page_data->login_status == "Show")
                                        selected
                                    @endif
                                >Show</option>
                                <option value="Hide"
                                    @if ($page_data->login_status == "Hide")
                                        selected
                                    @endif
                                >Hide</option>
                            </select>
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
