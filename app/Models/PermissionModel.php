<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionModel extends Model
{
    protected $table = "permissions";

    protected $fillable = [
        'name',
        'title'
    ];

    public function roles()
    {
        return $this->belongsToMany(RoleModel::class, 'role_permission', 'role_id', 'permission_id');
    }
}