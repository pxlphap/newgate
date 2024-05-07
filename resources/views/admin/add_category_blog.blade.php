@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <B>THÊM THỂ LOẠI</B>
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
                                <form role="form" action="{{URL::to('save-category-blog')}}" method="post">
                                    {{csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thể loại</label>
                                    <input type="text" name="category_blog_name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả thể loại</label>
                                    <textarea style="resize: none" rows="7" type="text" name="category_blog_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả thể loại"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hiển thị</label>
                                        <select name="category_blog_status" class="form-control input-sm m-bot15">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiển thị</option>

                                        </select>
                                </div>

                                <button type="submit" name="add_category_blog" class="btn btn-info">Thêm thể loại</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection