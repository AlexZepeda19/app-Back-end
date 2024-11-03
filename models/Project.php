<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'profile_id'];

    public function multimediaProjects()
    {
        return $this->hasMany(MultimediaProject::class);
    }
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
