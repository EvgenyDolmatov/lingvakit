<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'guard_name'];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_has_permissions');
    }

    public static function add($inputs)
    {
        $role = new static();
        $role->name = $inputs['name'];
        $role->guard_name = 'web';
        $role->save();

        $role->permissions()->sync($inputs['permissions']);
    }
}
