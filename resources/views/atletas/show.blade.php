@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Atleta
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                  @include('atletas.show_fields')
                    <a href="{{ route('report.atleta', ['id' => $atleta->id]) }}" class="btn btn-default "> <i class="glyphicon glyphicon-floppy-save"></i> PDF</a>
                  <a href="{!! route('atletas.index') !!}" class="btn btn-default">Voltar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
