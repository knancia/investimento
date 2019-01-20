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
                <td>Excluir</td>
            </tr>
        </thead>
    
        <tbody>
            @foreach ($user_list as $user)
                <tr>
                    <td> {{ $user->id }} </td>
                    <td> {{ $user->cpf }} </td>
                    <td> {{ $user->name }} </td>
                    <td> {{ $user->phone }} </td>
                    <td> {{ $user->birth }} </td>
                    <td> {{ $user->email }} </td>
                    <td> {{ $user->status }} </td>
                    <td> {{ $user->permission }} </td>
                    <td>
                        {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE']) !!}
                            {!! Form::submit('Excluir') !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
        
    </table>