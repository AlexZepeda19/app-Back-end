<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MultimediaProject extends Model
{
    //
    protected $fillable = [
        'project_id',
        'multimedia_link'];
        
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
