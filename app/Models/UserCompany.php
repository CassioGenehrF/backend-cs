<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCompany extends Model
{
    public $timestamps = false;
    protected $table = 'users_companies';
    protected $fillable = ['user_id', 'company_id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}