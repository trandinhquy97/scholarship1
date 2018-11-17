<nav class="navbar navbar-light bg-faded navbar-fixed-top delete-margin" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="/">
            <img src="{{URL::asset('css/pictures/icon.png')}}" alt="">
        </a>
    </div>

    <ul class="nav navbar-nav itemsinnav">
        <li class="nav-item">
            <a class="nav-link" href="../scholarship">HỌC BỔNG</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../contest">CUỘC THI</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../workshop">WORKSHOP</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../contact">LIÊN HỆ</a>
        </li>
    </ul>

    <ul class="nav navbar-nav ml-auto leftitemsinnav">
        <input type="text" class="searchbar">
        {{--<li class="nav-item btnsearch">--}}
            {{--<button><i class="fas fa-search white"></i></button>--}}
        {{--</li>--}}
        <li class="nav-item btnlogin">
            <i class="fas fa-user-alt white"></i>
            @if(Session::has('currentname'))
                <a class="nav-link white namedisplay" href="../personal_info">{{Session::get('currentname')}},</a>
                {{--<a class="nav-link white" href="personal">{{Session::get('kt_quyen')}},</a>--}}
                <a class="nav-link white" href="logout">Đăng xuất</a>
            @else
                <a class="nav-link white" href="login">Login</a>
            @endif
        </li>
    </ul>
</nav>
