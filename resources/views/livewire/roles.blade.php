<div>
    <!-- Formulário para criar e editar roles -->
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title text-dark">{{ $isEditMode ? 'Editar Role' : 'Adicionar Nova Role' }}</h3>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="{{ $isEditMode ? 'updateRole' : 'createRole' }}">
                <div class="form-group">
                    <label for="name">Nome da Role</label>
                    <input type="text" id="name" class="form-control" wire:model="name" placeholder="Nome">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="permissions">Permissões</label>
                    <select id="permissions" class="form-control" wire:model="permissions" multiple>
                        @foreach($availablePermissions as $permission)
                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                        @endforeach
                    </select>
                    @error('permissions') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="btn btn-primary">{{ $isEditMode ? 'Atualizar' : 'Salvar' }}</button>
                <button type="button" class="btn btn-secondary" wire:click="resetForm">Cancelar</button>
            </form>
        </div>
    </div>

    <!-- Formulário para criar permissões -->
    <div class="card card-secondary card-outline mt-4">
        <div class="card-header">
            <h3 class="card-title text-dark">{{ $isPermissionEditMode ? 'Editar Permissão' : 'Adicionar Nova Permissão' }}</h3>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="{{ $isPermissionEditMode ? 'updatePermission' : 'createPermission' }}">
                <div class="form-group">
                    <label for="newPermission">{{ $isPermissionEditMode ? 'Nome da Permissão' : 'Nova Permissão' }}</label>
                    <input type="text" id="newPermission" class="form-control" wire:model="{{ $isPermissionEditMode ? 'permissionName' : 'newPermission' }}" placeholder="Permissão">
                    @error($isPermissionEditMode ? 'permissionName' : 'newPermission') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="btn btn-primary">{{ $isPermissionEditMode ? 'Atualizar' : 'Salvar' }}</button>
                @if($isPermissionEditMode)
                    <button type="button" class="btn btn-secondary" wire:click="resetPermissionForm">Cancelar</button>
                @endif
            </form>
        </div>
    </div>

    <!-- Listagem de Roles -->
    <div class="card card-primary card-outline mt-4">
        <div class="card-header">
            <h3 class="card-title text-dark">Roles</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Permissões</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->permissions->pluck('name')->join(', ') }}</td>
                        <td>
                            <button wire:click="editRole({{ $role->id }})" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button wire:click="deleteRole({{ $role->id }})" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $roles->links() }}
        </div>
    </div>

    <!-- Listagem de Permissões -->
    <div class="card card-secondary card-outline mt-4">
        <div class="card-header">
            <h3 class="card-title text-dark">Permissões</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($availablePermissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>
                            <button wire:click="editPermission({{ $permission->id }})" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button wire:click="deletePermission({{ $permission->id }})" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
