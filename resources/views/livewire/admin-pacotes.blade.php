<div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">{{ $isEditMode ? 'Editar Pacote' : 'Adicionar Novo Pacote' }}</h3>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'create' }}">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" class="form-control" wire:model="nome" placeholder="Nome do Pacote">
                    @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <input type="text" id="tipo" class="form-control" wire:model="tipo" placeholder="Tipo (Simples, Dupla, etc.)">
                    @error('tipo') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="number" step="0.01" id="preco" class="form-control" wire:model="preco" placeholder="Preço">
                    @error('preco') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="beneficios">Benefícios</label>
                    <textarea id="beneficios" class="form-control" wire:model="beneficios" placeholder="Benefícios separados por vírgula"></textarea>
                    @error('beneficios') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="btn btn-primary">{{ $isEditMode ? 'Atualizar' : 'Salvar' }}</button>
                <button type="button" class="btn btn-secondary" wire:click="resetForm">Cancelar</button>
            </form>
        </div>
    </div>

    <div class="card card-primary card-outline mt-4">
        <div class="card-header">
            <h3 class="card-title">Pacotes</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Preço</th>
                    <th>Benefícios</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pacotes as $pacote)
                    <tr>
                        <td>{{ $pacote->nome }}</td>
                        <td>{{ $pacote->tipo }}</td>
                        <td>R$ {{ number_format($pacote->preco, 2, ',', '.') }}</td>
                        <td>{{ $pacote->beneficios }}</td>
                        <td>
                            <button wire:click="edit({{ $pacote->id }})" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button wire:click="delete({{ $pacote->id }})" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $pacotes->links() }}
        </div>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success mt-4">
            {{ session('message') }}
        </div>
    @endif
</div>
