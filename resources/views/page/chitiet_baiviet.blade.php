@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('trang-chu')}}">Home</a> / <span>Chi tiết bài viết</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="single-item-body">

                    <p class="single-item-title">
                    <p class="trangchu"><b>{{$baiviet->name}}</b></p>
                    </p><br>
                    <p class="single-item-price">
                        <span>
                            <p style=" font-weight: bold; float: left; color: #d21a32">{{$baiviet->staff}}
                                -{{date('d/m/Y H:i',strtotime($baiviet->created_at))}}</p>
                        </span>
                    </p><br><br>

                </div>

                <div class="clearfix"></div>
                <div class="space20">&nbsp;</div>

                <div class="single-item-options">


                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-sm-8">
                <p style="text-align: left; font-weight: bold; font-size: 18px;">{{$baiviet->promotion_price}}</p><br>
                <!-- <img width="800px" src="{{$baiviet->image}}" /> -->
                <p>{!!$baiviet->description!!}</p>
            </div>
            @foreach($sp_tuongtu as $sp2)
            <div class="col-sm-4">
                <div class="">
                    <div class="">
                        <a href="{{route('chitietbaiviet',$sp2->id)}}"><img src="{{$sp2->image}}" alt=""
                                width="400px;"></a>
                    </div>
                    <div class="" style="background-color: #4ea566;">
                        <a href="{{route('chitietbaiviet',$sp2->id)}}">
                            <p style="padding: 10px; font-weight: bold; color: white;">{{$sp2->name}}</p>
                            </p>
                        </a>
                    </div><br>
                </div>
            </div>
            @endforeach
            <!-- comment -->
            <div class="col-sm-4">
                <h4 class="bannertype">Bình luận về bài viết</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @foreach($comments as $cmt)
                            <div class="col-md-2">
                                <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid" />
                            </div>
                            <div class="col-md-10">
                                <p>
                                    <strong><b>{{$cmt->com_name}}</b></strong></a>
                                    <small><i>{{date('d/m/Y H:i',strtotime($cmt->created_at))}}</i></small>

                                </p>
                                <div class="clearfix"></div>
                                <p>{{$cmt->com_content}}</p>
                                <hr>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div><br><br>
                <!-- form cmt -->
                <form method="POST">
                    <div class="panel" id="tab-description">
                        <div class="form-block">
                            <input placeholder="Email" type="text" class="form-control" name="emailcomment" required>
                        </div>
                        <div class="form-block">
                            <input placeholder="Tên" class="form-control" type="text" name="namecomment" required>
                        </div>
                        <textarea rows="1" cols="20" name="contentcomment" required>
								</textarea>
                        <div class="form-block">
                            <button type="submit" class="btn btn-success" style="float: right">BÌNH LUẬN BÀI
                                VIẾT</button>
                        </div>
                    </div>
                    {{csrf_field()}}
                </form>
            </div>
        </div>
    </div>

</div>
<div class="space50">&nbsp;</div>
<div class="beta-blogs-list">


</div> <!-- .beta-blogs-list -->
</div>
</div>
</div>
</div> <!-- #content -->
</div> <!-- .container -->
@endsection