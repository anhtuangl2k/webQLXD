@extends('admin_layout')

@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm vật liệu
                        </header>

                        <div class="panel-body">

                            @foreach($edit_vatlieu as $edit_vl)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-vatlieu/'.$edit_vl->idVatLieu)}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên vật liệu</label>
                                    <input type="text" name="tenVL" value="{{$edit_vl->tenVL}}" class="form-control" id="text" placeholder="Tên vật liệu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Đơn vị</label>
                                    <input type="text" name="donVi" value="{{$edit_vl->donVi}}" class="form-control" id="text" placeholder="Đơn vị">
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
