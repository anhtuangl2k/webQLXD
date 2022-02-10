@extends('admin_layout')

@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Chỉnh sửa hợp đồng
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
                            @foreach($edit_hopdong as $key => $e)
                                <form role="form" action="{{URL::to('/update-hopdong/'.$e->idHopDong)}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên hợp đồng</label>
                                    <input type="text" name="tenHD" value="{{$e->tenHD}}" class="form-control" id="text" placeholder="Tên hợp đồng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nội dung</label>
                                    <input type="text" name="noiDung" value="{{$e->noiDung}}" class="form-control" id="text" placeholder="Nội dung">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" style="width:100%">Dự án cần chọn</label>
                                    <select name="idDA" style="width:100%">
                                    @foreach($duan as $key => $n)
                                    <option value="{{$n->idDA}}">{{$n->tenDA}} </option>
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
