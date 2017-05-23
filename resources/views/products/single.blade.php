@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Sold by
                        <b><em>{{ $product->user->name }}</em></b> {{ $product->created_at->diffForHumans() }}</div>
                    <div class="panel-body">
                        <div class="panel-body">
                            <h2 class="text-center"><a
                                        href="{{ route('productsShow', ['id' => $product->id]) }}">{{ $product->title }}</a>
                            </h2>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <img class="img-responsive img-thumbnail" src="{{ $product->imgUrl }}"/>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $product->description }}</p>
                                    <p><b>MinBid : </b><span class="label label-success"> {{ $product->minBid }}
                                            €</span></p>
                                    <p><b>Instant purchase : </b><span class="label label-success"> {{ $product->instantPurchasePrice }}
                                            €</span></p>
                                    <h3>Bid for this product !</h3>
                                    <div class="alert alert-info">
                                        This sale will end <b>{{$product->duration->diffForHumans()}}</b>
                                    </div>
                                </div>
                            </div>
                            <br>
                            @foreach($product->tags as $tag)
                                <a href="/products/tags/{{$tag->name}}" style="font-size: 1.5rem; line-height: 4rem" class="label label-info">{{$tag->name}}</a>
                            @endforeach
                            <br>
                            <br>
                            <div class="btn-group btn-group-justified">
                                <a href="#" class="btn btn-primary">1€</a>
                                <a href="#" class="btn btn-info">5€</a>
                                <a href="#" class="btn btn-success">10€</a>
                            </div>
                        </div>

                        <hr>

                        <div class="comments">
                            <ul class="list-group">
                                @foreach($product->ratings as $rating)
                                    <li class="list-group-item">
                                        <p>By : {{$rating->user->email}}</p>
                                        <p>{{$rating->created_at->diffForHumans()}}</p>
                                        <b>{{$rating->grade}} / 5</b>
                                        <em>{{$rating->comment}}</em>
                                    </li>
                                @endforeach
                            </ul>

                            @if (!Auth::guest())

                                <div class="card">
                                    <div class="card-block">
                                        <form method="post" action="/products/{{ $product->id }}/ratings">
                                            {{csrf_field()}}
                                            <h4>Leave a rewiew :</h4>
                                            <div class="form-group">
                                                <label class="radio-inline"><input type="radio" name="grade" value="1">1</label>
                                                <label class="radio-inline"><input type="radio" name="grade" value="2">2</label>
                                                <label class="radio-inline"><input type="radio" name="grade" value="3">3</label>
                                                <label class="radio-inline"><input type="radio" name="grade" value="4">4</label>
                                                <label class="radio-inline"><input type="radio" name="grade"
                                                                                   value="5">5</label>
                                            </div>
                                            <div class="form-group">
                                            <textarea class="form-control" name="comment"
                                                      placeholder="Your rewiew..."></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
