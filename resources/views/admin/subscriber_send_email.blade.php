@extends('admin.layout.app')
@section('heading','Send Email to Subscribers')
@section('content')
<div class="section-body">
    <form action="{{ route('admin_subscriber_send_email_submit') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">Send Email</h4>
                        @csrf
                        <div class="form-group mb-3">
                            <label>Subject</label>
                            <input type="text" class="form-control" name="subject">
                        </div>
                        <div class="form-group mb-3">
                            <label>Message</label>
                            <textarea name="message" cols="30" rows="10" class="form-control snote"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection
