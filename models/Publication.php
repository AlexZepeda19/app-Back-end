<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    //
    protected $fillable = [
        'title',
        'description',
        'location',
        'date',
        'status',
        'profile_id',
        'profession_id'];
        
    public function multimediaPublications()
    {
        return $this->hasMany(MultimediaPublication::class);
    }
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
