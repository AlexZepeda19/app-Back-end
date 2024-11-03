<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MultimediaPublication extends Model
{
    //
    protected $fillable = [
        'publication_id',
        'multimedia_link',
        'description'];
        
    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
}
