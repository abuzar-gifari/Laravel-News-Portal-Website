@extends('front.layout.app')
@section('content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Forget Password</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <form action="{{ route('forget_password_submit') }}" method="post">
                        @csrf
                        <div class="login-form">
                            <div class="mb-3">
                                <label for="" class="form-label">Email Address</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary bg-website">Submit</button>
                                <a href="{{ route('login') }}">Back to Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection