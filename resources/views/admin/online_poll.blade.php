@extends('admin.layout.app')
@section('heading','Online Poll')
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
                                <th>Question</th>
                                <th>Yes Vote</th>
                                <th>No Vote</th>
                                <th>Language</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($online_poll_data as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {!! $row->question !!}
                                        </td>
                                        <td>
                                            {{ $row->yes_vote }}
                                        </td>
                                        <td>
                                            {{ $row->no_vote }}
                                        </td>
                                        <td>
                                            {{ $row->rLanguage->name }}
                                        </td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin_online_poll_edit',$row->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('admin_online_poll_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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
        <a href="{{ route('admin_online_poll_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
    </div>
@endsection