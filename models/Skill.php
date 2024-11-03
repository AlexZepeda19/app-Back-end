<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'profile_id'];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
