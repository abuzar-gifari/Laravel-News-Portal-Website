@extends('admin.layout.app')
@section('heading','Edit Online Poll')
@section('content')
<div class="section-body">
    <form action="{{ route('admin_online_poll_update',$online_poll_data->id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">Edit Online Poll</h4>
                        @csrf
                        <div class="form-group mb-3">
                            <label>Question</label>
                            <textarea name="question" class="form-control snote" cols="30" rows="10" style="150px;">{{ $online_poll_data->question }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Select Language</label>
                            <select name="language_id" class="form-control">
                                @foreach ($global_language_data as $row)
                                    <option value="{{ $row->id }}" @if ($row->id == $online_poll_data->language_id)
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
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection

@section('button')
    <div class="ml-auto">
        <a href="{{ route('admin_online_poll_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
    </div>
@endsection