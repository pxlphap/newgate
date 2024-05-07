@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            DANH MỤC BÀI VIẾT
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">

                </select>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <form action="{{URL::to('/search-danh-muc')}}" method="POST" class="input-group">
                    {{ csrf_field() }}
                    <input type="text" class="input-sm form-control" placeholder="Search" name="search_content">
                    <input type="submit" class="btn btn-default" value="Go!" name="search">
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <?php
              $message = Session::get('message');
              if ($message) {
                echo $message;
                Session::put('message',null);
              }
            ?>
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                            </label>
                        </th>
                        <th>Tên danh mục</th>
                        <th>Nội dung</th>
                        <th>Status</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_category_blog as $key => $cate_pro)
                    <tr>
                        <td><label class="i-checks m-b-none"><i></i></label></td>
                        <td>{{$cate_pro->name1}}</td>
                        <td><span class="text-ellipsis">{{$cate_pro->description}}</span></td>
                        <td><span class="text-ellipsis">
                                <?php 
            if ($cate_pro->status==0) {
              ?>
                                <a href="{{URL::to('/unactive-category-blog/'.$cate_pro->id1)}}"><span
                                        class="fa-thumb-style fa fa-thumbs-up"></span>
                                </a>
                                <?php 
            }else{
              ?>
                                <a href="{{URL::to('/active-category-blog/'.$cate_pro->id1)}}"><span
                                        class="fa-thumb-style fa fa-thumbs-down"></span></a>
                                <?php
            }
            ?>
                            </span></td>
                        <td>
                            <a href="{{URL::to('/edit-category-blog/'.$cate_pro->id1)}}" class="active styling-edit"
                                ui-toggle-class="">
                                <i class="fa fa-pencil-square-o text-active"></i>
                                <a onclick="return confirm('Xác nhận xóa!')"
                                    href="{{URL::to('/delete-category-blog/'.$cate_pro->id1)}}"
                                    class="active styling-edit" ui-toggle-class="">
                                    <i class="fa fa-times text-danger text"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endsection