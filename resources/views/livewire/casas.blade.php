<div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title text-dark">{{ $isEditMode ? 'Editar Casa' : 'Adicionar Nova Casa' }}</h3>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'create' }}">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" class="form-control" wire:model="nome" placeholder="Nome">
                    @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="logo_url">Logo URL</label>
                    <input type="url" id="logo_url" class="form-control" wire:model="logo_url" placeholder="URL do Logo">
                    @error('logo_url') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea id="descricao" class="form-control" wire:model="descricao" placeholder="Descrição"></textarea>
                    @error('descricao') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="avaliacao">Avaliação</label>
                    <input type="number" id="avaliacao" class="form-control" wire:model="avaliacao" placeholder="Avaliação (0-5)" step="0.1">
                    @error('avaliacao') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="url_review">URL de Review</label>
                    <input type="url" id="url_review" class="form-control" wire:model="url_review" placeholder="URL de Review">
                    @error('url_review') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="btn btn-primary">{{ $isEditMode ? 'Atualizar' : 'Salvar' }}</button>
                <button type="button" class="btn btn-secondary" wire:click="resetForm">Cancelar</button>
            </form>
        </div>
    </div>

    <div class="card card-primary card-outline mt-4">
        <div class="card-header">
            <h3 class="card-title text-dark">Casas</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Logo</th>
                    <th>Descrição</th>
                    <th>Avaliação</th>
                    <th>URL Review</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($casas as $casa)
                    <tr>
                        <td>{{ $casa->nome }}</td>
                        <td>
                            @if($casa->logo_url)
                                <img src="{{ $casa->logo_url }}" alt="Logo" width="50">
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $casa->descricao }}</td>
                        <td>{{ $casa->avaliacao }}</td>
                        <td>
                            @if($casa->url_review)
                                <a href="{{ $casa->url_review }}" target="_blank">Ver Review</a>
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            <button wire:click="edit({{ $casa->id }})" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button wire:click="delete({{ $casa->id }})" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $casas->links() }}
        </div>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success mt-4">
            {{ session('message') }}
        </div>
    @endif
</div>
