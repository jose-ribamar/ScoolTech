<div class="turma-title">
    <span>Turma <a href="{{ route('turma.create') }}"><i class="material-icons">add</i></a></span>
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
                <th>Ano escolar</th>
                <th>Data de criação</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($turma as $value)
            <tr>
                <td>{{ $value->name ?? 'Nome não disponível' }}</td>
                <td>{{ $value->ano ?? 'Ano não disponível' }}° ANO</td>
                <td>{{ $value->date_creation }}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('lotacao.index', ['turma_id' => $value->id]) }}" class="btn btn-info">
                            <i class="material-icons">assignment_ind</i>
                            <span class="hover-text">Lotação</span>
                        </a>
                        
                        
                        <a href="{{ route('matricula.index', ['turma_id' => $value->id]) }}" class="btn btn-warning"><i class="material-icons">local_library</i>
                            <span class="hover-text">Matrícula</span>
                        </a>
                        <a href="{{ route('turma.edit', $value->id) }}" class="btn btn-primary"><i class="material-icons">create</i>
                            <span class="hover-text">Editar</span>
                        </a>
                        
                        </form>
                    </div>
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