@extends('admin.layout.app')
@section('heading','Edit Contact Page Content')
@section('content')
<div class="section-body">
    <form action="{{ route('admin_page_contact_update') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">


                @foreach ($page_data as $row)
                    <h4 style="color:blue;"> [ {{ $row->rLanguage->name }} Content ]</h4>
                    <form action="{{ route('admin_page_contact_update') }}" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <h4 class="text-center">Contact Page Content</h4>
                                @csrf

                                <input type="hidden" name="id" value="{{ $row->id }}">

                                <div class="form-group mb-3">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="contact_title" value="{{ $row->contact_title }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Details</label>
                                    <textarea name="contact_detail" class="form-control snote" cols="30" rows="50">{{ $row->contact_detail }}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Map (IFrame Code)</label>
                                    <textarea name="contact_map" class="form-control" cols="30" rows="50" style="height: 120px;">{{ $row->contact_map }}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Status</label>
                                    <select name="contact_status" class="form-control">
                                        <option value="Show" 
                                            @if ($row->contact_status == "Show")
                                                selected
                                            @endif
                                        >Show</option>
                                        <option value="Hide"
                                            @if ($row->contact_status == "Hide")
                                                selected
                                            @endif
                                        >Hide</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                @endforeach




            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Information</button>
        </div>
    </form>
</div>
@endsection