<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Datanascimento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('datanascimento', 'Data de nascimento:') !!}
    {!! Form::date('datanascimento', null, ['class' => 'form-control']) !!}
</div>

<!-- Idade Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idade', 'Idade:') !!}
    {!! Form::number('idade', null, ['class' => 'form-control']) !!}
</div>

<!-- Colegio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('colegio', 'Colegio:') !!}
    {!! Form::text('colegio', null, ['class' => 'form-control']) !!}
</div>

<!-- Turno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('turno', 'Turno:') !!}
    {!! Form::text('turno', null, ['class' => 'form-control']) !!}
</div>

<!-- Serie Field -->
<div class="form-group col-sm-6">
    {!! Form::label('serie', 'Serie:') !!}
    {!! Form::text('serie', null, ['class' => 'form-control']) !!}
</div>

<!-- Apto Field -->
<div class="form-group col-sm-12">
    {!! Form::label('apto', 'Apto:') !!}
    <label class="radio-inline">
        {!! Form::radio('apto', "1", null) !!} Sim
    </label>
    <label class="radio-inline">
        {!! Form::radio('apto', "0", null) !!} Não
    </label>
</div>

<!-- Nomeresponsavel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomeresponsavel', 'Nome do responsável:') !!}
    {!! Form::text('nomeresponsavel', null, ['class' => 'form-control']) !!}
</div>

<!-- Dataregistro Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dataregistro', 'Data do registro:') !!}
    {!! Form::date('dataregistro', null, ['class' => 'form-control']) !!}
</div>

<!-- Bairro Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bairro', 'Bairro:') !!}
    {!! Form::text('bairro', null, ['class' => 'form-control']) !!}
</div>

<!-- Endereco Field -->
<div class="form-group col-sm-6">
    {!! Form::label('endereco', 'Endereco:') !!}
    {!! Form::text('endereco', null, ['class' => 'form-control']) !!}
</div>

<!-- Numero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero', 'Numero:') !!}
    {!! Form::text('numero', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefone', 'Telefone:') !!}
    {!! Form::text('telefone', null, ['class' => 'form-control']) !!}
</div>

<!-- Celular Field -->
<div class="form-group col-sm-6">
    {!! Form::label('celular', 'Celular:') !!}
    {!! Form::text('celular', null, ['class' => 'form-control']) !!}
</div>

<!-- Identidade Field -->
<div class="form-group col-sm-6">
    {!! Form::label('identidade', 'Identidade:') !!}
    {!! Form::text('identidade', null, ['class' => 'form-control']) !!}
</div>

<!-- Orgaoexpedidor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('orgaoexpedidor', 'Órgão expedidor:') !!}
    {!! Form::text('orgaoexpedidor', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('atletas.index') !!}" class="btn btn-default">Cancel</a>
</div>
