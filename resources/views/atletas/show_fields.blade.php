<!-- Id Field
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $atleta->id !!}</p>
</div>
-->

<!-- Nome Field -->
<div class="form-group">
    {!! Form::label('nome', 'Nome:') !!}
    <p>{!! $atleta->nome !!}</p>
</div>

<!-- Datanascimento Field -->
<div class="form-group">
    {!! Form::label('datanascimento', 'Data de nascimento:') !!}
    <p>{{date('d/m/Y', strtotime($atleta->datanascimento))}}</p>
</div>

<!-- Idade Field -->
<div class="form-group">
    {!! Form::label('idade', 'Idade:') !!}
    <p>{!! $atleta->datanascimento->age !!}</p>
</div>

<!-- Colegio Field -->
<div class="form-group">
    {!! Form::label('colegio', 'Colégio:') !!}
    <p>{!! $atleta->colegio !!}</p>
</div>

<!-- Turno Field -->
<div class="form-group">
    {!! Form::label('turno', 'Turno:') !!}
    <p>{!! $atleta->turno !!}</p>
</div>

<!-- Serie Field -->
<div class="form-group">
    {!! Form::label('serie', 'Série:') !!}
    <p>{!! $atleta->serie !!}</p>
</div>

<!-- Apto Field -->
<div class="form-group">
    {!! Form::label('apto', 'Apto:') !!}
    <p>{!! ($atleta->apto) ? 'Sim' : 'Não' !!}</p>
</div>

<!-- Nomeresponsavel Field -->
<div class="form-group">
    {!! Form::label('nomeresponsavel', 'Nome do responsavel:') !!}
    <p>{!! $atleta->nomeresponsavel !!}</p>
</div>

<!-- Dataregistro Field -->
<div class="form-group">
    {!! Form::label('dataregistro', 'Data do registro:') !!}
    <p>{{date('d/m/Y', strtotime($atleta->dataregistro))}}</p>
</div>

<!-- Bairro Field -->
<div class="form-group">
    {!! Form::label('bairro', 'Bairro:') !!}
    <p>{!! $atleta->bairro !!}</p>
</div>

<!-- Endereco Field -->
<div class="form-group">
    {!! Form::label('endereco', 'Endereço:') !!}
    <p>{!! $atleta->endereco !!}</p>
</div>

<!-- Numero Field -->
<div class="form-group">
    {!! Form::label('numero', 'Número:') !!}
    <p>{!! $atleta->numero !!}</p>
</div>

<!-- Telefone Field -->
<div class="form-group">
    {!! Form::label('telefone', 'Telefone:') !!}
    <p>{!! $atleta->telefone !!}</p>
</div>

<!-- Celular Field -->
<div class="form-group">
    {!! Form::label('celular', 'Celular:') !!}
    <p>{!! $atleta->celular !!}</p>
</div>

<!-- Identidade Field -->
<div class="form-group">
    {!! Form::label('identidade', 'Identidade:') !!}
    <p>{!! $atleta->identidade !!}</p>
</div>

<!-- Orgaoexpedidor Field -->
<div class="form-group">
    {!! Form::label('orgaoexpedidor', 'Orgão expedidor:') !!}
    <p>{!! $atleta->orgaoexpedidor !!}</p>
</div>

<!-- Created At Field -->
<!--
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $atleta->created_at !!}</p>
</div>

<!-- Updated At Field
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $atleta->updated_at !!}</p>
</div>
-->

