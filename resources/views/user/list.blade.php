<table class="default-table">

        <thead>
            <tr>
                <td>#</td>
                <td>CPF</td>
                <td>Nome</td>
                <td>Telefone</td>
                <td>Nascimento</td>
                <td>E-mail</td>
                <td>Status</td>
                <td>Permissão</td>
                <td>Editar</td>
                <td>Excluir</td>
            </tr>
        </thead>
    
        <tbody>
            @foreach ($user_list as $user)
                <tr>
                    <td> {{ $user->id }} </td>
                    <td> {{ $user->FormattedCpf }} </td>
                    <td> {{ $user->name }} </td>
                    <td> {{ $user->Formattedphone }} </td>
                    <td> {{ $user->Formattedbirth }} </td>
                    <td> {{ $user->email }} </td>
                    <td> {{ $user->status }} </td>
                    <td> {{ $user->permission }} </td>
                    <td>
                        <a class="editar" href="{{ route('user.edit', $user->id) }}">Editar</a>
                    </td>
                    <td>
                        {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE']) !!}
                            {!! Form::submit('Excluir') !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
        
    </table>