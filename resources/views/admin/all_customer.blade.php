@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Quản Lý thành viên
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">

            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <form action="{{URL::to('/search-thanh-vien')}}" method="POST" class="input-group">
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
                        <th>Tên khách hàng</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Vip ID</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_customer as $key => $cs)
                    <tr>
                        <td>{{$cs->id}}</td>
                        <td>{{$cs->full_name}}</td>
                        <td>{{$cs->email}}</td>
                        <td>{{$cs->phone}}</td>
                        <td>{{$cs->address}}</td>
                        <td>{{$cs->vipid}}</td>
                        <td>
                            <a href="{{URL::to('/edit-user/'.$cs->id)}}" class="active styling-edit" ui-toggle-class="">
                                <i class="fa fa-pencil-square-o text-active"></i>
                                <a onclick="return confirm('Xác nhận xóa!')" href="{{URL::to('/delete-user/'.$cs->id)}}"
                                    class="active styling-edit" ui-toggle-class="">
                                    <i class="fa fa-times text-danger text"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endsection