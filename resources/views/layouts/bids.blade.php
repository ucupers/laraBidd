<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading">Your bids</div>

        @foreach($user->bids as $bid)
            <div class="panel-body">
                <b>{{$bid->product->title}}</b>

                <li>
                    <em>{{$bid->created_at->diffForHumans()}}</em>
                </li>
                <li>
                    {{$bid->amount}} €
                </li>
                <a class="label label-success" href="{{ route('productsShow', ['id' => $bid->product->id]) }}">Visit
                    product page</a>
            </div>
        @endforeach
    </div>
</div>