<?php

namespace App\Models;

use App\Enums\En_Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory;
    protected $guarded = [
        "id",
    ];
    public $timestamps = false;
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'date_of_birth' => 'date',
            'gender' => 'boolean',
            'role' => En_Role::class,
        ];
    }
    public function patient()
    {
        return $this->hasOne(Patient::class, 'user_id');
    }
    public function admin()
    {
        return $this->hasOne(Admin::class, 'user_id');
    }
}
