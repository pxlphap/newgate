@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                THÊM NHÂN VIÊN
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
                    <form role="form" action="{{URL::to('/save-user')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên nhân viên</label>
                            <input type="text" name="user_name" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Nick name viết bài</label>
                        <input type="text" name="user_nickname" class="form-control" id="exampleInputEmail1">
                    </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên đăng nhập</label>
                            <input type="text" name="user_email" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mật khẩu</label>
                            <input type="text" name="user_password" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input type="text" name="user_phone" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Ảnh</label>
                            <input type="text" name="user_image" class="form-control" id="exampleInputFile3">
                        </div>
                        <button type="submit" name="add_blog" class="btn btn-info">Thêm bài viết</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
    @endsection