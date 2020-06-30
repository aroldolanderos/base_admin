<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::orderBy('name', 'DESC')->paginate(4);

        return view('manager.authorization.roles.index', compact('roles'));
    }
}
