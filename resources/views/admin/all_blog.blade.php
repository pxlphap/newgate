@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            <b>QUẢN LÝ BÀI VIẾT</b>
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">

            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <form action="{{URL::to('/search-blogs')}}" method="POST" class="input-group">
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
                        <th>TT</th>
                        <th>Tiêu đề</th>
                        <th>Thể loại</th>
                        <th>Ảnh</th>
                        <th>Người viết</th>
                        <th>Vip</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_blog as $key => $pt)
                    <tr>
                        <td>{{$pt->id}}</td>
                        <td>{{$pt->name}}</td>
                        <td>{{$pt->name1}}</td>
                        <td><img src="{{$pt->image}}" height="120px" width="200px"></td>
                        <td>{{$pt->staff}}</td>
                        <td>
                            <a href="{{URL::to('/edit-blog/'.$pt->id)}}" class="active styling-edit" ui-toggle-class="">
                                <i class="fa fa-pencil-square-o text-active"></i>
                                <a onclick="return confirm('Xác nhận xóa!')" href="{{URL::to('/delete-blog/'.$pt->id)}}"
                                    class="active styling-edit" ui-toggle-class="">
                                    <i class="fa fa-times text-danger text"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endsection