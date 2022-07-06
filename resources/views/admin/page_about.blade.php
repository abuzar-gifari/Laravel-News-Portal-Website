@extends('admin.layout.app')
@section('heading','Edit About Page Content')
@section('content')
<div class="section-body">

        <div class="row">
            <div class="col-12">


                @foreach ($page_data as $row)
                    <h4 style="color:blue;"> [ {{ $row->rLanguage->name }} Content ]</h4>
                    <form action="{{ route('admin_page_about_update') }}" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <h4 class="text-center">About Page</h4>
                                @csrf

                                <input type="hidden" name="id" value="{{ $row->id }}">

                                <div class="form-group mb-3">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="about_title" value="{{ $row->about_title }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Details</label>
                                    <textarea name="about_detail" class="form-control snote" cols="30" rows="50">{{ $row->about_detail }}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Status</label>
                                    <select name="about_status" class="form-control">
                                        <option value="Show" 
                                            @if ($row->about_status == "Show")
                                                selected
                                            @endif
                                        >Show</option>
                                        <option value="Hide"
                                            @if ($row->about_status == "Hide")
                                                selected
                                            @endif
                                        >Hide</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update Information</button>
                                </div>
                            </div>
                        </div>
                    </form>
                @endforeach
                


            </div>
        </div>
</div>
@endsection
