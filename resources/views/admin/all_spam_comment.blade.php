@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            <b>Danh Sách Spam Comment</b>
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">

            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <form action="{{URL::to('/search-spam-comment')}}" method="POST" class="input-group">
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
                        <th>id</th>
                        <th>Spam Email</th>
                        <th>Spam Text</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_spam_comment as $key => $sp)
                    <tr>
                        <td>{{$sp->com_id}}</td>
                        <td>{{$sp->com_email}}</td>
                        <td>{{$sp->com_content}}</td>
                        <td>
                            <a onclick="return confirm('Xác nhận xóa!')"
                                href="{{URL::to('/delete-spam-comment/'.$sp->com_id)}}" class="active styling-edit"
                                ui-toggle-class="">
                                <i class="fa fa-times text-danger text"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endsection