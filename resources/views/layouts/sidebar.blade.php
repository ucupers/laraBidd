<div class="col-md-4">
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
            @if ($product != $products->last())<hr> @endif
        @endforeach
    </div>
</div>