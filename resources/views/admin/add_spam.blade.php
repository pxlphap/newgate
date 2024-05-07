@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <B>THÊM TỪ SPAM</B>
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
                    <form role="form" action="{{URL::to('/save-spam')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Text Spam</label>
                            <input type="text" name="spam_text" class="form-control" id="exampleInputEmail1">
                        </div>
                        <button type="submit" name="add_blog" class="btn btn-info">Thêm Spam</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
    @endsection