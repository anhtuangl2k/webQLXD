@extends('admin_layout')

@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm khoản chi công trình
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
                                <form role="form" action="{{URL::to('/save-kcct')}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nội dung khoản chi</label>
                                    <textarea style="width: 100%; border: 1px solid; margin-top: 5px" name="noiDung" cols="50" rows="10"></textarea>
                                    </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tổng tiền chi</label>
                                    <input type="text" name="tongTien" class="form-control" id="text" placeholder="Tổng tiền">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày duyệt</label>
                                    <input type="date" name="ngayDuyet" class="form-control" id="text" placeholder="dd/mm/yyyy">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày tạo</label>
                                    <input type="date" name="ngayTao" class="form-control" id="text" placeholder="dd/mm/yyyy">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Trạng thái</label>
                                    <input type="text" name="trangThai" class="form-control" id="text" placeholder="Trạng thái">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" style="width:100%">Các dựa án:</label>
                                    <select name="idDA" style="width:100%">
                                    @foreach($duan as $key => $c)
                                    <option value="{{ $c->idDA }}">{{$c->tenDA}} </option>
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
