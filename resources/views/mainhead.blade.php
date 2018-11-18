<div class="mainhead">
    <div class="box">
        <h2 class="head">Khám phá những cơ hội mới</h2>
        <form action="{{url('/searchinfo')}}" class="form" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="inputBox">
                <input type="text" name="search" placeholder="Tìm kiếm">
            </div>

            <button type="submit" class="">Submit</button>
        </form>
    </div>
</div>