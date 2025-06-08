<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
class ConsultaController extends Controller
{   

    /**
     * Display the consulta form.
     */
    public function index(Request $request): View
    {
        return view('consulta.index', [
            'user' => $request->user(),
        ]);
    }
}