@extends('layouts.app')

@section('content')
        <div class="content">
            <div class="row">

                <div class="col-md-3"></div>

                <div class="col-md-6">
                    @if(Auth::guest())
                    <img src="{{asset("/imagens/logo.jpg")}}" width="100%" height="80%" alt="Crescendo Bom de Bola">
                    @endif
                </div>
                <div class="col-md-3">
                @if(Auth::user() != null)
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
                    @endif
                </div>
            </div>
        </div>
@endsection

