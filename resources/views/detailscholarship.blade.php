<!DOCTYPE html>
<html lang="en">
<head>
    <title> Thông tin về học bổng </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="{{URL::asset('css/vendor/bootstrap.js')}}"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::asset('css/vendor/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/vendor/bootstrap.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/index.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/detail.css')}}">
    <script type="text/javascript" src="{{URL::asset('js/detail.js')}}"></script>
</head>

<body>
    @include('header');
    <!-- Hết menu -->
    <div class="container">
        <div class="leftside">
            <div class="head-post">
                <img class="cover-post" src="{{URL::asset($scholarship->AnhBia)}}">
                <p id="tit">{{$scholarship->TenHocBong}}</p>
                <img id="flag-contry" src="{{URL::asset('css/pictures/japan.png')}}">
                <div class="deadline">Hạn chót nộp hồ sơ: <span>{{date('d/m/Y', strtotime($scholarship->deadline))}}</span></div>
            </div>
            <p id="author-post">Đăng bởi {{$scholarship->username}}, {{$scholarship->NgayTao}}</p>
            <table>
                <tr>
                    <td>
                        <div class="highlight-tit"><i class="fas fa-medal"></i> BẬC HỌC</div>
                    </td>
                    <td>
                        <div class="content-data">{{$scholarship->TenBacHoc}}.</div>
                    </td>
                    <td>
                        <div class="highlight-tit"><i class="fas fa-money-bill-wave"></i> GIÁ TRỊ</div>
                    </td>
                    <td>
                        <div class="content-data">{{$scholarship->SoTienMin}}-{{$scholarship->SoTienMax}}{{$scholarship->TenDonVi}}</div>
                    </td>
                </tr>
                <br>
                <tr>
                    <td>
                        <div class="highlight-tit"><i class="fab fa-accusoft"></i> NGÀNH HỌC</div>
                    </td>
                    <td>
                        <a class="content-data" align="left">{{$scholarship->TenNganhHoc}}.</a><br>
                    </td>
                    <td>
                        <div class="highlight-tit"><i class="fas fa-users"></i> ĐỐI TƯỢNG</div>
                    </td>
                    <td>
                        <a class="content-data" align="left"></a><img class="mini-flag" src="{{URL::asset('css/pictures/in.png')}}"><img class="mini-flag" src="{{URL::asset($scholarship->AnhQuocKy)}}"></a><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="highlight-tit"><i class="fas fa-hands-helping"></i> SỐ LƯỢNG</div>
                    </td>
                    <td>
                        <a class="content-data">{{$scholarship->SoLuong}} suất học bổng</a><br>
                    </td>
                    <td>
                        <div class="highlight-tit"><i class="fas fa-scroll"></i> NGOẠI NGỮ</div>
                    </td>
                    <td>
                        <a class="content-data" align="left">
							@foreach($ForeignCirtifications as $ForeignCirtification)
								{{$ForeignCirtification->Diem}} {{$ForeignCirtification->TenChungChi}}
							@endforeach
						</a><br>
                    </td>
                </tr>
            </table>
            <div class="highlight-tit-big"><i class="fas fa-graduation-cap fa-2x" style=" vertical-align: middle; margin-right: 10px;"></i> Thông tin trường học</div>
            <div class="school-info">
                <img class="school-logo" src="{{URL::asset($scholarship->logo)}}">
                <span class="name-school">{{$scholarship->TenTruongHoc}}</span>
                <p class="school-info-content">{{$scholarship->ThongTin}}.</p>
            </div>
            <div class="highlight-tit-big"><i class="fab fa-elementor fa-2x" style=" vertical-align: middle;line-height: 40px; margin-right: 10px;"></i> Yêu cầu</div>
            <div class="content-info">
            	{{$scholarship->YeuCau}}
            </div>
            <div class="highlight-tit-big"><i class="fas fa-boxes" style=" vertical-align: middle;font-size: 22px; margin-right: 10px;"></i> Thủ tục nộp hồ sơ</div>
            <div class="content-info">
            	{{$scholarship->ThuTucNop}}
            </div>
            <div class="button-activity">
                @if(Session::has('currentname')&&$currentAccount->kt_Quyen==1)
	                {{--<button type="button" class="btn btn-primary" href="/dangky"><i class="fas fa-file-signature" style="margin-right: 10px;"></i>Đăng ký</button>--}}

                    @if($checkInDataBaseRegisted == true)
                        <a href="" class="btn btn-primary" role="button"><i class="fas fa-file-signature" style="margin-right: 10px;"></i>Đã đăng ký</a>
                    @else
                        <a href="{{$id}}/dangky" class="btn btn-primary" role="button"><i class="fas fa-file-signature" style="margin-right: 10px;"></i>Đăng ký</a>
                    @endif
            	@endif
            </div>
            <div class="source-link">
            	<b>Nguồn: </b>
            	<a href="{{$scholarship->LinkDangKy}}">{{$scholarship->LinkDangKy}}</a>
	            <button type="button" class="btn btn-info align-middle" style="position: absolute;right: 0px;margin-top:6px;vertical-align: middle;text-align: center;"><i class="far fa-thumbs-up" style="margin-right: 10px;vertical-align: middle;"></i>Quan tâm</button>
            </div>
        </div>



		{{--Right Bar--}}
        <div class="rightside">
            <div class="right-tit">Vừa mới đăng</div>
			@foreach($rightBarScholarships as $rightBarScholarship)
            <a href="{{'../scholarship/'.$rightBarScholarship->id_HocBong}}" class="feed-post">
            	<div class="item-feed">
            		<img style="position: absolute;width: 40px;height: 40px;top:3px;left: 5px;" src="{{URL::asset($rightBarScholarship->AnhQuocKy)}}">
            		<img class="img-feed" src="{{URL::asset($rightBarScholarship->AnhBia)}}">
            		<div class="bg-tit">
            			<span>{{$rightBarScholarship->TenHocBong}}<br>{{$rightBarScholarship->TenNganhHoc}}</span>
            		</div>
            	</div>
            </a>
			@endforeach
        </div>

    </div>
    <div class="comment-container">
    	<span class="highlight-tit-n">Bình luận</span>
        @if(Session::has('currentname'))
            <div class="input-comment">
                <form action="{{$id}}/comment" method="post" id="commentform">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{--<textarea placeholder="Bình luận..." rows="20" name="comment_text" id="comment_text" cols="40" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true"></textarea>--}}
                    <textarea name="comment_text" id="" cols="40" rows="30" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true"></textarea>
                    <input type="submit" name="comment_submit" id="btn-cmt" class="btn btn-success btn-cmt" value="Bình luận">
                    {{--<a href="{{$id}}/comment" id="btn-cmt" class="btn btn-success btn-cmt">Bình luận</a>--}}
                </form>

                {{--<button id="btn-cmt" type="button" class="btn btn-success btn-cmt">Bình luận</button>--}}
            </div>
        @endif
        <div id="comment-content" class="comment-content">
            @foreach($comments as $comment)
                <div class="comment-line">
                    <span class="name-cmt">{{$comment->username}}</span><span class="time-cmt">{{$comment->ThoiGian}}</span>
                    <p class="content-cmt">
                        {{$comment->NoiDung}}
                    </p>
                </div>
            @endforeach
                {{--<div class="comment-line grey-color">--}}
                    {{--<span class="name-cmt">Hoàng Trọng Minh Đức</span><span class="time-cmt">13:23 20/10/2018</span> <span class="ans-cmt">Trả lời</span>--}}
                    {{--<p class="content-cmt">--}}
                        {{--This is awesome--}}
                    {{--</p>--}}
                {{--</div>--}}
        </div>
	</div>
    @include("footer");
    <!-- Xong phần footer -->
</body>

</html>