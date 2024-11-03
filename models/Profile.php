<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $table = 'profile';
    protected $fillable = [
        'user_id',
        'names',
        'last_name',
        'birthdate',
        'gender',
        'photo',
        'qualifications'];
        
    public function professions()
    {
        return $this->belongsToMany(Profession::class, 'profile_profession', 'profile_id', 'profession_id');
    }

    public function contact() 
    {
        return $this->hasOne(Contact::class);
    }

    public function workExperiences()
    {
        return $this->hasMany(WorkExperience::class);
    }

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
