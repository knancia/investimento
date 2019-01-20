<table class="default-table">

        <thead>
            <tr>
                <td>#</td>
                <td>Nome do Grupo</td>
                <td>Instituição</td>
                <td>Usuário</td>
                <td>Detalhes</td>
                <td>Editar</td>
                <td>Excluir</td>
            </tr>
        </thead>
    
        <tbody>
            @foreach ($group_list as $group)
                <tr>
                    <td> {{ $group->id }} </td>
                    <td> {{ $group->name }} </td>
                    <td> {{ $group->instituition->name }} </td>
                    <td> {{ $group->owner->name }} </td>
                    <td>
                        <a class="detalhes" href="{{ route('group.show', $group->id) }}">Detalhes</a>
                    </td>
                    <td>
                        <a class="editar" href="{{ route('group.edit', $group->id) }}">Editar</a>
                    </td>
                    <td>
                        {!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'DELETE']) !!}
                            {!! Form::submit('Excluir') !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
        
    </table> 