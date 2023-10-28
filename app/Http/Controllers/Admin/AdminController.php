<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipamento;

class AdminController extends Controller
{
    private Equipamento $equipamento;

    public function __construct(Equipamento $equipamento)
    {
        $this->equipamento = $equipamento;
    }

    public function index()
    {
        return view('admin.index',[
            'equipamentos' => $this->equipamento->count()
        ]);
    }
}
