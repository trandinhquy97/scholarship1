<div class="row">
    <form class="navbar-form" role="search" >
        <button type="button" id="back" class="btn btn-secondary ripple mr-1 mb-2" style="margin-left: 20px;"><i class="la la-reply"></i></button>
        <div class="input-group add-on" style="float:right;clear:both;margin-right:20px;">
          <input class="form-control" placeholder="Search" name="search_query" id="search_query" type="text" 
          @if(!is_null($search))
          		value="{{$search}}"
          @endif
          >
          <div class="input-group-btn">
            <button class="btn btn-default" type="submit" style="padding: 4px 4px;"><i class="la la-search"></i></button>
          </div>
        </div>
      </form>
</div>