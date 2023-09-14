<?php

namespace App\Livewire\Dashboard\Users;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class NewUsuario extends Component
{
    public $userArray = [];
    public $notificacion = false;
    public $type = 'success';
    public $message = 'Creado correctamente';

    public $roles = [];

    public function mount()
    {
        $this->userArray = [
            'name' => '',
            'email' => '',
            'password' => '',
            'rol' => ''
        ];
        $this->roles = Role::all();
    }

    public function save()
    {
        $this->validate(User::$validate, User::$messages);
        $new = User::CreateUsuario($this->userArray);
        $new->assignRole($this->userArray['rol']);
        if (!$new) {
            $this->message = 'Error al crear el usuario';
            $this->type = 'error';
            $this->notificacion = true;
        }
        return redirect()->route('usuario.list');
    }

    public function render()
    {
        return view('livewire.dashboard.users.new-usuario')->layout('layouts.dashboard');
    }
}
