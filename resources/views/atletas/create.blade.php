@extends('layouts.app')

@section('content')
 <section class="content-header">
        <h1>
            Atleta
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'atletas.store']) !!}

                              @include('atletas.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.datepicker').datepicker({
                language: 'pt-BR'
            });
        });
    </script>
@endsection
