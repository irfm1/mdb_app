<?php

namespace App\Livewire;


use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Users extends Component
{
    use WithPagination;

    public $name, $email, $selectedUserId, $roles = [], $permissions = [];
    public $isEditMode = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'roles' => 'array',
        'permissions' => 'array',
    ];

    public function render()
    {
        return view('livewire.users', [
            'users' => User::with('roles', 'permissions')->paginate(10),
            'availableRoles' => Role::all(),
            'availablePermissions' => Permission::all(),
        ]);
    }

    public function resetForm()
    {
        $this->reset(['name', 'email', 'roles', 'permissions', 'selectedUserId', 'isEditMode']);
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $this->selectedUserId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->roles = $user->roles->pluck('name')->toArray();
        $this->permissions = $user->permissions->pluck('name')->toArray();
        $this->isEditMode = true;
    }

    public function updateUser()
    {
        $this->validate();

        $user = User::findOrFail($this->selectedUserId);
        $user->update(['name' => $this->name, 'email' => $this->email]);
        $user->syncRoles($this->roles);
        $user->syncPermissions($this->permissions);

        session()->flash('message', 'Usuário atualizado com sucesso!');
        $this->resetForm();
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        session()->flash('message', 'Usuário excluído com sucesso!');
    }
}
