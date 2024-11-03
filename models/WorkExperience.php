<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    //
    protected $table = 'work_experiences';
    protected $fillable = [
        'company',
        'job_title',
        'duration',
        'description',
        'profile_id'];
        
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
