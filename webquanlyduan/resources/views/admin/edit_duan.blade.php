@extends('admin_layout')

@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Chỉnh sửa dự án
                        </header>

                        <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message', null);
                            }
                        ?>

                        <div class="panel-body">
                            <div class="position-center">
                            @foreach($edit_duan as $key => $e)
                                <form role="form" action="{{URL::to('/update-duan/'.$e->idDA)}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên dự án</label>
                                    <input type="text" name="tenDA" value="{{$e->tenDA}}" class="form-control" id="text" placeholder="Tên dự án">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên chủ thầu</label>
                                    <input type="text" name="tenCT" value="{{$e->tenCT}}" class="form-control" id="text" placeholder="Tên chủ thầu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Gái trị dự án</label>
                                    <input type="text" name="gtriDA" value="{{$e->gtriDA}}" class="form-control" id="text" placeholder="$">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tầm ứng</label>
                                    <input type="text" name="tamUng" value="{{$e->tamUng}}" class="form-control" id="text" placeholder="Tầm ứng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày bắt đầu</label>
                                    <input type="date" name="ngayBatDau" value="{{$e->ngayBatDau}}" class="form-control" id="text" placeholder="dd/mm/yyyy">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày kết thúc</label>
                                    <input type="date" name="ngayKetThuc" value="{{$e->ngayKetThuc}}" class="form-control" id="text" placeholder="dd/mm/yyyy">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tình trạng</label>
                                    <input type="text" name="tinhTrang" value="{{$e->tinhTrang}}" class="form-control" id="text" placeholder="Tình trạng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" style="width:100%">Các chủ đầu tư</label>
                                    <select name="idCDT" style="width:100%">
                                    @foreach($chudautu as $key => $c)
                                    <option value="{{$c->idCDT }}">{{$c->tenCDT}} </option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" style="width:100%">Các nhà thầu</label>
                                    <select name="idNT" style="width:100%">
                                    @foreach($nhathau as $key => $n)
                                    <option value="{{$n->idNhaThau}}">{{$n->tenNT}} </option>
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
