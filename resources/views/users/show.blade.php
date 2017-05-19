@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Sellers</div>


                    @foreach($users as $user)

                        <div class="panel-body">
                            <a href="/users/{{$user->id}}" >{{$user->name}}</a>
                            {{$user->products}}
                        </div>

                    @endforeach


                </div>
            </div>

        </div>
    </div>
@endsection


