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
                        <a class="content-data" align="left"> {{$scholarship->Diem}}{{$scholarship->TenChungChi}}</a><br>
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
	            <button type="button" class="btn btn-primary"><i class="fas fa-file-signature" style="margin-right: 10px;"></i>Đăng ký</button>
            	
            </div>
            <div class="source-link">
            	<b>Nguồn: </b>
            	<a href="{{$scholarship->LinkDangKy}}">{{$scholarship->LinkDangKy}}</a>
	            <button type="button" class="btn btn-info align-middle" style="position: absolute;right: 0px;margin-top:6px;vertical-align: middle;text-align: center;"><i class="far fa-thumbs-up" style="margin-right: 10px;vertical-align: middle;"></i>Quan tâm</button>
            </div>
        </div>
        <div class="rightside">
            <div class="right-tit">Vừa mới đăng</div>
            <div href="#" class="feed-post">
            	<div class="item-feed">
            		<img style="position: absolute;width: 40px;height: 40px;top:3px;left: 5px;" src="{{URL::asset('css/pictures/usa.png')}}">
            		<img class="img-feed" src="{{URL::asset('css/pictures/mainbackground.png')}}">
            		<div class="bg-tit">
            			<span>Học bổng toàn phần chính phủ Đức ngành CNTT<br>Công nghệ thông tin</span>
            		</div>
            	</div>
            </div>
            <div href="#" class="feed-post">
            	<div class="item-feed">
            		<img style="position: absolute;width: 40px;height: 40px;top:3px;left: 5px;" src="{{URL::asset('css/pictures/usa.png')}}">
            		<img class="img-feed" src="{{URL::asset('css/pictures/mainbackground.png')}}">
            		<div class="bg-tit">
            			<span>Học bổng toàn phần chính phủ Đức ngành CNTT<br>Công nghệ thông tin</span>
            		</div>
            	</div>
            </div>
            <div href="#" class="feed-post">
            	<div class="item-feed">
            		<img style="position: absolute;width: 40px;height: 40px;top:3px;left: 5px;" src="{{URL::asset('css/pictures/usa.png')}}">
            		<img class="img-feed" src="{{URL::asset('css/pictures/mainbackground.png')}}">
            		<div class="bg-tit">
            			<span>Học bổng toàn phần chính phủ Đức ngành CNTT<br>Công nghệ thông tin</span>
            		</div>
            	</div>
            </div>
            <div href="#" class="feed-post">
            	<div class="item-feed">
            		<img style="position: absolute;width: 40px;height: 40px;top:3px;left: 5px;" src="{{URL::asset('css/pictures/usa.png')}}">
            		<img class="img-feed" src="{{URL::asset('css/pictures/mainbackground.png')}}">
            		<div class="bg-tit">
            			<span>Học bổng toàn phần chính phủ Đức ngành CNTT<br>Công nghệ thông tin</span>
            		</div>
            	</div>
            </div>
            <div href="#" class="feed-post">
            	<div class="item-feed">
            		<img style="position: absolute;width: 40px;height: 40px;top:3px;left: 5px;" src="{{URL::asset('css/pictures/usa.png')}}">
            		<img class="img-feed" src="{{URL::asset('css/pictures/mainbackground.png')}}">
            		<div class="bg-tit">
            			<span>Học bổng toàn phần chính phủ Đức ngành CNTT<br>Công nghệ thông tin</span>
            		</div>
            	</div>
            </div>
            <div href="#" class="feed-post">
            	<div class="item-feed">
            		<img style="position: absolute;width: 40px;height: 40px;top:3px;left: 5px;" src="{{URL::asset('css/pictures/usa.png')}}">
            		<img class="img-feed" src="{{URL::asset('css/pictures/mainbackground.png')}}">
            		<div class="bg-tit">
            			<span>Học bổng toàn phần chính phủ Đức ngành CNTT<br>Công nghệ thông tin</span>
            		</div>
            	</div>
            </div>
            <div href="#" class="feed-post">
            	<div class="item-feed">
            		<img style="position: absolute;width: 40px;height: 40px;top:3px;left: 5px;" src="{{URL::asset('css/pictures/usa.png')}}">
            		<img class="img-feed" src="{{URL::asset('css/pictures/mainbackground.png')}}">
            		<div class="bg-tit">
            			<span>Học bổng toàn phần chính phủ Đức ngành CNTT<br>Công nghệ thông tin</span>
            		</div>
            	</div>
            </div>
            <div href="#" class="feed-post">
            	<div class="item-feed">
            		<img style="position: absolute;width: 40px;height: 40px;top:3px;left: 5px;" src="{{URL::asset('css/pictures/usa.png')}}">
            		<img class="img-feed" src="{{URL::asset('css/pictures/mainbackground.png')}}">
            		<div class="bg-tit">
            			<span>Học bổng toàn phần chính phủ Đức ngành CNTT<br>Công nghệ thông tin</span>
            		</div>
            	</div>
            </div>
            
        </div>

    </div>
    <div class="comment-container">
    	<span class="highlight-tit-n">Bình luận</span>
        <div class="input-comment">
        	<textarea placeholder="Bình luận..." rows="20" name="comment[text]" id="comment_text" cols="40" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true"></textarea>
        	<button id="btn-cmt" type="button" class="btn btn-success btn-cmt">Bình luận</button>
        </div>
        <div id="comment-content" class="comment-content">
        	<div class="comment-line grey-color"  id="cmt-1">
        		<span class="name-cmt">Hoàng Trọng Minh Đức</span><span class="time-cmt">13:23 20/10/2018</span> <span class="ans-cmt">Trả lời</span>
        		<p class="content-cmt">
        			This is awesome
        		</p>
        		<div class="reply-line">
        			<div class="reply-cmt">
	        			<span class="name-cmt">Hoàng Trọng Minh Đức</span><span class="time-cmt">13:23 20/10/2018</span> <span class="ans-cmt"  id="cmt-2">Trả lời</span>
		        		<p class="content-cmt">
		        			This is awesome
		        		</p>
        			</div>
        			<div class="reply-cmt">
	        			<span class="name-cmt">Hoàng Trọng Minh Đức</span><span class="time-cmt">13:23 20/10/2018</span> <span class="ans-cmt">Trả lời</span>
		        		<p class="content-cmt">
		        			This is awesome
		        		</p>
        			</div>
        			<div class="reply-cmt">
	        			<span class="name-cmt">Hoàng Trọng Minh Đức</span><span class="time-cmt">13:23 20/10/2018</span> <span class="ans-cmt">Trả lời</span>
		        		<p class="content-cmt">
		        			This is awesome
		        		</p>
        			</div>
        		</div>
        	</div>
        	<div class="comment-line">
        		<span class="name-cmt">Hoàng Trọng Minh Đức</span><span class="time-cmt">13:23 20/10/2018</span> <span class="ans-cmt">Trả lời</span>
        		<p class="content-cmt">
        			This is awesome
        		</p>
        	</div>
        	<div class="comment-line grey-color">
        		<span class="name-cmt">Hoàng Trọng Minh Đức</span><span class="time-cmt">13:23 20/10/2018</span> <span class="ans-cmt">Trả lời</span>
        		<p class="content-cmt">
        			This is awesome
        		</p>
        	</div>
        	<div class="comment-line">
        		<span class="name-cmt">Hoàng Trọng Minh Đức</span><span class="time-cmt">13:23 20/10/2018</span> <span class="ans-cmt">Trả lời</span>
        		<p class="content-cmt">
        			This is awesome
        		</p>
        	</div>
        	<div class="comment-line grey-color">
        		<span class="name-cmt">Hoàng Trọng Minh Đức</span><span class="time-cmt">13:23 20/10/2018</span> <span class="ans-cmt">Trả lời</span>
        		<p class="content-cmt">
        			This is awesome
        		</p>
        	</div>
        	<div class="comment-line">
        		<span class="name-cmt">Hoàng Trọng Minh Đức</span><span class="time-cmt">13:23 20/10/2018</span> <span class="ans-cmt">Trả lời</span>
        		<p class="content-cmt">
        			This is awesome
        		</p>
        	</div>
        </div>
	</div>
    @include("footer");
    <!-- Xong phần footer -->
</body>

</html>