@extends('admin.layout.app')
@section('heading','Create Post')
@section('content')
<div class="section-body">
    <form action="{{ route('admin_post_store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">Create Post</h4>
                        @csrf
                        <div class="form-group mb-3">
                            <label>Post Title</label>
                            <input type="text" class="form-control" name="post_title">
                        </div>
                        <div class="form-group mb-3">
                            <label>Post Detail</label>
                            <textarea name="post_detail" class="form-control snote" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Post Photo</label>
                            <input type="file" class="form-control" name="post_photo">
                        </div>
                        <div class="form-group mb-3">
                            <label>Select Category</label>
                            <select name="sub_category_id" class="form-control">
                                @foreach ($subcategories as $row)
                                    <option value="{{ $row->id }}">{{ $row->sub_category_name }} - ({{ $row->rCategory->category_name }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Is Sharable?</label>
                            <select name="is_share" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Is Comment?</label>
                            <select name="is_comment" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Tags</label>
                            <input type="text" class="form-control" name="tags">
                        </div>
                        <div class="form-group mb-3">
                            <label>Select Language</label>
                            <select name="language_id" class="form-control">
                                @foreach ($global_language_data as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Want to send this to subscribers?</label>
                            <select name="subscriber_send_option" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        {{-- <div class="form-group mb-3">
                            <label>Aminities</label><br>
                            <label><input type="checkbox" name="checkbox[]" value="Hot" > Hot</label><br>
                            <label><input type="checkbox" name="checkbox[]" value="New" > New</label><br>
                            <label><input type="checkbox" name="checkbox[]" value="Popular" > Popular</label>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
{{-- 


<table class="_table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th width="50px">
          <div class="action_container">
            <button class="success" onclick="create_tr('table_body')">
              <i class="fa fa-plus"></i>
            </button>
          </div>
        </th>
      </tr>
    </thead>
    <tbody id="table_body">
      <tr>
        <td>
          <input type="text" class="form_control" placeholder="Jhon Dhoe">
        </td>
        <td>
          <input type="text" class="form_control" placeholder="+880177x-xxxxxx">
        </td>
        <td>
          <textarea class="form_control" placeholder="Enter Your Address..."></textarea>
        </td>
        <td>
          <div class="action_container">
            <button class="danger" onclick="remove_tr(this)">
                <i class="fa fa-minus" aria-hidden="true"></i>
            </button>
          </div>
        </td>
      </tr>
    </tbody>
  </table> --}}


@endsection

@section('button')
    <div class="ml-auto">
        <a href="{{ route('admin_post_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
    </div>
@endsection




{{-- 
<style>
._table {
    width: 100%;
    border-collapse: collapse;
}
._table :is(th, td) {
    border: 1px solid #0002;
    padding: 8px 10px;
}
/* form field design start */
.form_control {
    border: 1px solid #0002;
    background-color: transparent;
    outline: none;
    padding: 8px 12px;
    font-family: 1.2rem;
    width: 100%;
    color: #333;
    font-family: Arial, Helvetica, sans-serif;
    transition: 0.3s ease-in-out;
}
.form_control::placeholder {
    color: inherit;
    opacity: 0.5;
}
.form_control:is(:focus, :hover) {
    box-shadow: inset 0 1px 6px #0002;
}
/* form field design end */
.success {
    background-color: #24b96f !important;
}
.warning {
    background-color: #ebba33 !important;
}
.primary {
    background-color: #259dff !important;
}
.secondery {
    background-color: #00bcd4 !important;
}
.danger {
    background-color: #ff5722 !important;
}
.action_container {
    display: inline-flex;
}
.action_container>* {
    border: none;
    outline: none;
    color: #fff;
    text-decoration: none;
    display: inline-block;
    padding: 8px 14px;
    cursor: pointer;
    transition: 0.3s ease-in-out;
}
.action_container>*+* {
    border-left: 1px solid #fff5;
}
.action_container>*:hover {
    filter: hue-rotate(-20deg) brightness(0.97);
    transform: scale(1.05);
    border-color: transparent;
    box-shadow: 0 2px 10px #0004;
    border-radius: 2px;
}
.action_container>*:active {
    transition: unset;
    transform: scale(.95);
}
</style>




<script>

function create_tr(table_id) {
    let table_body = document.getElementById(table_id),
        first_tr   = table_body.firstElementChild
        tr_clone   = first_tr.cloneNode(true);

    table_body.append(tr_clone);

    clean_first_tr(table_body.firstElementChild);
}

function clean_first_tr(firstTr) {
    let children = firstTr.children;
    
    children = Array.isArray(children) ? children : Object.values(children);
    children.forEach(x=>{
        if(x !== firstTr.lastElementChild)
        {
            x.firstElementChild.value = '';
        }
    });
}

function remove_tr(This) {
    if(This.closest('tbody').childElementCount == 1)
    {
        alert("You Don't have Permission to Delete This ?");
    }else{
        This.closest('tr').remove();
    }
}

</script> --}}