@extends('admin_layout')

@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm hợp đồng
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
                                <form role="form" action="{{URL::to('/save-hopdong')}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên hợp đồng</label>
                                    <input type="text" name="tenHD" class="form-control" id="text" placeholder="Tên hợp đồng">
                                    </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nội dung hợp đồng</label>
                                    <input type="text" name="noiDung" class="form-control" id="text" placeholder="Tổng tiền">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" style="width:100%">Các dựa án:</label>
                                    <select name="idDA" style="width:100%">
                                    @foreach($duan as $key => $c)
                                    <option value="{{$c->idDA}}">{{$c->tenDA}} </option>
                                    @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
@endsection
