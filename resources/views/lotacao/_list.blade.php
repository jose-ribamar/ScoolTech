<form method="GET" action="{{ route('lotacao.index') }}" class="search-box">
    <select name="turma_id">
        <option value="">Selecione a turma</option>
        @foreach ($turmas as $turma)
            <option value="{{ $turma->id }}" {{ request('turma_id') == $turma->id ? 'selected' : '' }}>
                {{ $turma->name }}
            </option>
        @endforeach
    </select>
    <button type="submit">Filtrar</button>
</form>

<div class="table-container">
    <table>
        <thead>
            <tr>
              
                <th>Docente</th>
                <th>Disciplina</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($lotacao as $item)
            <tr>
               
                <td>{{ $item->docente->user->name ?? 'Nome não disponível' }}</td> <!-- Accessing docente related to the item -->
                <td>{{ $item->disciplina->name ?? 'Nome não disponível' }}</td>
                <td>
                    <a href="{{ route('lotacao.edit', $item->id) }}" class="btn btn-primary">
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