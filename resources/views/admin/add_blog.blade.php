@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <B>THÊM BÀI VIẾT</B>
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
                                <form role="form" action="{{URL::to('/save-blog')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề</label>
                                    <input type="text" name="blog_name" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề phụ</label>
                                    <input type="text" name="blog_link" class="form-control" id="exampleInputEmail1">
                                </div> 
                                <div class="form-group">
                                    <label for="exampleInputFile">Thể loại</label>
                                        <select name="blog_cate" class="form-control input-sm m-bot15">
                                            @foreach($cate_blog as $key => $cate)
                                            <option value="{{$cate->id1}}">{{$cate->name1}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung</label>
                                    <textarea style="resize: none" rows="7" type="text" name="blog_desc" class="form-control ckeditor" id="exampleInputPassword1" ></textarea>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="exampleInputEmail1">Dung lượng</label>
                                    <input type="text" name="blog_price" class="form-control" id="exampleInputEmail1">
                                </div> -->
                                <div class="form-group">
                                                <label for="exampleInputFile">Ảnh</label>
                                                <input type="text" name="blog_image" id="exampleInputFile3">
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputFile">Hiển thị trang đầu</label>
                                        <select name="blog_status" class="form-control input-sm m-bot15">
                                            <option value="1">Hiển thị trên trang đầu</option>
                                            <option value="3">Trang đầu bên phải</option>
                                            <option value="4">Trang đầu bên trái</option>
                                            <option value="5">Trang video</option>
                                            <option value="0">Tin mới đăng</option>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Video plugin</label>
                                    <input type="text" name="blog_video" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                                <label for="exampleInputFile">Tên người viết bài</label>
                                                <input type="text" name="blog_staff" id="exampleInputFile3">
                                </div>
                                <button type="submit" name="add_blog" class="btn btn-info">Thêm bài viết</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection