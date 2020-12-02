<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserModel extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $table = "users";

    protected $fillable = [
        'name',
        'email',
        'phone',
        'role_id',
        'password',
        'provider',
    ];

    protected $hidden = [
        'role_id',
        'password',
        'remember_token',
    ];

    public function role(){
        return $this->belongsTo(RoleModel::class);
    }

    public function hasPermission(PermissionModel $permission)
    {
        return !! optional(optional($this->role)->permissions)->contains($permission);;
    }
}