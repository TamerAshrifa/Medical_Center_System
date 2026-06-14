<?php

namespace App\Models;

use App\Enums\UserRoleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory;
    protected $guarded = [
        'id',
        'role'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime:Y-m-d H:i:s',
            'password' => 'hashed',
            'date_of_birth' => 'datetime:Y-m-d',
            'gender' => 'boolean',
            'role' => UserRoleEnum::class,
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

    public function doctor()
    {
        return $this->hasOne(Doctor::class, 'user_id');
    }

}
