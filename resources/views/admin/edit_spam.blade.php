@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                CẬP NHẬT TỪ KHOÁ SPAM
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
                    @foreach($edit_spam as $key => $sp)
                    <form role="form" action="{{URL::to('/update-spam/'.$sp->spam_id)}}" method="post"
                        enctype="multipart/form-data">
                        {{csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Text Spam</label>
                            <input type="text" value="{{$sp->spam_text}}" name="spam_text" class="form-control"
                                id="exampleInputEmail1">
                        </div>
                        <button type="submit" name="update_spam" class="btn btn-info">Cập nhật</button>
                    </form>
                    @endforeach
                </div>
            </div>
        </section>

    </div>
    @endsection