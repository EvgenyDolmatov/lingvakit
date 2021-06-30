<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function destroy(Group $group)
    {
        $group->delete();
        $group->students()->detach();

        return redirect()->route('groups.index');
    }

    public function studentsList(Group $group)
    {
        $currentUser = Auth::user();

        $students = $currentUser->getMyStudents();
/*        $students = User::where([
            ['is_staff', 0],
            ['email_verified_at'],
        ])->get();*/

        $freeStudentsIds = array();

        foreach ($students as $student) {
            if ( count($student->groups) == 0  || $student->groups->contains($group->id) ) {
                $freeStudentsIds[] = $student->id;
            }
        }
        $freeStudents = User::whereIn('id', $freeStudentsIds)->get();

        return view('cms.students.groups.students-list', [
            'group' => $group,
            'students' => $freeStudents,
        ]);
    }

    public function setStudentsList(Request $request, Group $group)
    {
        $students = $request->input('students_list');
        $group->students()->sync($students);

        return redirect()->route('groups.show', $group->id);
    }

    public function excludeStudent(Group $group, User $student)
    {
        $group->students()->detach($student->id);
        return redirect()->route('groups.show', $group->id);
    }
}
