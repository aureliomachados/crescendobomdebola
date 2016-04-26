<li class="{{ Request::is('contatos*') ? 'active' : '' }}">
    <a href="{!! route('contatos.index') !!}"><i class="fa fa-edit"></i><span>Contatos</span></a>
</li>

<li class="{{ Request::is('atletas*') ? 'active' : '' }}">
    <a href="{!! route('atletas.index') !!}"><i class="fa fa-edit"></i><span>Atletas</span></a>
</li>

