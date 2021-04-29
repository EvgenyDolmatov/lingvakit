<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        return view('cms.roles-permissions.permissions.index', [
            'permissions' => Permission::all(),
        ]);
    }

    public function create()
    {
        return view('cms.roles-permissions.permissions.create');
    }

    public function store(Request $request)
    {
        Permission::create([
            'name' => $request->input('name'),
            'guard_name' => 'web',
        ]);

        return redirect()->route('permissions.index');
    }

    public function edit(Permission $permission)
    {
        return view('cms.roles-permissions.permissions.edit',[
            'permission' => $permission,
        ]);
    }

    public function update(Request $request, Permission $permission)
    {
        $permission->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('permissions.index');
    }

    public function destroy(Permission $permission)
    {
        $permission->roles()->detach([$permission->id]);
        $permission->delete();

        return redirect()->route('permissions.index');
    }
}
