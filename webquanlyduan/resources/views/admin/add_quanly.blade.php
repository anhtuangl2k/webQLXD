@extends('admin_layout')

@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm thông tin tài khoản
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
                                <form role="form" action="{{URL::to('/save-quanly')}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên tài khoản</label>
                                    <input type="text" name="ten" class="form-control" id="text" placeholder="Tên tài khoản">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày sinh</label>
                                    <input type="date" name="dob" class="form-control" id="text" placeholder="dd/mm/yyyy">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" name="email" class="form-control" id="text" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại liên lạc</label>
                                    <input type="text" name="sdt" class="form-control" id="text" placeholder="Số điện thoại">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" style="width:100%">Chức vụ</label>
                                    <select name="chucVu" style="width:100%">
                                    <option value="Nhân viên">Nhân viên</option>
                                    <option value="Quản lý">Quản lý</option>
                                    <option value="Giám đốc">Giám đốc</option>
                                    <option value="Cấp cao hơn">Cấp cao hơn</option>
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
