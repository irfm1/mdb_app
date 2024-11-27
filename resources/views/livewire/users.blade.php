<div>
    <!-- Formulário para editar usuários -->
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title text-dark">{{ $isEditMode ? 'Editar Usuário' : 'Selecionar Usuário' }}</h3>
        </div>
        <div class="card-body">
            @if($isEditMode)
                <form wire:submit.prevent="updateUser">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" id="name" class="form-control" wire:model="name" placeholder="Nome">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" class="form-control" wire:model="email" placeholder="E-mail">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="roles">Roles</label>
                        <select id="roles" class="form-control" wire:model="roles" multiple>
                            @foreach($availableRoles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('roles') <span class="text-danger">{{ $message }}</span> @enderror
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
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="button" class="btn btn-secondary" wire:click="resetForm">Cancelar</button>
                </form>
            @else
                <p>Selecione um usuário na tabela abaixo para editar.</p>
            @endif
        </div>
    </div>

    <!-- Listagem de Usuários -->
    <div class="card card-primary card-outline mt-4">
        <div class="card-header">
            <h3 class="card-title text-dark">Usuários</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Roles</th>
                    <th>Permissões</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->roles->pluck('name')->join(', ') }}</td>
                        <td>{{ $user->permissions->pluck('name')->join(', ') }}</td>
                        <td>
                            <button wire:click="editUser({{ $user->id }})" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button wire:click="deleteUser({{ $user->id }})" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $users->links() }}
        </div>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success mt-4">
            {{ session('message') }}
        </div>
    @endif
</div>
