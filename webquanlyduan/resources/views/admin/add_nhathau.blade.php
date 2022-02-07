@extends('admin_layout')

@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm nhà thầu
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
                                <form role="form" action="{{URL::to('/save-nhathau')}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên nhà thầu</label>
                                    <input type="text" name="tenNT" class="form-control" id="text" placeholder="Tên nhà thầu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input type="text" name="diaChi" class="form-control" id="text" placeholder="Địa chỉ">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại liên hệ</label>
                                    <input type="text" name="sdt" class="form-control" id="text" placeholder="Số điện thoại">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" name="email" class="form-control" id="text" placeholder="Email">
                                </div>
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
@endsection
