@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Our products</div>


                        @foreach($products as $product)

                            <div class="panel-body">
                                <li><b>{{ $product->title }}</b></li>
                                <ul>
                                    <li><b>Desc : </b>{{ $product->description }}</li>
                                    <li><b>Img : </b> <img class="sample" src="{{ $product->imgUrl }}" /> </li>
                                    <li><b>MinBid : </b>{{ $product->minBid }}</li>
                                    <li><b>Instant purchase : </b>{{ $product->instantPurchasePrice }}</li>
                                </ul>
                            </div>

                            @if ($product != $products->last())  <hr> @endif

                        @endforeach


                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Powerseller</div>


                    @foreach($bestUsers as $bestUser)

                        <div class="panel-body">
                            <a href="/users/{{$bestUser->id}}" >{{$bestUser->name}}</a>
                            {{$bestUser->products}}
                        </div>

                        @if ($product != $products->last())  <hr> @endif

                    @endforeach


                </div>
            </div>
        </div>
    </div>
@endsection


