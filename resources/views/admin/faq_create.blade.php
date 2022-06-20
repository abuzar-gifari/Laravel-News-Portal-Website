@extends('admin.layout.app')
@section('heading','Create FAQs')
@section('content')
<div class="section-body">
    <form action="{{ route('admin_faq_store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">Create FAQ</h4>
                        @csrf
                        <div class="form-group mb-3">
                            <label>FAQ Title</label>
                            <input type="text" class="form-control" name="faq_title">
                        </div>
                        <div class="form-group mb-3">
                            <label>FAQ Detail</label>
                            <textarea name="faq_detail" class="form-control snote" cols="30" rows="10"></textarea>
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
        <a href="{{ route('admin_faq_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
    </div>
@endsection