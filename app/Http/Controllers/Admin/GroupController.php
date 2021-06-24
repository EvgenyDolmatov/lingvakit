<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        return view('cms.students.groups.index', [
            'groups' => Group::all(),
        ]);
    }

    public function create()
    {
        return view('cms.students.groups.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Group::create($request->all());
        return redirect()->route('groups.index');
    }

    public function show(Group $group)
    {
        return view('cms.students.groups.show', [
            'group' => $group,
            'students' => $group->students
        ]);
    }

    public function edit(Group $group)
    {
        return view('cms.students.groups.edit', [
            'group' => $group,
        ]);
    }

    public function update(Request $request, Group $group)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $group->update($request->all());
        return redirect()->route('groups.index');
    }

    public function destroy($id)
    {
        //
    }
}
