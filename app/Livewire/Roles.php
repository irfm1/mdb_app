<?php

namespace App\Livewire;


use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Roles extends Component
{
    use WithPagination;

    public $name, $permissions = [], $selectedId, $newPermission, $permissionId, $permissionName;
    public $isEditMode = false;
    public $isPermissionEditMode = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'permissions' => 'array',
        'newPermission' => 'nullable|string|max:255|unique:permissions,name',
        'permissionName' => 'required|string|max:255|unique:permissions,name,' // Para edição
    ];

    public function render()
    {
        return view('livewire.roles', [
            'roles' => Role::with('permissions')->paginate(10),
            'availablePermissions' => Permission::all(),
        ]);
    }

    public function resetForm()
    {
        $this->reset(['name', 'permissions', 'newPermission', 'selectedId', 'isEditMode']);
    }

    public function resetPermissionForm()
    {
        $this->reset(['permissionId', 'permissionName', 'isPermissionEditMode']);
    }

    public function createRole()
    {
        $this->validate();

        $role = Role::create(['name' => $this->name]);
        $role->syncPermissions($this->permissions);

        session()->flash('message', 'Role criada com sucesso!');
        $this->resetForm();
    }

    public function createPermission()
    {
        $this->validate(['newPermission' => $this->rules['newPermission']]);

        Permission::create(['name' => $this->newPermission]);

        session()->flash('message', 'Permissão criada com sucesso!');
        $this->newPermission = '';
    }

    public function editPermission($id)
    {
        $permission = Permission::findOrFail($id);
        $this->permissionId = $permission->id;
        $this->permissionName = $permission->name;
        $this->isPermissionEditMode = true;
    }

    public function updatePermission()
    {
        $this->validate(['permissionName' => $this->rules['permissionName']]);

        $permission = Permission::findOrFail($this->permissionId);
        $permission->update(['name' => $this->permissionName]);

        session()->flash('message', 'Permissão atualizada com sucesso!');
        $this->resetPermissionForm();
    }

    public function deletePermission($id)
    {
        $permission = Permission::findOrFail($id);

        // Verifica se a permissão está associada a uma role
        if ($permission->roles()->exists()) {
            session()->flash('error', 'Não é possível excluir a permissão, pois está associada a uma role.');
            return;
        }

        $permission->delete();

        session()->flash('message', 'Permissão excluída com sucesso!');
    }
}

