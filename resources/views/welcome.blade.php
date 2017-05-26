@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">Our products</div>


            @foreach($products as $product)

                <div class="panel-body">
                    <h2 class="text-center"><a href="{{ route('productsShow', ['id' => $product->id]) }}">{{ $product->title }}</a></h2>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <img class="img-responsive img-thumbnail" src="{{ $product->imgUrl }}"/>
                            @foreach($product->tags as $tag)
                                <a href="/products/tags/{{$tag->name}}" style="font-size: 1.5rem; line-height: 4rem" class="label label-info">{{$tag->name}}</a>
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            <p>{{ $product->description }}</p>
                            <p><b>MinBid : </b><span class="label label-success"> {{ $product->minBid }} €</span></p>
                            <p><b>Instant purchase : </b><span class="label label-success"> {{ $product->instantPurchasePrice }} €</span></p>
                            <h3>Bid for this product !</h3>
                            <div class="alert alert-info">
                                This sale will end in <b>{{$product->duration->diffForHumans()}}</b>
                            </div>
                            <div class="btn-group btn-group-justified">
                                <a href="{{ route('productsShow', ['id' => $product->id]) }}" class="btn btn-success">Bid for this product !</a>
                            </div>
                        </div>
                    </div>
                    <br>


                </div>

                @if ($product != $products->last()) <hr> @endif

            @endforeach

            @if ( method_exists($products, 'links'))
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    {{ $products->links() }}
                </div>
            </div>
            @endif

        </div>
    </div>
    @include('layouts.sidebar')
@endsection


