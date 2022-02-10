@extends('admin_layout')

@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm vật liệu
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
                                <form role="form" action="{{URL::to('/save-vatlieu')}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên vật liệu</label>
                                    <input type="text" name="tenVL" class="form-control" id="text" placeholder="Tên vật liệu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Đơn vị</label>
                                    <input type="text" name="donVi" class="form-control" id="text" placeholder="Đơn vị">
                                </div>

                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
@endsection
