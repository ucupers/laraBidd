<div class="col-md-4">

    <div class="panel panel-default">
        <div class="panel-heading">Search</div>
        <form method="post" class="navbar-form" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input id="searchBox" type="text" class="form-control" placeholder="Search" value="@if(! empty($q)) {{ $q }} @endif" name="q">
                <div class="input-group-btn">
                    <button id="searchBoxSubmit" class="btn btn-default" type="submit"><i
                                class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
        </form>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">Tags</div>
        <div class="panel-body">
            @foreach($tags as $tag)
                <a class="label label-info" style="display: inline-block"
                   href="/products/tags/{{$tag->name}}">{{$tag->name}}</a>
            @endforeach
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">Powerseller</div>
        @foreach($bestUsers as $bestUser)
            <div class="panel-body">
                <a href="/users/{{$bestUser->id}}">{{$bestUser->name}}</a>
                {{$bestUser->products}}
            </div>
        @endforeach
    </div>
</div>