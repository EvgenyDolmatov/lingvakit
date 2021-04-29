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
        $role = Role::create([
            'name' => $request->input('name'),
            'guard_name' => 'web',
        ]);
        $role->permissions()->sync($request['permissions']);

        return redirect()->route('roles.index');
    }

    public function edit(Role $role)
    {
        return view('cms.roles-permissions.roles.edit',[
            'role' => $role,
            'permissions' => Permission::all(),
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $role->update([
            'name' => $request->input('name'),
        ]);
        $role->permissions()->sync($request['permissions']);

        return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
        $role->permissions()->detach();
        $role->delete();

        return redirect()->route('roles.index');
    }
}
