<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipamento;
use App\Traits\TraitCrudController;

class EquipamentoController extends Controller
{
    use TraitCrudController;

    public function __construct(Equipamento $equipamento)
    {
        $this->pathIndex = 'admin.equipamentos.index';
        $this->model = $equipamento;
    }
}
