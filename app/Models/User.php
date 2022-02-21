<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'birthdate', 'city'];
    protected $hidden = ['created_at', 'updated_at'];

    public function companies()
    {
        return $this->hasMany(UserCompany::class);
    }
}
