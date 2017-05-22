<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading">Powerseller</div>

        @foreach($bestUsers as $bestUser)

            <div class="panel-body">
                <a href="/users/{{$bestUser->id}}">{{$bestUser->name}}</a>
                {{$bestUser->products}}
            </div>

            @if ($product != $products->last())
                <hr> @endif

        @endforeach


    </div>
    <div class="panel panel-default">

        <div class="panel-heading">Tags</div>


        @foreach($tags as $tag)

            <div class="panel-body">
                <a href="/products/tags/{{$tag->name}}">{{$tag->name}}</a>
            </div>

        @endforeach


    </div>
</div>