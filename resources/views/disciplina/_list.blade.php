<div class="direcao-title">
    <span>Disciplina <a href="{{ route('disciplina.create') }}"><i class="material-icons">add</i></a></span>
</div>

<div class="search-box">
    <input type="text" placeholder="Digite o nome">
    <button>Pesquisar</button>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Data de crição</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($disciplina as $value)
            <tr>
                <td>{{ $value->name ?? 'Nome não disponível' }}</td>
                <td>{{ $value->date_creation }}</td>
                <td>
                    <a href="{{ route('disciplina.edit', $value->id) }}" class="btn btn-primary">
                        <i class="material-icons">edit</i>
                        <span class="hover-text"></span>
                    </a>
                    <a href="#">Excluir</a>                           
                </td>   
            </tr>
        @empty
            <tr>
                <td colspan="4">Nenhum registro encontrado.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
</div>