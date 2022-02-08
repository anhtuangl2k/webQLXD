@extends('admin_layout')

@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Chỉnh sửa khoản chi công trường
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
                            @foreach($edit_kcct as $key => $e)
                                <form role="form" action="{{URL::to('/update-kcct/'.$e->id)}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên dự án</label>
                                    <input type="textarea" name="noiDung" value="{{$e->noiDung}}" class="form-control" id="text" placeholder="Nội dung">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tổng tiền chi</label>
                                    <input type="text" name="tongTien" value="{{$e->tongTien}}" class="form-control" id="text" placeholder="Tổng tiền">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày duyệt</label>
                                    <input type="date" name="ngayDuyet" value="{{$e->ngayDuyet}}" class="form-control" id="text" placeholder="dd/mm/yyyy">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày tạo</label>
                                    <input type="date" name="ngayTao" value="{{$e->ngayTao}}" class="form-control" id="text" placeholder="dd/mm/yyyy">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Trạng thái</label>
                                    <input type="text" name="trangThai" value="{{$e->trangThai}}" class="form-control" id="text" placeholder="Trạng thái">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" style="width:100%">Các dự án</label>
                                    <select name="idDA" style="width:100%">
                                    @foreach($duan as $key => $c)
                                    <option value="{{$c->idDA}}">{{$c->tenDA}} </option>
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
