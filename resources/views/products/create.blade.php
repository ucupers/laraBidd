@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create product</div>

                    <div class="panel-body">

                        <form class="form" method="post" action="/tag-store">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <div class="col-xs-7">
                                    <label for="name">Add tags (optional) :</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="col-xs-3">
                                    <button style="margin-top: 26px" class="btn btn-primary">Add</button>
                                </div>

                            </div>
                        </form>

                        <hR>

                        <form class="form" method="post" action="">
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title">Title :</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       value="{{ old('title') }}" required>
                            </div>

                            <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="title">Description :</label>
                                <textarea class="form-control" id="description" name="description"
                                          required>{{ old('description') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="tags">Tags :</label>
                                <select class="form-control select2-multi" name="tags[]" multiple="multiple" data-placeholder="Select tags">
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}
                                    </option>
                                @endforeach
                                </select>

                            </div>

                            <div class="form-group {{ $errors->has('imgUrl') ? ' has-error' : '' }}">
                                <label for="title">Img-Url :</label>
                                <input type="text" class="form-control" id="imgUrl" name="imgUrl"
                                       value="{{ old('imgUrl') }}" required>
                            </div>

                            <div class="form-group {{ $errors->has('minBid') ? ' has-error' : '' }}">
                                <label for="title">Min-bid :</label>
                                <input type="number" class="form-control" id="minBid" name="minBid" required>
                            </div>

                            <div class="form-group {{ $errors->has('instantPurchasePrice') ? ' has-error' : '' }}">
                                <label for="title">Instant purchase price :</label>
                                <input type="number" class="form-control" id="instantPurchasePrice"
                                       name="instantPurchasePrice">
                            </div>

                            <div class="form-group">
                                <label>Duration :</label>
                                <label class="radio-inline"><input type="radio" name="duration" value="7">1 week</label>
                                <label class="radio-inline"><input type="radio" name="duration" value="14">2
                                    weeks</label>
                                <label class="radio-inline"><input type="radio" name="duration" checked="checked"
                                                                   value="21">3 weeks</label>
                                <label class="radio-inline"><input type="radio" name="duration" value="28">4
                                    weeks</label>
                            </div>

                            <div class="form-group">
                                <label>State :</label>
                                <label class="radio-inline"><input type="radio" name="active" checked="checked"
                                                                   value="1">Active</label>
                                <label class="radio-inline"><input type="radio" name="active" value="0">Sleeping</label>
                            </div>

                            <hr>

                            <div class="form-group">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                            @if (count($errors))
                                <div class="form-group">
                                    <div class="alert alert-danger">
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
