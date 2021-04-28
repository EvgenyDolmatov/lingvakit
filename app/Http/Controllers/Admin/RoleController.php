<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view('cms.roles-permissions.roles.index', [
            'roles' => Role::all(),
        ]);
    }

    public function create()
    {
        return view('cms.roles-permissions.roles.create', [
            'permissions' => Permission::all(),
        ]);
    }

    public function store(Request $request)
    {
        Role::add($request->all());

        return redirect()->route('roles.index');
    }
}
