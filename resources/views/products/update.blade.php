@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Single product</div>

                    <div class="panel-body">

                        <b>{{ $product->title }}</b>
                        <ul>
                            <li><b>Desc : </b>{{ $product->description }}</li>
                            <li><b>Img : </b><img class="sample" src="{{ $product->imgUrl }}" /></li>
                            <li><b>MinBid : </b>{{ $product->minBid }}</li>
                            <li><b>Instant purchase : </b>{{ $product->instantPurchasePrice }}</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
