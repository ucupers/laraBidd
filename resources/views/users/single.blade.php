@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Sellers</div>


                    <div class="panel-body">
                        <h1>{{$user->name}}</h1>
                        <a class="btn" href="mailto:{{$user->email}}">Send a mail to {{$user->email}}</a>

                        <hr>
                        <p>Products sold by <b>{{$user->name}}</b> :</p>
                        @foreach($products as $product)
                            <div class="panel-body @if (Carbon\Carbon::parse($product->duration)->diffInDays(\Carbon\Carbon::now(), false) > 0) alert alert-warning @endif">
                                @if (Carbon\Carbon::parse($product->duration)->diffInDays(\Carbon\Carbon::now(), false) > 0)
                                    <span class="label label-danger">EXPIRED</span> @endif
                                <h2><b>{{ $product->title }}</b></h2>
                                <ul>
                                    <li><b>Desc : </b>{{ $product->description }}</li>
                                    <li><b>MinBid : </b>{{ $product->minBid }}</li>
                                    <li><b>Instant purchase : </b>{{ $product->instantPurchasePrice }}</li>
                                </ul>
                                <div class="winner">
                                    @foreach( \auctionTime\Product::bidById($product->id) as $b)
                                        <div class="alert alert-info">
                                            <ul>
                                                <li>{{$b->user->name}}</li>
                                                <li>{{$b->amount}}</li>
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>

                                <p>
                                    End : <b>{{$product->duration}}</b>
                                </p>
                                <a href="{{ route('productsShow', ['id' => $product->id]) }}" class="btn btn-primary">Visit
                                    the product page</a>

                                @if ($product->user_id == Auth::user()->id)
                                    <a href="{{ route('productsEdit', ['product' => $product->id]) }}"
                                       class="btn btn-warning">Edit your product</a>
                                    <a href="{{ route('productsDelete', ['product' => $product->id]) }}"
                                       class="btn btn-danger">Delete your product</a>

                                @endif
                            </div>

                            <hr>
                        @endforeach

                    </div>


                </div>
            </div>

        </div>
    </div>
@endsection


