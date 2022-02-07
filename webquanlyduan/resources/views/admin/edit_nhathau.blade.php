@extends('admin_layout')

@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Chỉnh sửa nhà thầu
                        </header>

                        <div class="panel-body">

                            @foreach($edit_nhathau as $edit_nt)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-nhathau/'.$edit_nt->idNhaThau)}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên nhà thầu</label>
                                    <input type="text" name="tenNT" value="{{$edit_nt->tenNT}}" class="form-control" id="text" placeholder="Tên nhà thầu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input type="text" name="diaChi" value="{{$edit_nt->diaChi}}" class="form-control" id="text" placeholder="Điạ chỉ">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại liên lạc</label>
                                    <input type="text" name="sdt" value="{{$edit_nt->sdt}}" class="form-control" id="text" placeholder="Số điện thoại">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" name="email" value="{{$edit_nt->email}}" class="form-control" id="text" placeholder="Email">
                                </div>
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
        </div>
@endsection
