@extends('front.layout.app')
@section('content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Reset Password</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="">Reset Password</a></li>
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
                    <form action="{{ route('reset_password_submit') }}" method="post">
                        @csrf

                        <input type="hidden" value="{{ $token }}" name="token">
                        <input type="hidden" value="{{ $email }}" name="email">
                        
                        <div class="login-form">
                            <div class="mb-3">
                                <label for="" class="form-label">New Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Retype Password</label>
                                <input type="password" class="form-control" name="retype_password">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary bg-website">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection