@extends('admin.layout.app')
@section('heading','Create Author')
@section('content')
<div class="section-body">
    <form action="{{ route('admin_author_store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">Create Author</h4>
                        @csrf
                        <div class="form-group mb-3">
                            <label>Author Photo</label>
                            <input type="file" class="form-control" name="photo">
                        </div>
                        <div class="form-group mb-3">
                            <label>Author Name</label>
                            <input type="text" class="form-control" name="name" placeholder="enter name">
                        </div>
                        <div class="form-group mb-3">
                            <label>Author Email</label>
                            <input type="text" class="form-control" name="email" placeholder="enter a valid email">
                        </div>
                        <div class="form-group mb-3">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="enter password">
                        </div>
                        <div class="form-group mb-3">
                            <label>Retype Password</label>
                            <input type="password" class="form-control" name="retype_password" placeholder="confirm password">
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
        <a href="{{ route('admin_author_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
    </div>
@endsection