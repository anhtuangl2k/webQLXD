@extends('admin_layout')

@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Vật liệu
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
            <th>Tên vật liệu</th>
            <th>Đơn vị</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody> 
        @foreach($vatlieu as $key => $vl)
          {{ csrf_field() }}
            <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$vl->tenVL}}</td>
            <td>{{$vl->donVi}}</td>
            <td>
              <a href="{{URL::to('/edit-vatlieu/'.$vl->idVatLieu)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
              <a href="{{URL::to('/delete-vatlieu/'.$vl->idVatLieu)}}" class="active" onclick="return confirm('Bạn có chắc sẽ xóa bản tin này ?')" ui-toggle-class="">
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
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection
