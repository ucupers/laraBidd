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
                            <li><b>Img : </b><img class="sample" src="{{ $product->imgUrl }}"/></li>
                            <li><b>MinBid : </b>{{ $product->minBid }}</li>
                            <li><b>Instant purchase : </b>{{ $product->instantPurchasePrice }}</li>
                        </ul>

                        <hr>

                        <div class="comments">
                            <ul class="list-group">
                                @foreach($product->ratings as $rating)
                                    <li class="list-group-item">
                                        <p>{{$rating->created_at->diffForHumans()}}</p>
                                        <b>{{$rating->grade}} / 5</b>
                                        <em>{{$rating->comment}}
                                    </li>
                                @endforeach
                            </ul>

                            <hr>

                            <div class="card">
                                <div class="card-block">
                                    <form method="post" action="/products/{{ $product->id }}/ratings">
                                        {{csrf_field()}}

                                        <h4>Leave a rewiew :</h4>
                                        <div class="form-group">
                                            <label class="radio-inline"><input type="radio" name="grade"
                                                                               value="1">1</label>
                                            <label class="radio-inline"><input type="radio" name="grade"
                                                                               value="2">2</label>
                                            <label class="radio-inline"><input type="radio" name="grade"
                                                                               value="3">3</label>
                                            <label class="radio-inline"><input type="radio" name="grade"
                                                                               value="4">4</label>
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
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
