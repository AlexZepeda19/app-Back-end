<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    //
    protected $fillable = ['name', 'description'];

    public function profiles(){
        return $this->hasMany(Profile::class, 'profile_profession', 'profession_id', 'profile_id');
    }
}
