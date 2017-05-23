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
                                    @foreach($product->tags as $tag)
                                        <a href="/products/tags/{{$tag->name}}" style="font-size: 1.5rem; line-height: 5rem"
                                           class="label label-info">{{$tag->name}}</a>
                                    @endforeach
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
                                    <div class="row">
                                        <div class="col-md-4">
                                            <form method="post" action="/biding/{{ $product->id }}">
                                                {{csrf_field()}}
                                                <input type="hidden" name="amount" value="1">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">1 €</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-4">
                                            <form method="post" action="/biding/{{ $product->id }}">
                                                {{csrf_field()}}
                                                <input type="hidden" name="amount" value="10">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-info">10 €</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-4">
                                            <form method="post" action="/biding/{{ $product->id }}">
                                                {{csrf_field()}}
                                                <input type="hidden" name="amount" value="100">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-success">100 €</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="row">
                                            <div class="jumbotron">
                                                @foreach($product->bids as $bid)
                                                    <li class="list-group-item">
                                                        <b>{{$bid->amount}} €</b>
                                                    </li>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
