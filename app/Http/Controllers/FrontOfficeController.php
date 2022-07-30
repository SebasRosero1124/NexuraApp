<?php

namespace App\Http\Controllers;

use App\Models\areas;
use App\Models\Roles;
use Illuminate\Http\Request;

class FrontOfficeController extends Controller
{
    public function index()
    {
        $areas = areas::all();

        $roles = Roles::all();

        return view('Frontend.index', compact('areas','roles'));
    }
}
