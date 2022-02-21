<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'cnpj', 'address'];
    protected $hidden = ['created_at', 'updated_at'];

    public function users()
    {
        return $this->hasMany(UserCompany::class);
    }
}