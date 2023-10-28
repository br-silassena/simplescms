<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\TraitCrudController;

class UsuarioController extends Controller
{
    use TraitCrudController;

    public function __construct(User $user)
    {
        $this->pathIndex = 'admin.usuarios.index';
        $this->model = $user;
    }
}
