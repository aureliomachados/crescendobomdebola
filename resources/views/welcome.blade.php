@extends('layouts.app')

@section('content')
        <div class="content">
            <div class="row">

                <div class="col-md-3 col-md-offset-9">

                    <div class="panel panel-default">

                        <div class="panel-heading panel-title text-center">Usuários online (Última hora)</div>

                        <div class="panel-body">

                            <ul class="list-group">
                                @foreach($activities as $activity)
                                    @if(isset(Auth::user()->id) && Auth::user()->id  == $activity->user->id)
                                        <li class="list-group-item">{{$activity->user->name}} (Eu)</li>
                                        @else
                                        <li class="list-group-item">{{$activity->user->name}}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

