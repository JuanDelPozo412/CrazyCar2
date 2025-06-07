<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserVehiclesController extends Controller
{
    public function index()
    {
        return view('vehiculosUsuario.user_vehicles');
    }
}
