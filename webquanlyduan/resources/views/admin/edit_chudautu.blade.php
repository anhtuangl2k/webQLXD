@extends('admin_layout')

@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Chỉnh sửa chủ đầu tư
                        </header>

                        <div class="panel-body">

                            @foreach($edit_chudautu as $edit_cdt)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-chudautu/'.$edit_cdt->idCDT)}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên chủ đầu tư</label>
                                    <input type="text" name="tenCDT" value="{{$edit_cdt->tenCDT}}" class="form-control" id="text" placeholder="Tên chủ đầu tư">
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
