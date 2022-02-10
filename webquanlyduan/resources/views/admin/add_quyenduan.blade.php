@extends('admin_layout')

@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Phân quyền dự án cho tài khoản
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                @foreach($duan as $key => $e)
                                <form role="form" action="{{URL::to('/save-allocate/'.$e->idDA)}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên dự án</label>
                                    <input type="text" name="idCT" value="{{$e->tenDA}}" class="form-control" id="text" disabled="true">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên công trình</label>
                                    <input type="text" name="noiDung" value="{{$e->tenCT}}" class="form-control" id="text" disabled="true">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tình trạng</label>
                                    <input type="text" name="tinhTrang" value="{{$e->tinhTrang}}"class="form-control" id="text" disabled="true">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Khoảng thời gian thực hiện</label>
                                    <input type="text" name="tinhTrang" value="{{$e->ngayBatDau}} -> {{$e->ngayKetThuc}}"class="form-control" id="text" disabled="true">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" style="width:100%">Chọn tài khoản quản lý dự án:</label>
                                    <select name="idTK" style="width:100%">
                                    @foreach($taikhoan as $key => $c)
                                    <option value="{{$c->idTaiKhoan}}">{{$c->username}} </option>
                                    @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>

            </div>
        </div>
@endsection
