<table class="table table-responsive" id="atletas-table">
    <thead>
        <th>Nome</th>
        <th>Data de nascimento</th>
        <th>Idade</th>
        <th>Colegio</th>
        <th>Turno</th>
        <th>Serie</th>
        <th>Apto</th>
        <th>Nome do responsavel</th>
        <th>Celular</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($atletas as $atleta)
        <tr>
            <td>{!! $atleta->nome !!}</td>
            <td>{{date('d/m/Y', strtotime($atleta->datanascimento))}}</td>
            <td>{!! $atleta->idade !!}</td>
            <td>{!! $atleta->colegio !!}</td>
            <td>{!! $atleta->turno !!}</td>
            <td>{!! $atleta->serie !!}</td>
            <td>{!! ($atleta->apto) ? 'Sim' : 'Não' !!}</td>
            <td>{!! $atleta->nomeresponsavel !!}</td>
            <td>{!! $atleta->celular !!}</td>
            <td>
                {!! Form::open(['route' => ['atletas.destroy', $atleta->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('atletas.show', [$atleta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('atletas.edit', [$atleta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>