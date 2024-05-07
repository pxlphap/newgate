@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                CẬP NHẬT NHÂN VIÊN
            </header>
            <div class="panel-body">
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message',null);
                }
                ?>
                <div class="position-center">
                    @foreach($edit_customer as $key => $pro)
                    <form role="form" action="{{URL::to('/update-customer/'.$pro->id)}}" method="post"
                        enctype="multipart/form-data">
                        {{csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên khách hàng</label>
                            <input type="text" value="{{$pro->full_name}}" name="full_name" class="form-control"
                                id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" value="{{$pro->email}}" name="email" class="form-control"
                                id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="text" value="{{$pro->phone}}" name="phone" class="form-control"
                                id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" value="{{$pro->address}}" name="address" class="form-control"
                                id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Vip</label>
                            <select name="user_vip" class="form-control input-sm m-bot15">
                                <option value="1">7 ngày</option>
                                <option value="2">1 tháng</option>
                                <option value="3">3 tháng</option>
                                <option value="4">6 tháng</option>
                                <option value="5">1 năm</option>
                                <option value="6">Vĩnh Viễn</option>
                            </select>
                        </div>
                        <button type="submit" name="update_blog" class="btn btn-info">Cập nhật</button>
                    </form>
                </div>
                @endforeach
            </div>
        </section>

    </div>
    @endsection