<table>
    <thead>
        <tr>
            <th style="text-align: left;">Nome</th>
            <th style="text-align: center; padding-left: 200px;">Data de Criação</th>
            <th style="text-align: right; padding-right: 200px;">Opções</th>
        </tr>
    </thead>
    <tbody>
    @forelse ($turma as $value)
        <tr>
            <td style="text-align: left;">{{ $value->name ?? 'Nome não disponível' }}</td>
            <td style="text-align: center; padding-left: 200px;">{{ $value->date_creation }}</td>
            <td style="text-align: right;">
                <a href="{{ route('lotacao.index', ['turma_id' => $value->id]) }}" class="btn btn-info">
                    <i class="material-icons">assignment_ind</i>
                    <span class="hover-text">Lotação</span>
                </a>
                <a href="{{ route('matricula.index', ['turma_id' => $value->id]) }}" class="btn btn-warning">
                    <i class="material-icons">local_library</i>
                    <span class="hover-text">Matrícula</span>
                </a>
                <a href="{{ route('turma.edit', $value->id) }}" class="btn btn-primary">
                    <i class="material-icons">edit</i> Editar
                </a>

                @php
                    $hasLotacao = $value->lotacoes()->exists(); // Verifica se há lotação
                    $hasMatricula = $value->matriculas()->exists(); // Verifica se há matrícula
                @endphp

                <form id="delete-form-{{ $value->id }}" action="{{ route('turma.destroy', $value->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger {{ $hasLotacao || $hasMatricula ? 'disabled' : '' }}"
                        onclick="{{ $hasLotacao || $hasMatricula ? 'showWarning();' : 'confirmDelete(' . $value->id . ');' }}">
                        <i class="material-icons">delete</i> Excluir
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="3">Nenhum registro encontrado.</td>
        </tr>
    @endforelse
    </tbody>
</table>



<script>
    function showWarning() {
        document.getElementById('delete-warning').style.display = 'block';
        setTimeout(() => {
            document.getElementById('delete-warning').style.display = 'none';
        }, 3000); // Oculta a mensagem após 3 segundos
    }

    function confirmDelete(turmaId) {
        if (confirm('Você tem certeza que deseja excluir esta turma?')) {
            document.getElementById('delete-form-' + turmaId).submit();
        }
    }
</script>
