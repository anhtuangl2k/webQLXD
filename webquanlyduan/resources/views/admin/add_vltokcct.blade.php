@extends('admin_layout')

@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm các vật liệu cho công trường
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                @foreach($kcct as $key => $e)
                                <form role="form" action="{{URL::to('/save-vlTokcct/'.$e->id)}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mã phiếu chi cho công trường</label>
                                    <input type="text" name="idCT" value="{{$e->id}}" class="form-control" id="text" disabled="true">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nội dung phiếu chi</label>
                                    <input type="text" name="noiDung" value="{{$e->noiDung}}" class="form-control" id="text" disabled="true">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Trạng thái</label>
                                    <input type="text" name="trangThai" value="{{$e->trangThai}}"class="form-control" id="text" disabled="true">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" style="width:100%">Các vật liệu cho công trình:</label>
                                    <select name="idVL" style="width:100%">
                                    @foreach($vatlieu as $key => $c)
                                    <option value="{{$c->idVatLieu}}">{{$c->tenVL}} </option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng</label>
                                    <input type="text" name="soLuong" class="form-control" id="text">
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
