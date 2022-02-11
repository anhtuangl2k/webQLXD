@extends('admin_layout')

@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Chủ đầu tư
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên nhà thầu</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
        @foreach($nhathau as $key => $c)
          {{ csrf_field() }}
            <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$c->tenNT}}</td>
            <td>{{$c->diaChi}}</td>
            <td>{{$c->sdt}}</td>
            <td>{{$c->email}}</td>
            <td>
              <a href="{{URL::to('/edit-nhathau/'.$c->idNhaThau)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
              <a href="{{URL::to('/delete-nhathau/'.$c->idNhaThau)}}" class="active" onclick="return confirm('Bạn có chắc sẽ xóa bản tin này ?')" ui-toggle-class="">
                <i class="fa fa-times text-danger text-active"></i>
              </a>
            </td>
            </tr>
        @endforeach

        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">

        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <nav aria-label="Page navigation">
            {{ $nhathau->links() }}
        </nav>
      </div>
    </footer>
  </div>
</div>
@endsection
