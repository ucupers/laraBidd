@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create product</div>

                    <div class="panel-body">

                        <form class="form" method="post" action="">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title">Title :</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                            </div>

                            <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="title">Description :</label>
                                <textarea class="form-control" id="description" name="description" required>{{ old('description') }}</textarea>
                            </div>

                            <div class="form-group {{ $errors->has('imgUrl') ? ' has-error' : '' }}">
                                <label for="title">Img-Url :</label>
                                <input type="text" class="form-control" id="imgUrl" name="imgUrl" value="{{ old('imgUrl') }}" required>
                            </div>

                            <div class="form-group {{ $errors->has('minBid') ? ' has-error' : '' }}">
                                <label for="title">Min-bid :</label>
                                <input type="number" class="form-control" id="minBid" name="minBid" required>
                            </div>

                            <div class="form-group {{ $errors->has('instantPurchasePrice') ? ' has-error' : '' }}">
                                <label for="title">Instant purchase price :</label>
                                <input type="number" class="form-control" id="instantPurchasePrice" name="instantPurchasePrice">
                            </div>

                            <label class="radio-inline"><input type="radio" name="active" value="1">Active</label>
                            <label class="radio-inline"><input type="radio" name="active" value="0">Sleeping</label>
                            <hr>

                            <div class="form-group">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                            @if (count($errors))
                                <div class="form-group"><div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
