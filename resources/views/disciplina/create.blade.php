<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" id="name" name="nome" value="{{ old('nome', Auth::user()->name) }}" required>
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required disabled>
</div>

<div class="form-group">
    <label for="cpf">CPF</label>
    <input type="text" id="cpf" name="cpf" value="{{ old('cpf') }}" required>
</div>

<div class="form-group">
    <label for="birthdate">Data de Nascimento</label>
    <input type="date" id="birthdate" name="date_nascimento" value="{{ old('date_nascimento') }}" required>
</div>
