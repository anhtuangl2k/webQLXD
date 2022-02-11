@extends('admin_layout')

@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Dự án
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
            <th>Tên dự án</th>
            <th>Tên chủ thầu</th>
            <th>Giá trị dự án</th>
            <th>Tạm ứng</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Tình trạng</th>
            <th>Nhà thầu</th>
            <th>Chủ đầu tư</th>
            <th>Phân quyền dự án</th>
          </tr>
        </thead>
        <tbody>
        @foreach($duan as $key => $c)
          {{ csrf_field() }}
            <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$c->tenDA}}</td>
            <td>{{$c->tenCT}}</td>
            <td>{{$c->gtriDA}}</td>
            <td>{{$c->tamUng}}</td>
            <td>{{$c->ngayBatDau}}</td>
            <td>{{$c->ngayKetThuc}}</td>
            <td>{{$c->tinhTrang}}</td>
            @foreach($chudautu as $key => $t)
            <?php
                if($c->idCDT === $t->idCDT){
            ?>
            <td>{{$t->tenCDT}}</td>
            <?php } ?>
            @endforeach
            @foreach($nhathau as $key => $x)
            <?php
                if($c->idNT === $x->idNhaThau){
            ?>
            <td>{{$x->tenNT}}</td>
            <?php } ?>
            @endforeach
            <td><a href="{{URL::to('/allocate-duan/'.$c->idDA)}}">Thêm quyền</a></td>
            <td>
              <a href="{{URL::to('/edit-duan/'.$c->idDA)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
              <a href="{{URL::to('/delete-duan/'.$c->idDA)}}" class="active" onclick="return confirm('Bạn có chắc sẽ xóa bản tin này ?')" ui-toggle-class="">
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
