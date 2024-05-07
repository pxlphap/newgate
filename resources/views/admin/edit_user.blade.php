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
                    @foreach($edit_user as $key => $pro)
                    <form role="form" action="{{URL::to('/update-user/'.$pro->id)}}" method="post"
                        enctype="multipart/form-data">
                        {{csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên nhân viên</label>
                            <input type="text" value="{{$pro->admin_name}}" name="user_name" class="form-control"
                                id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nick name viết bài</label>
                            <input type="text" value="{{$pro->nickName}}" name="user_nickname" class="form-control"
                                id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tiên đăng nhập</label>
                            <input type="text" value="{{$pro->admin_email}}" name="user_email" class="form-control"
                                id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mật khẩu</label>
                            <input type="text" value="{{$pro->admin_password}}" name="user_password"
                                class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input type="text" name="user_phone" value="{{$pro->admin_phone}}" class="form-control"
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
                        <div class="form-group">
                            <label for="exampleInputFile">Ảnh</label>
                            <input value="{{$pro->images}}" type="text" name="user_image" id="exampleInputFile3">
                            <img src="{{$pro->images}}" height="100" width="100">
                        </div>

                        <button type="submit" name="update_blog" class="btn btn-info">Cập nhật</button>
                    </form>
                </div>
                @endforeach
            </div>
        </section>

    </div>
    @endsection