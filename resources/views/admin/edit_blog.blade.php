@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                CẬP NHẬT BÀI VIẾT
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
                    @foreach($edit_blog as $key => $pro)
                    <form role="form" action="{{URL::to('/update-blog/'.$pro->id)}}" method="post"
                        enctype="multipart/form-data">
                        {{csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tiêu đề</label>
                            <input type="text" value="{{$pro->name}}" name="blog_name" class="form-control"
                                id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tiêu đề phụ</label>
                            <input type="text" value="{{$pro->promotion_price}}" name="blog_link" class="form-control"
                                id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Thể loại</label>
                            <select name="blog_cate" class="form-control input-sm m-bot15">
                                @foreach($cate_blog as $key => $cate)
                                @if($cate->id1==$pro->id_type)
                                <option selected value="{{$cate->id1}}">{{$cate->name1}}</option>
                                @else
                                @endif <option value="{{$cate->id1}}">{{$cate->name1}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung</label>
                            <textarea style="resize: none" rows="7" type="text" name="blog_desc"
                                class="form-control ckeditor"
                                id="exampleInputPassword1">{{$pro->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Ảnh</label>
                            <input value="{{$pro->image}}" type="text" name="blog_image" id="exampleInputFile3">
                            <img src="{{$pro->image}}" height="100" width="100">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Vị trí đang ở trên web</label>
                            <select name="blog_status" class="form-control input-sm m-bot15">
                                <option value="1">Hiển thị trên trang đầu</option>
                                <option value="3">Trang đầu bên phải</option>
                                <option value="4">Trang đầu bên trái</option>
                                <option value="5">Trang video</option>
                                <option value="0">Tin mới đăng</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Yêu cầu</label>
                            <select name="blog_types" class="form-control input-sm m-bot15">
                                <option value="1">Vip mới được xem</option>
                                <option value="2">Đăng nhập mới được xem</option>
                                <option value="3">Ai cũng có thể xem</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Video plugin</label>
                            <input type="text" value="{{$pro->video_product}}" name="blog_video" class="form-control"
                                id="exampleInputEmail1">
                        </div>

                        <button type="submit" name="update_blog" class="btn btn-info">Cập nhật</button>
                    </form>
                </div>
                @endforeach
            </div>
        </section>

    </div>
    @endsection